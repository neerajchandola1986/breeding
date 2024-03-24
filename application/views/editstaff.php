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

							<div class="row">
								 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Mobile</label>
                                        <input type="text" class="form-control" required id="email" value="<?php echo $userdata->mobile ?>"  name="mobile" maxlength="15">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">Company</label>
                                    <input type="text" class="form-control" id="buisness_name" name="buisness_name" value="<?php echo $userdata->buisness_name ?>" maxlength="255">
                                        
                                    </div>
                                </div>
                            </div>
							<div class="row">					
                                
                                <div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">Address</label>
                                    <input type="text" class="form-control"  id="address"  name="address" value="<?php echo $userdata->address ?>" maxlength="50">
                                        
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">Address Line 2</label>
                                    <input type="text" class="form-control"  id="address2"  name="address2" value="<?php echo $userdata->address2 ?>" maxlength="50">
                                        
                                    </div>
                                </div>
								

                            </div>

							<div class="row">					
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">City</label>
                                        <input type="text" class="form-control"  id="suburb"  name="suburb" value="<?php echo $userdata->suburb ?>" maxlength="50">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">State</label>
                                    <input type="text" class="form-control"  id="state_name"  name="state_name" value="<?php echo $userdata->state_name ?>" maxlength="50">
                                        
                                    </div>
                                </div>
								

                            </div>

							<div class="row">
							
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Zip</label>
                                        <input type="text" class="form-control"  id="postcode"  name="postcode" value="<?php echo $userdata->postcode ?>" maxlength="50">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">Country</label>
                                    <input type="text" class="form-control"  id="country"  name="country" value="<?php echo $userdata->country ?>" maxlength="50">
                                        
                                    </div>
                                </div>
								

                            </div>

							<div class="row">
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Role</label>
                                        <select name="roleId" id="roleId" class="form-control">
										<option value="3" <?php echo (($userdata->roleId==3)?'selected':'');?> >Admin</option>
										<option value="4" <?php echo (($userdata->roleId==4)?'selected':'');?>>Account Manager</option>
										

										</select>
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
