<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
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

        $data['content'] = 'admin/home';

        // print_r($data);
        // return null;
        $this->load->view('v_admin', $data);
    }
}

/* End of file Home.php */
