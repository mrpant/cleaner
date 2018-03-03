<?php 
  
  $training_one = 0;
  $training_two = 0;
  $training_three=0;
  $training_four =0;
  $training_five = 0;
  $training_six = 0;
  $training_seven = 0;
  $training_eight = 0;
  $training_nine = 0;
  $training_ten = 0;
  $training_eleven = 0;
  $training_twelve = 0;
  $training_thirteen = 0;

	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$dist_list = $Dist->get_dist_list($param)['data'];

	$current = date('Y-m-d');
	$currentDate = explode("-", $current);
	
	$param = array(); // for current year
	$param['conditionParam']['param']['from_year'] = $currentDate[0] - 1; // current year
  $param['conditionParam']['param']['to_year'] = $currentDate[0] ; // current year

	$training_list = $Training->get_training_one_list($param)['data'];	


	// first condition for month & second for days for the fiancial year
	if($currentDate[1] == '04' && $currentDate[2] == '01'){ // validate Financial Year

		
		foreach ($dist_list as $key => $value) { //store data if financial year


			//get account details
			$param = array();
			$param['conditionParam']['param']['dist_id'] = $value['id'];
			$param['conditionParam']['param']['from_year'] = $currentDate[0] - 1;
      $param['conditionParam']['param']['to_year'] = $currentDate[0];

			$training_details_validate = $Training->get_training_one_details($param)['data'];

			if($training_details_validate == null){ // if not found then insert
				$training['type'] = 'Add';
				$training['dist_id'] = $value['id'];
				$training['from_year'] = $currentDate[0];
        $training['to_year'] = $currentDate[0] + 1;
				$training['status'] = 1;
				$Training->manage_training_one($training);
			}
			
		}
	}
	

	        if($_SESSION[$_SESSION_ID]['admin']->dist_id == 0){ // admin

                $admin_editable = 'true';
                $user_editable = 'false';


              }else{

                $admin_editable = 'false';
                $user_editable = 'true';
              }


