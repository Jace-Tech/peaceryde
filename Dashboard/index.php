<?php include("./inc/check_session.php"); ?>
<?php
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
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="./dist/css/responsive.css" rel="stylesheet">
    <script>
        const isOld = localStorage.getItem("USER_REG")
        if (isOld) {
            const {
                mode
            } = JSON.parse(isOld)

            switch (mode) {
                case "NBV":
                    window.location.href = "./NBVADASHFORM.php"
                    break;

                case "BI":
                    window.location.href = "./NBIDASHFORM.php"
                    break;

                case "TWP":
                    window.location.href = "./NTWPDASHFORM.php"
                    break;

                default:
                    break;
            }
        }
    </script>
    <!-- Custom CSS -->
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="../dist/css/responsive.css" rel="stylesheet">
    <style>
        @media only screen and (max-width: 2560px) {
            .acc {
                margin-left: 60px;
                margin-bottom: 60px;
            }

            .breadcrumb {
                margin-top: -215px;
                margin-left: 58px;
            }
        }

        @media only screen and (max-width: 1600px) {
            .breadcrumb {
                margin-top: -215px;
                margin-left: 158px;
            }

            .mobile {
                margin-left: 60px;
            }
        }

        @media only screen and (max-width: 1440px) {
            .breadcrumb {
                margin-top: -215px;
                margin-left: 58px;
            }

            .mobile {
                margin-left: 60px;
            }
        }

        @media only screen and (max-width: 1366px) {
            .breadcrumb {
                margin-top: -215px;
                margin-left: 58px;
            }

            .mobile {
                margin-left: 0px;
            }
        }


        @media only screen and (max-width: 1280px) {
            .breadcrumb {
                margin-top: -215px;
                margin-left: 58px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 1024px) {
            .breadcrumb {
                margin-top: -355px;
                margin-left: 300px;
            }
        }

        @media only screen and (max-width: 900px) {
            .breadcrumb {
                margin-top: -355px;
                margin-left: 200px;
            }
        }

        @media only screen and (max-width: 853px) {
            .breadcrumb {
                margin-top: -355px;
                margin-left: 150px;
            }
        }

        @media only screen and (max-width: 800px) {
            .breadcrumb {
                margin-top: -355px;
                margin-left: 100px;
            }

        }
        @media only screen and (max-width: 768px) {
            .breadcrumb {
                margin-top: -300px;
                margin-left: 74px;
            }

            .mobile {
                margin-left: 0px;
            }
        }

        @media only screen and (max-width: 603px) {
            .breadcrumb {
                margin-top: -220px;
                margin-left: 4px;
            }

            .account {
                padding-top: 0px;
            }

            .account-img {
                margin-left: 19px;
            }

            .page-breadcrumb {
                padding: 70px 35px 0;
            }

            .breadcrumb {
                margin-top: -270px;
                margin-left: 154px;
            }

            .example {
                margin-left: 7px;
            }

            .name {
                margin-top: 20px;
            }

        }

        @media only screen and (max-width: 540px) {

            .account {
                padding-top: 0px;
            }

            .account-img {
                margin-left: 19px;
            }

            .page-breadcrumb {
                padding: 70px 35px 0;
            }

            .breadcrumb {
                margin-top: -270px;
                margin-left: 114px;
            }

            .example {
                margin-left: 7px;
            }

        }

        @media only screen and (max-width: 480px) {
            .breadcrumb {
                margin-top: -270px;
                margin-left: 14px;
            }

            .account {
                padding-top: 0px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .9rem;
            }

            .example {
                margin-left: 3px;
            }

            .page-breadcrumb {
                padding: 70px 35px 0;
            }

            .account-img {
                margin-left: 9px;
            }
        }

        @media only screen and (max-width: 428px) {
            .breadcrumb {
                margin-top: -270px;
                margin-left: 44px;
            }

            .account {
                padding-top: 0px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .7rem;
            }

            .example {
                margin-left: 3px;
            }

            .page-breadcrumb {
                padding: 70px 35px 0;
            }

            .account-img {
                margin-left: 9px;
            }
        }

        @media only screen and (max-width: 414px) {
            .breadcrumb {
                margin-top: -270px;
                margin-left: 6px;
            }

            .account {
                padding-top: 0px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .8rem;
            }

            .example {
                margin-left: 3px;
            }

            .page-breadcrumb {
                padding: 70px 35px 0;
            }

            .account-img {
                margin-left: 9px;
            }
        }

        @media only screen and (max-width: 390px) {
            .breadcrumb {
                margin-top: -275px;
                margin-left: 38px;
            }

            .account {
                padding-top: 0px;
            }

            .ima {
                margin-left: -40px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .8rem;
            }

            .example {
                margin-left: 3px;
            }

            .mobile {
                margin-left: 30px;
            }

            .sidebarAccount h2 {
                margin-left: -25px;
            }

            .sidebarAccount p {
                margin-left: -30px;
            }
        }

        @media only screen and (max-width: 360px) {
            .breadcrumb {
                margin-top: -275px;
                margin-left: 34px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .8rem;
            }

        }

        @media only screen and (max-width: 320px) {
            .breadcrumb {
                margin-top: -270px;
                margin-left: 15px;
            }

            .mobile {
                margin-left: 0px;
            }

            .account-img {
                margin-left: 13px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .9rem;
                width: 290px;
            }
        }

        @media only screen and (max-width: 280px) {
            .breadcrumb {
                margin-top: -370px;
                margin-left: 4px;
            }

            .mobile {
                margin-left: 0px;
            }

            .account {
                padding-left: 0px;
            }

            .account-img {
                margin-left: 89px;
            }

            .page-breadcrumb .breadcrumb {
                font-size: .8rem;
                width: 260px;
            }

            .name {
                margin-top: 20px;
                margin-left: 25px;
            }
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 1.5rem;
            background-color: #fff !important;
            color: #555;
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
                  <rect y="6" width="19" height="3" fill="#A0BD1C"/>
                  <rect y="12" width="19" height="3" fill="#A0BD1C"/>
                  <rect width="19" height="3" fill="#A0BD1C"/>
                  </svg>
                  </span>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="align-self-center">
                        <div class="row mobile acc">
                            <div class="ima">
                                <img src="./pic/<?= $USER_PROFILE_PIC != "" || $USER_PROFILE_PIC != NULL ? $USER_PROFILE_PIC :  "index.png" ?>" class="account-img">
                            </div>
                            <div class="name">
                                <h3 class="page-title text-truncate mb-1 account">My Account</h3>
                                <p style="padding-top: 1px;font-family: Ubuntu; font-size: 16px; font-style: normal; font-weight: 400; padding-left: 30px; color: #0F1377; ">
                                    <?= $USER['firstname'] . " " . $USER['lastname'] ?>
                                </p>
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
            <div class="row">
                <div class="col-md-7 col-xl-12 col-sm-12">
                    <p class="example">
                        <a href="document.php"><svg width="20" height="28" viewBox="0 0 20 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.0938 7.71875L12.5313 1.15625C12.3438 0.96875 12.1562 0.875 11.875 0.875H2.5C1.46875 0.875 0.625 1.71875 0.625 2.75V25.25C0.625 26.2812 1.46875 27.125 2.5 27.125H17.5C18.5312 27.125 19.375 26.2812 19.375 25.25V8.375C19.375 8.09375 19.2812 7.90625 19.0938 7.71875ZM11.875 3.125L17.125 8.375H11.875V3.125ZM17.5 25.25H2.5V2.75H10V8.375C10 9.40625 10.8438 10.25 11.875 10.25H17.5V25.25Z" fill="#0A0E69" />
                                <path d="M4.375 19.625H15.625V21.5H4.375V19.625Z" fill="#0A0E69" />
                                <path d="M4.375 14H15.625V15.875H4.375V14Z" fill="#0A0E69" />
                            </svg>
                            <span>My Document</span></a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-xl-12 col-sm-12">
                    <p class="example">
                        <a href="bank.php"><svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M25.25 2.375V4.25H2.75V2.375H25.25ZM2.75 6.125H25.25V15.5H2.75V6.125ZM25.25 0.5H2.75C2.25272 0.5 1.77581 0.697544 1.42417 1.04918C1.07254 1.40081 0.875 1.87772 0.875 2.375V15.5C0.875 15.9973 1.07254 16.4742 1.42417 16.8258C1.77581 17.1775 2.25272 17.375 2.75 17.375H25.25C25.7473 17.375 26.2242 17.1775 26.5758 16.8258C26.9275 16.4742 27.125 15.9973 27.125 15.5V2.375C27.125 1.87772 26.9275 1.40081 26.5758 1.04918C26.2242 0.697544 25.7473 0.5 25.25 0.5ZM19.625 11.75H23.375V13.625H19.625V11.75Z" fill="#0A0E69" />
                            </svg>
                            <span>My Card and Bank Setting</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-xl-12 col-sm-12">
                    <p class="example">
                        <a href="./../contact.php"><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.1925 6.80028L7.9638 1.91903C7.4763 1.35653 6.58255 1.35903 6.0163 1.92653L2.5388 5.41028C1.5038 6.44653 1.20755 7.98528 1.8063 9.21903C5.38332 16.6252 11.3564 22.6066 18.7575 26.194C19.99 26.7928 21.5275 26.4965 22.5625 25.4603L26.0725 21.944C26.6413 21.3753 26.6425 20.4765 26.075 19.989L21.175 15.7828C20.6625 15.3428 19.8663 15.4003 19.3525 15.9153L17.6475 17.6228C17.5603 17.7143 17.4454 17.7746 17.3205 17.7944C17.1956 17.8143 17.0677 17.7926 16.9563 17.7328C14.1694 16.1279 11.8575 13.8131 10.2563 11.024C10.1963 10.9125 10.1746 10.7843 10.1945 10.6592C10.2144 10.5341 10.2747 10.419 10.3663 10.3315L12.0663 8.63028C12.5813 8.11278 12.6375 7.31278 12.1925 6.79903V6.80028Z" stroke="#0A0E69" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Contact Us</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-xl-12 col-sm-12">
                    <p class="example">
                        <a href="account.php"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30 14.985C30 6.7125 23.28 0 15 0C6.72 0 0 6.7125 0 14.985C0 19.5413 2.07 23.6475 5.31 26.4037C5.34 26.4338 5.37 26.4338 5.37 26.4638C5.64 26.6737 5.91 26.8837 6.21 27.0938C6.36 27.1838 6.48 27.3019 6.63 27.4219C9.10888 29.1026 12.0351 30.0007 15.03 30C18.0249 30.0007 20.9511 29.1026 23.43 27.4219C23.58 27.3319 23.7 27.2138 23.85 27.1219C24.12 26.9137 24.42 26.7038 24.69 26.4937C24.72 26.4638 24.75 26.4637 24.75 26.4338C27.93 23.6456 30 19.5413 30 14.985ZM15 28.1119C12.18 28.1119 9.6 27.2119 7.47 25.7137C7.5 25.4737 7.56 25.2356 7.62 24.9956C7.79876 24.3452 8.06094 23.7206 8.4 23.1375C8.73 22.5675 9.12 22.0575 9.6 21.6075C10.05 21.1575 10.59 20.7394 11.13 20.4094C11.7 20.0794 12.3 19.8394 12.96 19.6594C13.6251 19.4801 14.3111 19.3899 15 19.3913C17.045 19.3768 19.0148 20.1612 20.49 21.5775C21.18 22.2675 21.72 23.0775 22.11 24.0056C22.32 24.5456 22.47 25.1156 22.56 25.7137C20.346 27.2703 17.7064 28.1076 15 28.1119ZM10.41 14.2369C10.1457 13.6317 10.0127 12.9773 10.02 12.3169C10.02 11.6587 10.14 10.9987 10.41 10.3988C10.68 9.79875 11.04 9.26062 11.49 8.81063C11.94 8.36062 12.48 8.0025 13.08 7.7325C13.68 7.4625 14.34 7.3425 15 7.3425C15.69 7.3425 16.32 7.4625 16.92 7.7325C17.52 8.0025 18.06 8.3625 18.51 8.81063C18.96 9.26062 19.32 9.80062 19.59 10.3988C19.86 10.9987 19.98 11.6587 19.98 12.3169C19.98 13.0069 19.86 13.6369 19.59 14.235C19.3294 14.8261 18.9635 15.3649 18.51 15.825C18.0497 16.2778 17.511 16.6431 16.92 16.9031C15.6803 17.4126 14.2897 17.4126 13.05 16.9031C12.459 16.6431 11.9203 16.2778 11.46 15.825C11.0059 15.3716 10.6487 14.8307 10.41 14.235V14.2369ZM24.33 24.1856C24.33 24.1256 24.3 24.0956 24.3 24.0356C24.0049 23.097 23.5701 22.2083 23.01 21.3994C22.4494 20.5845 21.7605 19.8658 20.97 19.2712C20.3663 18.8171 19.7119 18.4345 19.02 18.1313C19.3348 17.9236 19.6264 17.6828 19.89 17.4131C20.3373 16.9716 20.7301 16.4781 21.06 15.9431C21.7244 14.8515 22.0676 13.5947 22.05 12.3169C22.0593 11.371 21.8755 10.4331 21.51 9.56063C21.1491 8.71995 20.6296 7.95667 19.98 7.3125C19.3313 6.67506 18.5679 6.16611 17.73 5.8125C16.8561 5.44761 15.917 5.26452 14.97 5.27437C14.0229 5.26511 13.0838 5.44885 12.21 5.81437C11.3649 6.16723 10.5996 6.68697 9.96 7.3425C9.32258 7.99048 8.81361 8.75329 8.46 9.59062C8.09447 10.4631 7.91072 11.401 7.92 12.3469C7.92 13.0069 8.01 13.6369 8.19 14.235C8.37 14.865 8.61 15.435 8.94 15.9731C9.24 16.5131 9.66 16.9931 10.11 17.4431C10.38 17.7131 10.68 17.9513 11.01 18.1612C10.3159 18.4726 9.66135 18.8654 9.06 19.3313C8.28 19.9313 7.59 20.6494 7.02 21.4294C6.45424 22.2349 6.0189 23.1246 5.73 24.0656C5.7 24.1256 5.7 24.1856 5.7 24.2156C3.33 21.8175 1.86 18.5812 1.86 14.985C1.86 7.7625 7.77 1.85812 15 1.85812C22.23 1.85812 28.14 7.7625 28.14 14.985C28.1361 18.4349 26.7662 21.7429 24.33 24.1856Z" fill="#0A0E69" />
                            </svg>
                            <span>My Account Settings</span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="row">
                <form action="./handler/logout_handler.php" method="post" class="col-md-7 col-xl-12 col-sm-12">
                    <p class="example">
                        <button name="logout" style="background-color: transparent; border: none; outline: none; display: block;">
                            <svg width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.625 27.125H13.875C14.3721 27.1245 14.8488 26.9268 15.2003 26.5753C15.5518 26.2238 15.7495 25.7471 15.75 25.25V22.4375H13.875V25.25H2.625V2.75H13.875V5.5625H15.75V2.75C15.7495 2.25287 15.5518 1.77625 15.2003 1.42472C14.8488 1.0732 14.3721 0.875496 13.875 0.875H2.625C2.12787 0.875496 1.65125 1.0732 1.29972 1.42472C0.9482 1.77625 0.750496 2.25287 0.75 2.75V25.25C0.750496 25.7471 0.9482 26.2238 1.29972 26.5753C1.65125 26.9268 2.12787 27.1245 2.625 27.125Z" fill="#ED2727" />
                                <path d="M16.2994 18.2994L19.6613 14.9375H6.375V13.0625H19.6613L16.2994 9.70062L17.625 8.375L23.25 14L17.625 19.625L16.2994 18.2994Z" fill="#ED2727" />
                            </svg>
                            <span style="color: #ED2727;">Logout</span>
                        </button>
                    </p>
                </form>
            </div>



            <!-- <footer class="footer text-center text-muted">
                All Rights Reserved by t</a>.
            </footer> -->
            <div class="chat-popup" id="myForm">
                <form action="/action_page.php" class="form-container">
                    <div class="wrapper">
                        <div class="mainchat">
                            <button type="button" class="btn cancel" style="margin-left: 280px;" onclick="closeForm()">X</button>
                            <div class="px-2 scroll">

                                <?php if (count($USER_MESSAGES)) : ?>
                                    <?php foreach ($USER_MESSAGES as $message) : ?>
                                        <?php if ($message['sender_id'] == $USER_ID) : ?>
                                            <!-- User -->
                                            <div class="d-flex align-items-center text-right justify-content-end ">
                                                <div class="pr-2"> <span class="name">
                                                        <?= $USER['firstname'] . ' ' . $USER['lastname']; ?>
                                                    </span>
                                                    <p class="msg">
                                                        <?= $message['message']; ?>
                                                    </p>
                                                </div>
                                                <?php if ($USER_PROFILE_PIC) : ?>
                                                    <div><img src="./pic/<?= $USER_PROFILE_PIC; ?>" width="50" height="50" style="border-radius: 50% ;" class="img9" /></div>
                                                <?php else : ?>
                                                    <div class="avatar">
                                                        <?= getSubName($USER['firstname'] . ' ' . $USER['lastname']); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php else : ?>

                                            <!-- Other Person -->
                                            <div class="d-flex align-items-center">
                                                <div class="text-left pr-1">
                                                    <img src="./pic/index.png" width="30" class="img9" />
                                                </div>
                                                <div class="pr-2 pl-1"> <span class="name">
                                                        <?= getSubAdmin($connect, $message['sender_id'])['name']; ?>
                                                    </span>
                                                    <p class="msg">
                                                        <?= $message['message']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                <?php endif; ?>

                            </div>
                            <form action="./handler/message_handler.php" method="post" class="navbars bg-white navbar-expand-sm d-flex justify-content-between">
                                <input type="text number" name="message" class="form-controls" placeholder="Type a message...">
                                <input type="hidden" name="sender" value="<?= $USER_ID ?>">
                                <input type="hidden" name="reciever" value="<?= "MAIN_ADMIN"; ?>">
                                <div class=" d-flex justify-content-end align-content-center text-center ml-2">
                                    <button name="send" type="submit" class="btn">
                                        <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M32.4419 20.4722C32.5822 19.2858 32.0534 18.1264 31.0686 17.4434L8.12261 1.50404C7.09665 0.772938 5.80289 0.713532 4.70133 1.30734C3.57966 1.91099 2.86538 3.55356 3.029 4.81133L4.30132 14.5749C4.43205 15.5761 5.23388 16.3557 6.23997 16.4571L19.7964 17.8394C20.4918 17.8985 20.9955 18.5204 20.9086 19.213C20.8348 19.8949 20.222 20.3912 19.5266 20.3321L5.95836 18.9379C4.95253 18.8342 4.00153 19.4326 3.65928 20.3856L0.300426 29.7007C-0.10413 30.8007 0.103129 31.9631 0.816651 32.8442C0.900595 32.9479 0.995031 33.0645 1.09201 33.1576C2.04085 34.0627 3.38245 34.3065 4.60167 33.8126L30.4291 23.1319C31.5361 22.6861 32.3016 21.6586 32.4419 20.4722Z" fill="#1161D9" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </form>
            </div>
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
        function openNav() {
            document.getElementById("sidebar").style.width = "260px";
            document.getElementById("main").style.marginLeft = "260px";
        }

        function closeNav() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";

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