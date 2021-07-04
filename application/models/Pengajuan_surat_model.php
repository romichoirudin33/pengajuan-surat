<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_surat_model extends MY_Model
{
    public $table = 'pengajuan_surat';

    public function prosesBaru()
    {
        $this->db->where('status_proses', 'baru');
        return $this->db->get($this->table)->result();
    }

    public function prosesDikonfirmasi()
    {
        $this->db->where('status_proses', 'dikonfirmasi');
        return $this->db->get($this->table)->result();
    }

    public function prosesDiproses()
    {
        $this->db->where('status_proses', 'diproses');
        return $this->db->get($this->table)->result();
    }

    public function prosesDitolak()
    {
        $this->db->where('status_proses', 'ditolak');
        return $this->db->get($this->table)->result();
    }

    public function cekMasihProses($nik, $status = 'baru')
    {
        $this->db->where('nik', $nik);
        $this->db->like('status_proses', $status);
        return $this->db->get($this->table)->result();
    }
}

/* End of file Pengajuan_surat_model.php */
