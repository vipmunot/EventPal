<?php
  //ini_set('display_errors', 1);
  session_start();
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
	<title>Welcome | Eventpal</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- Custom Fonts -->
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" /><!-- Plugin CSS -->
	<link href="css/animate.min.css" rel="stylesheet" type="text/css" /><!-- Custom CSS -->
	<script src="js/modernizr.js"></script>
	<link href="css/style.css" rel="stylesheet" /><!-- Fonts -->
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
		        <a class="navbar-brand animated bounceInLeft" href="members.php"><img src="Images/logo.png" class="img-responsive" alt="Eventpal"></a>
		        <a class="navbar-brand animated bounceInLeft" href="members.php">Eventpal</a>	
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><img 
                  src="<?php echo $_SESSION['ImagePath'];?>" 
                  alt="Profile Picture" 
                  style="padding-top:6px;width:28px; height:28px;"
				  class = "img-responsive center-block"
                >
            </li>
            <li><a href="members.php"><?php echo $_SESSION['FirstName']; ?></a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="create_event.php">Create Event</a></li>
            <li><a href="settings.php">My Settings</a></li>
            <li><a href="myevents.php">My Events</a></li>            
	    <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
  </nav>
</header>
<body>