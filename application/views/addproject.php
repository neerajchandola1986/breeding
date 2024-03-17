<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Project Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Project Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>records/addproject" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Agency</label>
                                    <select name="agency" class="form-control required" required="required">
                                        <option value=""></option> 
                                        <?php 
										$getcategory = getcategory();
										foreach($getcategory as $in)
										{
										?>
                                        <option value="<?php echo $in['id']; ?>"><?php echo $in['name']; ?></option> 
                                        <?php 
										}
										?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">District</label>
                                    <select name="district" class="form-control required">
                                        <option value="--"></option> 
                                        <option value="Ava">Ava</option>
                                        <option value="Cassville">Cassville</option> 
                                        <option value="Cedar Creek">Cedar Creek</option> 
                                        <option value="Eleven Point">Eleven Point</option> 
                                        <option value="Fredricktown">Fredricktown</option> 
                                        <option value="Houston">Houston</option> 
                                        <option value="Potosi">Potosi</option> 
                                        <option value="Poplar Bluff">Poplar Bluff</option> 
                                        <option value="Rolla">Rolla</option> 
                                        <option value="Salem">Salem</option> 
                                        <option value="Willow Springs">Willow Springs</option> 
                                        <option value="CoE KC">CoE KC</option>
                                        <option value="CoE STL">CoE STL</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Chapter</label>
                                    <select name="chapter" class="form-control required" required="required">
                                        <option value=""></option> 
                                        <option value="Brownfield">Brownfield</option>
                                        <option value="Cuivre River">Cuivre River</option> 
                                        <option value="Heartland">Heartland</option> 
                                        <option value="Indian Trails">Indian Trails</option> 
                                        <option value="Mountain Rider">Mountain Riders</option> 
                                        <option value="NEMO">NEMO</option> 
                                        <option value="Ridge Runner">Ridge Runner</option> 
                                        <option value="River Springs">River Springs</option> 
                                        <option value="South Central">South Central</option> 
                                        <option value="Tornado Ridge">Tornado Ridge</option> 
                                        <option value="Tri Lakes">Tri Lakes</option> 
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Date</label>
                                        <div id="newdate" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <input class="form-control" type="text" name="date_added" id="date_added" required="required" value="<?php echo date('Y-m-d') ?>" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Non- wilderness trail miles worked by group,<br /> not each individual</label>
                                        <input type="text" class="form-control required" id="nwmile" name="nwmile">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Wilderness trail miles worked by group,<br /> not each individual</label>
                                        <input type="text" class="form-control required" id="wmile" name="wmile">
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->
                        
                        
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Add Volunteers" />
                            <a href="<?php echo base_url() ?>records/manageproject" class="btn btn-default">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
<script src="<?php echo base_url(); ?>assets/front/js/jquery-3.3.1.slim.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> 
<script>
$(function () {
  $("#newdate").datepicker({
	autoclose: true,
	dateFormat: 'yy-mm-dd'
  });
});
</script> 