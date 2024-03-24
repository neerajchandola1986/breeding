<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Stallion <a href="<?php echo base_url() ?>records/addstallion" class="btn btn-warning"><span class="float-right"><i class="ion ion-plus"></i> Add Stallion</span></a>
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
                    <h3 class="box-title">Stallion List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>records/stallionlist" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Stallion</th>
                     
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->stallion ?></td>
                     
                      <td class="text-center">
                          <a href="<?php echo base_url().'records/editstallion/'.$record->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a> 
                          <a href="<?php echo base_url().'records/deletestallion/'.$record->id; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
