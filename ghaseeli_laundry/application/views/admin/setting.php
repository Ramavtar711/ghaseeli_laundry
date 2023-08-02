<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>

    <div class="main-content">
        <?php include('include/header_bar.php');
          include('include/header_image.php');
  
        ?>
     
   
    
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Settings</h3>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-3 pl-5">
                            <div class="nav-wrapper settings">
                                <ul class="nav navbar-nav nav-pills setting nav-fill" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-left  active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="fa fa-user mr-2"></i> OTP Verification </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="fas fa-money-bill-alt mr-2"></i> Currency </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-13-tab" data-toggle="tab" href="#tab-13" role="tab" aria-controls="tabs-icons-text-13" aria-selected="false"><i class="fas fa-map-pin mr-2"></i> Map </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-12-tab" data-toggle="tab" href="#tab-12" role="tab" aria-controls="tabs-icons-text-12" aria-selected="false"><i class="fa fa-map-marker-alt mr-2"></i> Address </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="fa fa-bell mr-2"></i> Push Notification </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tabs-icons-text-4" aria-selected="false"><i class="far fa-envelope mr-2"></i> Email Settings </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-5-tab" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tabs-icons-text-5" aria-selected="false"><i class="fas fa-sms mr-2"></i> SMS Gateway </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-6-tab" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tabs-icons-text-6" aria-selected="false"><i class="far fa-credit-card mr-2"></i> Payment Gateway </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-7-tab" data-toggle="tab" href="#tab-7" role="tab" aria-controls="tabs-icons-text-7" aria-selected="false"><i class="fa fa-gavel mr-2"></i> Terms Of Use </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-8-tab" data-toggle="tab" href="#tab-8" role="tab" aria-controls="tabs-icons-text-8" aria-selected="false"><i class="fa fa-lock mr-2"></i> Privacy Policy </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-9-tab" data-toggle="tab" href="#tab-9" role="tab" aria-controls="tabs-icons-text-9" aria-selected="false"><i class="fa fa-cube mr-2"></i> App Settings </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-10-tab" data-toggle="tab" href="#tab-10" role="tab" aria-controls="tabs-icons-text-10" aria-selected="false"><i class="fa fa-image mr-2"></i> Admin Settings </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-left " id="tabs-icons-text-11-tab" data-toggle="tab" href="#tab-11" role="tab" aria-controls="tabs-icons-text-11" aria-selected="false"><i class="fa fa-id-card mr-2"></i> License </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-9 mt-3 pr-6">
                                                                                    <div class="card shadow settings-main-body">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <!-- OTP Verification --->
                                        <div class="tab-pane fade active show" id="tab-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/otp" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">OTP Verification</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="verify_user">Verification </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="verify_user" name="verify_user" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="verify_user_sms">SMS </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="verify_user_sms" name="verify_user_sms" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="verify_user_mail">Email </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="verify_user_mail" name="verify_user_mail" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>

                                        <!-- currency --->
                                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/currency" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Currency</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">Select Currency</label>
                                                    <div class="col-sm-9 w-75">
                                                        <select class="form-control select2" dir="" name="currency" id="currency" >
                                                                                                                            <option value="ALL"  >Leke (Lek - ALL)</option>
                                                                                                                            <option value="USD"  >Dollars ($ - USD)</option>
                                                                                                                            <option value="AFN"  >Afghanis (؋ - AFN)</option>
                                                                                                                            <option value="ARS"  >Pesos ($ - ARS)</option>
                                                                                                                            <option value="AWG"  >Guilders (Afl - AWG)</option>
                                                                                                                            <option value="AUD"  >Dollars ($ - AUD)</option>
                                                                                                                            <option value="AZN"  >New Manats (₼ - AZN)</option>
                                                                                                                            <option value="BSD"  >Dollars ($ - BSD)</option>
                                                                                                                            <option value="BBD"  >Dollars ($ - BBD)</option>
                                                                                                                            <option value="BYR"  >Rubles (p. - BYR)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="BZD"  >Dollars (BZ$ - BZD)</option>
                                                                                                                            <option value="BMD"  >Dollars ($ - BMD)</option>
                                                                                                                            <option value="BOB"  >Bolivianos ($b - BOB)</option>
                                                                                                                            <option value="BAM"  >Convertible Marka (KM - BAM)</option>
                                                                                                                            <option value="BWP"  >Pula (P - BWP)</option>
                                                                                                                            <option value="BGN"  >Leva (Лв. - BGN)</option>
                                                                                                                            <option value="BRL"  >Reais (R$ - BRL)</option>
                                                                                                                            <option value="GBP"  >Pounds (£
 - GBP)</option>
                                                                                                                            <option value="BND"  >Dollars ($ - BND)</option>
                                                                                                                            <option value="KHR"  >Riels (៛ - KHR)</option>
                                                                                                                            <option value="CAD"  >Dollars ($ - CAD)</option>
                                                                                                                            <option value="KYD"  >Dollars ($ - KYD)</option>
                                                                                                                            <option value="CLP"  >Pesos ($ - CLP)</option>
                                                                                                                            <option value="CNY"  >Yuan Renminbi (¥ - CNY)</option>
                                                                                                                            <option value="COP"  >Pesos ($ - COP)</option>
                                                                                                                            <option value="CRC"  >Colón (₡ - CRC)</option>
                                                                                                                            <option value="HRK"  >Kuna (kn - HRK)</option>
                                                                                                                            <option value="CUP"  >Pesos (₱ - CUP)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="CZK"  >Koruny (Kč - CZK)</option>
                                                                                                                            <option value="DKK"  >Kroner (kr - DKK)</option>
                                                                                                                            <option value="DOP "  >Pesos (RD$ - DOP )</option>
                                                                                                                            <option value="XCD"  >Dollars ($ - XCD)</option>
                                                                                                                            <option value="EGP"  >Pounds (£ - EGP)</option>
                                                                                                                            <option value="SVC"  >Colones ($ - SVC)</option>
                                                                                                                            <option value="GBP"  >Pounds (£ - GBP)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="FKP"  >Pounds (£ - FKP)</option>
                                                                                                                            <option value="FJD"  >Dollars ($ - FJD)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="GHC"  >Cedis (GH₵ - GHC)</option>
                                                                                                                            <option value="GIP"  >Pounds (£ - GIP)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="GTQ"  >Quetzales (Q - GTQ)</option>
                                                                                                                            <option value="GGP"  >Pounds (£ - GGP)</option>
                                                                                                                            <option value="GYD"  >Dollars ($ - GYD)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="HNL"  >Lempiras (L - HNL)</option>
                                                                                                                            <option value="HKD"  >Dollars ($ - HKD)</option>
                                                                                                                            <option value="HUF"  >Forint (Ft - HUF)</option>
                                                                                                                            <option value="ISK"  >Kronur (kr - ISK)</option>
                                                                                                                            <option value="INR"  selected>Rupees (₹ - INR)</option>
                                                                                                                            <option value="IDR"  >Rupiahs (Rp - IDR)</option>
                                                                                                                            <option value="IRR"  >Rials (﷼ - IRR)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="IMP"  >Pounds (£ - IMP)</option>
                                                                                                                            <option value="ILS"  >New Shekels (₪ - ILS)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="JMD"  >Dollars (J$ - JMD)</option>
                                                                                                                            <option value="JPY"  >Yen (¥ - JPY)</option>
                                                                                                                            <option value="JEP"  >Pounds (£ - JEP)</option>
                                                                                                                            <option value="KZT"  >Tenge (₸ - KZT)</option>
                                                                                                                            <option value="KPW"  >Won (₩ - KPW)</option>
                                                                                                                            <option value="KRW"  >Won (₩ - KRW)</option>
                                                                                                                            <option value="KGS"  >Soms (Лв - KGS)</option>
                                                                                                                            <option value="LAK"  >Kips (	₭ - LAK)</option>
                                                                                                                            <option value="LVL"  >Lati (Ls - LVL)</option>
                                                                                                                            <option value="LBP"  >Pounds (£ - LBP)</option>
                                                                                                                            <option value="LRD"  >Dollars ($ - LRD)</option>
                                                                                                                            <option value="CHF"  >Switzerland Francs (CHF - CHF)</option>
                                                                                                                            <option value="LTL"  >Litai (Lt - LTL)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="MKD"  >Denars (Ден
 - MKD)</option>
                                                                                                                            <option value="MYR"  >Ringgits (RM - MYR)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="MUR"  >Rupees (₹ - MUR)</option>
                                                                                                                            <option value="MXN"  >Pesos ($ - MXN)</option>
                                                                                                                            <option value="MNT"  >Tugriks (₮ - MNT)</option>
                                                                                                                            <option value="MZN"  >Meticais (MT - MZN)</option>
                                                                                                                            <option value="NAD"  >Dollars ($ - NAD)</option>
                                                                                                                            <option value="NPR"  >Rupees (₹ - NPR)</option>
                                                                                                                            <option value="ANG"  >Guilders (ƒ - ANG)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="NZD"  >Dollars ($ - NZD)</option>
                                                                                                                            <option value="NIO"  >Cordobas (C$ - NIO)</option>
                                                                                                                            <option value="NGN"  >Nairas (₦ - NGN)</option>
                                                                                                                            <option value="KPW"  >Won (₩ - KPW)</option>
                                                                                                                            <option value="NOK"  >Krone (kr - NOK)</option>
                                                                                                                            <option value="OMR"  >Rials (﷼ - OMR)</option>
                                                                                                                            <option value="PKR"  >Rupees (₹ - PKR)</option>
                                                                                                                            <option value="PAB"  >Balboa (B/. - PAB)</option>
                                                                                                                            <option value="PYG"  >Guarani (Gs - PYG)</option>
                                                                                                                            <option value="PEN"  >Nuevos Soles (S/. - PEN)</option>
                                                                                                                            <option value="PHP"  >Pesos (Php - PHP)</option>
                                                                                                                            <option value="PLN"  >Zlotych (zł - PLN)</option>
                                                                                                                            <option value="QAR"  >Rials (﷼ - QAR)</option>
                                                                                                                            <option value="RON"  >New Lei (lei - RON)</option>
                                                                                                                            <option value="RUB"  >Rubles (₽ - RUB)</option>
                                                                                                                            <option value="SHP"  >Pounds (£ - SHP)</option>
                                                                                                                            <option value="SAR"  >Riyals (﷼ - SAR)</option>
                                                                                                                            <option value="RSD"  >Dinars (ع.د - RSD)</option>
                                                                                                                            <option value="SCR"  >Rupees (₹ - SCR)</option>
                                                                                                                            <option value="SGD"  >Dollars ($ - SGD)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="SBD"  >Dollars ($ - SBD)</option>
                                                                                                                            <option value="SOS"  >Shillings (S - SOS)</option>
                                                                                                                            <option value="ZAR"  >Rand (R - ZAR)</option>
                                                                                                                            <option value="KRW"  >Won (₩ - KRW)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="LKR"  >Rupees (₹ - LKR)</option>
                                                                                                                            <option value="SEK"  >Kronor (kr - SEK)</option>
                                                                                                                            <option value="CHF"  >Francs (CHF - CHF)</option>
                                                                                                                            <option value="SRD"  >Dollars ($ - SRD)</option>
                                                                                                                            <option value="SYP"  >Pounds (£ - SYP)</option>
                                                                                                                            <option value="TWD"  >New Dollars (NT$ - TWD)</option>
                                                                                                                            <option value="THB"  >Baht (฿ - THB)</option>
                                                                                                                            <option value="TTD"  >Dollars (TT$ - TTD)</option>
                                                                                                                            <option value="TRY"  >Lira (TL - TRY)</option>
                                                                                                                            <option value="TRL"  >Liras (₺ - TRL)</option>
                                                                                                                            <option value="TVD"  >Dollars ($ - TVD)</option>
                                                                                                                            <option value="UAH"  >Hryvnia (₴ - UAH)</option>
                                                                                                                            <option value="GBP"  >Pounds (£ - GBP)</option>
                                                                                                                            <option value="USD"  >Dollars ($ - USD)</option>
                                                                                                                            <option value="UYU"  >Pesos ($U - UYU)</option>
                                                                                                                            <option value="UZS"  >Sums (so&#039;m - UZS)</option>
                                                                                                                            <option value="EUR"  >Euro (€ - EUR)</option>
                                                                                                                            <option value="VEF"  >Bolivares Fuertes (Bs - VEF)</option>
                                                                                                                            <option value="VND"  >Dong (₫
 - VND)</option>
                                                                                                                            <option value="YER"  >Rials (﷼ - YER)</option>
                                                                                                                            <option value="ZWD"  >Zimbabwe Dollars (Z$ - ZWD)</option>
                                                                                                                    </select>
                                                                                                            </div>
                                                </div>
                                                
                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>
                                        
                                        <!-- Map --->
                                        <div class="tab-pane fade" id="tab-13" role="tabpanel" aria-labelledby="tabs-icons-text-13-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/map" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Map</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="mapkey">Map Key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="mapkey" id="mapkey" placeholder="Map Key">
                                                                                                            </div>
                                                </div> 
                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>
                                        
                                        <!-- Address --->
                                        <div class="tab-pane fade form" id="tab-12" role="tabpanel" aria-labelledby="tabs-icons-text-12-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/address" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Address</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="address1">Address 1</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="44 , B Bldg, govind Niwas" name="address1" id="address1" placeholder="Address 1">
                                                                                                            </div>
                                                </div> 
                                                 
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="address2">Address 2</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="Sarojini Road, Vile Parle West (west)" name="address2" id="address2" placeholder="Address 2">
                                                                                                            </div>
                                                </div> 
                                                 
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="city">City</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="Rajkot" name="city" id="city" placeholder="City">
                                                                                                            </div>
                                                </div> 
                                                 
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="state">State</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="Gujarat" name="state" id="state" placeholder="State">
                                                                                                            </div>
                                                </div> 
                                                 
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="country">Country</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="India" name="country" id="country" placeholder="Country">
                                                                                                            </div>
                                                </div> 
                                                 
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="zipcode">Zipcode</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="360003" name="zipcode" id="zipcode" placeholder="Zipcode">
                                                                                                            </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-9 mapsize" id="location_map"></div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="latitude">Latitude</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="22.30008830783214" name="latitude" id="latitude" placeholder="Latitude">
                                                                                                            </div>
                                                </div>    
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="longitude">Longitude</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="70.82417265625001" name="longitude" id="longitude" placeholder="Longitude">
                                                                                                            </div>
                                                </div> 

                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>

                                        <!-- Push notification --->
                                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                                <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/push_notification" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Push Notification</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="enable_notification">Notification </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="enable_notification" name="enable_notification" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>  
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="app_id">App ID</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="app_id" id="app_id" placeholder="App ID">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="api_key">Api key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="api_key" id="api_key" placeholder="Api key">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="auth_key">Auth key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="auth_key" id="auth_key" placeholder="Auth key">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="project_no">Project number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="project_no" id="project_no" placeholder="Project number">
                                                                                                            </div>
                                                </div>
                                                
                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>
                                        
                                        <!-- Email Settings --->
                                        <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tabs-icons-text-4-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/email_settings" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Email Settings</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="enable_mail">Mail </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="enable_mail" name="enable_mail" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>  
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="mail_host">Mail Host</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="mail_host" id="mail_host" placeholder="Mail Host">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="mail_port">Mail Port</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="mail_port" id="mail_port" placeholder="Mail Port">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="mail_username">Mail Username</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="mail_username" id="mail_username" placeholder="Mail Username">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="mail_password">Mail Password</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="mail_password" id="mail_password" placeholder="Mail Password">
                                                                                                            </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="sender_email">Sender Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="sender_email" id="sender_email" placeholder="Sender Email">
                                                                                                            </div>
                                                </div>  
                                                
                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>

                                        <!-- SMS Gateway --->
                                        <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="tabs-icons-text-5-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/sms_gateway" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">SMS Gateway</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="enable_sms">SMS </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="enable_sms" name="enable_sms" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>  
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="twilio_acc_id">Twilio Account ID</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="twilio_acc_id" id="twilio_acc_id" placeholder="Twilio Account ID">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="twilio_auth_token">Twilio Auth Token</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="twilio_auth_token" id="twilio_auth_token" placeholder="Twilio Auth Token">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="twilio_phone_no">Twilio Phone Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="twilio_phone_no" id="twilio_phone_no" placeholder="Twilio Phone Number">
                                                                                                            </div>
                                                </div> 

                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>

                                        <!-- Payment Gateway --->
                                        <div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="tabs-icons-text-6-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/payment_gateway" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Payment Gateway</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="cod">COD </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="cod" name="cod" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="paypal">Paypal </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="paypal" name="paypal" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="razorpay">Razorpay </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="razorpay" name="razorpay" checked >
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                                                                            </div>
                                                </div>
                                            
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="stripe">Stripe </label>
                                                    <div class="col-sm-9 mt-2">
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" id="stripe" name="stripe" checked>
                                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                                
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="paypal_sandbox_key">Paypal Sandbox Key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="paypal_sandbox_key" id="paypal_sandbox_key" placeholder="Paypal Sandbox Key">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="paypal_production_key">Paypal Production Key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="paypal_production_key" id="paypal_production_key" placeholder="Paypal Production Key">
                                                                                                            </div>
                                                </div> 
                                                    
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="razorpay_public_key">Razorpay Public Key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="razorpay_public_key" id="razorpay_public_key" placeholder="Razorpay Public Key">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="razorpay_secret_key">Razorpay Secret Key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="razorpay_secret_key" id="razorpay_secret_key" placeholder="Razorpay Secret Key">
                                                                                                            </div>
                                                </div> 
                                                    
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="stripe_public_key">Stripe Public Key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="stripe_public_key" id="stripe_public_key" placeholder="Stripe Public Key">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="stripe_secret_key">Stripe Secret Key</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="stripe_secret_key" id="stripe_secret_key" placeholder="Stripe Secret Key">
                                                                                                            </div>
                                                </div> 

                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>
                                        
                                        <!-- Terms of use --->
                                        <div class="tab-pane fade" id="tab-7" role="tabpanel" aria-labelledby="tabs-icons-text-7-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/terms_of_use" id="terms_form" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Terms Of Use</h3>
                                                <textarea class="terms_of_use form-control" rows="10" name="terms_of_use">&lt;div&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&lt;/div&gt;&lt;div&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod&lt;br&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod&lt;br&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 1&lt;br&gt;&lt;/div&gt;</textarea>

                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>

                                        <!-- privacy_policy --->
                                        <div class="tab-pane fade" id="tab-8" role="tabpanel" aria-labelledby="tabs-icons-text-8-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/privacy_policy" id="privacy_form" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Privacy Policy</h3>
                                                <textarea class="privacy_policy form-control" rows="10" name="privacy_policy">&lt;div&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&lt;/div&gt;&lt;div&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod&lt;br&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod&lt;br&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod 2&lt;/div&gt;</textarea>

                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>

                                        <!-- App Setting --->
                                        <div class="tab-pane fade" id="tab-9" role="tabpanel" aria-labelledby="tabs-icons-text-9-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/app_setting" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">App Setting</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">Select Unit</label>
                                                    <div class="col-sm-9 w-75">
                                                        <select class="form-control" dir="" name="unit" id="unit" >
                                                            <option value="KG" > KG </option>
                                                            <option value="Cloth" selected> Cloth </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="app_name">App Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="Laundering" name="app_name" id="app_name" placeholder="App Name">
                                                                                                            </div>
                                                </div> 
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="app_name">Version</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="1.0.0" name="app_version" id="app_version" placeholder="Version">
                                                                                                            </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">Favicon Icon</label>
                                                    <div class="">
                                                        <div class="col-sm-9 avatar-upload avatar-box">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg" />
                                                                <label for="image"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview" style="background-image: url(https://ondemandscripts.com/App-Demo/laundring-52421/public/images/app/favicon_icon.png);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">Black Logo</label>
                                                    <div class="">
                                                        <div class="col-sm-9 avatar-upload avatar-box">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="image_edit" name="image_edit" accept=".png, .jpg, .jpeg" />
                                                                <label for="image_edit"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview_edit" style="background-image: url(https://ondemandscripts.com/App-Demo/laundring-52421/public/images/app/black_logo.png);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">White Logo</label>
                                                    <div class="">
                                                        <div class="col-sm-9 avatar-upload avatar-box">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="image_edit_2" name="image_edit_2" accept=".png, .jpg, .jpeg" />
                                                                <label for="image_edit_2"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview_edit_2" style="background-image: url(https://ondemandscripts.com/App-Demo/laundring-52421/public/images/app/white_logo.png);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">Color Logo</label>
                                                    <div class="">
                                                        <div class="col-sm-9 avatar-upload avatar-box">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="image_edit_3" name="image_edit_3" accept=".png, .jpg, .jpeg" />
                                                                <label for="image_edit_3"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview_edit_3" style="background-image: url(https://ondemandscripts.com/App-Demo/laundring-52421/public/images/app/color_logo.png);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">Login Screen</label>
                                                    <div class="">
                                                        <div class="col-sm-9 avatar-upload avatar-box">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="image_edit_4" name="image_edit_4" accept=".png, .jpg, .jpeg" />
                                                                <label for="image_edit_4"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview_edit_4" style="background-image: url(https://ondemandscripts.com/App-Demo/laundring-52421/public/images/app/splash_screen.png);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>
                                        
                                        <!-- Admin Settings --->
                                        <div class="tab-pane fade" id="tab-10" role="tabpanel" aria-labelledby="tabs-icons-text-10-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/admin_settings" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">Admin Settings</h3>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">Header Image</label>
                                                    <div class="">
                                                        <div class="col-sm-9 avatar-upload avatar-box">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="image_edit_5" name="image_edit_5" accept=".png, .jpg, .jpeg" />
                                                                <label for="image_edit_5"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview_edit_5" style="background-image: url(https://ondemandscripts.com/App-Demo/laundring-52421/public/images/app/bg_img.jpg);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label">No Data Found Image</label>
                                                    <div class="">
                                                        <div class="col-sm-9 avatar-upload avatar-box">
                                                            <div class="avatar-edit">
                                                                <input type='file' id="image_edit_6" name="image_edit_6" accept=".png, .jpg, .jpeg" />
                                                                <label for="image_edit_6"></label>
                                                            </div>
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview_edit_6" style="background-image: url(https://ondemandscripts.com/App-Demo/laundring-52421/public/images/app/no_data.png);">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-color-input" class="col-sm-3 text-right control-label col-form-label">Color</label>
                                                    <input type="color" class="col-sm-9 form-control"  value="#2c69a5" id="color" name="color" id="example-color-input">
                                                </div>

                                                                                                    <div class="border-top">
                                                        <div class="card-body text-center">
                                                            <input type="button" class="btn btn-primary rtl-float-none" onclick="demo()" value="Submit">
                                                        </div>
                                                    </div>
                                                                                            </form>
                                        </div>
                                        
                                        <!-- License --->
                                        <div class="tab-pane fade " id="tab-11" role="tabpanel" aria-labelledby="tabs-icons-text-11-tab">
                                            <form action="https://ondemandscripts.com/App-Demo/laundring-52421/public/admin/setting/license" method="post">
                                                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">                                                <h3 class="card-title">License</h3>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="license_code">License Code</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="license_code" id="license_code" placeholder="License Code" disabled>
                                                                                                            </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3 text-right control-label col-form-label" for="license_client_name">License Client Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="" name="license_client_name" id="license_client_name" placeholder="License Client Name" disabled>
                                                                                                            </div>
                                                </div>
                                                                                                                                                                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
     <?php include('footer.php'); ?>         