
 <?php 
	$param = array();
	$param['conditionParam']['param']['id'] = 1;
	$configuration = $System->get_configuration_details($param)['data'];
?>
<?php 
	if(isset($_GET['flag']) && $_GET['flag'] <= 0)
	{ 
	?>
		 
	<?php 
	}
	if(isset($_GET['flag']) && $_GET['flag'] > 0)
	{
	?>
		 
	<?php 
	} 
?>
 
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            System Configuration 
            <small><?= $purifier->purify($_GET['tab']) ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">System Configuration</li>
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
                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=configuration&tab=Edit&id=1'">Edit Configuration<i class="ace-icon fa fa-plus icon-on-right bigger-110"></i></button>
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
													<th>Sr.No.</th>
													<th>Site Name</th>
													<th>Title</th>
                                                    <th>Logo</th>
                                                    <th>Support Email Id</th>
													<!-- <th class="hidden-480">Option</th> -->													
												</tr>
											</thead>

											<tbody>
                                            <tr>
												<td>1</td>
												<td><?= $purifier->purify($configuration->websiteName) ?></td>
												<td><?= $purifier->purify($configuration->websiteTitle) ?></td>
												<td>
													<img style= "height:50px;width:50px;"src ="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$configuration->logo) ?>">
												</td>
												<td><?= $purifier->purify($configuration->supportMailId) ?></td>
												<!-- <td>
													<a id="edit" class="green" href="?url=configuration&tab=Edit&id=<?= $configuration->id ?>"> Edit</a>
												</td> -->
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
		$param['conditionParam']['param']['id'] = 1;
		$details = $System->get_configuration_details($param)['data'];
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
	                    		<button style="float:right"  type="button" class="btn btn-info" onclick="window.location='./?url=configuration&tab=View'">Back<i class="ace-icon fa fa-reply icon-on-right bigger-110"></i></button>
	                    	</h2>
	                    </div>
	                </div>
							<div class="col-xs-9">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form" action='<?= $_PATH['formHandler'] ?>' method="post" enctype="multipart/form-data">
									<input type="hidden" name="type" value="<?= $_REQUEST['tab'] ?>" >
									<input type="hidden" name="action" value="manageConfiguration">
									<input type="hidden" name="accessToken" value="<?= $_SESSION[$_SESSION_ID]['accessToken'] ?>">
									<?php
									if($_REQUEST['tab']=='Edit')
									{
									?>
									<input type="hidden" name="editId" value="<?= $_REQUEST['id'] ?>" />
									<?php
									}
									?>
									<!-- #section:elements.form -->
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website Name </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" required name="websiteName" required placeholder="Site Name" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->websiteName):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website Title </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" required name="websiteTitle" required placeholder="Title" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->websiteTitle):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Logo</label>
										<div class="col-sm-9">
											<?php
											if(isset($details) && ($details->logo!=null))
											{
											?>
											<img src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$details->logo) ?>" style="height:50px;width:50px;" />
											<?php	
											}
											?>
											<input type="file" id="form-field-1" name="logo" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->logo):'' ?>" />
											<input type="hidden" name="oldLogo" value="<?= isset($details)?$purifier->purify($details->logo):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fevicon</label>
										<div class="col-sm-9">
											<?php
											if(isset($details) && ($details->fevicon!=null))
											{
											?>
											<img src="<?= $purifier->purify($_PATH['websiteRoot'].'/'.$details->fevicon) ?>" style="height:50px;width:50px;" />
											<?php	
											}
											?>
											<input type="file" id="form-field-1" name="fevicon" class="col-xs-10 col-sm-5" value="<?= isset($details)?$purifier->purify($details->fevicon):'' ?>" />
											<input type="hidden" name="oldFevicon" value="<?= isset($details)?$purifier->purify($details->fevicon):'' ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Support Email Id </label>

										<div class="col-sm-9">
											<input value="<?= isset($details)?$purifier->purify($details->supportMailId):'' ?>"  type="email" step="0.01" id="form-field-1-1"  placeholder="Support Email Id" name="supportMailId" required class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Website Link</label>

										<div class="col-sm-9">
											<input value="<?= isset($details)?$purifier->purify($details->websiteLink):'' ?>"  type="text" id="form-field-1-1"  placeholder="Website Link" name="websiteLink" required class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Contact Number </label>

										<div class="col-sm-9">
											<input value="<?= isset($details)?$purifier->purify($details->contactNumber):'' ?>"  type="text" id="form-field-1"  placeholder="Contact Number" name="contactNumber" required class="col-xs-10 col-sm-5" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address </label>

										<div class="col-sm-9">
											<textarea name="address" class="form-control" required><?= isset($details)?$purifier->purify($details->address):'' ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Copyright Message </label>

										<div class="col-sm-9">
											<textarea name="copyrightMessage" class="form-control" required><?= isset($details)?$purifier->purify($details->copyrightMessage):'' ?></textarea>
										</div>
									</div>

									<!-- /section:elements.form -->
									<div class="space-4"></div>

									
									
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
				</div><!-- /.row -->







				</div>
					</div>
            	<?php 
            }	
            ?>
		
		
		</section>
		</div>
		