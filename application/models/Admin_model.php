<?php

class Admin_model extends CI_Model
{
    public function isAdmin($userAddr)
    {
        return $this->db->get_where('admins', ['address' => $userAddr])->row_array();
    }
}
