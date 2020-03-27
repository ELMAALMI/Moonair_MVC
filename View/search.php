<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo ''.$data['from'].' to '.$data['to']; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/ico" href="assets/imgs/logo/MoonAir.png">

        <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">

        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

        <link rel="stylesheet" href="assets/css/aos.css">

        <link rel="stylesheet" href="assets/css/ionicons.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="assets/css/jquery.timepicker.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/icomoon.css">
        <link rel="stylesheet" href="assets/css/style.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="assets/css/steps.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="assets/css/credit-card.css?<?php echo time(); ?>">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light navbar-reservation" id="ftco-navbar">
            <div class="container">
	           <a class="navbar-brand" href="index.html"><img src="assets/imgs/logo/MoonAir.png" width="130px"></a>
	           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	               <span class="oi oi-menu"></span> Menu
	           </button>
               <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo $act['index'];?>"><a href="home" class="nav-link">Home</a></li>
                    <li class="nav-item <?php echo $act['about'];?>"><a href="about" class="nav-link">About</a></li>
                    <li class="nav-item <?php echo $act['destination'];?>"><a href="destination" class="nav-link">Destination</a></li>
                    <li class="nav-item <?php echo $act['contact'];?>"><a href="contact" class="nav-link">Contact</a></li>
                    <li class="nav-item cta"><a href="destination" class="nav-link">Book Now</a></li>
                </ul>
            </div>
	       </div>
	   </nav>
        <!-- END nav -->

        <section class="ftco-section">
            <div class="container">
               <form id="msform" action="" method="POST" name="flightinfo">
                   <!-- progressbar -->
                   <ul id="progressbar">
                       
                       <li class="fa active"> <i class="fa fa-check-circle-o" ></i></li>
                       <li class="fa">Enter Details</li>
                       <li class="fa">Pay & confirme</li>
                   </ul>
                   <!-- fieldsets -->
                   <fieldset>
                       <h2 class="fs-title">1. Select your departing flight from <?php echo ''.$data['from'].' to '.$data['to']; ?></h2>
                       <div class="container-resv" id="container_resv" style="opacity: 1;">
                           <div class="previous_btn" id="prev_to_date" style="cursor: pointer;" onclick="goingPrevious('');">
                               <
                           </div>
                           <div class="available-days-container" id="days-list" data-line="<?php echo $data['airline_info']["line_num"] ?>" data-way="<?php echo $data['airline_info']["line_way"]?>">
                              <?php
                                
                                $data['ticketobj']->DisplayDays($data['ticketobj']->daysUp($data['newdate']),"");

                              ?>
                           </div>
                           <div class="next-day" id="next_to" style="cursor: pointer;" onclick="goingNext('');">
                               >
                           </div>
                       </div>
                       <div class="ticket" id="ticket-container"></div>
                       <?php
                            if($data['resv_me'] == "Return")
                            {
                                echo '<h2 class="fs-title">2. Select your returning flight from '.$data['to'].' to '.$data['from'].'</h2>';
                                echo '<div class="container-resv" id="container_resv_return" style="opacity: 1;">
                                           <div class="previous_btn" id="prev_to_date_return" style="cursor: pointer;" onclick="goingPrevious(\'_return\');">
                                               <i class="fa fa-chevron-left"></i>
                                           </div>
                                    <div class="available-days-container" id="days-list_return" data-line="'.$data['airline_info']["line_num"].'"  data-wayreturn="'.(($data['airline_info']["line_way"] == "forward") ? "reverse" : "forward").'">';
                                
                                $data['returnobj']->DisplayDays($data['returnobj']->daysUp($data['return_date']), "_return");
                                
                                echo '</div>
                                <div class="next-day" id="next_to_return" style="cursor: pointer;" onclick="goingNext(\'_return\');">
                                                <i class="fa fa-chevron-right"></i></div></div>';
                                
                            }
                       ?>
                       <div class="ticket" id="ticket-container-return"></div>
                       <?php
                        
                        if($data['resv_me'] != "Return")
                            echo '<input disabled type="button" name="next" class="next disabled-btn" value="Next"/>';
                       else
                            echo '<input disabled type="button" name="next" class="next disabled-btn-return" value="Next"/>';         
                       ?>
                       <!--input disabled type="button" name="next" class="next disabled-btn" value="Next"/-->
                   </fieldset>
                <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <div class="passangers-details">
                    <div class="passangers-numb">
                        <ul class="passengers-list-nb">
                        </ul>
                    </div>
                </div>
                <input type="button" name="next" class="next action-button" value="Next" />
              </fieldset>

              <fieldset>
                    <div class="payment-title">
                        <h1>Payment Information</h1>
                    </div>
                    <div class="container">
                        <div class="row text-center">
                                <div class="col-md-6">
                                    <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                    <i class="fa fa-credit-card"></i> Credit Card
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                    <i class="fa fa-credit-card"></i> Credit Card
                                    </a>
                                </div>
                        </div>
                    </div>
                       <div class="credit-card-form">
                            <div class="container-credit-card preload">
                            <div class="creditcard">
                                <div class="front">
                                    <div id="ccsingle"></div>
                                    <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                                        <g id="Front">
                                            <g id="CardBackground">
                                                <g id="Page-1_1_">
                                                    <g id="amex_1_">
                                                        <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                                C0,17.9,17.9,0,40,0z" />
                                                    </g>
                                                </g>
                                                <path class="darkcolor greydark" d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z" />
                                            </g>
                                            <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">0123 4567 8910 1112</text>
                                            <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">JOHN DOE</text>
                                            <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">cardholder name</text>
                                            <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">expiration</text>
                                            <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">card number</text>
                                            <g>
                                                <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9">01/23</text>
                                                <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                                                <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                                                <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9 		" />
                                            </g>
                                            <g id="cchip">
                                                <g>
                                                    <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                                            c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z" />
                                                </g>
                                                <g>
                                                    <g>
                                                        <rect x="82" y="70" class="st12" width="1.5" height="60" />
                                                    </g>
                                                    <g>
                                                        <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                                                    </g>
                                                    <g>
                                                        <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                                                c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                                                C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                                                c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                                                c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z" />
                                                    </g>
                                                    <g>
                                                        <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5" />
                                                    </g>
                                                    <g>
                                                        <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5" />
                                                    </g>
                                                    <g>
                                                        <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5" />
                                                    </g>
                                                    <g>
                                                        <rect x="142" y="117.9" class="st12" width="26.2" height="1.5" />
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="Back">
                                        </g>
                                    </svg>
                                </div>
                                <div class="back">
                                    <svg version="1.1" id="cardback" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                                        <g id="Front">
                                            <line class="st0" x1="35.3" y1="10.4" x2="36.7" y2="11" />
                                        </g>
                                        <g id="Back">
                                            <g id="Page-1_2_">
                                                <g id="amex_2_">
                                                    <path id="Rectangle-1_2_" class="darkcolor greydark" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                            C0,17.9,17.9,0,40,0z" />
                                                </g>
                                            </g>
                                            <rect y="61.6" class="st2" width="750" height="78" />
                                            <g>
                                                <path class="st3" d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5
                                        C707.1,246.4,704.4,249.1,701.1,249.1z" />
                                                <rect x="42.9" y="198.6" class="st4" width="664.1" height="10.5" />
                                                <rect x="42.9" y="224.5" class="st4" width="664.1" height="10.5" />
                                                <path class="st5" d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z" />
                                            </g>
                                            <text transform="matrix(1 0 0 1 621.999 227.2734)" id="svgsecurity" class="st6 st7">985</text>
                                            <g class="st8">
                                                <text transform="matrix(1 0 0 1 518.083 280.0879)" class="st9 st6 st10">security code</text>
                                            </g>
                                            <rect x="58.1" y="378.6" class="st11" width="375.5" height="13.5" />
                                            <rect x="58.1" y="405.6" class="st11" width="421.7" height="13.5" />
                                            <text transform="matrix(1 0 0 1 59.5073 228.6099)" id="svgnameback" class="st12 st13">John Doe</text>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                            <div class="form-container">
                            <div class="field-container">
                                <label for="name">Name</label>
                                <input id="name" maxlength="20" type="text">
                            </div>
                            <div class="field-container">
                                <label for="cardnumber">Card Number</label>
                                <span id="generatecard">generate random</span>
                                <input id="cardnumber" type="text" pattern="[0-9]*" inputmode="numeric">
                                <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">

                                </svg>
                            </div>
                            <div class="field-container">
                                <label for="expirationdate">Expiration (mm/yy)</label>
                                <input id="expirationdate" type="text" pattern="[0-9]*" inputmode="numeric">
                            </div>
                            <div class="field-container">
                                <label for="securitycode">Security Code</label>
                                <input id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric">
                            </div>
                        </div>
                       </div>
                   </fieldset>
                </form>
            </div>
        </section>
        <div class="hover_bkgr_fricc">
          <span class="helper"></span>
            <div>
              <div class="popupCloseButton">&times;</div>
                <div class="alert alert-light" role="alert">
                    A simple light alert—check it out!
                </div>
            </div>
        </div>
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

    <script type="text/javascript">var adults = "<?= $data['adults'] ?>";</script>
    <script type="text/javascript">var childs = "<?= $data['childs'] ?>";</script>
    <script src="assets/js/ticket.js?<?php echo time(); ?>"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="assets/js/credit-card.js?<?php echo time(); ?>"></script>
    <script src="assets/js/animation_steps.js?<?php echo time(); ?>"></script>
</body>
</html>
