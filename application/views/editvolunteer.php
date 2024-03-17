<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Volunteer Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Volunteer Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $vdata = $userdata[0]; ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>records/editvolunteer/<?php echo $vdata->v_id ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Project ID</label>
                                    <select name="" class="form-control required"  disabled="disabled">
                                        <option value="--"></option> 
                                        <?php 
										$getcategory = getproject();
										foreach($getcategory as $in)
										{
										?>
                                        <option value="<?php echo $in['id']; ?>" <?php echo ($vdata->p_id == $in['id'])?'selected="selected"':'' ?>><?php echo $in['id']; ?></option> 
                                        <?php 
										}
										?>
                                    </select>
                                    <input type="hidden" name="p_id" value="<?php echo $vdata->p_id; ?>"  />
                                  </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Date</label>
                                        <div id="newdate" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <input class="form-control" type="text" name="date" id="date_added" value="<?php echo $vdata->date ?>" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control required" id="v_fname" value="<?php echo $vdata->v_fname ?>" name="v_fname">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Last Name</label>
                                        <input type="text" class="form-control required" id="v_lname" value="<?php echo $vdata->v_lname ?>" name="v_lname">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Trail work hrs.- Basic</label>
                                        <input type="text" class="form-control required" id="tbas" value="<?php echo $vdata->tbas ?>" name="tbas">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Trail work hrs.- Skilled</label>
                                        <input type="text" class="form-control required" id="tskl" value="<?php echo $vdata->tskl ?>" name="tskl">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Non-trail Work Hrs</label>
                                        <input type="text" class="form-control required" id="ntwork" value="<?php echo $vdata->ntwork ?>" name="ntwork">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Round trip travel time</label>
                                        <input type="text" class="form-control required" id="trtime" value="<?php echo $vdata->trtime ?>" name="trtime">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Round trip travel miles</label>
                                        <input type="text" class="form-control required" id="tmile" value="<?php echo $vdata->tmile ?>" name="tmile">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Power eqipment</label>
                                        <input type="text" class="form-control required" id="peq" value="<?php echo $vdata->peq ?>" name="peq">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Heavy equipment</label>
                                        <input type="text" class="form-control required" id="heq" value="<?php echo $vdata->heq ?>" name="heq">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Stock days</label>
                                        <input type="text" class="form-control required" id="stkdays" value="<?php echo $vdata->stkdays ?>" name="stkdays">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Donation amount</label>
                                        <input type="text" class="form-control required" id="donate" value="<?php echo $vdata->donate ?>" name="donate">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Description of work, if different from project</label>
                                        <textarea class="form-control required" id="idesc" name="idesc"><?php echo stripslashes($vdata->idesc) ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Gender and Age Grp</label>
                                         <select class="form-control required" name="gage">
                                         	<option value=""></option>
                                            <option value="m15" <?php echo ($vdata->gage == 'm15')?'selected="selected"':'' ?>>Male 15-18</option>
                                            <option value="m18" <?php echo ($vdata->gage == 'm18')?'selected="selected"':'' ?>>Male 19-24</option>
                                            <option value="m25" <?php echo ($vdata->gage == 'm25')?'selected="selected"':'' ?>>Male 25-35</option>
                                            <option value="m35" <?php echo ($vdata->gage == 'm35')?'selected="selected"':'' ?>>Male 36-54</option>
                                            <option value="m55" <?php echo ($vdata->gage == 'm55')?'selected="selected"':'' ?>>Male 55+</option>
                                            <option value="f15" <?php echo ($vdata->gage == 'f15')?'selected="selected"':'' ?>>Female 15-18</option>
                                            <option value="f18" <?php echo ($vdata->gage == 'f18')?'selected="selected"':'' ?>>Female 19-24</option>
                                            <option value="f25" <?php echo ($vdata->gage == 'f25')?'selected="selected"':'' ?>>Female 25-35</option>
                                            <option value="f35" <?php echo ($vdata->gage == 'f35')?'selected="selected"':'' ?>>Female 36-54</option>
                                            <option value="f55" <?php echo ($vdata->gage == 'f55')?'selected="selected"':'' ?>>Female 55+</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Hispanic- Yes/No :</label>
                                    <select name="eth" class="form-control required">
                                        <option value="--"></option> 
                                        <option value="1" <?php echo ($vdata->eth == '1')?'selected="selected"':'' ?>>Yes</option>
                                        <option value="0" <?php echo ($vdata->eth == '0')?'selected="selected"':'' ?>>No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Disabled :</label>
                                    <select name="disabled" class="form-control required">
                                        <option value="--"></option> 
                                        <option value="1" <?php echo ($vdata->disabled == '1')?'selected="selected"':'' ?>>Yes</option>
                                        <option value="0" <?php echo ($vdata->disabled == '0')?'selected="selected"':'' ?>>No</option>
                                    </select>
                                  </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        
                        
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
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