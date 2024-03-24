<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
  <section class="content-header">
    <h1> <i class="fa fa-users"></i> Booking Management  </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Booking List</h3>
            <br />
            <div class="box-tools">
              <form action="<?php echo base_url() ?>records/bookingListing" method="POST" id="searchList">
                <div class="input-group">
                  <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                  <div class="input-group-btn">
                    <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.box-header -->
          
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>Id</th>
                               
                      <th>Booking Date</th>
					  <th>Booking Type</th>
					  <th>Stallion</th>
                      <th>Mare Name</th>
					  <th>Microchip Number</th>
					  <th>Payment Type</th>
					  <th>Payment Status</th>
                <th class="text-center">Actions</th>
              </tr>
              <?php

                    if(!empty($userRecords))

                    {

                        foreach($userRecords as $record)

                        {


                    ?>
              <tr>
                <td><?php echo $record->id ?></td>
                <td><?php echo date('m/d/Y',strtotime($record->booking_date)) ?></td>
					  <td><?php echo $record->booking_type ?></td>
					  <td><?php echo $record->stallion ?></td>
					  <td><?php echo $record->mare_name ?></td>
					  <td><?php echo $record->microchip_number ?></td>
					  <td><?php echo $record->payment_type ?></td>
					  <td><?php echo $record->payment_status ?></td>
                <td class="text-center">
				<table><tr>
				<td>
				<a class="btn btn-sm btn-info" href="<?php echo base_url().'records/view_booking/'.$record->id; ?>"><i class="fa fa-eye"></i></a></td>
				<td>
				<?php
				if($record->payment_type=='Half Payment' && $record->payment_status=='Succeeded')
				{
				?>
				&nbsp;<a class="btn btn-sm btn-info" href="<?php echo base_url().'records/invoice/'.$record->id; ?>">Invoice</a>&nbsp;
				<?php
				}
				
					?></td></tr></table></td>
              </tr>
              <?php

                        }

                    }

                    ?>
            </table>
          </div>
          <!-- /.box-body -->
          
          <div class="box-footer clearfix"> <?php echo $links; ?> </div>
        </div>
        <!-- /.box --> 
        
      </div>
    </div>
  </section>
</div>
