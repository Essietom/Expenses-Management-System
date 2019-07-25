<!-- <?php
// session_start();
// unset($_SESSION['SESS_USER_ID']);


?>

<?php
  // if(isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR'])>0)
  // {
  //   foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
  //     echo $msg;
  //   }
  //   unset($_SESSION['ERRMSG_ARR']);
  // }
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page" style=" background: url(bgimg.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  width:100%;height:100%; ">
<div class=" login-box" style="margin-top:190px;">
  <!-- <div class="login-logo">
    <a href="#"><img src='key102.png' style="box-shadow: rgb(110 110 110) 3px 10px 3px "></a>
  </div> -->
  <!-- /.login-logo -->
  <div class="login-box-body" style="height:300px; width:400px; border-radius:12px; border-left:5px groove grey;">
  <h3  class="login-box-msg"> SIGN IN  </h3>

    <form action="userlogin.php" method="post">
      <div class="form-group has-feedback" >
        <input type="text" class="form-control" placeholder="Enter UserName" name="username" style=" color:grey; height:60px; font-size:20px; border-radius:20px; box-shadow: 8px 8px 5px #888888;">
        <span  class="glyphicon glyphicon-envelope form-control-feedback" ></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" style="color:grey; height:60px; font-size:20px; border-radius:20px; box-shadow: 8px 8px 5px #888888;">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <br>
        <!-- /.col -->
        <div class="col-xs-3"> </div>
        <div class="col-xs-4">
          <button type="submit" name="action_login" class="btn btn-primary btn-block btn-flat" style="font-size:25px; box-shadow: 5px 5px 3px grey; width:150px; height:50px; border-radius:10px; :hover {background:red}">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



  </div>
</div>


<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>

</html>
