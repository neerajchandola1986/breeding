<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> View Booking Details
        <small>View Booking</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Booking Information</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Booking Date : </label>
                                        <?php echo date('m/d/Y',strtotime($booking_info->booking_date)); ?>
										</div>                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Booking Type : </label>
                                        <?php echo $booking_info->booking_type; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Stallion : </label>
                                        <?php echo $booking_info->stallion; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Mare Name : </label>
                                        <?php echo $booking_info->mare_name; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Microchip Number : </label>
                                        <?php echo $booking_info->microchip_number; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Sire : </label>
                                        <?php echo $booking_info->sire; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Dam : </label>
                                        <?php echo $booking_info->dam; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Mares Date Of Birth : </label>
                                        <?php echo date('m/d/Y',strtotime($booking_info->mare_dob)); ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Semen Use : </label>
                                        <?php echo $booking_info->semen_use; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Delivery Method : </label>
                                        <?php echo $booking_info->delivery_method; ?>
										</div>
                                    
                                </div>

								

                                
                                
                            </div>
                            
                            
                        </div><!-- /.box-body -->




						<div class="box-header">
                        <h3 class="box-title">Owner Information</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">First Name : </label>
                                        <?php echo $user_info['name']; ?>
										</div>                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Last Name : </label>
                                        <?php echo $user_info['last_name']; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Email : </label>
                                        <?php echo $user_info['email']; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Phone : </label>
                                        <?php echo $user_info['mobile']; ?>
										</div> 
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Street Address : </label>
                                        <?php echo $user_info['address']; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Address Line 2 : </label>
                                        <?php echo $user_info['address2']; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">City : </label>
                                        <?php echo $user_info['suburb']; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">County / State / Region : </label>
                                        <?php echo $user_info['state_name']; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Eir/Zip/Postal Code :  </label>
                                        <?php echo $user_info['postcode']; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Country : </label>
                                        <?php echo $user_info['country']; ?>
										</div>
                                    
                                </div>

                                
                                
                            </div>
                            
                            
                        </div><!-- /.box-body -->





						<div class="box-header">
                        <h3 class="box-title">Payment Information</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    
                        <div class="box-body">
                            <div class="row">
                                
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Payment Type : </label>
                                        <?php echo $booking_info->payment_type; ?>
										</div>                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Payment Status : </label>
                                        <?php echo $booking_info->payment_status; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Amount : </label>
                                        <?php echo ($order_info->paid_amount?'$'.$order_info->paid_amount:'NA'); ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Card Number : </label>
                                        <?php echo $order_info->card_number?'************'.$order_info->card_number:'NA'; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Transaction ID : </label>
                                        <?php echo $order_info->txn_id?$order_info->txn_id:'NA'; ?>
										</div>
                                    
                                </div>

								<div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="fname">Payment Date : </label>
                                        <?php echo ($order_info->created?date('m/d/Y H:i a',strtotime($order_info->created)):'NA'); ?>
										</div>
                                    
                                </div>

								
								

                                
                                
                            </div>
                            
                            
                        </div><!-- /.box-body -->



    
                        <div class="box-footer">
                            
                            <a href="<?php echo base_url() ?>records/bookingListing" class="btn btn-default">Back</a>
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
