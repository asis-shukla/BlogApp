<?php

class Admin extends CI_Controller{
    public function dashboard(){
        
        $this->load->model('Articlesmodel');
        
        $articles = $this->Articlesmodel->articles_list();

        $this->load->view('admin/admin_panel',['art'=>$articles]);

    }

    public function add_article(){
        $this->load->helper('form');
        $this->load->view('admin/add_article.php');

    }
    public function store_article(){
        $this->load->library('form_validation');
        if($this->form_validation->run('add_article_rules')){
                // Now we can store articles in our database
                $post = $this->input->post();
                unset($post['submit']);
                $this->load->model('Articlesmodel');
                if($this->Articlesmodel->add_articles($post)){
                    // successfully inserted
                    $this->session->set_flashdata('feedback',"Articles Added successfully");
                    $this->session->set_flashdata('feedback_class',"alert-success");

                }
                else{
                    // not inserted
                    $this->session->set_flashdata('feedback',"Article insertion failed!");
                    $this->session->set_flashdata('feedback_class',"alert-danger");
                }
                return redirect('Admin/dashboard');
                //print_r($post);
                //exit;
        }
        else{
            $this->load->view('admin/add_article');
        }
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