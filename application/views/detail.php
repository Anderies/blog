<?php $this->load->view('partial/header');?>
<!-- Page Header -->

<!-- url foto di local -->
<?php
    if (empty($blog['cover'])) {
      $cover = base_url() . 'assets/img/post-bg.jpg';
    }else{
      $cover = base_url() . 'uploads/' . $blog['cover'];
}
?>
  <header class="masthead" 
  style="background-image: url('<?php echo $cover; ?>')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $blog['title']; ?></h1>
            <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
            <span class="meta">Posted on <?php echo $blog['date']?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        	<?php echo $blog['content'];?>
        </div>
      </div>
    </div>
  </article>

  <hr>




<?php $this->load->view('partial/footer');?>	