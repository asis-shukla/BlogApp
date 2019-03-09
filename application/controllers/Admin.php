<?php

class Admin extends CI_Controller{
    public function dashboard(){
        
        $this->load->model('Articlesmodel');
        
        $articles = $this->Articlesmodel->articles_list();

        $this->load->view('admin/admin_panel',['art'=>$articles]);

    }

    public function add_article(){

    }

    public function edit_article(){

    }

    public function delete_article(){

    }

    
    
    public function __construct(){
        parent::__construct();
        if(! $this->session->userdata('user_id')){
            redirect('Login');
        }
    }
    public function index(){
        redirect('Login');
    }
   
}




?>