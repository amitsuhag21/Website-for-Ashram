<!--close-top-Header-menu-->
<!--start-top-serch-->
<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/sidebar.php'; ?>
<?php include_once 'config/database.php'; ?>
<?php include_once 'templates/sidebar.php';  ?>
<?php

$limit = 10;  // Number of entries to show in a page. 
// Look for a GET variable page if not found default is 1.      
if (isset($_GET["page"])) {  
  $pn  = $_GET["page"];  
}  
else {  
  $pn=1;  
};   

$start_from = ($pn-1) * $limit; 
if(!empty($_GET)){ 
    if(isset($_GET['programid']) && !empty($_GET['programid'] && $_GET['programid'] !== '0' )){
        $where = 'programid='.$_GET['programid'];
    }else{
        $where = "programid like '%%'"; 
    }
    if(isset($_GET['month']) && !empty($_GET['month']) && $_GET['month'] !== '0' ){
        $where .= ' and MONTH(start_date) = '.$_GET['month'];
    }
    if(isset($_GET['year']) && !empty($_GET['year']) && $_GET['year'] !== '0'){
        $where .= ' and YEAR(start_date) = '.$_GET['year'];
    }else{
        $where .= " and YEAR(start_date) like '%%'";
    }
}else{
    $where ='1';
}
 $sql = "Select * from   tb_od_programschedule where $where order by scheduleid desc LIMIT $start_from, $limit ";
$result = mysqli_query($link, $sql);

?>
<style>
table {
    border-collapse: collapse;
    width: 500px;
}

td,
th {
    padding: 10px;
}

th {
    background-color: #54585d;
    color: #ffffff;
    font-weight: bold;
    font-size: 13px;
    border: 1px solid #54585d;
}

td {
    color: #636363;
    border: 1px solid #dddfe1;
}

tr {
    background-color: #f9fafb;
}

tr:nth-child(odd) {
    background-color: #ffffff;
}

.pagination {
    list-style-type: none;
    padding: 10px 0;
    display: inline-flex;
    justify-content: space-between;
    box-sizing: border-box;
}

.pagination li {
    box-sizing: border-box;
    padding-right: 10px;
}

.pagination li a {
    box-sizing: border-box;
    background-color: #e2e6e6;
    padding: 8px;
    text-decoration: none;
    font-size: 12px;
    font-weight: bold;
    color: #616872;
    border-radius: 4px;
}

.pagination li a:hover {
    background-color: #d4dada;
}

.pagination .next a,
.pagination .prev a {
    text-transform: uppercase;
    font-size: 12px;
}

.pagination .currentpage a {
    background-color: #518acb;
    color: #fff;
}

