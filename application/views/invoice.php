
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;

			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> View Invoice
        <small>View Invoice</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Invoice</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    
                        <div class="box-body">
                            
<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img
										src="<?php echo base_url();?>assets/images/favicon_t.png"
										style="width: 20%; max-width: 300px"
									/>
								</td>

								<td>
									Invoice #: <?php echo $booking_info->id; ?><br />
									Booking Date: <?php echo date('m/d/Y',strtotime($booking_info->booking_date)); ?><br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
								<strong>TO</strong><br>
									<?php echo $user_info['name']; ?> <?php echo $user_info['last_name']; ?><br />
									<?php echo $user_info['address']; ?><br />
									<?php echo $user_info['address2']; ?><br>
									<?php echo $user_info['suburb']; ?>, <?php echo $user_info['state_name']; ?><br>
									<?php echo $user_info['country']; ?> - <?php echo $user_info['postcode']; ?><br>
									<?php echo $user_info['mobile']; ?><br>
									<?php echo $user_info['email']; ?>
								
								</td>

								<td>

								<strong>FROM</strong><br>
									Greg Broderic<br />
									12345 Sunny Road<br />
									Sunnyville, CA 12345
								
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<!-- <tr class="heading">
					<td>Payment Method</td>

					<td>Transaction Id</td>
				</tr>

				<tr class="details">
					<td>Online</td>

					<td> <?php echo $order_info->txn_id?$order_info->txn_id:'NA'; ?></td>
				</tr> -->

				<tr class="heading">
					<td>Booking Information</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>Total Price</td>

					<td>$1200.00</td>
				</tr>

				<tr class="item">
					<td><?php echo $booking_info->payment_type; ?> (Paid : <?php echo $order_info->txn_id?$order_info->txn_id:'NA'; ?>)</td>

					<td><?php echo ($order_info->paid_amount?'-$'.$order_info->paid_amount.'.00':'NA'); ?></td>
				</tr>

				
				<tr class="total">
					<td>&nbsp;</td>

					<td>Total: $600.00</td>
				</tr>
			</table>
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
