<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
        
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login?redirect=admin/penduduk', 'refresh');
        }
    }

    public function index()
    {
        $data['content'] = 'admin/penduduk/index';
        $data['data'] = $this->Penduduk_model->all();
        $this->load->view('v_admin', $data);
    }

    public function create()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[penduduk.nik]');
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('agama', 'Agama', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('status_kawin', 'Status Kawin', 'required');
            $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');

            if ($this->form_validation->run() == false) {
                $data['content'] = 'admin/penduduk/create';
                $this->load->view('v_admin', $data);
            } else {
                $config['upload_path']          = './assets/photo_penduduk/';
                $config['allowed_types']        = 'gif|jpg|png';
  
                $this->load->library('upload', $config);
  
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->file_name;
                } else {
                    $photo = 'empty.png';
                }
                $object = [
                  'nik' => $this->input->post('nik'),
                  'nama_lengkap' => $this->input->post('nama_lengkap'),
                  'tempat_lahir' => $this->input->post('tempat_lahir'),
                  'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                  'alamat' => $this->input->post('alamat'),
                  'agama' => $this->input->post('agama'),
                  'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                  'status_kawin' => $this->input->post('status_kawin'),
                  'pekerjaan' => $this->input->post('pekerjaan'),
                  'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                  'photo' => $photo,
                ];
                if ($this->Penduduk_model->create($object)) {
                    $this->session->set_flashdata('info', 'Data Berhasil Di Tambah');
                    redirect('admin/penduduk');
                } else {
                    $this->session->set_flashdata('info', 'Data Gagal Di Tambah');
                    redirect('admin/penduduk');
                }
            }
        } else {
            $data['content'] = 'admin/penduduk/create';
            $this->load->view('v_admin', $data);
        }
    }

    public function edit($id = null)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('agama', 'Agama', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('status_kawin', 'Status Kawin', 'required');
            $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required');

            if ($this->form_validation->run() == false) {
                $data['content'] = 'admin/penduduk/edit';
                $data['data'] = $this->Penduduk_model->getId($id);
                $this->load->view('v_admin', $data);
            } else {
                $config['upload_path']          = './assets/photo_penduduk/';
                $config['allowed_types']        = 'gif|jpg|png';
  
                $this->load->library('upload', $config);
  
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->file_name;
                    $object = [
                        'nik' => $this->input->post('nik'),
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'tempat_lahir' => $this->input->post('tempat_lahir'),
                        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                        'alamat' => $this->input->post('alamat'),
                        'agama' => $this->input->post('agama'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'status_kawin' => $this->input->post('status_kawin'),
                        'pekerjaan' => $this->input->post('pekerjaan'),
                        'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                        'photo' => $photo,
                ];
                } else {
                    $object = [
                        'nik' => $this->input->post('nik'),
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'tempat_lahir' => $this->input->post('tempat_lahir'),
                        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                        'alamat' => $this->input->post('alamat'),
                        'agama' => $this->input->post('agama'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'status_kawin' => $this->input->post('status_kawin'),
                        'pekerjaan' => $this->input->post('pekerjaan'),
                        'kewarganegaraan' => $this->input->post('kewarganegaraan'),
                ];
                }
            
                if ($this->Penduduk_model->update($id, $object)) {
                    $this->session->set_flashdata('info', 'Data Berhasil Di Edit');
                    redirect('admin/penduduk');
                } else {
                    $this->session->set_flashdata('info', 'Data Gagal Di Edit');
                    redirect('admin/penduduk');
                }
            }
        } else {
            if ($id == null) {
                redirect('admin/penduduk', 'refresh');
            }
            $data['content'] = 'admin/penduduk/edit';
            $data['data'] = $this->Penduduk_model->getId($id);
            $this->load->view('v_admin', $data);
        }
    }

    public function destroy($id = null)
    {
        if ($id == null) {
            redirect('admin/penduduk', 'refresh');
        }

        if ($this->Penduduk_model->delete($id)) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('admin/penduduk');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Di Hapus');
            redirect('admin/penduduk');
        }
    }
}

/* End of file Penduduk.php */
