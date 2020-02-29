<?php 
session_start();
include_once 'config/config.php';
include_once 'config/database.php'; 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OSHO CMS</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css?v=1.3" />
        <link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css?v=1.3" />
        <link rel="stylesheet" href="assets/css/colorpicker.css?v=1.3" />
        <link rel="stylesheet" href="assets/css/datepicker.css?v=1.3" />
        <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css?v=1.3" />
        <link rel="stylesheet" href="assets/css/uniform.css?v=1.3" />
        <link rel="stylesheet" href="assets/css/select2.css?v=1.3" />
        <link rel="stylesheet" href="assets/css/matrix-style.css?v=1.3" />
        <link rel="stylesheet" href="assets/css/matrix-media.css?v=1.3" />
        
        <!--<link rel="stylesheet" href="" />-->
        <link href="assets/font-awesome.css?v=1.3" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href=". /assets/style.css" />
        <script>var BASEJSURL = "http://localhost/";</script>
    </head>
    <body>  
        <!--Header-part-->
        <div id="header">
            <h2 style="padding-top:20px;padding-left:10px;">ADMIN CMS<h2>
        </div>
        <!--close-Header-part--> 
        <!--top-Header-menu-->
        <div id="user-nav" class="navbar navbar-inverse">

            <ul class="nav">
                <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Admin</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                   
                        <li><a href="<?php echo ROOT . "logout.php" ?>"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <script type="text/javascript">
var isFormChanged = false;
$(document).ready(function() {
    $('input').keydown(function() {
        isFormChanged = true;
    });
});
</script>
        <!--close-top-serch-->
