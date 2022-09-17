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
  <title>PeaceRyde Africa LLC</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/icon.png">
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
  <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
  <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/main.js"></script>

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

    .review-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1rem;
    }

    .review-name {
      font-family: Ubuntu;
      font-style: normal;
      font-weight: 500;
      font-size: 13px;
      line-height: 16px;
      letter-spacing: 0.0015em;
      color: #000080;
      text-align: center;
    }

    .review-text {
      width: 100%;
      height: 32px;
      top: 3178px;
      font-family: Ubuntu;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 16px;
      letter-spacing: 0.0015em;
      color: #000080;
      text-align: left;
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
          Your one-stop shop for </pre>
          </h4>
          <h1 class="bannertext new-section1__hero-title2 layout ">
            Nigeria Visa and <br>Business Incorporation
          </h1>
          <h2 class="new-section1__medium-title layout made">
            Made easy, fast and convenient!
          </h2>
          <div class="new-section1__block11 layout applys">
            <a href="./SBForm" class="btn applybtn">Apply NOW</a>

            <!-- <h5 class="new-section1__highlights1 layout">Apply NOW</h5> -->
          </div>
        </div>
      </div>


    </section>

    </section>
    <comment content="======= End section1 =======" break="true"></comment><!-- ======= section2 ======= -->
    <section class="new-section2__section2 layout">
    
        <div class="new-section2__flex layout row">

          <div class="new-section2__flex-item col-md-4 col-sm-4 col-lg-4">
            <div class="new-section2__block12 layout">
              <div class="new-section2__flex6 layout">
                <h5 class="new-section2__highlights6 layout">
                  Nigeria Business Visa On Arrival
                </h5>
                <div style=" border-top: 1px solid #000080; height: 1px; margin-top: 10px; margin-bottom: 25px;"></div>
                <!-- <hr style="border: 1px solid #060a5c; "> -->
                <div style="display: flex;
                justify-content: center;">
                  <img src="assets/Passport.png" width="139">
                </div>

                <div class="new-section2__paragraph-body1-box layout">
                  <pre class="new-section2__paragraph-body1">Business VOA is required for persons of legal age intending to travel to Nigeria for business, meeting, conference etc. The Business VOA immigration approval is needed for visa issuance in Nigeria.</pre>
                </div>
                <div class="new-section2__block13a layout">
                  <a href="./NBVForm" class="btn" style="font-family: Ubuntu;
                  font-style: normal;
                  font-weight: normal;
                  font-size: 14px;
                  line-height: 16px;
                  color: #FBFCFB;">Apply</a>
                </div>
              </div>
            </div>
          </div>

          <div class="new-section2__flex-item col-md-4 col-sm-4 col-lg-4">
            <div class="new-section2__block12 layout">
              <div class="new-section2__flex6 layout">
                <h5 class="new-section2__highlights6 layout">
                  Nigeria Temporary Work Permit (TWP)
                </h5>
                <div style=" border-top: 1px solid #060a5c; height: 1px; margin-top: 10px; margin-bottom: 25px;"></div>
                <!-- <hr style="border: 1px solid #060a5c; "> -->
                <div style="display: flex;
                justify-content: center;">
                  <img src="assets/twp.png" width="139">
                </div>

                <div class="new-section2__paragraph-body1-box layout">
                  <pre class="new-section2__paragraph-body1">TWP is required for persons of legal age intending to work in Nigeria. The TWP immigration approval is a prerequisite for issuance of a TWP visa in a Nigerian embassy abroad.</pre>
                </div>
                <div class="new-section2__block13 layout">
                  <a href="./NTWPForm" class="btn" style="font-family: Ubuntu;
                  font-style: normal;
                  font-weight: normal;
                  font-size: 14px;
                  line-height: 16px;
                  color: #FBFCFB;">Apply</a>
                </div>
              </div>
            </div>
          </div>

          <div class="new-section2__flex-item col-md-4 col-sm-4 col-lg-4">
            <div class="new-section2__block12 layout">
              <div class="new-section2__flex6 layout">
                <h5 class="new-section2__highlights6 layout">
                  Nigeria Business Incorporation
                </h5>
                <div style=" border-top: 1px solid #060a5c; height: 1px; margin-top: 10px; margin-bottom: 25px;"></div>
                <!-- <hr style="border: 1px solid #060a5c; "> -->
                <div style="display: flex;
                justify-content: center;">
                  <img src="assets/nbi.png" width="139" height="112">
                </div>

                <div class="new-section2__paragraph-body1-box layout">
                  <pre class="new-section2__paragraph-body1">This is applicable to anyone of legal age intending to register a business in Nigeria.</pre>
                </div>
                <div class="new-section2__block13b layout">
                  <a href="./BIForm" class="btn" style="font-family: Ubuntu;
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
      

    </section>
    <comment content="======= End section2 =======" break="true"></comment><!-- ======= section3 ======= -->

    <comment content="======= End section3 =======" break="true"></comment><!-- ======= section4 ======= -->

    <section class="">
      <div class="p-2" style="background-color: #1161D9;">
        <h1 style="font-size: 2rem; text-align: center; color: white; padding-top:90px; font-weight:400; font-family: Rubik, Helvetica, Arial, serif;">
          How does the Approval Process work?
        </h1>

        <h4 style=" text-align: center; color: white; font-family: rubik; padding-top: 13px; font-size: 16px; font-weight: 300;" class="">
          Only 5 simple steps to process your approval
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

                  <h4 class="mt-2 img5h4">Get Approval</h4>
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

                <h1 class="new-section5__hero-title4 layoutb cardh1" data-max="1000">+</h1>
                <h5 class="new-section5__highlights1 layout cardh5">
                  We have processed over 1000 Temporary Work Permits
                </h5>
              </div>
            </div>
          </div>

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
                  We have incorporated over 200 Nigeria Businesses
                </h5>
              </div>
            </div>
          </div>
        </div>
     

    </section>
    <comment content="======= End section5 =======" break="true"></comment><!-- ======= section6 ======= -->
    <?php if (count($reviews->getAllFeaturedReviews("text")) >= 3) : ?>
      <section class="new-section6__section6 layout">
        <div class="new-section6__flex4 layout">
          <h1 class="new-section6__hero-title1 layout customers">
          What customers say about us
          </h1>
          <div class="row reviews mt-99">
           
            <div class="col-md-2 hide"></div>
            <?php  ?>
            <?php foreach ($reviews->getAllFeaturedReviews("text") as $review) : ?>
              <div class="col-md-2 mag chee">
                <div class="review-card">
                  <?php if (isset(getProfilePic($connect, $review["user_id"])["file"])) : ?>
                    <img src="./Dashboard/pic/<?= getProfilePic($connect, $review["user_id"])["file"]; ?>"  class="rounded-circle" style="width: 75px; height: 75px; object-fit: cover; margin-bottom: 13px;">
                  <?php else : ?>
                    <h2 class="avater">
                      <?= getSubName(getUser($connect, $review["user_id"])['firstname'] . " " . getUser($connect, $review["user_id"])["lastname"]); ?>
                    </h2>
                  <?php endif; ?>
                  <div class="new-section6__flex18-item">

                    <div class="new-section6__text-body layout">
                      <p class="review-name">
                        <?= getUser($connect, $review["user_id"])['firstname'] . " " . getUser($connect, $review["user_id"])["lastname"] ?>
                      </p>
                    </div>
                    <div class="star-rating">
                      <?php for ($i = 0; $i < intval($review['rating']); $i++) : ?>
                        <span class="fa fa-star checked" data-rating="<?= $i + 1 ?>"></span>
                      <?php endfor; ?>

                      <?php for ($i = 0; $i < (5 - intval($review['rating'])); $i++) : ?>
                        <span class="fa fa-star-o" data-rating="<?= intval($review['rating']) + ($i + 1) ?>"></span>
                      <?php endfor; ?>

                      <!-- <input type="hidden" name="whatever1" class="rating-value" value="2.56"> -->
                    </div>
                  </div>
                </div>
                <div class="new-section6__paragraph-body-box layout">
                  <p class="new-section6__paragraph-body review-text">
                      <?= strlen($review['review']) > 300 ? substr(trim($review['review']), 0, 300) . "..." : substr(trim($review['review']), 0, 300);  ?>
                  </p>
                </div>
              </div>
              <div class="col-md-1"></div>
            <?php endforeach; ?>
          </div>
          <?php if (count($reviews->getAllFeaturedReviews("video")) >= 3) : ?>
            
              <h1 class="laptopvideo laptopvideoh1">
                Customer's video reviews
              </h1>
              <div class="row reviews mt-99 laptopvideo" >
               
                  <?php $i = 0; ?>
                  <?php foreach ($reviews->getAllFeaturedReviews("video") as $videoReview) : ?>

                    <?php if ($i == 0) :  ?>
                      <div class="col-md-2 hide"></div>
                    <?php else : ?>
                      <div class="col-md-1"></div>
                    <?php endif;  ?>
                  
                    <div class="col-md-2">
                      <video src="./reviews/<?= $videoReview['file'] ?>" loop="" controls="" class="mobilevideo" style="width: 200px;height: 200px; "></video>
                    </div>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                
              </div>
        </div>
      <?php endif; ?>
          <a href="./review" class="btn btn-review" style="border: 1px solid #a0bd1c;  background-color: transparent; color: #a0bd1c;">See More
            Reviews
          </a>
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
                      <input type="email" class="form-control" placeholder="Name" style="font-family: ubuntu;">
                    </div>
                  </div>
                  <div class="new-section7__flex22-item">
                    <div class="new-section7__block16 layout">
                      <input type="text" class="form-control" placeholder="Email" style="font-family: ubuntu;">
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
           <?php include("./inc/footer.php"); ?><?php include("./inc/langChange.php") ?>
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