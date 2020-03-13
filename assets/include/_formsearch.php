<section class="ftco-section ftco-no-pb ftco-no-pt" name = "search">
    	<div class="container">
	    	<div class="row">
					<div class="col-md-12">

					<div class="search-wrap-1 ftco-animate p-4">
							<form action="#" class="search-property-1">
		        		<div class="row">
		        			<div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">From</label>
		          				<div class="form-field">
				                        <input type="text" class="form-control" placeholder="Search place" id="form1">
										<div id="search">
											<div class="pin"></div>
											<div class="title-bar">
											<label class="title">Search Result</label>
											<label class="close" id="close">x</label>
											<?php
											
											$city = array("Fes","Paris","Barcalona","Meknes","Fes","Paris","Barcalona","Meknes","Fes","Paris","Barcalona","Meknes");
											?>
											<ol id='list' class="search-bar"> 
												<?php foreach( $city as $con){ ?>
												<li><a data-country="Fes"><img src="imgs/Icon/icons8-airplane-mode-on-50.png" width= "25px">  <?php echo $con; ?></a></li> 
												<?php } ?>

											</ol>
											</div>
										</div>
									</div>
			                     </div>
		        			</div>
                            <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">To</label>
		          				<div class="form-field">
		          					<div class="icon"><span class="ion-ios-search"></span></div>
				                        <input type="text" class="form-control" placeholder="Search place">
										<div id="search2">
											<div class="pin"></div>
											<div class="title-bar">
											<label class="title">Search Result</label>
											<label class="close">x</label>
											
											<ol id='list' class="search-bar"> 
												<li class="animals">Cat</li> 
												<li class="animals">Dog</li> 
												<li class="animals">Elephant</li> 
												<li class="animals">Fish</li> 
												<li class="animals">Gorilla</li> 
												<li class="animals">Monkey</li> 
												<li class="animals">Turtle</li> 
												<li class="animals">Whale</li> 
												<li class="animals">Aligator</li> 
												<li class="animals">Donkey</li> 
												<li class="animals">Horse</li>
												<li class="animals">Aligator</li> 
												<li class="animals">Donkey</li> 
												<li class="animals">Horse</li>
												<li class="animals">Aligator</li> 
												<li class="animals">Donkey</li> 
												<li class="animals">Horse</li> 
											</ol>
											</div>
										</div>
									</div>
			                     </div>
		        			</div>

                            <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<div class="radio-container">
                                        <div class="first-radio">
                                          <input type="radio" id="windows" name="os" />
                                          <label for="windows">Return</label>
                                        </div>
                                        <div class="second-radio">
                                          <input type="radio" id="mac" name="os" />
                                          <label for="mac">One Way</label>
                                        </div>
                                    </div>
			                     </div>
		        			</div>
		        			<div class="col-lg align-items-end" style="display: none">
		        				<div class="form-group">
		        					<label for="#">Check-out date</label>
		        					<div class="form-field">
		          					<div class="icon"><span class="ion-ios-calendar"></span></div>
				                <input type="text" class="form-control checkout_date" placeholder="Check Out Date">
				              </div>
			              </div>
		        			</div>
		        			<div class="col-lg align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Search" class="form-control btn btn-primary">
				              </div>
			             	 </div>
		        			</div>
		        		</div>
		        	</form>
		          </div>
				</div>
	    	</div>
	    </div>
    </section>
