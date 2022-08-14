<?php include("./inc/check_session.php"); ?>

<?php
$services = new UserService($connect);
$SERVICE = new Service($connect);
$userServices = $services->getUserServices($USER_ID);

$messages = new Message($connect);

$USER_MESSAGES = $messages->get_conversation($USER_ID, "MAIN_ADMIN");
$isUnread = count($messages->get_user_unread_messages($USER_ID));
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
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="./dist/css/responsive.css" rel="stylesheet">
    <style>
         @media only screen and (max-width: 2560px)
        {
            .breadcrumb
            {
                margin-top: -100px;
                
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 1600px)
        {
            .breadcrumb
            {
                margin-top: -90px;
                margin-left: 758px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 1440px)
        {
            .breadcrumb
            {
                margin-top: -90px;
                margin-left: 658px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 1366px)
        {
            .breadcrumb
            {
                margin-top: -100px;
                margin-left: 558px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 1280px)
        {
            .breadcrumb
            {
                margin-top: -100px;
                margin-left: 458px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 1024px){
            .breadcrumb {
                margin-top: -100px;
                margin-left: 338px;
            }
        }
        @media only screen and (max-width: 900px){
            .breadcrumb {
                margin-top: -100px;
                margin-left: 200px;
            }
        }
        @media only screen and (max-width: 853px){
            .breadcrumb {
                margin-top: -100px;
                margin-left: 150px;
            }
        }
    
    
        @media only screen and (max-width: 800px)
        {
            .breadcrumb
            {
                margin-top: -100px;
                margin-left: 98px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 768px)
        {
            .breadcrumb
            {
                margin-top: -100px;
                margin-left: 74px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 640px)
        {
            .left-sidebar {
                width: 100%;
            }
            .breadcrumb
            {
                margin-top: -100px;
                margin-left: 74px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 603px)
        {
           
            .account
            {
                padding-top: 0px;
            }
            .account-img {
                margin-left: 19px;
            }
            .page-breadcrumb {
                padding: 70px 35px 0;
            }
            .breadcrumb {
                margin-top: -140px;
                margin-left: 114px;
            }
            .example {
                margin-left: 7px;
            }
    
        }
        @media only screen and (max-width: 540px)
        {
           
            .account
            {
                padding-top: 0px;
            }
            .account-img {
                margin-left: 19px;
            }
            .page-breadcrumb {
                padding: 70px 35px 0;
            }
            .breadcrumb {
                margin-top: -140px;
                margin-left: 54px;
            }
            .example {
                margin-left: 7px;
            }
    
        }
        @media only screen and (max-width: 428px)
        {
            .breadcrumb
            {
                margin-top: -140px;
                margin-left: 14px;
            }
            .account{
                padding-top: 0px;
            }
            .page-breadcrumb .breadcrumb
            {
                font-size: .6rem;
            }
            .example
            {
                margin-left: 3px;
            }
            .page-breadcrumb
            {
               padding: 70px 35px 0;
            }
            .account-img
            {
                margin-left: 9px;
            }
        }
        @media only screen and (max-width: 414px)
        {
            .breadcrumb
            {
                margin-top: -140px;
                margin-left: 14px;
            }
            .account{
                padding-top: 0px;
            }
            .page-breadcrumb .breadcrumb
            {
                font-size: .6rem;
            }
            .example
            {
                margin-left: 3px;
            }
            .page-breadcrumb
            {
               padding: 70px 35px 0;
            }
            .account-img
            {
                margin-left: 9px;
            }
        }
        @media only screen and (max-width: 390px)
        {
            .breadcrumb
            {
                margin-top: -140px;
                margin-left: 14px;
            }
            .account{
                padding-top: 0px;
            }
            .page-breadcrumb .breadcrumb
            {
                font-size: .6rem;
            }
            .example
            {
                margin-left: 3px;
            }
            .mobile
            {
                margin-left: 30px;
            }
            .sidebarAccount h2
            {
                margin-left: -25px;
            }
            .sidebarAccount p
            {
                margin-left: -30px;
            }
        }
        @media only screen and (max-width: 360px)
        {
            .breadcrumb
            {
                margin-top: -140px;
                margin-left: 14px;
            }
            .page-breadcrumb .breadcrumb
            {
                font-size: .5rem;
            }
            
        }
        @media only screen and (max-width: 320px)
        {
            .breadcrumb
            {
                margin-top: -140px;
                margin-left: 4px;
                width: 280px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 280px)
        {
            .breadcrumb {
                margin-top: -145px;
                margin-left: 94px;
                width: 300px;
            }
            .mobile
            {
                margin-left: 0px;
            }
            .account
            {
                padding-left: 0px;
            }
            .page-breadcrumb {
                padding: 0px 20px 0;
            }
            .account-img {
                margin-left: 49px;
            }
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

        <header class="topbar" data-navbarbg="skin6">

        </header>


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
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="align-self-center">
                        <div class="row">
                            <div class="">
                                <h3 class="page-title text-truncate mb-1 trackh3" style="color: #080C58;">My Progress</h3>

                            </div>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <div class="customize-input">
                        <ol class="breadcrumb mb-2"id="ol">
                                <?php if ($isUnread) : ?>
                                    <li class="breadcrumb-item" style="margin-top: 1px;">
                                        <a href="./inbox.php" style="color: #080C58;"><svg width="22" height="20" style="margin-top: -5px;" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.6618 3.6875C19.1722 3.6875 20.3962 4.91146 20.3962 6.42188V16.5781C20.3962 18.0885 19.1722 19.3125 17.6618 19.3125H3.33887C2.61367 19.3125 1.91817 19.0244 1.40537 18.5116C0.892577 17.9988 0.604492 17.3033 0.604492 16.5781V6.42188C0.604492 4.91146 1.82845 3.6875 3.33887 3.6875H17.6618ZM19.0941 8.55781L10.8139 13.112C10.7287 13.1588 10.6341 13.186 10.537 13.1915C10.4399 13.197 10.3429 13.1807 10.2529 13.1437L10.1868 13.1125L1.90658 8.55729V16.5781C1.90658 16.958 2.05748 17.3223 2.32608 17.5909C2.59469 17.8595 2.959 18.0104 3.33887 18.0104H17.6618C18.0417 18.0104 18.406 17.8595 18.6746 17.5909C18.9432 17.3223 19.0941 16.958 19.0941 16.5781V8.55781ZM17.6618 4.98958H3.33887C2.959 4.98958 2.59469 5.14048 2.32608 5.40909C2.05748 5.6777 1.90658 6.04201 1.90658 6.42188V7.0724L10.5003 11.7984L19.0941 7.07187V6.42188C19.0941 6.04201 18.9432 5.6777 18.6746 5.40909C18.406 5.14048 18.0417 4.98958 17.6618 4.98958Z" fill="#080C58" />
                                                <circle cx="16" cy="6.09082" r="6" fill="#E80F0F" />
                                            </svg>
                                            <span style="margin-top:5px ;">&nbsp;Inbox</span>
                                        </a>
                                    </li>
                                <?php else : ?>
                                    <li class="breadcrumb-item" style="margin-top: 1px;">
                                        <a href="./inbox.php" style="color: #080C58;"><svg width="22" height="20" style="margin-top: -5px;" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.6618 3.6875C19.1722 3.6875 20.3962 4.91146 20.3962 6.42188V16.5781C20.3962 18.0885 19.1722 19.3125 17.6618 19.3125H3.33887C2.61367 19.3125 1.91817 19.0244 1.40537 18.5116C0.892577 17.9988 0.604492 17.3033 0.604492 16.5781V6.42188C0.604492 4.91146 1.82845 3.6875 3.33887 3.6875H17.6618ZM19.0941 8.55781L10.8139 13.112C10.7287 13.1588 10.6341 13.186 10.537 13.1915C10.4399 13.197 10.3429 13.1807 10.2529 13.1437L10.1868 13.1125L1.90658 8.55729V16.5781C1.90658 16.958 2.05748 17.3223 2.32608 17.5909C2.59469 17.8595 2.959 18.0104 3.33887 18.0104H17.6618C18.0417 18.0104 18.406 17.8595 18.6746 17.5909C18.9432 17.3223 19.0941 16.958 19.0941 16.5781V8.55781ZM17.6618 4.98958H3.33887C2.959 4.98958 2.59469 5.14048 2.32608 5.40909C2.05748 5.6777 1.90658 6.04201 1.90658 6.42188V7.0724L10.5003 11.7984L19.0941 7.07187V6.42188C19.0941 6.04201 18.9432 5.6777 18.6746 5.40909C18.406 5.14048 18.0417 4.98958 17.6618 4.98958Z" fill="#080C58" />
                                            </svg>
                                            <span style="margin-top:5px ;">&nbsp;Inbox</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                

                                <li class="breadcrumb-item logoutlaptop" style="margin-top: 1px;">
                                    <form action="./handler/logout_handler.php" method="post" style="display: inline-block">
                                        <button style="background-color: transparent; border: none; color: #080C58;" name="logout" href="javascript:void(0)">
                                            <svg width="18" height="18" style="margin-top: -5px;" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.0625 2.58789L12.4375 3.66914C13.7482 4.42585 14.7725 5.5939 15.3517 6.99212C15.9308 8.39034 16.0324 9.94059 15.6407 11.4024C15.249 12.8643 14.3859 14.1561 13.1852 15.0774C11.9846 15.9987 10.5134 16.4981 9 16.4981C7.48658 16.4981 6.01545 15.9987 4.81477 15.0774C3.61409 14.1561 2.75097 12.8643 2.35926 11.4024C1.96756 9.94059 2.06917 8.39034 2.64833 6.99212C3.22749 5.5939 4.25184 4.42585 5.5625 3.66914L4.9375 2.58789C3.38854 3.48219 2.17795 4.8626 1.49348 6.51504C0.809018 8.16749 0.688934 9.99961 1.15186 11.7273C1.61478 13.4549 2.63483 14.9815 4.05382 16.0703C5.4728 17.1592 7.21141 17.7493 9 17.7493C10.7886 17.7493 12.5272 17.1592 13.9462 16.0703C15.3652 14.9815 16.3852 13.4549 16.8482 11.7273C17.3111 9.99961 17.191 8.16749 16.5065 6.51504C15.8221 4.8626 14.6115 3.48219 13.0625 2.58789Z" fill="#E80F0F" />
                                                <path d="M8.375 0.25H9.625V9H8.375V0.25Z" fill="#E80F0F" />
                                            </svg>
                                            &nbsp; &nbsp; Logout
                                        </button>
                                    </form>
                                </li>
                      
                                <li class="breadcrumb-item logoutmobile" style="margin-top: 10px;">
                                <form action="./handler/logout_handler.php" method="post" style="display: inline-block">
                                <button style="background-color: transparent; border: none; color: #080C58;" name="logout" href="javascript:void(0)">
                                 <svg width="18" height="18" style="margin-top: -5px;" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.0625 2.58789L12.4375 3.66914C13.7482 4.42585 14.7725 5.5939 15.3517 6.99212C15.9308 8.39034 16.0324 9.94059 15.6407 11.4024C15.249 12.8643 14.3859 14.1561 13.1852 15.0774C11.9846 15.9987 10.5134 16.4981 9 16.4981C7.48658 16.4981 6.01545 15.9987 4.81477 15.0774C3.61409 14.1561 2.75097 12.8643 2.35926 11.4024C1.96756 9.94059 2.06917 8.39034 2.64833 6.99212C3.22749 5.5939 4.25184 4.42585 5.5625 3.66914L4.9375 2.58789C3.38854 3.48219 2.17795 4.8626 1.49348 6.51504C0.809018 8.16749 0.688934 9.99961 1.15186 11.7273C1.61478 13.4549 2.63483 14.9815 4.05382 16.0703C5.4728 17.1592 7.21141 17.7493 9 17.7493C10.7886 17.7493 12.5272 17.1592 13.9462 16.0703C15.3652 14.9815 16.3852 13.4549 16.8482 11.7273C17.3111 9.99961 17.191 8.16749 16.5065 6.51504C15.8221 4.8626 14.6115 3.48219 13.0625 2.58789Z" fill="#E80F0F"/>
                                    <path d="M8.375 0.25H9.625V9H8.375V0.25Z" fill="#E80F0F"/>
                                    </svg> &nbsp; &nbsp; Logout
                                        </button>
                                    </form>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card progresscard">
                <table class="table table-borderless table-responsive">
                    <thead>
                        <tr>
                            <th scope="col" class="progressservice">Services</th>
                            <th scope="col" class="progressstatus">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($userServices)) : ?>
                            <?php foreach ($userServices as $service) : ?>
                                <?php if(checkIfPayed($connect, $service['id'])): ?>
                                    <tr>
                                        <th scope="row" class="progressth">
                                            <?= $SERVICE->getUserService($service['service_id'])['service'] ?>
                                        </th>
                                        <td class="progressapprove" style="text-transform: capitalize;">
                                            <?= $service['status'] ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="2" class="text-muted">No service found</td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

            <!-- <div class="chat-popup" id="myForm">
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
                                        <path d="M32.4419 20.4722C32.5822 19.2858 32.0534 18.1264 31.0686 17.4434L8.12261 1.50404C7.09665 0.772938 5.80289 0.713532 4.70133 1.30734C3.57966 1.91099 2.86538 3.55356 3.029 4.81133L4.30132 14.5749C4.43205 15.5761 5.23388 16.3557 6.23997 16.4571L19.7964 17.8394C20.4918 17.8985 20.9955 18.5204 20.9086 19.213C20.8348 19.8949 20.222 20.3912 19.5266 20.3321L5.95836 18.9379C4.95253 18.8342 4.00153 19.4326 3.65928 20.3856L0.300426 29.7007C-0.10413 30.8007 0.103129 31.9631 0.816651 32.8442C0.900595 32.9479 0.995031 33.0645 1.09201 33.1576C2.04085 34.0627 3.38245 34.3065 4.60167 33.8126L30.4291 23.1319C31.5361 22.6861 32.3016 21.6586 32.4419 20.4722Z" fill="#1161D9" />
                                    </svg>
                                </div>
                            </nav>
                        </div>
                    </div>

                </form>
            </div> -->

            <!-- <footer class="footer text-center text-muted">
                All Rights Reserved by t</a>.
            </footer> -->

        </div>

    </div>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
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