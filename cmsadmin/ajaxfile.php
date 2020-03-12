<?php
// Parameters
$type = $_GET['type'];
$CKEditor = $_GET['CKEditor'];
$funcNum = $_GET['CKEditorFuncNum'];
// Image upload
if($type == 'image' || $type == 'file'){

    $allowed_extension = array(
      "png","jpg","jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);
    $imgname = $_FILES["upload"]["name"];
    $imgname = str_replace('.jpg','_'.time().'.jpg',$imgname);
    $imgname = str_replace('.png','_'.time().'.png',$imgname);
    $imgname = str_replace('.jpeg','_'.time().'.jpeg',$imgname);
    if(in_array(strtolower($file_extension),$allowed_extension)){
       
       if(move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$imgname)){
          // File path
          if(isset($_SERVER['HTTPS'])){
             $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
          }
          else{
             $protocol = 'http';
          }
          //$url = $protocol."://".$_SERVER['SERVER_NAME'] ."/ckeditor_fileupload/uploads/".$_FILES['upload']['name'];
        $url = "uploads/".$imgname;

          echo '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
       }

    }

    exit;
}

// File upload
if($type == 'file'){

    $allowed_extension = array(
       "doc","pdf","docx"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);

    if(in_array(strtolower($file_extension),$allowed_extension)){

       if(move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$_FILES['upload']['name'])){
          // File path
          if(isset($_SERVER['HTTPS'])){
              $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
          }
          else{
              $protocol = 'http';
          }

          $url = $protocol."://".$_SERVER['SERVER_NAME'] ."/ckeditor_fileupload/uploads/".$_FILES['upload']['name'];
         
          echo '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
       }

    }

    exit;
}