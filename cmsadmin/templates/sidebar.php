<?php
include_once 'config/config.php';
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
?>

<div id="sidebar">
    <ul style="font-size: 15px;">
        <li class="<?php echo (isset($uri_segments[2]) && $uri_segments[2] == 'dashboard.php') ? 'active' : '' ?>"><a href="<?php echo ROOT . "dashboard.php"; ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a> </li> 
        <li class="<?php echo (isset($uri_segments[2]) && ($uri_segments[2] == 'program_list.php' || $uri_segments[2] == 'program_add_edit.php')) ? 'active' : '' ?>"><a href=<?php echo ROOT . "program_list.php"; ?>><i class=""></i> <span>Programs</span></a> </li> 
         <li class="<?php echo (isset($uri_segments[2]) && ($uri_segments[2] == 'program_category.php'|| $uri_segments[2] == 'program_category_add.php')) ? 'active' : '' ?>"><a href=<?php echo ROOT . "program_category.php"; ?>><i class=""></i> <span>Program Category</span></a> </li> 
         <li class="<?php echo (isset($uri_segments[2]) && ($uri_segments[2] == 'dhyankendra_list.php'|| $uri_segments[2] == 'dhyankendra_add_edit.php')) ? 'active' : '' ?>"><a href=<?php echo ROOT . "dhyankendra_list.php"; ?>><i class=""></i> <span>Dhyan kendra</span></a> </li> 
         <li class="<?php echo (isset($uri_segments[2]) && ($uri_segments[2] == 'teammember_list.php'|| $uri_segments[2] == 'teammember_add_edit.php')) ? 'active' : '' ?>"><a href=<?php echo ROOT . "teammember_list.php"; ?>><i class=""></i> <span>Team member</span></a> </li> 
         <li class="<?php echo (isset($uri_segments[2]) && ($uri_segments[2] == 'guru_list.php'|| $uri_segments[2] == 'guru_add_edit.php')) ? 'active' : '' ?>"><a href=<?php echo ROOT . "guru_list.php"; ?>><i class=""></i> <span>Guru's</span></a> </li> 
         <li class="<?php echo (isset($uri_segments[2]) && ($uri_segments[2] == 'schedule_list.php'|| $uri_segments[2] == 'schedule_add_edit.php')) ? 'active' : '' ?>"><a href=<?php echo ROOT . "schedule_list.php"; ?>><i class=""></i> <span>Schedule</span></a> </li> 

    </ul>
</div><!--main-container-part-->