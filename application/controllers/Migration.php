<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{
    public function index()
    {
        $this->load->library('migration');
        $this->migration->version(0);
        if ($this->migration->current() === false) {
            show_error($this->migration->error_string());
        }
    }
}

/* End of file Migration.php */
