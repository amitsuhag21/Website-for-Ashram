
<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/sidebar.php'; ?>


<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#">Add Election</a></div>
    </div>
    <!--End-breadcrumbs-->

    <div class="container-fluid">
        <!--Action boxes-->
                <!--End-Action boxes-->    
        <hr/>
        <!--form element start -->   
        <div class="row-fluid">  
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h4>Election Add Form</h4>
                </div>
                <div class="widget-content nopadding">

                                        <form action="/program_category/election_savedata" method="post" class="form-horizontal form-group-lg"  accept-charset="utf-8" enctype='multipart/form-data' name="electionform" id="electionform">
                        <input type="hidden" name="stype" id="stype" value="election" />
                        <div class="control-group">
    <label class="control-label"><strong>Primary Category * :</strong></label>
    <div class="controls">
                    <input class="span6" type="hidden" id="field_category" name="field_category">
            <select class="span6" onchange="javascript: $('#field_category').val(this.value);"  id="field_category_name">
                <option value=""></option>
                 
            </select>

            <a href="#myModal" data-toggle="modal" class="btn btn-success" id="choosecat" style='height:18px'>Choose Category</a>     
            <div id="myModal" class="modal hide" style="display: none;" aria-hidden="true">				  
                <div class="modal-body" id="allcats"> </div>			  
            </div>     
            <div  class="alert alert-danger alert-dismissable field_category span11" style="display:none; font-style:bold"></div>
            </div>
</div>                        <div class="control-group">
                            <label class="control-label"><strong>Name* :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Name" type="text" name="field_name" id="field_name" data-minlength="20"  maxlength="200" required>
                                <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>
                            </div>
                            <div  class="alert alert-danger alert-dismissable field_short_headline span11" style="display:none; font-style:bold"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> </div>
                        </div>    
                        <div class="control-group">
                            <label class="control-label"><strong>Meta Title :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Meta Title" type="text" name="field_meta_title" id="field_meta_title" data-minlength="20"  maxlength="200" />
                                <span class="span10" style="color:#c1c1c1">Maximum 200 charecters allowed</span>
                            </div>
                            <div  class="alert alert-danger alert-dismissable field_short_headline span11" style="display:none; font-style:bold"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> </div>
                        </div>    

                        <div class="control-group">
                            <label class="control-label"><strong>Hindi Keywords :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Hindi Keywords in comma separate format" type="text" name="field_hindi_keywords" id="field_hindi_keywords" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>English Keywords :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="English Keywords in comma separate format" type="text" name="field_english_keywords" id="field_english_keywords" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>URL Text * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="URL Text" type="text" name="field_url_text" id="field_url_text" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Total seats * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Total seats" type="number" name="field_total_seats" id="field_total_seats" required />
                            </div>
                        </div>
                         <div class="control-group">
                            <label class="control-label"><strong>Bahumat * :</strong></label>
                            <div class="controls">
                                <input class="span11" style="height:35px" placeholder="Bahumat" type="number" name="field_bahumat" id="field_bahumat" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Description* :</strong></label>
                            <div class="controls">
                                <textarea name="details" rows="8" cols="60"></textarea>
<script type="text/javascript">//<![CDATA[
window.CKEDITOR_BASEPATH='/assets/ckeditor/';
//]]></script>
<script type="text/javascript" src="/assets/ckeditor/ckeditor.js?t=B5GJ5GG"></script>
<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('details', {"language":"hn","width":"95%","height":"300px"});
//]]></script>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="widget-box">
                                <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
                                    <h5>Add Gallery</h5>
                                </div>
                                <div class="widget-content" style="min-height:20px;max-height:300px;overflow-y:scroll">
                                    <li class="span2"> 
                                        <a href="javascript:void(0)" class="library"><img src="../assets/img/gicon.png" alt="add Gallery"> </a>
                                    </li>
                                    <ul class="thumbnails"  id="photo_container"></ul>
                                </div>
                            </div>	
                        </div>
                        <!-- Modal -->
<script src="/assets/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/jcropper/js/script.js"></script>
<script src="/assets/custom.js"></script>

