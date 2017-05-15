<?php
	
	session_start();
	//ini_set('display_errors', 1); 
	require_once 'Constants.php';
	require 'member_header.php';
	require_once 'Utils/DatabaseUtil.php';
	require_once 'Utils/Helpers.php';
	require 'Utils/settings_handler.php';
?>
	
<link href="css/register_style.css" rel="stylesheet" /><!-- Fonts -->

<section id ="settings">
	<div class="container">
		<div class="clearfix">&nbsp;</div>

		<?php
			$member = getMemberDetailsByEMail($_SESSION['EMail']);
			if($member == -1) {
				header("Location: register.php");
			}
		?>

		<div class="row">
			<div class="wrapper">
				<div class="login_box">

					<a href = "profile.php?memberid=<?php echo $_SESSION['MemberId']; ?>"> 
						<h3 class="text-center">Visit your Profile Page</h3>
					</a>
					<br>
					
					<h4 class="text-center">Update your personal information</h4>

					<form action="settings.php" method="POST" enctype="multipart/form-data">
						<?php //displayPost(); displaySession(); ?>

						First Name:
						<input type="text" name="fname" placeholder="First Name" 
							value="<?php 
								if(isset($_SESSION['FirstName'])) {
									echo $_SESSION['FirstName'];
								} 
							?>" 
							required>
						<br>
						<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
						
						

						Last Name:
						<input type="text" name="lname" placeholder="Last Name*" 
							value="<?php 
								if(isset($_SESSION['LastName'])) {
									echo $_SESSION['LastName'];
								} 
							?>" required>
						<br>
						<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>



						Email:
						<input type="email" name="reg_email" placeholder="Email" readonly="readonly" 
							value="<?php 
								if(isset($_SESSION['EMail'])) {
									echo $_SESSION['EMail'];
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



						Phone:
						<input type="text" name="phone" placeholder="Phone Number" 
							value ="<?php 
								if(isset($member->Phone)) {
									echo $member->Phone;
								} 
							?>" >
						<br>

						Street:
						<input type="text" name="street" placeholder="Street" 
							value="<?php 
								if(isset($member->Address->Street)) {
									echo $member->Address->Street;
								}
							?>">
						<br>
						City:
						<input type="text" name="city" placeholder="City" 
							value="<?php 
								if(isset($member->Address->City)) {
									echo $member->Address->City;
								}
							?>">
						<br>
						State:
						<input type="text" name="state" placeholder="State" 
							value="<?php 
								if(isset($member->Address->State)) {
									echo $member->Address->State;
								} 
							?>">
						<br>
						Country:
						<input type="text" name="country" placeholder="Country" 
							value="<?php 
								if(isset($member->Address->Country)) {
									echo $member->Address->Country;
								} 
							?>">
						<br>
						Zip:
						<input type="text" name="zip" placeholder="Zip" 
							value="<?php 
								if(isset($member->Address->Zip)) {
									echo $member->Address->Zip;
								} 
							?>">
						<br>
						Bio:
						<input type="text" name="bio" placeholder="Bio" 
							value="<?php 
								if(isset($member->Bio)) {
									echo $member->Bio;
								} 
							?>">
						<br>
						TwitterUrl:
						<input type="text" name="twitterUrl" placeholder="TwitterUrl" 
							value="<?php 
								if(isset($member->TwitterUrl)) {
									echo $member->TwitterUrl;
								} 
							?>">
						<br>
						FacebookUrl:
						<input type="text" name="fburl" placeholder="Add your Facebook Page" 
							value="<?php 
								if(isset($member->FacebookUrl)) {
									echo $member->FacebookUrl;
								} 
							?>">
						<br>

						<p class="pull-left">Profile Picture: &nbsp;</p>
						<input type="file" name="fileToUpload" id="fileToUpload">

						<br>

						<?php echo $message; ?>					

						<input type="submit" name="update_details" id="save_details" value="Update Details" class="info settings_submit"><br>
						


					</form>	
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	require 'footer.php';
?>