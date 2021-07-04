<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_model');
        
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login?redirect=admin/surat', 'refresh');
        }
    }

    public function index()
    {
        $data['content'] = 'admin/surat/index';
        $data['data'] = $this->Surat_model->all();
        $this->load->view('v_admin', $data);
    }

    public function create()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required|is_unique[surat.jenis_surat]');

            if ($this->form_validation->run() == false) {
                $data['content'] = 'admin/surat/create';
                $this->load->view('v_admin', $data);
            } else {
                $config['upload_path']          = './assets/contoh_file/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|xls|xlsx';
  
                $this->load->library('upload', $config);
  
                if ($this->upload->do_upload('contoh_file')) {
                    $contoh_file = $this->upload->file_name;
                } else {
                    $contoh_file = 'empty.png';
                }
                $object = [
                  'jenis_surat' => $this->input->post('jenis_surat'),
                  'keterangan_surat' => $this->input->post('keterangan_surat'),
                  'contoh_file' => $contoh_file,
                ];
                if ($this->Surat_model->create($object)) {
                    $this->session->set_flashdata('info', 'Data Berhasil Di Tambah');
                    redirect('admin/surat');
                } else {
                    $this->session->set_flashdata('info', 'Data Gagal Di Tambah');
                    redirect('admin/surat');
                }
            }
        } else {
            $data['content'] = 'admin/surat/create';
            $this->load->view('v_admin', $data);
        }
    }

    public function edit($id = null)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');

            if ($this->form_validation->run() == false) {
                $data['content'] = 'admin/surat/edit';
                $data['data'] = $this->Surat_model->getId($id);
                $this->load->view('v_admin', $data);
            } else {
                $config['upload_path']          = './assets/contoh_file/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|xls|xlsx';
  
                $this->load->library('upload', $config);
  
                if ($this->upload->do_upload('contoh_file')) {
                    $contoh_file = $this->upload->file_name;
                    $object = [
                        'jenis_surat' => $this->input->post('jenis_surat'),
                        'keterangan_surat' => $this->input->post('keterangan_surat'),
                    'contoh_file' => $contoh_file,
                ];
                } else {
                    $object = [
                        'jenis_surat' => $this->input->post('jenis_surat'),
                        'keterangan_surat' => $this->input->post('keterangan_surat'),
                ];
                }
            
                if ($this->Surat_model->update($id, $object)) {
                    $this->session->set_flashdata('info', 'Data Berhasil Di Edit');
                    redirect('admin/surat');
                } else {
                    $this->session->set_flashdata('info', 'Data Gagal Di Edit');
                    redirect('admin/surat');
                }
            }
        } else {
            if ($id == null) {
                redirect('admin/surat', 'refresh');
            }
            $data['content'] = 'admin/surat/edit';
            $data['data'] = $this->Surat_model->getId($id);
            $this->load->view('v_admin', $data);
        }
    }

    public function destroy($id = null)
    {
        if ($id == null) {
            redirect('admin/surat', 'refresh');
        }

        if ($this->Surat_model->delete($id)) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('admin/surat');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Di Hapus');
            redirect('admin/surat');
        }
    }
}

/* End of file Surat.php */
