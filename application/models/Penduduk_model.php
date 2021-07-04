<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk_model extends MY_Model
{
    public $table = 'penduduk';

    public function getNik($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get($this->table)->row();
    }
}

/* End of file Penduduk_model.php */
