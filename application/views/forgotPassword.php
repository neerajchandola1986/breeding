<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Whatdata</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--CSS Files----->
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/front/images/favicon.png" />
    <!--CSS Files----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/imgeffects.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/media.css">
</head>
<body>
<!--NAV OPEN-->
<nav class="navbar_custum">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-12 text-nowrap text-center text-md-left">
      		<a class="navbar-brand d-inline-block" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/front/images/logo.png" class="img-fluid" title="Logo"></a>
        <h3 class="d-inline-block"><a href="#!">1300 669 711</a></h3>
      </div>
      <div class="col-md-6 col-12">
        <ul>
          <li ><a class="nav-link" href="<?php echo base_url(); ?>" title="Home"><i class="fa fa-home"></i> Home </a></li>
          <li><a href="<?php echo base_url(); ?>login" title="Login"><i class="fa fa-sign-in"></i> Login</a></li>
          <li class="active"><a class="nav-link" href="<?php echo base_url(); ?>register" title="Register"><i class="fa fa-user"></i> Register</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!--NAV CLOSE--> 
<!--NAV CLOSE--> 

<!--Form Open-->
<div class="container py-5">
  <div class="row">
    <div class="col-lg-8 form-group">
      <h1 class="mb-5">Check What Is New</h1>
      <div class="row mb-4">
        <div class="col-sm-2 col-12 mb-4">
          <div class="icon_circle"> <i class="fa fa-users"></i> </div>
        </div>
        <div class="col-sm-10 col-12 mb-4 text-center text-sm-left">
          <h5>Australian Criminal And Civil Court Records</h5>
          <p>Access thousands of national Court Hearing Lists</p>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-sm-2 col-12 mb-4">
          <div class="icon_circle"> <i class="fa fa-users"></i> </div>
        </div>
        <div class="col-sm-10 col-12 mb-4 text-center text-sm-left">
          <h5>Australian Tribunal Records</h5>
          <p>Access thousands of national Tribunal Hearing Lists</p>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-sm-2 col-12 mb-4">
          <div class="icon_circle"> <i class="fa fa-search"></i> </div>
        </div>
        <div class="col-sm-10 col-12 mb-4 text-center text-sm-left">
          <h5>Search By Name Or Company</h5>
          <p>We offer a range of search options; including individual name, company name, date, state and case number</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 form-group">
      <div class="card mb-4">
        <div class="card-header font-weight-bold text-white text-center"><i class="fa fa-user"></i> RETREIVE YOUR ACCOUNT </div>
        <div class="card-body">
			<?php
            $this->load->helper('form');
            $error = $this->session->flashdata('error');
            if($error)
            {
            ?>
            <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error; ?>                    
            </div>
            <?php }
            $success = $this->session->flashdata('success');
            if($success)
            {
            ?>
            <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $success; ?>                    
            </div>
            <?php } ?>
        <form action="<?php echo base_url(); ?>forgotPassword" method="post">
          <div class="row">
            <div class="col-md-12 mb-4">
              <label>Email</label>
              <input type="text" class="form-control" name="email" placeholder="Enter your email" required>
            </div>
            <div class="col-md-12 mb-4">
              <button type="submit" class="btn btn_new">Submit</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!--Form End--> 

<!--FOOTER Open-->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center text-white">
        <h3 class="mb-5">Whatdata - Australian Court and Tribunal Records</h3>
        <p><strong>Phone:</strong> 1300 669 711</p>
        <p><strong>Address:</strong> PO Box 604, Byron Bay NSW 2481</p>
        <p><strong>Email:</strong> info@whatdata.com.au</p>
        <p class="mt-5">Whatdata is a trading name of Halpin Consulting Pty Ltd. All Rights Reserved 2019.</p>
      </div>
    </div>
  </div>
</footer>
<!--FOOTER Close--> 
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> 
<!--JS Files-----> 
<script src="<?php echo base_url(); ?>assets/front/js/jquery-3.3.1.slim.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> 
<script>
$(function () {
  $("#startdate").datepicker({
	autoclose: true, 
	todayHighlight: true
  }).datepicker('update', new Date());
	
  $("#enddate").datepicker({
	autoclose: true, 
	todayHighlight: true
  }).datepicker('update', new Date());

});
</script>
</body>
</html>