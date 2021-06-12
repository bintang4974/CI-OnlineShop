<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login_user()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Login User'
            );
            $this->load->view('v_login_user', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // library
            $this->user_login->login($username, $password);
        }
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi !!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi !!'
        ));
    }
}

/* End of file Auth.php */
