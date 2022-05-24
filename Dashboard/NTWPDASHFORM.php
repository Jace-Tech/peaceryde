<?php include("./inc/check_session.php"); ?>



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
    <link rel="icon" type="image/png" sizes="16x16" href="./dist/image/logo.png">
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
<style>


.left-sidebar a:hover {
  color: #f1f1f1;
}

.left-sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.form-control::placeholder { 
  color: #555555;
}
.form-select
{
  color: #555555;
}
#main {
  transition: margin-left .5s;
  padding: 16px;
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

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        

        <!-- Sidebar -->
        <?php include("./inc/sidebar.php"); ?>
        <!-- Sidebar -->


        <div class="page-wrapper" id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>           
                <div class="align-self-center">                       
                    <h3 class="page-title" style="font-family: Ubuntu;font-size: 30px;font-style: normal;font-family: Ubuntu;font-weight: 500;color:#0A0E69;padding-left:200px;">Nigeria Temporary Work Permit  </h3>  
                    <p style="padding-top: 30px;padding-left:304px;font-family: Ubuntu;font-size: 24px;font-style: normal;font-weight: 500; color:#0A0E69;">Fill the Form Below</p>   
                    <p style="font-family: Ubuntu;font-size: 18px;font-style: normal;font-weight: 400;padding-top:12px;padding-left:323px;color:#0A0E69;">Your personal details</p>                                          
                </div>
                <form style="padding-left: 121px;">
                    <div class="form-body">
                        <select class="form-select" style="color: #5A5A5A;border: 1px solid #555555; width:586px; height: 44px; margin-top:47px"
                    aria-label="Default select example">
                    <option selected>Title</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <p style="padding-top:19px; color: #C8730F;font-family: Ubuntu;
                  font-size: 13px;
                  font-style: normal;
                  font-weight: 400;
                 
                  ">Your name must be entered in English as it appears on your passport.</p>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" style="width:227px; height:43px;border:1px solid #555555;font-size: 13px;" class="form-control" placeholder="First Name (as on passport)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" style="width:227px;height:43px;border:1px solid #555555;font-size: 13px;" class="form-control" placeholder="Middle Name (as on passport)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" style="width:227px;height:43px;border:1px solid #555555;font-size: 13px;" class="form-control" placeholder="Last Name (as on passport)">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" style="width:227px; height:43px;border:1px solid #555555;font-size: 13px;" class="form-control" placeholder="Date of birth">
                                </div>
                            </div>
                            <div class="col-md-1">
                               
                            </div>
                            <div class="col-md-6">
                                <label>Gender</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation2"
                                            name="radio-stacked">
                                        <label class="custom-control-label" for="customControlValidation2">Male</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="customControlValidation3"
                                            name="radio-stacked">
                                        <label class="custom-control-label" for="customControlValidation3">Female</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:307px; height:43px;border:1px solid #555555;font-size: 13px;" class="form-control" placeholder="Email address">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:307px;height:43px;border:1px solid #555555;font-size: 13px;" class="form-control" placeholder="Passport No">
                                </div>
                            </div>                            
                        </div>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col-md-4">
                                <select class="form-select" style="color: #5A5A5A;border: 1px solid #555555; width:303px; height: 44px;"
                                aria-label="Default select example">
                                <option selected>Country code</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:307px;height:43px;border:1px solid #555555;font-size: 13px;" class="form-control" placeholder="Mobile number">
                                </div>
                            </div>                            
                        </div>
                        <p style="height: 16px;padding-top: 27px;font-family: Ubuntu;font-size: 14px;font-style: normal;font-weight: 400;">Please select below your Nationality (as on passport)</p>
                        <select class="form-select" style="border: 1px solid #555555; width:502px; height: 44px; margin-top:27px;color: #5A5A5A;"
                    aria-label="Default select example">
                    <option selected>Select One</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                    </div>
                    <div style="margin-top: 62px; margin-bottom: 204px;">
                        <button type="submit" class="btn" style="background-color: #A0BD1C; width: 157px; height: 44px;font-family: Ubuntu;color:#ffffff;font-size: 14px;font-style: normal;font-weight: 400;">Proceed to Payment</button>
                    </div>
                 
                  
                       
                  
                
                     
                </form>
        </div>
 
    </div>
    <script>
        function openNav() {
          document.getElementById("sidebar").style.width = "260px";
          document.getElementById("main").style.marginLeft = "260px";
        }
        
        function closeNav() {
          document.getElementById("sidebar").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
          
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