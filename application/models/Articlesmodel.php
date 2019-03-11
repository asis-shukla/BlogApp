<?php
class Articlesmodel extends CI_Model{
    
    
    public function articles_list($limit, $offset){
        $user_id = $this->session->userdata('user_id');
        $query = $this->db
                            ->select(['title','id'])
                            ->from('articles')
                            ->limit($limit, $offset)
                            ->where('user_id',$user_id)
                            ->get();

        return $query->result();
    }

    public function num_rows(){
        $user_id = $this->session->userdata('user_id');
        $query = $this->db
                            ->select(['title','id'])
                            ->from('articles')
                            ->where('user_id',$user_id)
                            ->get();

        return $query->num_rows();
    }


    public function add_articles($array){
        return $this->db->insert('articles',$array);
    }


    public function find_article($article_id){
        $q = $this->db
                        ->select(['id','title','body'])
                        ->where('id',$article_id)
                        ->get('articles');
        return $q->row();
    }
    

    public function update_article($article_id, Array $article){
        return $this->db
                ->where('id',$article_id)
                ->update('articles',$article);
    }

    public function delete_article($article_id){
        return $this->db->delete('articles',['id'=>$article_id]);
    }

    public function count_all_articles(){
            $query = $this->db
                            ->select(['title','id'])
                            ->from('articles')
                            ->get();

        return $query->num_rows();
    }
    
    public function all_articles_list($limit, $offset){
        $query = $this->db
                            ->select(['title','id','created_at'])
                            ->from('articles')
                            ->limit($limit, $offset)
                            ->order_by('created_at', 'DESC')
                            ->get();

        return $query->result();
    }

    public function find($article_id){
        $query = $this->db
                            ->from('articles')
                            ->where('id',$article_id)
                            ->get();
        
        return $query->row();
    }


}

?>