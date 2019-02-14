<?php

class Blog extends CI_Controller{

	//daftarin 1 fungsi untuk semua method dan fungsi akan di load di awalan setiap method
	public function __construct(){
		parent::__construct();
		
		$this->load->model('Blog_model');
	}

	public function index($offset = 0){
		$this->load->library('pagination');
		$config['base_url'] = site_url('blog/index');
		$config['total_rows'] = $this->Blog_model->getTotalBlogs(); //untuk mengambil total dari blogs
		$config['per_page'] = 3;
		$this->pagination->initialize($config);

		$query = $this->Blog_model->getBlogs($config['per_page'] , $offset);
		$data['blogs'] = $query->result_array();
		
		$this->load->view('blog' , $data );
	}

	public function detail($url){
		$query = $this->Blog_model->getSingleBlog('url',$url);
		$data['blog'] = $query->row_array();
		$this->load->view('detail',$data);
	}

	public function add()
	{
		// Validasi Form menunjukkan bahwa title , url dan content harus di isi
		//URL mengikuti aturan alpha_dash
		$this->form_validation->set_rules('title','Judul','required');
		$this->form_validation->set_rules('url','URL','required|alpha_dash');
		$this->form_validation->set_rules('content','Konten','required');

		//Apabila Form Validasi bersifat TRUE maka simpan
		if ($this->form_validation->run() === TRUE) {
			$data['title'] = $this->input->post('title');
			$data['content'] = $this->input->post('content');
			$data['url'] = $this->input->post('url');
		
		 	$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png||jpeg';
            $config['max_size']             = 400000;
            $config['max_width']            = 4024;
            $config['max_height']           = 3768;

            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('cover'))
                {
                        echo $this->upload->display_errors();
                }
                else
                {
                		$data['cover'] = $this->upload->data()['file_name'];

                }
			$id = $this->Blog_model->insertBlog($data);

			if ($id) {
				echo "Data Berhasil disimpan";
				redirect('/');
			}else
				echo "Data Gagal Disimpan";
		}		
		
		$this->load->view('form_add');
	}

	public function edit($id){
		$query = $this->Blog_model->getSingleBlog('id',$id);
		$data['blog'] = $query->row_array();

		// Validasi Form menunjukkan bahwa title , url dan content harus di isi
		//URL mengikuti aturan alpha_dash
		$this->form_validation->set_rules('title','Judul','required');
		$this->form_validation->set_rules('url','URL','required|alpha_dash');
		$this->form_validation->set_rules('content','Konten','required');
		

		if ($this->form_validation->run() === TRUE) {
			$post['title'] = $this->input->post('title');
			$post['content'] = $this->input->post('content');
			$post['url'] = $this->input->post('url');
		
			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png||jpeg';
            $config['max_size']             = 400000;
            $config['max_width']            = 4024;
            $config['max_height']           = 3768;

            $this->load->library('upload', $config);
            $this->upload->do_upload('cover');

            if (!empty($this->upload->data()['file_name'])){
                 $post['cover'] = $this->upload->data()['file_name'];
            }
                
			$id = $this->Blog_model->updateBlog($id, $post);

			if ($id) {
				echo "Data Berhasil disimpan";
				redirect('/');
			}else
				echo "Data Gagal Disimpan";
		}
		$this->load->view('form_edit',$data);		
	}

	public function delete($id){
		$this->Blog_model->deleteBlog($id);
		redirect('/');

	}
}
?> 