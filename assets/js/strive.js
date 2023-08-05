var baseurl = $("body").data("baseurl"),
    message_saved = "Record has been saved successfully.",
    message_deleted = "Record has been deleted successfully.",
    message_error = "An error occurred. Please try again later.",
    message_loading = baseurl + "assets/img/preloader.gif";


function sweetalert(e, t, a) {
    swal({
        title: t,
        text: a,
        type: e,
        showCancelButton: 0,
        allowOutsideClick: !1,
        confirmButtonClass: "btn btn-success"
    })
}

function sweetalert_redirect(e, t, a, o) {
    swal({
        title: t,
        text: a,
        type: e,
        showCancelButton: 0,
        allowOutsideClick: !1
    }).then(function() {
        window.location = o
    })
}

function sweetalertconfirm(e, t, a, o, n = null) {
    swal({
        title: t,
        text: a,
        type: e,
        showCancelButton: !0,
        allowOutsideClick: !1,
        confirmButtonClass: "btn btn-success",
        cancelButtonClass: "btn btn-warning",
        confirmButtonText: "Yes"
    }).then(e => {
        e && o(n)
    }).catch(swal.noop)
}

function removescreen() {
    $('#preloader').delay(350).fadeOut('slow');
}

function blockscreen() {
    $('#preloader').show();
    $('#status').show();
}


function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if( !emailReg.test( email ) ) {
        return false;
    } else {
        return true;
    }
}


if($("#form_login").length)  {
    
    $("#sendotp").click(function(){
        if($("#email").val() == ''){
            sweetalert('error', 'No Email Address provided.', 'Please provide your Email Address.');
        }else if(!validateEmail($("#email").val())){
            sweetalert('error', 'Invalid Email Address', 'Please check your Email Address.');
        }else{
            sendotp();
        }
    });

    $("#login").click(function(){


        if($("#form_login").valid()){
            loginnow();
        }

    });
}


function sendotp(){
    var frm = $('#form_login');
    $.ajax({
        type: frm.attr('method'),
        url: 'login/sendotp',
        data: frm.serialize(),
        dataType: "text",  
        cache:false,
        success: function(data){
            sweetalert('success', 'OTP has been generated', 'For this demonstration you may use the following OTP: '+data); 
        },
        beforeSend: function() { blockscreen(); },
        complete: function() { removescreen(); },
        error: function(data){ console.log(data); sweetalert('error', 'ERROR OCCURED', data['status']+': '+data['statusText']);  console.log(data); }
    });

}


function loginnow(){
    var frm = $('#form_login');
    $.ajax({
        type: frm.attr('method'),
        url: 'login/loginnow',
        data: frm.serialize(),
        dataType: "text",  
        cache:false,
        success: function(data){
            if(data == false){

              sweetalert('error', 'Error Logging in.', 'Invalid One-Time Password Provided'+data); 
            }else{ 
              window.location.replace(baseurl+'profile');
            }
        },
        beforeSend: function() { blockscreen(); },
        complete: function() { removescreen(); },
        error: function(data){ console.log(data); sweetalert('error', 'ERROR OCCURED', data['status']+': '+data['statusText']);  console.log(data); }
    });

}





if($("#form_profile").length)  {
    $("#save_profile").click(function(){
        if($("#form_profile").valid()){
            saveprofile();
        }
    });

    $('select[name="b_country"]').change(function () {
        var b_country = this.value;
        $("select[name='b_target'] option[value='"+b_country+"']").remove();
    });
}



function gotoassessment(){
    window.location.replace(baseurl+'assessment');
}

