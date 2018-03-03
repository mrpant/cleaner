<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



 include '../../../includes/global/config.php';
 include '../includes/global/autoloader.php';
 include '../../../plug_in/html_purifier/library/HTMLPurifier.auto.php';
 include '../../../plug_in/phpmailer/vendor/autoload.php';
 $config = HTMLPurifier_Config::createDefault();
 $purifier = new HTMLPurifier($config);
 // secure all request parameters
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
 
 /*
  URL to access : http://client.zoneonedigital.com/bitsmart/api/ws/controller
  Parameters required have been enlisted underneath for each method.
  Necessary parameters to be used for each web service (used for logging):
  - userId (Integer/Optional (userId of logged in user))
  - deviceIMEI (Integer)
  - IP (String (Optional))
  - latitude (String)
  - longitude (String)
  */
 $action = null;
 $secureToken = '345knsd43dfs8ffg67gf23vdffg343fbfg23647236hbahsdbas73453kjdmnfdkjsdnas87234kj23nasknkjsdf86723832sdfb7346587345bsdjfdf8444zdfsdbf237462dfhjker56fgfgbjse7hyuj'; // static token

 $header = apache_request_headers();
 if(isset($_REQUEST['action']) && ($_REQUEST['action']!=null))
  $action = $_REQUEST['action'];
 else {
  echo 'You are not authorised to use this service.';
  die();
 }
 if(isset($_REQUEST['access']) && $_REQUEST['access']=='true')
 {
  switch($action){

  case  "getToken";
             echo json_encode(array('token'=>$secureToken));
    break;   

  case "login":

    if(isset($header['token']) && $header['token'] == $secureToken){

      $param = array();
      $emessage = 'Invalid Login Credentials !!!';
      $param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
      $param['conditionParam']['param']['password'] = base64_encode($_REQUEST['password']);
          
      $login = $Admin->get_user_details($param)['data'];

      // ob_start();
      // include('signup_email/index.php'); //would normally get printed to the screen/output to browser
      // $html = ob_get_contents();
      // ob_end_clean();

      // $mail = new GlobalMailer();
      // $isSent = $mail->sendMail($_REQUEST['mailId'], ucwords($_REQUEST['password']) . ' ' . ucwords($_REQUEST['password']) , "Hii", "subject", "siya0663@gmail.com", "Siya", new PHPMailer);
        
      if($login != null){

       $response['status'] = true;
       $response['data'] = $login;
       $response['displyMessage'] ="Successfully Listed";
       }else{
       $response['status'] = false;
       $response['data'] = null;
       $response['displyMessage'] ="No data Found!!";
       }
       print_r(json_encode($response));

    }else{

      $response['status'] = false;
      $response['data'] = null;
      $response['displyMessage'] ="Invalid Token !!";

       print_r(json_encode($response));
      
    }

      
      break;

  case "forgot_password":

    if(isset($header['token']) && $header['token'] == $secureToken){


    $param =array();
    $param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
    $userdetails = $Admin->get_user_details($param)['data']; 

    

    if($userdetails != null){

      $to = 'siya0663@gmail.com';

      $subject = "Forget Password";

      $html =  '<html><body>><h4> Hi '.$userdetails->username.'</h4><p>Email Id : '.$userdetails->mailId.'</p><br><p>Password : '.base64_decode($userdetails->password).'</p><br></body></html>';

      $header = "From:siya0663@gmail.com \r\n";

      $header .= "Cc:info@quickschooling.com \r\n";

      $header .= "MIME-Version: 1.0\r\n";

      $header .= "Content-type: text/html\r\n";

             

      $retval = mail ($to,$subject,$html,$header);
      $retval = 1;

    }

        //print_r($retval);



       if($retval >0){

       $response['status'] = true;
       $response['data'] = $userdetails;

       $response['displyMessage'] ="Your password has been sent to your Email-Id";

       }else{

       $response['status'] = false;

       $response['displyMessage'] ="Error!! Please try Again!!";

       }

       print_r(json_encode($response));
    }else{

      $response['status'] = false;
      $response['data'] = null;
      $response['displyMessage'] ="Invalid Token !!";

       print_r(json_encode($response));
      
    }

        break; 



  // end forgot password 


    case "user_signup":

    if(isset($header['token']) && $header['token'] == $secureToken){

      $flag = null;

      $_REQUEST['type'] = 'Add';
      $_REQUEST['password'] = base64_encode($_REQUEST['password']);


      $flag = $Admin->manage_account($_REQUEST);



       if($flag >0){

        $param =array();
        $param['conditionParam']['param']['mailId'] = $_REQUEST['mailId'];
        $userdetails = $Admin->get_user_details($param)['data'];

        $response['status'] = true;
        $response['data'] = $userdetails;

        $response['displyMessage'] ="Successfully Registered";

       }else{

       $response['status'] = false;
       $response['data'] = null;
       $response['displyMessage'] ="Already Exists";

       }

       print_r(json_encode($response));
    }else{

      $response['status'] = false;
      $response['data'] = null;
      $response['displyMessage'] ="Invalid Token !!";

       print_r(json_encode($response));
      
    }

        break; 

    case "get_property_list":

    if(isset($header['token']) && $header['token'] == $secureToken){

      $param =array();
      $param['conditionParam']['param']['1'] = 1;
      $propertyList = $Property->get_property_list($param)['data'];
      
      if(count($propertyList) > 0){

        $response['status'] = true;
        $response['data'] = $propertyList;
        $response['displyMessage'] ="Successfully Listed";

        }else{

        $response['status'] = false;
        $response['data'] = null;
        $response['displyMessage'] ="No Result Found";

        }

        print_r(json_encode($response));

    }else{

      $response['status'] = false;
      $response['data'] = null;
      $response['displyMessage'] ="Invalid Token !!";

        print_r(json_encode($response));
      
    }

    break;


case "manage_address":

    if(isset($header['token']) && $header['token'] == $secureToken){
      $_REQUEST['type'] = 'Add';
      $_REQUEST['status'] = 1;
      $flag = $Address->manage_address($_REQUEST);
      if($flag >0){

        $response['status'] = true;
        $response['data'] = $flag;

        $response['displyMessage'] ="Successfully Added";

       }else{

       $response['status'] = false;
       $response['data'] = null;
       $response['displyMessage'] ="Sorry Somthing is Missing..";

       }

       print_r(json_encode($response));

    }else{

      $response['status'] = false;
      $response['data'] = null;
      $response['displyMessage'] ="Invalid Token !!";

       print_r(json_encode($response));
      
    }

        break;

  case "discount_list":

        if(isset($header['token']) && $header['token'] == $secureToken){
          $param =array();
          $param['conditionParam']['param']['1'] = 1;
          $discountList = $Discount->get_discount_list($param);
          if(count($discountList) >0){
    
            $response['status'] = true;
            $response['data'] = $discountList;
    
            $response['displyMessage'] ="Successfully Listed";
    
           }else{
    
           $response['status'] = false;
           $response['data'] = null;
           $response['displyMessage'] ="No Record Found";
    
           }
    
           print_r(json_encode($response));
    
        }else{
    
          $response['status'] = false;
          $response['data'] = null;
          $response['displyMessage'] ="Invalid Token !!";
    
           print_r(json_encode($response));
          
        }
    
      break;

  case "time_slot_list":

      if(isset($header['token']) && $header['token'] == $secureToken){
        $param =array();
        $param['conditionParam']['param']['1'] = 1;
        $timeList = $Time->get_time_list($param);
        if(count($timeList) >0){
  
          $response['status'] = true;
          $response['data'] = $timeList;
  
          $response['displyMessage'] ="Successfully Listed";
  
         }else{
  
         $response['status'] = false;
         $response['data'] = null;
         $response['displyMessage'] ="No Record Found";
  
         }
  
         print_r(json_encode($response));
  
      }else{
  
        $response['status'] = false;
        $response['data'] = null;
        $response['displyMessage'] ="Invalid Token !!";
  
         print_r(json_encode($response));
        
      }
  
    break;     
     
    case "cleaner_list":

    if(isset($header['token']) && $header['token'] == $secureToken){
      $param =array();
      $param['conditionParam']['param']['roleId'] = 3;
      $cleanerList = $Admin->get_user_list($param);
      if(count($cleanerList) >0){

        $response['status'] = true;
        $response['data'] = $cleanerList;
        $response['displyMessage'] ="Successfully Listed";

       }else{

       $response['status'] = false;
       $response['data'] = null;
       $response['displyMessage'] ="No Record Found";

       }

       print_r(json_encode($response));

    }else{

      $response['status'] = false;
      $response['data'] = null;
      $response['displyMessage'] ="Invalid Token !!";

       print_r(json_encode($response));
      
    }

  break;   


  case "room_list":

  if(isset($header['token']) && $header['token'] == $secureToken){
    $param =array();
    $param['conditionParam']['param']['1'] = 1;
    $roomList = $Rooms->get_rooms_list($param);
    if(count($roomList) >0){

      $response['status'] = true;
      $response['data'] = $roomList;
      $response['displyMessage'] ="Successfully Listed";

     }else{

     $response['status'] = false;
     $response['data'] = null;
     $response['displyMessage'] ="No Record Found";

     }

     print_r(json_encode($response));

  }else{

    $response['status'] = false;
    $response['data'] = null;
    $response['displyMessage'] ="Invalid Token !!";

     print_r(json_encode($response));
    
  }

break;

    case "manage_job":

    if(isset($header['token']) && $header['token'] == $secureToken){
      $_REQUEST['type'] = 'Add';
      $_REQUEST['status'] = 1;
      $flag = $Job->manage_job($_REQUEST);
      if($flag >0){

        $response['status'] = true;
        $response['data'] = $flag;

        $response['displyMessage'] ="Successfully Added";

       }else{

       $response['status'] = false;
       $response['data'] = null;
       $response['displyMessage'] ="Sorry Somthing is Missing..";

       }

       print_r(json_encode($response));

    }else{

      $response['status'] = false;
      $response['data'] = null;
      $response['displyMessage'] ="Invalid Token !!";

       print_r(json_encode($response));
      
    }

        break;

    case "manage_profile":

    if(isset($header['token']) && $header['token'] == $secureToken){

      $flag = null;

      $_REQUEST['type'] = 'Edit';
      $_REQUEST['password'] = base64_encode($_REQUEST['password']);

      $uploadPath = "../../../assets/uploads/";
      $databasePath = "assets/uploads/";
      $filename = $_FILES['image']['name'];
      $unique = rand(0, 50) . '_' . $filename;
      $uploadPath.= $unique;
      $databasePath.= $unique;

      $upload = move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);
      $_REQUEST['image'] =  $databasePath;

      $flag = $Admin->manage_account($_REQUEST);



       if($flag >0){

        $param =array();
        $param['conditionParam']['param']['id'] = $_REQUEST['editId'];
        $userdetails = $Admin->get_user_details($param)['data'];

        $response['status'] = true;
        $response['data'] = $userdetails;

        $response['displyMessage'] ="Successfully Updated";

       }else{

       $response['status'] = false;
       $response['data'] = null;
       $response['displyMessage'] ="Already Exists";

       }

       print_r(json_encode($response));
    }else{

      $response['status'] = false;
      $response['data'] = null;
      $response['displyMessage'] ="Invalid Token !!";

       print_r(json_encode($response));
      
    }

        break; 

  default:
    echo "sorry some parameters is Missing!!";
    break;

  }
  
 } 
?>