.pagination .currentpage a:hover {
    background-color: #518acb;
}
</style>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current"> Listing</a> </div>
        <h1>Schedule Listing</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid text-right"><button class="btn btn-primary"
                onclick="document.location.href = 'schedule_add_edit.php'"><a
                    href="<?php echo 'schedule_add_edit.php?action=add&v='.rand(100000,100000000000)?>"
                    style="color:#fff">Add Schedule</a></button></div>

        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">

                    <fieldset class="scheduler-border span12"
                        style="border: 2px solid #f0f0f0;padding:0 18px 0 0;margin: 5px 0">
                        <?php 
                        $sqlcat = "Select * from   tb_od_program where status=1 order by programid desc";
                        $resultcat = mysqli_query($link, $sqlcat);
                        ?>

                        <div class="span2 m-wrap">
                            <label><strong>Program Name</strong></label>
                            <div class="controls">
                                <select id="programid" name="programid">
                                    <option value="0" <?php echo ($_GET['programid'] == '0') ? "selected" : "" ?>>
                                        None </option>
                                    <?php 
                                    if (mysqli_num_rows($resultcat) > 0) {
                         while ($value = mysqli_fetch_assoc($resultcat)) {
                            $programid = (isset($value['programid'])&& !empty($value['programid']))?$value['programid']:'';
                             ?>
                                    <option value="<?php echo $value['programid'];?>"
                                        <?php echo (isset($_GET['programid']) && $programid == $_GET['programid']) ? "selected" : "" ?>>
                                        <?php echo $value['programname'];?></option>
                                    <?php }
                        }?>
                                </select>
                            </div>
                        </div>
                        <div class="span2 m-wrap">
                            <label><strong>Month</strong></label>
                            <div class="controls">
                                <select id="month" name="month">
                                    <option value="0" <?php echo ($_GET['month'] == '0') ? "selected" : "" ?>>
                                        None </option>
                                    <option value="1" <?php echo ($_GET['month'] == '1') ? "selected" : "" ?>>
                                        Jan </option>
                                    <option value="2" <?php echo ($_GET['month'] == '2') ? "selected" : "" ?>>
                                        Feb </option>
                                    <option value="3" <?php echo ($_GET['month'] == '3') ? "selected" : "" ?>>
                                        Mar </option>
                                    <option value="4" <?php echo ($_GET['month'] == '4') ? "selected" : "" ?>>
                                        Apr </option>
                                    <option value="5" <?php echo ($_GET['month'] == '5') ? "selected" : "" ?>>
                                        May </option>
                                    <option value="6" <?php echo ($_GET['month'] == '6') ? "selected" : "" ?>>
                                        Jun </option>
                                    <option value="7" <?php echo ($_GET['month'] == '7') ? "selected" : "" ?>>
                                        Jul </option>
                                    <option value="8" <?php echo ($_GET['month'] == '8') ? "selected" : "" ?>>
                                        Aug </option>
                                    <option value="9" <?php echo ($_GET['month'] == '9') ? "selected" : "" ?>>
                                        Sep </option>
                                    <option value="10" <?php echo ($_GET['month'] == '10') ? "selected" : "" ?>>
                                        Oct </option>
                                    <option value="11" <?php echo ($_GET['month'] == '11') ? "selected" : "" ?>>
                                        Nov </option>
                                    <option value="12" <?php echo ($_GET['month'] == '12') ? "selected" : "" ?>>
                                        Dec </option>

                                </select>
                            </div>
                        </div>
                        <div class="span2 m-wrap">
                            <label><strong>Year</strong></label>
                            <div class="controls">
                                <select id="year" name="year">

                                    <option value="2020" <?php echo ($_GET['year'] == '2020') ? "selected" : "" ?>>
                                        2020 </option>
                                    <option value="2021" <?php echo ($_GET['year'] == '2021') ? "selected" : "" ?>>
                                        2021 </option>
                                </select>
                            </div>
                        </div>

                        <div class="span1 m-wrap" style="margin: 3px;">
                            <label>&nbsp;</label>
                            <button class="btn btn-primary" onclick="return submitform()" id="filter_search"
                                data-url="./">Search</button>
                        </div>

                    </fieldset>
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon" id="filtericon"><i class="fa fa-th"></i></span>
                        <h5>Listing</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>

                                <tr>
                                    <th>S.no</th>
                                    <th>Program Name</th>
                                    <th>Dhyankendra Name</th>
                                    <th>Start date </th>
                                    <th>End Date</th>
                                    <th>Language</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $i++; ?>
                            <?php
                            $pid = $row['programid'];
                            $sql_program = "Select * from   tb_od_program where programid=$pid";
                            $resultProgram = mysqli_query($link, $sql_program);
                            while ($rowp = mysqli_fetch_assoc($resultProgram)) {
                                $prName = $rowp['programname'];
                            }
                            $did = $row['dhyankendraid'];
                            $sql_dk = "Select * from   tb_od_dhyankendra where dhyankendraid=$did";
                            $resultDk = mysqli_query($link, $sql_dk);
                            while ($rowd = mysqli_fetch_assoc($resultDk)) {
                                $dkName = $rowd['dhyankendraname'];
                            }
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $i ?></td>
                                <td><strong><?php echo $prName; ?></strong></td>
                                <td><strong><?php echo $dkName; ?></strong></td>
                                <td><strong><?php echo $row['start_date']; ?></strong></td>
                                <td><strong><?php echo $row['end_date']; ?></strong></td>
                                <td><strong><?php echo $row['language']; ?></strong></td>
                                <?php 
                                 $node_id = $row['scheduleid'];
                                        if ($row['status'] == 1) {
                                      echo       $output = '<td id="published' . $node_id . '"> <div class="onoffswitch">
        <input type="checkbox" autocomplete="off" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch' . $node_id . '" checked onclick="updateBudgetitemStatus(\'' . '' . 'function.php?&tbl=tb_od_programschedule&id=' . $node_id . '\')">
        <label class="onoffswitch-label" for="myonoffswitch' . $node_id . '">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div></td>';
                                        } else {
                                      echo       $output = '<td id="published' . $node_id . '"> <div class="onoffswitch">
        <input type="checkbox" autocomplete="off" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch' . $node_id . '" onclick="updateBudgetitemStatus(\'' . '' . 'function.php?&tbl=tb_od_programschedule&id=' . $node_id . '\')">
        <label class="onoffswitch-label" for="myonoffswitch' . $node_id . '">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div></td>';

                                        }
                                        ?>

                                <td class="center">
                                    <div class="btn-group"><button class="btn "><a
                                                href='<?php echo 'schedule_add_edit.php?action=edit&id='.$node_id?>'>
                                                Edit <a> <span></span></button>
                                        <li><a
                                                href='<?php echo 'schedule_add_edit.php?action=edit&id='.$node_id?>'>Edit</a>
                                        </li>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            <?php }
                            } ?>
                        </table>

                        <?php   
                        // Get the total number of records from our table "students".
                        $sql1 = "Select COUNT(*) from   tb_od_programschedule where $where order by scheduleid desc LIMIT $start_from, $limit ";
                         $rs_result =mysqli_query($link, $sql1);
                        $row1 = mysqli_fetch_row($rs_result);  
                        $total_pages =  $row1[0];    

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 10;
      ?>
                        <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                            <li class="prev"><a href="program_list.php?page=<?php echo $page-1 ?>">Prev</a></li>
                            <?php endif; ?>

                            <?php if ($page > 3): ?>
                            <li class="start"><a href="program_list.php?page=1">1</a></li>
                            <li class="dots">...</li>
                            <?php endif; ?>

                            <?php if ($page-2 > 0): ?><li class="page"><a
                                    href="program_list.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li>
                            <?php endif; ?>
                            <?php if ($page-1 > 0): ?><li class="page"><a
                                    href="program_list.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li>
                            <?php endif; ?>

                            <li class="currentpage"><a
                                    href="program_list.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                            <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                                    href="program_list.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li>
                            <?php endif; ?>
                            <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                                    href="program_list.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li>
                            <?php endif; ?>

                            <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
                            <li class="dots">...</li>
                            <li class="end"><a
                                    href="program_list.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                            <li class="next"><a href="program_list.php?page=<?php echo $page+1 ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.green {
    color: green;
    font-weight: bold;
}

