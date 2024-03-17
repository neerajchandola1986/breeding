<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Volunteer <!--<a href="<?php echo base_url() ?>records/addvolunteer" class="btn btn-warning"><span class="float-right"><i class="ion ion-plus"></i> Add Volunteer</span></a>-->
      </h1>
    </section>
    <section class="content">
        <div class="row">
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

            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Volunteer List</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" style="overflow:scroll; font-size:12px;">
                    <tr>
                      <th>Project ID</th>
                      <th>Name</th>
                      <th>Trail work hrs.- Basic</th>
                      <th>Trail work hrs.- Skilled</th>
                      <th>Non-trail Work Hrs</th>
                      <th>Round trip travel time</th>
                      <th>Round trip travel miles</th>
                      <th>Power eqipment</th>
                      <th>Heavy equipment</th>
                      <th>Stock days</th>
                      <th>Donation amount</th>
                      <th>Description</th>
                      <th>Gender and Age Grp</th>
                      <th>Hispanic</th>
                      <th>Disabled</th>
                      <th>Date</th>        
                      <th class="text-center">Actions</th>
                    </tr> 
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
							$gagevalue = "";
							if(trim($record->gage) == "m18")
							{
								$gagevalue = "Male 19-24";
							}
							else if(trim($record->gage) == "m25")
							{
								$gagevalue = "Male 25-35";
							}
							else if(trim($record->gage) == "m35")
							{
								$gagevalue = "Male 36-54";
							}
							else if(trim($record->gage) == "m55")
							{
								$gagevalue = "Male 55+";
							}
							else if(trim($record->gage) == "f15")
							{
								$gagevalue = "Female 15-18";
							}
							else if(trim($record->gage) == "f18")
							{
								$gagevalue = "Female 19-24";
							}
							else if(trim($record->gage) == "f25")
							{
								$gagevalue = "Female 25-35";
							}
							else if(trim($record->gage) == "f35")
							{
								$gagevalue = "Female 36-54";
							}
							else if(trim($record->gage) == "f55")
							{
								$gagevalue = "Female 55+";
							}
                    ?>
                    <tr>
                      <td><?php echo $record->p_id ?></td>
                      <td><?php echo $record->v_fname." ".$record->v_lname ?></td>
                      <td><?php echo $record->tbas ?></td>
                      <td><?php echo $record->tskl ?></td>
                      <td><?php echo $record->ntwork ?></td>
                      <td><?php echo $record->trtime ?></td>
                      <td><?php echo $record->tmile ?></td>
                      <td><?php echo $record->peq?></td>
                      <td><?php echo $record->heq ?></td>
                      <td><?php echo $record->stkdays ?></td>
                      <td><?php echo $record->donate ?></td>
                      <td><?php echo $record->idesc ?></td>
                      <td><?php echo $gagevalue ?></td>
                      <td><?php echo ($record->eth == 1)?'Yes':'No' ?></td>
                      <td><?php echo ($record->disabled == 1)?'Yes':'No' ?></td>
                      <td><?php echo $record->date ?></td>  
                      <td class="text-center">
                          <a href="<?php echo base_url().'records/editvolunteer/'.$record->v_id; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>  <a href="<?php echo base_url().'records/delete_volunteer/'.$record->v_id; ?>" onclick="return confirm('This will delete volunteer.Please confirm?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $links; ?>
                </div>
                
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
