<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login SI-Pos Desa Sidua-dua</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="img/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<?php require_once('config/koneksi.php');
session_unset();
if(isset($_POST['login'])){
	$mail = mysqli_real_escape_string($con, $_POST['uname']);
	$pw = mysqli_real_escape_string($con,md5($_POST['pass']));

	$sql = mysqli_query($con,"select * from user where username='$mail' AND password='$pw'");
    $num = mysqli_num_rows($sql);
    $data = mysqli_fetch_array($sql);
    $nik = $data['nik'];
    if($num>0){
      $find = mysqli_query($con, "select * from user where nik='$nik'");
      $user = mysqli_fetch_array($find);

      session_start();
      $_SESSION['niku'] = $user['nik'];
      $_SESSION['namau'] = $user['nama'];
      $_SESSION['akses'] = $user['akses'];

      if($_SESSION['akses']=='user'){
        header('location:index.php?stat=login_success');
      }elseif($_SESSION['akses']=='admin'){
        header('location:admin/index.php?stat=login_success');
      }else{
      	header('location:intruder.php');
      }

    }else{
      header('location:login.php?stat=wrong');
  	}
} ?>
<body>

	<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="post">
					<!-- <span class="login100-form-title p-b-33">
						Login
					</span> -->
					<center><img style="margin-top: -40px" src="img/bayi.png" width="50%" height="50%"></center><br>
					
					<?php require_once('admin/alert.php'); ?>
					<div class="wrap-input100 validate-input" data_validate="Username is required">
						<input class="input100" type="text" name="uname" placeholder="Username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" type="submit" name="login">
							Login
                        </button>
					</div>
					<div class="container-login100-form-btn m-t-20">
						<a class="login100-form-btn" href="index.php">
							Kembali
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>