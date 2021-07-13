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

    public function getRangeDate($startDate, $endDate)
    {
        $this->db->where("DATE_FORMAT(tanggal_lahir,'%Y-%m-%d') >='$startDate'");
        $this->db->where("DATE_FORMAT(tanggal_lahir,'%Y-%m-%d') <='$endDate'");
        return $this->db->get($this->table)->result();
    }
}

/* End of file Penduduk_model.php */
