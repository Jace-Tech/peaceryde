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
                    <h3 class="page-title" style="font-family: Ubuntu;font-size: 30px;font-style: normal;font-family: Ubuntu;font-weight: 500;color:#0A0E69;padding-left:200px;">Nigeria Business Incorporation </h3>  
                    <p style="padding-top: 30px;padding-left:304px;font-family: Ubuntu;font-size: 24px;font-style: normal;font-weight: 500; color:#0A0E69;">Fill the Form Below</p>   
                    
                </div>
                <form style="padding-left: 118px;">
                    <div class="form-body">
                        <div class="row" style="margin-top: 96px;">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px; height:43px;border:1px solid #555555;color: #5A5A5A;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px;height:43px;color: #5A5A5A;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Owner">
                                </div>
                            </div>                            
                        </div>
                        <p style="padding-top:11px; color: #1161D9;font-family: Ubuntu;color: #5A5A5A;font-size: 13px;font-style: normal;font-weight: 500;">Company Mailing address</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" style="width:586px; margin-top: 11px;color: #5A5A5A; height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Street address">
                                </div>
                            </div>                                                        
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px;margin-top: 11px;color: #5A5A5A; height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="City">
                                </div>
                            </div>
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px;margin-top: 11px;color: #5A5A5A;height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="State">
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px;margin-top: 11px;color: #5A5A5A; height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Zip Code">
                                </div>
                            </div>
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-select" style="color: #5A5A5A;border: 1px solid #555555; width:295px; height: 44px; margin-top:11px"
                    aria-label="Default select example">
                    <option selected>Country</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                                    
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px;margin-top: 11px; height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <select class="custom-select" id="inputGroupSelect01" style="width: 90px;margin-top: 11px;height:43px; background-color: #ADC92E; color: #F9FFFF; font-size:11px;">
                                                <option selected>Country code</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                            <input type="text" style="width:204px;margin-top: 11px;height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Mobile Number">
                                        </div>
                                       
                                    </div>
                                    <!-- <input type="text" style="width:295px;margin-top: 27px;height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Owner"> -->
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px;margin-top: 11px; height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Norminal Capital">
                                </div>
                            </div>
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-4" style="margin-top: -18px;">
                                <label>Industry</label>
                                <div class="form-group">
                                    <select class="form-select" style="color: #5A5A5A;border: 1px solid #555555; width:295px; height: 44px;"
                                    aria-label="Default select example">
                                    <option selected>select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>  
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px;margin-top: 11px; height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Website">
                                </div>
                            </div>
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" style="width:295px;margin-top: 11px;height:43px;border:1px solid #555555;font-size: 14px; font-family: ubuntu; font-weight: 400;" class="form-control" placeholder="Employee No">
                                </div>
                            </div>                            
                        </div><p style="font-family: Ubuntu;font-size: 14px;font-style: normal;font-weight: 400; padding-top:27px;
                        ">Message</p>
                        <textarea style="width: 595px;margin-top:21; height: 187px;margin-bottom: 65px;"></textarea>
                    </div>
                    <div style="margin-top: 99px; margin-bottom: 112px;">
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