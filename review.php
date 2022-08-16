<?php include("./inc/check_session.php") ?>
<?php
$REVIEW = new Review($connect);
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&family=Ubuntu:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/New.css" />
    <link rel="stylesheet" type="text/css" href="css/Laptops.css" />
    <link rel="stylesheet" type="text/css" href="css/smallscreen800.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>
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

    .responsive-vid {
        margin-top: 30px;
        width: 70%;
        margin-left: 10%;
        height: 300px;
        object-fit: cover;
    }

    @media screen and (max-width: 768px) {
        .responsive-vid {
            width: 80%;
        } 
    }

    @media screen and (max-width: 582px) {
        .responsive-vid {
            width: 85%;
        } 
    }

    @media screen and (max-width: 420px) {
        .responsive-vid {
            width: 90%;
        } 
    }
    </style>
</head>


<body class="body">
    <main class="new new-main layout">
        <!-- ======= section1 ======= -->
        <?php include("./inc/header.php"); ?>
            <section class=" new-section2__group layout2 reviewheight" style="background-color: #f8f6f6;">
                <div class="new-section1__cover-block layout signinpage">
                    <h2 class="reviewh2">Review </h2>

                    <div class="">
                        <?php if (count($REVIEW->getAllReviews())) : ?>
                            <?php foreach ($REVIEW->getAllReviews() as $review) : ?>
                                <?php $REVIEW_USER = getUser($connect, $review['user_id']); ?>
                                <div class="card reviewcard">
                                    <div class="reviewml">
                                        <div class="form-group4 reviewmt">
                                            <div class="row">
                                                <?php if (isset(getProfilePic($connect, $review["user_id"])["file"])) : ?>
                                                    <div class="col-md-2">
                                                        <img src="./Dashboard/pic/<?= getProfilePic($connect, $review["user_id"])["file"]; ?>"  class="rounded-circle" style="width: 75px; height: 75px; object-fit: cover; margin-bottom: 13px;">
                                                    </div>
                                                <?php else : ?>
                                                    <div class="col-md-2">
                                                        <h2 class="avater">
                                                            <?= getSubName($users->get_user($review["user_id"])['firstname'] . " " . $users->get_user($review["user_id"])["lastname"]); ?>
                                                        </h2>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="col-md-10">
                                                    <p class="reviewname"><?= $REVIEW_USER['firstname'] . " " . $REVIEW_USER['lastname'];  ?> </p>
                                                    <div class="row">
                                                        <!-- <div class="col-md-2">
                                                            <p><span><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3434 0.377356C10.5588 0.13573 10.8508 0 11.1552 0C11.4596 0 11.7516 0.13573 11.9669 0.377356L13.6639 2.28283C13.8791 2.52463 14 2.85247 14 3.1943C14 3.53614 13.8791 3.86398 13.6639 4.10578L11.8311 6.16378L11.8232 6.17336L4.71765 13.7886C4.58784 13.928 4.43074 14.0312 4.25896 14.09L0.634641 15.3279C0.549398 15.3568 0.458758 15.3593 0.37238 15.3349C0.286002 15.3106 0.207124 15.2604 0.144152 15.1897C0.0811803 15.119 0.0364746 15.0304 0.0147997 14.9334C-0.0068752 14.8364 -0.00470707 14.7347 0.0210731 14.6389L1.11893 10.5863C1.17651 10.3742 1.28184 10.1823 1.42473 10.0293L8.51456 2.4302L10.3434 0.377356ZM8.85054 3.59809L2.10458 10.8287C2.08406 10.8506 2.06892 10.878 2.06061 10.9083L1.23115 13.9691L3.97219 13.0326C3.9968 13.0241 4.01928 13.0092 4.03781 12.9891L10.7792 5.76367L8.84989 3.59809H8.85054ZM11.4833 4.9922L12.9683 3.32546C12.9836 3.30835 12.9957 3.28802 13.004 3.26564C13.0123 3.24326 13.0165 3.21927 13.0165 3.19504C13.0165 3.17081 13.0123 3.14682 13.004 3.12444C12.9957 3.10206 12.9836 3.08173 12.9683 3.06462L11.2713 1.15915C11.2561 1.14199 11.238 1.12838 11.2181 1.11909C11.1981 1.10981 11.1768 1.10503 11.1552 1.10503C11.1336 1.10503 11.1122 1.10981 11.0923 1.11909C11.0724 1.12838 11.0543 1.14199 11.039 1.15915L9.55467 2.82588L11.4833 4.9922Z" fill="#0A0E69" />
                                                                    </svg>
                                                                </span> 1 review</p>
                                                        </div> -->
                                                        <div class="col-md-2">
                                                            <p>
                                                                <span><svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M7.42285 3.03418C6.95312 3.03418 6.49394 3.13548 6.10337 3.32528C5.71281 3.51507 5.4084 3.78484 5.22864 4.10045C5.04888 4.41607 5.00185 4.76337 5.09349 5.09843C5.18513 5.43348 5.41132 5.74126 5.74347 5.98282C6.07562 6.22438 6.49881 6.38889 6.95951 6.45554C7.42022 6.52218 7.89775 6.48798 8.33173 6.35724C8.7657 6.22651 9.13662 6.00512 9.39759 5.72107C9.65856 5.43703 9.79785 5.10307 9.79785 4.76145C9.79714 4.30351 9.54668 3.86448 9.10144 3.54066C8.6562 3.21685 8.05252 3.0347 7.42285 3.03418ZM7.42285 5.62509C7.18799 5.62509 6.9584 5.57444 6.76311 5.47954C6.56783 5.38464 6.41562 5.24976 6.32575 5.09195C6.23587 4.93414 6.21235 4.76049 6.25817 4.59297C6.30399 4.42544 6.41709 4.27155 6.58316 4.15077C6.74924 4.02999 6.96083 3.94773 7.19118 3.91441C7.42154 3.88109 7.6603 3.89819 7.87729 3.96356C8.09428 4.02892 8.27974 4.13962 8.41022 4.28164C8.54071 4.42367 8.61035 4.59064 8.61035 4.76145C8.60999 4.99042 8.48476 5.20994 8.26214 5.37184C8.03952 5.53375 7.73769 5.62482 7.42285 5.62509Z" fill="#080C58" />
                                                                        <path d="M11.9868 1.43983C10.8584 0.619387 9.35214 0.13201 7.7587 0.0717643C6.16527 0.0115185 4.59763 0.382675 3.35834 1.1136C2.11905 1.84452 1.29597 2.8834 1.04795 4.02973C0.79993 5.17605 1.14455 6.34856 2.01531 7.32096L6.50208 12.3304C6.60193 12.4419 6.73845 12.5335 6.89927 12.5969C7.06009 12.6603 7.24012 12.6935 7.42304 12.6935C7.60597 12.6935 7.786 12.6603 7.94682 12.5969C8.10763 12.5335 8.24415 12.4419 8.344 12.3304L12.8309 7.32096C13.6389 6.41892 13.9959 5.34231 13.8423 4.27157C13.6886 3.20084 13.0335 2.20107 11.9868 1.43983ZM11.8359 6.84955L7.42306 11.7763L3.01013 6.84955C1.65936 5.34145 1.94907 3.32324 3.69899 2.0505C4.18804 1.69482 4.76863 1.41268 5.4076 1.22019C6.04658 1.02769 6.73143 0.928617 7.42306 0.928617C8.11469 0.928617 8.79954 1.02769 9.43852 1.22019C10.0775 1.41268 10.6581 1.69482 11.1471 2.0505C12.8971 3.32324 13.1867 5.34145 11.8359 6.84955Z" fill="#080C58" />
                                                                    </svg>
                                                                </span> 
                                                                <?= $REVIEW_USER['country'] ?? ""; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="margin-bottom: 59px; margin-top: 17px;">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <p><?= date("M d, Y", strtotime($review['date'])); ?></p>
                                                    </div>
                                                </div>
                                                <!-- <p class="reviewservice">Business Visa On Arrival was approved in 2 month</p> -->
                                                <?php if($review['type'] == 'video'): ?>
                                                    <video src="./reviews/<?= $review['file'] ?>" loop="" controls="" class="responsive-vid"></video>
                                                <?php else: ?>
                                                    <p class="reviewtext">
                                                        <?= $review['review'] ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="p-5 text-center text-muted">No reviews</div>
                        <?php endif; ?>
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