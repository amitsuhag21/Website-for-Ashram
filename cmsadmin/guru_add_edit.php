<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php

$action = $_GET['action'];
if($_GET['action'] = 'edit' && isset($_GET['id'])){
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_gurus where guruid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);
}
$guruname = (isset($output['guruname'])&& !empty($output['guruname']))?$output['guruname']:'';
$shortdescription = (isset($output['shortdescription'])&& !empty($output['shortdescription']))?$output['shortdescription']:'';
$longdescription  = (isset($output['longdescription'])&& !empty($output['longdescription']))?$output['longdescription']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//echo "<PRE>";print_r($_POST);die;
    $guruname = trim($_POST['guruname']);
    $short_description = trim($_POST['description']);
    $long_description = trim($_POST['details']);
    $categoryid = implode(',',$_POST['categoryid']);
     $language = $_POST['language'];
    if (!empty($guruname)) {
        if($_POST['action'] == 'add'){
            $sql = "INSERT INTO tb_od_gurus(guruname , shortdescription,longdescription,status,language)
            VALUES ('" . $guruname . "','" . $short_description . "', '" . $long_description . "',1,'" . $language . "')";
        }else{
            $id = $_GET['id'];
          $sql= "UPDATE tb_od_gurus SET shortdescription='$short_description', guruname= '$guruname' ,language= '$language',longdescription='$long_description' WHERE guruid=$id";
        }
       mysqli_query($link, $sql);
       if(mysqli_error($link)){
        echo("Error description 1: " . mysqli_error($link));die;
    }
        header("Location: guru_add_edit.php?action=add&msg=1");
    } else {
        header("Location: guru_add_edit.php?action=add&msg=0");
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
        <div id="breadcrumb"> <a href="guru_list.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Listing</a><a href="#">Add Guru</a></div>
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
                    <h4>Add Guru</h4>
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
                            <label class="control-label"><strong>Guru Name * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Guru Name" type="text"
                                    name="guruname" id="guruname" required value="<?php echo $guruname?>">
                                <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Short Description * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Short Description" type="text"
                                    name="description" id="description"  value="<?php echo $shortdescription?>">
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
                        $sqlcat = "Select * from   tb_od_guruscategory where status=1 order by categoryid desc";
                        $resultcat = mysqli_query($link, $sqlcat);
                        ?>



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
                                <a href="guru_list.php"><input type="button" class="btn btn-danger" value="Cancel"></a>
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
    var guruname = $("#guruname").val();
    var categoryid = $("#categoryid").val();
    if (guruname.trim() == '') {
        alert('Kindly enter Guru Name');
        return false;
    }
    if (CKEDITOR.instances['details'].getData() == "") {
        alert('Kindly enter Long Description');
        return false;
    }
}
</script>
<?php include_once 'templates/footer.php'; ?>