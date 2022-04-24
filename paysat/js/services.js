$(document).ready(function () {

$("#slc_service").change(function (e) {
    e.preventDefault();
    $("#txt_val").val($(this).val());
    if ($(this).val()=="Airtime" || $(this).val()=="Data Plan"){
        load_network();
    }else {
        alert("coming soon");
    }
})
                 function load_network(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "load_network.php",
                             method: "post",
           data: $('#frm_serivce').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //  $("#div_processing").hide();
$("#div_return_service").html(strMessage);
            }
        })
    }
})
