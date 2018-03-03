<?php 
	$param = array();
	$param['orderBy'] = 'id';
	$param['conditionParam']['param']['1'] = 1;
	$list = $Time->get_time_list($param)['data'];
	//echo '<pre>';print_r($list);

?>

 
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Time
            <small><?= $purifier->purify($_GET['tab']) ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Time</li>
          </ol>
        </section>
				<?php 
				if($_GET['tab']=="View")
				{ 
				?> 
        <!-- Main content -->
        <section class="content">
		<div class="box">
		<div class="box-body">
			<div class="row">
                    <div class="col-sm-10">
                        
                    </div>
                    <div class="col-sm-2">
                    	<h2>
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=time&tab=Add'">Add New<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
                    	</h2>
                    </div>
                </div>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
									
									<div class="col-xs-12">
										<table id="example1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>#</th>
												
													<th>Time
                                                    </th>
													<th>Time Flag
                                                    </th>
													<th>Status</th>
													
													<th>Action</th>


												</tr>
											</thead>
											<tbody>


                                            	<?php 
                                           	foreach ($list as $key => $value) {



                                           		$status = array('0'=>'Inactive','1'=>'Active');

                                           		echo '<tr>
                                           				<td>'.($key+1).'</td>
                                           		

                                           				
                                           				<td>'.$value['time'].'</td>
                                                        <td>'.$value['timeFlag'].'</td>
                                           				<td>'.$status[$value['status']].'</td>
                                           				<td><a href="?url=time&tab=Edit&id='.$value['id'].'" class="btn btn-success">Edit</a>&nbsp;&nbsp;<a href="./form_handler.php?action=manageTime&type=Delete&id='.$value['id'].'&accessToken='.$_SESSION[$_SESSION_ID]['accessToken'].'" class="btn btn-danger">Delete</a></td>
                                           		     </tr>';
                                           	}

                                           	?>



											</tbody>
										</table>
									</div>
                    </div>
                </div>

				</div>
				</div>
		 <?php }
    
	else
	{  
	$tab=$_GET['tab'];  
	if($tab=="Edit")
	{
		$param = array();
		$param['conditionParam']['param']['id'] = $_REQUEST['id'];
		$details = $Time->get_time_details($param)['data'];
	} 
	?> 
			<div class="box">
					<div class="box-body">
					<div class="row">
					<div class="row" style="padding:0 30px;">
	                    <div class="col-sm-10">
	                        
	                    </div>
	                    <div class="col-sm-2">
	                    	<h2>
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=time&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
							<div class="col-xs-9">
							
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='form_handler.php' method="post" enctype="multipart/form-data">
									
									<input type="hidden" name="createdBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>" >
									<input type="hidden" name="action" value="manageTime" >
									<input type="hidden" name="type" value="<?= $_REQUEST['tab'] ?>" >
									<?php
									if($_REQUEST['tab']=='Edit')
									{
									?>
									<input type="hidden" name="editId" value="<?= $_REQUEST['id'] ?>" />
									<input type="hidden" name="modifiedBy" value="<?= $_SESSION[$_SESSION_ID]['admin']->id ?>" >
									<?php
									}
									?>
									
<?php //echo '<pre>';print_r($list);  ?>

							

									

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Time</label>

										<div class="col-sm-9">
										<input type="text" class="form-control" name="time" required placeholder="Time" value="<?= isset($details)?$purifier->purify($details->time):'' ?>" title="Time"><br>
											
										</div>
									</div>
                                    


                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Time Flag</label>

										<div class="col-sm-9">
                                        <select class="form-control" name="timeFlag" >
                                            <option value="AM">AM<option>
                                            <option value="PM">PM<option>
                                        </select>	
										</div>
									</div>

                                    

                               

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Status </label>

										<div class="col-sm-9">
											<label>
													<input   type="radio" name="status" value="1" <?php if((isset($details) && $details->status==1) || $tab=="Add"){  ?> checked="checked" <?php } ?> class="ace">
													<span class="lbl">Active</span>
											</label>		
											&nbsp; &nbsp; 
											<label>
													<input   type="radio" name="status" <?php if(isset($details) && $details->status==0){ ?> checked="checked" <?php } ?> value="0" class="ace">
													<span class="lbl">Inactive</span>
											</label>	
										</div>
									</div>
									

									
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
										
								</form>
								<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div>







				</div>
					</div>
            	<?php 
            }	
            ?>
		
		
		</section>
		</div>
		