<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2020 &copy; <a href=""></a> </div>
</div>

<!--end-Footer-part-->

<script src="./assets/js/jquery.min.js?v=1.6"></script> 
<script src="./assets/js/jquery.ui.custom.js?v=1.6"></script> 
<script src="./assets/js/bootstrap.min.js?v=1.6"></script> 
<script src="./assets/js/bootstrap-colorpicker.js?v=1.6"></script> 
<script src="./assets/js/bootstrap-datepicker.js?v=1.6"></script> 
<script src="./assets/js/jquery.datetimepicker.full.min.js?v=1.6"></script> 

<!-- <script src="./assets/js/jquery.toggle.buttons.js?v=1.6"></script>  -->
<script src="./assets/js/masked.js?v=1.6"></script> 
<script src="./assets/js/jquery.uniform.js?v=1.6"></script> 
<script src="./assets/js/select2.min.js?v=1.6"></script> 
<script src="./assets/js/matrix.js?v=1.6"></script> 
<script src="./assets/js/matrix.form_common.js?v=1.6"></script> 
<script src="./assets/js/jquery.peity.min.js?v=1.6"></script>
<script type="text/javascript" src="./assets/ckeditor/ckeditor.js?v4"></script>
<script type="text/javascript" src="./assets/ckfinder/ckfinder.js?v4"></script>

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
                           
                            if (hostname !="") {
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