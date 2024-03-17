<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
  <section class="content-header">
    <h1> <i class="fa fa-users"></i> Staff Management  <a href="<?php echo base_url() ?>records/addstaff" class="btn btn-warning"><span class="float-right"><i class="ion ion-plus"></i> Add Staff</span></a> </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Staff List</h3>
            <br />
            <div class="box-tools">
              <form action="<?php echo base_url() ?>records/staffListing" method="POST" id="searchList">
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
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Password</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
              </tr>
              <?php

                    if(!empty($userRecords))

                    {

                        foreach($userRecords as $record)

                        {


                    ?>
              <tr>
                <td><?php echo $record->userId ?></td>
                <td><?php echo $record->name ?></td>
                <td><?php echo $record->email ?></td>
                <td><?php echo $record->mobile ?></td>
                <td><?php echo base64_decode($record->password) ?></td>
                <td><?php echo ($record->isDeleted == 0)?'Active':'In Active' ?></td>
                <td class="text-center"><a class="btn btn-sm btn-info" href="<?php echo base_url().'records/editstaff/'.$record->userId; ?>"><i class="fa fa-pencil"></i></a> <a class="btn btn-sm btn-danger" href="<?php echo base_url().'records/deletestaff/'.$record->userId; ?>" onclick="return confirm('Are you sure to delete this staff ?')"><i class="fa fa-trash"></i></a></td>
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
