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
            $this->load->model('loginmodel');
            if ($this->loginmodel->login_valid($username, $password)) {
                # code...
                // valid cred login user
            }
            else{
                // login failed
            }
            
        }
        else{
            $this->load->view('public/admin_login');
        }
    }
}




?>