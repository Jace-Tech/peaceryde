<?php include("./inc/check_session.php") ?>

<?php
    $reviews = new Review($connect);
    $users = new User($connect);
    $uploads = new Upload($connect);
?>

<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon.png">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/New.css" />
    <link rel="stylesheet" type="text/css" href="css/Laptops.css">
    <link rel="stylesheet" type="text/css" href="css/smallscreen800.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>

    <script src="js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        .avater {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 500;
        }
    </style>
</head>


<body class="body">
    <main class="new new-main layout" style="overflow-x: hidden;">
        <!-- ======= section1 ======= -->
        <!-- Header Here -->
        <?php include("./inc/header.php"); ?>
        <!-- Header Here -->

        <section class=" new-section1__group layout2">

            <div class="background new-section1__cover-block layout ">
                <div class="movement">
                    <h4 class="new-section1__highlights5-box layout">
                        <pre class="new-section1__highlights5 shop">
                Your One-stop shop for </pre>
                    </h4>
                    <h1 class="bannertext new-section1__hero-title2 layout ">
                        Nigeria Visa and <br>Business Incorporation
                    </h1>
                    <h2 class="new-section1__medium-title layout made">
                        Made easy, fast and convenient!
                    </h2>
                    <div class="new-section1__block11 layout applys">
                        <a href="apply.php" class="btn applybtn">Apply NOW</a>

                        <!-- <h5 class="new-section1__highlights1 layout">Apply NOW</h5> -->
                    </div>
                </div>
            </div>


        </section>

        </section>
        <comment content="======= End section1 =======" break="true"></comment><!-- ======= section2 ======= -->
        <section class="new-section2__section2 layout">
            <div class="movement">
                <div class="new-section2__flex layout row">
                    <div class="new-section2__flex-spacer"></div>
                    <div class="new-section2__flex-item col-md-4 col-sm-4 col-lg-4">
                        <div class="new-section2__block12 layout">
                            <div class="new-section2__flex6 layout">
                                <h5 class="new-section2__highlights6 layout">
                                    Nigeria business Visa On Arrival
                                </h5>
                                <div style=" border-top: 1px solid #000080; height: 1px; margin-top: 10px; margin-bottom: 25px;">
                                </div>
                                <!-- <hr style="border: 1px solid #060a5c; "> -->
                                <div style="display: flex;
                justify-content: center;">
                                    <img src="assets/Passport.png" width="139">
                                </div>

                                <div class="new-section2__paragraph-body1-box layout">
                                    <pre class="new-section2__paragraph-body1">VOA is required for persons of legal age intending to come to Nigeria for business, and pleasure. The VOA immigration approval is needed for visa issuance in Nigeria.</pre>
                                </div>
                                <div class="new-section2__block13a layout">
                                    <a href="NBVForm.php" class="btn" style="font-family: Ubuntu;
                  font-style: normal;
                  font-weight: normal;
                  font-size: 14px;
                  line-height: 16px;
                  color: #FBFCFB;">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-section2__flex-spacer1"></div>
                    <div class="new-section2__flex-item col-md-4 col-sm-4 col-lg-4">
                        <div class="new-section2__block12 layout">
                            <div class="new-section2__flex6 layout">
                                <h5 class="new-section2__highlights6 layout">
                                    Nigeria Temporary Work Permit ( TWP)
                                </h5>
                                <div style=" border-top: 1px solid #060a5c; height: 1px; margin-top: 10px; margin-bottom: 25px;">
                                </div>
                                <!-- <hr style="border: 1px solid #060a5c; "> -->
                                <div style="display: flex;
                justify-content: center;">
                                    <img src="assets/twp.png" width="139">
                                </div>

                                <div class="new-section2__paragraph-body1-box layout">
                                    <pre class="new-section2__paragraph-body1">TWP is required for persons of legal age intending to work in Nigeria. The TWP immigration approval is a prerequisite for issuance of a TWP visa in a Nigerian embassy abroad.</pre>
                                </div>
                                <div class="new-section2__block13 layout">
                                    <a href="NTWPForm.php" class="btn" style="font-family: Ubuntu;
                  font-style: normal;
                  font-weight: normal;
                  font-size: 14px;
                  line-height: 16px;
                  color: #FBFCFB;">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-section2__flex-spacer1"></div>
                    <div class="new-section2__flex-item col-md-4 col-sm-4 col-lg-4">
                        <div class="new-section2__block12 layout">
                            <div class="new-section2__flex6 layout">
                                <h5 class="new-section2__highlights6 layout">
                                    Nigeria Business Incorporation
                                </h5>
                                <div style=" border-top: 1px solid #060a5c; height: 1px; margin-top: 10px; margin-bottom: 25px;">
                                </div>
                                <!-- <hr style="border: 1px solid #060a5c; "> -->
                                <div style="display: flex;
                justify-content: center;">
                                    <img src="assets/nbi.png" width="139" height="112">
                                </div>

                                <div class="new-section2__paragraph-body1-box layout">
                                    <pre class="new-section2__paragraph-body1">This is applicable to anyone of legal age intending to register a business in Nigeria.</pre>
                                </div>
                                <div class="new-section2__block13b layout">
                                    <a href="BIForm.php" class="btn" style="font-family: Ubuntu;
                  font-style: normal;
                  font-weight: normal;
                  font-size: 14px;
                  line-height: 16px;
                  color: #FBFCFB;">Apply</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
        <comment content="======= End section2 =======" break="true"></comment><!-- ======= section3 ======= -->
        <!-- <section class="new-section3__section3 layout row">
        
          <div class="col-md-12">
            <div class="new-section3__group layout " style="background-color: white;">
              
              <div class="new-section3__block2 layout">
                <div class="">
                  <div class="new-section3__block2-spacer"></div>
                <div class="width">
                  <div class="row indexdivrow">
                    <div class="col-md-3 col-xs-3 col-sm-3">
                      <div class="new-section3__block2-item">
                        <div class="new-section3__block3 layout">
                          <div class="new-section3__block3-item">
                            <div
                              style="background-image: url(assets/nationality.png); background-repeat: no-repeat;"
                              class="new-section3__icon4 layout">
                            </div>
                          </div>
                          <div class="new-section3__block3-spacer"></div>
                          <div class="new-section3__block3-item1">
                            <div class="new-section3__flex9 layout">
                              <h5 class="new-section3__highlights2 layout">
                                Nationality
                              </h5>
                              <select class="form-select" style="border: 1px solid transparent; padding: 0; font-weight: 600;"
                                aria-label="Default select example">
                                <option selected>Please Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
    
                            </div>
                          </div>
    
                        </div>
                      </div>
                    </div>
        
                    <div class="col-md-3 col-xs-3 col-sm-3 ml-80">
                      <div class="new-section3__block2-item1">
                        <div class="new-section3__block5 layout">
                          <div class="new-section3__block5-item">
                            <div style="background-image: url(assets/location.png); background-repeat: no-repeat;"
                              class="new-section3__icon4 layout">
                            </div>
                          </div>
                          <div class="new-section3__block5-spacer"></div>
                          <div class="new-section3__block5-item1">
                            <div class="new-section3__flex10 layout">
                              <h5 class="new-section3__highlights2 layout1">
                                Current Location
                              </h5>
                              <select class="form-select" style="border: 1px solid transparent; padding: 0;font-weight: 600;"
                                aria-label="Default select example">
                                <option selected>Please Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
        
                    <div class="col-md-3 col-xs-3 col-sm-3 ml-80" >
                      <div class="new-section3__block2-item2">
                        <div class="new-section3__block7 layout">
                          <div class="new-section3__block5-item">
                            <div style="background-image: url(assets/purpose.png); background-repeat: no-repeat;"
                              class="new-section3__icon4 layout">
                            </div>
                          </div>
                          <div class="new-section3__block7-spacer"></div>
                          <div class="new-section3__block7-item1">
                            <div class="new-section3__flex9 layout">
                              <h5 class="new-section3__highlights2 layout2">Purpose</h5>
                              <h5 class="new-section3__highlights31-box layout1">
                                <select class="form-select" style="border: 1px solid transparent; padding: 0;font-weight: 600;"
                                  aria-label="Default select example">
                                  <option selected>Please Select</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                                </select>
                              </h5>
                            </div>
                          </div>
        
                        </div>
                      </div>
                    </div>
        
                  </div>
                </div>
            
                </div>
                <div class="row ">
                  <button class="btn blue">
                    <div class="row">
                      <div class="col-md-9">
                        <h4 class="new-section3__highlights4 layout">Get started</h4>
                      </div>
                      <div class="col-md-3"> <img src="assets/arrow.png" style="margin-top: 10px;
                        margin-right: 50px;"></div>
                    </div>
    
                  </button>
                </div>
    
              </div>
            </div>
          </div>
      </section> -->
        <comment content="======= End section3 =======" break="true"></comment><!-- ======= section4 ======= -->

        <section class="">
            <div class="p-2" style="background-color: #1161D9;">
                <h1 style="font-size: 2rem; text-align: center; color: white; padding-top:90px; font-weight:400; font-family: Rubik, Helvetica, Arial, serif;">
                    How does the Visa Process work?
                </h1>

                <h4 style=" text-align: center; color: white; font-family: rubik; padding-top: 13px; font-size: 16px; font-weight: 300;" class="">
                    Only 5 simple steps to process your Nigeria Visa
                </h4>
                <div class="container-fluid" style="margin-bottom: 137px">
                    <div class="movement">
                        <ul class="list-group list-group-horizontal ">
                            <li class="mt-5">
                                <div>
                                    <!-- <img src="assets/1.png" class="img1" width="113"> -->
                                    <svg width="113" height="113" class="img1" viewBox="0 0 113 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M113 56.2349C113 87.2926 87.7041 112.47 56.5 112.47C25.2959 112.47 0 87.2926 0 56.2349C0 25.1772 25.2959 0 56.5 0C87.7041 0 113 25.1772 113 56.2349Z" fill="#F1F5F6" />
                                        <path d="M46 57.25C46 56.9185 46.1317 56.6005 46.3661 56.3661C46.6005 56.1317 46.9185 56 47.25 56C47.5815 56 47.8995 56.1317 48.1339 56.3661C48.3683 56.6005 48.5 56.9185 48.5 57.25C48.5 57.5815 48.3683 57.8995 48.1339 58.1339C47.8995 58.3683 47.5815 58.5 47.25 58.5C46.9185 58.5 46.6005 58.3683 46.3661 58.1339C46.1317 57.8995 46 57.5815 46 57.25ZM47.25 61C46.9185 61 46.6005 61.1317 46.3661 61.3661C46.1317 61.6005 46 61.9185 46 62.25C46 62.5815 46.1317 62.8995 46.3661 63.1339C46.6005 63.3683 46.9185 63.5 47.25 63.5C47.5815 63.5 47.8995 63.3683 48.1339 63.1339C48.3683 62.8995 48.5 62.5815 48.5 62.25C48.5 61.9185 48.3683 61.6005 48.1339 61.3661C47.8995 61.1317 47.5815 61 47.25 61ZM46 67.25C46 66.9185 46.1317 66.6005 46.3661 66.3661C46.6005 66.1317 46.9185 66 47.25 66C47.5815 66 47.8995 66.1317 48.1339 66.3661C48.3683 66.6005 48.5 66.9185 48.5 67.25C48.5 67.5815 48.3683 67.8995 48.1339 68.1339C47.8995 68.3683 47.5815 68.5 47.25 68.5C46.9185 68.5 46.6005 68.3683 46.3661 68.1339C46.1317 67.8995 46 67.5815 46 67.25ZM52.25 56C51.9185 56 51.6005 56.1317 51.3661 56.3661C51.1317 56.6005 51 56.9185 51 57.25C51 57.5815 51.1317 57.8995 51.3661 58.1339C51.6005 58.3683 51.9185 58.5 52.25 58.5H64.75C65.0815 58.5 65.3995 58.3683 65.6339 58.1339C65.8683 57.8995 66 57.5815 66 57.25C66 56.9185 65.8683 56.6005 65.6339 56.3661C65.3995 56.1317 65.0815 56 64.75 56H52.25ZM51 62.25C51 61.9185 51.1317 61.6005 51.3661 61.3661C51.6005 61.1317 51.9185 61 52.25 61H64.75C65.0815 61 65.3995 61.1317 65.6339 61.3661C65.8683 61.6005 66 61.9185 66 62.25C66 62.5815 65.8683 62.8995 65.6339 63.1339C65.3995 63.3683 65.0815 63.5 64.75 63.5H52.25C51.9185 63.5 51.6005 63.3683 51.3661 63.1339C51.1317 62.8995 51 62.5815 51 62.25ZM52.25 66C51.9185 66 51.6005 66.1317 51.3661 66.3661C51.1317 66.6005 51 66.9185 51 67.25C51 67.5815 51.1317 67.8995 51.3661 68.1339C51.6005 68.3683 51.9185 68.5 52.25 68.5H64.75C65.0815 68.5 65.3995 68.3683 65.6339 68.1339C65.8683 67.8995 66 67.5815 66 67.25C66 66.9185 65.8683 66.6005 65.6339 66.3661C65.3995 66.1317 65.0815 66 64.75 66H52.25ZM46 36C44.6739 36 43.4021 36.5268 42.4645 37.4645C41.5268 38.4021 41 39.6739 41 41V71C41 72.3261 41.5268 73.5979 42.4645 74.5355C43.4021 75.4732 44.6739 76 46 76H66C67.3261 76 68.5979 75.4732 69.5355 74.5355C70.4732 73.5979 71 72.3261 71 71V49.535C70.9991 48.5408 70.6035 47.5876 69.9 46.885L60.115 37.0975C59.412 36.395 58.4589 36.0002 57.465 36H46ZM43.5 41C43.5 40.337 43.7634 39.7011 44.2322 39.2322C44.7011 38.7634 45.337 38.5 46 38.5H56V47.25C56 48.2446 56.3951 49.1984 57.0983 49.9017C57.8016 50.6049 58.7554 51 59.75 51H68.5V71C68.5 71.663 68.2366 72.2989 67.7678 72.7678C67.2989 73.2366 66.663 73.5 66 73.5H46C45.337 73.5 44.7011 73.2366 44.2322 72.7678C43.7634 72.2989 43.5 71.663 43.5 71V41ZM67.9825 48.5H59.75C59.4185 48.5 59.1005 48.3683 58.8661 48.1339C58.6317 47.8995 58.5 47.5815 58.5 47.25V39.0175L67.9825 48.5Z" fill="#0A0E69" />
                                    </svg>
                                    <h1 class="img1h1">
                                        1</h1>

                                    <h4 class="img1h4">
                                        <span id="content1">Fill Online</span>
                                        <span id="content2">application form</span>
                                    </h4>
                                </div>
                            </li>
                            <li class="mt-5">
                                <div>
                                    <!-- <img src="assets/2.png" width="113" class="img2"> -->
                                    <svg width="113" height="113" class="img2" viewBox="0 0 113 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M113 56.2349C113 87.2926 87.7041 112.47 56.5 112.47C25.2959 112.47 0 87.2926 0 56.2349C0 25.1772 25.2959 0 56.5 0C87.7041 0 113 25.1772 113 56.2349Z" fill="#F1F5F6" />
                                        <path d="M64.75 63.5C64.4185 63.5 64.1005 63.6317 63.8661 63.8661C63.6317 64.1005 63.5 64.4185 63.5 64.75C63.5 65.0815 63.6317 65.3995 63.8661 65.6339C64.1005 65.8683 64.4185 66 64.75 66H69.75C70.0815 66 70.3995 65.8683 70.6339 65.6339C70.8683 65.3995 71 65.0815 71 64.75C71 64.4185 70.8683 64.1005 70.6339 63.8661C70.3995 63.6317 70.0815 63.5 69.75 63.5H64.75ZM36 47.25C36 45.5924 36.6585 44.0027 37.8306 42.8306C39.0027 41.6585 40.5924 41 42.25 41H69.75C71.4076 41 72.9973 41.6585 74.1694 42.8306C75.3415 44.0027 76 45.5924 76 47.25V64.75C76 66.4076 75.3415 67.9973 74.1694 69.1694C72.9973 70.3415 71.4076 71 69.75 71H42.25C40.5924 71 39.0027 70.3415 37.8306 69.1694C36.6585 67.9973 36 66.4076 36 64.75V47.25ZM38.5 64.75C38.5 65.7446 38.8951 66.6984 39.5983 67.4017C40.3016 68.1049 41.2554 68.5 42.25 68.5H69.75C70.7446 68.5 71.6984 68.1049 72.4016 67.4017C73.1049 66.6984 73.5 65.7446 73.5 64.75V53.5H38.5V64.75ZM73.5 47.25C73.5 46.2554 73.1049 45.3016 72.4016 44.5983C71.6984 43.8951 70.7446 43.5 69.75 43.5H42.25C41.2554 43.5 40.3016 43.8951 39.5983 44.5983C38.8951 45.3016 38.5 46.2554 38.5 47.25V51H73.5V47.25Z" fill="#0A0E69" />
                                    </svg>

                                    <h1 class="img2h1">
                                        2
                                    </h1>

                                    <h4 class="mt-2 img2h4">Make
                                        Payment</h4>
                                </div>
                            </li>
                            <li class="mt-5">
                                <div class="">
                                    <!-- <img src="assets/3.png" width="113" > -->
                                    <svg width="113" height="113" class="img3" viewBox="0 0 113 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M113 56.2349C113 87.2926 87.7041 112.47 56.5 112.47C25.2959 112.47 0 87.2926 0 56.2349C0 25.1772 25.2959 0 56.5 0C87.7041 0 113 25.1772 113 56.2349Z" fill="#F1F5F6" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M56.4333 55.0985C56.5065 55.1337 56.5761 55.1781 56.6402 55.2316L61.833 59.3858C62.2643 59.7308 62.3342 60.3601 61.9892 60.7914C61.6442 61.2227 61.0149 61.2926 60.5836 60.9476L57 58.0807V74.75C57 75.3023 56.5523 75.75 56 75.75C55.4477 75.75 55 75.3023 55 74.75V58.0807L51.4164 60.9476C50.9851 61.2926 50.3558 61.2227 50.0108 60.7914C49.6658 60.3601 49.7357 59.7308 50.167 59.3858L55.3598 55.2316C55.4239 55.1781 55.4935 55.1337 55.5667 55.0985C55.5892 55.0877 55.6122 55.0777 55.6356 55.0685C55.668 55.0558 55.7009 55.0449 55.7342 55.0357C55.8213 55.0118 55.9108 54.9999 56 55C56.0912 54.9999 56.1826 55.0123 56.2716 55.0374C56.3136 55.0492 56.355 55.0638 56.3956 55.0813C56.4083 55.0868 56.4209 55.0925 56.4333 55.0985ZM55 56.008V56C55 55.9059 55.013 55.8148 55.0373 55.7284M57 56H56L55.3753 55.2192" fill="#0A0E69" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M42.4573 49.7496C42.5921 50.2852 42.2671 50.8286 41.7316 50.9634C39.9975 51.3998 38.4824 52.4543 37.4711 53.9289C36.4597 55.4035 36.0216 57.1967 36.2391 58.9716C36.4566 60.7464 37.3147 62.3808 38.6522 63.5675C39.9894 64.754 41.7137 65.4115 43.5013 65.4166H45.5834C46.1356 65.4166 46.5834 65.8643 46.5834 66.4166C46.5834 66.9688 46.1356 67.4166 45.5834 67.4166H43.5L43.4974 67.4166C41.2219 67.4105 39.0269 66.5738 37.3248 65.0635C35.6227 63.5533 34.5307 61.4735 34.2539 59.2148C33.9771 56.9562 34.5347 54.6743 35.8217 52.7977C37.1088 50.9211 39.0368 49.5792 41.2435 49.0239C41.7791 48.8891 42.3225 49.214 42.4573 49.7496Z" fill="#0A0E69" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M50.6222 36.4224C53.7323 35.852 56.943 36.4856 59.6033 38.1946C62.2636 39.9036 64.1745 42.5602 64.9487 45.626C65.084 46.1614 64.7595 46.7052 64.224 46.8404C63.6886 46.9756 63.1448 46.6511 63.0096 46.1157C62.3597 43.5421 60.7555 41.3119 58.5223 39.8773C56.289 38.4426 53.5938 37.9108 50.983 38.3896C48.3722 38.8685 46.0411 40.3221 44.4624 42.4559C42.8898 44.5812 42.1808 47.223 42.4773 49.8494L42.4847 49.8891C42.4935 49.9353 42.5072 50.0044 42.5257 50.0913C42.5627 50.2657 42.6185 50.5088 42.693 50.781C42.8486 51.3502 43.0608 51.9527 43.306 52.3444C43.599 52.8125 43.4571 53.4296 42.989 53.7226C42.5208 54.0156 41.9038 53.8737 41.6107 53.4056C41.2038 52.7556 40.9306 51.9185 40.7638 51.3085C40.677 50.9912 40.6124 50.7098 40.5694 50.5071C40.5477 50.4055 40.5314 50.3228 40.5203 50.2645C40.5147 50.2353 40.5104 50.2121 40.5074 50.1956L40.5038 50.176L40.5028 50.17L40.5023 50.167C40.499 50.1484 40.4963 50.1298 40.4942 50.111C40.1301 46.97 40.9739 43.8082 42.8546 41.2663C44.7353 38.7245 47.5121 36.9928 50.6222 36.4224Z" fill="#0A0E69" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M63.7459 44.8983C65.3135 44.5222 66.943 44.4823 68.5272 44.7814C70.1113 45.0804 71.6142 45.7115 72.9369 46.6332C74.2595 47.5549 75.372 48.7463 76.201 50.1289C77.03 51.5115 77.5569 53.054 77.7468 54.6549C77.9367 56.2558 77.7854 57.8788 77.3029 59.417C76.8204 60.9552 76.0176 62.3738 74.9473 63.5794C73.877 64.785 72.5635 65.7502 71.0933 66.4116C69.6231 67.073 68.0295 67.4155 66.4174 67.4166C65.8651 67.417 65.4171 66.9695 65.4167 66.4173C65.4163 65.865 65.8637 65.417 66.416 65.4166C67.7457 65.4157 69.0602 65.1332 70.2728 64.5877C71.4855 64.0421 72.5689 63.246 73.4516 62.2516C74.3344 61.2572 74.9966 60.0871 75.3946 58.8184C75.7926 57.5496 75.9174 56.211 75.7607 54.8905C75.6041 53.5701 75.1695 52.2978 74.4857 51.1574C73.8019 50.017 72.8843 49.0343 71.7934 48.2741C70.7024 47.5138 69.4629 46.9933 68.1562 46.7466C66.8544 46.5009 65.5155 46.5327 64.2269 46.8397L61.471 47.5898C60.9381 47.7349 60.3885 47.4204 60.2435 46.8875C60.0984 46.3546 60.4129 45.8051 60.9458 45.66L63.7166 44.9059C63.7263 44.9032 63.7361 44.9007 63.7459 44.8983Z" fill="#0A0E69" />
                                    </svg>

                                    <h1 class="img3h1">
                                        3
                                    </h1>

                                    <h4 class="mt-2 img3h4">
                                        Upload
                                        relevant documents</h4>
                                </div>
                            </li>
                            <li class="mt-5">
                                <div>
                                    <!-- <img src="assets/4.png" width="113" class="img4"> -->
                                    <svg width="113" height="113" class="img4" viewBox="0 0 113 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M113 56.2349C113 87.2926 87.7041 112.47 56.5 112.47C25.2959 112.47 0 87.2926 0 56.2349C0 25.1772 25.2959 0 56.5 0C87.7041 0 113 25.1772 113 56.2349Z" fill="#F1F5F6" />
                                        <path d="M76.875 58.2499C76.8724 54.0746 75.6623 49.9891 73.3906 46.4858L71.1344 48.7437C72.8464 51.6191 73.7501 54.9034 73.75 58.2499H76.875Z" fill="#0A0E69" />
                                        <path d="M73.75 41.7094L71.5406 39.5L58.1547 52.8859C57.2021 52.3119 56.1122 52.0058 55 52C53.7639 52 52.5555 52.3666 51.5277 53.0533C50.4999 53.7401 49.6988 54.7162 49.2258 55.8582C48.7527 57.0003 48.6289 58.2569 48.8701 59.4693C49.1113 60.6817 49.7065 61.7953 50.5806 62.6694C51.4547 63.5435 52.5683 64.1388 53.7807 64.3799C54.9931 64.6211 56.2497 64.4973 57.3918 64.0242C58.5338 63.5512 59.5099 62.7501 60.1967 61.7223C60.8834 60.6945 61.25 59.4861 61.25 58.25C61.2444 57.1373 60.9383 56.0468 60.3641 55.0937L73.75 41.7094ZM55 61.375C54.3819 61.375 53.7778 61.1917 53.2638 60.8483C52.7499 60.505 52.3494 60.0169 52.1129 59.4459C51.8764 58.8749 51.8145 58.2465 51.935 57.6403C52.0556 57.0342 52.3533 56.4773 52.7903 56.0403C53.2273 55.6033 53.7842 55.3056 54.3903 55.185C54.9965 55.0645 55.6249 55.1264 56.1959 55.3629C56.7669 55.5994 57.255 55.9999 57.5983 56.5138C57.9417 57.0277 58.125 57.6319 58.125 58.25C58.1242 59.0785 57.7947 59.8729 57.2088 60.4588C56.6229 61.0447 55.8286 61.3742 55 61.375Z" fill="#0A0E69" />
                                        <path d="M55 39.5001C58.3458 39.5016 61.6293 40.4052 64.5047 42.1157L66.7766 39.8454C63.475 37.7222 59.6623 36.5281 55.7394 36.3888C51.8166 36.2494 47.9287 37.1699 44.4848 39.0535C41.0409 40.937 38.1683 43.7139 36.1692 47.0921C34.1702 50.4702 33.1186 54.3247 33.125 58.2501H36.25C36.2558 53.279 38.2331 48.5133 41.7482 44.9982C45.2632 41.4832 50.029 39.5059 55 39.5001Z" fill="#0A0E69" />
                                    </svg>

                                    <h1 class="img4h1">
                                        4
                                    </h1>

                                    <h4 class="mt-2 img4h4">
                                        Track
                                        Progress</h4>
                                </div>
                            </li>.
                            <li class="mt-5 img5">
                                <div>
                                    <!-- <img src="assets/5.png" width="113" class="img56"> -->
                                    <svg width="113" height="113" class="img56" viewBox="0 0 113 113" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M113 56.2349C113 87.2926 87.7041 112.47 56.5 112.47C25.2959 112.47 0 87.2926 0 56.2349C0 25.1772 25.2959 0 56.5 0C87.7041 0 113 25.1772 113 56.2349Z" fill="#FBFCFB" />
                                        <path d="M50.7916 51.8333C50.7916 52.6621 50.4624 53.4569 49.8763 54.043C49.2903 54.629 48.4954 54.9582 47.6666 54.9583C46.8378 54.9582 46.043 54.629 45.4569 54.043C44.8709 53.4569 44.5416 52.6621 44.5416 51.8333C44.5416 51.0044 44.8709 50.2096 45.4569 49.6235C46.043 49.0375 46.8378 48.7083 47.6666 48.7083C48.4954 48.7083 49.2903 49.0375 49.8763 49.6235C50.4624 50.2096 50.7916 51.0044 50.7916 51.8333ZM42.4583 58.6041C42.4583 58.1897 42.6229 57.7923 42.9159 57.4992C43.209 57.2062 43.6064 57.0416 44.0208 57.0416H51.3125C51.7269 57.0416 52.1243 57.2062 52.4173 57.4992C52.7103 57.7923 52.875 58.1897 52.875 58.6041V59.1249C52.875 59.1249 52.875 63.2916 47.6666 63.2916C42.4583 63.2916 42.4583 59.1249 42.4583 59.1249V58.6041ZM57.0416 52.0937C57.0416 51.3749 57.625 50.7916 58.3437 50.7916H68.2395C68.4105 50.7916 68.5799 50.8253 68.7378 50.8907C68.8958 50.9561 69.0393 51.052 69.1603 51.173C69.2812 51.2939 69.3771 51.4374 69.4425 51.5954C69.5079 51.7534 69.5416 51.9227 69.5416 52.0937C69.5416 52.2647 69.5079 52.434 69.4425 52.592C69.3771 52.7499 69.2812 52.8935 69.1603 53.0144C69.0393 53.1353 68.8958 53.2312 68.7378 53.2966C68.5799 53.3621 68.4105 53.3958 68.2395 53.3958H58.3437C57.625 53.3958 57.0416 52.8124 57.0416 52.0937ZM58.3437 58.0832C57.9984 58.0832 57.6672 58.2204 57.423 58.4646C57.1788 58.7088 57.0416 59.04 57.0416 59.3853C57.0416 59.7307 57.1788 60.0619 57.423 60.306C57.6672 60.5502 57.9984 60.6874 58.3437 60.6874H68.2395C68.5849 60.6874 68.9161 60.5502 69.1603 60.306C69.4044 60.0619 69.5416 59.7307 69.5416 59.3853C69.5416 59.04 69.4044 58.7088 69.1603 58.4646C68.9161 58.2204 68.5849 58.0832 68.2395 58.0832H58.3437ZM35.1666 43.7603C35.1666 42.5862 35.633 41.4602 36.4633 40.6299C37.2935 39.7997 38.4196 39.3333 39.5937 39.3333H72.4062C73.5803 39.3333 74.7064 39.7997 75.5366 40.6299C76.3669 41.4602 76.8333 42.5862 76.8333 43.7603V68.2395C76.8333 69.4136 76.3669 70.5397 75.5366 71.3699C74.7064 72.2002 73.5803 72.6666 72.4062 72.6666H39.5937C38.4196 72.6666 37.2935 72.2002 36.4633 71.3699C35.633 70.5397 35.1666 69.4136 35.1666 68.2395V43.7603ZM39.5937 41.9374C39.1102 41.9374 38.6466 42.1295 38.3047 42.4713C37.9628 42.8132 37.7708 43.2769 37.7708 43.7603V68.2395C37.7708 69.2468 38.5875 70.0624 39.5937 70.0624H72.4062C72.8897 70.0624 73.3533 69.8704 73.6952 69.5285C74.0371 69.1866 74.2291 68.723 74.2291 68.2395V43.7603C74.2291 43.2769 74.0371 42.8132 73.6952 42.4713C73.3533 42.1295 72.8897 41.9374 72.4062 41.9374H39.5937Z" fill="#0A0E69" />
                                    </svg>
                                    <h1 class="img5h1">
                                        5
                                    </h1>

                                    <h4 class="mt-2 img5h4">Get
                                        your Visa</h4>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </section>
        <comment content="======= End section4 =======" break="true"></comment><!-- ======= section5 ======= -->
        <section class="new-section5__section5 layout">
            <h1 class="new-section5__hero-title1 layout hands">
                You are in the right hands
            </h1>
            <div class="movement">
                <div class="new-section5__flex3 layout flexd">

                    <div class="get">
                        <div class="new-section5__flex3-item">
                            <div class="new-section5__content-box1 layout cardwidth">
                                <!-- <img src="assets/800.png" width="84" class="cardimg"> -->
                                <svg width="89" height="89" class="cardimg" viewBox="0 0 89 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M89 44.5C89 69.0767 69.0767 89 44.5 89C19.9233 89 0 69.0767 0 44.5C0 19.9233 19.9233 0 44.5 0C69.0767 0 89 19.9233 89 44.5Z" fill="#F1F5F6" />
                                    <g clip-path="url(#clip0_0_1)">
                                        <rect width="41.86" height="36.6229" transform="translate(24 26)" fill="#0A0E69" />
                                        <path d="M63.2402 62.6229H26.6173C25.9088 62.6229 25.2957 62.364 24.778 61.8463C24.2603 61.3286 24.0014 60.7155 24.0014 60.007V33.8478C24.0014 33.112 24.2535 32.4921 24.7576 31.988C25.2617 31.4839 25.8816 31.2318 26.6173 31.2318H29.2332V33.8478C29.2332 35.619 29.7169 36.9337 30.6843 37.7921C31.6516 38.6504 32.9119 39.0796 34.4651 39.0796C35.991 39.0796 37.2445 38.63 38.2255 37.7308C39.2064 36.8315 39.6969 35.5372 39.6969 33.8478V31.2318H50.1606V33.8478C50.1606 35.619 50.6443 36.9337 51.6116 37.7921C52.579 38.6504 53.8393 39.0796 55.3925 39.0796C56.9457 39.0796 58.2059 38.6504 59.1733 37.7921C60.1406 36.9337 60.6243 35.619 60.6243 33.8478V31.2318H63.2402C63.976 31.2318 64.5959 31.4839 65.1 31.988C65.6041 32.4921 65.8561 33.112 65.8561 33.8478V60.007C65.8561 60.7427 65.6041 61.3626 65.1 61.8667C64.5959 62.3708 63.976 62.6229 63.2402 62.6229ZM39.6969 55.0204V52.8541C41.4409 51.8458 42.3129 49.5569 42.3129 45.9873C42.3129 44.5703 41.8224 43.5008 40.8414 42.7787C39.8604 42.0566 38.607 41.6955 37.081 41.6955C35.5551 41.6955 34.3016 42.0566 33.3206 42.7787C32.3397 43.5008 31.8492 44.5703 31.8492 45.9873C31.8492 49.3934 32.7211 51.6551 34.4651 52.7723V55.0204C32.9391 55.3201 31.6925 55.8242 30.7251 56.5327C29.7578 57.2412 29.2605 58.0314 29.2332 58.9034C29.2332 59.6391 31.8492 60.007 37.081 60.007C42.3129 60.007 44.9288 59.6391 44.9288 58.9034C44.9015 58.0314 44.4042 57.2412 43.4369 56.5327C42.4695 55.8242 41.2229 55.3201 39.6969 55.0204ZM61.9323 44.3114H51.4686C51.1143 44.3114 50.8078 44.4409 50.5489 44.6997C50.2901 44.9586 50.1606 45.2652 50.1606 45.6194C50.1606 45.9736 50.2901 46.2802 50.5489 46.5391C50.8078 46.7979 51.1143 46.9274 51.4686 46.9274H61.9323C62.2865 46.9274 62.5931 46.7979 62.8519 46.5391C63.1108 46.2802 63.2402 45.9736 63.2402 45.6194C63.2402 45.2652 63.1108 44.9586 62.8519 44.6997C62.5931 44.4409 62.2865 44.3114 61.9323 44.3114ZM50.1606 50.8513C50.1606 51.2055 50.2901 51.512 50.5489 51.7709C50.8078 52.0298 51.1143 52.1592 51.4686 52.1592H56.7004C57.0547 52.1592 57.3612 52.0298 57.6201 51.7709C57.8789 51.512 58.0084 51.2055 58.0084 50.8513C58.0084 50.497 57.8789 50.1905 57.6201 49.9316C57.3612 49.6727 57.0547 49.5433 56.7004 49.5433H51.4686C51.1143 49.5433 50.8078 49.6727 50.5489 49.9316C50.2901 50.1905 50.1606 50.497 50.1606 50.8513ZM61.9323 54.7751H51.4686C51.1143 54.7751 50.8078 54.9046 50.5489 55.1634C50.2901 55.4223 50.1606 55.7289 50.1606 56.0831C50.1606 56.4373 50.2901 56.7439 50.5489 57.0028C50.8078 57.2616 51.1143 57.3911 51.4686 57.3911H61.9323C62.2865 57.3911 62.5931 57.2616 62.8519 57.0028C63.1108 56.7439 63.2402 56.4373 63.2402 56.0831C63.2402 55.7289 63.1108 55.4223 62.8519 55.1634C62.5931 54.9046 62.2865 54.7751 61.9323 54.7751ZM55.3925 36.4637C54.684 36.4637 54.0709 36.2048 53.5531 35.6871C53.0354 35.1693 52.7765 34.5562 52.7765 33.8478V28.6159C52.7765 27.8802 53.0286 27.2603 53.5327 26.7562C54.0368 26.2521 54.6567 26 55.3925 26C56.1282 26 56.7481 26.2521 57.2522 26.7562C57.7563 27.2603 58.0084 27.8802 58.0084 28.6159V33.8478C58.0084 34.5835 57.7563 35.2034 57.2522 35.7075C56.7481 36.2116 56.1282 36.4637 55.3925 36.4637ZM34.4651 36.4637C33.7566 36.4637 33.1435 36.2048 32.6258 35.6871C32.108 35.1693 31.8492 34.5562 31.8492 33.8478V28.6159C31.8492 27.8802 32.1012 27.2603 32.6053 26.7562C33.1094 26.2521 33.7294 26 34.4651 26C35.2008 26 35.8207 26.2521 36.3248 26.7562C36.829 27.2603 37.081 27.8802 37.081 28.6159V33.8478C37.081 34.5835 36.829 35.2034 36.3248 35.7075C35.8207 36.2116 35.2008 36.4637 34.4651 36.4637Z" fill="#F1F5F6" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_0_1">
                                            <rect width="41.86" height="36.6229" fill="white" transform="translate(24 26)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <h1 class="new-section5__hero-title4 layout cardh1" data-max="800">+</h1>
                                <h5 class="new-section5__highlights1 layout cardh5">
                                    We have processed over 800 Nigeria Business Visas
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="new-section5__flex3-spacer"></div>
                    <div class="get">
                        <div class="new-section5__flex3-item">
                            <div class="new-section5__content-box1 layout cardwidth">
                                <!-- <img src="assets/1000.png" width="84" class="cardimg"> -->
                                <svg width="89" height="89" class="cardimg" viewBox="0 0 89 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M89 44.5C89 69.0767 69.0767 89 44.5 89C19.9233 89 0 69.0767 0 44.5C0 19.9233 19.9233 0 44.5 0C69.0767 0 89 19.9233 89 44.5Z" fill="#F1F5F6" />
                                    <g clip-path="url(#clip0_0_1)">
                                        <path d="M43.3137 27.9243C42.6335 27.9243 41.9271 28.1598 41.43 28.6569C40.9329 29.154 40.6974 29.8603 40.6974 30.5406V31.8487H28.9243V58.0112H43.5753C43.4053 57.174 43.3137 56.2975 43.3137 55.3949H31.5406V46.8136C32.3124 47.2584 33.2019 47.5462 34.1568 47.5462H45.943C46.6756 46.552 47.5651 45.6625 48.5593 44.9299H34.1568C32.6001 44.9299 31.5406 43.8704 31.5406 42.3137V34.4649H60.3193V42.3137C60.3193 42.523 60.3062 42.7192 60.267 42.9023C61.2088 43.1901 62.0984 43.5826 62.9356 44.0666V31.8487H51.1624V30.5406C51.1624 29.8603 50.927 29.154 50.4299 28.6569C49.9328 28.1598 49.2264 27.9243 48.5462 27.9243H43.3137ZM43.3137 30.5406H48.5462V31.8487H43.3137V30.5406ZM36.7731 39.6974V43.6218H39.3893V39.6974H36.7731ZM52.4706 39.6974V42.9154C53.3224 42.6492 54.1989 42.4695 55.0868 42.3791V39.6974H52.4706ZM56.3949 44.9299C50.6261 44.9299 45.9299 49.6261 45.9299 55.3949C45.9299 61.1638 50.6261 65.8599 56.3949 65.8599C62.1638 65.8599 66.8599 61.1638 66.8599 55.3949C66.8599 49.6261 62.1638 44.9299 56.3949 44.9299ZM56.3949 47.5462C60.7379 47.5462 64.2437 51.052 64.2437 55.3949C64.2437 59.7379 60.7379 63.2437 56.3949 63.2437C52.052 63.2437 48.5462 59.7379 48.5462 55.3949C48.5462 51.052 52.052 47.5462 56.3949 47.5462ZM55.0868 48.8543V56.7031H61.6274V54.0868H57.7031V48.8543H55.0868Z" fill="#0A0E69" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_0_1">
                                            <rect width="41.86" height="41.86" fill="white" transform="translate(25 24)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <h1 class="new-section5__hero-title4 layout cardh1" data-max="1000">+</h1>
                                <h5 class="new-section5__highlights1 layout cardh5">
                                    We have processed over 1000 Temporary Work Permits
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="new-section5__flex3-spacer"></div>
                    <div class="get">
                        <div class="new-section5__flex3-item">
                            <div class="new-section5__content-box1 layout cardwidth">
                                <!-- <img src="assets/200.png" width="84" class="cardimg"> -->
                                <svg width="90" height="89" class="cardimg" viewBox="0 0 90 89" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M89.4344 44.5C89.4344 69.0767 69.4138 89 44.7172 89C20.0206 89 0 69.0767 0 44.5C0 19.9233 20.0206 0 44.7172 0C69.4138 0 89.4344 19.9233 89.4344 44.5Z" fill="#F1F5F6" />
                                    <path d="M52.6508 50.1626H56.1392V53.6509H52.6508V50.1626ZM52.6508 43.1859H56.1392V46.6742H52.6508V43.1859ZM52.6508 36.2092H56.1392V39.6976H52.6508V36.2092ZM46.9648 36.2092L49.1625 37.6743V36.2092H46.9648Z" fill="#0A0E69" />
                                    <path d="M40.4417 29.2324V31.8661L43.93 34.1859V32.7208H59.6275V57.1391H52.6508V60.6274H63.1158V29.2324H40.4417Z" fill="#0A0E69" />
                                    <path d="M37.2498 33.9417L49.1625 41.8776V60.6274H24.7441V42.2788L37.2498 33.9417ZM40.4416 57.1391H45.6741V43.4648L37.2498 38.1102L28.2325 43.8485V57.1391H33.465V46.6741H40.4416V57.1391Z" fill="#0A0E69" />
                                    <path opacity="0.3" d="M40.4417 57.1392H45.6742V43.4649L37.2499 38.1104L28.2325 43.8487V57.1392H33.465V46.6742H40.4417V57.1392Z" fill="#0A0E69" />
                                </svg>


                                <h1 class="new-section5__hero-title4 layout cardh1" data-max="200">+</h1>
                                <h5 class="new-section5__highlights1 layout cardh5">
                                    We have Incorperated over 200 Nigeria Businesses
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <comment content="======= End section5 =======" break="true"></comment><!-- ======= section6 ======= -->
        <?php if (count($reviews->getAllFeaturedReviews()) >= 3) : ?>
            <section class="new-section6__section6 layout">
                <div class="new-section6__flex4 layout">
                    <h1 class="new-section6__hero-title1 layout customers">
                        What our customers have to say about us
                    </h1>
                    <div class="row reviews mt-99">
                        <div class="col-md-2 hide"></div>
                        <?php foreach($reviews->getAllFeaturedReviews() as $review): ?>
                            <div class="col-md-2 mag">
                                <div>
                                    <?php if(isset($uploads->getUsersProfile($review["user_id"])["files"])): ?>
                                        <img src="./Dashboard/upload/<?= $uploads->getUsersProfile($review["user_id"])["files"] ?>" width="50" class="rounded-circle" style="margin-left: 65px; margin-bottom: 13px;">
                                    <?php else: ?>
                                        <h2 class="avater">
                                            <?= getSubName($users->get_user($review["user_id"])['firstname'] . " " . $users->get_user($review["user_id"])["lastname"]); ?>
                                        </h2>
                                    <?php endif; ?>
                                    <div class="new-section6__flex18-item">

                                        <div class="new-section6__text-body layout">
                                            <p style="font-family: Ubuntu; font-style: normal; font-weight: 500; font-size: 13px; line-height: 16px; letter-spacing: 0.0015em; margin-left: 60px; margin-bottom: 9px; color: #000080;">
                                                <?= $users->get_user($review["user_id"])['firstname'] . " " . $users->get_user($review["user_id"])["lastname"] ?>
                                            </p>
                                        </div>
                                        <div class="star-rating">
                                            <?php for ($i = 0; $i < intval($review); $i++): ?>
                                                <span class="fa fa-star checked" data-rating="<?= $i + 1 ?>"></span>
                                            <?php endfor; ?>

                                            <?php for ($i = 0; $i < (5 - intval($review)); $i++): ?>
                                                <span class="fa fa-star-o" data-rating="<?= intval($review) + ($i + 1) ?>"></span>
                                            <?php endfor; ?>

                                            <!-- <input type="hidden" name="whatever1" class="rating-value" value="2.56"> -->
                                        </div>
                                    </div>  
                                 </div>
                                <div class="new-section6__paragraph-body-box layout">
                                    <pre class="new-section6__paragraph-body" style="width: 181px; height: 32px; top: 3178px; font-family: Ubuntu; font-style: normal; font-weight: normal; font-size: 14px; line-height: 16px; letter-spacing: 0.0015em; color: #000080;">
                                        <?= $review['review']  ?>
                                    </pre>
                                </div>

                            </div>
                            <div class="col-md-1"></div>
                        <?php endforeach; ?>
                    </div>
                    <h1 style="text-align: center;
        font-family: Rubik;
       
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        line-height: 41px;
        color: #060a5c;" class="laptopvideo">
          Customer's video reviews
        </h1>
        <div class="row reviews mt-99 laptopvideo">
         
          <div class="col-md-2 hide"></div>
          <div class="col-md-2 mag">
            <video  loop="" controls="" class="laptopvideo" style="width: 200px;height: 200px; margin-left: -20px; margin-top: -50px;">
              <source type="video/mp4" src="https://endtest-videos.s3-us-west-2.amazonaws.com/documentation/endtest_data_driven_testing_csv.mp4">
              </video>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-2 mag">
            <video  loop="" controls="" class="laptopvideo" style="width: 200px;height: 200px; margin-left: -20px; margin-top: -50px;">
              <source type="video/mp4" src="https://endtest-videos.s3-us-west-2.amazonaws.com/documentation/endtest_data_driven_testing_csv.mp4">
              </video>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-2 mag">
            <video  loop="" controls="" class="laptopvideo" style="width: 200px;height: 200px; margin-left: -20px; margin-top: -50px;">
              <source type="video/mp4" src="https://endtest-videos.s3-us-west-2.amazonaws.com/documentation/endtest_data_driven_testing_csv.mp4">
              </video>
          </div>
        </div>

        <h1 style="text-align: center;
        font-family: Rubik;
       
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        line-height: 41px;
        color: #060a5c;" class="mobilevideo">
          Customer's video reviews
        </h1>
        <div class="row reviews mt-99 mobilevideo">
         
          <div class="col-md-2 hide"></div>
          <div class="col-md-2 mag">
            <video  loop="" controls="" class="mobilevideo" style="width: 200px;height: 200px; margin-left: -20px; margin-top: -90px;">
              <source type="video/mp4" src="https://endtest-videos.s3-us-west-2.amazonaws.com/documentation/endtest_data_driven_testing_csv.mp4">
              </video>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-2 mag">
            <video  loop="" controls="" class="mobilevideo" style="width: 200px;height: 200px; margin-left: -20px; margin-top: 30px;">
              <source type="video/mp4" src="https://endtest-videos.s3-us-west-2.amazonaws.com/documentation/endtest_data_driven_testing_csv.mp4">
              </video>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-2 mag">
            <video  loop="" controls="" class="mobilevideo" style="width: 200px;height: 200px; margin-left: -20px; margin-top: 30px;">
              <source type="video/mp4" src="https://endtest-videos.s3-us-west-2.amazonaws.com/documentation/endtest_data_driven_testing_csv.mp4">
              </video>
          </div>
        </div>
                    <button class="btn btn-review" style="border: 1px solid #a0bd1c;  background-color: transparent; color: #a0bd1c;">See More
                        Reviews
                    </button>
                </div>
            </section>
        <?php endif; ?>
        <comment content="======= End section6 =======" break="true"></comment><!-- ======= section7 ======= -->
        <section class="new-section7__section7 layout">
          <div class="new-section7__group layout">
            <div class="movement">
              <div class="new-section7__box8 layout"></div>
            
              <div class="row" style="background-color: #E6F5EE;">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  
                    <div class="new-section7__cover-group layout">
                      <div style="background-image:url(assets/subscription.png); background-size: cover;" class="new-section7__cover1 layout">
                      </div>
                      <div class="new-section7__box9 layout"></div>
                    </div>
                  
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  
                    <div class="new-section7__flex21 layout">
                      <h3 class="new-section7__subtitle1 layout offer">
                        Never miss an offer
                      </h3>
                      <div class="new-section7__text-body3 layout sub">
                        Subscribe and be the first to receive our exclusive offers.
                      </div>
                      <div class="new-section7__flex22 layout">
                        <div class="new-section7__flex22-item">
                          <div class="new-section7__block15 layout">
                            <input type="email" class="form-control" placeholder="email address" style="font-family: ubuntu;">
                          </div>
                        </div>
                        <div class="new-section7__flex22-item">
                          <div class="new-section7__block16 layout">
                            <input type="text" class="form-control" placeholder="country" style="font-family: ubuntu;">
                          </div>
                        </div>
                      </div>
                      <div class="new-section7__block14 layout">
                        <button class="btn subscribe">subscribe</button>
        
                      </div>
                    </div>
                  
                </div>
              </div>
            </div>
          
              
              <!-- <div class="new-section7__flex5-spacer"></div> -->

          </div>
        </section>
        <comment content="======= End section7 =======" break="true"></comment><!-- ======= section8 ======= -->
        <section class="new-section8__section8 layout">
          <div class="new-section8__block19 layout">
            <div class="movements">
              <div class="new-section8__flex23 layout">
                <div class="new-section8__flex24 layout">
                  <div class="">
                    <div class="row">
                      <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="new-section8__block20 layout">
                          <img src="assets/logo.png" width="164" class="footerlogo">                  
                          <ul>
                            <li class="lg-li"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M10.7 8C10.7 6.5 9.5 5.3 8 5.3C6.5 5.3 5.3 6.5 5.3 8C5.3 9.5 6.5 10.7 8 10.7C9.5 10.7 10.7 9.5 10.7 8ZM12.1 8C12.1 10.3 10.3 12.1 8 12.1C5.7 12.1 3.9 10.3 3.9 8C3.9 5.7 5.7 3.9 8 3.9C10.3 3.9 12.1 5.7 12.1 8ZM13.2 3.7C13.2 4.3 12.8 4.7 12.2 4.7C11.6 4.7 11.2 4.3 11.2 3.7C11.2 3.1 11.6 2.7 12.2 2.7C12.8 2.7 13.2 3.2 13.2 3.7ZM8 1.4C6.8 1.4 4.3 1.3 3.3 1.7C2.6 2 2 2.6 1.8 3.3C1.4 4.3 1.5 6.8 1.5 8C1.5 9.2 1.4 11.7 1.8 12.7C2 13.4 2.6 14 3.3 14.2C4.3 14.6 6.9 14.5 8 14.5C9.1 14.5 11.7 14.6 12.7 14.2C13.4 13.9 13.9 13.4 14.2 12.7C14.6 11.6 14.5 9.1 14.5 8C14.5 6.9 14.6 4.3 14.2 3.3C14 2.6 13.4 2 12.7 1.8C11.7 1.3 9.2 1.4 8 1.4ZM16 8V11.3C16 12.5 15.6 13.7 14.7 14.7C13.8 15.6 12.6 16 11.3 16H4.7C3.5 16 2.3 15.6 1.3 14.7C0.5 13.8 0 12.6 0 11.3V8V4.7C0 3.4 0.5 2.2 1.3 1.3C2.3 0.5 3.5 0 4.7 0H11.3C12.5 0 13.7 0.4 14.7 1.3C15.5 2.2 16 3.4 16 4.7V8Z" fill="#080C58"/>
                              </svg>
                              &nbsp; Instagram
                            </li>
                            
                            <li class="lg-li"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8 0.5C3.865 0.5 0.5 3.865 0.5 8C0.5 12.135 3.865 15.5 8 15.5C12.135 15.5 15.5 12.135 15.5 8C15.5 3.865 12.135 0.5 8 0.5ZM8 1.75C11.4594 1.75 14.25 4.54063 14.25 8C14.2515 9.49623 13.715 10.9431 12.7383 12.0766C11.7617 13.2101 10.41 13.9547 8.93 14.1744V9.8225H10.71L10.9894 8.01438H8.93V7.02688C8.93 6.27688 9.17688 5.61 9.87875 5.61H11.0069V4.0325C10.8088 4.00563 10.3894 3.9475 9.59688 3.9475C7.94187 3.9475 6.97187 4.82125 6.97187 6.8125V8.01438H5.27063V9.8225H6.97187V14.1588C5.51234 13.9185 4.18577 13.1672 3.22918 12.039C2.27259 10.9108 1.74831 9.47917 1.75 8C1.75 4.54063 4.54063 1.75 8 1.75Z" fill="#080C58"/>
                              </svg>
                              &nbsp; Facebook
                            </li>
                            
                            <li class="lg-li"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M9 15.6665C10.7681 15.6665 12.4638 14.9641 13.714 13.7139C14.9643 12.4636 15.6667 10.7679 15.6667 8.99984C15.6667 7.23173 14.9643 5.53604 13.714 4.28579C12.4638 3.03555 10.7681 2.33317 9 2.33317C7.23189 2.33317 5.5362 3.03555 4.28595 4.28579C3.03571 5.53604 2.33333 7.23173 2.33333 8.99984C2.33333 10.7679 3.03571 12.4636 4.28595 13.7139C5.5362 14.9641 7.23189 15.6665 9 15.6665ZM9 17.3332C4.3975 17.3332 0.666664 13.6023 0.666664 8.99984C0.666664 4.39734 4.3975 0.666504 9 0.666504C13.6025 0.666504 17.3333 4.39734 17.3333 8.99984C17.3333 13.6023 13.6025 17.3332 9 17.3332Z" fill="#080C58"/>
                              <path d="M13.1667 6.45568C12.86 6.58901 12.5308 6.68068 12.185 6.72068C12.5383 6.51235 12.8083 6.18235 12.9367 5.78985C12.6 5.98607 12.2326 6.12411 11.85 6.19818C11.6891 6.02949 11.4954 5.89535 11.281 5.80394C11.0665 5.71254 10.8356 5.66578 10.6025 5.66651C9.65833 5.66651 8.89333 6.42068 8.89333 7.34985C8.89333 7.48151 8.90833 7.60985 8.9375 7.73318C8.26027 7.70102 7.59718 7.52805 6.99054 7.2253C6.38389 6.92255 5.84702 6.49668 5.41416 5.97485C5.26213 6.23076 5.18209 6.52301 5.1825 6.82068C5.1825 7.40401 5.48499 7.92068 5.94333 8.22151C5.67203 8.213 5.40655 8.14078 5.16833 8.01068V8.03151C5.1709 8.42273 5.30899 8.80096 5.55909 9.10181C5.80919 9.40265 6.15583 9.60752 6.54 9.68151C6.28779 9.7482 6.0239 9.75788 5.7675 9.70985C5.87927 10.0464 6.09306 10.3398 6.37918 10.5493C6.66531 10.7588 7.00956 10.8741 7.36416 10.879C6.7558 11.3478 6.00886 11.6011 5.24083 11.599C5.10333 11.599 4.96749 11.5907 4.83333 11.5757C5.61705 12.0718 6.5258 12.3345 7.45333 12.3332C10.5983 12.3332 12.3175 9.76818 12.3175 7.54318L12.3117 7.32485C12.6469 7.08925 12.9366 6.79475 13.1667 6.45568Z" fill="#080C58"/>
                              </svg>
                              &nbsp; Twitter</li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-6 div2">
                        <h3 class="new-section8__highlights8 layout footh3">
                          VISA SERVICES
                        </h3>
                        <ul>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="NBVForm.html"
                            style=" text-decoration: none;">Nigeria Business Visa on
                            Arrival</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="NTWPForm.html"
                            style=" text-decoration: none;">Nigeria
                            Temporary Work Permit
                            Approval</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria
                            Tourist Visa</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria
                            Business Visa
                            Extension</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria
                            Subject To
                            Regularization (STR)</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Permit to Land
                            Immgration Approval For Marine Vessels Foreign Crew</a></li>
      
                        </ul>
                      </div>
                      <div class="col-md-3 col-sm-6 col-xs-6 div3">
                        <h3 class="new-section8__highlights8 layout footh3">
                          OTHER SERVICES
                        </h3>
                        <ul>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="BIForm.html"
                            style=" text-decoration: none;">Nigeria
                            Business Incorporation</a>
                          </li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Hotel Bookings</a>
                          </li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Real Estate
                            Cosultancy and
                            Advisory</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Legal Advisory
                            and Consultation</a>
                          </li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Africa travels
                            & tours</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigerian
                            Immigration
                            Consultancy</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria Custom
                            Brokerage Services</a>
                          </li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria Department of Petroleum Resources (DPR) Permits Consultancy Services</a>
                          </li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria Maritime and Safety Agency Cabotage Consultancy Services</a>
                          </li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria Ports Authority Consultancy Services</a></li>
                            <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                              style=" text-decoration: none;">Other Nigerian Government Agencies Consultancy Support Services</a></li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria COVID 19 Payment Services</a>Airport
                            Immigration Meet and
                            Greet</li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria COVID 19 Payment Services</a>Airport
                            Protocol Services</li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria COVID 19 Payment Services</a>Airport
                            Transfers</li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria COVID 19 Payment Services</a>Vehicle Rentals
                          </li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria COVID 19 Payment Services</a>Armed Security
                            Escort Services
                          </li>
                          <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                            style=" text-decoration: none;">Nigeria COVID 19 Payment Services</a></li>
                        </ul>
                      </div>
                      <div class="col-md-4 col-sm-6 col-xs-6 div4">
                        <div class="row">
                          <div class="col-md-5 col-sm-6 col-xs-6">
                            <h3 class="new-section8__highlights8 layout footh3">
                              SUPPORT
                            </h3>
                            <ul>
                              <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="SBForm.html"
                                style=" text-decoration: none;">Apply</a></li>
                              <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="faq.html"
                                style=" text-decoration: none;">Help</a></li>
                              <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="contact.html"
                                style=" text-decoration: none;">Contact Us</a>
                              </li>
                            </ul>
                          </div>
                          <div class="col-md-7 col-sm-6 col-xs-6 company">
                            <h3 class="new-section8__highlights8 layout footh3">
                              COMPANY
                            </h3>
                            <ul>
                              <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="about.html"
                                  style=" text-decoration: none;">About us</a>
                              </li>
                              <li class="new-section8__text-body5 layout fs-13"><a class="fs-13" href="pp.html"
                                  style=" text-decoration: none;">Privacy & Cookie Policy</a>
                              </li>
                              <li class="new-section8__text-body5 layout fs-13" 0><a href="t&c.html"
                                  class="fs-13"style=" text-decoration: none;">Terms And
                                  Conditions</a></li>
                              <li class="new-section8__text-body5 layout fs-13">Refund
                                Policy</li>
                            </ul>
                          </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                          <h3 class="new-section8__highlights8 layout footh3">
                            CORPORATE CONTACT DETAILS
                          </h3>
                          <ul>
                            <li class="new-section8__text-body5 layout fs-13">441 Granville
                              Avenenue
                              Hillside Illinois 60152</li>
                            <li class="new-section8__text-body5 layout fs-13">+1 (708)
                              318-0273
                            </li>
                            <li class="corp layout fs-13 ">
                              info@peacerydeafrica.com</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <button id="top" style="cursor: pointer;
                    bottom: 50px;
                    height: 40px;
                    background-color: #A0BD1C;
                    border-radius: 50%;
                    border:1px solid #A0BD1C;
                    position: fixed;
                    right: 50px;
                    z-index: 5;" class="btn btn-sm btn-primary" onclick="openForm()">
                      <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.0605 22.3053C22.0791 21.7249 21.3271 20.8247 20.9305 19.7557L20.9196 19.721C20.8828 19.6201 20.8812 19.5097 20.9152 19.4078C20.9491 19.3058 21.0166 19.2184 21.1067 19.1598L21.1087 19.1588C23.6682 17.305 25.3171 14.3298 25.33 10.9685V10.9666C25.33 4.91615 19.6597 0 12.665 0C5.67035 0.0633448 0 4.97752 0 10.9636C0 17.011 5.67035 21.9262 12.665 21.9262L12.8115 21.9272C13.6963 21.9272 14.5604 21.8342 15.3938 21.659L15.3126 21.6728C15.4 21.644 15.4937 21.6406 15.5829 21.663C15.6721 21.6855 15.7531 21.7328 15.8164 21.7995C17.7877 23.0053 20.0383 23.6786 22.3478 23.7533L22.3706 23.7543C22.4959 23.7698 22.623 23.7586 22.7437 23.7215C22.8643 23.6845 22.9758 23.6223 23.0707 23.5391C23.1657 23.4559 23.242 23.3536 23.2946 23.2389C23.3473 23.1242 23.3751 22.9996 23.3762 22.8734C23.5029 22.6824 23.2485 22.4923 23.0595 22.3053H23.0605ZM19.6567 21.2977C19.6932 21.3292 19.7162 21.3735 19.721 21.4214V21.4224C19.7191 21.4554 19.7052 21.4865 19.6818 21.5099C19.6585 21.5333 19.6273 21.5472 19.5943 21.5491C18.251 21.174 16.9996 20.5258 15.9184 19.6448L15.9362 19.6597C15.8511 19.5832 15.747 19.5311 15.6349 19.5088C15.5227 19.4865 15.4066 19.4949 15.2988 19.533L15.3037 19.532C14.438 19.7376 13.5518 19.8438 12.662 19.8487H12.6571C6.79868 19.8487 2.07157 15.9441 2.07157 11.0883C2.07157 6.23253 6.79868 2.32792 12.6571 2.32792C18.5155 2.32792 23.2436 6.23253 23.2436 11.0883C23.2029 12.5193 22.79 13.9149 22.0456 15.1376C21.3012 16.3604 20.251 17.368 18.9985 18.0612L18.9559 18.083C18.8513 18.1394 18.7621 18.2206 18.696 18.3195C18.6299 18.4183 18.589 18.5318 18.5769 18.6501V18.6531C18.7286 19.6132 19.1006 20.5251 19.6636 21.3175L19.6507 21.2977H19.6567ZM19.5943 13.5469V13.536C19.5945 13.4708 19.5817 13.4063 19.5568 13.3461C19.532 13.2859 19.4955 13.2311 19.4494 13.1851C19.4033 13.139 19.3486 13.1025 19.2884 13.0776C19.2282 13.0527 19.1636 13.04 19.0985 13.0401H19.0915C18.9741 13.0426 18.8616 13.0876 18.7748 13.1668C17.1053 14.5567 15.0006 15.3158 12.8283 15.3116L12.6561 15.3096H12.665C10.4355 15.2983 8.27519 14.5341 6.53441 13.1411L6.55421 13.1569C6.46243 13.0881 6.35428 13.0444 6.24045 13.0302H6.23748C6.16588 13.0314 6.09532 13.0476 6.03031 13.0776C5.9653 13.1077 5.90728 13.151 5.85996 13.2047C5.81263 13.2585 5.77705 13.3215 5.75548 13.3898C5.7339 13.4581 5.72682 13.5301 5.73468 13.6013V13.5993C5.74107 13.7186 5.77238 13.8351 5.82659 13.9415C5.8808 14.0479 5.95671 14.1417 6.04943 14.2169L6.05141 14.2179C6.83748 15.1651 7.82269 15.9272 8.9369 16.4502C10.0511 16.9732 11.2669 17.2441 12.4977 17.2436L12.6739 17.2417H12.665H12.7293C13.9944 17.2876 15.2523 17.0332 16.4002 16.4994C17.548 15.9656 18.553 15.1675 19.333 14.1704L19.3459 14.1526C19.4092 13.9626 19.5953 13.7092 19.5953 13.5192L19.5943 13.5469Z" fill="#F1F5F6"/>
                        </svg>  
                  </button>
                  <div class="chat-popup" id="myForm">
                    <form action="/action_page.php" class="form-container">
                      <div class="wrapper">
                        <div class="mainchat">
                          <button type="button" class="btn cancel" style="margin-left: 280px;" onclick="closeForm()">X</button>
                            <div class="px-2 scroll">
                                <div class="d-flex align-items-center">
                                    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img9" /></div>
                                    <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                                        <p class="msg">Hi Dr. Hendrikson, I haven't been falling well for past few days.</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-right justify-content-end ">
                                    <div class="pr-2"> <span class="name">Dr. Hendrikson</span>
                                        <p class="msg">Let's jump on a video call</p>
                                    </div>
                                    <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img9" /></div>
                                </div>
                                <div class="text-center"><span class="between">Call started at 10:47am</span></div>
                                <div class="text-center"><span class="between">Call ended at 11:03am</span></div>
                                <div class="d-flex align-items-center">
                                    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img9" /></div>
                                    <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                                        <p class="msg">How often should i take this?</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-right justify-content-end ">
                                    <div class="pr-2"> <span class="name">Dr. Hendrikson</span>
                                        <p class="msg">Twice a day, at breakfast and before bed</p>
                                    </div>
                                    <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img9" /></div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img9" /></div>
                                    <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                                        <p class="msg">How often should i take this?</p>
                                    </div>
                                </div>
                            </div>
                            <nav class="navbars bg-white navbar-expand-sm d-flex justify-content-between"> <input type="text number" name="text" class="form-controls" placeholder="Type a message...">
                                <div class=" d-flex justify-content-end align-content-center text-center ml-2"> <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M32.4419 20.4722C32.5822 19.2858 32.0534 18.1264 31.0686 17.4434L8.12261 1.50404C7.09665 0.772938 5.80289 0.713532 4.70133 1.30734C3.57966 1.91099 2.86538 3.55356 3.029 4.81133L4.30132 14.5749C4.43205 15.5761 5.23388 16.3557 6.23997 16.4571L19.7964 17.8394C20.4918 17.8985 20.9955 18.5204 20.9086 19.213C20.8348 19.8949 20.222 20.3912 19.5266 20.3321L5.95836 18.9379C4.95253 18.8342 4.00153 19.4326 3.65928 20.3856L0.300426 29.7007C-0.10413 30.8007 0.103129 31.9631 0.816651 32.8442C0.900595 32.9479 0.995031 33.0645 1.09201 33.1576C2.04085 34.0627 3.38245 34.3065 4.60167 33.8126L30.4291 23.1319C31.5361 22.6861 32.3016 21.6586 32.4419 20.4722Z" fill="#1161D9"/>
                                  </svg>
                                  </div>
                            </nav>
                        </div>
                    </div>
                      
                    </form>
                  </div>
                  </div>
                </div>
              </div>
            </div>
              <hr>
            <div class="movements">
              <div class="lastfooter">
                <div class="row lastfooterrow">
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <p class="adp"><a class="locaddress" href="Index.html"> &copy; &nbsp;
                        2022 PeaceRyde Africa LLC</a></p>
                  </div>
                  <div class="col-md-5 col-sm-12 col-xs-12">
                    <p class="shorttest">PeaceRyde Afica LLC is Registered with the state of Delaware USA
                      under the File Number 6549846</p>
                  </div>
                  <div class="col-md-2">
                    <p class="policy"><a class="privacy" href="pp.html">Privacy and Cookie
                        Policy</a></p>
                  </div>
                  <div class="col-md-2">
                    <p class="adtc"><a class="tc" href="t&c.html">Terms & Conditions</a></p>
                  </div>
                </div>
              </div>
            </div>
          

        </section>
        <!-- ======= End section8 ======= -->

    </main>
    <script>
        function inVisible(element) {
            //Checking if the element is
            //visible in the viewport
            var WindowTop = $(window).scrollTop();
            var WindowBottom = WindowTop + $(window).height();
            var ElementTop = element.offset().top;
            var ElementBottom = ElementTop + element.height();
            //animating the element if it is
            //visible in the viewport
            if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
                animate(element);
        }

        function animate(element) {
            //Animating the element if not animated before
            if (!element.hasClass('ms-animated')) {
                var maxval = element.data('max');
                var html = element.html();
                element.addClass("ms-animated");
                $({
                    countNum: element.html()
                }).animate({
                    countNum: maxval
                }, {
                    //duration 5 seconds
                    duration: 1000,
                    easing: 'linear',
                    step: function() {
                        element.html(Math.floor(this.countNum) + html);
                    },
                    complete: function() {
                        element.html(this.countNum + html);
                    }
                });
            }

        }

        //When the document is ready
        $(function() {
            //This is triggered when the
            //user scrolls the page
            $(window).scroll(function() {
                //Checking if each items to animate are 
                //visible in the viewport
                $("h1[data-max]").each(function() {
                    inVisible($(this));
                });
            })
        });
    </script>
    <script type="text/javascript">
        AOS.init();
    </script>
</body>

</html>