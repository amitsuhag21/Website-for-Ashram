<?php include_once 'templates/header.php'; ?>
<?php include_once 'config/config.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php
$action = $_GET['action'];
if($_GET['action'] = 'edit' && isset($_GET['id'])){
  $id = $_GET['id'];
    $sql = "Select * from   tb_od_programschedule where scheduleid=$id";
    $result = mysqli_query($link, $sql);
    $output = mysqli_fetch_assoc($result);
}
$programid = (isset($output['programid'])&& !empty($output['programid']))?$output['programid']:'';
$dhyankendraid = (isset($output['dhyankendraid'])&& !empty($output['dhyankendraid']))?$output['dhyankendraid']:'';
$level  = (isset($output['level'])&& !empty($output['level']))?$output['level']:'';
$duration  = (isset($output['duration'])&& !empty($output['duration']))?$output['duration']:'';
$eligibility  = (isset($output['eligibility'])&& !empty($output['eligibility']))?$output['eligibility']:'';
$guidelines  = (isset($output['guidelines'])&& !empty($output['guidelines']))?$output['guidelines']:'';
$comments  = (isset($output['comments'])&& !empty($output['comments']))?$output['comments']:'';
$language  = (isset($output['language'])&& !empty($output['language']))?$output['language']:'';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $programid = (isset($_POST['programid'])&& !empty($_POST['programid']))?$_POST['programid']:'';
    $dhyankendraid = (isset($_POST['dhyankendraid'])&& !empty($_POST['dhyankendraid']))?$_POST['dhyankendraid']:'';
    $level  = (isset($_POST['level'])&& !empty($_POST['level']))?$_POST['level']:'';
    $duration  = (isset($_POST['duration'])&& !empty($_POST['duration']))?$_POST['duration']:'';
    $eligibility  = (isset($_POST['eligibility'])&& !empty($_POST['eligibility']))?$_POST['eligibility']:'';
    $guidelines  = (isset($_POST['guidelines'])&& !empty($_POST['guidelines']))?$_POST['guidelines']:'';
    $comments  = (isset($_POST['comments'])&& !empty($_POST['comments']))?$_POST['comments']:'';
    $language  = (isset($_POST['language'])&& !empty($_POST['language']))?$_POST['language']:'';
    $duration= date( "Y-m-d", strtotime($duration) );

    if (!empty($programid)) {
      //echo "<PRE>";  print_r($_POST);die;
        if($_POST['action'] == 'add'){
              $sql = "INSERT INTO tb_od_programschedule(programid , dhyankendraid,level,duration,eligibility,guidelines,comments,language,status)
            VALUES ('" . $programid . "','" . $dhyankendraid . "', '" . $level . "', '" . $duration . "','" . $eligibility . "','" . $guidelines . "','" . $comments . "','" . $language . "',1)";
        }else{
            $id = $_GET['id'];
             $sql= "UPDATE tb_od_programschedule SET programid='$programid',dhyankendraid='$dhyankendraid',level='$level', duration= '$duration' ,eligibility= '$eligibility',guidelines='$guidelines',comments='$comments',language='$language' WHERE scheduleid=$id";
        }
         mysqli_query($link, $sql);
        header("Location: schedule_add_edit.php?action=add&msg=1");
    } else {
        header("Location: schedule_add_edit.php?action=add&msg=0");
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
                Listing</a><a href="#">Add Schedule </a></div>
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
                    <h4>Add Schedule</h4>
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


                        <?php 
                        $sqlcat = "Select * from   tb_od_program where status=1 order by programid desc";
                        $resultcat = mysqli_query($link, $sqlcat);
                        ?>

                        <div class="control-group">
                            <label class="control-label"><strong>Program Name *:</strong></label>
                            <div class="controls">
                                <select id="programid" name="programid" required>
                                    <?php 
                                    if (mysqli_num_rows($resultcat) > 0) {
                         while ($value = mysqli_fetch_assoc($resultcat)) {?>
                                    <option value="<?php echo $value['programid'];?>"
                                        <?php echo (!empty($programid)) ? "selected" : "" ?>>
                                        <?php echo $value['programname'];?></option>
                                    <?php }
                        }?>
                                </select>
                            </div>
                        </div>
                        <?php 
                        $resultcat ='';
                        $sqlcat = "Select * from   tb_od_dhyankendra where status=1 order by dhyankendraid desc";
                        $resultcat = mysqli_query($link, $sqlcat);
                        ?>

                        <div class="control-group">
                            <label class="control-label"><strong>Dhyankendra Name *:</strong></label>
                            <div class="controls">
                                <select id="dhyankendraid" name="dhyankendraid">
                                    <?php 
                                    if (mysqli_num_rows($resultcat) > 0) {
                         while ($value = mysqli_fetch_assoc($resultcat)) {?>
                                    <option value="<?php echo $value['dhyankendraid'];?>"
                                        <?php echo (!empty($dhyankendraid) && $value['dhyankendraid'] ==$dhyankendraid) ? "selected" : "" ?>>
                                        <?php echo $value['dhyankendraname'];?></option>
                                    <?php }
                        }?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Level * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Enter level" type="number"
                                    min='0' name="level" id="level" required value="<?php echo $level?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Duration * :</strong></label>
                            <div class="form-group span2 m-wrap input-append date datepicker" data-date="12-02-2012">

                                <input placeholder="Select Date" data-date-format="<?php echo date("Y-m-d"); ?>"
                                    style="height:30px" class="span11  m-wrap" type="text" name="duration" id="duration"
                                    value="<?php echo $duration?>">
                                <span class="add-on" style="height:20px"><i class="fa fa-th"></i></span>
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Eligibility* :</strong></label>
                            <div class="controls">

                                <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
                                </head>

                                <body>

                                    <!-- Editor -->
                                    <textarea name="eligibility" rows="8"
                                        cols="60"><?php echo htmlspecialchars( $eligibility ); ?></textarea>

                                    <!-- Script -->
                                    <script type="text/javascript">
                                    CKEDITOR.replace('eligibility', {
                                        height: 300,
                                        filebrowserUploadUrl: "ajaxfile.php?type=file",
                                        filebrowserImageUploadUrl: "ajaxfile.php?type=image",

                                    });
                                    </script>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Guidelines* :</strong></label>
                                <div class="controls">

                                    <!-- <script src="ckeditor/ckeditor.js" type="text/javascript"></script>-->
                                    </head>

                                    <body>

                                        <!-- Editor -->
                                        <textarea name="guidelines" rows="8"
                                            cols="60"><?php echo htmlspecialchars( $guidelines ); ?></textarea>

                                        <!-- Script -->
                                        <script type="text/javascript">
                                        CKEDITOR.replace('guidelines', {
                                            height: 300,
                                            filebrowserUploadUrl: "ajaxfile.php?type=file",
                                            filebrowserImageUploadUrl: "ajaxfile.php?type=image",

                                        });
                                        </script>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Comments* :</strong></label>
                                    <div class="controls">

                                        <!-- <script src="ckeditor/ckeditor.js" type="text/javascript"></script>-->
                                        </head>

                                        <body>

                                            <!-- Editor -->
                                            <textarea name="comments" rows="8"
                                                cols="60"><?php echo htmlspecialchars( $comments ); ?></textarea>

                                            <!-- Script -->
                                            <script type="text/javascript">
                                            CKEDITOR.replace('comments', {
                                                height: 300,
                                                filebrowserUploadUrl: "ajaxfile.php?type=file",
                                                filebrowserImageUploadUrl: "ajaxfile.php?type=image",

                                            });
                                            </script>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label"><strong>Language *:</strong></label>
                                        <div class="controls">
                                            <select id="language" name="language">
                                                <?php 
                                    foreach($lang_config as $k=>$v){
                                        ?>
                                                <option value="<?php echo $v?>"
                                                    <?php echo ($v == $language) ? "selected" : "" ?>>
                                                    <?php echo $k;?> </option>
                                                <?php    }
                                    ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button onclick="return validate()" type="submit" class="btn btn-primary"
                                            name="save" value="1">Publish</button>
                                        <a href="schedule_list.php"><input type="button" class="btn btn-danger"
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
    var programid = $("#programid").val();
    var dhyankendraid = $("#dhyankendraid").val();
    var duration = $("#duration").val();
    var level = $("#level").val();

    if (programid.trim() == '') {
        alert('Kindly enter Program Name');
        return false;
    }
    if (dhyankendraid.trim() == '') {
        alert('Kindly enter dhyankendra name');
        return false;
    }
    if (duration.trim() == '') {
        alert('Kindly enter duration ');
        return false;
    }
  
    if (level.trim() == '') {
        alert('Kindly enter level');
        return false;
    }
    if (CKEDITOR.instances['eligibility'].getData() == "") {
        alert('Kindly enter eligibility');
        return false;
    }
    if (CKEDITOR.instances['guidelines'].getData() == "") {
        alert('Kindly enter guidelines');
        return false;
    }
}
</script>
<?php include_once 'templates/footer.php'; ?>