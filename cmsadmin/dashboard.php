<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/sidebar.php'; ?>

<?php
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
}
?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">User Dashboard</a> </div>
    <h1>Dashboard</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
            <h5  style="font-size:16px">Recent Activities </h5>
             <span class="icon"> <i class="fa fa-file"></i> category</span>
             
          </div>         
        </div>
 
	</div>
      </div>
      
    </div>
    
      
      
    </div>
  <?php include_once 'templates/footer.php'; ?>