.red {
    color: red;
    font-weight: bold;
}
</style>
<script type="text/javascript">
$("#filter_speaker").click(function() {
    var filter_name = $("#filter_name").val();
    var url = $(this).data('url') + "program_category?name=" + filter_name;
    window.location.href = url;

});

function submitform() {
    var programid = $("#programid").val();
    var month = $("#month").val();
    var year = $("#year").val();
    var url = "schedule_list.php?programid=" + programid + "&month=" + month + "&year=" + year;
    window.location.href = url;

}

function updateBudgetitemStatus(url) {
    $.get(url, successBudgetdata);
}

function successBudgetdata(res) {

    var returnedData = JSON.parse(res);
    if (returnedData.status == "1") {
        $("#published" + returnedData.id).html(
            '<div class="onoffswitch"><input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" checked id="myonoffswitch' +
            returnedData.id + '" onclick="updateBudgetitemStatus(\'' + '' + '/changeStatus/0/' + returnedData
            .id + '/\')"><label class="onoffswitch-label" for="myonoffswitch' + returnedData.id +
            '"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>');
    } else {
        $("#published" + returnedData.id).html(
            '<div class="onoffswitch"><input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch' +
            returnedData.id + '" onclick="updateBudgetitemStatus(\'' + '' + '/changeStatus/1/' + returnedData
            .id + '/\')"><label class="onoffswitch-label" for="myonoffswitch' + returnedData.id +
            '"><span class="onoffswitch-inner"></span><span class="onoffswitch-switch"></span></label></div>');
    }
}
</script>
<?php include_once 'templates/footer.php'; ?>