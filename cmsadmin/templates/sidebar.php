<?php
include_once 'config/config.php';
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
?>

<div id="sidebar">
    <ul style="font-size: 15px;">
        <li class="<?php echo (isset($uri_segments[2]) && $uri_segments[2] == 'dashboard.php') ? 'active' : '' ?>"><a href="<?php echo ROOT . "dashboard.php"; ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a> </li> 

        <li class="<?php echo (isset($uri_segments[2]) && $uri_segments[2] == 'program_category.php') ? 'active' : '' ?>"><a href=<?php echo ROOT . "program_category.php"; ?>><i class=""></i> <span>Program Category</span></a> </li> 

    </ul>
</div><!--main-container-part-->