<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $language = trim($_POST['language']);
    if (!empty($name)) {
        $sql = "INSERT INTO tb_od_programcategory (categoryname, language, status)
        VALUES ('" . $name . "','" . $language . "', 1)";
        mysqli_query($link, $sql);
        header("Location: program_category_add.php?msg=1");
    } else {
        header("Location: program_category_add.php?msg=0");
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
        <div id="breadcrumb"> <a href="program_category.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Listing</a><a href="#">Add Program Category</a></div>
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
                    <h4>Add Category</h4>
                </div>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] == '1') {
                    echo '<div id="form_errors">Successfuly added</div>';
                }
                if (isset($_GET['msg']) && $_GET['msg'] == '0') {
                    echo '<div id="form_errors">Unsuccess .Try again</div>';
                }
                ?>
                <div class="widget-content nopadding">

                    <form action="#" method="post" class="form-horizontal form-group-lg" accept-charset="utf-8" enctype='multipart/form-data' name="samagamspeaker_form" id="samagamspeaker_form">
                        <input type="hidden" name="stype" id="stype" value="speakers" />

                        <div class="control-group">
                            <label class="control-label"><strong>English Name * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="English Name" type="text" name="name" id="name" maxlength="200" required value="">
                                <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Language *:</strong></label>
                            <div class="controls">
                                <select id="language" name="language">                      
                                    <option  value="eng" <?php echo ($value['language'] == "eng") ? "selected" : "" ?>>English</option>
                                    <option value="hin" <?php echo ($value['language'] == "hin") ? "selected" : "" ?>>Hindi</option>
                                </select>
                            </div>
                        </div>



                        <!--         
                        <div class="control-group">
                <label class="control-label"><strong>News Body* :</strong></label>
                <div class="controls">
                    <textarea name="details" rows="8" cols="60"></textarea>
<script type="text/javascript">//<![CDATA[
window.CKEDITOR_BASEPATH='./assets/ckeditor/';
//]]></script>
<script type="text/javascript" src="./assets/ckeditor/ckeditor.js?t=B5GJ5GG"></script>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('details', {"language":"hn","width":"95%","height":"300px"});
//]]></script>-
                </div>-->
                        <div class="form-actions">
                            <button onclick="return validate()" type="submit" class="btn btn-primary" name="save" value="1">Publish</button>
                            <a href="program_category.php"><input type="button" class="btn btn-danger" value="Cancel"></a>
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
            alert('Kindly enter English Name');
            return false;
        }
    }
</script>
<?php include_once 'templates/footer.php'; ?>