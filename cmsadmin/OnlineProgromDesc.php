<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php
$action = $_GET['action'];
if($_GET['action'] = 'edit' && isset($_GET['id'])){
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_onlineProgram where onlineProgramid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);
}
$programname = (isset($output['programname'])&& !empty($output['programname']))?$output['programname']:'';
$titleDescription = (isset($output['titleDescription'])&& !empty($output['titleDescription']))?$output['titleDescription']:'';
$longDescription  = (isset($output['longDescription'])&& !empty($output['longDescription']))?$output['longDescription']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';
$progromLevel  = (isset($output['progromLevel'])&& !empty($output['progromLevel']))?$output['progromLevel']:'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $titleDescription = trim($_POST['titleDescription']);
    $longDescription = trim($_POST['longDescription']); 
     $language = $_POST['language'];
     $progromLevel = $_POST['progromLevel'];
    if (!empty($name)) {
 
        if($_POST['action'] == 'add'){
              $sql = "INSERT INTO tb_od_onlineProgram(programname ,progromLevel, titleDescription,longDescription,status,language)
            VALUES ('" . $name . "','" . $progromLevel . "','" . $titleDescription . "', '" . $longDescription . "',1,'" . $language . "')";
        }else{
            $id = $_GET['id'];
            $sql= "UPDATE tb_od_onlineProgram SET progromLevel='$progromLevel',titleDescription='$titleDescription', programname= '$name',language= '$language',longDescription='$longDescription' WHERE onlineProgramid=$id";
        }
     
        mysqli_query($link, $sql);
        header("Location: onlineProgromList.php?action=add&msg=1");
    } else {
        header("Location: onlineProgromList.php?action=add&msg=0");
    }
}


?>
<style>
#form_errors {
    color: #008000;
    margin: 5px;
    text-align: center;
}
</style>
<div id="content">
    <div id="content-header">
        <div id="onlineBreadcrumb"> <a href="onlineProgromList.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Listing</a><a href="#">Add Online Program Description</a></div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h4>Add Online Program Description</h4>
                </div>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] == '1') {
                    echo '<div id="form_errors">Successfuly Updated</div>';
                }
                if (isset($_GET['msg']) && $_GET['msg'] == '0') {
                    echo '<div id="form_errors">Unsuccess .Try again</div>';
                }
                ?>
                <div class="widget-content nopadding">

                    <form action="#" method="post" class="form-horizontal form-group-lg" accept-charset="utf-8"
                        enctype='multipart/form-data' name="form" id="form">
                        <input type="hidden" name="action" id="action" value="<?php echo $action ?>" />

                        <div class="control-group">
                            <label class="control-label"><strong>Program Name * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Program Name" type="text"
                                    name="name" id="name" required value="<?php echo $programname?>">
                                <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Short Details *:</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Short Description" type="text"
                                    name="titleDescription" id="titleDescription"  value="<?php echo $titleDescription?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Long Description*:</strong></label>
                            <div class="controls">
                               <!--  <input class="span11" style="height:35px" placeholder="Long Description" type="text"  name="longDescription" id="longDescription" value="<?php echo $longDescription?>"> -->

                                <textarea class="span11"  placeholder="Long Description" type="text"  name="longDescription" id="longDescription" rows="5"><?php echo $longDescription?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Language *:</strong></label>
                            <div class="controls">
                                <select id="language" name="language">
                                    <?php 
                                    foreach($lang_config as $k=>$v){
                                        ?>
                                    <option value="<?php echo $v?>" <?php echo ($v == $language) ? "selected" : "" ?>>
                                        <?php echo $k;?> </option>
                                    <?php    }
                                    ?>

                                </select>
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="control-label"><strong>progromLevel * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="progromLevel" type="number"
                                    name="progromLevel" id="progromLevel" required value="<?php echo $progromLevel?>">
                            </div>
                        </div>
                            <div class="form-actions">
                                <button onclick="return validate()" type="submit" class="btn btn-primary" name="save"
                                    value="1">Publish</button>
                                <a href="onlineProgromList.php"><input type="button" class="btn btn-danger"
                                        value="Cancel"></a>
                            </div>
                    </form>

                </div>
            </div>
        </div>
        <!--form element end -->
    </div>
</div>

<script>
function validate() {
    var name = $("#name").val();

    if (name.trim() == '') {
        alert('Kindly enter Program Name');
        return false;
    }

}
</script>
<?php include_once 'templates/footer.php'; ?>