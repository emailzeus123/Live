<?php

class Post extends CI_Model {
    public function get_posts($num=1, $start=0){
        $this->db->select()->from('posts')->where('active',1)->order_by('date_added','asc')->limit($num,$start);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_post($post_id){
        $result = $this->db->get_where('posts',array('postID'=>$post_id,'active'=>1));
        return $result->first_row('array');
    }
    public function insert($data){
        $this->db->insert('posts',$data);
        return $this->db->insert_id();
    }
    public function update($postID, $data){
        //echo var_dump($data);
       // echo "<br> post id {$postID}";
        $this->db->where('postID',$postID);
        $this->db->update('posts',$data);        
    }
    public function delete($postID){
        $this->db->where('postID',$postID);
        $this->db->delete('posts');         
    }
    public function get_page_count(){
        $result = $this->db->get_where('posts',array('active'=>1));
        return count($result->result_array());
    }
}
