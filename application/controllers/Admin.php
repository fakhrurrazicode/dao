<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function is_admin($userAddr)
    {
        // $data['is_admin'] = $this->Admin_model->isAdmin($userAddr);

        if ($this->Admin_model->isAdmin($userAddr) == NULL) {
            echo 0;
        } else {
            echo 1;
        }
    }
}
