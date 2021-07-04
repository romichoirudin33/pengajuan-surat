<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_model');
        $this->load->model('Pengajuan_surat_model');
        $this->load->model('Penduduk_model');
    }
    

    public function index()
    {
        $data['content'] = '';
        $this->load->view('v_home', $data);
    }

    public function ajukan_surat()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('pengajuan_surat', 'Pengajuan Surat', 'required');
            $this->form_validation->set_rules('no_hp', 'No Telp/HP', 'required');
            if ($this->form_validation->run() == true) {
                $cek = $this->Penduduk_model->getNik($this->input->post('nik'));
                $masihProses = $this->Pengajuan_surat_model->cekMasihProses($this->input->post('nik'), 'baru');
                if (!empty($cek) and empty($masihProses)) {
                    $object = [
                      'nik' => $this->input->post('nik'),
                      'pengajuan_surat' => $this->input->post('pengajuan_surat'),
                      'email' => $this->input->post('email'),
                      'no_hp' => $this->input->post('no_hp'),
                    ];
                    $this->Pengajuan_surat_model->create($object);
                    $id = $this->db->insert_id();
                    $data['info'] = 'Pengajuan berhasil di upload';

                    redirect('home/ajukan_surat?id='.$id, 'refresh');
                } else {
                    if (empty($cek)) {
                        $data['info'] = 'NIK <b>'.$this->input->post('nik').'</b> tidak terdaftar di sistem.<br> Silahkan hubungi kantor untuk informasi lebih lanjut';
                        ;
                    }
                    if (!empty($masihProses)) {
                        $data['info'] = 'NIK <b>'.$this->input->post('nik').'</b> ini masih memiliki <b>pengajuan surat</b> yang <b>belum di proses</b>.</br> Silahkan hubungi kantor untuk informasi lebih lanjut';
                        ;
                    }
                }
            }
        }

        $data['pengajuanBaru'] = $this->Pengajuan_surat_model->prosesBaru();
        $data['surat'] = $this->Surat_model->all();

        $data['content'] = 'user/ajukan_surat/index';
        if ($this->input->get('id')) {
            $data['data'] = $this->Pengajuan_surat_model->getId($this->input->get('id'));
            $data['content'] = 'user/ajukan_surat/detail';
        }

        if ($this->input->get('nik')) {
            $data['data'] = $this->Pengajuan_surat_model->cekMasihProses($this->input->get('nik'), '');
            $data['content'] = 'user/ajukan_surat/list-nik';
        }
        $this->load->view('v_user', $data);
    }
}

/* End of file Home.php */
