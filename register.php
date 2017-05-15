<?php

	session_start();
	//ini_set('display_errors', 1);
	require_once 'Utils/Helpers.php';
	require_once 'Utils/register_handler.php';
	require_once 'Utils/login_handler.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta content="IE=edge" http-equiv="X-UA-Compatible" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="This is my one page resume website." name="description" />
	<meta content="Vipul,Vipul Munot,Munot,Indiana University,Indiana, Indiana University Bloomington,Bloomington,Data Science, Data, Scientist,Data Scientist" name="keywords" />
	<meta content="Vipul Munot" name="author" />
	<title>Login | Eventpal</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- Custom Fonts -->
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" /><!-- Plugin CSS -->
	<link href="css/animate.min.css" rel="stylesheet" type="text/css" /><!-- Custom CSS -->
	<script src="js/modernizr.js"></script>
	<link href="css/style.css" rel="stylesheet" /><!-- Fonts -->
	<link rel="stylesheet" type="text/css" href="css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/register.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesn"t work if you view the page via file:// --><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
<!-- Favicons -->
        <link rel="shortcut icon" href="Images/logo-57x57.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="Images/logo-144x144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="Images/logo-114x114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="Images/logo-72x72.png">
        <link rel="apple-touch-icon-precomposed" href="Images/logo-57x57.png">	
</head>

<body>
<header>
    <!-- Fixed navbar -->
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
		        <a class="navbar-brand animated bounceInLeft" href="index.php"><img src="Images/logo.png" class="img-responsive" alt="Eventpal"></a>
		        <a class="navbar-brand animated bounceInLeft" href="index.php">Eventpal</a>	
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
        
          </ul>
        </div><!--/.nav-collapse -->
      </div>
  </nav>
</header>

<section id ="form">
<div class="clearfix"></div><div class="clearfix"></div><div class="clearfix"></div><div class="clearfix"></div>
<div class="container">
<div class="row">

	<?php   if(isset($_POST['register_button'])) { ?>
				<script>
					$(document).ready(function() {
						$("#first").hide();
						$("#second").show();
					});
				</script>
	<?php  	} ?>

	<div class="wrapper">
		<div class="login_box">
			
			<br>
			<div id="first">
				<form action="register.php" method="POST">
					<input type="email" name="log_email" placeholder="Email Address" value="<?php 
					if(isset($_SESSION['log_email'])) {
						echo $_SESSION['log_email'];
					} 
					?>" required>
					<br>
					<input type="password" name="log_password" placeholder="Password">
					<br>
					<?php 
                        if(in_array("Email or password was incorrect<br>", $error_array)) {
                            echo  "Email or password was incorrect<br>"; 
                        }
                    ?>
					<input type="submit" name="login_button" value="Login">
					<br>
					<a href="#" id="signup" class="signup">Need and account? Register here!</a>
				</form>
			</div>




			<div id="second">

				<form action="register.php" method="POST">
					<input type="text" name="fname" placeholder="First Name*" value="<?php 
					if(isset($_SESSION['fname'])) {
						echo $_SESSION['fname'];
					} 
					?>" required>
					<br>
					
					<?php 
						if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) 
							echo "Your first name must be between 2 and 25 characters<br>"; 
					?>
					
					

					<input type="text" name="lname" placeholder="Last Name*" value="<?php 
					if(isset($_SESSION['lname'])) {
						echo $_SESSION['lname'];
					} 
					?>" required>
					<br>
					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>

					<input type="email" name="reg_email" placeholder="Email*" value="<?php 
					if(isset($_SESSION['reg_email'])) {
						echo $_SESSION['reg_email'];
					} 
					?>" required>
					<br>

					<?php 
                        if(in_array("Email already in use<br>", $error_array)) 
                            echo "Email already in use<br>"; 
				        else if(in_array("Invalid email format<br>", $error_array)) 
                            echo "Invalid email format<br>";
                        else if(in_array("Emails don't match<br>", $error_array)) 
                            echo "Emails don't match<br>"; 
                    ?>


					<input type="password" name="password" placeholder="Password*" required>
					<br>

					<?php 
                        if(in_array("Your passwords do not match<br>", $error_array)) 
                            echo "Your passwords do not match<br>"; 
                        else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) 
                            echo "Your password can only contain english characters or numbers<br>";
                        else if(in_array("Your password must be betwen 5 and 30 characters<br>", $error_array)) 
                            echo "Your password must be betwen 5 and 30 characters<br>"; 
                    ?>

					<input type="text" name="phone" placeholder="Phone Number*">
					<br>

					<input type="text" name="city" placeholder="City">
					<br>

					<input type="text" name="state" placeholder="State">
					<br>	
					<select id="country" name="country" class="dropdown" required >
							<?php
                                $countries = getCountriesList();
                                if(isset($_POST['country'])) {
                                	$defaultKey = $_POST['country'];
                                	$defaultValue = $countries[$_POST['country']];
                                }
                                else {
                                	$defaultKey = "0";
                                	$defaultValue = "(Please select a country)";
                                }
                            ?>

                            <option value ="<?php echo $defaultKey; ?>" selected>
                            	<?php echo $defaultValue; ?>
                            </option>
                            <?php
                                foreach($countries as $key => $value) {
                                    echo '<option value='.$key.'>'.$value.'</option>';
                                }
                            ?>
                    </select>

					<?php 
                        if(in_array("Please select your country<br>", $error_array)) 
                            echo "Please select your country<br>"; 
                    ?>
					<br/>						
					<input type="text" name="zip" placeholder="Zip Code*" required>
					<?php 
                        if(in_array("Your Zip Code must greater than 2 characters<br>", $error_array)) 
                            echo "Your Zip Code must greater than 2 characters<br>"; 
                    ?>
					<br>
					<input type="submit" name="register_button" value="Register">
					<br>

					
					
					<a href="#" id="signin" class="signin">Already have an account? Sign in here!</a>

				</form>
			</div>

		</div>

	</div>

</div></div></section>

<?php
	require 'footer.php';
?>