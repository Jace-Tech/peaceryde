<?php include("./inc/check_session.php") ?>
<?php
if (isset($_SESSION['APPLY_FORM_DATA'])) {
  $FORM_APPY = json_decode($_SESSION['APPLY_FORM_DATA'], true);
}
?>

<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
  <?php include("./google_analytics.php"); ?>
  <meta charset="utf-8" />
  <title>PeaceRyde Africa LLC - BI Form</title>
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script>
    $(document).ready(function() {
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
    });
  </script>

  <style>
    @media only screen and (max-width: 2560px) {
      .cardform {
        border: 1px solid #ffffff;
        height: 1300px;
      }
      .nbvformheight {
          position: relative;
          height: 2600px;
      }
      .topdiv {
    margin: 60px auto 66px;
 
}
    }

    @media only screen and (max-width: 900px) {
      .cardform {
        border: 1px solid #ffffff;
        height: 1350px;
      }
    }

    @media only screen and (max-width: 720px) {
      .cardform {
        border: 1px solid #ffffff;
        height: 1650px;
      }
    }

    @media only screen and (max-width: 600px) {
      .cardform {
        border: 1px solid #ffffff;
        height: 1600px;
      }
    }

    @media only screen and (max-width: 540px) {
      .cardform {
        border: 1px solid #ffffff;
        height: 1750px;
      }

    }
    .error {
      border: 1px solid red;
    }
  </style>

</head>


