 <?php $this->load->view('partial/header'); ?>
 <!-- Page Header -->
  <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Andre Blog</h1>
            <span class="subheading">Read my blog with calm mind and Heart</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col->md-10 mx-auto">
      	<?php echo $this->session->flashdata('message');?>
      	<?php echo form_open();?>
	      	<div class="form-group">
	      		<label for="username">Username</label>
	      		<input type="text" name="username" class="form-control">
	      	</div>

	      	<div class="form-group">
	      		<label for="password">Password</label>
	      		<input type="password" name="password" class="form-control">
	      	</div>

	      	<button type="submit" class="btn btn-primary">LOGIN</button>
      </form>

      </div>
  </div>
</div>

<?php $this->load->view('partial/footer'); ?>

