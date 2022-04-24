$(document).ready(function () {
var bd_width=$("#pix_logo").width();
bd_width=bd_width-30;
bd_width=bd_width+"px";
var bd_hi=$("body").height();
bd_hi=bd_hi-30;
bd_hi=bd_hi+"px";
var counta=0;
$("#div_send_otp").click(function (e) {
    e.preventDefault();
if (counta==0){
    counta=10;
        var mmail=$("#txt_mail").val();
$("#txt_otp_send").val(mmail);
get_otp();
var interval = setInterval(function() {
counta--;
//alert(counta);'

$("#div_send_otp").html(counta);
if (counta==0){
    clearInterval(interval);
    $("#div_send_otp").html("send OTP");
}
}, 1000);

}

})
//CSS>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
$("#div_sign_up").css("width",bd_width);
$("#div_create").css("width",bd_width);
$("#div_processing").css("width",bd_width);
$("#noti").css("width",bd_width);

    $("#div_create").click(function () {
$("#div_sign_up").slideToggle();
    })
    $("#sp_close").click(function () {
    $("#div_sign_up").slideToggle();

    })

$("#cv").click(function (e) {
    e.preventDefault();
    get_otp();
})


$("#btn_sign_up").click(function (e) {
    e.preventDefault();
       var p1=$("#p1").val();
    var p2=$("#p2").val();
    var otf=$("#txt_otp").val();
var mai= $("#txt_mail").val();
    if (p1==p2){
if (mai==""){
    $("#noti").html("Input a valid mail");
         $("#noti").slideToggle();
                  setTimeout(function() {
$("#noti").slideToggle();
  }, 2000);
}else if(p1==""){
    $("#noti").html("Create a strong password");
         $("#noti").slideToggle();
                  setTimeout(function() {
$("#noti").slideToggle();
  }, 2000);
}else if(otf==""){
    $("#noti").html("OTP is empty");
         $("#noti").slideToggle();
                  setTimeout(function() {
$("#noti").slideToggle();
  }, 2000);
}
else {
    $("#div_processing").show();
       sign_up();

}


    }else {
         $("#noti").html("password miss match");
         $("#noti").slideToggle();
                  setTimeout(function() {
$("#noti").slideToggle();
  }, 2000);
    }
})
    $("#btn_login").click(function (e) {
        e.preventDefault();
        login();
    })
    
//>>>>>>>>>>>>>>>FUNCTION>>>>>>>>>>>>>>>>>>>>>>
            function login(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "login.php",
            method: "post",
           data: $('#frm_login').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
$("#noti").html(strMessage);
       $("#noti").slideToggle();
         setTimeout(function() {
$("#noti").slideToggle();
 $("#div_processing").hide();
 if (strMessage=="Username or Password is invalid"){

 }else {
 window.open('http://localhost/pays', '_parent');
 }

  }, 3000);
            }
        })
    }
            function sign_up(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "_sign_up.php",
            method: "post",
           data: $('#frm_sign_up').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
$("#noti").html(strMessage);
       $("#noti").slideToggle();
         setTimeout(function() {
$("#noti").slideToggle();
 $("#div_processing").hide();
 if (strMessage=="New wallet created successfully"){
 window.open('http://localhost/pays', '_parent');
 }

  }, 3000);
            }
        })
    }
        function get_otp(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "opt.php",
            method: "post",
           data: $('#frm_otp').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
//$("#div_estimate_sale_retun").html(strMessage);
            }
        })
    }
})