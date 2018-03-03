<?php 
  
  $account_one = 0;
  $account_two = 0;
  $account_three=0;
  $account_four =0;
  $account_five = 0;
  $account_six = 0;
  $account_seven = 0;
  $account_eight = 0;
  $account_nine = 0;
  $account_ten = 0;
  $account_eleven = 0;
  $account_twelve = 0;
  $account_thirteen = 0;

	$param = array();
	$param['conditionParam']['param']['1'] = 1;
	$dist_list = $Dist->get_dist_list($param)['data'];

	$current = date('Y-m-d');
	$currentDate = explode("-", $current);
	
	$param = array(); // for current year
	$param['conditionParam']['param']['from_year'] = $currentDate[0] - 1; // current year
  $param['conditionParam']['param']['to_year'] = $currentDate[0] ; // current year

	$account_list = $Account->get_account_one_list($param)['data'];	


	// first condition for month & second for days for the fiancial year
	if($currentDate[1] == '04' && $currentDate[2] == '01'){ // validate Financial Year

		
		foreach ($dist_list as $key => $value) { //store data if financial year


			//get account details
			$param = array();
			$param['conditionParam']['param']['dist_id'] = $value['id'];
			$param['conditionParam']['param']['from_year'] = $currentDate[0] - 1;
      $param['conditionParam']['param']['to_year'] = $currentDate[0];

			$account_details_validate = $Account->get_account_one_details($param)['data'];

			if($account_details_validate == null){ // if not found then insert
				$account['type'] = 'Add';
				$account['dist_id'] = $value['id'];
				$account['from_year'] = $currentDate[0];
        $account['to_year'] = $currentDate[0] + 1;
				$account['status'] = 1;
				$Account->manage_account_one($account);
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
           वर्ष <?=($currentDate[0] - 1)?>-<?=$currentDate[0]?> 14वाॅ वित्त आयोग के अन्तर्गत प्रगति का जनपदवार विवरण: क्षेत्र पंचायत	
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
          <th rowspan="3">क्र.सं.</th>
      <?php } ?>

        <th rowspan="3">जनपद </th>
        <th rowspan="3">पूर्ववर्ती वर्षों का दिनांक 01.04.<?=($currentDate[0]-1)?> को अवेशष </th>
        <th rowspan="3">अवशेष के सापेक्ष अब तक व्यय</th>
        <th rowspan="3">पूर्ववर्ती वर्षों का अद्यतन अवशेष</th>
        <th colspan="2">वित्तीय वर्ष <?=($currentDate[0] - 1)?>-<?=$currentDate[0]?> की आवंटित धनराशि</th>
        <th rowspan="3">कुल उपलब्ध धनराशि</th>
        <th rowspan="3"><?=($currentDate[0] - 1)?>-<?=$currentDate[0]?>की व्यय राशि</th>
        <th rowspan="3"><?=($currentDate[0] - 1)?>-<?=$currentDate[0]?> की अवशेष धनराशि</th>
        <th rowspan="3">वर्ष <?=($currentDate[0] - 1)?>-<?=$currentDate[0]?> हेतु भौतिक लक्ष्य</th>
        <th colspan="4"><center>भौतिक पूर्ति(संख्या)</center></th>
        <th rowspan="3">ऑपरेशन</th>
   <!--      <th rowspan="2"></th>
        <th rowspan="2"></th>
        <th rowspan="2"></th> -->
      </tr>
      <tr>
     	<th>प्रथम किश्त</th>
     	<th>द्वितीय किश्त</th>
     	<th>पेयजल</th>
     	<th>स्वच्छता</th>
     	<th>अन्य</th>
     	<th>कुल पूर्ण योजनाऐं</th>
      </tr>
    </thead>
    <tbody>
    <?php   if(count($account_list) > 0){  

    			foreach ($account_list as $key => $account_value) { 

						$param = array();
						$param['conditionParam']['param']['id'] = $account_value['dist_id'];
						$dist_details = $Dist->get_dist_details($param)['data'];

            if(($_SESSION[$_SESSION_ID]['admin']->dist_id == $dist_details->id) || ($_SESSION[$_SESSION_ID]['admin']->dist_id == 0)){

              if($_SESSION[$_SESSION_ID]['admin']->dist_id == 0){ // admin

                $admin_editable = 'true';
                $user_editable = 'false';


              }else{

                $admin_editable = 'false';
                $user_editable = 'true';
              }



              //total value
              $account_one += intval($account_value['account_section_1']);
              $account_two += intval($account_value['account_section_2']);
              $account_three += intval($account_value['account_section_3']);
              $account_four += intval($account_value['account_section_4']);
              $account_five += intval($account_value['account_section_5']);
              $account_six += intval($account_value['account_section_6']);
              $account_seven += intval($account_value['account_section_7']);
              $account_eight += intval($account_value['account_section_8']);
              $account_nine += intval($account_value['account_section_9']);
              $account_ten += intval($account_value['account_section_10']);
              $account_eleven += intval($account_value['account_section_11']);
              $account_twelve += intval($account_value['account_section_12']);
              $account_thirteen += intval($account_value['account_section_13']);


    				?>
    				

  
      <tr>
      <?php if($admin_editable == 'true'){ ?>
      <td><?=($key+1)?></td>
      <?php } ?>
      <td ><?=$dist_details->dist_name?></td>
      <td id="one_<?=$key?>" contenteditable="<?= $admin_editable ?>" class="allownumericwithoutdecimal"><?= $account_value['account_section_1'] ?></td>
      <td id="two_<?=$key?>" contenteditable="<?= $user_editable ?>"  class="allownumericwithoutdecimal"><?= $account_value['account_section_2'] ?></td>
      <td id="three_<?=$key?>" contenteditable="false"  class="allownumericwithoutdecimal"><?= $account_value['account_section_3'] ?></td>
      <td id="four_<?=$key?>" contenteditable="<?= $admin_editable ?>" class="allownumericwithoutdecimal"><?= $account_value['account_section_4'] ?></td>
      <td id="five_<?=$key?>" contenteditable="<?= $admin_editable ?>" class="allownumericwithoutdecimal"><?= $account_value['account_section_5'] ?></td>
      <td id="six_<?=$key?>" contenteditable="false" class="allownumericwithoutdecimal"><?= $account_value['account_section_6'] ?></td>
      <td id="seven_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $account_value['account_section_7'] ?></td>
      <td id="eight_<?=$key?>" contenteditable="false" class="allownumericwithoutdecimal"><?= $account_value['account_section_8'] ?></td>
      <td id="nine_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $account_value['account_section_9'] ?></td>
      <td id="ten_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $account_value['account_section_10'] ?></td>
      <td id="eleven_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $account_value['account_section_11'] ?></td>
      <td id="twelve_<?=$key?>" contenteditable="<?= $user_editable ?>" class="allownumericwithoutdecimal"><?= $account_value['account_section_12'] ?></td>
      <td id="thirteen_<?=$key?>" contenteditable="false" class="allownumericwithoutdecimal"><?= $account_value['account_section_13'] ?></td>
      <td><button class="btn" onclick="updateData('<?= $account_value['id'] ?>','one_<?=$key?>','two_<?=$key?>','three_<?=$key?>','four_<?=$key?>','five_<?=$key?>','six_<?=$key?>','seven_<?=$key?>','eight_<?=$key?>','nine_<?=$key?>','ten_<?=$key?>','eleven_<?=$key?>','twelve_<?=$key?>','thirteen_<?=$key?>')">Update</button></td>
      </tr>

      <?php }  }
      	}
      ?>
    </tbody>
  <?php if($admin_editable == 'true'){ ?>
    <tfoot >
    		  <td colspan="2"><center>महायोग</center></td>
      <!-- <td></td>    --> 
      <td><?=$account_one?></td>
      <td><?=$account_two?></td>
      <td><?=$account_three?></td>
      <td><?=$account_four ?></td>
      <td><?=$account_five ?></td>
      <td><?=$account_six ?></td>
      <td><?=$account_seven ?></td>
      <td><?=$account_eight ?></td>
      <td><?=$account_nine ?></td>
      <td><?=$account_ten ?></td>
      <td><?=$account_eleven ?></td>
      <td><?=$account_twelve ?></td>
      <td><?=$account_thirteen ?></td>
      

    </tfoot>
    <?php } ?>
  </table>


		<!-- table content end -->



			
		</div>
		</div>
	
		
		
		</section>
		</div>
		



		<script type="text/javascript">
			

		function updateData(account_id,one,two,three,four,five,six,seven,eight,nine,ten,eleven,twelve,thirteen){

			jQuery.ajax({
				  url: 'ajax_form_handler.php',
				  type: 'GET',
				  data: {'access':'true','action':'account_one','editId':account_id,
				  'account_section_1':$('#'+one).text(),
				  'account_section_2':$('#'+two).text(),
				  'account_section_3':(parseInt($('#'+one).text()) -  parseInt($('#'+two).text())),
				  'account_section_4':$('#'+four).text(),
				  'account_section_5':$('#'+five).text(),
				  'account_section_6':(parseInt($('#'+one).text()) -  parseInt($('#'+two).text())),
				  'account_section_7':$('#'+seven).text(),
				  'account_section_8':(parseInt($('#'+one).text()) -  parseInt($('#'+two).text())),
				  'account_section_9':$('#'+nine).text(),
				  'account_section_10':$('#'+ten).text(),
				  'account_section_11':$('#'+eleven).text(),
				  'account_section_12':$('#'+twelve).text(),
				  'account_section_13':(parseInt($('#'+ten).text())+parseInt($('#'+eleven).text())+parseInt($('#'+twelve).text()) ),
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