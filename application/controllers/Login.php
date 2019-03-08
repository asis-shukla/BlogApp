<?php
class Login extends MY_Controller
{
    public function index(){
        $this->load->view('public/admin_login');
    }
    public function admin_login(){
        // echo "reached admin login page";
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'User Name','required|alpha|trim');
        $this->form_validation->set_rules('password', 'Password','required');

        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

        if( $this->form_validation->run() ){
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            echo $username;
            echo $password;
            $this->load->model('LoginModel');
            if ($this->LoginModel->login_valid($username, $password)) {
                # code...
                // valid cred login usert
                echo "password_match";
            }
            else{
                // login failed
                echo "not match";
            }
            
        }
        else{
            $this->load->view('public/admin_login');
        }
    }
}




?>