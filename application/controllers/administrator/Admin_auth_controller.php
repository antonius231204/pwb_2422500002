<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_auth_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Administrator_model');
    }

    public function index()
    {
        // Jika sudah login, langsung ke dashboard
        if ($this->session->userdata('admin_login')) {
            redirect('admin');
        }

        $data['title'] = 'Delphi Pet Shop';

        $this->form_validation->set_rules('inputUsername', 'Username', 'required');
        $this->form_validation->set_rules('inputPassword', 'Password', 'required');

        if ($this->form_validation->run() !== FALSE) {
            $this->__login();
        } else {
            $this->load->view('administrator/login', $data);
        }
    }

    private function __login()
    {
        $username = $this->input->post('inputUsername', TRUE);
        $password = $this->input->post('inputPassword');
        $check    = $this->Administrator_model->check_login($username, md5($password));

        if ($check) {
            $this->session->set_userdata(array(
                'id'          => $check['id_admin'],
                'username'    => $check['username'],
                'full_name'   => $check['full_name'],
                'admin_login' => TRUE
            ));
            redirect('admin');
        } else {
            $this->session->set_flashdata('message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Username dan password salah!!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(array('id', 'username', 'full_name', 'admin_login'));
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
