<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Projects <a href="<?php echo base_url() ?>records/addproject" class="btn btn-warning"><span class="float-right"><i class="ion ion-plus"></i> Add Project</span></a>
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
                    <h3 class="box-title">Expense List</h3>
                </div><!-- /.box-header -->
                <?php if($this->session->userdata ( 'role' ) == 1){ ?>
                <div class="box-header">
                <form role="form" id="addUser" action="<?php echo base_url() ?>records/manageproject/" method="GET">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">                                
                            <div class="form-group">
                                <label for="fname">Project ID</label>
                                <input type="text" name="project_id" value="<?php echo $_REQUEST['project_id']; ?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-2">                                
                            <div class="form-group">
                                <label for="fname">Agency</label>
                                <select name="agency_search" class="form-control required">
                                <option value=""></option> 
                                <?php 
                                $getcategory = getcategory();
                                foreach($getcategory as $in)
                                {
                                ?>
                                <option value="<?php echo $in['id']; ?>" <?php echo ($_REQUEST['agency_search'] == $in['id'])?'selected="selected"':'' ?>><?php echo $in['name']; ?></option> 
                                <?php 
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-2">                                
                            <div class="form-group">
                                <label for="fname">Chapter</label>
<select name="chapter_search" class="form-control required">
<option value=""></option> 
<option value="Brownfield" <?php echo ($_REQUEST['chapter_search'] == "Brownfield")?'selected="selected"':'' ?>>Brownfield</option>
<option value="Cuivre River" <?php echo ($_REQUEST['chapter_search'] == "Cuivre River")?'selected="selected"':'' ?>>Cuivre River</option> 
<option value="Heartland" <?php echo ($_REQUEST['chapter_search'] == "Heartland")?'selected="selected"':'' ?>>Heartland</option> 
<option value="Indian Trails" <?php echo ($_REQUEST['chapter_search'] == "Indian Trails")?'selected="selected"':'' ?>>Indian Trails</option> 
<option value="Mountain Rider" <?php echo ($_REQUEST['chapter_search'] == "Mountain Rider")?'selected="selected"':'' ?>>Mountain Riders</option> 
<option value="NEMO" <?php echo ($_REQUEST['chapter_search'] == "NEMO")?'selected="selected"':'' ?>>NEMO</option> 
<option value="Ridge Runner" <?php echo ($_REQUEST['chapter_search'] == "Ridge Runner")?'selected="selected"':'' ?>>Ridge Runner</option> 
<option value="River Springs" <?php echo ($_REQUEST['chapter_search'] == "River Springs")?'selected="selected"':'' ?>>River Springs</option> 
<option value="South Central" <?php echo ($_REQUEST['chapter_search'] == "South Central")?'selected="selected"':'' ?>>South Central</option> 
<option value="Tornado Ridge" <?php echo ($_REQUEST['chapter_search'] == "Tornado Ridg")?'selected="selected"':'' ?>>Tornado Ridge</option> 
<option value="Tri Lakes" <?php echo ($_REQUEST['chapter_search'] == "Tri Lakes")?'selected="selected"':'' ?>>Tri Lakes</option> 
</select>
                            </div>
                        </div>
                        <div class="col-md-2">                                
                            <div class="form-group">
                                <label for="fname">From Date</label>
                                <input class="form-control" type="date" name="from_date_search" id="from_date_search" value="<?php echo $_REQUEST['from_date_search']; ?>" />
                            </div>
                        </div>
                        <div class="col-md-2">                                
                            <div class="form-group">
                                <label for="fname">To Date</label>
                                <input class="form-control" type="date" name="to_date_search" id="to_date_search" value="<?php echo $_REQUEST['to_date_search']; ?>" />
                            </div>
                        </div>
                </div><!-- /.box-body -->
                
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Search" />
                    <a href="<?php echo base_url() ?>records/manageproject" class="btn btn-primary">Reset</a>
                </div>
                
                </div></form>
                </div>
          		<?php } ?>
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover" style="overflow:scroll">
                    <tr>
                      <th>Project ID</th>
                      <th>Agency</th>
                      <th>District</th>
                      <th>Chapter</th>
                      <th>Date</th>
                      <th>Non- wilderness Miles</th>
                      <th>Wilderness Miles</th>
                      <?php if($this->session->userdata('role') == 1){?>
                      <th>Created By</th> 
                      <?php } ?>       
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
                      <td><?php echo $record->categoryname ?></td>
                      <td><?php echo $record->district ?></td>
                      <td><?php echo $record->chapter ?></td>
                      <td><?php echo $record->date ?></td>
                      <td><?php echo $record->nwmile ?></td>
                      <td><?php echo $record->wmile ?></td>
                      <?php if($this->session->userdata('role') == 1){?>
                      <td><?php echo $record->name." ".$record->last_name ?></td>
                      <?php } ?>      
                      <td class="text-center">
                          <a href="<?php echo base_url().'records/addvolunteer/'.$record->id; ?>" class="btn btn-sm btn-success" title="Add Volunteer"><i class="fa fa-plus"></i></a> <a href="<?php echo base_url().'records/viewproject/'.$record->id; ?>" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a> <a href="<?php echo base_url().'records/editproject/'.$record->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>  <a href="<?php echo base_url().'records/delete_project/'.$record->id; ?>" onclick="return confirm('This will delete project and its volunteer(s) also.Please confirm?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                <?php if($this->session->userdata ( 'role' ) == 1){ ?>
                <form role="form" id="" action="<?php echo base_url() ?>records/downloadtotalreport/" method="POST">
                <input type="hidden" value="<?php echo $_REQUEST['project_id']; ?>" name="project_id_hidden">
                <input type="hidden" value="<?php echo $_REQUEST['agency_search']; ?>" name="agency_search_hidden">
                <input type="hidden" value="<?php echo $_REQUEST['chapter_search']; ?>" name="chapter_search_hidden">
                <input type="hidden" value="<?php echo $_REQUEST['from_date_search']; ?>" name="from_date_search_hidden">
                <input type="hidden" value="<?php echo $_REQUEST['to_date_search']; ?>" name="to_date_search_hidden">
                <input type="submit" class="btn btn-warning" value="Download CSV" />
                </form>
                <?php } ?>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
