<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php

$action = $_GET['action'];
if($_GET['action'] = 'edit' && isset($_GET['id'])){
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_program where programid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);
}
$programname = (isset($output['programname'])&& !empty($output['programname']))?$output['programname']:'';
$shortdescription = (isset($output['shortdescription'])&& !empty($output['shortdescription']))?$output['shortdescription']:'';
$longdescription  = (isset($output['longdescription'])&& !empty($output['longdescription']))?$output['longdescription']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';
$category  = (isset($output['categoryid'])&& !empty($output['categoryid']))?explode(',',$output['categoryid']):'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//echo "<PRE>";print_r($_POST);die;
    $name = trim($_POST['name']);
    $short_description = trim($_POST['description']);
    $long_description = trim($_POST['details']);
    $categoryid = implode(',',$_POST['categoryid']);
     $language = $_POST['language'];
    if (!empty($name)) {
 
        if($_POST['action'] == 'add'){
              $sql = "INSERT INTO tb_od_program(programname , shortdescription,longdescription,categoryid,status,language)
            VALUES ('" . $name . "','" . $short_description . "', '" . $long_description . "', '" . $categoryid . "',1,'" . $language . "')";
        }else{
            $id = $_GET['id'];
            $sql= "UPDATE tb_od_program SET shortdescription='$short_description',categoryid='$categoryid', programname= '$name' ,language= '$language',longdescription='$long_description' WHERE programid=$id";
        }
     
       mysqli_query($link, $sql);
        header("Location: program_add_edit.php?action=add&msg=1");
    } else {
        header("Location: program_add_edit.php?action=add&msg=0");
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
        <div id="breadcrumb"> <a href="program_list.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Listing</a><a href="#">Add Program </a></div>
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
                    <h4>Add Program</h4>
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
                            <label class="control-label"><strong>Short Description * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Short Description" type="text"
                                    name="description" id="description" required value="<?php echo $shortdescription?>">
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
                        $sqlcat = "Select * from   tb_od_programcategory where status=1 order by categoryid desc";
                        $resultcat = mysqli_query($link, $sqlcat);
                        ?>

                        <div class="control-group">
                            <label class="control-label"><strong>Program Category *:</strong></label>
                            <div class="controls">
                                <select id="categoryid" name="categoryid[]" multiple>
                                    <?php 
                                    if (mysqli_num_rows($resultcat) > 0) {
                         while ($value = mysqli_fetch_assoc($resultcat)) {?>
                                    <option value="<?php echo $value['categoryid'];?>"
                                        <?php echo (!empty($category) && in_array($value['categoryid'],$category)) ? "selected" : "" ?>>
                                        <?php echo $value['categoryname'];?></option>
                                    <?php }
                        }?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Long Description* :</strong></label>
                            <div class="controls">

                                <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
                                </head>

                                <body>

                                    <!-- Editor -->
                                    <textarea name="details" rows="8"
                                        cols="60"><?php echo htmlspecialchars( $longdescription ); ?></textarea>

                                    <!-- Script -->
                                    <script type="text/javascript">
                                    CKEDITOR.replace('details', {
                                        height: 300,
                                        filebrowserUploadUrl: "ajaxfile.php?type=file",
                                        filebrowserImageUploadUrl: "ajaxfile.php?type=image",

                                    });
                                    </script>
                            </div>
                            <div class="form-actions">
                                <button onclick="return validate()" type="submit" class="btn btn-primary" name="save"
                                    value="1">Publish</button>
                                <a href="program_list.php"><input type="button" class="btn btn-danger"
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
    var description = $("#description").val();
    var categoryid = $("#categoryid").val();


    if (name.trim() == '') {
        alert('Kindly enter Program Name');
        return false;
    }
    if (description.trim() == '') {
        alert('Kindly enter Short description');
        return false;
    }

    if (!categoryid || categoryid == null || categoryid == 'null') {
        alert('Kindly enter Program Category');
        return false;
    }
    if (CKEDITOR.instances['details'].getData() == "") {
        alert('Kindly enter Long Description');
        return false;
    }
}
</script>
<?php include_once 'templates/footer.php'; ?>