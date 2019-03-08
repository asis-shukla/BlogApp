<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller{

    public function index(){
        // echo "This is index function of the user";
        // $this->load->helper('html');
        $this->load->view('public/articles_list');
        
    }
}

?>
