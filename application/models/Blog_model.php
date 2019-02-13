<?php

class Blog_model extends CI_Model{

	public function getBlogs(){
		return $this->db->query("SELECT * FROM blog");
	}
	
	public function getSingleBlog($field,$value){
		$this->db->where($field,$value);
		return $this->db->get('blog');
	}

	public function insertBlog($data){
		$this->db->insert('blog' , $data);
		return $this->db->insert_id();
	}

	public function updateBlog($id,$post)
	{
		$this->db->where('id',$id);
		$this->db->update('blog',$post);
		return $this->db->affected_rows();
	}

	public function deleteBlog($id){
		$this->db->where('id',$id);
		$this->db->delete('blog');
		return $this->db->affected_rows();
	}
}