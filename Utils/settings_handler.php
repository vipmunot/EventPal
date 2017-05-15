<?php  
	
	//ini_set('display_errors', 1);
	require 'Constants.php';

	$target_dir = "Images/Members/";
	$uploadOk = 1;		

	$conn = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD, DATABASE_NAME);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	if(isset($_POST['update_details'])) {
		// Image Upload
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
array_push($error_array, "File is not an image.<br>");
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
array_push($error_array, "Sorry, file already exists.<br>");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
array_push($error_array, "Sorry, your file is too large.<br>");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
array_push($error_array, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>");
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
array_push($error_array, "Sorry, your file was not uploaded.<br>");
// if everything is ok, try to upload file
} 

else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	chmod($target_file, 0755);
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
array_push($error_array, "Sorry, there was an error uploading your file.<br>");
    }
}

		
		
		//First name
		$fname = strip_tags(mysqli_real_escape_string($conn, $_POST['fname'])); //Remove html tags
		$fname = ucfirst(strtolower($fname)); //Uppercase first letter

		//Last name
		$lname = strip_tags(mysqli_real_escape_string($conn, $_POST['lname'])); //Remove html tags
		$lname = ucfirst(strtolower($lname)); //Uppercase first letter	
		
		//Phone Number
		$phone = strip_tags(mysqli_real_escape_string($conn, $_POST['phone'])); //Remove html tags
		$phone = str_replace(' ', '', $phone); //remove spaces
		
		//Bio
		$bio = strip_tags(mysqli_real_escape_string($conn, $_POST['bio'])); //Remove html tags
		$bio = ucfirst($bio); //Uppercase first letter	
		
		//Street
		$street = strip_tags(mysqli_real_escape_string($conn, $_POST['street'])); //Remove html tags
		$street = ucfirst($street); //Uppercase first letter

		//City
		$city = strip_tags(mysqli_real_escape_string($conn, $_POST['city'])); //Remove html tags
		$city = ucfirst($city); //Uppercase first letter

		//State
		$state = strip_tags(mysqli_real_escape_string($conn, $_POST['state'])); //Remove html tags
		$state = ucfirst($state); //Uppercase first letter

		//Country
		$country = strip_tags(mysqli_real_escape_string($conn, $_POST['country'])); //Remove html tags
		
		//Zip
		$zip = strip_tags(mysqli_real_escape_string($conn, $_POST['zip'])); //Remove html tags
		$zip = str_replace(' ', '', $zip); //remove spaces
		
		//Facebook Url
		$fburl = strip_tags(mysqli_real_escape_string($conn, $_POST['fburl'])); //Remove html tags
		$fburl = str_replace(' ', '', $fburl); //remove spaces
		$fburl = strtolower($fburl);
		
		//Twitter Url
		$twitterUrl = strip_tags(mysqli_real_escape_string($conn, $_POST['twitterUrl'])); //Remove html tags
		$twitterUrl = str_replace(' ', '', $twitterUrl); //remove spaces
		$twitterUrl = strtolower($twitterUrl);
		
		//email
		$email = strip_tags(mysqli_real_escape_string($conn, $_POST['reg_email'])); //Remove html tags
		$email = str_replace(' ', '', $email); //remove spaces
		$email = strtolower($email); //Lower case everything	
		$email_check = mysqli_query($conn, "SELECT * FROM Member WHERE EMail='$email'");
		$row = mysqli_fetch_array($email_check);	
		
		if(strcmp($row['EMail'], $_SESSION['EMail']) == 0) {
			$query = mysqli_query($conn, "
				UPDATE Member 
				SET FirstName='$fname', 
					LastName='$lname', 
					Phone = '$phone',
					Bio = '$bio',
					Street = '$street',
					City = '$city',
					State = '$state',
					Country = '$country',
					Zip = '$zip',
					FacebookUrl='$fburl',
					TwitterUrl = '$twitterUrl',
					ImagePath = '$target_file'
				WHERE EMail='$email'
			");
			
			$_SESSION['FirstName'] = $fname;
			$_SESSION['LastName'] = $lname;
			$_SESSION['Phone'] = $phone;
			$_SESSION['Bio'] = $bio;
			$_SESSION['Street'] = $street;
			$_SESSION['City'] = $city;
			$_SESSION['State'] = $state;
			$_SESSION['Country'] = $country;
			$_SESSION['Zip'] = $zip;
			$_SESSION['FacebookUrl'] = $fburl;
			$_SESSION['TwitterUrl'] = $twitterUrl;
			$_SESSION['ImagePath'] = $target_file;
			
			$message = "Details updated!<br><br>";
			
		}
		else {
			$message = "You can't edit your email id.";
		}	
		echo "<br>" . $message + "<br>";
	}

?>