<body style="overflow-x: hidden;">
  <main class="new new-main layout">
    <!-- ======= section1 ======= -->
    <?php include("./inc/header.php"); ?>

    <section class=" new-section2__group layout2 nbvformheight" style="background-color: #f8f6f6;">
      <div class="new-section1__cover-block layout">
        <div class="movement">
          <h2 class="welcome"> Welcome!</h2>
          <p class="formtext">The first step in applying for a <span style="font-size: 20px; font-weight: 500;">Nigeria Business Incorporation</span> is to fill the form below.
            <span>It takes less than 5 minutes to do this. After you submit your application, you can</span>
            <span> move on to the next step to make payment.</span>
          </p>
          <p class="formtext" style="padding-top:50px">
          Processing duration takes two (2) weeks.
        </p>
          <div class="topdiv">
            <div class="card cardform">
              <div style="margin-top: 47px;">
                <h2 class="formh1">Fill the form below</h2>
                <p class="formp">Your personal details</p>
              </div>
              <div>
                <form data-form method="post" action="./handlers/form_handler.php">
                  <div class="container mt-15">
                    <div id="error-message" class="w-100 alert alert-dark text-sm">
                        All the fields are required!
                    </div>
                    <div class="row formml">
                      <div class="col-md-5">
                        <select required name="title" class="form-select" aria-label="Default select example" style="border: 1px solid #555555; margin-left:0px">
                          <option value="">Title</option>
                          <?php foreach ($titles as $title) : ?>
                            <?php if(isset($FORM_APPY["title"])): ?>
                              <option <?= ($FORM_APPY["title"] == $title) ? "selected" : "" ?> value="<?= $title ?>">
                                <?= $title ?>
                              </option>
                            <?php else: ?>
                              <option value="<?= $title ?>">
                                <?= $title ?>
                              </option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                        <p class="yourname" style="padding-left:10px;padding-top: 17px; padding-bottom: 17px;">Your name must be entered in English as it appears on your passport.</p>
                      </div>
                    </div>
                    <div class="row formml">
                      <div class="col-md-5">
                      <div class="form-group">
                            <label class="form-label">First Name</label>
                            <div class="input-group mb-3">
                              <input name="firstname" data-length required class="form-control firstname" value="<?= $FORM_APPY["firstname"] ?? "" ?>" placeholder="First Name (as on passport)">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-5">
                      <div class="form-group">
                            <label class="form-label">Middle Name</label>
                            <div class="input-group mb-3">
                              <input required name="middlename" data-length type="text" class="form-control firstname" placeholder="Middle Name (as on passport)">
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="row formml">
                      <div class="col-md-5">
                      <div class="form-group" style="margin-right: 0px;">
                            <label class="form-label">Last Name</label>
                            <div class="input-group mb-3">
                              <input class="form-control firstname" data-length name="lastname" type="text" value="<?= $FORM_APPY["lastname"] ?? "" ?>" required placeholder="Last Name (as on passport)">
                            </div>
                          </div>
                      </div>
                      <div class="col-md-5">
                      <div class="form-group" >
                          
                          <label>Gender</label>
                          <br>
                          <div class="form-check form-check-inline" style="margin-top:20px; padding-left:0px">
                            <div class="custom-control custom-radio">
                              <label class="custom-control-label" for="customControlValidation2">Male</label>
                              <input type="radio" class="custom-control-input" id="customControlValidation2" value="male" name="gender" required>
                            </div>
                          </div>
                          <div class="form-check form-check-inline" style="margin-left: -20px;">
                            <div class="custom-control custom-radio">
                              <label class="custom-control-label" for="customControlValidation3">Female</label>
                              <input type="radio" class="custom-control-input" id="customControlValidation3" value="female" name="gender">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row formml">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="form-label">Company Name</label>
                          <div class="input-group mb-3">
                            <input type="text" required name="companyName" data-length class="form-control firstname" placeholder="Company Name">
                          </div>
                        </div>                          
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                            <label class="mb-2">Personal Email</label>
                            <input type="hidden" name="bi">
                            <input type="hidden" name="service" value="srvs-003">
                            <div class="input-group mb-3">
                              <input required type="email" class="form-control firstname" name="email" value="<?= $FORM_APPY['email'] ?? "" ?>" placeholder="Email">
                            </div>
                        </div>
                      </div>
                    </div>
                                       
                    <div class="row formml">
                      <div class="col-md-5">
                      <div class="form-group"  >
                          <label class="form-label">Country</label>
                          <br>
                              <select required id="country" data-length name="country" class="form-select select" aria-label="Default select example" style="width:100%; margin-top:15px">
                                <option value="">Country </option>
                                <?php foreach ($country_fee as $key => $value) : ?>
                                  <option value="<?= $key ?>">
                                    <?php if ($key == "united states") : ?>
                                      United States of America
                                    <?php else : ?>
                                      <?= strtoupper(substr($key, 0, 1)) . substr($key, 1); ?>
                                    <?php endif; ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-5">
                      <div class="form-group">
                          <label class="form-label">Corporate Address</label>
                          <div class="input-group mb-3">
                            <input type="text" required name="coperateAddress" class="form-control firstname" placeholder="Corporate Address">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row formml">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="form-label">No of Shares</label>
                          <div class="input-group mb-3">
                            <input type="number" required name="shares" class="form-control firstname" placeholder="No of Shares">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                      <div class="form-group">
                          <label style="padding-top:7px">Mobile Number</label>                   
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <select required name="countryCode" id="" class="form-select code" aria-label="Default select example" style="margin-top:7px">
                                <option value="">+234</option>
                                <optgroup label="Country Code">
                                  <option data-countryCode="DZ" value="93">Afghanistan (+93)</option>
                                  <option data-countryCode="DZ" value="335">Albania (+355)</option>
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
                                  <option data-countryCode="CD" value="235">Chad (+235)</option>
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
                                  <option data-countryCode="KW" value="383">Kosovo (+383)</option>
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
                                  <option data-countryCode="MR" value="230">Mauritius (+230)</option>
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
                                  <option data-countryCode="KP" value="850">North Korea (+850)</option>
                                  <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                  <option data-countryCode="NO" value="47">Norway (+47)</option>
                                  <option data-countryCode="OM" value="968">Oman (+968)</option>
                                  <option data-countryCode="PW" value="92">Pakistan (+92)</option>
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
                                  <option data-countryCode="SM" value="1">Saint kitts and Nevis (+1)</option>
                                  <option data-countryCode="SM" value="1">Saint Lucia (+1)</option>
                                  <option data-countryCode="SM" value="1">Saint Vincent and the Grenadines (+1)</option>
                                  <option data-countryCode="SM" value="685">Samoa (+685)</option>
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
                                  <option data-countryCode="KR" value="82">South Korea (+82)</option>
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
                                  <option data-countryCode="TH" value="255">Thazania (+255)</option>
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
                                  <option data-countryCode="WF" value="212">Western Sahara (+212)</option>
                                  <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                  <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                  <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                  <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                </optgroup>
                              </select>
                            </div>
                            <input type="tel" required name="phone" value="<?= $FORM_APPY['phone'] ?? "" ?>" class="form-control firstname" placeholder="070XXXXXXXX">
                          </div>
                        </div> 
                        
                      </div>
                    </div>

                    <div class="row formml">
                      <div class="col-md-5">
                      <div class="form-group">
                            <label class="form-label">Date of Birth</label>
                            <div class="input-group mb-3">
                              <input type="text" data-date readonly required name="dob" class="form-control firstname" placeholder="dd-mm-yyyy" id="datepicker">
                            </div>
                            <p style="color: #C8730F; font-family: Ubuntu; font-size: 13px; font-style: normal; font-weight: 400;">You must be at least 18 years old to use this website.</p>
                        </div>
                      </div>
                      <div class="col-md-5">
                      </div>
                    </div>

                    <div class="row formml">
                      <div style="margin-top: 27px;">
                        <label>Are you a returning customer ? (do you have an account with us on this website)</label>
                        <br>
                        <div class="form-check form-check-inline" style="padding-left: 0px; padding-top: 5px;">
                          <div class="custom-control custom-radio">
                            <label class="custom-control-label" for="customControlValidation2">No</label>
                            <input class="custom-control-input" type="radio" id="customControlValidation2" name="radio-stacked" checked required>
                          </div>
                        </div>
                        <div class="form-check form-check-inline" style="padding-left: 0px; padding-top: 5px;">
                          <div class="custom-control custom-radio">
                            <label class="custom-control-label" for="customControlValidation3">Yes</label>
                            <input type="radio" class="custom-control-input" value="1" onclick="onYes()" id="modal-yes" name="radio-stacked">
                          </div>
                        </div>
                      </div>
                      <div class="bibtn" style="margin-left: 0px;">
                        <button type="submit" name="bi" class="btn proceed">Proceed to payment</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <comment content="======= End section7 =======" break="true"></comment><!-- ======= section8 ======= -->

    <!-- ======= End section8 ======= -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
          </div>
          <div class="modal-body">
          <form action="./handlers/login.php" method="post">
            <div class="form-row">
              <div class="form-group" style="width:100%">
                <input type="text" required name="email" class="form-control" style="border: 1px solid #1161D9; width:100%;font-family:ubuntu;height: 44px; margin-top:27px;  color: #1161D9;" placeholder="Email" />
                <input type="hidden" required name="redirect" value="../NBVForm.php">
                <div class="input-group mb-3">
                <input type="password" id="id_password" required name="password" class="form-control" style="border: 1px solid #1161D9; width:90%;font-family:ubuntu;height: 44px; margin-top:27px; color: #1161D9;" placeholder="Password" />
                    <span class="input-group-text fa fa-eye" style="height: 46px; margin-top: 26px;background: #1161D9; color: white;" id="togglePassword"></span>
                </div> 
              </div>
            </div>
            <button type="submit" name="login" class="btn btn-secondary" style="margin-left: 400; background-color: #1161D9; color:#ffffff; margin-top:15px; margin-bottom:10px;">SIGN IN</button>
          </form>
          <p><a href="./forgotpass" style="font-family: Rubik;font-size: 15px;font-weight: 400;color: #555555;text-decoration: none;">Forgot your password ?</a></p>
        </div>
          <!-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div> -->
        </div>
      </div>
    </div>
    <!--Start of Tawk.to Script-->
    <?php include("./inc/langChange.php") ?>
    <script>
     const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa fa-eye-slash');
});
  </script>
    <script>
      document.querySelector("#error-message").style.display = "none"
    </script>
    <script>
      function onYes() {
        $('#exampleModal').modal('show');

        const form = $('[data-form]')[0].elements
        const genders = document.querySelectorAll('[name=gender]')

        const shares = form.shares.value
        const firstname = form.firstname.value
        const lastname = form.lastname.value
        const dob = form.dob.value
        const countryCode = form.countryCode.value
        const email = form.email.value
        const country = form.country.value
        const middlename = form.middlename.value
        const coperateAddress = form.coperateAddress.value
        const companyName = form.companyName.value
        const phone = form.phone.value
        const service = form.service.value
        const title = form.title.value
        const gender = Array.from(genders).filter(item => item.checked == true)[0].value

        const mode = "BI"

        const data = {
          shares,
          companyName,
          firstname,
          phone,
          coperateAddress,
          dob,
          lastname,
          country,
          countryCode,
          gender,
          title,
          middlename,
          email,
          service,
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
          // dateInput.classList.add("error")
        // dateInput.scrollIntoView({ behavior: "smooth" })
        dateInput.focus();
        window.scrollTo({ top: (window.innerHeight / 2) + 200, left: 0, behavior: "smooth"})
          return
        }

        // Firstname
        const firstNameValue = document.querySelector("[name=firstname]")
        if (!firstNameValue.value.trim() || firstNameValue.value.trim().length < 3) {
          firstNameValue.classList.add("error")
          firstNameValue.scrollIntoView()
          firstNameValue.title = "Firstname is required"
          isValid = false
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
        }

        const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

        emailValue.addEventListener("keyup", () => {
          if (emailValue.value.trim().length >= 3 && emailRegex.test(emailValue.value.trim())) {
            if (emailValue.classList.contains('error')) {
              emailValue.classList.remove('error');
            }
          }
        })

        // Company Name
        const companyNameValue = document.querySelector("[name=companyName]")
        if (!companyNameValue.value.trim() || companyNameValue.value.trim().length < 3) {
          companyNameValue.classList.add("error")
          companyNameValue.scrollIntoView()
          companyNameValue.title = "Lastname is required"
          isValid = false
        }

        companyNameValue.addEventListener("keyup", () => {
          if (companyNameValue.value.trim().length >= 3) {
            if (companyNameValue.classList.contains('error')) {
              companyNameValue.classList.remove('error');
            }
          }
        })

        // Coperate Address
        const corporateValue = document.querySelector("[name=coperateAddress]")
        if (!corporateValue.value.trim() || corporateValue.value.trim().length < 3) {
          corporateValue.classList.add("error")
          corporateValue.scrollIntoView()
          corporateValue.title = "Lastname is required"
          isValid = false
        }

        corporateValue.addEventListener("keyup", () => {
          if (corporateValue.value.trim().length >= 3) {
            if (corporateValue.classList.contains('error')) {
              corporateValue.classList.remove('error');
            }
          }
        })

        // shares 
        const sharesValue = document.querySelector("[name=shares]")
        if (!sharesValue.value.trim() || sharesValue.value.trim().length < 2) {
          sharesValue.classList.add("error")
          sharesValue.scrollIntoView()
          sharesValue.title = "Lastname is required"
          isValid = false
        }

        sharesValue.addEventListener("keyup", () => {
          if (sharesValue.value.trim().length >= 2) {
            if (sharesValue.classList.contains('error')) {
              sharesValue.classList.remove('error');
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
        }

        countryCodeValue.addEventListener("change", () => {
          if (countryCodeValue.value) {
            if (countryCodeValue.classList.contains('error')) {
              countryCodeValue.classList.remove('error');
            }
          }
        })

        // Date of Birth
        const dob = document.querySelector("[name=dob]")
        if (!dob.value) {
          dob.classList.add("error")
          dob.scrollIntoView()
          dob.title = "Date of birth is required"
          isValid = false
        }

        dob.addEventListener("change", () => {
          if (dob.value) {
            if (dob.classList.contains('error')) {
              dob.classList.remove('error');
            }
          }
        })

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

        if(!isValid) {
        document.querySelector("#error-message").style.display = "block"
        setTimeout(() => {
          document.querySelector("#error-message").style.display = "none"
        }, 4000)
        return
      }


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
  </main>
  <script type="text/javascript">
    AOS.init();
  </script>
</body>

</html>