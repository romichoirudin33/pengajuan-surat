<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->session->userdata('id')) {
            redirect('admin/home', 'refresh');
        }
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('auth/v_login');
            } else {
                $user = $this->input->post('username');
                $pass = $this->input->post('password');
                $data = $this->User_model->auth($user, $pass);

                if ($data) {
                    $array = array(
                        'id' => $data->id,
                        'name' => $data->name,
                        'photo' => $data->photo,
                        'is_admin' => true
                    );
                    $this->session->set_userdata($array);
                    if ($this->input->post('redirect') != '') {
                        redirect($this->input->post('redirect'), 'refresh');
                    } else {
                        redirect('/admin/home', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('info', 'Login gagal username dan password tidak cocok');
                    redirect('login', 'refresh');
                }
            }
        } else {
            $this->load->view('auth/v_login');
        }
    }

    public function destroy()
    {
        $this->session->sess_destroy();
        redirect('/login', 'refresh');
    }
}

/* End of file Login.php */