function saveprofile(){

     $.ajax({
            type: "POST",
            url: baseurl + "profile/updateprofile", 
            data: {
                    action: "save_profile",
                    firstname: $('input[name="firstname"]').val(),
                    lastname: $('input[name="lastname"]').val(),
                    b_name: $('input[name="b_name"]').val(),
                    b_country: $('select[name="b_country"]').val(),
                    b_target: $('select[name="b_target"]').val(),
                    b_email: $('input[name="b_email"]').val(),
                    b_contact: $('input[name="b_contact"]').val(),
                    b_info: $('textarea[name="b_info"]').val(),
                    b_photo: $('#wizardPicturePreview').attr('src'),
                },
            dataType: "text",  
            cache:false,
            success: function(data){
                sweetalertconfirm('success', 'Your EMERGE Business Profile has been set up successfully.', 'Do you want to start with your Export Readiness Assessment now?', gotoassessment, null); 

            },
            beforeSend: function() { blockscreen(); },
            complete: function() { removescreen();  },
            error: function(data){ sweetalert('error', 'ERROR OCCURED', data['status']+': '+data['statusText']);  console.log(data); }
        });

}

if($("#image-gallery").length)  {
    $('#image-gallery').lightSlider({
        gallery: true,
        item: 1,
        thumbItem: 9,
        slideMargin: 0,
        speed: 500,
        auto: true,
        loop: true,
        onSliderLoad: function () {
            $('#image-gallery').removeClass('cS-hidden');
        }
    });

}


if($("#form_assessment").length)  {
    $("#submit_assessment").click(function(){
        if($("#form_assessment").valid()){
            save_assessment();
        }else{
            sweetalert('error', 'Form Completion Alert', 'Please double-check and ensure all fields are filled out.');
        }
    });

}



if($("#typewriter").length)  {
    var htmlText = $("#typewriter").html();
    $("#typewriter").empty();

    var currentChar = 0;
    var displayText = "";

    function typeWriter() {
        if (currentChar < htmlText.length) {
            displayText += htmlText.charAt(currentChar);
            $("#typewriter").html(displayText);
            currentChar++;
            setTimeout(typeWriter, 5); // Faster typing speed (adjust the delay as needed)
        }
    }

    typeWriter();
}

function save_assessment() {
    var allow_public = 0;
    if($('input[name=allow_public]').is(":checked")){
        allow_public = 1;
    }
    $.ajax({
        type: "POST",
        url: baseurl + "assessment/save_assess", 
        data: {
                action: "save_assess",
                b_name: $('input[name="b_name"]').val(),
                b_country_text: $("select[name='b_country'] option:selected").text(),
                b_target_text: $("select[name='b_target'] option:selected").text(),
                b_industry_text: $("select[name='b_industry'] option:selected").text(),
                b_country: $('select[name="b_country"]').val(),
                b_target: $('select[name="b_target"]').val(),
                b_industry: $('select[name="b_industry"]').val(),
                category_id: $('input[name="category_id[]"]:checked').map(function(i, e) {return e.value}).toArray(),
                q_id: $('.q_id:checked').map(function(i, e) {return e.value}).toArray(),
                document_id: $('input[name="document_id[]"]:checked').map(function(i, e) {return e.value}).toArray(),
                allow_public: allow_public,
            },
        dataType: "text",  
        cache:false,
        success: function(data){
//            sweetalert('success', 'SUCCESS', message_saved);
            sweetalert_redirect('success', 'Your Export Readiness Assessment form has been processed and submitted successfully.', 'We will now redirecting you to your assessment report.', baseurl+'report/goto/'+$('select[name="b_country"]').val()+'/'+$('select[name="b_target"]').val())
        },
        beforeSend: function() { blockscreen(); },
        complete: function() { removescreen();  },
        error: function(data){ sweetalert('error', 'ERROR OCCURED', data['status']+': '+data['statusText']);  console.log(data); }
    });
}





function ai_recommend(assid) {
    $.ajax({
        type: "POST",
        url: baseurl + "assessment/ai/"+assid, 
        data: {
                action: "ai_recommend",
            },
        dataType: "text",  
        cache:false,
        success: function(data){
            window.location = baseurl+'report/view_ai/'+assid
        },
        beforeSend: function() { blockscreen(); },
        complete: function() { removescreen();  },
        error: function(data){ sweetalert('error', 'ERROR OCCURED', data['status']+': '+data['statusText']);  console.log(data); }
    });
}

