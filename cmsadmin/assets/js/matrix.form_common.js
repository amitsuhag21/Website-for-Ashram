
$(document).ready(function () {
    $("#sidebar").prop("style", "position:absolute;height:" + (window.innerHeight - 70) + "px;overflow: -moz-scrollbars-vertical;overflow-y:scroll;overflow-x: hidden;");
    $('#field_publishdate').datetimepicker();
    $('#field_start').datetimepicker();
    $('#expirydate').datetimepicker();
    $("#reset_cat").on('click', function () {
        $('#field_filter_category').val("");
        $("#field_category_filter_name").val("");
    });
    //$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
    $('input[type=checkbox],input[type=radio],input[type=file]').not('.onoffswitch-checkbox').uniform();

    $('select').select2();
    $('.colorpicker').colorpicker();
    $('.datepicker').datepicker();

    for (var i in CKEDITOR.instances) {
        CKEDITOR.instances[i].on('blur', function () {
            this.updateElement();
        });
    }
});

$(document).ready(function () {


    $("#filter_draft_search_news").click(function () {
        var startdate = $("#field_start_date").val();
        var enddate = $("#field_end_date").val();
        var sid = $("#story_id").val();
        var title = $("#title").val();
        var url = $(this).data('url') + "news/draft_news_listing?startdate=" + startdate + "&enddate=" + enddate + "&title=" + title + "&story_id=" + sid;
        window.location.href = url;

    });
    $("#filter_draft_search_photoslide").click(function () {
        var startdate = $("#field_start_date").val();
        var enddate = $("#field_end_date").val();
        var sid = $("#story_id").val();
        var title = $("#title").val();
        var url = $(this).data('url') + "photoslide/draft_listing?startdate=" + startdate + "&enddate=" + enddate + "&title=" + title + "&story_id=" + sid;
        window.location.href = url;

    });
    $("#filter_draft_search_jokes").click(function () {
        var startdate = $("#field_start_date").val();
        var enddate = $("#field_end_date").val();
        var sid = $("#story_id").val();
        var title = $("#title").val();
        var url = $(this).data('url') + "jokes/listing?startdate=" + startdate + "&enddate=" + enddate + "&title=" + title + "&story_id=" + sid;
        window.location.href = url;

    });
    $("#filter_draft_search_gallery").click(function () {
        var startdate = $("#field_start_date").val();
        var enddate = $("#field_end_date").val();
        var sid = $("#story_id").val();
        var title = $("#title").val();
        var field_type = $("#field_type").val();
        if (field_type == 'image') {
            var url = $(this).data('url') + "gallery/draft_listing?startdate=" + startdate + "&enddate=" + enddate + "&title=" + title + "&story_id=" + sid + "&field_type=" + field_type;
        } else {
            var url = $(this).data('url') + "gallery/video_draft_listing?startdate=" + startdate + "&enddate=" + enddate + "&title=" + title + "&story_id=" + sid + "&field_type=" + field_type;
        }
        window.location.href = url;

    });

    $(document).on('click', '.res_joke_del', function () {
        if (confirm("Are you sure, You want to unpublish this Joke?"))
        {
            return true;
        } else
        {
            return false;
        }
    });


    $(".mimg").on('click', function () {
        var src = $(this).attr('src');
        $("#modalImg").attr('src', src);
    });

    $(".mvideo").on('click', function () {
        var videosrc = $(this).data('video');
        $("#videoplayercontent").html('<video autoplay width="320" height="240" controls><source id="modalVideo" src="' + videosrc + '" type="video/mp4">Your browser does not support the video tag.</video>');
    });

    //------------- Tags plugin  -------------//

    $("#tags").select2({
        tags: ["red", "green", "blue", "orange"]
    });

    //------------- Elastic textarea -------------//
    if ($('textarea').hasClass('elastic')) {
        $('.elastic').elastic();
    }

    //------------- Input limiter -------------//
    if ($('textarea').hasClass('limit')) {
        $('.limit').inputlimiter({
            limit: 100
        });
    }

    //------------- Masked input fields -------------//
    $("#mask-phone").mask("(999) 999-9999", {completed: function () {
            alert("Callback action after complete");
        }});
    $("#mask-phoneExt").mask("(999) 999-9999? x99999");
    $("#mask-phoneInt").mask("+40 999 999 999");
    $("#mask-date").mask("99/99/9999");
    $("#mask-ssn").mask("999-99-9999");
    $("#mask-productKey").mask("a*-999-a999", {placeholder: "*"});
    $("#mask-eyeScript").mask("~9.99 ~9.99 999");
    $("#mask-percent").mask("99%");




    //------------- Colorpicker -------------//
    if ($('div').hasClass('picker')) {
        $('.picker').farbtastic('#color');
    }
    //------------- Datepicker -------------//
    if ($('#datepicker').length) {
        $("#datepicker").datepicker({
            showOtherMonths: true
        });
    }
    if ($('#datepicker-inline').length) {
        $('#datepicker-inline').datepicker({
            inline: true,
            showOtherMonths: true
        });
    }

    //------------- Combined picker -------------//
    if ($('#combined-picker').length) {
        $('#combined-picker').datetimepicker();
    }



    //------------- Select plugin -------------//
    $("#select1").select2();
    $("#select2").select2();

    //Boostrap modal
    $('#myModal').modal({show: false});

    //add event to modal after closed
    $('#myModal').on('hidden', function () {
        console.log('modal is closed');
    })

});//End document ready functions
