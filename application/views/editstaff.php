<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Staff Management
        <small>Add / Edit Staff</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $userdata = $userdata[0]; ?>
                    <form role="form" id="addUser" action="<?php echo base_url() ?>records/editstaff/<?php echo $userdata->userId ?>" method="post">
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" required id="fname" name="fname" value="<?php echo $userdata->name ?>" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Last Name</label>
                                        <input type="text" class="form-control" required id="lname" name="lname" value="<?php echo $userdata->last_name ?>" maxlength="128">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Mobile</label>
                                        <input type="text" class="form-control" required id="email" value="<?php echo $userdata->mobile ?>"  name="mobile" maxlength="15">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">User Status*</label>
                                        <select name="user_status" class="form-control required">
											<option value=""></option>
                                            <option value="0" <?php echo ($userdata->isDeleted == '0')?'selected="selected"':'' ?>>Active</option>
                                            <option value="1" <?php echo ($userdata->isDeleted == '1')?'selected="selected"':'' ?>>In Active</option>
										</select>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control email" required id="email" value="<?php echo $userdata->email ?>"  name="email" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Password</label>
                                        <input type="password" class="form-control required"  value="" name="password">
                                        (enter new password to update or leave blank)
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <a href="<?php echo base_url() ?>records/staffListing" class="btn btn-default">Cancel</a>
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
