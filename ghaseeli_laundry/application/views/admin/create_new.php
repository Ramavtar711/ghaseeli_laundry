<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>       
    <div class="main-content">

  <?php include('include/header_bar.php'); 
        include('include/header_image.php');
        
        
        
      $button = "submit";
      $btn_name = "Add User";
      $path = base_url("uploads/images/user.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update User";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
      
        
        
        
        
  
  ?>  
  


<div class="container-fluid mt--6 mb-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <span class="h3">Create</span>
       <form action="" class="form-horizontal" enctype="multipart/form-data" id="" method="post" name="">
                                <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">    
                            <div class="my-0">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input  id="image" name="image" type='file' value="<?=$row['image'];?>" > 
                                        <label for="image"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-color: #f0f3f6;"></div>
                                    </div>
                                </div>
                                <div class="invalid-div text-center mt-3">
                                    <span class="image"></span>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="name_create">First Name</label> 
                                    <input  class="form-control" id="first_name" name="first_name" placeholder="First Name" type="text" value="<?=$row['first_name'];?>"required>
                                    
                                </div>
                                  <div class="form-group">
                                    <label class="form-control-label" for="name_create">Last Name</label> 
                                    <input  autofocus="" class="form-control" id="last_name" name="last_name" placeholder="Last Name" type="text" value="<?=$row['last_name'];?>"required>
                                    
                                </div>
                                
                                
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="email_create">Email</label>
                                    <input autocomplete="email" class="form-control" id="email" name="email" placeholder="Email Address" type="email" value="<?=$row['email'];?>"required>
                                   
                                </div>
                               <!-- <div class="form-group">
                                    <label class="form-control-label" for="country_code">Country Code</label> <select class="form-control select2" data-placeholder='-- Select Country Code --' dir="" name="country_code">
                                        <option value="93">
                                            Afghanistan (AFG) - 93
                                        </option>
                                        <option value="355">
                                            Albania (ALB) - 355
                                        </option>
                                        <option value="213">
                                            Algeria (DZA) - 213
                                        </option>
                                        <option value="1684">
                                            American Samoa (ASM) - 1684
                                        </option>
                                        <option value="376">
                                            Andorra (AND) - 376
                                        </option>
                                        <option value="244">
                                            Angola (AGO) - 244
                                        </option>
                                        <option value="1264">
                                            Anguilla (AIA) - 1264
                                        </option>
                                        <option value="0">
                                            Antarctica () - 0
                                        </option>
                                        <option value="1268">
                                            Antigua and Barbuda (ATG) - 1268
                                        </option>
                                        <option value="54">
                                            Argentina (ARG) - 54
                                        </option>
                                        <option value="374">
                                            Armenia (ARM) - 374
                                        </option>
                                        <option value="297">
                                            Aruba (ABW) - 297
                                        </option>
                                        <option value="61">
                                            Australia (AUS) - 61
                                        </option>
                                        <option value="43">
                                            Austria (AUT) - 43
                                        </option>
                                        <option value="994">
                                            Azerbaijan (AZE) - 994
                                        </option>
                                        <option value="1242">
                                            Bahamas (BHS) - 1242
                                        </option>
                                        <option value="973">
                                            Bahrain (BHR) - 973
                                        </option>
                                        <option value="880">
                                            Bangladesh (BGD) - 880
                                        </option>
                                        <option value="1246">
                                            Barbados (BRB) - 1246
                                        </option>
                                        <option value="375">
                                            Belarus (BLR) - 375
                                        </option>
                                        <option value="32">
                                            Belgium (BEL) - 32
                                        </option>
                                        <option value="501">
                                            Belize (BLZ) - 501
                                        </option>
                                        <option value="229">
                                            Benin (BEN) - 229
                                        </option>
                                        <option value="1441">
                                            Bermuda (BMU) - 1441
                                        </option>
                                        <option value="975">
                                            Bhutan (BTN) - 975
                                        </option>
                                        <option value="591">
                                            Bolivia (BOL) - 591
                                        </option>
                                        <option value="387">
                                            Bosnia and Herzegovina (BIH) - 387
                                        </option>
                                        <option value="267">
                                            Botswana (BWA) - 267
                                        </option>
                                        <option value="0">
                                            Bouvet Island () - 0
                                        </option>
                                        <option value="55">
                                            Brazil (BRA) - 55
                                        </option>
                                        <option value="246">
                                            British Indian Ocean Territory () - 246
                                        </option>
                                        <option value="673">
                                            Brunei Darussalam (BRN) - 673
                                        </option>
                                        <option value="359">
                                            Bulgaria (BGR) - 359
                                        </option>
                                        <option value="226">
                                            Burkina Faso (BFA) - 226
                                        </option>
                                        <option value="257">
                                            Burundi (BDI) - 257
                                        </option>
                                        <option value="855">
                                            Cambodia (KHM) - 855
                                        </option>
                                        <option value="237">
                                            Cameroon (CMR) - 237
                                        </option>
                                        <option value="1">
                                            Canada (CAN) - 1
                                        </option>
                                        <option value="238">
                                            Cape Verde (CPV) - 238
                                        </option>
                                        <option value="1345">
                                            Cayman Islands (CYM) - 1345
                                        </option>
                                        <option value="236">
                                            Central African Republic (CAF) - 236
                                        </option>
                                        <option value="235">
                                            Chad (TCD) - 235
                                        </option>
                                        <option value="56">
                                            Chile (CHL) - 56
                                        </option>
                                        <option value="86">
                                            China (CHN) - 86
                                        </option>
                                        <option value="61">
                                            Christmas Island () - 61
                                        </option>
                                        <option value="672">
                                            Cocos (Keeling) Islands () - 672
                                        </option>
                                        <option value="57">
                                            Colombia (COL) - 57
                                        </option>
                                        <option value="269">
                                            Comoros (COM) - 269
                                        </option>
                                        <option value="242">
                                            Congo (COG) - 242
                                        </option>
                                        <option value="242">
                                            Congo, the Democratic Republic of the (COD) - 242
                                        </option>
                                        <option value="682">
                                            Cook Islands (COK) - 682
                                        </option>
                                        <option value="506">
                                            Costa Rica (CRI) - 506
                                        </option>
                                        <option value="225">
                                            Cote D&#039;Ivoire (CIV) - 225
                                        </option>
                                        <option value="385">
                                            Croatia (HRV) - 385
                                        </option>
                                        <option value="53">
                                            Cuba (CUB) - 53
                                        </option>
                                        <option value="357">
                                            Cyprus (CYP) - 357
                                        </option>
                                        <option value="420">
                                            Czech Republic (CZE) - 420
                                        </option>
                                        <option value="45">
                                            Denmark (DNK) - 45
                                        </option>
                                        <option value="253">
                                            Djibouti (DJI) - 253
                                        </option>
                                        <option value="1767">
                                            Dominica (DMA) - 1767
                                        </option>
                                        <option value="1809">
                                            Dominican Republic (DOM) - 1809
                                        </option>
                                        <option value="593">
                                            Ecuador (ECU) - 593
                                        </option>
                                        <option value="20">
                                            Egypt (EGY) - 20
                                        </option>
                                        <option value="503">
                                            El Salvador (SLV) - 503
                                        </option>
                                        <option value="240">
                                            Equatorial Guinea (GNQ) - 240
                                        </option>
                                        <option value="291">
                                            Eritrea (ERI) - 291
                                        </option>
                                        <option value="372">
                                            Estonia (EST) - 372
                                        </option>
                                        <option value="251">
                                            Ethiopia (ETH) - 251
                                        </option>
                                        <option value="500">
                                            Falkland Islands (Malvinas) (FLK) - 500
                                        </option>
                                        <option value="298">
                                            Faroe Islands (FRO) - 298
                                        </option>
                                        <option value="679">
                                            Fiji (FJI) - 679
                                        </option>
                                        <option value="358">
                                            Finland (FIN) - 358
                                        </option>
                                        <option value="33">
                                            France (FRA) - 33
                                        </option>
                                        <option value="594">
                                            French Guiana (GUF) - 594
                                        </option>
                                        <option value="689">
                                            French Polynesia (PYF) - 689
                                        </option>
                                        <option value="0">
                                            French Southern Territories () - 0
                                        </option>
                                        <option value="241">
                                            Gabon (GAB) - 241
                                        </option>
                                        <option value="220">
                                            Gambia (GMB) - 220
                                        </option>
                                        <option value="995">
                                            Georgia (GEO) - 995
                                        </option>
                                        <option value="49">
                                            Germany (DEU) - 49
                                        </option>
                                        <option value="233">
                                            Ghana (GHA) - 233
                                        </option>
                                        <option value="350">
                                            Gibraltar (GIB) - 350
                                        </option>
                                        <option value="30">
                                            Greece (GRC) - 30
                                        </option>
                                        <option value="299">
                                            Greenland (GRL) - 299
                                        </option>
                                        <option value="1473">
                                            Grenada (GRD) - 1473
                                        </option>
                                        <option value="590">
                                            Guadeloupe (GLP) - 590
                                        </option>
                                        <option value="1671">
                                            Guam (GUM) - 1671
                                        </option>
                                        <option value="502">
                                            Guatemala (GTM) - 502
                                        </option>
                                        <option value="224">
                                            Guinea (GIN) - 224
                                        </option>
                                        <option value="245">
                                            Guinea-Bissau (GNB) - 245
                                        </option>
                                        <option value="592">
                                            Guyana (GUY) - 592
                                        </option>
                                        <option value="509">
                                            Haiti (HTI) - 509
                                        </option>
                                        <option value="0">
                                            Heard Island and Mcdonald Islands () - 0
                                        </option>
                                        <option value="39">
                                            Holy See (Vatican City State) (VAT) - 39
                                        </option>
                                        <option value="504">
                                            Honduras (HND) - 504
                                        </option>
                                        <option value="852">
                                            Hong Kong (HKG) - 852
                                        </option>
                                        <option value="36">
                                            Hungary (HUN) - 36
                                        </option>
                                        <option value="354">
                                            Iceland (ISL) - 354
                                        </option>
                                        <option value="91">
                                            India (IND) - 91
                                        </option>
                                        <option value="62">
                                            Indonesia (IDN) - 62
                                        </option>
                                        <option value="98">
                                            Iran, Islamic Republic of (IRN) - 98
                                        </option>
                                        <option value="964">
                                            Iraq (IRQ) - 964
                                        </option>
                                        <option value="353">
                                            Ireland (IRL) - 353
                                        </option>
                                        <option value="972">
                                            Israel (ISR) - 972
                                        </option>
                                        <option value="39">
                                            Italy (ITA) - 39
                                        </option>
                                        <option value="1876">
                                            Jamaica (JAM) - 1876
                                        </option>
                                        <option value="81">
                                            Japan (JPN) - 81
                                        </option>
                                        <option value="962">
                                            Jordan (JOR) - 962
                                        </option>
                                        <option value="7">
                                            Kazakhstan (KAZ) - 7
                                        </option>
                                        <option value="254">
                                            Kenya (KEN) - 254
                                        </option>
                                        <option value="686">
                                            Kiribati (KIR) - 686
                                        </option>
                                        <option value="850">
                                            Korea, Democratic People&#039;s Republic of (PRK) - 850
                                        </option>
                                        <option value="82">
                                            Korea, Republic of (KOR) - 82
                                        </option>
                                        <option value="965">
                                            Kuwait (KWT) - 965
                                        </option>
                                        <option value="996">
                                            Kyrgyzstan (KGZ) - 996
                                        </option>
                                        <option value="856">
                                            Lao People&#039;s Democratic Republic (LAO) - 856
                                        </option>
                                        <option value="371">
                                            Latvia (LVA) - 371
                                        </option>
                                        <option value="961">
                                            Lebanon (LBN) - 961
                                        </option>
                                        <option value="266">
                                            Lesotho (LSO) - 266
                                        </option>
                                        <option value="231">
                                            Liberia (LBR) - 231
                                        </option>
                                        <option value="218">
                                            Libyan Arab Jamahiriya (LBY) - 218
                                        </option>
                                        <option value="423">
                                            Liechtenstein (LIE) - 423
                                        </option>
                                        <option value="370">
                                            Lithuania (LTU) - 370
                                        </option>
                                        <option value="352">
                                            Luxembourg (LUX) - 352
                                        </option>
                                        <option value="853">
                                            Macao (MAC) - 853
                                        </option>
                                        <option value="389">
                                            Macedonia, the Former Yugoslav Republic of (MKD) - 389
                                        </option>
                                        <option value="261">
                                            Madagascar (MDG) - 261
                                        </option>
                                        <option value="265">
                                            Malawi (MWI) - 265
                                        </option>
                                        <option value="60">
                                            Malaysia (MYS) - 60
                                        </option>
                                        <option value="960">
                                            Maldives (MDV) - 960
                                        </option>
                                        <option value="223">
                                            Mali (MLI) - 223
                                        </option>
                                        <option value="356">
                                            Malta (MLT) - 356
                                        </option>
                                        <option value="692">
                                            Marshall Islands (MHL) - 692
                                        </option>
                                        <option value="596">
                                            Martinique (MTQ) - 596
                                        </option>
                                        <option value="222">
                                            Mauritania (MRT) - 222
                                        </option>
                                        <option value="230">
                                            Mauritius (MUS) - 230
                                        </option>
                                        <option value="269">
                                            Mayotte () - 269
                                        </option>
                                        <option value="52">
                                            Mexico (MEX) - 52
                                        </option>
                                        <option value="691">
                                            Micronesia, Federated States of (FSM) - 691
                                        </option>
                                        <option value="373">
                                            Moldova, Republic of (MDA) - 373
                                        </option>
                                        <option value="377">
                                            Monaco (MCO) - 377
                                        </option>
                                        <option value="976">
                                            Mongolia (MNG) - 976
                                        </option>
                                        <option value="1664">
                                            Montserrat (MSR) - 1664
                                        </option>
                                        <option value="212">
                                            Morocco (MAR) - 212
                                        </option>
                                        <option value="258">
                                            Mozambique (MOZ) - 258
                                        </option>
                                        <option value="95">
                                            Myanmar (MMR) - 95
                                        </option>
                                        <option value="264">
                                            Namibia (NAM) - 264
                                        </option>
                                        <option value="674">
                                            Nauru (NRU) - 674
                                        </option>
                                        <option value="977">
                                            Nepal (NPL) - 977
                                        </option>
                                        <option value="31">
                                            Netherlands (NLD) - 31
                                        </option>
                                        <option value="599">
                                            Netherlands Antilles (ANT) - 599
                                        </option>
                                        <option value="687">
                                            New Caledonia (NCL) - 687
                                        </option>
                                        <option value="64">
                                            New Zealand (NZL) - 64
                                        </option>
                                        <option value="505">
                                            Nicaragua (NIC) - 505
                                        </option>
                                        <option value="227">
                                            Niger (NER) - 227
                                        </option>
                                        <option value="234">
                                            Nigeria (NGA) - 234
                                        </option>
                                        <option value="683">
                                            Niue (NIU) - 683
                                        </option>
                                        <option value="672">
                                            Norfolk Island (NFK) - 672
                                        </option>
                                        <option value="1670">
                                            Northern Mariana Islands (MNP) - 1670
                                        </option>
                                        <option value="47">
                                            Norway (NOR) - 47
                                        </option>
                                        <option value="968">
                                            Oman (OMN) - 968
                                        </option>
                                        <option value="92">
                                            Pakistan (PAK) - 92
                                        </option>
                                        <option value="680">
                                            Palau (PLW) - 680
                                        </option>
                                        <option value="970">
                                            Palestinian Territory, Occupied () - 970
                                        </option>
                                        <option value="507">
                                            Panama (PAN) - 507
                                        </option>
                                        <option value="675">
                                            Papua New Guinea (PNG) - 675
                                        </option>
                                        <option value="595">
                                            Paraguay (PRY) - 595
                                        </option>
                                        <option value="51">
                                            Peru (PER) - 51
                                        </option>
                                        <option value="63">
                                            Philippines (PHL) - 63
                                        </option>
                                        <option value="0">
                                            Pitcairn (PCN) - 0
                                        </option>
                                        <option value="48">
                                            Poland (POL) - 48
                                        </option>
                                        <option value="351">
                                            Portugal (PRT) - 351
                                        </option>
                                        <option value="1787">
                                            Puerto Rico (PRI) - 1787
                                        </option>
                                        <option value="974">
                                            Qatar (QAT) - 974
                                        </option>
                                        <option value="262">
                                            Reunion (REU) - 262
                                        </option>
                                        <option value="40">
                                            Romania (ROM) - 40
                                        </option>
                                        <option value="70">
                                            Russian Federation (RUS) - 70
                                        </option>
                                        <option value="250">
                                            Rwanda (RWA) - 250
                                        </option>
                                        <option value="290">
                                            Saint Helena (SHN) - 290
                                        </option>
                                        <option value="1869">
                                            Saint Kitts and Nevis (KNA) - 1869
                                        </option>
                                        <option value="1758">
                                            Saint Lucia (LCA) - 1758
                                        </option>
                                        <option value="508">
                                            Saint Pierre and Miquelon (SPM) - 508
                                        </option>
                                        <option value="1784">
                                            Saint Vincent and the Grenadines (VCT) - 1784
                                        </option>
                                        <option value="684">
                                            Samoa (WSM) - 684
                                        </option>
                                        <option value="378">
                                            San Marino (SMR) - 378
                                        </option>
                                        <option value="239">
                                            Sao Tome and Principe (STP) - 239
                                        </option>
                                        <option value="966">
                                            Saudi Arabia (SAU) - 966
                                        </option>
                                        <option value="221">
                                            Senegal (SEN) - 221
                                        </option>
                                        <option value="381">
                                            Serbia and Montenegro () - 381
                                        </option>
                                        <option value="248">
                                            Seychelles (SYC) - 248
                                        </option>
                                        <option value="232">
                                            Sierra Leone (SLE) - 232
                                        </option>
                                        <option value="65">
                                            Singapore (SGP) - 65
                                        </option>
                                        <option value="421">
                                            Slovakia (SVK) - 421
                                        </option>
                                        <option value="386">
                                            Slovenia (SVN) - 386
                                        </option>
                                        <option value="677">
                                            Solomon Islands (SLB) - 677
                                        </option>
                                        <option value="252">
                                            Somalia (SOM) - 252
                                        </option>
                                        <option value="27">
                                            South Africa (ZAF) - 27
                                        </option>
                                        <option value="0">
                                            South Georgia and the South Sandwich Islands () - 0
                                        </option>
                                        <option value="34">
                                            Spain (ESP) - 34
                                        </option>
                                        <option value="94">
                                            Sri Lanka (LKA) - 94
                                        </option>
                                        <option value="249">
                                            Sudan (SDN) - 249
                                        </option>
                                        <option value="597">
                                            Suriname (SUR) - 597
                                        </option>
                                        <option value="47">
                                            Svalbard and Jan Mayen (SJM) - 47
                                        </option>
                                        <option value="268">
                                            Swaziland (SWZ) - 268
                                        </option>
                                        <option value="46">
                                            Sweden (SWE) - 46
                                        </option>
                                        <option value="41">
                                            Switzerland (CHE) - 41
                                        </option>
                                        <option value="963">
                                            Syrian Arab Republic (SYR) - 963
                                        </option>
                                        <option value="886">
                                            Taiwan, Province of China (TWN) - 886
                                        </option>
                                        <option value="992">
                                            Tajikistan (TJK) - 992
                                        </option>
                                        <option value="255">
                                            Tanzania, United Republic of (TZA) - 255
                                        </option>
                                        <option value="66">
                                            Thailand (THA) - 66
                                        </option>
                                        <option value="670">
                                            Timor-Leste () - 670
                                        </option>
                                        <option value="228">
                                            Togo (TGO) - 228
                                        </option>
                                        <option value="690">
                                            Tokelau (TKL) - 690
                                        </option>
                                        <option value="676">
                                            Tonga (TON) - 676
                                        </option>
                                        <option value="1868">
                                            Trinidad and Tobago (TTO) - 1868
                                        </option>
                                        <option value="216">
                                            Tunisia (TUN) - 216
                                        </option>
                                        <option value="90">
                                            Turkey (TUR) - 90
                                        </option>
                                        <option value="7370">
                                            Turkmenistan (TKM) - 7370
                                        </option>
                                        <option value="1649">
                                            Turks and Caicos Islands (TCA) - 1649
                                        </option>
                                        <option value="688">
                                            Tuvalu (TUV) - 688
                                        </option>
                                        <option value="256">
                                            Uganda (UGA) - 256
                                        </option>
                                        <option value="380">
                                            Ukraine (UKR) - 380
                                        </option>
                                        <option value="971">
                                            United Arab Emirates (ARE) - 971
                                        </option>
                                        <option value="44">
                                            United Kingdom (GBR) - 44
                                        </option>
                                        <option value="1">
                                            United States (USA) - 1
                                        </option>
                                        <option value="1">
                                            United States Minor Outlying Islands () - 1
                                        </option>
                                        <option value="598">
                                            Uruguay (URY) - 598
                                        </option>
                                        <option value="998">
                                            Uzbekistan (UZB) - 998
                                        </option>
                                        <option value="678">
                                            Vanuatu (VUT) - 678
                                        </option>
                                        <option value="58">
                                            Venezuela (VEN) - 58
                                        </option>
                                        <option value="84">
                                            Viet Nam (VNM) - 84
                                        </option>
                                        <option value="1284">
                                            Virgin Islands, British (VGB) - 1284
                                        </option>
                                        <option value="1340">
                                            Virgin Islands, U.s. (VIR) - 1340
                                        </option>
                                        <option value="681">
                                            Wallis and Futuna (WLF) - 681
                                        </option>
                                        <option value="212">
                                            Western Sahara (ESH) - 212
                                        </option>
                                        <option value="967">
                                            Yemen (YEM) - 967
                                        </option>
                                        <option value="260">
                                            Zambia (ZMB) - 260
                                        </option>
                                        <option value="263">
                                            Zimbabwe (ZWE) - 263
                                        </option>
                                    </select>
                                    <div class="invalid-div">
                                        <span class="roles"></span>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="form-control-label" for="phone_create">Phone</label> 
                                    <input class="form-control" id="phone_create" name="mobile" placeholder="Mobile Number" type="text" value="<?=$row['mobile'];?>">
                                   
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="password">Password</label> 
                                    <input  class="form-control" id="password" name="password" placeholder="Password" type="password" value='<?=$row['password'];?>'>
                                    
                                </div>
                             <!--   <div class="form-group">
                                    <label class="form-control-label" for="role">Select Role</label> <select class="form-control select2" data-placeholder='-- Select role --' dir="" multiple="multiple" name="roles[]">
                                        <option value="1">
                                            Admin
                                        </option>
                                        <option value="2">
                                            Client
                                        </option>
                                        <option value="3">
                                            Staff
                                        </option>
                                        <option value="4">
                                            Manager
                                        </option>
                                    </select>
                                    <div class="invalid-div">
                                        <span class="roles"></span>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="form-control-label" for="status">Status</label> 
                                    <select class="form-control" name="status">
                                         <option value="Active" <?php if($row['status']=='Active'){ echo "selected";}?> > Active </option>
                                          <option value="Deactive" <?php if($row['status']=='Deactive'){ echo "selected";}?> > Deactive </option>
                                    </select>
                                    
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary mt-4 mb-5" type="submit" name="<?=$button;?>"><?=$btn_name;?></button>
                                </div>
                            </div>
                        </form>
        </div>
      </div>
    </div>
</div>
 </di>
</div>
</div>

  
                    
  <?php include('include/footer.php'); ?>
  
  
  

<script>

   function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result);
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

    

 </body>
</html>



<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

            $arr_data = $this->input->post();

            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }
 $arr_data['status'] = 'Active'; 

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('users',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add User Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/user')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add User',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}

}// end if submit


// for update restaurant
if(isset($update)){

$arr_data = $this->input->post();


            $user_image = $row['image'];
            if($_FILES['image']['name']!=''){
    
                        unlink("uploads/images/" . $rest_image);
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }



$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('users',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Update User Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/page/user')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating User',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

  <style>
     .dialog {
    padding-right: 18px;
    float: left;
    position: relative;
}
.close-thik{
   background: #FFF none repeat scroll 0% 0%;
color: #0A0A0A;
font: 14px/100% arial,sans-serif;
position: absolute;
right: 20px;
text-decoration: none;
text-shadow: 0px 1px 0px #FFF;
top: 5px; 
}
.dialog label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.upload_file {
    width: 120px;
    height: 100px;
    border: 1px solid #0070BC;
}
.dialog input{
        visibility: hidden;
    position: absolute;

}

     </style>





  
  
  
  
  