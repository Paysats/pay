$(document).ready(function () {
    var bd_width=$("body").width();
   //alert(bd_width)
    if (bd_width>401){
            window.open('paysat','_blank', 'location=yes,height=570,width=400,scrollbars=yes,status=yes');
//window.open('oho.php','_parent')
    }else {
 window.open('paysat','_parent');
    }

})