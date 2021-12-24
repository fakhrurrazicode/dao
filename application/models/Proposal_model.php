<?php

class Proposal_model extends CI_Model
{
    public function getAllProposal()
    {
        $this->db->order_by("created_at", "desc");
        return $this->db->get('proposals')->result_array();
    }

    public function add()
    {
        // TODO lakukan pengecekan jika bukan admin, maka tidak bisa add

        $data = [
            "title" => $this->input->post('title', true), // dikasih 'true' supaya aman dari serangan apapun, handle by CI
            "description" => $this->input->post('description', true),
            "end_date" => date_create_from_format('H:i m/d/Y', $this->input->post('end_date', true))->format('Y-m-d H:i:s'),
            "publisher" => $this->input->post('user_addr', true)
        ];

        $this->db->insert('proposals', $data);
        $insert_id = $this->db->insert_id();

        // add choices to options table
        $choices = $this->input->post('choices');

        foreach ($choices as $choice) {
            $choice_data = [
                "proposal_id" => $insert_id,
                "opt" => $choice
            ];

            $this->db->insert('options', $choice_data);
        }
    }

    public function getProposalById($id)
    {
        return $this->db->get_where('proposals', ['id' => $id])->row_array();
    }

    public function getOptionsByProposalId($id)
    {
        return $this->db->get_where('options', ['proposal_id' => $id])->result_array();
    }

    public function vote()
    {
        // TODO lakukan pengecekan jika:
        // 1. tidak punya voting power (SuperlativeSS token), tidak bisa vote
        // 2. sudah vote, tidak bisa vote lagi

        // if ($this->input->post('user_voting_power', true) == 0) {
        //     log_message('error', 'Some variable did not contain a value.');
        //     $this->db->error();
        // } else {
        //     $data = [
        //         "proposal_id" => $this->input->post('proposal_id', true),
        //         "holder_addr" => $this->input->post('user_addr', true),
        //         "voting_power" => $this->input->post('user_voting_power', true),
        //         "opt_id" => $this->input->post('flexRadioDefault', true)
        //     ];

        //     $this->db->insert('voters', $data);
        // }

        $data = [
            "proposal_id" => $this->input->post('proposal_id', true),
            "holder_addr" => $this->input->post('user_addr', true),
            "voting_power" => $this->input->post('user_voting_power', true),
            "opt_id" => $this->input->post('flexRadioDefault', true)
        ];

        $this->db->insert('voters', $data);
    }

    public function getAllVotes($id)
    {
        $this->db->select('*');
        $this->db->from('voters v');
        $this->db->join('options o', 'v.opt_id = o.id');
        $this->db->where('v.proposal_id', $id);
        $this->db->order_by('v.created_at', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function calculateVotingPoints($id)
    {
        $query = $this->db->query('SELECT opt,
                                            SUM(voting_power) AS point,
                                            ROUND(SUM(percentage), 2) AS percentage
                                    FROM
                                    (SELECT proposal_id,
                                            opt_id,
                                            voting_power,
                                            voting_power * 100 / t.s AS percentage
                                        FROM voters
                                        CROSS JOIN
                                        (SELECT SUM(voting_power) AS s
                                        FROM voters WHERE proposal_id = ' . $id . ') t
                                        WHERE proposal_id = ' . $id . ') v
                                    LEFT JOIN options o ON v.opt_id = o.id
                                    WHERE v.proposal_id = ' . $id . ' 
                                    GROUP BY opt');
        return $query->result_array();
    }

    public function isAlreadyVote($proposalId, $userAddr)
    {
        return $this->db->get_where('voters', ['proposal_id' => $proposalId, 'holder_addr' => $userAddr])->row_array();
    }
}
