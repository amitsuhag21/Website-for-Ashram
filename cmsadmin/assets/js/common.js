$('#field_bignews').on('click', function (event) {
    if ($(this).prop("checked")) {
        $('#field_samagam').prop("checked", false);
        $('span', $('#uniform-field_samagam')).removeClass("checked");
        $('#bignews_hideshow').show();
        $('#samagam_hideshow').hide();
        document.getElementById("field_samagam").checked = false;


    } else {
        $('#bignews_hideshow').hide();
    }

});
$('#read_punjabi_status').on('click', function (event) {
    if ($(this).prop("checked")) {
        $('#field_samagam').prop("checked", false);
        $('span', $('#uniform-field_samagam')).removeClass("checked");
        $('#read_punjabi_hideshow').show();
        $('#bignews_hideshow').hide();
        $('#samagam_hideshow').hide();
        document.getElementById("field_samagam").checked = false;


    } else {
        $('#read_punjabi_hideshow').hide();
    }

});
$('#btnfieldurl').on('click', function (event) {
    $(this).prev('#field_url').prop('readonly', function (i, r) {
        // returns the value as the opposite  of what it currently is
        // if readonly is false, then it returns true (and vice-versa)
        return !r;
    });
});
$('#field_samagam').on('click', function (event) {

    if ($(this).prop("checked")) {
        $("#field_bignews").prop('checked', false);
        $('span', $('#uniform-field_bignews')).removeClass("checked");
        $('#bignews_hideshow').hide();
        $('#samagam_hideshow').show();
        $("#field_samagam_title").addClass("trans_loading");
        $("#field_samagam_url").addClass("trans_loading");

        $.ajax({
            type: "POST",
            url: BASEJSURL + 'news/getSamagamDetails',
            success: function (response)
            {
                var obj = JSON.parse(response);
                $("#field_samagam_title").removeClass("trans_loading");
                $("#field_samagam_url").removeClass("trans_loading");
                $("#field_samagam_title").prop("value", obj.samagam.title);
                $("#field_samagam_url").prop("value", obj.samagam.url);
                CKEDITOR.instances['field_samagam_data'].setData(obj.samagam.data);
            }
        });

    } else {
        $('#samagam_hideshow').hide();
    }

});
$('#field_poll').on('click', function (event) {

    if ($(this).prop("checked")) {
        $('#poll_hideshow').show();

    } else {
        $('#poll_hideshow').hide();
    }
});
$('#field_quiz').on('click', function (event) {

    if ($(this).prop("checked")) {
        $('#quiz_hideshow').show();

    } else {
        $('#quiz_hideshow').hide();
    }
});

$("#newsform").submit(function (event) {
    var bodydata = 'details';
    if ($("#field_category").val() == "") {
        $(".field_category").html($(".field_category").html() + "please choose primary Category").show().fadeOut(20000);
        $('html, body').animate({
            scrollTop: ($(".field_category").offset().top) - 50
        }, 1000);
        return false;
    } else if ($("#title").val() == "") {
        $("#title").parent().after('<div class="alert alert-danger alert-dismissable title span11">please fill long headline<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');

        // $( ".title" ).html($( ".title" ).html()+"please fill long headline" ).show().fadeOut(10000);
        $('html, body').animate({
            scrollTop: ($("#title").offset().top) - 50
        }, 1000);
        return false;
    } else if ($("#field_source").val() == "") {
        $("#field_source").parent().after('<div class="alert alert-danger alert-dismissable title span11">Source required<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');
        $('html, body').animate({
            scrollTop: ($("#field_source").offset().top) - 50
        }, 1000);
        return false;
    } else if ($("#field_hindi_keywords").val() == "") {
        $("#field_hindi_keywords").parent().after('<div class="alert alert-danger alert-dismissable title span11">Hindi Keywords required<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');
        $('html, body').animate({
            scrollTop: ($("#field_hindi_keywords").offset().top) - 50
        }, 1000);
        return false;
    } else if ($("#field_english_keywords").val() == "") {
        $("#field_english_keywords").parent().after('<div class="alert alert-danger alert-dismissable title span11">English keywords required<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');
        $('html, body').animate({
            scrollTop: ($("#field_english_keywords").offset().top) - 50
        }, 1000);
        return false;
    } else if ($("#field_url_text").val() == "") {
        $("#field_url_text").parent().after('<div class="alert alert-danger alert-dismissable title span11">URL text value required for news<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');
        $('html, body').animate({
            scrollTop: ($("#field_url_text").offset().top) - 50
        }, 1000);
        return false;
    } else if (!validtextcheck($("#field_url_text").val()) && $("#field_url_text").val() != '') {
        $("#field_url_text").parent().after('<div class="alert alert-danger alert-dismissable title span11">Invalid URL text<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');
        $('html, body').animate({
            scrollTop: ($("#field_url_text").offset().top) - 50
        }, 1000);
        return false;
    }
    /*else if($("#field_authors").val() == null || $("#field_authors").val() == ""){
     $("#field_authors").parent().after('<div class="alert alert-danger alert-dismissable title span11">Author required<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');
     $('html, body').animate({
     scrollTop: ($("#field_authors").offset().top)-50
     }, 1000);
     return false;
     } */
    else if (CKEDITOR.instances[bodydata].getData() == "")
    {
        $("#cke_details").parent().after('<div class="alert alert-danger alert-dismissable title span11">Add Some text in details<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');
        $('html, body').animate({
            scrollTop: ($("#cke_details").offset().top) - 50
        }, 1000);
        return false;
    } else
        return true;
    /*
     else if($('#photo_container').html() =="")
     {
     $("#photo_container").parent().after('<div class="alert alert-danger alert-dismissable title span11">Add Media<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></div>');
     $('html, body').animate({
     scrollTop: ($("#photo_container").offset().top)-50
     }, 1000);
     return false;
     }
     else
     return true;
     */
    event.preventDefault();
});


function validtextcheck(str) {
    var letters = /^[0-9a-zA-Z_:\- \/]+$/;
    if (str.match(letters)) {
        return true;
    }
    return false;
}