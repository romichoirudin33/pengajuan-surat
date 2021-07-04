<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends MY_Model
{
    public $table = 'users';

    public function auth($username = null, $password = null)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get($this->table)->row();
    }

    public function getAdmin()
    {
        $this->db->where('role', 'root');
        $this->db->or_where('role', 'admin');
        return $this->db->get($this->table)->result();
    }

    public function getUser()
    {
        $this->db->where('role', 'user');
        return $this->db->get($this->table)->result();
    }
}

/* End of file User_model.php */