<div id="library_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
    <!-- Modal content-->
        <div class="modal-content">
            <ul class="nav nav-tabs" id="tabContent">
                <li class="active">
                    <a href="#upload_container" data-toggle="tab" data-tabtype="upload" data-url="/library/upload" title="Upload">
                            <span class="round-tabs two">
                                <i class="fa fa-upload"></i>
                            </span>UPLOAD
                    </a>
                </li>
                <li><a href="#web_container" data-toggle="tab" data-tabtype="web"  data-url="/library/web" title="Web">
                    <span class="round-tabs two">
                                <i class="fa fa-cloud-download"></i>
                            </span>WEB</a></li>
                <li><a href="#library_container" data-toggle="tab" data-tabtype="allimages"  data-url="/library/allimages" title="Library">
                    <span class="round-tabs two">
                                <i class="fa fa-archive"></i>
                            </span>LIBRARY</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="upload_container">A</div>
                <div class="tab-pane" id="web_container">B</div> 
                <div class="tab-pane" id="library_container">C</div> 
            </div>

            <div class="modal-footer">
                 <button type="button" class="btn btn-primary" onclick="javascript: if(document.getElementById('img_title') && document.getElementById('img_title').value =='') { alert('please fill photo title');document.getElementById('img_title').focus(); } else { crop_photos(); }" id="submit">ADD TO GALLERY</button>
		 <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>       
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var TARGET_W = 640;
var TARGET_H = 360;
var TARGET_W1 = 212;
var TARGET_H1 = 159;
// crop_photo : 
function crop_photos() {

  var itemType = $('ul#tabContent').find('li.active a').attr('href');
  var phturl = $('#photo_url').val();
  var paths=window.location.pathname;
  var ntype='';
  var css='';
  if(paths.includes('photostory'))
  {
    ntype= "photo_story"; 
    css=" display:none;";
  }
  if(itemType =='#library_container')
  {
    var sThisVal='';
    var jsondata ='';
    $('input[name="images"]:checked').each(function () {
      var jsondata = $.parseJSON($(this).val());
      var imgname = imgbasename(jsondata.image_path) ;
      var img_first =imgname.split(".");
       sThisVal += '<li class="span3" style="cursor:pointer"><a href="javascript:void(0);" onclick="removephoto(this)" style="position:absolute;padding:5px;right:14px;font-size:18px;background-color:#fff;color:#000">X</a><a href="javascript:void(0);" onclick="storydetails(\''+ img_first[0] +'\'); $(\'#photo_container li\').css(\'border\',\'\');$(this).closest(\'li\').css(\'border\',\'1px solid red\')"> <img src="'+ jsondata.image_path +'"></a><input type="radio" name="thumbimage" id="'+ img_first[0] +'_123" style="position: absolute; top:0;left: 0" value="'+ imgname +'" /><div class="control-group"><input  placeholder="story" value="'+ jsondata.image_path +'" name="field_image[]" type="hidden" readonly><input  placeholder="Image Title here" value="'+ jsondata.image_title +'" style="margin-top:5px" name="img_title[]"  id="img_title'+ img_first[0] +'" type="hidden" readonly><input  placeholder="Image Alt here"  value="'+ jsondata.image_alt +'" style="margin-top:5px" name="img_alt[]" id="img_alt'+ img_first[0] +'"  type="hidden" required><input  placeholder="Image Keywords"  value="'+ jsondata.image_keywords +'" style="margin-top:5px;'+css+'" name="img_keywords[]" id="img_keywords'+ img_first[0] +'"  onclick="this.focus();"  type="text" required><input value="'+ jsondata.image_from +'" style="margin-top:5px" name="image_from[]" type="hidden"> <textarea  placeholder="Image Description here" style="margin-top:5px;'+css+'" rows="5" name="img_desc[]" onclick="this.focus();" id="img_desc'+ img_first[0] +'" >'+ jsondata.image_description +'</textarea></div></li>';      
       
  });
   
   //var jsondata = $.parseJSON(checkedValues);
    $('#photo_container').html( $('#photo_container').html() + sThisVal);
    $('#library_modal').modal('toggle');
  }
  else if(typeof phturl == 'undefined')
  {
      alert("select image first");
      return false;
  }
  else
  {
    var descmax= document.getElementById("img_desc").maxLength;
    var myLength = $("#img_desc").val().length
    if(!$('#img_desc').val()=="" && descmax <= myLength)
    {
      alert("Image Description max 350 chars"); 
      $('#img_desc').focus();
      return false;
    }
    else if(!$('#x').val() && !$('#y').val())
    {
      alert("please crop 16:9 image, by clicking crop button present on right-top of each image"); 
      return false;
    }
    if(!$('#x1').val() && !$('#y1').val())
    {
      alert("please crop 4:3 image, by clicking crop button present on right-top of each image"); 
      return false;
    }
	var x_ = $('#x').val();
	var y_ = $('#y').val();
	var w_ = $('#w').val();
	var h_ = $('#h').val();
	var org_width = $('#org_width').val();
	var org_height = $('#org_height').val();
	
	var x1_ = $('#x1').val();
	var y1_ = $('#y1').val();
	var w1_ = $('#w1').val();
	var h1_ = $('#h1').val();

	var img_title_ = $('#img_title').val();
	var img_alt_ = $('#img_alt').val();
	var img_keywords_ = $('#img_keywords').val();
	var img_desc_ = $('#img_desc').val();
	
	var photo_url_ = $('#photo_url').val();
	var photo_url1_ = $('#photo_url1').val();
	// hide thecrop  popup
	
// 	var cururl="../library/cropdata";
// 	
// 	if(paths.includes('edit'))
// 	{
// 	cururl= "../../library/cropdata"; 
// 	}
	var cururl="/library/cropdata";
	
	$('#popup_crop').hide();

	// display the loading texte
	$('.imgprocess').html('<i class="fa fa-spinner fa-spin" style="font-size: 50px;position: absolute; left:30%;top:30%;z-index: 100000;color:#FF0000;"></i>');
	$('#submit').attr('disabled');
	// crop photo with a php file using ajax call
	$.ajax({
		url: cururl,
		type: 'POST',
		data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H,   x1:x1_, y1:y1_, w1:w1_, h1:h1_, photo_url1:photo_url1_, targ_w1:TARGET_W1,org_height:org_height,org_width:org_width,targ_h1:TARGET_H1,img_title:img_title_,img_alt:img_alt_,img_keywords:img_keywords_,img_desc:img_desc_,ntype:ntype},
		success:function(data){
			// display the croped photo
			$('#photo_container').html($('#photo_container').html()+data);
			$('#library_modal').modal('toggle');
		}
	});
  }
}


