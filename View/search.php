

    <!-- END nav -->

    <section class="ftco-section">
    	<div class="container">
            
            <form id="msform">
              <!-- progressbar -->
              <ul id="progressbar">
                <li class="fa active">Select Flight</li>
                <li class="fa">Enter Details</li>
                <li class="fa">Pay & confirme</li>
              </ul>
              <!-- fieldsets -->
              <fieldset>
                  <div class="container-resv" id="container_resv" style="opacity: 1;">
                      <div class="previous_btn" id="prev_to_date" style="cursor: pointer;">
                        <i class="fa fa-chevron-left"></i>
                      </div>
                      <div class="available-days-container" id="days-list" data-line="<?php echo $data[1]; ?>" data-way="<?php echo $data[1];?>">
                          <?php
                          
                            $data[0]->DisplayDays($data[2]);
;
                          
                          ?>
                      </div>
                      <div class="next-day" id="next_to" style="cursor: pointer;">
                        <i class="fa fa-chevron-right"></i>
                      </div>
                  </div>
                  <div class="ticket" id="ticket-container">
                      <!--div class="ticket-form">
                          <div class="departure">
                              <div class="country">
                                <img src="imgs/countries/morocco.png">
                              </div>
                              <div class="airport">
                                  <p class="time">17:45</p>
                                  <p class="airp">Fez Saîs</p>
                                  <p class="city">Fez</p>
                              </div>
                          </div>
                          <div class="timing">
                              <div class="icon-timing">
                                  <i class="fa fa-plane-departure"></i>
                                  <p class="flight-time">1 h 35 m</p>
                              </div>
                          </div>
                          <div class="arrival">
                              <div class="airport">
                                  <p class="time">19:00</p>
                                  <p class="airp">Barcelona El-Prat</p>
                                  <p class="city">Barcelona</p>
                              </div>
                              <div class="country">
                                <img src="imgs/countries/spain.png">
                              </div>
                          </div>
                      </div>
                      <div class="ticket-price">
                          <span class="price">$ 129</span><br>
                          <button type="submit">Reserve</button>
                      </div>
                      <div class="btn_close" id="hide-ticket" onclick="hideTicket()"><i class="fa fa-times"></i></div-->
                  </div>
                <input disabled type="button" name="next" class="next action-button" value="Next" style="display: none"/>
              </fieldset>
              <fieldset>
                <h2 class="fs-title">Social Profiles</h2>
                <h3 class="fs-subtitle">Your presence on the social network</h3>
                <input type="text" name="twitter" placeholder="Twitter" />
                <input type="text" name="facebook" placeholder="Facebook" />
                <input type="text" name="gplus" placeholder="Google Plus" />
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="button" name="next" class="next action-button" value="Next" />
              </fieldset>
              <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">We will never sell it</h3>
                <input type="text" name="fname" placeholder="First Name" />
                <input type="text" name="lname" placeholder="Last Name" />
                <input type="text" name="phone" placeholder="Phone" />
                <textarea name="address" placeholder="Address"></textarea>
                <input type="button" name="previous" class="previous action-button" value="Previous" />
                <input type="submit" name="submit" class="submit action-button" value="Submit" />
              </fieldset>
            </form>
            

    	</div>
    </section>
