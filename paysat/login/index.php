<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/index.css" type="text/css">
   <link rel="stylesheet" href="../css/process.css" type="text/css">
  <script type="text/javascript" src="../js/lab.js"></script>
   <script type="text/javascript" src="../js/sign_up.js"></script>
</head>
<body>
<img alt="" src="../pix/pays.png" id="pix_logo">
<div id="div_login">

<form action="" method="post" id="frm_login">
<input type="text" placeholder="email" class="ttx_in" name="username">
<input type="password" placeholder="password"  class="ttx_in"  name="pass">
<input type="submit" value="Login"  class="ttx_in" id="btn_login">
</form>
</div>
<div id="div_create">
Create new account
</div>
<div id="div_sign_up">
<div id="sp_close">Create new account</div>

<form action="" method="post" id="frm_sign_up">
<input type="email" id="txt_mail" placeholder="email" class="ttx_up" name="mail">
<input type="password" placeholder="new password"  class="ttx_up" id="p1" name="pass">
<input type="password" placeholder="Re-type password"  class="ttx_up" id="p2">

<div id="div_otp">
<input type="text" placeholder="otp"  class="ttx_up" id="txt_otp" name="otp">
<div id="div_send_otp">send OTP</div>
</div>
<input type="submit" value="Sign up"  class="ttx_up" id="btn_sign_up">
</form>
<form action="" method="post" id="frm_otp">
<input type="hidden" id="txt_otp_send" name="mail">
</form>

</div>
<div id="div_processing">
<div id="div_pro_posi">
<div class="loader"></div>

</div>
Please wait
</div>

<div id="noti">
success
</div>

</body>
</html>