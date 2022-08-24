<?php include("./inc/check_session.php"); ?>


<?php
if (isset($_SESSION['APPLY_FORM_DATA'])) {
    $USER = json_decode($_SESSION['APPLY_FORM_DATA'], true);
}
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./dist/image/icon.png">
    <title>PeaceRyde Africa LLC</title>
    <!-- Custom CSS -->
    <link href="./assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="./assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="./assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="./dist/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        div#google_translate_element {
            visibility: hidden;
            position: absolute;
            z-index: -1;
            /* display: none; */
        }

        div#google_translate_element div.goog-te-gadget-simple {
            border: none;
            background-color: transparent;
            /*background-color: #17548d;*/
            /*#e3e3ff*/

        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value:hover {
            text-decoration: none;
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span {
            color: #aaa;
        }

        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:hover {
            color: white;
        }

        .goog-te-gadget-icon {
            display: none !important;
            /*background: url("url for the icon") 0 0 no-repeat !important;*/
        }

        /* Remove the down arrow */
        /* when dropdown open */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(213, 213, 213);"] {
            display: none;
        }

        /* after clicked/touched */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(118, 118, 118);"] {
            display: none;
        }

        /* on page load (not yet touched or clicked) */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="color: rgb(155, 155, 155);"] {
            display: none;
        }

        /* Remove span with left border line | (next to the arrow) in Chrome & Firefox */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="border-left: 1px solid rgb(187, 187, 187);"] {
            display: none;
        }

        /* Remove span with left border line | (next to the arrow) in Edge & IE11 */
        div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span[style="border-left-color: rgb(187, 187, 187); border-left-width: 1px; border-left-style: solid;"] {
            display: none;
        }

        /* HIDE the google translate toolbar */
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }
    </style>
    <style>
        .error {
            border-color: red;
        }

        .left-sidebar a:hover {
            color: #f1f1f1;
        }

        .left-sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .form-control::placeholder {
            color: #555555;
        }

        .form-select {
            color: #555555;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">


        <!-- Sidebar -->
        <?php include("./inc/sidebar.php"); ?>
        <!-- Sidebar -->

        <div class="page-wrapper" id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()"> <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 10px;
                margin-top: 50px;">
                    <rect y="6" width="19" height="3" fill="#A0BD1C" />
                    <rect y="12" width="19" height="3" fill="#A0BD1C" />
                    <rect width="19" height="3" fill="#A0BD1C" />
                </svg>
            </span>
            <div class="container">
                <div class="card" style="background-color: whitesmoke;">
                    <div style="align-self: start">
                        <h3 class="page-title title">Nigeria Temporary Work Permit</h3>
                        <p class="fill">Fill the Form Below</p>
                        <p class="personal">Your personal details</p>
                    </div>
                    <form action="../handlers/form_handler.php" method="post" class="formml" data-form>
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-3 col-xl-3">
                                    <label class="form-label">Title</label>
                                    <select required class="form-select fmselect" aria-label="Default select example" name="title">
                                        <option selected>Title</option>
                                        <?php foreach ($titles as $title) : ?>
                                            <option value="<?= $title ?>"><?= $title ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <p class="nameappears">Your name must be entered in English as it appears on your passport.</p>

                            <div class="row" style="margin-top: 25px;">
                                <div class="col-md-4 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input name="firstname" required data-length type="text" value="<?= $USER['firstname'] ?? ""; ?>" class="form-control firstname" placeholder="First Name (as on passport)">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="form-label">Middle Name</label>
                                        <input name="middlename" required data-length type="text" value="<?= $USER['middle_name'] ?? ""; ?>" class="form-control middlename" placeholder="Middle Name (as on passport)">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="form-label">Last Name</label>
                                        <input name="lastname" required data-length type="text" value="<?= $USER['lastname'] ?? ""; ?>" class="form-control lastname" placeholder="Last Name (as on passport)">
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-top: 25px;">
                                <div class="col-md-4 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="text" data-date required readonly id="datepicker" name="dob" class="form-control dob" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <label>Gender</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="male" class="custom-control-input" id="customControlValidation2" name="gender" required>
                                            <label class="custom-control-label" for="customControlValidation2">Male</label>
                                        </div>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="female" class="custom-control-input" id="customControlValidation3" name="gender">
                                            <label class="custom-control-label" for="customControlValidation3">Female</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-top: 25px;">
                                <div class="col-md-4 col-xl-3">
                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" required class="form-control email" name="email" value="<?= $USER['email']; ?>" placeholder="Email address">
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-3">
                                    <div class="form-group">
                                        <input type="hidden" name="service" value="srvs-001">
                                        <input type="hidden" name="twp">
                                        <label class="form-label">Passport No</label>
                                        <input type="text" data-length required name="passport" class="form-control passno" value="<?= $USER["passport"] ?? "" ?>" placeholder="Passport No">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 25px;">
                                <div class="col-xl-4 col-md-4 col-lg-4">
                                    <label class="form-label">Mobile Number</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <select class="custom-select" required name="countryCode" id="inputGroupSelect01" style="width: 100px;height:43px; background-color: #ADC92E; color: #F9FFFF; font-size:11px;">
                                                        <option value="">Country code</option>
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
                                                        <option data-countryCode="US" value="1">USA (+1)</option>
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
                                                <input type="text" data-length required name="phone" class="form-control mobileno2" placeholder="Mobile Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="please">Please select below your Nationality (as on passport)</p>
                            <div class="row">
                                <div class="col-md-4 col-xl-3">
                                    <label class="form-label">Country</label>
                                    <select required name="country" class="form-select nationality" aria-label="Default select example">
                                        <option value="">Select Country</option>
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
                                </div>
                            </div>

                        </div>
                        <div class="divbtn">
                            <button data-btn type="submit" name="twp" class="btn btnproceed">Proceed to Payment</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
    <script>
        const formElement = document.querySelector('[data-form]')
        const inputElements = document.querySelectorAll('[data-length]')

        inputElements.forEach((element) => {
            element.addEventListener('keydown', () => {
                const value = element.value
                if (value.trim().length > 2) {
                    if (element.classList.contains('error')) {
                        element.classList.remove('error')
                    }
                }
            })

            element.addEventListener("blur", () => {
                const value = element.value
                if (value.trim().length < 3) {
                    element.classList.add('error')
                } else {
                    if (element.classList.contains('error')) {
                        element.classList.remove('error')
                    }
                }
            })
        })

        const dateInput = document.querySelector("[data-date]")
        dateInput.addEventListener('change', () => {
            const value = dateInput.value.trim()
            console.log(value)
            if(!value) {
                dateInput.classList.add("error")
            }
            else {
                if(dateInput.classList.contains("error")) {
                dateInput.classList.remove("error")
                }
            }
        })

        formElement.addEventListener('submit', (e) => {
            e.preventDefault();

            // Check if the inputs are filled 
            let isValid = true;

            if(!dateInput.value.trim()) {
                dateInput.classList.add("error")
                // dateInput.scrollIntoView({ behavior: "smooth" })
                dateInput.focus();
                window.scrollTo({ top: 100, left: 0, behavior: "smooth"})
                return
            }

            // Firstname
            const firstNameValue = document.querySelector("[name=firstname]")
            if (!firstNameValue.value.trim() || firstNameValue.value.trim().length < 3) {
                firstNameValue.classList.add("error")
                firstNameValue.scrollIntoView()
                firstNameValue.title = "Firstname is required"
                isValid = false
                return
            }

            firstNameValue.addEventListener("keyup", () => {
                if (firstNameValue.value.trim().length >= 3) {
                    if (firstNameValue.classList.contains('error')) {
                        firstNameValue.classList.remove('error');
                    }
                }
            })

            // Lastname
            const lastnameValue = document.querySelector("[name=lastname]")
            if (!lastnameValue.value.trim() || lastnameValue.value.trim().length < 3) {
                lastnameValue.classList.add("error")
                lastnameValue.scrollIntoView()
                lastnameValue.title = "Lastname is required"
                isValid = false
                return
            }

            lastnameValue.addEventListener("keyup", () => {
                if (lastnameValue.value.trim().length >= 3) {
                    if (lastnameValue.classList.contains('error')) {
                        lastnameValue.classList.remove('error');
                    }
                }
            })

            // Phone
            const phoneValue = document.querySelector("[name=phone]")
            if (!phoneValue.value.trim() || phoneValue.value.trim().length < 3) {
                phoneValue.classList.add("error")
                phoneValue.scrollIntoView()
                phoneValue.title = "Phone is required"
                isValid = false
                return
            }

            phoneValue.addEventListener("keyup", () => {
                if (phoneValue.value.trim().length >= 3) {
                    if (phoneValue.classList.contains('error')) {
                        phoneValue.classList.remove('error');
                    }
                }
            })

            // Email
            const emailValue = document.querySelector("[name=email]")
            if (!emailValue.value.trim() || emailValue.value.trim().length < 3) {
                emailValue.classList.add("error")
                emailValue.scrollIntoView()
                emailValue.title = "Lastname is required"
                isValid = false
                return
            }

            const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

            emailValue.addEventListener("keyup", () => {
                if (emailValue.value.trim().length >= 3 && emailRegex.test(emailValue.value.trim())) {
                    if (emailValue.classList.contains('error')) {
                        emailValue.classList.remove('error');
                    }
                }
            })

            // Passport
            const passportValue = document.querySelector("[name=passport]")
            if (!passportValue.value.trim() || passportValue.value.trim().length < 3) {
                passportValue.classList.add("error")
                passportValue.scrollIntoView()
                passportValue.title = "Lastname is required"
                isValid = false
                return
            }

            passportValue.addEventListener("keyup", () => {
                if (passportValue.value.trim().length >= 3) {
                    if (passportValue.classList.contains('error')) {
                        passportValue.classList.remove('error');
                    }
                }
            })

            // Country Code
            const countryCodeValue = document.querySelector("[name=countryCode]")
            if (!countryCodeValue.value) {
                countryCodeValue.classList.add("error")
                countryCodeValue.scrollIntoView()
                countryCodeValue.title = "Country code is required"
                isValid = false
                return
            }

            // Country 
            const countryValue = document.querySelector("[name=country]")
            if (!countryValue.value) {
                countryValue.classList.add("error")
                countryValue.scrollIntoView()
                countryValue.title = "country is required"
                isValid = false
                return
            }

            const inputElements = document.querySelectorAll('[data-length]')
            inputElements.forEach(inputElement => {
                const elementValue = inputElement.value

                if (elementValue.trim().length < 3) {
                    elementValue.classList.add("error");
                    inputElement.scrollIntoView({
                        behavior: "smooth"
                    })
                    return
                }
            })

            if (!isValid) {
                document.querySelector("#error-message").style.display = "block"
                setTimeout(() => {
                    document.querySelector("#error-message").style.display = "none"
                }, 4000)
                return
            }

            formElement.submit()
        })
    </script>
    <script>
        console.clear();
        const storedUser = localStorage.getItem("USER_REG");
        const form = document.querySelector("[data-form]")
        console.log({
            storedUser
        });
        const genders = document.querySelectorAll('[name=gender]')

        if (storedUser) {
            const {
                email,
                dob,
                title,
                passport,
                gender,
                country,
                countryCode,
                firstname,
                middlename,
                lastname,
                service,
                phone
            } = JSON.parse(storedUser)

            form.elements.email.value = email
            form.elements.dob.value = dob
            form.elements.firstname.value = firstname
            form.elements.lastname.value = lastname
            form.elements.middlename.value = middlename
            form.elements.lastname.value = lastname
            form.elements.service.value = service
            form.elements.phone.value = phone
            form.elements.passport.value = passport
            Array.from(form.elements.title.children).filter(item => item.value == title)[0].selected = true
            Array.from(form.elements.country.children).filter(item => item.value == country)[0].selected = true
            Array.from(form.elements.countryCode.children).filter(item => item.value == countryCode)[0].selected = true
            Array.from(genders).filter(item => item.value == gender)[0].checked = true
        }

        document.querySelector("[data-btn]")
            .addEventListener("click", () => {
                localStorage.removeItem("USER_REG")
                form.submit()
            })
    </script>
    <script>
        if (localStorage.getItem('USER_REG')) {
            localStorage.removeItem("USER_REG")
        }
    </script>
    <script>
        function openNav() {

            if (screen.width >= 800) {
                document.getElementById("sidebar").style.width = "260px";
                document.getElementById("main").style.marginLeft = "260px";
            } else {
                document.getElementById("sidebar").style.width = "100%";
                document.getElementById("main").style.marginLeft = "100%";
            }
        }

        /* Close Nav */
        function closeNav() {

            if (screen.width >= 768) {
                document.getElementById("sidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";;
            } else {
                document.getElementById("sidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";;
            }
        }
    </script>

    <script>
        const MIN_AGE = 18
        const offset = +(new Date().getFullYear()) - MIN_AGE
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: `${1950 + (MIN_AGE / 2)}:${offset}`,
            defaultDate: new Date(),
            showAnim: "blind",
            maxDate: new Date(offset + 1, 0, 0),
            dateFormat: "dd-mm-yy"
        });

        $("#datepicker").click(function() {
            $(this).val("");
        });
    </script>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="./dist/js/app-style-switcher.js"></script>
    <script src="./dist/js/feather.min.js"></script>
    <script src="./assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="./dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="./dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="./assets/extra-libs/c3/d3.min.js"></script>
    <script src="./assets/extra-libs/c3/c3.min.js"></script>
    <script src="./assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="./assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="./assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="./assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="./dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>