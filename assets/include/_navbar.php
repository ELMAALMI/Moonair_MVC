<?php 
$url = explode("/",$_SERVER['REQUEST_URI']);

$act = array('index'=>'','about'=>'','destination'=>'','contact'=>'');
$title = "";
switch($url[3])
{
  case 'index.php'       : $act['index'] = 'active'; $title = 'The official Home'; 
  case ''                : $act['index'] = 'active'; $title = 'The official Home'; break;
  case 'about.php'       : $act['about'] = 'active'; $title = 'About Moonain';break;
  case 'destination.php' : $act['destination'] = 'active'; $title = 'Moonair destination';break;
  case 'contact.php'     : $act['contact'] = 'active'; $title = 'Moonair contact';break;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="icon" type="image/ico" href="imgs/logo/MoonAir.png">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	  <link rel="stylesheet" href="css/animate.css">
	
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css?<?php echo time();?>">
   
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php"><img src="imgs/logo/MoonAir.png" width="130px"></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item <?php echo $act['index'];?>"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item <?php echo $act['about'];?>"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item <?php echo $act['destination'];?>"><a href="destination.php" class="nav-link">Destination</a></li>
	          <li class="nav-item <?php echo $act['contact'];?>"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta"><a href="destination.php?search" class="nav-link">Book Now</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>