?>

 
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Training Section
          <!--   <small><?= $purifier->purify($_GET['tab']) ?></small> -->
          </h1>
        <!--   <ol class="breadcrumb">
            <li><a href="<?= $_PATH['root'] ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Post</li>
          </ol> -->
        </section>
				
        <!-- Main content -->
        <section class="content">
		<div class="box">
		<div class="box-body">


		<!-- table content end-->
		<table class="table table-bordered">
    <thead>
      <tr>
    <?php if($admin_editable == 'true'){ ?>
      <?php } ?>
        <th rowspan="3">SR No.</th>

        <th rowspan="3">District </th>
        <th rowspan="3">No. of Training Section</th>
        <th rowspan="3">Subject</th>
        <th rowspan="3">Stakeholder</th>
        <th colspan="7"><center>No. of Trained</center></th>
        <th rowspan="3">Operation</th>

        <!-- <th rowspan="3">Operation</th>
 -->   <!--      <th rowspan="2"></th>
        <th rowspan="2"></th>
        <th rowspan="2"></th> -->
      </tr>
      <tr>
     	<th colspan="2"><center>SC</center></th>
     	<th colspan="2"><center>ST</center></th>
     	<th colspan="2"><center>Others</center></th>
     	<th>Total</th>
      </tr>
      <tr>
      <th>M</th>
      <th>W</th>
      <th>M</th>
      <th>W</th>
      <th>M</th>
      <th>W</th>
      <th></th>
      </tr>
    </thead>
    <tbody>
    <?php   if(count($training_list) > 0){  

    			foreach ($training_list as $key => $training_value) { 

						$param = array();
						$param['conditionParam']['param']['id'] = $training_value['dist_id'];
						$dist_details = $Dist->get_dist_details($param)['data'];

            if(($_SESSION[$_SESSION_ID]['admin']->dist_id == $dist_details->id) || ($_SESSION[$_SESSION_ID]['admin']->dist_id == 0)){

              if($_SESSION[$_SESSION_ID]['admin']->dist_id == 0){ // admin

                $admin_editable = 'false';
                $user_editable = 'false';


              }else{

                $admin_editable = 'true';
                $user_editable = 'true';
              }



              //total value
              $training_one += intval($training_value['training_section_1']);
              $training_two += intval($training_value['training_section_2']);
              $training_three += intval($training_value['training_section_3']);
              $training_four += intval($training_value['training_section_4']);
              $training_five += intval($training_value['training_section_5']);
              $training_six += intval($training_value['training_section_6']);
              $training_seven += intval($training_value['training_section_7']);
              $training_eight += intval($training_value['training_section_8']);
              $training_nine += intval($training_value['training_section_9']);
              $training_ten += intval($training_value['training_section_10']);

              


    				?>
    				

  
      <tr>
      <?php if($admin_editable == 'true'){ ?>
      
      <?php } ?>
      <td><?=($key+1)?></td>
      <td ><?=$dist_details->dist_name?></td>
      <td id="one_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $training_value['training_section_1'] ?></td>
      <td id="two_<?=$key?>" contenteditable="<?= $user_editable ?>"  class="allownumericwithoutdecimal"><?= $training_value['training_section_2'] ?></td>
      <td id="three_<?=$key?>" contenteditable="<?= $user_editable ?>"  class="allownumericwithoutdecimal"><?= $training_value['training_section_3'] ?></td>
      <td id="four_<?=$key?>" contenteditable="<?= $admin_editable ?>" class="allownumericwithoutdecimal"><?= $training_value['training_section_4'] ?></td>
      <td id="five_<?=$key?>" contenteditable="<?= $admin_editable ?>" class="allownumericwithoutdecimal"><?= $training_value['training_section_5'] ?></td>
      <td id="six_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $training_value['training_section_6'] ?></td>
      <td id="seven_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $training_value['training_section_7'] ?></td>
      <td id="eight_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $training_value['training_section_8'] ?></td>
      <td id="nine_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $training_value['training_section_9'] ?></td>
      <td id="ten_<?=$key?>" contenteditable="false" class="allownumericwithoutdecimal"><?= $training_value['training_section_10'] ?></td>
      <td><button class="btn" onclick="updateData('<?= $training_value['id'] ?>','one_<?=$key?>','two_<?=$key?>','three_<?=$key?>','four_<?=$key?>','five_<?=$key?>','six_<?=$key?>','seven_<?=$key?>','eight_<?=$key?>','nine_<?=$key?>','ten_<?=$key?>')">Update</button></td>
      </tr>

      <?php }  }
      	}
      ?>
    </tbody>
  <?php if($admin_editable == 'true'){ ?>
    <tfoot >
    		  <td colspan="2"><center>महायोग</center></td>
      <!-- <td></td>    --> 
      <td><?=$training_one?></td>
      <td><?=$training_two?></td>
      <td><?=$training_three?></td>
      <td><?=$training_four ?></td>
      <td><?=$training_five ?></td>
      <td><?=$training_six ?></td>
      <td><?=$training_seven ?></td>
      <td><?=$training_eight ?></td>
      <td><?=$training_nine ?></td>
      <td><?=$training_ten ?></td>


      

    </tfoot>
    <?php } ?>
  </table>


		<!-- table content end -->



			
		</div>
		</div>
	
		
		
		</section>
		</div>
		



		<script type="text/javascript">
			

		function updateData(training_id,one,two,three,four,five,six,seven,eight,nine,ten){

			jQuery.ajax({
				  url: 'ajax_form_handler.php',
				  type: 'GET',
				  data: {'access':'true','action':'training_one','editId':training_id,
				  'training_section_1':$('#'+one).text(),
				  'training_section_2':$('#'+two).text(),
				  'training_section_3':(parseInt($('#'+one).text()) -  parseInt($('#'+two).text())),
				  'training_section_4':$('#'+four).text(),
				  'training_section_5':$('#'+five).text(),
				  'training_section_6':(parseInt($('#'+one).text()) -  parseInt($('#'+two).text())),
				  'training_section_7':$('#'+seven).text(),
				  'training_section_8':(parseInt($('#'+one).text()) -  parseInt($('#'+two).text())),
				  'training_section_9':$('#'+nine).text(),				  
          'training_section_10':(parseInt($('#'+four).text())+parseInt($('#'+five).text())+parseInt($('#'+six).text())+parseInt($('#'+seven).text())+parseInt($('#'+eight).text())+parseInt($('#'+nine).text()) ),
					},
				  success: function(data) {
				  	console.log(data);
            var response = JSON.parse(data);

            if(response.status == 'true'){
              toastr.success('Successfully Updated');
              window.location.reload();
            }else{
              toastr.error('Error occured..Please try again.');
              window.location.reload();
            }
					 // jQuery('#'+holder).html(data).fadeIn(100);
				  },
				  error: function(e)
					{
						//alert("Some error occurred and request could not be completed.");
						//jQuery("#"+status).html(ACTION_ERROR).fadeIn(100);
					}
			});

		}



		
 		$(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

		</script>