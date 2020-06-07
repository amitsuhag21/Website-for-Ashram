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

if(isset($_GET['action']) && ($_GET['action'] == 'deletes') && !empty($_GET['id'])){
    $delid =$_GET['id'];
    $sqlcat = "Select * from   tb_od_folder where id=$delid ";
    $resFold = mysqli_query($link, $sqlcat);
    while ($value = mysqli_fetch_assoc($resFold)) {
      print_r($value['path']);
      rmdir($value['path']);
      $sqlcat = "DELETE   from   tb_od_folder where id=$delid ";
    mysqli_query($link, $sqlcat);
    }
    header("Location: photo_folder_list.php");

}

$start_from = ($pn-1) * $limit;   
$sql = "Select * from   tb_od_folder where 1 order by id DESC LIMIT $start_from, $limit ";
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
                href="#" class="current">Listing</a> </div>
        <h1>Photos Folder Listing</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid text-right"><button class="btn btn-primary"
                onclick="document.location.href = 'photo_folder_add.php'"><a href="<?php echo 'photo_folder_add.php?action=add&v='.rand(1000000000,100000000000)?>"
                    style="color:#fff">Add Folder</a></button></div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon" id="filtericon"><i class="fa fa-th"></i></span>
                        <h5>Listing</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>

                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Path</th>
                                    <th>Parent Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                $i = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $i++; ?>

                            <tr class="gradeX">
                                <td><?php echo $i ?></td>
                                <td><strong><?php echo $row['foldername']; ?></strong></td>
                                <td><strong><?php echo $row['path']; ?></strong></td>
                                <td><strong><?php echo $row['parent_name']; ?></strong></td>
                                <?php 
                                       
                                        ?>

<td class="center">
                                    <div class="btn-group"><button
                                            class="btn "><a href='<?php echo 'photo_folder_list.php?action=delete&id='.$row['id']?>'> Delete <a> <span
                                                ></span></button>
                                            <li><a href='<?php echo 'photo_folder_list.php?action=delete&id='.$row['id']?>'>Delete</a></li>
                                       </div>
                                </td>
                            </tr>
                            </tbody>
                            <?php }
                            } ?>
                        </table>

                        <?php   
                        // Get the total number of records from our table "students".
                        $sql1 = "SELECT COUNT(*) FROM tb_od_folder";   
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
                            <li class="prev"><a href="photo_folder_list.php?page=<?php echo $page-1 ?>">Prev</a></li>
                            <?php endif; ?>

                            <?php if ($page > 3): ?>
                            <li class="start"><a href="photo_folder_list.php?page=1">1</a></li>
                            <li class="dots">...</li>
                            <?php endif; ?>

                            <?php if ($page-2 > 0): ?><li class="page"><a
                                    href="photo_folder_list.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li>
                            <?php endif; ?>
                            <?php if ($page-1 > 0): ?><li class="page"><a
                                    href="photo_folder_list.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li>
                            <?php endif; ?>

                            <li class="currentpage"><a
                                    href="photo_folder_list.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                            <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                                    href="photo_folder_list.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li>
                            <?php endif; ?>
                            <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a
                                    href="photo_folder_list.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li>
                            <?php endif; ?>

                            <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
                            <li class="dots">...</li>
                            <li class="end"><a
                                    href="photo_folder_list.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
                            <li class="next"><a href="photo_folder_list.php?page=<?php echo $page+1 ?>">Next</a></li>
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
      $("#filter_speaker").click(function () {
        var filter_name = $("#filter_name").val();
        var url = $(this).data('url') + "photo_foldeer_list?name=" + filter_name;
        window.location.href = url;

    });


</script>
<?php include_once 'templates/footer.php'; ?>