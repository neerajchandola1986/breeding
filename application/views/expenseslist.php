<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <i class="fa fa-users"></i> Search </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <form action="<?php echo base_url(); ?>records/expenseslist" method="GET">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3 mb-4">
                    <label>Start Month</label>
                    <div class="form-group">
                      <div class='input-group date pickWeekSearch'> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
                        <input type='text' name="search_startdate" value="<?php echo $startdate; ?>" required class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-4">
                    <label>End Month</label>
                    <div class="form-group">
                      <div class='input-group date pickWeekSearch'> <span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
                        <input type='text' name="search_enddate" required value="<?php echo $enddate; ?>" class="form-control" />
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-md-3 mb-4">
                    <label>&nbsp;</label>
                    <input type="submit" class="btn btn-primary" name="searchdata" value="Search" />
                  </div>
                </div>
              </div>
            </div>
          </form>
          <hr />
          <?php if(count($result)>0){ 
		  //print_r($result);
		  ?> 
          <!-- /.box-header dssdfdsfsdf -->
          <style>
		  table{border-collapse: initial;}
		  table th,td{text-align:center;}
		  .labeltext{text-align:left !important;}
		  @media print {
		  body, html, #section-to-print  {
          width: 100%;
		  height:100%;
          }
		  body * {
			visibility: hidden;
		  }
		  #section-to-print, #section-to-print * {
			visibility: visible;
		  }
		  #section-to-print {
			position: absolute;
			left: 0;
			top: 0;
		  }
		}
		  </style>
          <div class="box-body table-responsive no-padding" >
            <table class="table table-hover">
              <tr>
                <td style="text-align:center; background-color:#FF0; font-weight:bold;"><h3>Aangan Rajpura Cash Flow Forecast</h3></td>
              </tr>
              <tr>
                <td style="text-align:center; background-color:#3E484C; color:#fff;"><?php echo date('d F, Y',strtotime($startdate)) ?> - <?php echo date('d F, Y',strtotime($enddate)) ?></td>
              </tr>
            </table>
            <table width="100%" border="1" cellspacing="0" cellpadding="0" id="section-to-print">
              <tr>
                <th>&nbsp;</th>
                
                <th>April</th>
                <th>May</th>
                <th>June</th>
                <th>July</th>
                <th>August</th>
                <th>September</th>
                <th>October</th>
                <th>November</th>
                <th>December</th>
                
                <th>January</th>
                <th>February</th>
                <th>March</th>
                
                <th>&nbsp;</th>
              </tr>
              <?php 
			  $getcategory_inflow = getcategory_inflow();
			  $idconcatenate = "";
			  foreach($getcategory_inflow as $d1)
			  {
				  $idconcatenate .= $d1['id'].",";
			  ?>
              <tr>
                <td class="labeltext"><?php echo $d1['name']; ?></td>
               
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"04"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"05"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"06"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"07"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"08"); ?></td>
          	    <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"09"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"10"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"11"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"12"); ?></td>
                
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"01"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"02"); ?></td>
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,"03"); ?></td>
                
                <td><?php echo get_item_values_range($d1['id'],$startdate,$enddate,''); ?></td>
              </tr>
              <?php } 
			  $idconcatenate = rtrim($idconcatenate,",");
			  ?>
              <tr style="background-color:#9C3;">
                <td class="labeltext">Total Cash Sales</td>
                
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"04"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"05"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"06"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"07"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"08"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"09"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"10"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"11"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"12"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"01"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"02"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"03"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,""); ?></td>
              </tr>
              <tr>
                <td colspan="14">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="14" style="background-color:#CCC; font-size:14px; font-weight:bold;" class="labeltext">Cash Expenses</td>
              </tr>
              <?php
			  $getcategory_outflow = getcategory_outflow();
			  $idconcatenate2 = "";
			  foreach($getcategory_outflow as $d2)
			  {
				  $idconcatenate2 .= $d2['id'].",";
			  ?>
              <tr>
                <td class="labeltext"><?php echo $d2['name']; ?></td>
                
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"04"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"05"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"06"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"07"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"08"); ?></td>
          	    <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"09"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"10"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"11"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"12"); ?></td>
                
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"01"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"02"); ?></td>
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,"03"); ?></td>
                
                <td><?php echo get_item_values_range($d2['id'],$startdate,$enddate,''); ?></td>
              </tr>
              <?php } $idconcatenate2 = rtrim($idconcatenate2,","); ?>
              <tr style="background-color:#9C3;">
                <td class="labeltext">Total Cash Expenses</td>
                
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"04"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"05"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"06"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"07"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"08"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"09"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"10"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"11"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"12"); ?></td>
                
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"01"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"02"); ?></td>
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"03"); ?></td>
                
                <td><?php echo get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,""); ?></td>
              </tr>
              <tr>
                <td style="border:hidden">&nbsp;</td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
                <td style="border:hidden"></td>
              </tr>
              <tr>
                <td class="labeltext">Net Cash Inflow</td>
                
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"04") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"04")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"05") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"05")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"06") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"06")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"07") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"07")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"08") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"08")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"09") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"09")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"10") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"10")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"11") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"11")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"12") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"12")); ?></td>
                
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"01") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"01")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"02") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"02")); ?></td>
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"03") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"03")); ?></td>
                
                <td><?php echo (get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"")); ?></td>
              </tr>
              <tr>
                <td class="labeltext">Tax @20%</td>
                
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"04") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"04")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"05") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"05")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"06") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"06")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"07") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"07")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"08") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"08")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"09") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"09")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"10") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"10")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"11") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"11")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"12") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"12")); ?></td>
                
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"01") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"01")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"02") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"02")); ?></td>
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"03") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"03")); ?></td>
                
                <td><?php echo gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"")); ?></td>
              </tr>
              <tr>
                <td class="labeltext">Net Cash</td>
                
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"04") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"04"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"04") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"04"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"05") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"05"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"05") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"05"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"06") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"06"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"06") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"06"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"07") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"07"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"07") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"07"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"08") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"08"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"08") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"08"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"09") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"09"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"09") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"09"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"10") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"10"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"10") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"10"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"11") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"11"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"11") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"11"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"12") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"12"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"12") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"12"))); ?></td>
                
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"01") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"01"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"01") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"01"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"02") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"02"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"02") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"02"))); ?></td>
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"03") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"03"))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"03") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,"03"))); ?></td>
                
                
                <td><?php echo ((get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,""))- gettaxpercentage(get_item_values_range_combinedflow($idconcatenate,$startdate,$enddate,"") - get_item_values_range_combinedflow($idconcatenate2,$startdate,$enddate,""))); ?></td>
              </tr>
            </table>
            <br />
            <a href="javascript:void(0)" class="btn btn-info" onclick="window.print();">Print</a>
          </div>
          <?php } ?>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
    </div>
  </section>
</div>