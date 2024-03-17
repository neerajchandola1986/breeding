<?php $this->load->view('header_front'); ?>
<!--Form Open-->
<?php
$userinfo = geruser_info($this->session->userdata('userId'));
?>
<form action="<?php echo base_url(); ?>customer/index" method="GET">
<div class="container py-4" style="min-height:400px;">
      <div class="row" align="center">
      <div class="font-weight-bold text-black text-center"> 
            <section class="content-header">
            <h1>
            404
            <small>This is not the page you are looking for.</small>
            </h1>
            </section>
            <section class="content">
            <div class="row">
            <div class="col-xs-12 text-center">
                <img src="<?php echo base_url() ?>assets/images/404.png" alt="Page Not Found Image" />
            </div>
            </div>
            </section>
      </div>
      </div>
   </div>
</form>
<!--Form End--> 
<?php $this->load->view('footer_front'); ?>