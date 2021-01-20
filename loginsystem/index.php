<?php session_start();
require_once('dbconnection.php');

//Code for Registration 

if(isset($_POST['signup']))
{
	$first=$_POST['first'];
	$last=$_POST['last'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];

	$sql=mysqli_query($conn,"SELECT id FROM users WHERE email='$email'");
	$row=mysqli_num_rows($sql);
	if($row>0)
	{
		echo "<script>alert('Email id already exist with another account. Please try again !!!');</script>";
	} else{
		$sql=mysqli_query($conn,"INSERT INTO users(first,last,email,pwd) VALUES('$first','$last','$email','$pwd')");

		if($sql)
		{
			echo "<script>alert('Register successfully');</script>";
		}
	}
}

// Code for login 

if(isset($_POST['login'])){
	$mypassword=$_POST['pwd'];
	$dec_password=$mypassword;
	$my_email=$_POST['email'];

	$rt= mysqli_query($conn,"SELECT * FROM users WHERE email='$my_email' and pwd='$dec_password'");
	$num=mysqli_fetch_array($rt);
	if($num>0)
	{
		$extra="welcome.php";
		$_SESSION['login']=$_POST['email'];
		$_SESSION['id']=$num['id'];
		$_SESSION['name']=$num['first'];

		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
	else
	{
		echo "<script>alert('Invalid username or password');</script>";
		$extra="index.php";
		$host  = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration & Login System</title>
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Login Forms,Sign up Forms,Registration Forms,Elements,Contact"./>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default',       
			width: 'auto', 
			fit: true 
		});
	}); 
</script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
	<div class="main">
		<h1>Registration and Login System</h1>
		<div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">

					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><div class="top-img"><img src="images/top-note.png" alt=""/></div><span>Register</span></li>

					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><div class="top-img"><img src="images/top-lock.png" alt=""/></div><span>Login</span></li>

					<li class="resp-tab-item lost" aria-controls="tab_item-2" role="tab"><div class="top-img"><img src="images/top-key.png" alt=""/></div><span>Contact</span></li>

					<div class="clear"></div>
				</ul>	

				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<div class="lst">
							<div class="register">
								<form name="registration" method="post" action="" enctype="multipart/form-data">
									<p>First Name </p>
									<input type="text" class="text" value=""  name="first" required >
									<p>Last Name </p>
									<input type="text" class="text" value="" name="last"  required >
									<p>Email Address </p>
									<input type="text" class="text" value="" name="email"  >
									<p>Password </p>
									<input type="password" value="" name="pwd" required>
									<div class="sign-up">
										<input type="reset" value="Reset">
										<input type="submit" name="signup"  value="Sign Up" >
										<div class="clear"> </div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="lst">
							<div class="login">
								<form name="login" action="" method="post">
									<input type="text" class="text" name="email" value="" placeholder="Enter your registered email"  ><a href="#" class=" icon email"></a>
									<input type="password" value="" name="pwd" placeholder="Enter valid password"><a href="#" class=" icon lock"></a>

									<div class="p-container">
										<div class="submit two">
											<input type="submit" name="login" value="Log In" >
										</div>
										<div class="clear"> </div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="lst">
							<div class="cntct">
								<h1>Contact Us</h1>
								<ul class="social-icons">
									<li><div class="top-img"><img src="images/lin.png"alt=""/></div><span>Linkedin</span></li>
									<li><div class="top-img"><img src="images/ph.png" alt=""/></div><span>Phone</span></li>
									<li><div class="top-img"><img src="images/ml.png" alt=""/></div><span>Mail</span></li>
								</ul>
							</div>           	      
						</div>	
					</div>	
				</div>
			</div>
		</div>
	</body>
	</html>