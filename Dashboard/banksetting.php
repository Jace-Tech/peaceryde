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

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }
        .overlay {
  position: absolute;
  top: -300px;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);  
  visibility: hidden;
  opacity: 0;
  transition: all 0.3s ease;
}

.overlay:target {
  visibility: visible;
  opacity: 1;
  top:0px;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}

.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
  
}

.popup .close:hover {
  color: white;
  transform: rotate(90deg);
}

.popup .content {
  max-height: 30%;
  overflow: auto;
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
        <header class="topbar" data-navbarbg="skin6"></header>

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
                                <h3 class="page-title text-truncate mb-1 bankh3">My Card</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="small manage">Manage your debit/ credit card securely</p>
            </div>
            <div class="bankdiv">
                <p class="bankdivp">
                    <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.496 7.93252V0.595177C11.496 0.437326 11.417 0.285941 11.2763 0.174323C11.1357 0.0627061 10.9449 0 10.746 0C10.5471 0 10.3563 0.0627061 10.2157 0.174323C10.075 0.285941 9.99599 0.437326 9.99599 0.595177V7.93252H0.749999C0.551087 7.93252 0.360322 7.99522 0.21967 8.10684C0.0790177 8.21846 0 8.36984 0 8.52769C0 8.68554 0.0790177 8.83693 0.21967 8.94855C0.360322 9.06016 0.551087 9.12287 0.749999 9.12287H9.99599V16.4658C9.99599 16.6236 10.075 16.775 10.2157 16.8866C10.3563 16.9982 10.5471 17.0609 10.746 17.0609C10.9449 17.0609 11.1357 16.9982 11.2763 16.8866C11.417 16.775 11.496 16.6236 11.496 16.4658V9.12287L20.746 9.12525C20.9449 9.12525 21.1357 9.06255 21.2763 8.95093C21.417 8.83931 21.496 8.68793 21.496 8.53008C21.496 8.37222 21.417 8.22084 21.2763 8.10922C21.1357 7.9976 20.9449 7.9349 20.746 7.9349L11.496 7.93252Z" fill="white" />
                    </svg>
                    <span class="debittext">Add New Debit/ Credit Card</span>
                </p>
                <p class="add"><a href="#popup1">Tap to Add</a></p>
            </div>

            <!-- <div style="margin-top:62px">
                <button type="submit" class="btn btn-button debitcard">Add Debit/ Credit Card</button>
            </div> -->

            <div style="margin-top:62px">
                <button type="submit" class="btn btn-button cancelbutton">Cancel</button>
            </div>

            <div></div>
            <!-- <footer class="footer text-center text-muted">
                All Rights Reserved by t</a>.
            </footer> -->
        </div>
        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Notice</h2>
                <a class="close" href="#">×</a>
                <div class="content">
                This feature is not available at the moment. We are working on it
                </div>
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
        var number = 1;
        do {
            function showPreview(event, number) {
                if (event.target.files.length > 0) {
                    let src = URL.createObjectURL(event.target.files[0]);
                    let preview = document.getElementById("file-ip-" + number + "-preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }

            function myImgRemove(number) {
                document.getElementById("file-ip-" + number + "-preview").src = "./dist/image/account.png";
                document.getElementById("file-ip-" + number).value = null;
            }
            number++;
        }
        while (number < 5);
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