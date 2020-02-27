<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_program where programid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);

$programname = (isset($output['programname'])&& !empty($output['programname']))?$output['programname']:'';
$shortdescription = (isset($output['shortdescription'])&& !empty($output['shortdescription']))?$output['shortdescription']:'';
$longdescription  = (isset($output['longdescription'])&& !empty($output['longdescription']))?$output['longdescription']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';
$category  = (isset($output['categoryid'])&& !empty($output['categoryid']))?explode(',',$output['categoryid']):'';

?>
<style>
#form_errors {
    color: #008000;
    margin: 5px;
    text-align: center;
}
</style>
<div id="content">
    <div class="container-fluid">
        <!--Action boxes-->
        <!--End-Action boxes-->
        <hr />
        <!--form element start -->
        <div class="row-fluid">
            <div class="widget-box">
                <div >
			<?php echo htmlspecialchars_decode( $longdescription ); ?>                
		</div>
            </div>
        </div>
        <!--form element end -->
    </div>
</div>

<?php include_once 'templates/footer.php'; ?>