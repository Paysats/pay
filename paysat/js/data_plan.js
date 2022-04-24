$(document).ready(function () {


    $("#slect_network").change(function (e) {
        e.preventDefault();

        $("#netwwork").val($(this).val());
        load_plan();
    })

    $("#btn_buy").click(function (e) {
        e.preventDefault();
        if ($("#slct_network").val()==""){

send_noti("select network");
        }else if ($("#txt_amount").val()==""){
send_noti("input amount");
        }else if ($("#txt_phone_no").val()==""){
          send_noti("phone number is empty");
        }else {
            var phone_count=$("#txt_phone_no").val();

            if ($("#txt_amount").val()<50){
            send_noti("minimum amount is 50 NGN");
            }
            else if (phone_count.length=="11"){
                $("#div_processing").show();
buy_airtime();
            }else {
              send_noti("invalid phone number");
            }
        }

    })

    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    function send_noti(e) {
                   $("#noti").html(e);
         $("#noti").slideToggle();
         setTimeout(function() {
        $("#noti").slideToggle();
        }, 2000);
    }
                     function load_plan(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "load_data_plan.php",
                             method: "post",
           data: $('#frm_load_data').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //  $("#div_processing").hide();
$("#div_return_data_plan").html(strMessage);
            }
        })
    }

                         function buy_airtime(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "buy_airtime.php",
                             method: "post",
           data: $('#frm_buy_airtime').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //  $("#div_processing").hide();
$("#div_body").html(strMessage);
$("#div_processing").hide();
            }
        })
    }

})