<?php
	ob_start();
	include 'includes/global/config.php';
	include("includes/global/autoloader.php");
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
	$action = $_REQUEST['action'];
	$smessage="Data successfully updated.."; 
	$emessage="Data updation failed";
	switch($action)
	{	
		case "login":
			$param = array();
			$emessage = 'Invalid Login Credentials !!!';
			$param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
			$param['conditionParam']['param']['password'] = base64_encode($_REQUEST['password']);
			//$param['conditionParam']['param']['roleId'] = $_REQUEST['roleId'];			
				$login = $Admin->get_user_details($param)['data'];
				
			if(($login != null))
			{
				$_SESSION[$_SESSION_ID]['accessToken'] = $Generic->generate_random_alphanumeric_string(50);
				$_SESSION[$_SESSION_ID]['admin'] = $login;
				header("Location: ./?url=dashboard");
			}
			else
				header("Location: ./?status=error&msg=".$emessage);
			break;
		
		case "manageConfiguration":
			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			$emessage = 'Configuration could be saved. Please try again.';
			$smessage = 'Configuration has been saved successfully.';
			$validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
			if(isset($_FILES['logo']['name']) && ($_FILES['logo']['name'] != null))
			{
				$fileName = $_FILES['logo']['name'];
				$extension = explode('.',$fileName);
				$logoExtension = strtoupper($extension[count($extension)-1]);
				if(!in_array($logoExtension,$validExtensions))
				{
					$flag = -1;
					$emessage.= 'Usupported Logo File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
				}
			}
			if(isset($_FILES['fevicon']['name']) && ($_FILES['fevicon']['name'] != null))
			{
				$fileName = $_FILES['fevicon']['name'];
				$extension = explode('.',$fileName);
				$feviconExtension = strtoupper($extension[count($extension)-1]);
				if(!in_array($feviconExtension,$validExtensions))
				{
					$flag = -1;
					$emessage.= 'Usupported Fevicon File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
				}
			}
			if($flag == null)
				$flag = $System->manage_configuration($_REQUEST);
			
			if($flag>0)
			{
				header('Location:./?url=configuration&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=configuration&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;

    case "manageAmount" :

			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Amount could not be added. Please try again.';
				$smessage = 'Amount has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Amount could not be edited. Please try again.';
				$smessage = 'Amount has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Amount could not be deleted. Please try again.';
				$smessage = 'Amount  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
			if($flag==null)
				
				$flag = $Discount->manage_discount($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=amount&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=amount&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;


    case "manageTime" :

			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Time could not be added. Please try again.';
				$smessage = 'Time has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Time could not be edited. Please try again.';
				$smessage = 'Time has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Time could not be deleted. Please try again.';
				$smessage = 'Time  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
			if($flag==null)
				
				$flag = $Time->manage_time($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=time&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=time&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;

			case "manageRooms" :

			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Rooms could not be added. Please try again.';
				$smessage = 'Rooms has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Rooms could not be edited. Please try again.';
				$smessage = 'Rooms has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Rooms could not be deleted. Please try again.';
				$smessage = 'Rooms  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
			if($flag==null)
				
				$flag = $Rooms->manage_account($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=rooms&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=rooms&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;			

case "manageProperty" :

			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Property could not be added. Please try again.';
				$smessage = 'Property has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Property could not be edited. Please try again.';
				$smessage = 'Property has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Property could not be deleted. Please try again.';
				$smessage = 'Property  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
			if($flag==null)
				
				$flag = $Property->manage_account($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=property&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=property&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;

 case "manageBanner" :
			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Banner could not be added. Please try again.';
				$smessage = 'Banner has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Banner could not be edited. Please try again.';
				$smessage = 'Banner has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Banner could not be deleted. Please try again.';
				$smessage = 'Banner  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
					$validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
						if(isset($_FILES['banner_image']['name']) && ($_FILES['banner_image']['name'] != null))
						{
							$fileName = $_FILES['banner_image']['name'];
							$extension = explode('.',$fileName);
							$logoExtension = strtoupper($extension[count($extension)-1]);
							if(!in_array($logoExtension,$validExtensions))
							{
								$flag = -1;
								$emessage.= 'Usupported Logo File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
							}
						}
					if($flag==null)
							$flag = $Banner->manage_banner($_REQUEST);
				
			
			}
			if($flag>0)
			{
				header('Location:./?url=banner&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=banner&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;



    case "manageCategory" :
			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Category could not be added. Please try again.';
				$smessage = 'Category has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Category could not be edited. Please try again.';
				$smessage = 'Category has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Category could not be deleted. Please try again.';
				$smessage = 'Category  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
				$validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
						if(isset($_FILES['category_image']['name']) && ($_FILES['category_image']['name'] != null))
						{
							$fileName = $_FILES['category_image']['name'];
							$extension = explode('.',$fileName);
							$logoExtension = strtoupper($extension[count($extension)-1]);
							if(!in_array($logoExtension,$validExtensions))
							{
								$flag = -1;
								$emessage.= 'Usupported Logo File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
							}
						}
					if($flag==null)
							$flag = $Category->manage_category($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=category&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=category&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;


    case "manageDist" :
			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Dist could not be added. Please try again.';
				$smessage = 'Dist has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Dist could not be edited. Please try again.';
				$smessage = 'Dist has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Dist could not be deleted. Please try again.';
				$smessage = 'Dist  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
				
					if($flag==null)
							$flag = $Dist->manage_dist($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=dist&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=dist&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;

	case "manageAdmin" :
			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'User could not be added. Please try again.';
				$smessage = 'User has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'User could not be edited. Please try again.';
				$smessage = 'User has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'User could not be deleted. Please try again.';
				$smessage = 'User  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
				
					if($flag==null){

						if($_REQUEST['type'] == 'Add'){

							if($_REQUEST['password'] == $_REQUEST['confirmPassword']){

								$_REQUEST['password'] = base64_encode($_REQUEST['password']);

								$flag = $Admin->manage_account($_REQUEST);

							}else{
								$flag = -1;
								$emessage = "Password and confirm Password doesnot match";
							}
						}else{

							$flag = $Admin->manage_account($_REQUEST);
						}

						

							
					}
							
			
			}
			if($flag>0)
			{
				header('Location:./?url=admin&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=admin&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;


	case "manageSubCategory" :
			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'SubCategory could not be added. Please try again.';
				$smessage = 'SubCategory has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'SubCategory could not be edited. Please try again.';
				$smessage = 'SubCategory has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'SubCategory could not be deleted. Please try again.';
				$smessage = 'SubCategory  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
				
				$validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
						if(isset($_FILES['sub_category_image']['name']) && ($_FILES['sub_category_image']['name'] != null))
						{
							$fileName = $_FILES['sub_category_image']['name'];
							$extension = explode('.',$fileName);
							$logoExtension = strtoupper($extension[count($extension)-1]);
							if(!in_array($logoExtension,$validExtensions))
							{
								$flag = -1;
								$emessage.= 'Usupported Logo File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
							}
						}
					if($flag==null)
							$flag = $SubCategory->manage_sub_category($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=subcategory&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=subcategory&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;




    case "managePost" :



			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Post could not be added. Please try again.';
				$smessage = 'Post has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Post could not be edited. Please try again.';
				$smessage = 'Post has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Post could not be deleted. Please try again.';
				$smessage = 'Post  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
					
					$_REQUEST['post_createdOn'] = date('y-m-d h:i:s');

					$validExtensions = array('PNG','JPG','JPEG','GIF','BMP','SVG');
						if(isset($_FILES['post_image']['name']) && ($_FILES['post_image']['name'] != null))
						{
							$fileName = $_FILES['post_image']['name'];
							$extension = explode('.',$fileName);
							$logoExtension = strtoupper($extension[count($extension)-1]);
							if(!in_array($logoExtension,$validExtensions))
							{
								$flag = -1;
								$emessage.= 'Usupported Logo File was uploaded. Following are the supported formats : PNG,JPG,JPEG,GIF,BMP,SVG';
							}
						}

                     $validExtensions_media = array('MPEG','AVI','WMV','QuickTime','RealVideo','Flash','Ogg','WebM','MPEG-4','MP4','MP3');
						if(isset($_FILES['post_media']['name']) && ($_FILES['post_media']['name'] != null))
						{
							$fileName = $_FILES['post_media']['name'];
							$extension = explode('.',$fileName);
							$logoExtension = strtoupper($extension[count($extension)-1]);
							if(!in_array($logoExtension,$validExtensions_media))
							{
								$flag = -1;
								 $emessage.= 'Usupported Logo File was uploaded. Following are the supported formats : MPEG,AVI,WMV,QuickTime,RealVideo,Flash,Ogg,WebM,MPEG-4,MP4,MP3';
							}
						}

					if($flag==null)
							$flag = $Post->manage_post($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=post&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=post&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;

 case "manageMapping" :
			if((!isset($_REQUEST['accessToken'])) || ($_REQUEST['accessToken'] != $_SESSION[$_SESSION_ID]['accessToken']))
			{
				include 'includes/content/blocks/invalid_access.php';
				exit;
			}
			$flag = null;
			if(($_REQUEST['type']=='Add'))
			{
				// server side validation here
				$emessage = 'Mapping could not be added. Please try again.';
				$smessage = 'Mapping has been added successfully.';
			}
			if(($_REQUEST['type']=='Edit'))
			{
				// server side validation on add event
				$emessage = 'Mapping could not be edited. Please try again.';
				$smessage = 'Mapping has been edited successfully.';
			}
			if($_REQUEST['type'] == 'Delete')
			{
				$emessage = 'Mapping could not be deleted. Please try again.';
				$smessage = 'Mapping  has been deleted successfully.';
				// server side validation on delete even
			}
			if(($_REQUEST['type']=='Add') || ($_REQUEST['type']=='Edit') ||($_REQUEST['type'] == 'Delete'))
			{
					$_REQUEST['mapping_post_id'] = implode(',',$_REQUEST['mapping_post_id']);
						
				if($flag == null)
					$flag = $Mapping->manage_mapping($_REQUEST);
			
			}
			if($flag>0)
			{
				header('Location:./?url=mapping&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:./?url=mapping&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;


	case "manageContact" :
			
			
			if(($_REQUEST['type']=='Add'))
			{
				print_r($_REQUEST);
			
				// server side validation on add event
				}		
				if($flag == null)
					$flag = $Contact->manage_contact($_REQUEST);


				if($flag>0)
			{
				header('Location:../?sra_page_url='.base64_encode('contact').'&tab=View&flag='.$flag.'&msg='.$smessage);
			}
			else
			{
				header('Location:../?sra_page_url='.base64_encode('contact').'&tab=View&flag='.$flag.'&msg='.$emessage);
			}
			break;





			case "logout" :
								unset($_SESSION[$_SESSION_ID]['accessToken']);
								unset($_SESSION[$_SESSION_ID]['admin']);
								@session_destroy();
								header('location:/');
								break;

	
	}
?>