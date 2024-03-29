<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Greg Broderick</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.png" sizes="32x32" />
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <style>
    	.error{
    		color:red;
    		font-weight: normal;
    	}
    </style>
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- <body class="sidebar-mini skin-black-light"> -->
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header" style="background-color:#343957;">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo" style="background-color:#343957;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?php echo base_url(); ?>assets/images/favicon.png" width="40" class="img-responsive" style="margin:8px 0px 0px 8px;"/></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><table><tr><td><img src="<?php echo base_url(); ?>assets/images/favicon.png"  class="img-responsive" width="40"/></td><td> <b>&nbsp;Greg Broderick</b></td></tr></table></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="background-color:#343957;">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo $name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url();?>assets/dist/img/trail_horse.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $name; ?>
                      <small><?php echo $role_text; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Edit Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="background-color:#343957;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/dist/img/trail_horse.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata ( 'name' ); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
			<li class="treeview">
              <a href="<?php echo base_url(); ?>dashboard">
                <i class="fa fa-list"></i>
                <span>Dashboard</span>
              </a>
            </li>
            
            <?php if($this->session->userdata ( 'role' ) == 1){ ?>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>records/staffListing">
                <i class="fa fa-list"></i>
                <span>Manage Staff</span>
              </a>
            </li>
			<li class="treeview">
              <a href="<?php echo base_url(); ?>records/stallionlist">
                <i class="fa fa-list"></i>
                <span>Manage Stallion</span>
              </a>
            </li>


            
			
            <?php } ?>

			<li class="treeview">
              <a href="<?php echo base_url(); ?>records/bookingListing">
                <i class="fa fa-list"></i>
                <span>Bookings</span>
              </a>
            </li>

			<li class="treeview">
              <a href="<?php echo base_url(); ?>records/userListing">
                <i class="fa fa-list"></i>
                <span>Customers</span>
              </a>
            </li>
            
           
            <li class="treeview">
              <a href="<?php echo base_url(); ?>loadChangePass">
                <i class="fa fa-list"></i>
                <span>Edit Profile</span>
              </a>
            </li>
            <li class="treeview">
              <a href="<?php echo base_url(); ?>logout">
                <i class="fa fa-sign-out"></i>
                <span>Signout</span>
              </a>
            </li>
          </ul>
        </section>
        <div class="sidebar-background" style="background-image: url(<?php echo base_url(); ?>assets/images/sidebar-5.jpg);"></div>
        <!-- /.sidebar -->
      </aside>
      <style>
	  .sidebar{
		position: relative;
		max-height: calc(100vh - 75px);
		min-height: 100%;
		overflow: auto;
		z-index: 4;
		padding-bottom: 100px;  
	  }
	  .sidebar-background{
	  	position: absolute;
		z-index: 1;
		height: 100%;
		width: 100%;
		display: block;
		top: 0;
		left: 0;
		background-size: cover;
		background-position: center center;
		opacity:.13;
	  }
	  
	  .content-wrapper{
		   background-color:#ffffff !important;
	  }
	  </style>