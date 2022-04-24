$(document).ready(function () {
 //   alert("fffff");
    $("#txt_wallet").keyup(function () {
        $("#div_confrm_wallet-adr").text($("#txt_wallet").val());
    })
    
    $("#btn_send_bch").click(function () {
      var amount=$("#bch_qty").val();
      var walle=$("#txt_wallet").val();

      if (amount=="" || walle==""){
$("#bch_qty").css("border","2px solid red");
$("#txt_wallet").css("border","2px solid red");
      }else {
          $("#bch_qty").css("border","2px solid green");
$("#txt_wallet").css("border","2px solid green");
          $("#div_confrm_wallet-adr").val(walle);
          $("#confirm_am_in_naira").val(amount);
           $(this).hide();
        $("#bch_qty").hide();
        $("#txt_wallet").hide();
        $("#div_confirm").slideToggle();
      }


    })
    
    $("#edit_de").click(function () {
            $(this).show();
        $("#bch_qty").show();
        $("#txt_wallet").show();
        $("#btn_send_bch").show();
        $("#div_confirm").slideToggle();
    })


    
    $("#bch_qty").keyup(function () {
        var fee=$("#id_fee").val();

var hold_b=parseInt($("#txt_hold_balance").val());
var amm=parseInt($(this).val());
//var rcv=$("#rcv").val();
//alert(amm);
//alert(hold_b);
        if (amm<60){
            $("#btn_send_bch").hide();
        }else {
        $("#confirm_am_in_naira").text($(this).val());
        if (amm>hold_b){
            $("#btn_send_bch").hide();
          //  alert("h");
        }else {
          //  alert("l");
              $("#btn_send_bch").show();
              var rcvv=parseInt($(this).val())-fee;
$("#rcv").text(rcvv);
        }
        }

    })
    $("#btn_send_bch_confirm").click(function (e) {
        send();
    })
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            function send(){
      //  alert("vvvvvvvv");
                        $.ajax({
            url: "test_send.php",
            method: "post",
           data: $('#frm_send_sato').serialize(),
            dataType: "html",
            success: function (strMessage) {
     //    alert(strMessage);
$("#div_wallet_addrss").html(strMessage);
            }
        })
    }
})