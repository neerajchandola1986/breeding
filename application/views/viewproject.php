<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> View Project Management &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>records/viewproject/<?php echo $toedit_id ?>" class="btn btn-sm btn-info"><i class="fa fa-refresh"></i></a>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                <?php 
				$getuserdata =  getproject_info($toedit_id);
				$getvoldata =  getvolunteer_info($toedit_id);
				?>
                <div class="box box-primary">
                    <div class="box-header ">
                        <h3 class="box-title"><a href="<?php echo base_url(); ?>records/manageproject"><i class="fa fa-backward"></i> Back</a></h3> 
                        
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Agency</label>
                                    <select name="agency" class="form-control required"  disabled="disabled">
                                        <option value="--"></option> 
                                        <?php 
										$getcategory = getcategory();
										foreach($getcategory as $in)
										{
										?>
                                        <option value="<?php echo $in['id']; ?>" <?php echo ($getuserdata->agency == $in['id'])?'selected="selected"':'' ?>><?php echo $in['name']; ?></option> 
                                        <?php 
										}
										?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">District</label>
                                    <select name="district" class="form-control required"  disabled="disabled">
                                        <option value="--"></option> 
                                        <option value="Ava" <?php echo ($getuserdata->district == "Ava")?'selected="selected"':'' ?>>Ava</option>
                                        <option value="Cassville" <?php echo ($getuserdata->district == "Cassville")?'selected="selected"':'' ?>>Cassville</option> 
                                        <option value="Cedar Creek" <?php echo ($getuserdata->district == "Cedar Creek")?'selected="selected"':'' ?>>Cedar Creek</option> 
                                        <option value="Eleven Point" <?php echo ($getuserdata->district == "Eleven Point")?'selected="selected"':'' ?>>Eleven Point</option> 
                                        <option value="Fredricktown" <?php echo ($getuserdata->district == "Fredricktown")?'selected="selected"':'' ?>>Fredricktown</option> 
                                        <option value="Houston" <?php echo ($getuserdata->district == "Houston")?'selected="selected"':'' ?>>Houston</option> 
                                        <option value="Potosi" <?php echo ($getuserdata->district == "Potosi")?'selected="selected"':'' ?>>Potosi</option> 
                                        <option value="Poplar Bluff" <?php echo ($getuserdata->district == "Poplar Bluff")?'selected="selected"':'' ?>>Poplar Bluff</option> 
                                        <option value="Rolla" <?php echo ($getuserdata->district == "Rolla")?'selected="selected"':'' ?>>Rolla</option> 
                                        <option value="Salem" <?php echo ($getuserdata->district == "Salem")?'selected="selected"':'' ?>>Salem</option> 
                                        <option value="Willow Springs" <?php echo ($getuserdata->district == "Willow Springs")?'selected="selected"':'' ?>>Willow Springs</option> 
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Chapter</label>
                                    <select name="chapter" class="form-control required" disabled="disabled">
                                        <option value="--"></option> 
                                        <option value="Brownfield" <?php echo ($getuserdata->chapter == "Brownfield")?'selected="selected"':'' ?>>Brownfield</option>
                                        <option value="Cuivre River" <?php echo ($getuserdata->chapter == "Cuivre River")?'selected="selected"':'' ?>>Cuivre River</option> 
                                        <option value="Heartland" <?php echo ($getuserdata->chapter == "Heartland")?'selected="selected"':'' ?>>Heartland</option> 
                                        <option value="Indian Trails" <?php echo ($getuserdata->chapter == "Indian Trails")?'selected="selected"':'' ?>>Indian Trails</option> 
                                        <option value="Mountain Rider" <?php echo ($getuserdata->chapter == "Mountain Rider")?'selected="selected"':'' ?>>Mountain Riders</option> 
                                        <option value="NEMO" <?php echo ($getuserdata->chapter == "NEMO")?'selected="selected"':'' ?>>NEMO</option> 
                                        <option value="Ridge Runner" <?php echo ($getuserdata->chapter == "Ridge Runner")?'selected="selected"':'' ?>>Ridge Runner</option> 
                                        <option value="River Springs" <?php echo ($getuserdata->chapter == "River Springs")?'selected="selected"':'' ?>>River Springs</option> 
                                        <option value="South Central" <?php echo ($getuserdata->chapter == "South Central")?'selected="selected"':'' ?>>South Central</option> 
                                        <option value="Tornado Ridge" <?php echo ($getuserdata->chapter == "Tornado Ridg")?'selected="selected"':'' ?>>Tornado Ridge</option> 
                                        <option value="Tri Lakes" <?php echo ($getuserdata->chapter == "Tri Lakes")?'selected="selected"':'' ?>>Tri Lakes</option> 
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Date</label>
                                        <div id="newdate" class="input-group date" data-date-format="yyyy-mm-dd">
                                        <input class="form-control" type="text" readonly="readonly" name="date_added" id="date_added" value="<?php echo $getuserdata->date; ?>" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span> </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Non- wilderness trail miles worked by group,<br /> not each individual</label>
                                        <input type="text" class="form-control required" readonly="readonly" value="<?php echo $getuserdata->nwmile; ?>" id="nwmile" name="nwmile">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Wilderness trail miles worked by group,<br /> not each individual</label>
                                        <input type="text" class="form-control required" readonly="readonly" value="<?php echo $getuserdata->wmile; ?>" id="wmile" name="wmile">
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            
                            <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                            <div class="box-header">
                            <h3 class="box-title">Volunteer List</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                            <table class="table table-hover" style="overflow:scroll; font-size:12px;">
                            <tr>
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
                            <th>Male 15-18</th>
                            <th>Male 19-24</th>
                            <th>Male 25-35</th>
                            <th>Male 36-54</th>
                            <th>Male 55+</th>
                            <th>Female 15-18</th>
                            <th>Female 19-24</th>
                            <th>Female 25-35</th>
                            <th>Female 36-54</th>
                            <th>Female 55+</th>
                            <th>Hispanic</th>
                            <th>Disabled</th>
                            <th>Date</th>        
                            <th class="text-center">Actions</th>
                            </tr> 
                            <?php
                            if(!empty($getvoldata))
                            {
							$tbas = 0;
							$tskl = 0;
							$ntwork=0;
							$trtime=0;
							$tmile=0;
							$peq=0;
							$heq=0;
							$stkdays=0;
							$donate=0;
							$m15=0;
							$m18=0;
							$m25=0;
							$m35=0;
							$m55=0;
							$f15=0;
							$f18=0;
							$f25=0;
							$f35=0;
							$f55=0;
							$disabled=0;
							$eth=0;
                            foreach($getvoldata as $record)
                            {
							$m15_1=0;
							$m18_1=0;
							$m25_1=0;
							$m35_1=0;
							$m55_1=0;
							$f15_1=0;
							$f18_1=0;
							$f25_1=0;
							$f35_1=0;
							$f55_1=0;
                            $gagevalue = "";
							if(trim($record->gage) == "m15")
                            {
                                $gagevalue = "Male 15-18";
								$m15 = $m15+1;
								$m15_1 = $m15_1+1;
                            }
                            if(trim($record->gage) == "m18")
                            {
                                $gagevalue = "Male 19-24";
								$m18 = $m18+1;
								$m18_1 = $m18_1+1;
                            }
                            else if(trim($record->gage) == "m25")
                            {
                                $gagevalue = "Male 25-35";
								$m25 = $m25+1;
								$m25_1 = $m25_1+1;
                            }
                            else if(trim($record->gage) == "m35")
                            {
                                $gagevalue = "Male 36-54";
								$m35 = $m35+1;
								$m35_1 = $m35_1+1;
                            }
                            else if(trim($record->gage) == "m55")
                            {
                                $gagevalue = "Male 55+";
								$m55 = $m55+1;
								$m55_1 = $m55_1+1;
                            }
                            else if(trim($record->gage) == "f15")
                            {
                                $gagevalue = "Female 15-18";
								$f15 = $f15+1;
								$f15_1 = $f15_1+1;
                            }
                            else if(trim($record->gage) == "f18")
                            {
                                $gagevalue = "Female 19-24";
								$f18 = $f18+1;
								$f18_1 = $f18_1+1;
                            }
                            else if(trim($record->gage) == "f25")
                            {
                                $gagevalue = "Female 25-35";
								$f25 = $f25+1;
								$f25_1 = $f25_1+1;
                            }
                            else if(trim($record->gage) == "f35")
                            {
                                $gagevalue = "Female 36-54";
								$f35 = $f35+1;
								$f35_1 = $f35_1+1;
                            }
                            else if(trim($record->gage) == "f55")
                            {
                                $gagevalue = "Female 55+";
								$f55 = $f55+1;
								$f55_1 = $f55_1+1;
                            }
							
							if($record->eth == 1)
							{
								$eth = $eth+1;
							}
							if($record->disabled == 1)
							{
								$disabled = $disabled+1;
							}
							
                            ?>
                            <tr>
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
                            <td><?php echo $m15_1 ?></td>
                            <td><?php echo $m18_1 ?></td>
                            <td><?php echo $m25_1 ?></td>
                            <td><?php echo $m35_1 ?></td>
                            <td><?php echo $m55_1 ?></td>
                            <td><?php echo $f15_1 ?></td>
                            <td><?php echo $f18_1 ?></td>
                            <td><?php echo $f25_1 ?></td>
                            <td><?php echo $f35_1 ?></td>
                            <td><?php echo $f55_1 ?></td>
                            <td><?php echo ($record->eth == 1)?'Yes':'No' ?></td>
                            <td><?php echo ($record->disabled == 1)?'Yes':'No' ?></td>
                            <td><?php echo $record->date ?></td>  
                            <td class="text-center">
                            <a href="<?php echo base_url().'records/editvolunteer/'.$record->v_id; ?>" target="_new" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>  <a href="<?php echo base_url().'records/delete_volunteer/'.$record->v_id; ?>" onclick="return confirm('This will delete volunteer.Please confirm?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>
                            <?php
							$tbas = $tbas+$record->tbas;
							$tskl = $tskl+$record->tskl;
							$ntwork = $ntwork+$record->ntwork;
							$trtime = $trtime+$record->trtime;
							$tmile = $tmile+$record->tmile;
							$peq=$peq+$record->peq;
							$heq=$heq+$record->heq;
							$stkdays=$stkdays+$record->stkdays;
							$donate=$donate+$record->donate;
                            }
                            }
                            ?>
                            <tr style="color:#F00;">
                            <th>Total:</th>
                            <th><?php echo $tbas; ?></th>
                            <th><?php echo $tskl; ?></th>
                            <th><?php echo $ntwork;?></th>
                            <th><?php echo $trtime;?></th>
                            <th><?php echo $tmile;?></th>
                            <th><?php echo $peq; ?></th>
                            <th><?php echo $heq;?></th>
                            <th><?php echo $stkdays;?></th>
                            <th><?php echo $donate; ?></th>
                            <th>&nbsp;</th>
                            <th><?php echo $m15 ?></th>
                            <th><?php echo $m18 ?></th>
                            <th><?php echo $m25 ?></th>
                            <th><?php echo $m35 ?></th>
                            <th><?php echo $m55 ?></th>
                            <th><?php echo $f15 ?></th>
                            <th><?php echo $f18 ?></th>
                            <th><?php echo $f25 ?></th>
                            <th><?php echo $f35 ?></th>
                            <th><?php echo $f55 ?></th>
                            <th><?php echo $eth;?></th>
                            <th><?php echo $disabled;?></th>
                            <th>&nbsp;</th>        
                            <th class="text-center">&nbsp;</th>
                            </tr> 
                            </table>
                            </div>
                            </div><!-- /.box -->
                            </div>
                            </div>
                            
            
                        </div><!-- /.box-body -->

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
<script src="<?php echo base_url(); ?>assets/front/js/jquery-3.3.1.slim.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> 
<script>
$(function () {
  $("#newdate").datepicker({
	autoclose: true,
	dateFormat: 'yy-mm-dd'
  });
});
</script> 