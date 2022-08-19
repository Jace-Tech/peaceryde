<?php include("./inc/check_session.php");  ?>

<?php

if (isset($_SESSION['APPLY_FORM_DATA'])) {
  $FORM_APPY = json_decode($_SESSION['APPLY_FORM_DATA'], true);
}
?>

<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/icon.png">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/common.css" />
  <link rel="stylesheet" type="text/css" href="css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="css/New.css" />
  <link rel="stylesheet" type="text/css" href="css/Laptops.css">
  <link rel="stylesheet" type="text/css" href="css/smallscreen800.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&family=Ubuntu:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">
  <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>

  <!-- jquery CDN google -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script>
    $(document).ready(function(){
        const MIN_AGE = 18
        const offset = +(new Date().getFullYear()) - MIN_AGE
        $( ".datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: `${1950 + (MIN_AGE / 2)}:${offset}`,
            defaultDate: new Date(),
            showAnim: "blind"
        });
    });
  </script>
  <style>

    .error {
      border-color: #f00;
    }
  </style>
</head>


<body class="body" style="overflow-x: hidden;">
  <main class="new new-main layout">
    <!-- ======= section1 ======= -->
    <?php include("./inc/header.php"); ?>
    <section class=" new-section2__group layout2 nbvformheight" style="background-color: #f8f6f6;">
      <div class="new-section1__cover-block layout">
        <h2 class="welcome"> Welcome!</h2>
        <p class="formtext">The first step in applying for a <span style="font-size: 20px; font-weight: 500;">Nigeria Temporary Work Permit</span> is to fill the form below
          <span>It takes less than 5 minutes to do this. After you submit your application, you can</span>
          <span> move on to the next step to make payment</span>.
        </p>
        <div class="topdiv">
          <div class="card cardform">
            <div style="margin-top: 47px;">
              <h2 class="formh1">Fill the form below</h2>
              <p class="formp">Your personal details</p>
            </div>
            <div>
              <form data-form action="./handlers/form_handler.php" method="post">
                <select class="form-select title" aria-label="Default select example" required class="form-select" name="title">
                  <option selected>Title</option>
                  <?php foreach ($titles as $title) : ?>
                    <option value="<?= $title ?>">
                      <?= $title ?>
                    </option>
                  <?php endforeach; ?>
                </select>

                <p class="yourname">Your name must be entered in English as it appears on your passport.</p>

                <div class="form-row mt-15 formml">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">First Name</label>
                        <div class="input-group mb-3 biwidth">
                          <input type="text" data-length required type="text" name="firstname" value="<?= $FORM_APPY['firstname'] ?? "" ?>" class="form-control firstname" placeholder="First Name (as on passport)">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Middle Name</label>
                        <div class="input-group mb-3 biwidth">
                          <input type="text" data-length required type="text" name="middlename" class="form-control middlename" placeholder="Middle Name (as on passport)">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group" style="margin-right: 0px;">
                        <label class="form-label">Last Name</label>
                        <div class="input-group mb-3 biwidth">
                          <input type="text" data-length required type="text" name="lastname" value="<?= $FORM_APPY['lastname'] ?? "" ?>" class="form-control lastname" placeholder="Last Name (as on passport)">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="formml">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-label">Date of Birth</label>
                        <div class="input-group mb-3 biwidth">
                          <input type="date" required name="dob" class="form-control firstname" placeholder="dd/mm/yyyy">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 genderwidth">
                      <div class="row">
                        <div class="col-md-12" style="margin-top: 25px;">

                          <label class="gender">Gender</label>
                          <br>
                          <div class="form-check form-check-inline male">
                            <div class="custom-control custom-radio">
                              <label class="custom-control-label" for="customControlValidation2">Male</label>
                              <input type="radio" class="custom-control-input" value="male" id="customControlValidation2" value="male" name="gender">
                            </div>
                          </div>
                          <div class="form-check form-check-inline" style="margin-left: -20px;">
                            <div class="custom-control custom-radio">
                              <label class="custom-control-label" for="customControlValidation3">Female</label>
                              <input type="radio" class="custom-control-input" value="female" id="customControlValidation3" value="female" name="gender">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3"></div>
                  </div>
                </div>

                <div class="form-row formml">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <div class="input-group mb-3 biwidth">
                          <input type="email" required name="email" value="<?= $FORM_APPY['email'] ?? "" ?>" class="form-control firstname2" placeholder="Email address">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="form-label">Passport No.</label>
                        <div class="input-group mb-3 biwidth">
                          <input required type="text" name="passport" data-length class="form-control firstname2" placeholder="Passport No">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-row formml">
                  <div class="row">
                    <label style="margin-top:27px">Mobile Number</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <select name="countryCode" id="" required name="country_code" aria-label="Default select example" class="form-select code" aria-label="Default select example">

                          <optgroup label="Country Code">

                            <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                            <option data-countryCode="AD" value="376">Andorra (+376)</option>
                            <option data-countryCode="AO" value="244">Angola (+244)</option>
                            <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                            <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                            <option data-countryCode="AR" value="54">Argentina (+54)</option>
                            <option data-countryCode="AM" value="374">Armenia (+374)</option>
                            <option data-countryCode="AW" value="297">Aruba (+297)</option>
                            <option data-countryCode="AU" value="61">Australia (+61)</option>
                            <option data-countryCode="AT" value="43">Austria (+43)</option>
                            <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                            <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                            <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                            <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                            <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                            <option data-countryCode="BY" value="375">Belarus (+375)</option>
                            <option data-countryCode="BE" value="32">Belgium (+32)</option>
                            <option data-countryCode="BZ" value="501">Belize (+501)</option>
                            <option data-countryCode="BJ" value="229">Benin (+229)</option>
                            <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                            <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                            <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                            <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                            <option data-countryCode="BW" value="267">Botswana (+267)</option>
                            <option data-countryCode="BR" value="55">Brazil (+55)</option>
                            <option data-countryCode="BN" value="673">Brunei (+673)</option>
                            <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                            <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                            <option data-countryCode="BI" value="257">Burundi (+257)</option>
                            <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                            <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                            <option data-countryCode="CA" value="1">Canada (+1)</option>
                            <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                            <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                            <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                            <option data-countryCode="CL" value="56">Chile (+56)</option>
                            <option data-countryCode="CN" value="86">China (+86)</option>
                            <option data-countryCode="CO" value="57">Colombia (+57)</option>
                            <option data-countryCode="KM" value="269">Comoros (+269)</option>
                            <option data-countryCode="CG" value="242">Congo (+242)</option>
                            <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                            <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                            <option data-countryCode="HR" value="385">Croatia (+385)</option>
                            <option data-countryCode="CU" value="53">Cuba (+53)</option>
                            <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                            <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                            <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                            <option data-countryCode="DK" value="45">Denmark (+45)</option>
                            <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                            <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                            <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                            <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                            <option data-countryCode="EG" value="20">Egypt (+20)</option>
                            <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                            <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                            <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                            <option data-countryCode="EE" value="372">Estonia (+372)</option>
                            <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                            <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                            <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                            <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                            <option data-countryCode="FI" value="358">Finland (+358)</option>
                            <option data-countryCode="FR" value="33">France (+33)</option>
                            <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                            <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                            <option data-countryCode="GA" value="241">Gabon (+241)</option>
                            <option data-countryCode="GM" value="220">Gambia (+220)</option>
                            <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                            <option data-countryCode="DE" value="49">Germany (+49)</option>
                            <option data-countryCode="GH" value="233">Ghana (+233)</option>
                            <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                            <option data-countryCode="GR" value="30">Greece (+30)</option>
                            <option data-countryCode="GL" value="299">Greenland (+299)</option>
                            <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                            <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                            <option data-countryCode="GU" value="671">Guam (+671)</option>
                            <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                            <option data-countryCode="GN" value="224">Guinea (+224)</option>
                            <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                            <option data-countryCode="GY" value="592">Guyana (+592)</option>
                            <option data-countryCode="HT" value="509">Haiti (+509)</option>
                            <option data-countryCode="HN" value="504">Honduras (+504)</option>
                            <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                            <option data-countryCode="HU" value="36">Hungary (+36)</option>
                            <option data-countryCode="IS" value="354">Iceland (+354)</option>
                            <option data-countryCode="IN" value="91">India (+91)</option>
                            <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                            <option data-countryCode="IR" value="98">Iran (+98)</option>
                            <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                            <option data-countryCode="IE" value="353">Ireland (+353)</option>
                            <option data-countryCode="IL" value="972">Israel (+972)</option>
                            <option data-countryCode="IT" value="39">Italy (+39)</option>
                            <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                            <option data-countryCode="JP" value="81">Japan (+81)</option>
                            <option data-countryCode="JO" value="962">Jordan (+962)</option>
                            <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                            <option data-countryCode="KE" value="254">Kenya (+254)</option>
                            <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                            <option data-countryCode="KP" value="850">Korea North (+850)</option>
                            <option data-countryCode="KR" value="82">Korea South (+82)</option>
                            <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                            <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                            <option data-countryCode="LA" value="856">Laos (+856)</option>
                            <option data-countryCode="LV" value="371">Latvia (+371)</option>
                            <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                            <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                            <option data-countryCode="LR" value="231">Liberia (+231)</option>
                            <option data-countryCode="LY" value="218">Libya (+218)</option>
                            <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                            <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                            <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                            <option data-countryCode="MO" value="853">Macao (+853)</option>
                            <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                            <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                            <option data-countryCode="MW" value="265">Malawi (+265)</option>
                            <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                            <option data-countryCode="MV" value="960">Maldives (+960)</option>
                            <option data-countryCode="ML" value="223">Mali (+223)</option>
                            <option data-countryCode="MT" value="356">Malta (+356)</option>
                            <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                            <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                            <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                            <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                            <option data-countryCode="MX" value="52">Mexico (+52)</option>
                            <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                            <option data-countryCode="MD" value="373">Moldova (+373)</option>
                            <option data-countryCode="MC" value="377">Monaco (+377)</option>
                            <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                            <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                            <option data-countryCode="MA" value="212">Morocco (+212)</option>
                            <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                            <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                            <option data-countryCode="NA" value="264">Namibia (+264)</option>
                            <option data-countryCode="NR" value="674">Nauru (+674)</option>
                            <option data-countryCode="NP" value="977">Nepal (+977)</option>
                            <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                            <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                            <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                            <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                            <option data-countryCode="NE" value="227">Niger (+227)</option>
                            <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                            <option data-countryCode="NU" value="683">Niue (+683)</option>
                            <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                            <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                            <option data-countryCode="NO" value="47">Norway (+47)</option>
                            <option data-countryCode="OM" value="968">Oman (+968)</option>
                            <option data-countryCode="PW" value="680">Palau (+680)</option>
                            <option data-countryCode="PA" value="507">Panama (+507)</option>
                            <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                            <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                            <option data-countryCode="PE" value="51">Peru (+51)</option>
                            <option data-countryCode="PH" value="63">Philippines (+63)</option>
                            <option data-countryCode="PL" value="48">Poland (+48)</option>
                            <option data-countryCode="PT" value="351">Portugal (+351)</option>
                            <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                            <option data-countryCode="QA" value="974">Qatar (+974)</option>
                            <option data-countryCode="RE" value="262">Reunion (+262)</option>
                            <option data-countryCode="RO" value="40">Romania (+40)</option>
                            <option data-countryCode="RU" value="7">Russia (+7)</option>
                            <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                            <option data-countryCode="SM" value="378">San Marino (+378)</option>
                            <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                            <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                            <option data-countryCode="SN" value="221">Senegal (+221)</option>
                            <option data-countryCode="CS" value="381">Serbia (+381)</option>
                            <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                            <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                            <option data-countryCode="SG" value="65">Singapore (+65)</option>
                            <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                            <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                            <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                            <option data-countryCode="SO" value="252">Somalia (+252)</option>
                            <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                            <option data-countryCode="ES" value="34">Spain (+34)</option>
                            <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                            <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                            <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                            <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                            <option data-countryCode="SD" value="249">Sudan (+249)</option>
                            <option data-countryCode="SR" value="597">Suriname (+597)</option>
                            <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                            <option data-countryCode="SE" value="46">Sweden (+46)</option>
                            <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                            <option data-countryCode="SI" value="963">Syria (+963)</option>
                            <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                            <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                            <option data-countryCode="TH" value="66">Thailand (+66)</option>
                            <option data-countryCode="TG" value="228">Togo (+228)</option>
                            <option data-countryCode="TO" value="676">Tonga (+676)</option>
                            <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                            <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                            <option data-countryCode="TR" value="90">Turkey (+90)</option>
                            <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                            <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                            <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                            <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                            <option data-countryCode="UG" value="256">Uganda (+256)</option>
                            <option data-countryCode="GB" value="44">UK (+44)</option>
                            <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                            <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                            <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                            <option data-countryCode="US" value="1">United States of America (+1)</option>
                            <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                            <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                            <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                            <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                            <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                            <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                            <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                            <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                            <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                            <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                            <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                            <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                          </optgroup>
                        </select>
                      </div>
                      <input type="tel" required name="phone" class="form-control firstname" data-length placeholder="070XXXXXXXX">
                      <input required type="hidden" name="service" value="srvs-001">
                      <input required type="hidden" name="twp" value="">
                    </div>

                  </div>
                </div>

                <p class="formml please">Please select below your Nationality (as on passport)</p>
                <select required name="country" class="form-select formml select" aria-label="Default select example">
                  <option selected>Country </option>
                  <?php foreach ($country_fee as $key => $value) : ?>
                    <?php if ($key == "united states") : ?>
                      <option value="<?= $key ?>">United States of America</option>
                    <?php else : ?>
                      <option value="<?= $key ?>">
                        <?= strtoupper(substr($key, 0, 1)) . substr($key, 1); ?>
                      </option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <div class=" formml" style="margin-top: 27px;">
                  <label>Are you a returning customer ? (do you have an account with us on this website)</label>
                  <br>
                  <div class="form-check form-check-inline" style="padding-left: 0px; padding-top: 3px;">
                    <div class="custom-control custom-radio">
                      <label class="custom-control-label" for="customControlValidation2">No</label>
                      <input type="radio" checked class="custom-control-input" id="customControlValidation2" name="radio-stacked">
                    </div>
                  </div>
                  <div class="form-check form-check-inline">
                    <div class="custom-control custom-radio">
                      <label class="custom-control-label" for="modal-yes">Yes</label>
                      <input type="radio" class="custom-control-input" value="1" onclick="onYes()" id="modal-yes" name="radio-stacked">
                    </div>
                  </div>
                </div>
                <div class="formml" style=" margin-top:52px">
                  <button type="submit" name="twp" class="btn proceed">Proceed to payment</button>
                </div>

              </form>
            </div>
          </div>
        </div>

      </div>
    </section>

    <comment content="======= End section7 =======" break="true"></comment><!-- ======= section8 ======= -->

    <!-- ======= End section8 ======= -->

  </main>

  <script type="text/javascript">
    AOS.init();
  </script>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="./handlers/login.php" method="post">
            <div class="form-row">
              <div class="form-group">
                <input name="email" type="text" class="form-control" style="border: 1px solid #1161D9; width:470px;font-family:ubuntu;height: 44px; margin-top:27px;  color: #1161D9;" placeholder="Email" />
                <input type="hidden" name="redirect" value="../NTWPForm.php">
                <input name="password" type="text" class="form-control" style="border: 1px solid #1161D9; width:470px;font-family:ubuntu;height: 44px; margin-top:27px; color: #1161D9;" placeholder="Password" />
              </div>
            </div>
            <button type="submit" name="login" class="btn btn-secondary" style="margin-left: 400; background-color: #1161D9; color:#ffffff">SIGN IN</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

  <?php include("./inc/langChange.php") ?>

  <script>
    const passportInput = document.querySelector('[name=passport]');

    passportInput.addEventListener('blur', () => {
      if (passportInput.value.length < 9) {
        passportInput.classList.add('error')
      } else {
        if (passportInput.classList.contains('error')) {
          passportInput.classList.remove('error')
        }
      }
    })
  </script>

  <script>
    function onYes() {
      $('#exampleModal').modal('show');

      const form = $('[data-form]')[0].elements
      const genders = document.querySelectorAll('[name=gender]')


      const country = form.country.value
      const countryCode = form.countryCode.value
      const dob = form.dob.value
      const email = form.email.value
      const firstname = form.firstname.value
      const lastname = form.lastname.value
      const middlename = form.middlename.value
      const phone = form.phone.value
      const title = form.title.value
      const service = form.service.value
      const passport = form.passport.value
      const gender = Array.from(genders).filter(item => item.checked == true)[0].value
      const mode = "TWP"

      const data = {
        country,
        countryCode,
        dob,
        email,
        firstname,
        lastname,
        middlename,
        phone,
        title,
        service,
        passport,
        gender,
        mode
      }

      localStorage.setItem('USER_REG', JSON.stringify(data))
    }
  </script>
  <script>
    const formElement = document.querySelector('[data-form]')
    const inputElements = document.querySelectorAll('[data-length]')

    inputElements.forEach((element) => {
      element.addEventListener('keydown', () => {
        const value = element.value
        if(value.trim().length > 2) {
          if(element.classList.contains('error')) {
            element.classList.remove('error')
          }
        }
      })

      element.addEventListener("blur", () => {
        const value = element.value
        if(value.trim().length < 3) {
          element.classList.add('error')
        }else {
          if (element.classList.contains('error')) {
            element.classList.remove('error')
          }
        }
      })
    })


    formElement.addEventListener('submit', (e) => {
      e.preventDefault();

      const inputElements = document.querySelectorAll('[data-length]')
      inputElements.forEach(inputElement => {
        const elementValue = inputElement.value  

        if(elementValue.trim().length < 3) {
          elementValue.classList.add("error");
          inputElement.scrollIntoView({ behavior: "smooth" })
          return
        }
      })

      if (document.querySelector("#modal-yes").checked) {
        onYes()
      } else {
        if (localStorage.getItem("USER_REG")) {
          localStorage.removeItem("USER_REG");
          <?php unset($_SESSION["REG_MODE"]); ?>
        }
        formElement.submit()

      }
    })
  </script>
</body>

</html>