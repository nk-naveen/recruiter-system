<?php 
session_start();
$error = array();

require "mail.php";

	if(!$con = mysqli_connect("localhost","root","","signup")){

		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgotpass']['email'] = $email;
					send_email($email);
					header("Location: forgotpass.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					$_SESSION['forgotpass']['code'] = $code;
					header("Location: forgotpass.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':		
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgotpass']['email']) || !isset($_SESSION['forgotpass']['code'])){
					header("Location: forgotpass.php");
					die;
				}else{	
					save_password($password);
					if(isset($_SESSION['forgotpass'])){
						unset($_SESSION['forgotpass']);
					}

					header("Location: login1.php");
					die;
				}
				break;
			
			default:
				
				break;
		}
	}
// sending mail
	function send_email($email){
		
		global $con;

		$expire = time() + (60 * 1);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($con,$query);

	
		send_mail($email,'Password reset',"Your code is " . $code);
	}
// updating pasword
	function save_password($password){
		
		global $con;

		// $password = password_hash($password, PASSWORD_DEFAULT);
		 $email = addslashes($_SESSION['forgotpass']['email']);

		$query = "update users set password = '" . md5($password) . "' where email = '$email' limit 1";
		mysqli_query($con,$query);

	}
// email check
	function valid_email($email){
		global $con;

		$email = addslashes($email);

		$query = "select * from users where email = '$email' limit 1";		
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}
// password check
	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgotpass']['email']);

		$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot password</title>
</head>
<body>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<br>
<style type="text/css">
	
	*{
		font-family: tahoma;
		font-size: 13px;
	}

	form{
		width: 100%;
		max-width: 500px;
		margin: auto;
		border: solid thin #ccc;
		padding: 10px;
	}

	.textbox{
		padding: 5px;
		width: 470px;
	}

</style>

		<?php 

			switch ($mode) {
				case 'enter_email':
					
					?>
						<form method="post" action="forgotpass.php?mode=enter_email"> 
							<h1 >Forgot Password</h1>
							<h3  style="font-size: 18px" >Enter your email below</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									echo $err . "<br>";
								}
							?>
							</span>
							<input class="textbox" type="email" name="email" placeholder="Email"><br>
							<br style="clear: both;">
							<button type="submit" class="btn btn-primary" value="Next">Next</button>
							<br><br>
						
						</form>
					<?php				
					break;

				case 'enter_code':
					
					?>
						<form method="post" action="forgotpass.php?mode=enter_code"> 
							<h1>Forgot Password</h1>
							<h3 style="font-size: 18px">Enter your the code sent to your email</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="textbox" type="text" name="code" placeholder="12345"><br>
							<br style="clear: both;">
							<button type="submit" class="btn btn-primary" value="Next">Next</button>
							<a href="forgotpass.php">
								<input type="button" class="btn btn-secondary" value="Back">
							</a>
							<br>
							
						</form>
					<?php
					break;

				case 'enter_password':
					
					?>
						<form method="post" action="forgotpass.php?mode=enter_password"> 
							<h1>Forgot Password</h1>
							<h3 style="font-size: 18px" >Enter your new password</h3>
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="textbox" type="text" name="password" placeholder="Password"><br>
							<input class="textbox" type="text" name="password2" placeholder="Retype Password"><br>
							<br style="clear: both;">
							<button type="submit" class="btn btn-success" value="Next">Next</button>
							<a href="forgotpass.php">
								<input type="button" class="btn btn-secondary" value="Back">
							</a>
							<br><br>
							<div><a href="login1.php">Login</a></div>
						</form>
					<?php
					break;
				
				default:
					break;
			}

		?>


</body>
</html>