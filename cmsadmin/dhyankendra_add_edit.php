<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php

$action = $_GET['action'];
if($_GET['action'] = 'edit' && isset($_GET['id'])){
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_dhyankendra where dhyankendraid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);
}
//Get Data 
$dhyankendraname = (isset($output['dhyankendraname'])&& !empty($output['dhyankendraname']))?$output['dhyankendraname']:'';
$address1 = (isset($output['Address1'])&& !empty($output['Address1']))?$output['Address1']:'';
$address2  = (isset($output['Address2'])&& !empty($output['Address2']))?$output['Address2']:'';
$address3  = (isset($output['Address3'])&& !empty($output['Address2']))?$output['Address3']:'';
$phone1  = (isset($output['Phone1'])&& !empty($output['Phone1']))?$output['Phone1']:'';
$phone2  = (isset($output['Phone2'])&& !empty($output['Phone2']))?$output['Phone2']:'';
$stateid   = (isset($output['stateid'])&& !empty($output['stateid']))?$output['stateid']:'';
$countryid  =  (isset($output['countryid'])&& !empty($output['countryid']))?$output['countryid']:'';
$zipcode  = (isset($output['zipcode'])&& !empty($output['zipcode']))?$output['zipcode']:'';
$ownerid  = (isset($output['ownerid'])&& !empty($output['ownerid']))?$output['ownerid']:'';
$emailid  = (isset($output['emailid'])&& !empty($output['emailid']))?$output['emailid']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';
$status  = (isset($output['status'])&& !empty($output['status']))?$output['status']:'';

/////POST Data//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$postState =explode('-',$_POST['stateid']);
$dhyankendraname =  $_POST['dhyankendraname'];
$address1 = $_POST['address1'];
$address2  = $_POST['address2'];
$address3  = $_POST['address3'];
$phone1  = $_POST['phone1'];
$phone2  = $_POST['phone2'];
$stateid   = $postState[0];
$countryid  = $postState[1];
$zipcode  = $_POST['zipcode'];
$ownerid  = (int)$_POST['ownerid'];
$emailid  = $_POST['emailid'];
$language  = $_POST['language'];
$status  = $_POST['status'];
    if (!empty($dhyankendraname)) {
        if($_POST['action'] == 'add'){
          $sql = "INSERT INTO tb_od_dhyankendra( dhyankendraname, Address1, Address2, Address3, Phone1, Phone2, stateid, countryid, zipcode, ownerid, emailid, language, status)VALUES ('" . $dhyankendraname . "','" . $address1 . "','" . $address2 . "','" . $address3 . "','" . $phone1 . "', '" . $phone2 . "', '" . $stateid . "', '" . $countryid . "', '" . $zipcode . "','" . $ownerid . "', '" . $emailid . "','" . $language . "',1)";
        }else{
          $id = $_GET['id'];
          $sql= "UPDATE tb_od_dhyankendra SET dhyankendraname='$dhyankendraname',Phone1='$phone1',Phone2='$phone2',Address1='$address1', Address2= '$address2' ,Address3= '$address3' ,countryid='$countryid',zipcode='$zipcode',ownerid='$ownerid',emailid='$emailid',language='$language',stateid='$stateid',countryid='$countryid' WHERE dhyankendraid=$id";
        }
        mysqli_query($link, $sql);
        if(mysqli_error($link)){
            echo("Error description 1: " . mysqli_error($link));die;
        }
        header("Location: dhyankendra_add_edit.php?action=add&msg=1");
    } else {
        header("Location: dhyankendra_add_edit.php?action=add&msg=0");
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
        <div id="breadcrumb"> <a href="dhyankendra_list.php" title="Go to Home" class="tip-bottom"><i
                    class="icon-home"></i>
                Listing</a><a class="current" href="#">Add Dhyan kendra</a></div>
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
                    <h4>Add Dhyan Kendra</h4>
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
                            <label class="control-label"><strong>Name * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder=" Name" type="text"
                                    name="dhyankendraname" id="dhyankendraname" required
                                    value="<?php echo $dhyankendraname?>">
                                <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Address1 :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Address 1" type="text"
                                    name="address1" id="address1" required value="<?php echo $address1?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Address 2 * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Short Description" type="text"
                                    name="address2" id="address2" value="<?php echo $address2?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Address 3 * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter Address 3" type="text"
                                    name="address3" id="address3" value="<?php echo $address3?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>zip code :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter Zipcode" type="text"
                                    name="zipcode" id="zipcode" value="<?php echo $zipcode?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
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
                            <label class="control-label"><strong>Phone1* :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter Phone 1" type="text"
                                    name="phone1" id="phone1" value="<?php echo $phone1?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Phone 2 * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter Phone 2" type="text"
                                    name="phone2" id="phone2" value="<?php echo $phone2?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Email id * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter Email id" type="text"
                                    name="emailid" id="emailid" value="<?php echo $emailid?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
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
                        <?php 
                        $sqlTm = "Select * from   tb_od_teammember where  status=1 ";
                        $resultTm = mysqli_query($link, $sqlTm);
                        ?>
                        <div class="control-group">
                            <label class="control-label"><strong>Team member *:</strong></label>
                            <div class="controls">
                                <select id="ownerid" name="ownerid">
                                    <?php 
                                    if (mysqli_num_rows($resultTm) > 0) {
                         while ($value = mysqli_fetch_assoc($resultTm)) {?>
                                    <option value="<?php echo $value['teammemberid'];?>"
                                        <?php echo (!empty($ownerid) && $value['teammemberid']==$ownerid) ? "selected" : "" ?>>
                                        <?php echo $value['teammembername'];?></option>
                                    <?php }
                        }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button onclick="return validate()" type="submit" class="btn btn-primary" name="save"
                                value="1">Publish</button>
                            <a href="dhyankendra_list.php"><input type="button" class="btn btn-danger"
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
    var name = $("#dhyankendraname").val();
    var address1 = $("#address1").val();
    var categoryid = $("#categoryid").val();
    var emailid = $("#emailid").val();
    var ownerid = $("#ownerid").val();
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

    if (name.trim() == '') {
        alert('Kindly enter  Name');
        return false;
    }
    if (address1.trim() == '') {
        alert('Kindly enter Address1');
        return false;
    }
    if (!emailReg.test(emailid)) {
        alert("Please enter valid email id");
        return false;
    }
    if (address1.trim() == '') {
        alert('Kindly enter ownerid');
        return false;
    }

}
</script>
<?php include_once 'templates/footer.php'; ?>