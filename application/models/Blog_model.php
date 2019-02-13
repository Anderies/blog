<?php

class Blog_model extends CI_Model{

	public function getBlogs(){
		return $this->db->query("SELECT * FROM blog");
	}
	public function getSingleBlog($url){
		$this->db->where('url',$url);
		return $this->db->get('blog');
	}
	public function insertBlog($data){
		$this->db->insert('blog' , $data);
		return $this->db->insert_id();
	}
}