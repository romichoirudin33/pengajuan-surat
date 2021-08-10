<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
        $this->load->model('Pengajuan_surat_model');

        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login?redirect=admin/home', 'refresh');
        }
    }
    

    public function index()
    {
        $data['belumKawin'] = $this->Penduduk_model->countWhere('status_kawin', 'Belum Kawin');
        $data['kawin'] = $this->Penduduk_model->countWhere('status_kawin', 'Kawin');
        $data['ceraiHidup'] = $this->Penduduk_model->countWhere('status_kawin', 'Cerai Hidup');
        $data['ceraiMati'] = $this->Penduduk_model->countWhere('status_kawin', 'Cerai Mati');

        $data['lakiLaki'] = $this->Penduduk_model->countWhere('jenis_kelamin', 'Laki-laki');
        $data['perempuan'] = $this->Penduduk_model->countWhere('jenis_kelamin', 'Perempuan');

        $data['islam'] = $this->Penduduk_model->countWhere('agama', 'Islam');
        $data['hindu'] = $this->Penduduk_model->countWhere('agama', 'Hindu');
        $data['kristen'] = $this->Penduduk_model->countWhere('agama', 'Kristen');
        $data['katholik'] = $this->Penduduk_model->countWhere('agama', 'Katholik');
        $data['budha'] = $this->Penduduk_model->countWhere('agama', 'Budha');

        $data['twobln'] = $this->Pengajuan_surat_model->countWhereDate(date('m', strtotime('- 2 months')), date('Y', strtotime('- 2 months')));
        $data['onebln'] = $this->Pengajuan_surat_model->countWhereDate(date('m', strtotime('- 1 months')), date('Y', strtotime('- 1 months')));
        $data['bln'] = $this->Pengajuan_surat_model->countWhereDate(date('m'), date('Y'));

        $data['presentase_baru'] = $this->Pengajuan_surat_model->countWhere('status_proses', 'baru');
        $data['presentase_selesai'] = $this->Pengajuan_surat_model->countWhere('status_proses', 'selesai');

        $data['baru'] = $data['presentase_baru'];
        $data['dikonfirmasi'] = $this->Pengajuan_surat_model->countWhere('status_proses', 'dikonfirmasi');
        $data['ditolak'] = $this->Pengajuan_surat_model->countWhere('status_proses', 'ditolak');
        $data['diproses'] = $this->Pengajuan_surat_model->countWhere('status_proses', 'diproses');
        $data['selesai'] = $data['presentase_selesai'];

        $data['content'] = 'admin/home';

        // print_r($data);
        // return null;
        $this->load->view('v_admin', $data);
    }
}

/* End of file Home.php */
