<!DOCTYPE html>
<head>
    <title><?= $_SESSION[$_SESSION_ID]['configuration']->websiteName ?> </title>
     <meta charset="UTF-8">
    <link rel="icon" href="<?= $_PATH['websiteRoot'] ?>/<?= $_SESSION[$_SESSION_ID]['configuration']->fevicon ?>" type="image/x-icon" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/1.3.1/css/toastr.css">
     <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <link rel="stylesheet" href="assets/style.css">  
     <link href="https://fonts.googleapis.com/css?family=Ek+Mukta" rel="stylesheet">
    <script type="text/javascript">
   $(document).ready(function(){

   // $('.skin-blue').addClass('skin-blue sidebar-mini sidebar-collapse');
   });
    </script>
    <style>
    .skin-blue .main-header .logo{
        background-color: #00c0ef!important;
    }
    </style>
</head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">