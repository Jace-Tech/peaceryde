<?php include("./inc/check_session.php") ?>

<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon.png">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
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
    


    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>
    
</head>


<body style="overflow-x: hidden;">
    <main class="new new-main layout">
        <!-- ======= section1 ======= -->
        <?php include("./inc/header.php"); ?>

        <section class=" new-section2__group layout2 nbiformheight" style="background-color: #f8f6f6;">
            <div class="new-section1__cover-block layout">                                       
              <h2 class="welcome"> Welcome!</h2>
              <p class="formtext">The first step in applying for a <span style="font-size: 20px; font-weight: 500;">Nigeria Business Incorporation</span> is to fill the form below.<br>
              <span>It takes less than 5 minutes to do this. After you submit your application, you can<br></span>
              <span> move on to the next step to make payment</span>.</p>
                <div class="topdiv">
                    <div class="card cardform">
                      <div style="margin-top: 47px;">
                        <h2 class="formh1">Fill the form below</h2>
                        <p class="formp">Business Registration</p>
                    </div>
                        
                        <div>
                            <form>
                              <div class="form-row formml">
                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group">                                 
                                      <input type="text" class="form-control firstname2" placeholder="Company Name" >
                                  </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <input type="text" class="form-control firstname2" placeholder="Email" >
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              <div class="form-row formml">
                                <div class="row">
                                  <div class="col-md-5">
                                    <div class="form-group">                                 
                                      <input type="text" class="form-control firstname2" placeholder="Coporate Address" >
                                  </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <input type="text" class="form-control firstname2" placeholder="No of Shares" >
                                    </div>
                                  </div>
                                </div> 
                              </div>
                              
                             
                              <div class=" formml" style="margin-top: 27px;">
                                <label>Are you a returning customer ? (do you have an account with us on this website)</label>
                                      <br>
                              <div class="form-check form-check-inline" style="padding-left: 0px; padding-top: 3px;">
                                  <div class="custom-control custom-radio">
                                    <label class="custom-control-label" for="customControlValidation2">No</label>
                                      <input type="radio" class="custom-control-input" id="customControlValidation2"
                                          name="radio-stacked">
                                  </div>
                              </div>
                              <div class="form-check form-check-inline">
                                <div class="custom-control custom-radio">
                                  <label class="custom-control-label" for="customControlValidation3">Yes</label>
                                    <input type="radio" class="custom-control-input" value="1" onclick="onYes()" id="customControlValidation3"
                                        name="radio-stacked">
                                </div>
                            </div>
                          </div>
                              <div class="bibtn">
                                  <button type="submit" class="btn proceed">Proceed to payment</button>
                              </div>
                            </form>
                        </div>
                    </div> 
                </div>
                
            </div>
        </section>

            <comment content="======= End section7 =======" break="true"></comment><!-- ======= section8 ======= -->
            
            <!-- ======= End section8 ======= -->

    </main>
    <script type="text/javascript">
        AOS.init();
    </script>
</body>

</html>