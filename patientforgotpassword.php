<?php
session_start();
include("header.php");
if (isset($_SESSION['patientid'])) {
	echo "<script>window.location='patientaccount.php';</script>";
}
if (isset($_POST['submit'])) {
	$sql = "SELECT * FROM patient WHERE loginid='$_POST[loginid]' AND status='Active'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_num_rows($qsql) >= 1) {
		$rslogin = mysqli_fetch_array($qsql);
		$msg = "Kindly enter Login ID: $rslogin[loginid] and Password is : $rslogin[password] to login WMC..";
?>
		<iframe style="visibility:hidden" src="http://login.smsgatewayhub.com/api/mt/SendSMS?APIKey=qyQgcDu3EEiw1VfItgv1tA&senderid=WEBSMS&channel=1&DCS=0&flashsms=0&number=<?php echo $rslogin['mobileno']; ?>&text=<?php echo $msg; ?>&route=1"></iframe>
<?php
		echo "<script>alert('Login details sent to your registered mobile number...'); </script>";
		echo "<script>window.location='patientlogin.php';</script>";
	} else {
		echo "<script>alert('Invalid login id entered..'); </script>";
	}
}
?>
<div class="wrapper col2">
	<div id="breadcrumb">
		<ul>
			<li class="first">Recover Password</li>
		</ul>
	</div>
</div>
<div class="wrapper col4">
	<div id="container">
		<h1>Kindly enter login detail to recover password..</h1>
		<form method="post" action="" name="frmpatlogin" onSubmit="return validateform()">
			<table width="200" border="3">
				<tbody>
					<tr>
						<td width="34%">Login ID</td>
						<td width="66%"><input type="text" name="loginid" id="loginid" /></td>
					</tr>
					<tr>
						<td height="36" colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Recover Password" /></td>
					</tr>
				</tbody>
			</table>
		</form>
		<p>&nbsp;</p>
	</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("footer.php");
?>
<script type="application/javascript">
	var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
	var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
	var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

	function validateform() {
		if (document.frmpatlogin.loginid.value == "") {
			alert("Login ID should not be empty..");
			document.frmpatlogin.loginid.focus();
			return false;
		} else if (!document.frmpatlogin.loginid.value.match(alphanumericExp)) {
			alert("loginid not valid..");
			document.frmpatlogin.loginid.focus();
			return false;
		} else if (document.frmpatlogin.password.value == "") {
			alert("Password should not be empty..");
			document.frmpatlogin.password.focus();
			return false;
		} else if (document.frmpatlogin.password.value.length < 8) {
			alert("Password length should be more than 8 characters...");
			document.frmpatlogin.password.focus();
			return false;
		}
	}
</script>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>WMC - Patient Login</title>
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<!-- Custom Css -->
	<link href="assets/css/main.css" rel="stylesheet">
	<link href="assets/css/login.css" rel="stylesheet">

	<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-cyan login-page authentication">
	<!-- header section -->
	<div class="container">
		<div id="err">
			<?php 
				echo $err;
			?>
		</div>
		<div class="card-top"></div>
		<div class="card">
			<h1 class="title"><span>Revocer Password</span></h1>
			<div class="col-md-12">

				<form method="post" action="" name="frmadminlogin" id="sign_in" onSubmit="return validateform()">
					<div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
						<div class="form-line">
							<input type="text" name="loginid" id="loginid" class="form-control" placeholder="Username" />
						</div>
					</div>
					<div class="text-center">
						<input type="submit" name="submit" id="submit" value="Login" class="btn btn-raised waves-effect g-bg-cyan" />
					</div>
					<div class="text-center"> <a href="patientforgotpassword.php">Recover Password</a></div>
				</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="theme-bg"></div>
	</div>
	</div>
	<script type="application/javascript">
		var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
		var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
		var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
		var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

		function validateform() {
			if (document.frmpatlogin.loginid.value == "") {
				alert("Login ID should not be empty..");
				document.frmpatlogin.loginid.focus();
				return false;
			} else if (document.frmpatlogin.password.value == "") {
				alert("Password should not be empty..");
				document.frmpatlogin.password.focus();
				return false;
			} else if (document.frmpatlogin.password.value.length < 8) {
				alert("Password length should be more than 8 characters...");
				document.frmpatlogin.password.focus();
				return false;
			}
		}
	</script>