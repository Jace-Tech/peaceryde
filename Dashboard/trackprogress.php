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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="./dist/css/responsive.css" rel="stylesheet">
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
         @media only screen and (max-width: 2560px)
        {
            .breadcrumb
            {
                margin-top: -130px;
                
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
                margin-top: -120px;
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
                margin-top: -120px;
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
                margin-top: -130px;
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
                margin-top: -130px;
                margin-left: 458px;
            }
            .mobile
            {
                margin-left: 0px;
            }
        }
        @media only screen and (max-width: 1024px){
            .breadcrumb {
                margin-top: -130px;
                margin-left: 338px;
            }
        }
        @media only screen and (max-width: 900px){
            .breadcrumb {
                margin-top: -130px;
                margin-left: 200px;
            }
        }
        @media only screen and (max-width: 853px){
            .breadcrumb {
                margin-top: -130px;
                margin-left: 150px;
            }
        }
    
    
        @media only screen and (max-width: 800px)
        {
            .breadcrumb
            {
                margin-top: -130px;
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
                margin-top: -130px;
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
                margin-top: -130px;
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
                margin-top: -170px;
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
                margin-top: -170px;
                margin-left: 154px;
            }
            .example {
                margin-left: 7px;
            }
    
        }
        @media only screen and (max-width: 428px)
        {
            .breadcrumb
            {
                margin-top: -170px;
                margin-left: 164px;
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
                margin-top: -170px;
                margin-left: 164px;
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
                margin-top: -170px;
                margin-left: 124px;
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
                margin-top: -215px;
                margin-left: 104px;
                width: 280px;
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
                margin-top: -215px;
                margin-left: 104px;
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
                margin-top: -150px;
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


        <div class="page-wrapper" id="main" style="height:100vh">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()"> <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 10px;
                margin-top: 50px;">
                    <rect y="6" width="19" height="3" fill="#A0BD1C" />
                    <rect y="12" width="19" height="3" fill="#A0BD1C" />
                    <rect width="19" height="3" fill="#A0BD1C" />
                </svg>
            </span>
            <div class="page-breadcrumb">
                <div class="row">
                    <div style="align-self:flex-start">
                        <div class="row">
                            <div class="">
                                <h3 class="page-title text-truncate mb-1 trackh3" style="color: #080C58;">My Progress</h3>

                            </div>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <div class="customize-input">
                        <ol class="breadcrumb mb-2"id="ol" >
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
                      

                                <li class="breadcrumb-item logoutlaptop" style="margin-top: 1px;">
                                    <div class=" nav-item dropdown mobilelang" style="margin-top:-29px">
                                        <div id="google_translate_element"></div>
                                        <a class="nav-link dropdown-toggle nav english" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg width="20" height="20" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.083313 7.00004C0.083313 3.45612 2.95606 0.583374 6.49998 0.583374C10.0439 0.583374 12.9166 3.45612 12.9166 7.00004C12.9166 10.544 10.0439 13.4167 6.49998 13.4167C2.95606 13.4167 0.083313 10.544 0.083313 7.00004ZM6.49998 1.75004C3.6004 1.75004 1.24998 4.10046 1.24998 7.00004C1.24998 9.89962 3.6004 12.25 6.49998 12.25C9.39956 12.25 11.75 9.89962 11.75 7.00004C11.75 4.10046 9.39956 1.75004 6.49998 1.75004Z" fill="#080C58" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.73049 0.731373C6.98705 0.536518 7.35299 0.586539 7.54785 0.843098L7.0833 1.19591C7.54785 0.843098 7.54771 0.842914 7.54785 0.843098L7.54843 0.843869L7.54917 0.844854L7.55114 0.847464L7.55693 0.855236L7.5757 0.880901C7.5913 0.902475 7.61293 0.932948 7.63972 0.972048C7.69328 1.05023 7.76758 1.16303 7.85561 1.30828C8.03155 1.59859 8.26313 2.01976 8.49387 2.55432C8.95493 3.62243 9.41664 5.15269 9.41664 7.00008C9.41664 8.84747 8.95493 10.3777 8.49387 11.4458C8.26313 11.9804 8.03155 12.4016 7.85561 12.6919C7.76758 12.8371 7.69328 12.9499 7.63972 13.0281C7.61293 13.0672 7.5913 13.0977 7.5757 13.1193L7.55693 13.1449L7.55114 13.1527L7.54917 13.1553L7.54843 13.1563C7.54829 13.1565 7.54785 13.1571 7.0833 12.8042L7.54785 13.1571C7.35299 13.4136 6.98705 13.4636 6.73049 13.2688C6.47424 13.0742 6.42403 12.7089 6.61805 12.4524C6.61811 12.4523 6.61847 12.4518 6.61853 12.4517C6.61861 12.4516 6.61845 12.4518 6.61853 12.4517L6.61971 12.4501L6.63021 12.4358C6.64025 12.4219 6.65622 12.3994 6.67728 12.3687C6.71942 12.3072 6.78185 12.2126 6.85788 12.0872C7.01006 11.8361 7.21598 11.4625 7.42274 10.9835C7.83668 10.0245 8.24997 8.65269 8.24997 7.00008C8.24997 5.34747 7.83668 3.97565 7.42274 3.01668C7.21598 2.5377 7.01006 2.16407 6.85788 1.91297C6.78185 1.78752 6.71942 1.69296 6.67728 1.63147C6.65622 1.60073 6.64025 1.57828 6.63021 1.56439L6.61971 1.55003L6.61853 1.54842C6.42395 1.29188 6.47403 0.92615 6.73049 0.731373Z" fill="#080C58" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38192 1.54777C6.57592 1.29125 6.5257 0.925984 6.26946 0.731373L6.38192 1.54777ZM5.91665 1.19591L5.45211 0.843098C5.64696 0.586539 6.0129 0.536518 6.26946 0.731373M5.91665 1.19591C5.45211 0.843098 5.45197 0.843272 5.45183 0.843456L5.45152 0.843868L5.45078 0.844853L5.44881 0.847464L5.44302 0.855236L5.42425 0.880901C5.40865 0.902475 5.38702 0.932948 5.36023 0.972048C5.30667 1.05023 5.23238 1.16303 5.14434 1.30828C4.9684 1.59859 4.73682 2.01976 4.50608 2.55432C4.04502 3.62243 3.58331 5.15269 3.58331 7.00008C3.58331 8.84747 4.04502 10.3777 4.50608 11.4458C4.73682 11.9804 4.9684 12.4016 5.14434 12.6919C5.23238 12.8371 5.30667 12.9499 5.36023 13.0281C5.38702 13.0672 5.40865 13.0977 5.42425 13.1193L5.44302 13.1449L5.44881 13.1527L5.45078 13.1553L5.45152 13.1563L5.45183 13.1567C5.45197 13.1569 5.45211 13.1571 5.91665 12.8042L5.45211 13.1571C5.64696 13.4136 6.0129 13.4636 6.26946 13.2688C6.52588 13.074 6.57599 12.7084 6.38152 12.4519L6.38142 12.4517L6.38119 12.4514" fill="#080C58" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.450806 9.04171C0.450806 8.71954 0.711973 8.45837 1.03414 8.45837H11.9658C12.288 8.45837 12.5491 8.71954 12.5491 9.04171C12.5491 9.36387 12.288 9.62504 11.9658 9.62504H1.03414C0.711973 9.62504 0.450806 9.36387 0.450806 9.04171Z" fill="#080C58" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.450806 4.95833C0.450806 4.63617 0.711973 4.375 1.03414 4.375H11.9658C12.288 4.375 12.5491 4.63617 12.5491 4.95833C12.5491 5.2805 12.288 5.54167 11.9658 5.54167H1.03414C0.711973 5.54167 0.450806 5.2805 0.450806 4.95833Z" fill="#080C58" />
                                            </svg>
                                            &nbsp;<span class="langName">English |</span></a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="overflow-y: scroll;height: 350px;">
                                            <li><a class="dropdown-item lang-select" href="#googtrans(en|ar)" data-lang="ar" style="color: black; font-size: 15px; padding-bottom: 10px;">Arabic </a></li>
                                            <li><a class="dropdown-item lang-select" href="#googtrans(en|bn)" data-lang="bn" style="color: black; font-size: 15px; padding-bottom: 10px;">Bengali (Bangla) </a></li>
                                            <li><a class="dropdown-item lang-select" href="#googtrans(en|zh-CN)" data-lang="zh-CN" style="color: black; font-size: 15px; padding-bottom: 10px;">Chinese</a> </li>
                                            <li><a class="dropdown-item lang-select" href="#googtrans(en|cs)" data-lang="cs" style="color: black; font-size: 15px; padding-bottom: 10px;">Czech</a> </li>
                                            <li><a class="dropdown-item lang-select" href="#googtrans(en|nl)" data-lang="nl" style="color: black; font-size: 15px; padding-bottom: 10px;"> Dutch</a> </li>
                                            <li><a class="dropdown-item lang-select" href="#googtrans(en|en)" data-lang="en" style="color: black; font-size: 15px; padding-bottom: 10px;">English </a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|es)" data-lang="es" style="color: black; font-size: 15px; padding-bottom: 10px;">Espanol</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|fr)" data-lang="fr" style="color: black; font-size: 15px; padding-bottom: 10px;">French</a> </li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|de)" data-lang="de" style="color: black; font-size: 15px; padding-bottom: 10px;"> German</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|el)" data-lang="el" style="color: black; font-size: 15px; padding-bottom: 10px;"> Greek</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|hi)" data-lang="hi" style="color: black; font-size: 15px; padding-bottom: 10px;"> Hindi</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|hu)" data-lang="hu" style="color: black; font-size: 15px; padding-bottom: 10px;"> Hungarian</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|it)" data-lang="it" style="color: black; font-size: 15px; padding-bottom: 10px;"> Italian</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|ko)" data-lang="ja" style="color: black; font-size: 15px; padding-bottom: 10px;"> Japanese</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|ko)" data-lang="ko" style="color: black; font-size: 15px; padding-bottom: 10px;"> Korean</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|mr)" data-lang="mr" style="color: black; font-size: 15px; padding-bottom: 10px;"> Marathi</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|pl)" data-lang="pl" style="color: black; font-size: 15px; padding-bottom: 10px;"> Polish</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|pt)" data-lang="pt" style="color: black; font-size: 15px; padding-bottom: 10px;"> Portuguese</a></li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|ru)" data-lang="ru" style="color: black; font-size: 15px; padding-bottom: 10px;">Russian</a> </li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|ta)" data-lang="ta" style="color: black; font-size: 15px; padding-bottom: 10px;"> Tamil</a> </li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|te)" data-lang="te" style="color: black; font-size: 15px; padding-bottom: 10px;"> Telugu</a> </li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|tr)" data-lang="tr" style="color: black; font-size: 15px; padding-bottom: 10px;"> Turkish</a> </li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|ur)" data-lang="ur" style="color: black; font-size: 15px; padding-bottom: 10px;"> Urdu</a> </li>
                                            <li><a class=" dropdown-item lang-select" href="#googtrans(en|vi)" data-lang="vi" style="color: black; font-size: 15px; padding-bottom: 10px;"> Vietnamese</a> </li>
                                        </ul>
                                    </div>
                                </li>
                                
                                <li class="breadcrumb-item logoutmobile" style="margin-top: 0px;">
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

    



<script>
  function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'en,bn,de,ur,el,cs,vi,ta,nl,it,ja,es,hi,pl,pt,zh-CN,zh-TW,ar,so,ru,hy,ko,fr,hu',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}

function triggerHtmlEvent(element, eventName) {
  var event;
  if (document.createEvent) {
    event = document.createEvent('HTMLEvents');
    event.initEvent(eventName, true, true);
    element.dispatchEvent(event);
  } else {
    event = document.createEventObject();
    event.eventType = eventName;
    element.fireEvent('on' + event.eventType, event);
  }
}

jQuery('.lang-select').click(function() {
  var theLang = jQuery(this).attr('data-lang');
  jQuery('.goog-te-combo').val(theLang);

  window.location = jQuery(this).attr('href')
  localStorage.setItem('lang', theLang);
  localStorage.setItem('langFunc', `${jQuery(this).attr('href')}`);
  location.reload();
});


</script> 
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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