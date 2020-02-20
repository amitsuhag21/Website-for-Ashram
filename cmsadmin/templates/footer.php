<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 &copy; <a href="https://www.livehindustan.com">LiveHindustan.com</a> </div>
</div>

<!--end-Footer-part-->

<script src="http://lh-marathicms.htmedia.in/assets/js/jquery.min.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/jquery.ui.custom.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/bootstrap.min.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/bootstrap-colorpicker.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/bootstrap-datepicker.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/jquery.datetimepicker.full.min.js?v=1.6"></script> 

<!-- <script src="http://lh-marathicms.htmedia.in/assets/js/jquery.toggle.buttons.js?v=1.6"></script>  -->
<script src="http://lh-marathicms.htmedia.in/assets/js/masked.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/jquery.uniform.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/select2.min.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/matrix.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/matrix.form_common.js?v=1.6"></script> 
<script src="http://lh-marathicms.htmedia.in/assets/js/jquery.peity.min.js?v=1.6"></script>
<script type="text/javascript" src="http://lh-marathicms.htmedia.in/assets/ckeditor/ckeditor.js?v4"></script>
<script type="text/javascript" src="http://lh-marathicms.htmedia.in/assets/ckfinder/ckfinder.js?v4"></script>

<script type="text/javascript">
function showhide(ids)
{
  if(document.getElementById(ids).style.display=='block')
  {
    document.getElementById(ids).style.display='none';
    document.getElementById('span'+ids).innerHTML='+';
    
  }
  else
  {
    document.getElementById(ids).style.display='block';
    document.getElementById('span'+ids).innerHTML='-';
  }
}

$( "#related" ).click(function() {  
      if(document.getElementById("related").checked == true){  
      var type='';
      var gallerytype='';
       if(window.location.href.indexOf("photostory") > -1) {
       type='photo_story';
       }
       if(window.location.href.indexOf("news") > -1) {
       type='news';
       }
        if(window.location.href.indexOf("gallery") > -1) {
	  type='gallery';
	  gallerytype='image';
	   if(window.location.href.indexOf("video") > -1) {
	   gallerytype='video';
	   }
       }
      $("#filtericon").html('<i class="fa fa-spinner fa-spin" style="color:#FF0000;font-size:18px"></i>');
       $.ajax({
                type:'POST',
                url:'http://lh-marathicms.htmedia.in/news/get_filtered_relatednews',
                data:{'startdate':'','enddate':'','searchtitle':'','type':type,'main_category':'','story_id':'','gallery_type':gallerytype },
                success:function(data){
                    $('#foundrelated').html(data);
                    $('#filtericon').html('<i class="fa fa-th"></i>');
                }
            });
         }
         else
         {
         if(confirm("Are you sure you want to remove related news?"))
         {
	    $('#foundrelated tr').remove();
	    $('#sortable div').remove();
	    $('#related_news').val('');
         }
         else
         document.getElementById("related").checked=true;
         }
    });
    
    CKEDITOR.on('instanceReady', function(ev) {
        var editor = ev.editor;
        editor.dataProcessor.htmlFilter.addRules({
                elements : {
                    a : function( element ) {
                        if ( !element.attributes.rel ){
                           //gets content's a href values
                            var url = element.attributes.href;
                           //extract host names from URLs 
                            var hostname = (new URL(url)).hostname;
                           
                            if (hostname !="www.livehindustan.com") {
                                element.attributes.rel = 'nofollow';
                            }
                        }
                    }
                }
            });
    })
</script>
</body>
</html>