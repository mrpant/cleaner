<?php

	include_once('includes/global/config.php');

	include_once('includes/global/autoloader.php');

	include '../plug_in/html_purifier/library/HTMLPurifier.auto.php';

	$config = HTMLPurifier_Config::createDefault();

	$purifier = new HTMLPurifier($config);

	// secure request parameters

	$keys = array_keys($_REQUEST);

	for($count=0;$count<count($keys);$count++)

	{

		if(is_array($_REQUEST[$keys[$count]]))

		{

			$innerArray = $_REQUEST[$keys[$count]];

			for($countInner=0;$countInner<count($innerArray);$countInner++)

			{

				$innerArray[$countInner] = $purifier->purify($innerArray[$countInner]);

			}

			$_REQUEST[$keys[$count]] = $innerArray;

		}

		else $_REQUEST[$keys[$count]] = $purifier->purify($_REQUEST[$keys[$count]]);

	}

	if(isset($_REQUEST['access']) && $_REQUEST['access']=='true')

	{

		switch($_REQUEST['action'])

		{

			case 'account_one':

					$_REQUEST['type'] = 'Edit';
					$_REQUEST['user_id'] = $_SESSION[$_SESSION_ID]['admin']->id;


					$flag = $Account->manage_account_one($_REQUEST);

					if($flag > 0){
						echo json_encode(array('status'=>'true'));
					}else{
						echo json_encode(array('status'=>'false'));

					}


				break;

			case 'training_one':

					$_REQUEST['type'] = 'Edit';
					$_REQUEST['user_id'] = $_SESSION[$_SESSION_ID]['admin']->id;
					

					$flag = $Training->manage_training_one($_REQUEST);

					if($flag > 0){
						echo json_encode(array('status'=>'true'));
					}else{
						echo json_encode(array('status'=>'false'));

					}


				break;

			
			




		}

	}

?>	