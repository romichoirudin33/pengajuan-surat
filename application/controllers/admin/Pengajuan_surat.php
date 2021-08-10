<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan_surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengajuan_surat_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Surat_model');
        
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login?redirect=admin/pengajuan_surat', 'refresh');
        }
    }

    public function index()
    {
        $data['content'] = 'admin/pengajuan_surat/index';

        $data['data'] = $this->Pengajuan_surat_model->all();
        $data['baru'] = $this->Pengajuan_surat_model->prosesBaru();
        $data['diproses'] = $this->Pengajuan_surat_model->prosesDiproses();

        if ($this->input->get('proses') == 'baru') {
            $data['data'] = $data['baru'];
        }

        if ($this->input->get('proses') == 'diproses') {
            $data['data'] = $data['diproses'];
        }

        if ($this->input->get('proses') == 'ditolak') {
            $data['data'] = $this->Pengajuan_surat_model->prosesDitolak();
        }

        $this->load->view('v_admin', $data);
    }

    public function edit($id = null)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run() == false) {
                $data['content'] = 'admin/pengajuan_surat/edit';
                $data['data'] = $this->Pengajuan_surat_model->getId($id);
                $this->load->view('v_admin', $data);
            } else {
                $config['upload_path']          = './assets/file_surat/';
                $config['allowed_types']        = 'gif|jpg|png|doc|docx|pdf';
  
                $this->load->library('upload', $config);
  
                if ($this->upload->do_upload('file_surat')) {
                    $file_surat = $this->upload->file_name;
                    $object = [
                    'status_proses' => $this->input->post('status_proses'),
                    'keterangan' => $this->input->post('keterangan'),
                    'file' => $file_surat,
                ];
                } else {
                    $object = [
                        'status_proses' => $this->input->post('status_proses'),
                        'keterangan' => $this->input->post('keterangan'),
                ];
                }
            
                if ($this->Pengajuan_surat_model->update($id, $object)) {
                    $this->session->set_flashdata('info', 'Data Berhasil Di Edit');
                    redirect('admin/pengajuan_surat');
                } else {
                    $this->session->set_flashdata('info', 'Data Gagal Di Edit');
                    redirect('admin/pengajuan_surat');
                }
            }
        } else {
            if ($id == null) {
                redirect('admin/pengajuan_surat', 'refresh');
            }
            $data['content'] = 'admin/pengajuan_surat/edit';
            $data['data'] = $this->Pengajuan_surat_model->getId($id);
            $this->load->view('v_admin', $data);
        }
    }

    public function ditolak($id = null)
    {
        if ($id == null) {
            redirect('admin/pengajuan_surat', 'refresh');
        }

        $object = [
            'status_proses' => 'ditolak',
        ];
        if ($this->Pengajuan_surat_model->update($id, $object)) {
            $this->session->set_flashdata('info', 'Pengajuan surat berhasil di tolak');
            redirect('admin/pengajuan_surat');
        } else {
            $this->session->set_flashdata('info', 'Pengajuan surat gagal di tolak');
            redirect('admin/pengajuan_surat');
        }
    }

    public function destroy($id = null)
    {
        if ($id == null) {
            redirect('admin/pengajuan_surat', 'refresh');
        }

        if ($this->Pengajuan_surat_model->delete($id)) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('admin/user_admin');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Di Hapus');
            redirect('admin/user_admin');
        }
    }
}

/* End of file Pengajuan_surat.php */
