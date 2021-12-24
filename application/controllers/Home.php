<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proposal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['proposals'] = $this->Proposal_model->getAllProposal();

        $this->load->view('templates/header');
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('end_date', 'End date', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('home/add');
            $this->load->view('templates/footer');
        } else {
            $this->Proposal_model->add();
            $this->session->set_flashdata('flash', 'added');
            redirect('home');
        }
    }
}
