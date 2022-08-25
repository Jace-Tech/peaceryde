<?php include("./inc/check_session.php"); ?>
<?php 
  $messages = new Message($connect); 
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

    <div class="page-wrapper" id="main" style="background-color: #e5e5e5;">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()"> <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 10px;
                margin-top: 50px;">
          <rect y="6" width="19" height="3" fill="#A0BD1C" />
          <rect y="12" width="19" height="3" fill="#A0BD1C" />
          <rect width="19" height="3" fill="#A0BD1C" />
        </svg>
      </span>
      <div class="">
        <div class="row">
          <div class="align-self-center">
            <div class="row">
              <div class="">
                <h3 class="page-title text-truncate mb-1 documentext">My Documents</h3>

              </div>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <form action="./handler/upload_handler.php" method="post" enctype="multipart/form-data">
        <div>
          <p class="uploadtext">Upload your necessary documents</p>
          <p class="pleaseupload">Please name your documents, upload all relevant documents(example; passport photograph, international passport data page, proof of empowerment, flight itinerary etc), by browsing the "drop file here" link and then click the upload file button.</p>
        </div>
        <div class="form-group">
          <input type="hidden" name="id" value="<?= $USER_ID ?>">
          <input name="name" type="text" required class="form-control upload-input" placeholder="Document Name">
        </div>
        <div class="drop-zone">
          <p class="drop-zonep"><svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
              <circle cx="50" cy="50" r="49.5" fill="#F1F5F6" stroke="#5A5A5A" />
              <path d="M50.1552 47.3009C50.0773 47.2072 49.9777 47.1314 49.864 47.0792C49.7503 47.0271 49.6255 47 49.499 47C49.3725 47 49.2477 47.0271 49.134 47.0792C49.0203 47.1314 48.9207 47.2072 48.8428 47.3009L37.1768 61.1907C37.0806 61.3062 37.0209 61.445 37.0046 61.5909C36.9882 61.7369 37.0159 61.8843 37.0843 62.0162C37.1528 62.1481 37.2593 62.2592 37.3917 62.3369C37.5241 62.4145 37.677 62.4555 37.833 62.4552H45.5305V86.2158C45.5305 86.6471 45.9055 87 46.3638 87H52.6134C53.0717 87 53.4467 86.6471 53.4467 86.2158V62.465H61.165C61.8629 62.465 62.2483 61.7102 61.8212 61.2005L50.1552 47.3009Z" fill="#56C754" />
              <path d="M65.371 43.469C63.0196 35.013 57.0283 29 50.0103 29C42.9922 29 37.0009 35.006 34.6496 43.462C30.2498 45.037 27 50.504 27 57C27 64.735 31.5949 71 37.2627 71H39.3214C39.5473 71 39.7321 70.748 39.7321 70.44V66.24C39.7321 65.932 39.5473 65.68 39.3214 65.68H37.2627C35.5326 65.68 33.9051 64.742 32.6935 63.041C31.4871 61.347 30.8453 59.065 30.9018 56.699C30.948 54.851 31.41 53.115 32.2469 51.652C33.1042 50.161 34.3056 49.076 35.6404 48.593L37.5862 47.9L38.2998 45.338C38.7413 43.742 39.3574 42.251 40.1326 40.9C40.8979 39.561 41.8045 38.3838 42.8228 37.407C44.9328 35.384 47.4176 34.313 50.0103 34.313C52.6029 34.313 55.0877 35.384 57.1978 37.407C58.2194 38.387 59.123 39.563 59.8879 40.9C60.6632 42.251 61.2792 43.749 61.7208 45.338L62.4292 47.893L64.3699 48.593C67.1525 49.615 69.0982 53.066 69.0982 57C69.0982 59.317 68.4359 61.501 67.2346 63.139C66.6455 63.947 65.9446 64.5876 65.1726 65.0238C64.4007 65.4599 63.5729 65.683 62.7373 65.68H60.6786C60.4527 65.68 60.2679 65.932 60.2679 66.24V70.44C60.2679 70.748 60.4527 71 60.6786 71H62.7373C68.4051 71 73 64.735 73 57C73 50.511 69.7605 45.051 65.371 43.469Z" fill="#56C754" />
            </svg></p>

          <p class="dropfilep"><span class="drop-zone__prompt">Drop file here</span></p>
          <p class="dropfilep2"><span class="drop-zone__prompt">or browse file from your computer</span></p>
          <input type="file" required multiple name="myFile[]" class="drop-zone__input">
        </div>
        <div class="mt-4 p-4 text-left">
          <button name="upload" type="submit" class="btn border-0" style="background-color: #a0bd1c; color: #fff; margin-left: 31px;">Upload file</button>
        </div>
      </form>

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
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
      const dropZoneElement = inputElement.closest(".drop-zone");

      dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
      });

      inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
          updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
      });

      dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
      });

      ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
          dropZoneElement.classList.remove("drop-zone--over");
        });
      });

      dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
          inputElement.files = e.dataTransfer.files;
          updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }

        dropZoneElement.classList.remove("drop-zone--over");
      });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
      let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

      // First time - remove the prompt
      if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
      }

      // First time - there is no thumbnail element, so lets create it
      if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
      }

      thumbnailElement.dataset.label = file.name;

      // Show thumbnail for image files
      if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
          thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
      } else {
        thumbnailElement.style.backgroundImage = null;
      }
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