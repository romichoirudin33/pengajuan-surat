<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        
        if ($this->session->userdata('id') == null or $this->session->userdata('is_admin') == false) {
            redirect('login?redirect=admin/user_admin', 'refresh');
        }
    }

    public function index()
    {
        $data['content'] = 'admin/user_admin/index';
        $data['data'] = $this->User_model->getAdmin();
        $this->load->view('v_admin', $data);
    }

    public function create()
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

            if ($this->form_validation->run() == false) {
                $data['content'] = 'admin/user_admin/create';
                $this->load->view('v_admin', $data);
            } else {
                $config['upload_path']          = './assets/photo_user/';
                $config['allowed_types']        = 'gif|jpg|png';
  
                $this->load->library('upload', $config);
  
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->file_name;
                } else {
                    $photo = 'empty.png';
                }
                $object = [
                  'name' => $this->input->post('name'),
                  'email' => $this->input->post('email'),
                  'username' => $this->input->post('username'),
                  'password' => $this->input->post('password'),
                  'address' => $this->input->post('address'),
                  'photo' => $photo,
                  'role' => 'admin',
                ];
                if ($this->User_model->create($object)) {
                    $this->session->set_flashdata('info', 'Data Berhasil Di Tambah');
                    redirect('admin/user_admin');
                } else {
                    $this->session->set_flashdata('info', 'Data Gagal Di Tambah');
                    redirect('admin/user_admin');
                }
            }
        } else {
            $data['content'] = 'admin/user_admin/create';
            $this->load->view('v_admin', $data);
        }
    }

    public function edit($id = null)
    {
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

            if ($this->form_validation->run() == false) {
                $data['content'] = 'admin/user_admin/edit';
                $data['data'] = $this->User_model->getId($id);
                $this->load->view('v_admin', $data);
            } else {
                $config['upload_path']          = './assets/photo_user/';
                $config['allowed_types']        = 'gif|jpg|png';
  
                $this->load->library('upload', $config);
  
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->file_name;
                    $object = [
                    'name' => $this->input->post('name'),
                    'password' => $this->input->post('password'),
                    'address' => $this->input->post('address'),
                    'photo' => $photo,
                ];
                } else {
                    $object = [
                    'name' => $this->input->post('name'),
                    'password' => $this->input->post('password'),
                    'address' => $this->input->post('address'),
                ];
                }
            
                if ($this->User_model->update($id, $object)) {
                    $this->session->set_flashdata('info', 'Data Berhasil Di Edit');
                    redirect('admin/user_admin');
                } else {
                    $this->session->set_flashdata('info', 'Data Gagal Di Edit');
                    redirect('admin/user_admin');
                }
            }
        } else {
            if ($id == null) {
                redirect('admin/user_admin', 'refresh');
            }
            $data['content'] = 'admin/user_admin/edit';
            $data['data'] = $this->User_model->getId($id);
            $this->load->view('v_admin', $data);
        }
    }

    public function destroy($id = null)
    {
        if ($id == null) {
            redirect('admin/user_admin', 'refresh');
        }

        if ($this->User_model->delete($id)) {
            $this->session->set_flashdata('info', 'Data Berhasil Di Hapus');
            redirect('admin/user_admin');
        } else {
            $this->session->set_flashdata('info', 'Data Gagal Di Hapus');
            redirect('admin/user_admin');
        }
    }
}

/* End of file User.php */
