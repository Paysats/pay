$(document).ready(function () {
    //LOADER>>>>>>>>>>>>>>>>>>>>>>
    balance_upd();
var bd_width=$("body").width();
$("#noti").css("width",bd_width);
 $("#sp_copy").click(function () {
     //  var copyText = $("#txt_wallet");
 var copyText = document.getElementById("txt_wallet");
  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */
  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
 })

 $("#btn_send").click(function (e) {
  e.preventDefault();
 send();
 })
    $("#btn_services").click(function (e) {
        e.preventDefault();
        services();
    })

    $("#btn_dep").click(function (e) {
        e.preventDefault();

    })
$("#btn_dep").click(function (e) {
    e.preventDefault();
    deposit();
})
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
         function deposit(){
        $("#div_processing").show();
                        $.ajax({
            url: "deposit.php",
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
                setTimeout(function() {
$("#div_body").html(strMessage);
       $("#div_processing").hide();
}, 2000);

            }
        })
    }
         function services(){
        $("#div_processing").show();
                        $.ajax({
            url: "services.php",
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
                balance_upd();
                setTimeout(function() {
$("#div_body").html(strMessage);
}, 2000);
            }
        })
    }
         function send(){
        $("#div_processing").show();
                        $.ajax({
            url: "_send.php",
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
                balance_upd();
                setTimeout(function() {
$("#div_body").html(strMessage);
}, 2000);
            }
        })
    }

             function balance_upd(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "balance_update.php",
            dataType: "html",
            success: function (strMessage) {
       $("#div_processing").hide();
//$("#div_body").html(strMessage);
            }
        })
    }

})