<?php include("./inc/check_session.php") ?>

<?php if(!isset($_SESSION["LOGGED_USER"])) header("Location: ./signin.php"); ?>


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


    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        fieldset,
        label {
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 1.5em;
            margin: 10px;
        }

        /****** Style Star Rating Widget *****/

        .rating {
            border: none;

        }

        .rating>input {
            display: none;
        }

        .rating>label:before {
            margin: 13px 5px 13px 13px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating>.half:before {
            content: "\f089";
            position: absolute;
        }

        .rating>label {

            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/

        .rating>input:checked~label,
        /* show gold star when clicked */
        .rating:not(:checked)>label:hover,
        /* hover current star */
        .rating:not(:checked)>label:hover~label {
            color: #FFD700;
        }

        /* hover previous stars in list */

        .rating>input:checked+label:hover,
        /* hover current star when changing rating */
        .rating>input:checked~label:hover,
        .rating>label:hover~input:checked~label,
        /* lighten current selection */
        .rating>input:checked~label:hover~label {
            color: #FFED85;
        }
    </style>
</head>


<body>
    <main class="new new-main layout">
        <!-- ======= section1 ======= -->
        <?php include("./inc/header.php"); ?>

        <section class=" new-section2__group layout2 aboutpageheight" style="background-color: #f8f6f6;">
            <div class="container new-section1__cover-block layout reviewpage mt-75">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="./handlers/review_handler.php" method="post" class="card makereviewcard">
                            <p class="makereviewp">Rate Your Experience</p>
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars" style="margin-right: 110px;"></label>
                                <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            </fieldset>
                            <p class="reviewfieldsetp">Tell us about your expeience</p>

                            <textarea class="reviewtextarea" name="review" required  placeholder="This is where you write your review.explain what happend, keep your feedback honest, helpfyl, and constructive"></textarea>
                            <div class="mt-4 p-4 text-right">
                                <button name="add" type="submit" class="btn btn-block border-0" style="background-color: #a0bd1c;">Post review</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </div>
        </section>


        
        <!-- ======= End section8 ======= -->

    </main>
    <script type="text/javascript">
        AOS.init();
    </script>
</body>

</html>