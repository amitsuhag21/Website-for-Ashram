<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php


$parent = (isset($output['parent'])&& !empty($output['parent']))?$output['parent']:'';
$foldername = (isset($output['foldername'])&& !empty($output['foldername']))?$output['foldername']:'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foldername = strtolower(trim($_POST['foldername']));
    $foldername = str_replace(' ', '-', $foldername); // Replaces all spaces with hyphens.
    $foldername= preg_replace('/[^A-Za-z0-9\-]/', '', $foldername); // Removes special chars.
    
    $exists = false;
    if($_POST['parent'] =='0'){
         $path = 'uploads/'.$foldername;
        if(!is_dir($path)){
            mkdir($path, 0777) ;
        }else{
            $exists = true; 
        } 
       $parent =0;
       $parent_name = 'uploads';
    }else{
        $explode = explode('++',$_POST['parent']);
       
        $path = 'uploads/'.$explode['1'].'/'.$foldername;
        if(!is_dir($path)){
            mkdir($path, 0777) ;
        }else{
            $exists = true; 
        } 
       $parent =(int)$explode[0];
       $parent_name = $explode['1'];

    }
    if (!empty($foldername) && (!$exists)) {
           $sql = "INSERT INTO tb_od_folder(foldername ,parent,parent_name,path)
            VALUES ('" . $foldername . "','" . $parent . "','" . $parent_name . "','" . $path . "')";
       mysqli_query($link, $sql);

        header("Location: photo_folder_list.php");
    }else{
        header("Location: photo_folder_add.php?action=add&msg=1");
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
        <div id="breadcrumb"> <a href="photo_folder_list.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
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
                    echo '<div id="form_errors">Folder already exists</div>';
                }
                if (isset($_GET['msg']) && $_GET['msg'] == '0') {
                    echo '<div id="form_errors">Unsuccess .Try again</div>';
                }
                ?>
                <div class="widget-content nopadding">
                    <?php 
                        $sqlcat = "Select * from   tb_od_folder where parent=0 order by foldername ASC";
                        $resultcat = mysqli_query($link, $sqlcat);
                        ?>
                    <form action="#" method="post" class="form-horizontal form-group-lg" accept-charset="utf-8"
                        enctype='multipart/form-data' name="form" id="form">
                        <input type="hidden" name="action" id="action" value="<?php echo $action ?>" />
                        <div class="control-group">
                            <label class="control-label"><strong>Parent Folder *:</strong></label>
                            <div class="controls">
                                <select id="parent" name="parent">
                                    <option value="0">root</option>
                                    <?php 
                                    if (mysqli_num_rows($resultcat) > 0) {
                         while ($value = mysqli_fetch_assoc($resultcat)) {?>
                                    <option value="<?php echo $value['id'].'++'.$value['foldername'];?>"
                                        <?php echo (!empty($getAcharya) && in_array($value['id'],$getAcharya)) ? "selected" : "" ?>>
                                        <?php echo $value['foldername'];?></option>
                                    <?php }
                        }?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Folder Name * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder=" Name" type="text"
                                    name="foldername" id="foldername" required value="<?php echo $foldername?>">
                                <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>
                            </div>
                        </div>


                        <div class="form-actions">
                            <button onclick="return validate()" type="submit" class="btn btn-primary" name="save"
                                value="1">Publish</button>
                            <a href="photo_folder_list.php"><input type="button" class="btn btn-danger" value="Cancel"></a>
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
    var name = $("#foldername").val();

    if (name.trim() == '') {
        alert('Kindly enter folder Name');
        return false;
    }

}
</script>
<?php include_once 'templates/footer.php'; ?>