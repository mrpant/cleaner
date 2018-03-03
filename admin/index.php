<?php 

	include 'includes/global/config.php';
	include 'includes/global/autoloader.php';
	include '../plug_in/html_purifier/library/HTMLPurifier.auto.php';
	$config = HTMLPurifier_Config::createDefault();
	$purifier = new HTMLPurifier($config);
	//if(!isset($_SESSION[$_SESSION_ID]['configuration']))
	{
		$param = array();
		$param['conditionParam']['param']['id'] = 1;
		$_SESSION[$_SESSION_ID]['configuration'] = $System->get_configuration_details($param)['data'];
	}
	
	if(!isset($_SESSION[$_SESSION_ID]['guestAccessToken']))
		$_SESSION[$_SESSION_ID]['guestAccessToken'] = $Generic->generate_random_alphanumeric_string(50);
	include ('includes/global/head.php');
	$user = null;
	if(isset($_SESSION[$_SESSION_ID]['admin']))
		include ('includes/global/header.php');
	if(isset($_SESSION[$_SESSION_ID]['admin']))
		$user = $_SESSION[$_SESSION_ID]['admin'];
	if($user != null)
		include 'includes/global/left_bar.php';

	?>
	<script>
		jQuery("ul.collapse").slideUp(0);
	</script>
	<?php 




	switch(@$_GET['url'])
	{
	case "dashboard" :
		{
			include("includes/content/dashboard.php");
			break;
		}

	case "configuration" :
		{
			include("includes/content/configuration.php");
			break;
		}
	case "address" :
		{
			include("includes/content/address.php");
			break;
		}

	case "rooms" :
		{
			include("includes/content/rooms.php");
			break;
		}

	case "amount" :
		{
			include("includes/content/amount.php");
			break;
		}

	case "jobdatetime" :
		{
			include("includes/content/jobdatetime.php");
			break;
		}

	case "property" :
		{
			include("includes/content/property.php");
			break;
		}
	case "time" :
		{
			include("includes/content/time.php");
			break;
		}
	case "dist" :
		{
			include("includes/content/dist.php");
			break;
		}

	case "admin" :
		{
			include("includes/content/admin.php");
			break;
		}

    case "account_manage_one" :
		{
			include("includes/content/account_manage_one.php");
			break;
		}

	case "training_manage_one" :
	{
		include("includes/content/training_manage_one.php");
		break;
	}

		
		default :
		{
			if($user != null)
				include("includes/content/dashboard.php");
			else
				include("includes/content/login.php");
			break;
		}
	}
	?>
	
	<?php
	if(isset($_SESSION[$_SESSION_ID]['admin']))
		include ('includes/global/footer.php') 
?>