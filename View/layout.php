<?php

    $act = array('index'=>'','about'=>'','destination'=>'','contact'=>'');
    $title ="";
    $id = "";

    switch($pagename)
    {
      case 'home'        : $act['index'] = 'active'; $title = 'The official Home';$id="ftco-navbar";
      case ''            : $act['index'] = 'active'; $title = 'The official Home';$id="ftco-navbar"; break;
      case 'about'       : $act['about'] = 'active'; $title = 'About Moonain';$id="ftco-navbar";break;
      case 'destination' : $act['destination'] = 'active'; $title = 'Moonair destination';$id="ftco-navbar";break;
      case 'contact'     : $act['contact'] = 'active'; $title = 'Moonair contact';$id="ftco-navbar";break;
      case '404'         : $title = 'ERROR 404';$id="";break;
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/ico" href="assets/imgs/logo/MoonAir.png">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

        <link rel="stylesheet" href="assets//css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">

        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

        <link rel="stylesheet" href="assets/css/aos.css">

        <link rel="stylesheet" href="css/ionicons.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="assets/css/jquery.timepicker.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-free-5.12.1-web/css/all.min.css">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" />


        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/icomoon.css">
        <link rel="stylesheet" href="assets/css/style.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="assets/css/resv-form.css?<?php echo time();?>">

    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light <?php echo $class;?>" id="<?php echo $id;?>">
        <div class="container">
            <a class="navbar-brand" href="home"><img src="assets/imgs/logo/MoonAir.png" width="130px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo $act['index'];?>"><a href="home" class="nav-link">Home</a></li>
                    <li class="nav-item <?php echo $act['about'];?>"><a href="about" class="nav-link">About</a></li>
                    <li class="nav-item <?php echo $act['destination'];?>"><a href="destination" class="nav-link">Destination</a></li>
                    <li class="nav-item <?php echo $act['contact'];?>"><a href="contact" class="nav-link">Contact</a></li>
                    <li class="nav-item cta"><a href="destination?search" class="nav-link">Book Now</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-include page->
    <?php

    echo $contentpage;
    
    ?>

    <!-and->

    <footer class="ftco-footer bg-bottom" style="background-image: url("assets/images/footer-bg.jpg");">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">MOONAIR</h2>
                    <p>MOONAIR loyalty is Project created by EL MAALMI BILLAL and EL OUMARI SOUFYANE</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Infromation</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
                        <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                        <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                        <li><a href="#" class="py-2 d-block">Call Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">download now</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block"><img src="assets/imgs/Icon/google-play-store.png"></a></li>
                        <li><a href="#" class="py-2 d-block"><img src="assets/imgs/Icon/apple-appstore.png"></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+212 654 888 999 </span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">  contact.air@moonair.com</span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Moonair loyalty</a></p>
            </div>
        </div>
    </div>
    </footer>

 

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/lib/jquery.easing.1.3.js"></script>
    <script src="assets/js/lib/jquery.waypoints.min.js"></script>
    <script src="assets/js/lib/jquery.stellar.min.js"></script>
    <script src="assets/js/lib/owl.carousel.min.js"></script>
    <script src="assets/js/lib/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/lib/aos.js"></script>
    <script src="assets/js/lib/jquery.animateNumber.min.js"></script>
    <script src="assets/js/lib/bootstrap-datepicker.js"></script>
    <script src="assets/js/lib/scrollax.min.js"></script>
    <script src="assets/js/lib/main.js"></script>
    
    <script src="assets/js/customJS.js?<?php echo time(); ?>"></script>
    <script src="assets/js/ticket.js?<?php echo time(); ?>"></script>
    </body>
</html>