function imgbasename(urlstring)
{
  var fileNameIndex = urlstring.lastIndexOf("/") + 1;
  var filename = urlstring.substr(fileNameIndex); 
  return filename;
}
function getpages(form_data)
{
      $.ajax({
            url: "/library/getpages",
            type: 'POST',
            data: form_data,
            cache: false,
            success: function(data, textStatus, jqXHR){
                $('#paging').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('ERRORS: ' + textStatus);
            }
        });
      return false;
}
function searchgallery()
{
     var loading_img = '<div class="loader" style="position: absolute;top: 20%;left: 50%;margin: 150px 0px 0px 0px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>';    
        $('#gallery_data').html(loading_img);        
        var form_data = $("#library_search_form").serialize();
        getpages(form_data);
	$.ajax({
            url: "/library/getlibrary",
            type: 'POST',
            data: form_data,
            cache: false,
            success: function(data, textStatus, jqXHR){
                $('#gallery_data').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('ERRORS: ' + textStatus);
            }
        });
      return false;
   
}
function searchgalleryimages()
{
     var loading_img = '<div class="loader" style="position: absolute;top: 20%;left: 50%;margin: 150px 0px 0px 0px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>';    
        $('#gallery_data').html(loading_img);        
        var form_data = $("#library_search_form").serialize();
        getpages(form_data);
	$.ajax({
            url: "/library/getlibrary",
            type: 'POST',
            data: form_data,
            cache: false,
            success: function(data, textStatus, jqXHR){
                $('#gallery_data').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('ERRORS: ' + textStatus);
            }
        });
      return false;
   
}
function getImageLibrary(page)
{
     var loading_img = '<div class="loader" style="position: absolute;top: 20%;left: 50%;margin: 150px 0px 0px 0px;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></div>';
   
        $('#gallery_data').html(loading_img);
        var form_data = $("#library_search_form").serialize();
	 $('#paging span').css("color", "#fff");
        $.ajax({
            url: "/library/getImageLibrary",
            type: 'GET',
            data: {page:page,imgtitle:$('#imgtitle').val(),keywords:$('#keywords').val()},
            cache: false,
            success: function(data, textStatus, jqXHR){
	     $('#paging'+page).css("color", "red");
	      $('#gallery_data').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('ERRORS: ' + textStatus);
            }
        });
      return false;
   
}
$(document).ready(function(){
    $(".library").click(function(){
        if($("#tabContent").find("li.active a").data("tabtype") == "allimages")
            $("#tabContent").find("li.active a").click();
    })
})
</script>    
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" name="save" value="1">Publish</button>
                            <a href="/program_category"><input type="button" class="btn btn-danger" value="Cancel"></a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--form element end -->
    </div>
</div>


 <?php include_once 'templates/footer.php'; ?>