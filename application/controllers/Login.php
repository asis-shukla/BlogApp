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
            // echo $username;
            // echo $password;
            $this->load->model('LoginModel');
            $login_id = $this->LoginModel->login_valid($username, $password);
            if ($login_id) {
                # code...
                $this->load->library('session');
                $this->session->set_userdata('user_id',$login_id);
                
                // Since Admin login is sucessfull we load the admin page by view 
                // $this->load->view('admin/admin_pannal');
                // above way of loading view not good we should do this
                return redirect('Admin/dashboard');  
            }
            else{
                // login failed
                echo "not match";
            }
            
        }
        else{  // if validation unsuccessfull
            $this->load->view('public/admin_login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('user_id');
        return redirect('login');
    }
}




?>