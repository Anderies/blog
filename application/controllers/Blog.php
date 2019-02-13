<?php

class Blog extends CI_Controller{

	//daftarin 1 fungsi untuk semua method dan fungsi akan di load di awalan setiap method
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');

	}

	public function index(){

		

		$query = $this->db->query("SELECT * FROM blog");
		$data['blogs'] = $query->result_array();

		$this->load->view('blog' , $data );
	}

	public function detail($url){
		
		$this->db->where('url',$url);
		$query = $this->db->get('blog');
		$data['blog'] = $query->row_array();

		$this->load->view('detail',$data);
	}
}
?> 