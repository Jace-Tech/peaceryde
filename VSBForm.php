<?php include("./inc/check_session.php") ?>
<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
    <meta charset="utf-8" />
    <title>PeaceRyde Africa LLC - VSB Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon.png">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
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

    <!-- google jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>


<body style="overflow-x: hidden;" class="body">
    <main class="new new-main layout">
        <!-- ======= section1 ======= -->
        
        <?php include("./inc/header.php"); ?>

            <section class=" new-section2__group layout2 vsbheight" style="background-color: #f8f6f6;">
                <div class="new-section1__cover-block layout sbpage">                                       
                    <div class="card cardform" style="border:1px solid #ffffff;">
                        <div style="margin-top: 65px;">
                            <h2 class="vsbh2">Visa Service Booking Form</h2>
                            <p class="vsbp">Plesae fill this form to indicate your interest in any of our services and we will contact you within 24hrs.</p>
                        </div>
                        <div>
                            <form>
                                <input type="text" class="form-control vsbform" placeholder="First Name" >

                                        <input type="text" class="form-control vsbform vsbmt" placeholder="Last Name" >

                                        <input type="text" class="form-control vsbform vsbmt" placeholder="Mobile Number" >

                                        <input type="text" class="form-control vsbform vsbmt" placeholder="Email Address" >

                                        <p class="vsbformp">Which of our services are you applying For?</p>
                                        <select class="form-select vsbformselect vsbmt" 
                                        aria-label="Default select example">
                                        <option selected>Select One</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>

                                        <p class="vsbformp">Message</p>
                                        <textarea class="vsbformtextarea"></textarea>
                                        <button href="#" style="margin-top:86px; margin-left: -510px;" class="btn buttons3">Apply</button>
                            </form>
                        </div>
                    </div>   
                </div>
            </section>

           
            <!-- ======= End section8 ======= -->

    </main>
    <script type="text/javascript">
        AOS.init();
    </script>
    <?php include("./inc/langChange.php") ?>
</body>

</html>