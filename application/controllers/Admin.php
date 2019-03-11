<?php

class Admin extends CI_Controller{
    
    public function dashboard(){
        $this->load->library('pagination');
        $config = [
            'base_url' =>  base_url('Admin/dashboard'),
            'per_page' => 5,
            'total_rows' => $this->Articlesmodel->num_rows(),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => "<ul/>",
            'next_tag_open' => "<li>",
            'next_tag_close' => "</li>",
            'prev_tag_open' => "<li>",
            'prev_tag_close' => "</li>",
            'num_tag_open' => "<li>",
            'num_tag_close' => "</li>",
            'cur_tag_open' => "<li class='active'>",
            'cur_tag_close' => "</a></li>", 

        ];
        $this->pagination->initialize($config);
        $articles = $this->Articlesmodel->articles_list($config['per_page'], $this->uri->segment(3));
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
    
    
    public function update_article($article_id){
      
        $this->load->library('form_validation');
        if($this->form_validation->run('add_article_rules')){
                // Now we can store articles in our database
                $post = $this->input->post();
                unset($post['submit']);
                if($this->Articlesmodel->update_article($article_id, $post)){
                    // successfully inserted
                    $this->session->set_flashdata('feedback',"Article Update successfully");
                    $this->session->set_flashdata('feedback_class',"alert-success");

                }
                else{
                    // not inserted
                    $this->session->set_flashdata('feedback',"Updation failed failed!");
                    $this->session->set_flashdata('feedback_class',"alert-danger");
                }
                return redirect('Admin/dashboard');
                //print_r($post);
                //exit;
        }
        else{
            $this->load->view('admin/edit_article');
        }
    }
    
    public function edit_article($article_id){   // we recieve article id from views/admin/admin_panel
        $article = $this->Articlesmodel->find_article($article_id);
        $this->load->view('admin/edit_article',['article'=>$article]);
    }

    
    public function delete_article(){
        $article_id = $this->input->post('article_id');
        if($this->Articlesmodel->delete_article($article_id)){
            // successfully deleted
            $this->session->set_flashdata('feedback',"Article deleted successfully");
            $this->session->set_flashdata('feedback_class',"alert-success");

        }
        else{
            // not deleted
            $this->session->set_flashdata('feedback',"Article deletion failed!");
            $this->session->set_flashdata('feedback_class',"alert-danger");
        }
        return redirect('Admin/dashboard');
        //print_r($post);
        //exit;

    }

    
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Articlesmodel');
        if(! $this->session->userdata('user_id')){
            redirect('Login');
        }
    }
    public function index(){
        redirect('Login');
    }
   
}

?>