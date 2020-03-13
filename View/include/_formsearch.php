<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate p-4">
                    <form action="search" method="get" class="search-property-1">
                        <div class="row">
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <label for="#">From</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="ion-ios-search"></span></div>
                                        <input name="from-dest" id="from-destination" type="text" class="form-control" placeholder="Search place" onclick="scrollDownInput(); dropdownList('first');" onkeyup="search_from();" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <label for="#">To</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="ion-ios-search"></span></div>
                                        <input name="to-dest" id="to-destination" type="text" class="form-control" placeholder="Search place" onclick="scrollDownInput(); dropdownList('last');" onkeyup="search_to();" disabled required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <div class="radio-container">
                                        <div class="first-radio">
                                            <input type="radio" id="return" name="resv-method" onclick="showCalendar('return');" required/>
                                            <label for="return">Return</label>
                                        </div>
                                        <div class="second-radio">
                                            <input type="radio" id="one_way" name="resv-method" onclick="showCalendar('one-way');" required/>
                                            <label for="one_way">One Way</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg align-self-end">
                                <div class="form-group">
                                    <div class="form-field">
                                        <input name="submit-resv" type="submit" value="Search" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row resv-row-nd" id="ndRowResv" style="display: none">
                            <div class="col-lg align-items-end" id="depart-div">
                                <div class="form-group">
                                    <label for="#">Depart</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="ion-ios-calendar"></span></div>
                                        <input type="text" class="form-control" id="pick-from" name="pick_from" placeholder="Depart">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg align-items-end" id="return-div" style="display: none">
                                <div class="form-group">
                                    <label for="#">Return</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="ion-ios-calendar"></span></div>
                                        <input type="text" class="form-control" id="pick-to" name="pick_to" placeholder="Return">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <label for="#">Passangers</label>
                                    <div class="form-field">
                                        <div class="passengers-type">
                                            <div class="adults">
                                                <label>Adults</label>
                                                <select name="adult-nb" class="adult-passengers form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="childs">
                                                <label>Child</label>
                                                <select name="child-nb" class="child-passengers form-control">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hide-btn" id="hide-btn" onclick="btnHide('#ndRowResv');">Hide <i class="fa fa-chevron-circle-up"></i></div>
                        </div>
                    </form>
                </div>
                <div class="dropdown-pin" style="display: none"></div>
                <div class="airport_list flying_from" style="display: none">
                    <h3 class="airport_list_title">Type your airport city</h3>
                    <a class="btn_close" onclick="btnHide('.flying_from');">Close <i class="fa fa-times-circle"></i></a>
                    <ul class="city-chooser" id="flying-from">
                    </ul>
                </div>
                <div class="airport_list flying_to" style="display: none">
                    <h3 class="airport_list_title">Type your airport city</h3>
                    <a class="btn_close" onclick="btnHide('.flying_to');">Close <i class="fa fa-times-circle"></i></a>
                    <ul class="city-chooser" id="flying-to">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>