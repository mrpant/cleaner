<?php 

	header('Location: admin');
	exit;

	include 'includes/global/config.php';
	include 'includes/global/autoloader.php';
	if(!isset($_SESSION[$_SESSION_ID]['guestAccessToken']))
		$_SESSION[$_SESSION_ID]['guestAccessToken'] = $Generic->generate_random_alphanumeric_string(50);
	//if(!isset($_SESSION['perserbid']['configuration']))
	{
		$param = array();
		$param['conditionParam']['param']['id'] = 1;
		$_SESSION[$_SESSION_ID]['configuration'] = $System->get_configuration_details($param)['data'];
	} ?>
	<!DOCTYPE HTML>
	<html>
	<head>
	<?php include ('includes/global/head.php'); 
		   include ('includes/global/header.php');	
		?>
	</head>
	<body>
	 <script type="text/javascript">

    <?php if(isset($_GET['flag']) && $_GET['flag'] <= 0){?>

    toastr.error('<?=$_GET["msg"]?>');

    <?php } ?>

   <?php if(isset($_GET['flag']) && $_GET['flag'] > 0){?>

      toastr.success('<?=$_GET["msg"]?>');



    <?php } ?>

  </script>
<?php	

	//$user = (isset($_SESSION[$_SESSION_ID]['user'])?$_SESSION[$_SESSION_ID]['user']:null);
		

	/*********** VALIDATE ALL URL  REQUEST ********************/


	
	 	 if(isset($_REQUEST['url'])){			
	  		 $URL = explode('/', $_REQUEST['url']);    // index 0 for action and other for params  of that action

	  		 $param = array();
			 $param['conditionParam']['param']['post_rewrite_url'] = str_replace(".html", "", $URL[0]) ;
			 $slug = $Post->get_post_details($param)['data'];




			   if($slug != null){
			 	  include("includes/content/single_post.php");
			 	}else if($slug == null) {
		 		  include("includes/content/not_found.php");
			 	}
			 	

	  	}else{

  				include("includes/content/home.php");
	  	}

		
		
	/*********** VALIDATE ALL URL  REQUEST ********************/

	
	include ('includes/global/footer.php') ?>



	</body>


	</html>