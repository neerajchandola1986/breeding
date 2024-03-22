<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    
    <!-- Main content -->
<section class="content">
      <!-- /.row -->
      <div class="row">
        
        
        
		<?php
		if($this->session->userdata ( 'role' ) == 1)
		{
		?>
		
		
        
       <div class="col-lg-6 col-xs-6">
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo count($userRecords);?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-people"></i>
            </div>
          </div>

		
			<div class="box-body table-responsive no-padding" style="min-height:150px;">
            <table class="table table-hover" style="overflow:scroll; font-size:12px;">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>				           
                <th>Email</th>                
              </tr>
              <?php
			  
                    if(!empty($userRecords))

                    {
						$i=1;

                        foreach($userRecords as $record)

                        {


                    ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $record->name.' '.$record->last_name;?></td>
                <td><?php echo nl2br(stripslashes($record->address)) ?></td>
                <td><?php echo $record->mobile ?></td>				
				<td><?php echo $record->email ?></td>                 
                
              </tr>
              <?php
			  $i++;

                        }

                    }

                    ?>
            </table>
			</div>
                

		 </div>

		 <div class="col-lg-6 col-xs-6" style="min-height:350px;">
          
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($staffRecords);?></h3>

              <p>Staff</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-people"></i>
            </div>
          </div>

		
			<div class="box-body table-responsive no-padding" style="min-height:150px;">
            <table class="table table-hover" style="overflow:scroll; font-size:12px;">
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>				           
                <th>Email</th>                
              </tr>
              <?php
			  
                    if(!empty($staffRecords))

                    {
						$i=1;

                        foreach($staffRecords as $record)

                        {


                    ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $record->name.' '.$record->last_name;?></td>
                <td><?php echo nl2br(stripslashes($record->address)) ?></td>
                <td><?php echo $record->mobile ?></td>				
				<td><?php echo $record->email ?></td>                 
                
              </tr>
              <?php
			  $i++;

                        }

                    }

                    ?>
            </table>
			</div>
                

		 </div>

        <?php
		}
		?>


		<div class="col-lg-12 col-xs-12">
          
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
			  <?php 
			  $staff_id='';
			  if($this->session->userdata ( 'role' ) == 3)
				{
					$staff_id = $this->session->userdata('userId');
				}
				echo count(getBookingList());?></h3>

              <p>Bookings</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-list"></i>
            </div>
          </div>

		  <div class="box-body table-responsive no-padding">

		  <table class="table table-hover" style="overflow:scroll; font-size:12px;">
                    <tr>
                      <th>S.No.</th>                      
                      <th>Date</th>
					  <th>Booking Type</th>
					  <th>Stallion</th>
                      <th>Mare Name</th>
					  <th>Microchip Number</th>
					  <th>Payment Type</th>
					     
                    </tr> 
                    <?php
                    if(!empty($bookingRecords))
                    {
						$i=1;
                        foreach($bookingRecords as $record)
                        {
							$manager_id = $record->user_id;
							$manager_info = getuser_info($manager_id);

							
							
						
                    ?>
                    <tr>
                      <td><?php echo $page+$i; ?></td>
					  <td><?php echo date('m/d/Y',strtotime($record->booking_date)) ?></td>
					  <td><?php echo $record->booking_type ?></td>
					  <td><?php echo $record->stallion ?></td>
					  <td><?php echo $record->mare_name ?></td>
					  <td><?php echo $record->microchip_number ?></td>
					  <td><?php echo $record->payment_type ?></td>
					    
					  
                              
                     
                    </tr>
                    <?php
						$i++;
                        }
                    }
                    ?>
                  </table>
				  </div>

        </div>

		

		


		




      </div>
	
 
</div>