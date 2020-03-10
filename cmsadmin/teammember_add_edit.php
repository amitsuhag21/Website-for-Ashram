<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>

<?php

$action = $_GET['action'];
if($_GET['action'] = 'edit' && isset($_GET['id'])){
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_teammember where teammemberid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);
}
$teammembername  = (isset($output['teammembername'])&& !empty($output['teammembername']))?$output['teammembername']:'';
$iscoordinator = (isset($output['iscoordinator'])&& !empty($output['iscoordinator']))?$output['iscoordinator']:0;
$iscentralcordinator  = (isset($output['iscentralcordinator'])&& !empty($output['iscentralcordinator']))?$output['iscentralcordinator']:0;
$isacharya  = (isset($output['isacharya'])&& !empty($output['isacharya']))?$output['isacharya']:0;
$stateid  = (isset($output['stateid'])&& !empty($output['stateid']))?$output['stateid']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//echo "<PRE>";print_r($_POST);die;
    $postState =explode('-',$_POST['stateid']);
    $teammembername = trim($_POST['teammembername']);
    $iscoordinator = (isset($_POST['iscoordinator'])&& !empty($_POST['iscoordinator']))?$_POST['iscoordinator']:0;
    $iscentralcordinator  = (isset($_POST['iscentralcordinator'])&& !empty($_POST['iscentralcordinator']))?$_POST['iscentralcordinator']:0;
    $isacharya  = (isset($_POST['isacharya'])&& !empty($_POST['isacharya']))?$_POST['isacharya']:0;
    $stateid   = $postState[0];
    $countryid  = $postState[1];
    $language = trim($_POST['language']);
    if (!empty($teammembername)) {
        if($_POST['action'] == 'add'){
               $sql = "INSERT INTO tb_od_teammember(teammembername , iscoordinator,iscentralcordinator,isacharya,stateid,countryid,language,status)
            VALUES ('" . $teammembername . "','" . $iscoordinator . "', '" . $iscentralcordinator . "', '" . $isacharya . "', '" . $stateid . "','" . $countryid . "','" . $language . "',1)";
        }else{
            $id = $_GET['id'];
             $sql= "UPDATE tb_od_teammember SET teammembername='$teammembername',iscoordinator='$iscoordinator',isacharya='$isacharya', stateid= '$stateid' ,countryid= '$countryid',language='$language' WHERE teammemberid=$id";
        }
       mysqli_query($link, $sql);
        header("Location: teammember_add_edit.php?action=add&msg=1");
    } else {
        header("Location: teammember_add_edit.php?action=add&msg=0");
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
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="teammember_list.php" title="Go to Home" class="tip-bottom"><i
                    class="icon-home"></i>
                Listing</a><a class="current" href="#">Add Team Memeber</a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">
        <!--Action boxes-->
        <!--End-Action boxes-->
        <hr />
        <!--form element start -->
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h4>Add Team Member</h4>
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
                            <label class="control-label"><strong> Name * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter Team member name"
                                    type="text" name="teammembername" id="teammembername" required
                                    value="<?php echo $teammembername?>">
                                <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Type :</strong></label>
                            <div class="controls controls-row">
                                <label class="span2 m-wrap">
                                    <div class="checker" id="uniform-undefined"><span><input value="1"
                                                <?php echo (!empty($iscoordinator) && $iscoordinator==1) ? "checked" : ""?>
                                                name="iscoordinator" style="opacity: 1;" type="checkbox"></span></div>
                                    is Coordinator
                                </label>
                                <label class="span2 m-wrap">
                                    <div class="checker" id="uniform-undefined"><span><input value="1"
                                                <?php echo (!empty($iscentralcordinator) && $iscentralcordinator==1) ? "checked" : ""?>
                                                name="iscentralcordinator" type="checkbox"></span></div>is Central
                                    coordinator
                                </label>
                                <label class="span2 m-wrap">
                                    <div class="checker" id="uniform-undefined"><span><input value="1"
                                                <?php echo (!empty($isacharya) && $isacharya==1) ? "checked" : ""?>
                                                name="isacharya" type="checkbox"></span></div>is Acharya
                                    
                                </label>
                            </div>
                        </div>


                        <?php 
                        $sqlcat = "Select * from   tb_od_state where  status=1 ";
                        $resultcat = mysqli_query($link, $sqlcat);
                        ?>
                        <div class="control-group">
                            <label class="control-label"><strong>State *:</strong></label>
                            <div class="controls">
                                <select id="stateid" name="stateid">
                                    <?php 
                                    if (mysqli_num_rows($resultcat) > 0) {
                         while ($value = mysqli_fetch_assoc($resultcat)) {?>
                                    <option value="<?php echo $value['state_code'].'-'.$value['country_Id'];?>"
                                        <?php echo (!empty($stateid) && $value['state_code']==$stateid) ? "selected" : "" ?>>
                                        <?php echo $value['state_name'];?></option>
                                    <?php }
                        }?>
                                </select>
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




                        <div class="form-actions">
                            <button onclick="return validate()" type="submit" class="btn btn-primary" name="save"
                                value="1">Publish</button>
                            <a href="teammember_list.php"><input type="button" class="btn btn-danger"
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
    var name = $("#teammembername").val();

    if (name.trim() == '') {
        alert('Kindly enter Team member Name');
        return false;
    }
}
</script>
<?php include_once 'templates/footer.php'; ?>