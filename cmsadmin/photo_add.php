<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php


$parent = (isset($output['parent'])&& !empty($output['parent']))?$output['parent']:'';
$foldername = (isset($output['foldername'])&& !empty($output['foldername']))?$output['foldername']:'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['name'];
$pagename = $_POST['pagename'];
$comments = $_POST['comments'];
$explode = explode('++',$_POST['parent']);
$parentid = (int)$explode[0];
$folderid = $explode[1];
$target_dir = $explode[2].'/';
$explodeImage = explode('.',$_FILES["fileToUpload"]["name"]);
$imagename = $explodeImage[0].'_'.time().'.'.$explodeImage[1];
 $target_file = strtolower($target_dir . basename($imagename));
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $msg = "File is not an image.";
        header("Location: photo_add.php?action=add&msg=$msg");
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    $msg= "file already exists.";
    $uploadOk = 0;
    header("Location: photo_add.php?action=add&msg=$msg");
}
/* Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $msg="Only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    header("Location: photo_add.php?action=add&msg=$msg");
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg= "Sorry, your file was not uploaded.Try again";
    header("Location: photo_add.php?action=add&msg=$msg");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $sql = "INSERT INTO td_od_photos(name, imagename , path, parentid, parentFolderId, pagename, comments)
        VALUES ('" . $name . "','" . $imagename . "','" . $target_file . "','" . $parentid. "','" . $folderid . "','" . $pagename . "','" . $comments . "')";
        mysqli_query($link, $sql);
        if(mysqli_error($link)){
            echo("Error description 1: " . mysqli_error($link));die;
        }
        header("Location: photo_list.php");
    } else {
        $msg= "Sorry, your file was not uploaded.Try again";
        header("Location: photo_add.php?action=add&msg=$msg");
    }
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
        <div id="breadcrumb"> <a href="photo_list.php" title="Go to Home" class="tip-bottom"><i
                    class="icon-home"></i>
                Listing</a><a href="#">Add photo </a></div>
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
                    <h4>Add Photo</h4>
                </div>
                <?php
                if (isset($_GET['msg']) && $_GET['msg']) {
                    $msg = $_GET['msg'];
                    echo "<div id='form_errors'>$msg</div>";
                }
                if (isset($_GET['msg']) && $_GET['msg'] == '0') {
                    echo '<div id="form_errors">Unsuccess .Try again</div>';
                }
                ?>
                <div class="widget-content nopadding">
                    <?php 
                        $sqlcat = "Select * from   tb_od_folder where parent=19 order by foldername ASC";
                        $resultcat = mysqli_query($link, $sqlcat);
                        ?>
                    <form action="#" method="post" class="form-horizontal form-group-lg" accept-charset="utf-8"
                        enctype='multipart/form-data' name="form" id="form">
                        <div class="control-group">
                            <label class="control-label"><strong>Select Folder *:</strong></label>
                            <div class="controls">
                                <select id="parent" name="parent">
                                   <!--  <option value="0">None</option> -->
                                    <?php 
                                    if (mysqli_num_rows($resultcat) > 0) {
                         while ($value = mysqli_fetch_assoc($resultcat)) {?>
                                    <option value="<?php echo $value['id'].'++'.$value['folderId'].'++'.$value['path'];?>"
                                        <?php echo (!empty($getAcharya) && in_array($value['id'],$getAcharya)) ? "selected" : "" ?>>
                                        <?php echo $value['foldername'];?></option>
                                    <?php 
                                    $pid = $value['id'];
                                    $sqlChild = "Select * from   tb_od_folder where parent=$pid order by foldername ASC";
                                    $resultChild = mysqli_query($link, $sqlChild);
                                    if (mysqli_num_rows($resultChild) > 0) {
                                        while ($value1 = mysqli_fetch_assoc($resultChild)) {
                                            $nbsp = $value['foldername']." >>> ";
                                            ?>
                                    <option value="<?php echo $value1['id'].'++'. $value1['folderId'].'++'.$value1['path'];?>">
                                        <?php echo $nbsp.$value1['foldername'];?></option>
                                    <?php  }
                                }
                        }}?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Image Name * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder=" Name" type="text"
                                    name="name" id="name" required value="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Select image * :</strong></label>
                            <div class="controls">
                                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Page Name :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder=" Page Name" type="text"
                                    name="pagename" id="pagename"  value="">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Comments :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="comment" type="text"
                                    name="comment" id="comment"  value="">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button onclick="return validate()" type="submit" class="btn btn-primary" name="save"
                                value="1">Publish</button>
                            <a href="photo_list.php"><input type="button" class="btn btn-danger"
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
    var parent = $("#parent").val();
    var fileToUpload = $("#fileToUpload").val();
    if (name.trim() == '') {
        alert('Kindly select name');
        return false;
    }
    if (parent == '0') {
        alert('Kindly  select target folder');
        return false;
    }
    if (fileToUpload.trim() == '') {
        alert('Kindly select image');
        return false;
    }

}
</script>
<?php include_once 'templates/footer.php'; ?>