
<!--close-top-Header-menu-->
<!--start-top-serch-->
<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/sidebar.php'; ?>


<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Speaker Listing</a> </div>
        <h1>Speaker Listing</h1>
    </div>
    <div class="container-fluid">
        <hr>    
        <div class="row-fluid text-right"><button class="btn btn-primary" onclick="document.location.href = './samagam/speaker_add'"><a href="./samagam/speaker_add" style="color:#fff">Add Speaker</a></button></div>    

        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">

                    <fieldset class="scheduler-border span12" style="border: 2px solid #f0f0f0;padding:0 18px 0 0;margin: 5px 0">
                        <div class="span2 m-wrap">		     
                            <label><strong>Name :</strong></label>
                            <input class="span11 m-wrap"  type="text" placeholder="Speaker Name" name="filter_name" id="filter_name"  value = "" style="height:35px;width:100%">		
                        </div>

                        <div class="span1 m-wrap" style="margin: 3px;">		     
                            <label>&nbsp;</label>
                            <button class="btn btn-primary" id="filter_speaker" data-url="./">Search</button>			
                        </div>

                    </fieldset>	
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon" id="filtericon"><i class="fa fa-th"></i></span>
                        <h5>Speaker Listing</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>

                                <tr>
                                    <th>S.no</th>
                                    <th>Speaker Name</th>
                                    <th>Image</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th>Created By</th>
                                    <th>Modified By</th>
                                    <th>Status</th>  
                                    <th>Sort</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="filtered_news">
                                <tr class="gradeX"><td>1</td><td><strong>Aditya</strong></td><td>No Image</td><td>2020/02/17 11:48:23</td><td>2020/02/17 11:48:23</td><td>Admin</td><td>Admin</td><td id="published5e4a302fd776bd9be30041a7"> <div class="onoffswitch">
        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch5e4a302fd776bd9be30041a7" checked onclick="updateSpeakerstatus('./samagam/changeStatus/0/5e4a302fd776bd9be30041a7')">
        <label class="onoffswitch-label" for="myonoffswitch5e4a302fd776bd9be30041a7">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div></td><td><strong>1</strong></td><td class="center"><div class="btn-group"><button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Action <span class="caret"></span></button><ul class="dropdown-menu"><li><a  href="./samagam/speaker_edit/5e4a302fd776bd9be30041a7">Edit</a></li><li><a class="res_del" href="./samagam/speaker_delete/5e4a302fd776bd9be30041a7" >Delete</a></li></ul></div></td></tr>                            </tbody>
                        </table>
                                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .green {color:green;font-weight: bold;}
    .red {color:red;font-weight: bold;}
</style>
<?php include_once 'templates/footer.php'; ?>
