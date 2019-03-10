<?php
class Articlesmodel extends CI_Model{
    public function articles_list(){


        $user_id = $this->session->userdata('user_id');
        $query = $this->db
                            ->select('title','id')
                            ->from('articles')
                            ->where('user_id',$user_id)
                            ->get();

        return $query->result();
    }
    public function add_articles($array){
        return $this->db->insert('articles',$array);

    }
}


?>