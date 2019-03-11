<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller{

    public function index(){
        $this->load->model('Articlesmodel');
        $this->load->library('pagination');
        $config = [
            'base_url' =>  base_url('User/index'),
            'per_page' => 5,
            'total_rows' => $this->Articlesmodel->count_all_articles(),
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
        $articles = $this->Articlesmodel->all_articles_list($config['per_page'], $this->uri->segment(3));
      
        $this->load->view('public/articles_list',compact('articles'));
        
    }

    public function article($article_id){
        $this->load->model('Articlesmodel');
        $article = $this->Articlesmodel->find($article_id);
        $this->load->view('public/article_detail',compact('article'));

    }
}

?>
