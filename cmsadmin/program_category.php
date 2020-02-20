<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/sidebar.php'; ?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Program  Category Listing</a> </div>
        <h1>Program  Category Listing</h1>
    </div>
    <div class="container-fluid">
        <hr>    
        <div class="row-fluid text-right"><button class="btn btn-primary" onclick="document.location.href = '/program_category/election_add'"><a href="/program_category/election_add" style="color:#fff">Add Program  Category</a></button></div>    
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">

                    <fieldset class="scheduler-border span12" style="border: 2px solid #f0f0f0;padding:0 18px 0 0;margin: 5px 0">

                        <div class="span2 m-wrap">		     
                            <label><strong>Name :</strong></label>
                            <input class="span11 m-wrap"  type="text" placeholder="Program  Category Name" name="filter_name" id="filter_name"  value = "" style="height:35px;width:100%">		
                        </div>

                        <div class="span1 m-wrap" style="margin: 3px;">		     
                            <label>&nbsp;</label>
                            <button class="btn btn-primary" id="filter_election_list" data-url="/">Search</button>			
                        </div>

                    </fieldset>	
                </div>
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon" id="filtericon"><i class="fa fa-th"></i></span>
                        <h5>Program  Category Listing</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>

                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                  <!--  <th>Created By</th>
                                    <th>Modified By</th>-->
                                    <th>Status</th>    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="filtered_news">
                            <td>No Records</td>                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'templates/footer.php'; ?>
