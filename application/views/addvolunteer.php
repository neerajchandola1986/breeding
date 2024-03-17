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
                    <?php
					$getuserdata =  getproject_info($pid);
					$getuserdata = $getuserdata;
					?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>records/addvolunteer/<?php echo $pid; ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Project ID</label>
                                    <select name="" class="form-control required" disabled="disabled">
                                        <option value="--"></option> 
                                        <?php 
										$getcategory = getproject();
										foreach($getcategory as $in)
										{
										?>
                                        <option value="<?php echo $in['id']; ?>" <?php echo ($pid == $in['id'])?'selected="selected"':'' ?>><?php echo $in['id']; ?></option> 
                                        <?php 
										}
										?>
                                    </select>
                                    <input type="hidden" name="p_id" value="<?php echo $pid; ?>"  />
                                  </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Date</label>
                                        <div id="newdate" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <input class="form-control" type="text" name="date" id="date_added" value="<?php echo $getuserdata->date; ?>" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control required" required="required" id="v_fname" name="v_fname">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Last Name</label>
                                        <input type="text" class="form-control required" required="required" id="v_lname" name="v_lname">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Trail work hrs.- Basic</label>
                                        <input type="text" class="form-control required" id="tbas" name="tbas">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Trail work hrs.- Skilled</label>
                                        <input type="text" class="form-control required" id="tskl" name="tskl">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Non-trail Work Hrs</label>
                                        <input type="text" class="form-control required" id="ntwork" name="ntwork">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Round trip travel time</label>
                                        <input type="text" class="form-control required" id="trtime" name="trtime">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Round trip travel miles</label>
                                        <input type="text" class="form-control required" id="tmile" name="tmile">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Power eqipment</label>
                                        <input type="text" class="form-control required" id="peq" name="peq">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Heavy equipment</label>
                                        <input type="text" class="form-control required" id="heq" name="heq">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Stock days</label>
                                        <input type="text" class="form-control required" id="stkdays" name="stkdays">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Donation amount</label>
                                        <input type="text" class="form-control required" id="donate" name="donate">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Description of work, if different from project</label>
                                        <textarea class="form-control required" id="idesc" name="idesc"></textarea>
                                    </div>
                                </div>
                                <?php 
								$dataproject = getproject_info($pid);
								if($dataproject->agency == 3){
								?>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Gender and Age Grp</label>
                                         <select class="form-control required" name="gage">
                                         	<option value=""></option>
                                            <option value="m15">Male 15-18</option>
                                            <option value="m18">Male 19-24</option>
                                            <option value="m25">Male 25-35</option>
                                            <option value="m35">Male 36-54</option>
                                            <option value="m55">Male 55+</option>
                                            <option value="f15">Female 15-18</option>
                                            <option value="f18">Female 19-24</option>
                                            <option value="f25">Female 25-35</option>
                                            <option value="f35">Female 36-54</option>
                                            <option value="f55">Female 55+</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Hispanic(Yes/No) :</label>
                                    <select name="eth" class="form-control required">
                                        <option value="--"></option> 
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Disabled(Yes/No):</label>
                                    <select name="disabled" class="form-control required">
                                        <option value="--"></option> 
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                  </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div><!-- /.box-body -->
                        
                        
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-warning" name="addmore" value="Add More" />
                            <input type="submit" class="btn btn-primary"  name="addmore"  value="Finish" />
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