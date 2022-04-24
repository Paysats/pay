$(document).ready(function () {
   $("#slc_plan").change(function () {
       $("#txt_data_plan").val($(this).val());
   })
    
    $("#txt_phone_number").keyup(function () {
        $("#txt_phone").val($(this).val());
    })
    
    $("#btn_buy").click(function (e) {
        e.preventDefault();
           $("#div_processing").show();
        buy_data();
    })

    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
                             function buy_data(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "buy_data.php",
                             method: "post",
           data: $('#frm_buy_data').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //  $("#div_processing").hide();
$("#div_body").html(strMessage);
$("#div_processing").hide();
            }
        })
    }
    
})