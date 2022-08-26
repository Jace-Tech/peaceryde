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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="./dist/css/responsive.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
            <form class="page-breadcrumb" action="./handler/account_handler.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="align-self-center">
                        <div class="row">
                            <div class="">
                                <h3 class="page-title text-truncate mb-1 profile">My Profile</h3>

                            </div>
                        </div>
                    </div>
                    

                    <div class="align-self-center">
                        <div class="customize-input customise">
                            <div class="image-upload-two">
                                <div class="center">
                                    <div class="form-input">
                                        <label for="file-ip-2">
                                            <img id="file-ip-2-preview" src="./dist/image/account.png" width="166" height="166">
                                            <button type="button" class="imgRemove" onclick="myImgRemove(2)"></button>
                                        </label>
                                        <input data-input type="file" name="image" id="file-ip-2" accept="image/*" onchange="showPreview(event, 2);">
                                    </div>

                                </div>

                            </div>
                            <p class="small click" style="cursor: pointer;" data-click>Click here to upload picture</p>
                        </div>
                    </div>
                </div>

                <div class="form-row accountrow">
                    <div class="form-group">
                        <p class="accountfirst">Title</p>
                        <select class="form-control accountinput" name="title" value="<?= $USER['title'] ?? "" ?>">
                            <option value="" >Select title</option>
                            <?php foreach($titles as $title): ?>
                                <option value="<?= $title ?>" <?= strtolower($title) == strtolower($USER['title']) ? "selected" : ""; ?> ><?= $title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="accountfirst">First Name</p>
                        <input type="text" name="firstname" value="<?= $USER['firstname'] ?? "" ?>" class="form-control accountinput" placeholder="Firstname">
                    </div>
                    <div class="form-group">
                        <p class="accountfirst">Middle Name</p>
                        <input type="text" name="middlename" value="<?= $USER['middle_name'] ?? "" ?>" class="form-control accountinput" placeholder="Middle name">
                    </div>
                    <div class="form-group">
                        <p class="accountfirst">Last Name</p>
                        <input type="text" name="lastname" class="form-control accountinput" value="<?= $USER['lastname'] ?? "" ?>" placeholder="Lastname">
                    </div>
                    <div class="form-group">
                        <p class="accountfirst">Mobile Number</p>
                        <input type="text" name="phone" class="form-control accountinput" value="<?= $USER['phone'] ?? "" ?>" placeholder="123-45-67-89">
                    </div>
                    <div class="form-group">
                        <p class="accountfirst">Email Address</p>
                        <input type="text" name="email" class="form-control accountinput" value="<?= $USER['email'] ?? "" ?>" placeholder="example@example.com">
                    </div>
                    <div class="form-group">
                        <p class="accountfirst">Password</p>
                        <input type="password" name="password" class="form-control accountinput" placeholder="********************">
                    </div>
                    <div style="margin-top:49px">
                        <button name="update" type="submit" class="btn btn-button accountbutton">Update Profile</button>
                    </div>
            </form>

            <div>

            </div>



            <!-- <footer class="footer text-center text-muted">
                All Rights Reserved by t</a>.
            </footer> -->

        </div>

    </div>
    <script>
        document.querySelector("[data-click]").addEventListener("click", (e) => {
            e.preventDefault();
            document.querySelector("[data-input]").click();
        })
    </script>
    <script>
  function openNav() {
    		
            if  (screen.width >= 800) {
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
                document.getElementById("main").style.marginLeft= "0";;
            } else {
                document.getElementById("sidebar").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";;
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