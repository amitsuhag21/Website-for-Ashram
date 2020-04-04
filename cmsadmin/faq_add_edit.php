<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php

$action = $_GET['action'];
if($_GET['action'] = 'edit' && isset($_GET['id'])){
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_faq where faqid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);
}
$pagename = (isset($output['pagename'])&& !empty($output['pagename']))?$output['pagename']:'';
$title = (isset($output['title'])&& !empty($output['title']))?$output['title']:'';
$remarks = (isset($output['remarks'])&& !empty($output['remarks']))?$output['remarks']:'';
$shortdescription = (isset($output['shortdescription'])&& !empty($output['shortdescription']))?$output['shortdescription']:'';
$longdescription  = (isset($output['longdescription'])&& !empty($output['longdescription']))?$output['longdescription']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pagename = trim($_POST['pagename']);
    $title = trim($_POST['title']);
    $remarks = trim($_POST['remarks']);
    $short_description = trim($_POST['shortdescription']);
    $long_description = trim($_POST['details']);
     $language = $_POST['language'];
    if (!empty($short_description)) {
        if($_POST['action'] == 'add'){
            $sql = "INSERT INTO tb_od_faq(pagename,title,remarks,shortdescription,longdescription,status,language)
            VALUES ('" . $pagename . "','" . $title . "','" . $remarks . "','" . $short_description . "', '" . $long_description . "',1,'" . $language . "')";
        }else{
            $id = $_GET['id'];
          $sql= "UPDATE tb_od_faq SET pagename='$pagename' ,title='$title' ,remarks='$remarks' ,shortdescription='$short_description' ,language= '$language',longdescription='$long_description' WHERE faqid=$id";
        }
       mysqli_query($link, $sql);
       if(mysqli_error($link)){
        echo("Error description 1: " . mysqli_error($link));die;
    }
        header("Location: faq_add_edit.php?action=add&msg=1");
    } else {
        header("Location: faq_add_edit.php?action=add&msg=0");
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
        <div id="breadcrumb"> <a href="faq_list.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
                Listing</a><a href="#">Add Pages</a></div>
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
                    <h4>Add Pages</h4>
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
                            <label class="control-label"><strong>Page Name * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Page Name" type="text"
                                    name="pagename" id="pagename" required value="<?php echo $pagename?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><strong>Title * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Title" type="text"
                                    name="title" id="title"  value="<?php echo $title?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Short Description * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:50px" placeholder="Short Description" type="text"
                                    name="shortdescription" id="shortdescription"  value="<?php echo $shortdescription?>">
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
                            <div class="control-group">
                            <label class="control-label"><strong>Remarks * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:40px" placeholder="remarks" type="text"
                                    name="remarks" id="remarks"  value="<?php echo $remarks?>">
                                <!-- <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>-->
                            </div>
                        </div>
                            <div class="form-actions">
                                <button onclick="return validate()" type="submit" class="btn btn-primary" name="save"
                                    value="1">Publish</button>
                                <a href="faq_list.php"><input type="button" class="btn btn-danger" value="Cancel"></a>
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
    var pagename = $("#pagename").val();
    if (pagename.trim() == '') {
        alert('Kindly enter Page name');
        return false;
    }
    if (CKEDITOR.instances['details'].getData() == "") {
        alert('Kindly enter Long Description');
        return false;
    }
}
</script>
<?php include_once 'templates/footer.php'; ?>