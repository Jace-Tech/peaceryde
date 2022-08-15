<?php include("./inc/check_session.php"); ?>
<?php 
  $messages = new Message($connect); 
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
  <title>PeaceRyde</title>
  <!-- Custom CSS -->
  <link href="./assets/extra-libs/c3/c3.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="./assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="./assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="./dist/css/style.min.css" rel="stylesheet">
  <link href="./dist/css/responsive.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>


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

    <header class="topbar" data-navbarbg="skin6">

    </header>


    <!-- Sidebar -->
    <?php include("./inc/sidebar.php"); ?>
    <!-- Sidebar -->

    <div class="page-wrapper" id="main" style="background-color: #e5e5e5;">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()"> <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 10px;
                margin-top: 50px;">
          <rect y="6" width="19" height="3" fill="#A0BD1C" />
          <rect y="12" width="19" height="3" fill="#A0BD1C" />
          <rect width="19" height="3" fill="#A0BD1C" />
        </svg>
      </span>
      <div class="">
        <div class="row">
          <div class="align-self-center">
            <div class="row">
              <div class="">
                <h3 class="page-title text-truncate mb-1 documentext">My Document</h3>

              </div>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <form action="./handler/upload_handler.php" method="post" enctype="multipart/form-data">
        <div>
          <p class="uploadtext">Upload your necessary documents</p>
          <p class="pleaseupload">Please upload images of documents below. see more info about required files</p>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?= $USER_ID ?>">
          <input name="name" type="text" required class="form-control upload-input" placeholder="Document Name">
        </div>
        <div class="drop-zone">
          <p class="drop-zonep"><svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="50" cy="50" r="49.5" fill="#F1F5F6" stroke="#5A5A5A" />
              <path d="M50.1552 47.3009C50.0773 47.2072 49.9777 47.1314 49.864 47.0792C49.7503 47.0271 49.6255 47 49.499 47C49.3725 47 49.2477 47.0271 49.134 47.0792C49.0203 47.1314 48.9207 47.2072 48.8428 47.3009L37.1768 61.1907C37.0806 61.3062 37.0209 61.445 37.0046 61.5909C36.9882 61.7369 37.0159 61.8843 37.0843 62.0162C37.1528 62.1481 37.2593 62.2592 37.3917 62.3369C37.5241 62.4145 37.677 62.4555 37.833 62.4552H45.5305V86.2158C45.5305 86.6471 45.9055 87 46.3638 87H52.6134C53.0717 87 53.4467 86.6471 53.4467 86.2158V62.465H61.165C61.8629 62.465 62.2483 61.7102 61.8212 61.2005L50.1552 47.3009Z" fill="#56C754" />
              <path d="M65.371 43.469C63.0196 35.013 57.0283 29 50.0103 29C42.9922 29 37.0009 35.006 34.6496 43.462C30.2498 45.037 27 50.504 27 57C27 64.735 31.5949 71 37.2627 71H39.3214C39.5473 71 39.7321 70.748 39.7321 70.44V66.24C39.7321 65.932 39.5473 65.68 39.3214 65.68H37.2627C35.5326 65.68 33.9051 64.742 32.6935 63.041C31.4871 61.347 30.8453 59.065 30.9018 56.699C30.948 54.851 31.41 53.115 32.2469 51.652C33.1042 50.161 34.3056 49.076 35.6404 48.593L37.5862 47.9L38.2998 45.338C38.7413 43.742 39.3574 42.251 40.1326 40.9C40.8979 39.561 41.8045 38.3838 42.8228 37.407C44.9328 35.384 47.4176 34.313 50.0103 34.313C52.6029 34.313 55.0877 35.384 57.1978 37.407C58.2194 38.387 59.123 39.563 59.8879 40.9C60.6632 42.251 61.2792 43.749 61.7208 45.338L62.4292 47.893L64.3699 48.593C67.1525 49.615 69.0982 53.066 69.0982 57C69.0982 59.317 68.4359 61.501 67.2346 63.139C66.6455 63.947 65.9446 64.5876 65.1726 65.0238C64.4007 65.4599 63.5729 65.683 62.7373 65.68H60.6786C60.4527 65.68 60.2679 65.932 60.2679 66.24V70.44C60.2679 70.748 60.4527 71 60.6786 71H62.7373C68.4051 71 73 64.735 73 57C73 50.511 69.7605 45.051 65.371 43.469Z" fill="#56C754" />
            </svg></p>

          <p class="dropfilep"><span class="drop-zone__prompt">Drop file here</span></p>
          <p class="dropfilep2"><span class="drop-zone__prompt">or browse file from your computer</span></p>
          <input type="file" required multiple name="myFile[]" class="drop-zone__input">
        </div>
        <div class="mt-4 p-4 text-left">
          <button name="upload" type="submit" class="btn border-0" style="background-color: #a0bd1c; color: #fff;">Upload file</button>
        </div>
      </form>

      <!-- <div class="row"> -->
        <!-- <div class="col-md-6 h3div">
          <h3 class="h3doc">Document</h3>
          <p class="h3p">Please see the list of documents below that we need in order <br>to process your application </p>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-3 mt-138">
          <p>
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10 0.375C8.09636 0.375 6.23546 0.939497 4.65264 1.99711C3.06982 3.05471 1.83616 4.55793 1.10766 6.31667C0.37917 8.07541 0.188563 10.0107 0.559946 11.8777C0.931329 13.7448 1.84802 15.4598 3.1941 16.8059C4.54018 18.152 6.25519 19.0687 8.12226 19.4401C9.98933 19.8114 11.9246 19.6208 13.6833 18.8923C15.4421 18.1638 16.9453 16.9302 18.0029 15.3474C19.0605 13.7645 19.625 11.9036 19.625 10C19.625 7.44729 18.6109 4.99913 16.8059 3.1941C15.0009 1.38906 12.5527 0.375 10 0.375ZM10 18.25C8.36831 18.25 6.77326 17.7661 5.41655 16.8596C4.05984 15.9531 3.00242 14.6646 2.378 13.1571C1.75358 11.6496 1.5902 9.99085 1.90853 8.3905C2.22685 6.79016 3.01259 5.32015 4.16637 4.16637C5.32016 3.01259 6.79017 2.22685 8.39051 1.90852C9.99085 1.59019 11.6497 1.75357 13.1571 2.37799C14.6646 3.00242 15.9531 4.05984 16.8596 5.41655C17.7661 6.77325 18.25 8.3683 18.25 10C18.25 12.188 17.3808 14.2865 15.8336 15.8336C14.2865 17.3808 12.188 18.25 10 18.25Z" fill="#5A5A5A" />
              <path d="M9.3125 4.5H10.6875V12.0625H9.3125V4.5Z" fill="#5A5A5A" />
              <path d="M10 14.125C9.79604 14.125 9.59666 14.1855 9.42707 14.2988C9.25748 14.4121 9.1253 14.5732 9.04725 14.7616C8.9692 14.95 8.94877 15.1574 8.98857 15.3574C9.02836 15.5575 9.12657 15.7412 9.2708 15.8855C9.41502 16.0297 9.59877 16.1279 9.79881 16.1677C9.99886 16.2075 10.2062 16.1871 10.3946 16.109C10.5831 16.0309 10.7441 15.8988 10.8575 15.7292C10.9708 15.5596 11.0313 15.3602 11.0313 15.1562C11.0313 14.8827 10.9226 14.6204 10.7292 14.427C10.5358 14.2336 10.2735 14.125 10 14.125Z" fill="#5A5A5A" />
            </svg>
            <span style="font-family: Rubik;color:#000000;
                            font-size: 16px;
                            font-style: normal;
                            font-weight: 400;
                            ">0 out of 5 file uploaded</span>
          </p>
        </div> -->
      <!-- </div> -->

      <!-- <div class="card tablecard">
                <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col" style="color:#0A0B0D;font-family: Segoe UI;padding-left:16px;font-size: 14px;font-style: normal;font-weight: 600;">Document type</th>
                        <th scope="col" style="color:#0A0B0D;font-family: Segoe UI;font-size: 14px;font-style: normal;font-weight: 600;">Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                       
                      <tr>
                        <th scope="row" class="lorem">lorem</th>
                        <td style="padding-top:25px;"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.625C7.26942 0.625 5.57769 1.08686 4.13876 1.95218C2.69983 2.81749 1.57832 4.0474 0.916058 5.48637C0.253791 6.92534 0.080512 8.50874 0.418133 10.0363C0.755753 11.5639 1.58911 12.9671 2.81282 14.0685C4.03653 15.1698 5.59563 15.9198 7.29296 16.2237C8.9903 16.5275 10.7496 16.3716 12.3485 15.7756C13.9473 15.1795 15.3139 14.1702 16.2754 12.8751C17.2368 11.5801 17.75 10.0575 17.75 8.5C17.75 6.41142 16.8281 4.40838 15.1872 2.93153C13.5462 1.45469 11.3206 0.625 9 0.625ZM9 15.25C7.51664 15.25 6.0666 14.8541 4.83323 14.1124C3.59986 13.3707 2.63856 12.3165 2.07091 11.0831C1.50325 9.84971 1.35473 8.49251 1.64411 7.18314C1.9335 5.87377 2.64781 4.67103 3.6967 3.72703C4.7456 2.78302 6.08197 2.14015 7.53683 1.8797C8.99168 1.61925 10.4997 1.75292 11.8701 2.26381C13.2406 2.7747 14.4119 3.63987 15.236 4.7499C16.0601 5.85993 16.5 7.16498 16.5 8.5C16.5 10.2902 15.7098 12.0071 14.3033 13.273C12.8968 14.5388 10.9891 15.25 9 15.25Z" fill="#5B616E"/>
                            <path d="M8.375 4H9.625V10.1875H8.375V4Z" fill="#5B616E"/>
                            <path d="M9 11.875C8.81458 11.875 8.63332 11.9245 8.47915 12.0172C8.32498 12.1099 8.20482 12.2417 8.13386 12.3959C8.06291 12.55 8.04434 12.7197 8.08051 12.8834C8.11669 13.047 8.20598 13.1974 8.33709 13.3154C8.4682 13.4334 8.63525 13.5137 8.8171 13.5463C8.99896 13.5788 9.18746 13.5621 9.35877 13.4983C9.53007 13.4344 9.67649 13.3263 9.7795 13.1875C9.88252 13.0488 9.9375 12.8856 9.9375 12.7187C9.9375 12.495 9.83873 12.2804 9.66291 12.1221C9.4871 11.9639 9.24864 11.875 9 11.875Z" fill="#5B616E"/>
                            </svg>
                            <span class="uploadsize">Awaiting uploads</span></td>                        
                      </tr>
                      <tr>
                        <th scope="row" class="lorem">lorem</th>
                        <td style="padding-top:25px;"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.625C7.26942 0.625 5.57769 1.08686 4.13876 1.95218C2.69983 2.81749 1.57832 4.0474 0.916058 5.48637C0.253791 6.92534 0.080512 8.50874 0.418133 10.0363C0.755753 11.5639 1.58911 12.9671 2.81282 14.0685C4.03653 15.1698 5.59563 15.9198 7.29296 16.2237C8.9903 16.5275 10.7496 16.3716 12.3485 15.7756C13.9473 15.1795 15.3139 14.1702 16.2754 12.8751C17.2368 11.5801 17.75 10.0575 17.75 8.5C17.75 6.41142 16.8281 4.40838 15.1872 2.93153C13.5462 1.45469 11.3206 0.625 9 0.625ZM9 15.25C7.51664 15.25 6.0666 14.8541 4.83323 14.1124C3.59986 13.3707 2.63856 12.3165 2.07091 11.0831C1.50325 9.84971 1.35473 8.49251 1.64411 7.18314C1.9335 5.87377 2.64781 4.67103 3.6967 3.72703C4.7456 2.78302 6.08197 2.14015 7.53683 1.8797C8.99168 1.61925 10.4997 1.75292 11.8701 2.26381C13.2406 2.7747 14.4119 3.63987 15.236 4.7499C16.0601 5.85993 16.5 7.16498 16.5 8.5C16.5 10.2902 15.7098 12.0071 14.3033 13.273C12.8968 14.5388 10.9891 15.25 9 15.25Z" fill="#5B616E"/>
                            <path d="M8.375 4H9.625V10.1875H8.375V4Z" fill="#5B616E"/>
                            <path d="M9 11.875C8.81458 11.875 8.63332 11.9245 8.47915 12.0172C8.32498 12.1099 8.20482 12.2417 8.13386 12.3959C8.06291 12.55 8.04434 12.7197 8.08051 12.8834C8.11669 13.047 8.20598 13.1974 8.33709 13.3154C8.4682 13.4334 8.63525 13.5137 8.8171 13.5463C8.99896 13.5788 9.18746 13.5621 9.35877 13.4983C9.53007 13.4344 9.67649 13.3263 9.7795 13.1875C9.88252 13.0488 9.9375 12.8856 9.9375 12.7187C9.9375 12.495 9.83873 12.2804 9.66291 12.1221C9.4871 11.9639 9.24864 11.875 9 11.875Z" fill="#5B616E"/>
                            </svg>
                            <span class="uploadsize">Awaiting uploads</span></td>                        
                      </tr>
                      <tr>
                        <th scope="row" class="lorem">lorem</th>
                        <td style="padding-top:25px;"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.625C7.26942 0.625 5.57769 1.08686 4.13876 1.95218C2.69983 2.81749 1.57832 4.0474 0.916058 5.48637C0.253791 6.92534 0.080512 8.50874 0.418133 10.0363C0.755753 11.5639 1.58911 12.9671 2.81282 14.0685C4.03653 15.1698 5.59563 15.9198 7.29296 16.2237C8.9903 16.5275 10.7496 16.3716 12.3485 15.7756C13.9473 15.1795 15.3139 14.1702 16.2754 12.8751C17.2368 11.5801 17.75 10.0575 17.75 8.5C17.75 6.41142 16.8281 4.40838 15.1872 2.93153C13.5462 1.45469 11.3206 0.625 9 0.625ZM9 15.25C7.51664 15.25 6.0666 14.8541 4.83323 14.1124C3.59986 13.3707 2.63856 12.3165 2.07091 11.0831C1.50325 9.84971 1.35473 8.49251 1.64411 7.18314C1.9335 5.87377 2.64781 4.67103 3.6967 3.72703C4.7456 2.78302 6.08197 2.14015 7.53683 1.8797C8.99168 1.61925 10.4997 1.75292 11.8701 2.26381C13.2406 2.7747 14.4119 3.63987 15.236 4.7499C16.0601 5.85993 16.5 7.16498 16.5 8.5C16.5 10.2902 15.7098 12.0071 14.3033 13.273C12.8968 14.5388 10.9891 15.25 9 15.25Z" fill="#5B616E"/>
                            <path d="M8.375 4H9.625V10.1875H8.375V4Z" fill="#5B616E"/>
                            <path d="M9 11.875C8.81458 11.875 8.63332 11.9245 8.47915 12.0172C8.32498 12.1099 8.20482 12.2417 8.13386 12.3959C8.06291 12.55 8.04434 12.7197 8.08051 12.8834C8.11669 13.047 8.20598 13.1974 8.33709 13.3154C8.4682 13.4334 8.63525 13.5137 8.8171 13.5463C8.99896 13.5788 9.18746 13.5621 9.35877 13.4983C9.53007 13.4344 9.67649 13.3263 9.7795 13.1875C9.88252 13.0488 9.9375 12.8856 9.9375 12.7187C9.9375 12.495 9.83873 12.2804 9.66291 12.1221C9.4871 11.9639 9.24864 11.875 9 11.875Z" fill="#5B616E"/>
                            </svg>
                            <span class="uploadsize">Awaiting uploads</span></td>                        
                      </tr>
                      <tr>
                        <th scope="row" class="lorem">lorem</th>
                        <td style="padding-top:25px;"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.625C7.26942 0.625 5.57769 1.08686 4.13876 1.95218C2.69983 2.81749 1.57832 4.0474 0.916058 5.48637C0.253791 6.92534 0.080512 8.50874 0.418133 10.0363C0.755753 11.5639 1.58911 12.9671 2.81282 14.0685C4.03653 15.1698 5.59563 15.9198 7.29296 16.2237C8.9903 16.5275 10.7496 16.3716 12.3485 15.7756C13.9473 15.1795 15.3139 14.1702 16.2754 12.8751C17.2368 11.5801 17.75 10.0575 17.75 8.5C17.75 6.41142 16.8281 4.40838 15.1872 2.93153C13.5462 1.45469 11.3206 0.625 9 0.625ZM9 15.25C7.51664 15.25 6.0666 14.8541 4.83323 14.1124C3.59986 13.3707 2.63856 12.3165 2.07091 11.0831C1.50325 9.84971 1.35473 8.49251 1.64411 7.18314C1.9335 5.87377 2.64781 4.67103 3.6967 3.72703C4.7456 2.78302 6.08197 2.14015 7.53683 1.8797C8.99168 1.61925 10.4997 1.75292 11.8701 2.26381C13.2406 2.7747 14.4119 3.63987 15.236 4.7499C16.0601 5.85993 16.5 7.16498 16.5 8.5C16.5 10.2902 15.7098 12.0071 14.3033 13.273C12.8968 14.5388 10.9891 15.25 9 15.25Z" fill="#5B616E"/>
                            <path d="M8.375 4H9.625V10.1875H8.375V4Z" fill="#5B616E"/>
                            <path d="M9 11.875C8.81458 11.875 8.63332 11.9245 8.47915 12.0172C8.32498 12.1099 8.20482 12.2417 8.13386 12.3959C8.06291 12.55 8.04434 12.7197 8.08051 12.8834C8.11669 13.047 8.20598 13.1974 8.33709 13.3154C8.4682 13.4334 8.63525 13.5137 8.8171 13.5463C8.99896 13.5788 9.18746 13.5621 9.35877 13.4983C9.53007 13.4344 9.67649 13.3263 9.7795 13.1875C9.88252 13.0488 9.9375 12.8856 9.9375 12.7187C9.9375 12.495 9.83873 12.2804 9.66291 12.1221C9.4871 11.9639 9.24864 11.875 9 11.875Z" fill="#5B616E"/>
                            </svg>
                            <span class="uploadsize">Awaiting uploads</span></td>                        
                      </tr>
                      <tr>
                        <th scope="row" class="lorem">lorem</th>
                        <td style="padding-top:25px;"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.625C7.26942 0.625 5.57769 1.08686 4.13876 1.95218C2.69983 2.81749 1.57832 4.0474 0.916058 5.48637C0.253791 6.92534 0.080512 8.50874 0.418133 10.0363C0.755753 11.5639 1.58911 12.9671 2.81282 14.0685C4.03653 15.1698 5.59563 15.9198 7.29296 16.2237C8.9903 16.5275 10.7496 16.3716 12.3485 15.7756C13.9473 15.1795 15.3139 14.1702 16.2754 12.8751C17.2368 11.5801 17.75 10.0575 17.75 8.5C17.75 6.41142 16.8281 4.40838 15.1872 2.93153C13.5462 1.45469 11.3206 0.625 9 0.625ZM9 15.25C7.51664 15.25 6.0666 14.8541 4.83323 14.1124C3.59986 13.3707 2.63856 12.3165 2.07091 11.0831C1.50325 9.84971 1.35473 8.49251 1.64411 7.18314C1.9335 5.87377 2.64781 4.67103 3.6967 3.72703C4.7456 2.78302 6.08197 2.14015 7.53683 1.8797C8.99168 1.61925 10.4997 1.75292 11.8701 2.26381C13.2406 2.7747 14.4119 3.63987 15.236 4.7499C16.0601 5.85993 16.5 7.16498 16.5 8.5C16.5 10.2902 15.7098 12.0071 14.3033 13.273C12.8968 14.5388 10.9891 15.25 9 15.25Z" fill="#5B616E"/>
                            <path d="M8.375 4H9.625V10.1875H8.375V4Z" fill="#5B616E"/>
                            <path d="M9 11.875C8.81458 11.875 8.63332 11.9245 8.47915 12.0172C8.32498 12.1099 8.20482 12.2417 8.13386 12.3959C8.06291 12.55 8.04434 12.7197 8.08051 12.8834C8.11669 13.047 8.20598 13.1974 8.33709 13.3154C8.4682 13.4334 8.63525 13.5137 8.8171 13.5463C8.99896 13.5788 9.18746 13.5621 9.35877 13.4983C9.53007 13.4344 9.67649 13.3263 9.7795 13.1875C9.88252 13.0488 9.9375 12.8856 9.9375 12.7187C9.9375 12.495 9.83873 12.2804 9.66291 12.1221C9.4871 11.9639 9.24864 11.875 9 11.875Z" fill="#5B616E"/>
                            </svg>
                            <span class="uploadsize">Awaiting uploads</span></td>                        
                      </tr>
                      <tr>
                        <th scope="row" class="lorem">lorem</th>
                        <td style="padding-top:25px;"><svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.625C7.26942 0.625 5.57769 1.08686 4.13876 1.95218C2.69983 2.81749 1.57832 4.0474 0.916058 5.48637C0.253791 6.92534 0.080512 8.50874 0.418133 10.0363C0.755753 11.5639 1.58911 12.9671 2.81282 14.0685C4.03653 15.1698 5.59563 15.9198 7.29296 16.2237C8.9903 16.5275 10.7496 16.3716 12.3485 15.7756C13.9473 15.1795 15.3139 14.1702 16.2754 12.8751C17.2368 11.5801 17.75 10.0575 17.75 8.5C17.75 6.41142 16.8281 4.40838 15.1872 2.93153C13.5462 1.45469 11.3206 0.625 9 0.625ZM9 15.25C7.51664 15.25 6.0666 14.8541 4.83323 14.1124C3.59986 13.3707 2.63856 12.3165 2.07091 11.0831C1.50325 9.84971 1.35473 8.49251 1.64411 7.18314C1.9335 5.87377 2.64781 4.67103 3.6967 3.72703C4.7456 2.78302 6.08197 2.14015 7.53683 1.8797C8.99168 1.61925 10.4997 1.75292 11.8701 2.26381C13.2406 2.7747 14.4119 3.63987 15.236 4.7499C16.0601 5.85993 16.5 7.16498 16.5 8.5C16.5 10.2902 15.7098 12.0071 14.3033 13.273C12.8968 14.5388 10.9891 15.25 9 15.25Z" fill="#5B616E"/>
                            <path d="M8.375 4H9.625V10.1875H8.375V4Z" fill="#5B616E"/>
                            <path d="M9 11.875C8.81458 11.875 8.63332 11.9245 8.47915 12.0172C8.32498 12.1099 8.20482 12.2417 8.13386 12.3959C8.06291 12.55 8.04434 12.7197 8.08051 12.8834C8.11669 13.047 8.20598 13.1974 8.33709 13.3154C8.4682 13.4334 8.63525 13.5137 8.8171 13.5463C8.99896 13.5788 9.18746 13.5621 9.35877 13.4983C9.53007 13.4344 9.67649 13.3263 9.7795 13.1875C9.88252 13.0488 9.9375 12.8856 9.9375 12.7187C9.9375 12.495 9.83873 12.2804 9.66291 12.1221C9.4871 11.9639 9.24864 11.875 9 11.875Z" fill="#5B616E"/>
                            </svg>
                            <span class="uploadsize">Awaiting uploads</span></td>                        
                      </tr>
                    </tbody>
                  </table>
            </div> -->

      <!-- <footer class="footer text-center text-muted">
                All Rights Reserved by t</a>.
            </footer> -->

    </div>

  </div>
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
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
      const dropZoneElement = inputElement.closest(".drop-zone");

      dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
      });

      inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
          updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
      });

      dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
      });

      ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
          dropZoneElement.classList.remove("drop-zone--over");
        });
      });

      dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
          inputElement.files = e.dataTransfer.files;
          updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }

        dropZoneElement.classList.remove("drop-zone--over");
      });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
      let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

      // First time - remove the prompt
      if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
      }

      // First time - there is no thumbnail element, so lets create it
      if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
      }

      thumbnailElement.dataset.label = file.name;

      // Show thumbnail for image files
      if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
          thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
      } else {
        thumbnailElement.style.backgroundImage = null;
      }
    }
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