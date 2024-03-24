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
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>records/addstaff" method="post">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" required id="fname" name="fname" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Last Name</label>
                                        <input type="text" class="form-control" required id="lname" name="lname" maxlength="128">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="text" class="form-control email" required id="email"  name="email" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Password</label>
                                        <input type="password" class="form-control" required id="password"  name="password" maxlength="30">
                                    </div>
                                </div>
                            </div>

							<div class="row">
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Mobile</label>
                                        <input type="text" class="form-control" required id="email"  name="mobile" maxlength="15">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">Company</label>
                                    <input type="text" class="form-control" id="buisness_name" name="buisness_name" maxlength="255">
                                        
                                    </div>
                                </div>
                            </div>
							<div class="row">					
                                
                                <div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">Address</label>
                                    <input type="text" class="form-control"  id="address"  name="address" maxlength="50">
                                        
                                    </div>
                                </div>

								<div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">Address Line 2</label>
                                    <input type="text" class="form-control"  id="address2"  name="address2" maxlength="50">
                                        
                                    </div>
                                </div>
								

                            </div>

							<div class="row">					
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">City</label>
                                        <input type="text" class="form-control"  id="suburb"  name="suburb" maxlength="50">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">State</label>
                                    <input type="text" class="form-control"  id="state_name"  name="state_name" maxlength="50">
                                        
                                    </div>
                                </div>
								

                            </div>

							<div class="row">
							
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Zip</label>
                                        <input type="text" class="form-control"  id="postcode"  name="postcode" maxlength="50">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
									<label for="fname">Country</label>
                                    <input type="text" class="form-control"  id="country"  name="country" maxlength="50">
                                        
                                    </div>
                                </div>
								

                            </div>

							<div class="row">

							<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Role</label>
                                        <select name="roleId" id="roleId" class="form-control">
										<option value="2">Admin</option>
										<option value="4">Account Manager</option>			

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
