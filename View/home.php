
    <!-- END nav -->
    <?php  ?>
    <div class="hero-wrap js-fullheight" id="slideshow" style="background-image: url('assets/imgs/Slideshow/Wall-1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Fly The Friendly Skies</h1>
          </div>
        </div>
      </div>
    </div>

	<?php include "include/_formsearch.php";?>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">TOP OFFRE IN 2020</h2>
          </div>
		</div>
        <div class="row">
            <?php foreach ($data['offre'] as $fl) {?>
        	<div class="col-md-3 ftco-animate">
        		<div class="project-destination">
        			<a href="#" class="img" style="background-image: url('assets/imgs/City/<?php echo $fl['wallpaper'];?>');">
        				<div class="text">
        					<h3><?php echo $fl['city'];?></h3>
        					<span><?php echo $fl['price_pct'];?>  %</span>
        				</div>
        			</a>
        		</div>
			</div>
            <?php } ?>
    	</div>
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Tour Destination</h2>
          </div>
        </div>
        <div class="row">
            <?php foreach ($data['flight'] as $all) {?>
        	<div class="col-md-4 ftco-animate">
        		<div class="project-wrap">
        			<a href="<?php echo $all[''];?>" class="img" style="background-image: url('assets/imgs/images/destination-1.jpg');"></a>
        			<div class="text p-4">
        				<span class="price"><?php echo $all['price'];?> $ - PER</span>
        				<span class="days"><span class="flaticon-route"></span> MOROCCO</span>
        				<h3><a href="#"><span class="flaticon-route"></span><?php echo $all['city'].",".$all['country'] ?></a></h3>
        				<p class="location"><span class="ion-ios-map"></span>MOROCCO ==>  <?php echo$all['country'] ?></p>
        			</div>
        		</div>
			</div>
            <?php } ?>
    	</div>
    </section>

    <section class="ftco-counter img" id="section-counter">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex">
    				<div class="img d-flex align-self-stretch" style="background-image:url('assets/imgs/images/about.jpg');"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate fadeInUp ftco-animated">
		            <h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
		            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
		          </div>
		        </div>
		    		<div class="row">
		          <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center mb-4">
		              <div class="text">
		                <strong class="number" data-number="7500">7.500</strong>
		                <span>Flights</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center mb-4">
		              <div class="text">
		                <strong class="number" data-number="120">+120</strong>
		                <span>Countries</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-4 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center mb-4">
		              <div class="text">
		                <strong class="number" data-number="18000">18.000</strong>
		                <span>Travelers</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
	</section>

    <!----------------------------------------------------->
    <section class="quality">
      <div class="main_title text-center">
        <h1 class="text-center">  Get more from our great flight options </h1>
      </div>
      <div class="container marketing" style="margin-top: 70px;">
        <!-- Three columns of text below the carousel -->
        <div class="row text-center" >
          
          <div class="col-lg-4 ">
            <img class="rounded-circle" src="assets/imgs/Icon/bagage_0_0.png" alt="Generic placeholder image" width="50" height="50">
            <h3>Pre-book your baggage</h3>
            <p class="text-justify">
              Pre-book your baggage allowance now and save up to 90% of baggage charges paid at the airport.</p>
            <p><a  href="#" role="button">Find out more...</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="assets/imgs/Icon/seat-icon.png" alt="Generic placeholder image" width="50" height="50">
            <h3>Reserve your Great seat!</h3>
            <p class="text-justify">What will it be, window or aisle? Select your preferred seat prior to your flight and guarantee that it is reserved for you.</p>
            <p><a  href="#" role="button">Find out more...</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="assets/imgs/Icon/insurane-icon_0.png" alt="Generic placeholder image" width="50" height="50">
            <h3>Enjoy stress-free travel</h3>
            <p class="text-justify"> Travel stress-free by getting covered for flight modification, cancellation, accident & medical treatments</p>
            <p><a  href="#" role="button">Find out more...</a></p>
          </div>
        </div>
        <hr class="featurette-divider">
      </div>
    </section>
    <section style="font-family: MoonAir;">
        <div class="container marketing" style="margin-top: 70px;">

        <div class="row featurette text-center">
          <div class="col-md-7">
            <h2 class="featurette-heading">55
              AIRCRAFT<span class="text-muted"></span></h2>
            <p class="lead text-justify">We operate a total fleet of 55 Airbus A320 and A321 Neo LR Aircraft. All aircraft cabin interiors are fitted with world-class comfort seats, offering one of the most spacious economy cabin seat pitch.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto"  alt="500x500" style="width: 300px; height: 300px;" src="assets/imgs/fly/airplane-flight-sunset.jpg">
          </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette text-center">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">170+ DESTINATIONS</h2>
            <p class="lead">We fly you to over 170 destinations spread across the Middle East, North Africa, Asia and Europe.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto"  alt="500x500" src="assets/imgs/fly/Hubs_400x400px_2.jpg" style="width: 300px; height: 300px;">
          </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette text-center">
          <div class="col-md-7">
            <h2 class="featurette-heading ">50 + COUNTRIES</span></h2>
            <p class="lead text-justify">We offer comfort, reliability and value for money air travel across our network in 50 countries. Our priority is to provide best possible connections to our passengers at suitable timings</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto"  alt="500x500" src="assets/imgs/fly//Routes_400x400px_1.jpg" style="width: 300px; height: 300px;">
          </div>
        </div>
        <hr class="featurette-divider">
      </div>
      </div>
    </section>
    <!-------------------------------------------Success------------------------------------>
    <section class="ourteam">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <h2 class="mb-4"><img src="assets/imgs/logo/MoonAir.png" width="68%"></h2>
      </div>
    </section>

