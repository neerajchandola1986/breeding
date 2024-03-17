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
                
                
                <?php 
				$getuserdata =  getproject_info($toedit_id);
				$getuserdata = $getuserdata;
				?>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Project Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>records/editproject/<?php echo $toedit_id; ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Agency</label>
                                    <select name="agency" class="form-control required">
                                        <option value="--"></option> 
                                        <?php 
										$getcategory = getcategory();
										foreach($getcategory as $in)
										{
										?>
                                        <option value="<?php echo $in['id']; ?>" <?php echo ($getuserdata->agency == $in['id'])?'selected="selected"':'' ?>><?php echo $in['name']; ?></option> 
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
                                        <option value="Ava" <?php echo ($getuserdata->district == "Ava")?'selected="selected"':'' ?>>Ava</option>
                                        <option value="Cassville" <?php echo ($getuserdata->district == "Cassville")?'selected="selected"':'' ?>>Cassville</option> 
                                        <option value="Cedar Creek" <?php echo ($getuserdata->district == "Cedar Creek")?'selected="selected"':'' ?>>Cedar Creek</option> 
                                        <option value="Eleven Point" <?php echo ($getuserdata->district == "Eleven Point")?'selected="selected"':'' ?>>Eleven Point</option> 
                                        <option value="Fredricktown" <?php echo ($getuserdata->district == "Fredricktown")?'selected="selected"':'' ?>>Fredricktown</option> 
                                        <option value="Houston" <?php echo ($getuserdata->district == "Houston")?'selected="selected"':'' ?>>Houston</option> 
                                        <option value="Potosi" <?php echo ($getuserdata->district == "Potosi")?'selected="selected"':'' ?>>Potosi</option> 
                                        <option value="Poplar Bluff" <?php echo ($getuserdata->district == "Poplar Bluff")?'selected="selected"':'' ?>>Poplar Bluff</option> 
                                        <option value="Rolla" <?php echo ($getuserdata->district == "Rolla")?'selected="selected"':'' ?>>Rolla</option> 
                                        <option value="Salem" <?php echo ($getuserdata->district == "Salem")?'selected="selected"':'' ?>>Salem</option> 
                                        <option value="Willow Springs" <?php echo ($getuserdata->district == "Willow Springs")?'selected="selected"':'' ?>>Willow Springs</option> 
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Chapter</label>
                                    <select name="chapter" class="form-control required">
                                        <option value="--"></option> 
                                        <option value="Brownfield" <?php echo ($getuserdata->chapter == "Brownfield")?'selected="selected"':'' ?>>Brownfield</option>
                                        <option value="Cuivre River" <?php echo ($getuserdata->chapter == "Cuivre River")?'selected="selected"':'' ?>>Cuivre River</option> 
                                        <option value="Heartland" <?php echo ($getuserdata->chapter == "Heartland")?'selected="selected"':'' ?>>Heartland</option> 
                                        <option value="Indian Trails" <?php echo ($getuserdata->chapter == "Indian Trails")?'selected="selected"':'' ?>>Indian Trails</option> 
                                        <option value="Mountain Rider" <?php echo ($getuserdata->chapter == "Mountain Rider")?'selected="selected"':'' ?>>Mountain Riders</option> 
                                        <option value="NEMO" <?php echo ($getuserdata->chapter == "NEMO")?'selected="selected"':'' ?>>NEMO</option> 
                                        <option value="Ridge Runner" <?php echo ($getuserdata->chapter == "Ridge Runner")?'selected="selected"':'' ?>>Ridge Runner</option> 
                                        <option value="River Springs" <?php echo ($getuserdata->chapter == "River Springs")?'selected="selected"':'' ?>>River Springs</option> 
                                        <option value="South Central" <?php echo ($getuserdata->chapter == "South Central")?'selected="selected"':'' ?>>South Central</option> 
                                        <option value="Tornado Ridge" <?php echo ($getuserdata->chapter == "Tornado Ridg")?'selected="selected"':'' ?>>Tornado Ridge</option> 
                                        <option value="Tri Lakes" <?php echo ($getuserdata->chapter == "Tri Lakes")?'selected="selected"':'' ?>>Tri Lakes</option> 
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Date</label>
                                        <div id="newdate" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <input class="form-control" type="text" name="date_added" id="date_added" value="<?php echo $getuserdata->date; ?>" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Non- wilderness trail miles worked by group,<br /> not each individual</label>
                                        <input type="text" class="form-control required" value="<?php echo $getuserdata->nwmile; ?>" id="nwmile" name="nwmile">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Wilderness trail miles worked by group,<br /> not each individual</label>
                                        <input type="text" class="form-control required" value="<?php echo $getuserdata->wmile; ?>" id="wmile" name="wmile">
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div><!-- /.box-body -->
                        
                        
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Edit" />
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