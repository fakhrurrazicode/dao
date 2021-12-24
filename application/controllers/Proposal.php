<?php

class Proposal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['proposals'] = $this->Proposal_model->getAllProposal();

        $this->load->view('templates/header');
        $this->load->view('proposal/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('end_date', 'End date', 'required');
        $this->form_validation->set_rules('user_addr', 'User address', 'required');
        $this->form_validation->set_rules('choices[]', 'Choices', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('proposal/add');
            $this->load->view('templates/footer');
        } else {
            $this->Proposal_model->add();
            $this->session->set_flashdata('flash', 'added');
            redirect('proposal');
        }
    }

    public function detail($id)
    {
        if ($this->Proposal_model->getProposalById($id) == null) {
            show_404();
        } else {
            $data['proposal'] = $this->Proposal_model->getProposalById($id);
            $data['options'] = $this->Proposal_model->getOptionsByProposalId($id);

            $votes = $this->Proposal_model->getAllVotes($id);

            $data['votes'] = $votes;

            date_default_timezone_set('Asia/Jakarta');
            $now = new DateTime();
            $end_date = new DateTime($data['proposal']['end_date']);

            if (count($votes) > 0) {
                $votingPoints = $this->Proposal_model->calculateVotingPoints($id);
                $data['votingPoints'] = $votingPoints;
            }

            if ($now > $end_date) {
                $data['is_close'] = true;
            } else {
                $data['is_close'] = false;
            }

            // ================================================================

            $this->form_validation->set_rules('flexRadioDefault', 'Choice', 'required');
            $this->form_validation->set_rules('user_addr', 'User address', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header');
                $this->load->view('proposal/detail', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Proposal_model->vote();
                $this->session->set_flashdata('flash', 'voted');
                redirect('proposal');
            }
        }
    }

    public function is_already_vote($proposalId, $userAddr)
    {
        if ($this->Proposal_model->isAlreadyVote($proposalId, $userAddr) == NULL) {
            echo 0;
        } else {
            echo 1;
        }
    }
}
