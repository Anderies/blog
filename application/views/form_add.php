<?php $this->load->view('partial/header'); ?>

<!-- Page Header -->
  <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Tambah Artikel Baru</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
  	<div class="row justify-content-center">
  		<div class="col-md-9">

	<h1>Tambah Artikel</h1>

	<div class="alert alert-warning">
	<?php echo validation_errors();?>
	</div>

	<?php echo form_open_multipart();?>
		<div class="form-group">
			<label>Judul</label>
			<!-- paramater 1 name , parameter 2 value, parameter 3 atribut apapun -->
			<?php echo form_input('title',set_value('title'),'class="form-control"');?>
		</div>

		<div class="form-group">
			<label>URL</label>          
			<!--set value disini berguna apabila user sudah mengisi title,url,dan konten dan jika ia menuliskan url salah dan menyimpan maka data yang sudah di isi tidak akan hilang --> 
			<?php echo form_input('url',set_value('url'),'class="form-control"');?>
		</div> 

		<div class="form-group">
			<label>Konten</label>
			<?php echo form_textarea('content',set_value('content'),'class="form-control"');?>
		</div>

		<div class="form-group">
			<label>Cover</label>
			<?php echo form_upload('cover',set_value('cover'),'class="form-control"');?>
		</div>

	<button class="btn btn-primary"type="submit">Simpan Artikel</button>
	<?php echo form_close(); ?>
	
	</div>
  </div>
 </div>
<?php $this->load->view('partial/footer'); ?>
