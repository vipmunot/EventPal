<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$mail_to = "vipmunot@gmail.com";
$subject = $name . " from Eventpal website Reaching Out";
$email_msg = $name . " is reaching out on behalf of eventpal. The person is email is:" . $visitor_email . " The person has send following message for you:\n" . $message;
$headers .= 'Cc: rohitnair987@gmail.com' . "\r\n";
$headers .= 'Cc: shruthi2811@gmail.com' . "\r\n";
mail($mail_to,$subject,$email_msg,$headers);
$a =  "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
echo "<script type='text/javascript'>alert('$a');window.location.href='register.php';</script>";


?>