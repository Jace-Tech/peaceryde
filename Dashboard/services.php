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
<?php include("../google_analytics.php"); ?>


<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

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
                        <div class="row">                           
                            <div class="">
                                <h3 class="page-title text-truncate mb-1 servicesh3">Other Services</h3>
                                
                            </div>
                        </div> 
                    </div>
                    <!-- <div class="align-self-center">
                      <div class="customize-input">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item"><a href="" style="color: #080C58;"><svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.6618 3.6875C19.1722 3.6875 20.3962 4.91146 20.3962 6.42188V16.5781C20.3962 18.0885 19.1722 19.3125 17.6618 19.3125H3.33887C2.61367 19.3125 1.91817 19.0244 1.40537 18.5116C0.892577 17.9988 0.604492 17.3033 0.604492 16.5781V6.42188C0.604492 4.91146 1.82845 3.6875 3.33887 3.6875H17.6618ZM19.0941 8.55781L10.8139 13.112C10.7287 13.1588 10.6341 13.186 10.537 13.1915C10.4399 13.197 10.3429 13.1807 10.2529 13.1437L10.1868 13.1125L1.90658 8.55729V16.5781C1.90658 16.958 2.05748 17.3223 2.32608 17.5909C2.59469 17.8595 2.959 18.0104 3.33887 18.0104H17.6618C18.0417 18.0104 18.406 17.8595 18.6746 17.5909C18.9432 17.3223 19.0941 16.958 19.0941 16.5781V8.55781ZM17.6618 4.98958H3.33887C2.959 4.98958 2.59469 5.14048 2.32608 5.40909C2.05748 5.6777 1.90658 6.04201 1.90658 6.42188V7.0724L10.5003 11.7984L19.0941 7.07187V6.42188C19.0941 6.04201 18.9432 5.6777 18.6746 5.40909C18.406 5.14048 18.0417 4.98958 17.6618 4.98958Z" fill="#080C58"/>
                                <circle cx="16" cy="6.09082" r="6" fill="#E80F0F"/>
                                <path d="M14.023 3.95C14.441 3.78867 14.848 3.58333 15.244 3.334C15.64 3.07733 16.003 2.75833 16.333 2.377H17.059V10H16.036V3.796C15.948 3.87667 15.838 3.961 15.706 4.049C15.5813 4.137 15.442 4.22133 15.288 4.302C15.1413 4.38267 14.9837 4.45967 14.815 4.533C14.6537 4.60633 14.496 4.66867 14.342 4.72L14.023 3.95Z" fill="white"/>
                                </svg>
                                &nbsp;&nbsp; Inbox</a></li>
                            <li class="breadcrumb-item">
                                <button id="top" class="" onclick="openForm()" style="background-color: transparent;
                                border: transparent;
                                color: #080C58;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.5 1.25C17.8315 1.25 18.1495 1.3817 18.3839 1.61612C18.6183 1.85054 18.75 2.16848 18.75 2.5V12.5C18.75 12.8315 18.6183 13.1495 18.3839 13.3839C18.1495 13.6183 17.8315 13.75 17.5 13.75H5.5175C4.85451 13.7501 4.21873 14.0136 3.75 14.4825L1.25 16.9825V2.5C1.25 2.16848 1.3817 1.85054 1.61612 1.61612C1.85054 1.3817 2.16848 1.25 2.5 1.25H17.5ZM2.5 0C1.83696 0 1.20107 0.263392 0.732233 0.732233C0.263392 1.20107 0 1.83696 0 2.5L0 18.4913C2.62686e-05 18.6149 0.0367407 18.7358 0.105497 18.8386C0.174252 18.9414 0.271959 19.0215 0.386249 19.0687C0.50054 19.116 0.626276 19.1282 0.747545 19.104C0.868814 19.0797 0.980163 19.0201 1.0675 18.9325L4.63375 15.3663C4.86812 15.1318 5.18601 15.0001 5.5175 15H17.5C18.163 15 18.7989 14.7366 19.2678 14.2678C19.7366 13.7989 20 13.163 20 12.5V2.5C20 1.83696 19.7366 1.20107 19.2678 0.732233C18.7989 0.263392 18.163 0 17.5 0L2.5 0Z" fill="#080C58"/>
                                        </svg>
                                        Send a Message
                                </button>
                                
                                
                                    
                            <li class="breadcrumb-item"><a href="javascript:void(0)" style="color: #080C58;"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.0625 2.58789L12.4375 3.66914C13.7482 4.42585 14.7725 5.5939 15.3517 6.99212C15.9308 8.39034 16.0324 9.94059 15.6407 11.4024C15.249 12.8643 14.3859 14.1561 13.1852 15.0774C11.9846 15.9987 10.5134 16.4981 9 16.4981C7.48658 16.4981 6.01545 15.9987 4.81477 15.0774C3.61409 14.1561 2.75097 12.8643 2.35926 11.4024C1.96756 9.94059 2.06917 8.39034 2.64833 6.99212C3.22749 5.5939 4.25184 4.42585 5.5625 3.66914L4.9375 2.58789C3.38854 3.48219 2.17795 4.8626 1.49348 6.51504C0.809018 8.16749 0.688934 9.99961 1.15186 11.7273C1.61478 13.4549 2.63483 14.9815 4.05382 16.0703C5.4728 17.1592 7.21141 17.7493 9 17.7493C10.7886 17.7493 12.5272 17.1592 13.9462 16.0703C15.3652 14.9815 16.3852 13.4549 16.8482 11.7273C17.3111 9.99961 17.191 8.16749 16.5065 6.51504C15.8221 4.8626 14.6115 3.48219 13.0625 2.58789Z" fill="#E80F0F"/>
                                <path d="M8.375 0.25H9.625V9H8.375V0.25Z" fill="#E80F0F"/>
                                </svg>
                                &nbsp; &nbsp; Logout</a></li>
                        </ol>
                    </div>
                    </div> -->
                </div>
            </div>               
            <div class="containerques" style="margin-top: 83px;">
                <div class="question">
                  How do I verify my email?
                </div>
                <div class="answercont">
                  <div class="answer">
                    Click the link in the verification email from verify@codepen.io (be sure to check your spam folder or other email tabs if it's not in your inbox).
            
            Or, send an email with the subject "Verify" to verify@codepen.io from the email address you use for your CodePen account.<br><br>
            
            <a href="https://blog.codepen.io/documentation/features/email-verification/#how-do-i-verify-my-email-2">How to Verify Email Docs</a>
                  </div>
                </div>
              </div>
              
                <div class="containerques">
                <div class="question">
                  My Pen loads infinitely or crashes the browser.
                </div>
                <div class="answercont">
                  <div class="answer">
                    It's likely an infinite loop in JavaScript that we could not catch. To fix, add ?turn_off_js=true to the end of the URL (on any page, like the Pen or Project editor, your Profile page, or the Dashboard) to temporarily turn off JavaScript. When you're ready to run the JavaScript again, remove ?turn_off_js=true and refresh the page.<br><br>
            
            <a href="https://blog.codepen.io/documentation/features/turn-off-javascript-in-previews/">How to Disable JavaScript Docs</a>
                  </div>
                </div>
              </div>
              
                  <div class="containerques">
                <div class="question">
                  How do I contact the creator of a Pen?
                </div>
                <div class="answercont">
                  <div class="answer">
                    You can leave a comment on any public Pen. Click the "Comments" link in the Pen editor view, or visit the Details page.<br><br>
            
            <a href="https://blog.codepen.io/documentation/faq/how-do-i-contact-the-creator-of-a-pen/">How to Contact Creator of a Pen Docs</a>
                  </div>
                </div>
              </div>
             
              <div class="containerques">
                <div class="question">
                  What version of [library] does CodePen use?
                </div>
                <div class="answercont">
                  <div class="answer">
                    We have our current list of library versions <a href="https://codepen.io/versions">here</a>
               
                  </div>
                </div>
              </div>
              
              <div class="containerques">
                <div class="question">
                  What are forks?
                </div>
                <div class="answercont">
                  <div class="answer">
                    A fork is a complete copy of a Pen or Project that you can save to your own account and modify. Your forked copy comes with everything the original author wrote, including all of the code and any dependencies.<br><br>
            
            <a href="https://blog.codepen.io/documentation/features/forks/">Learn More About Forks</a>
                  </div>
                </div>
              </div>
              <div class="chat-popup" id="myForm">
                <form action="/action_page.php" class="form-container">
                  <div class="wrapper">
                    <div class="mainchat">
                      <button type="button" class="btn cancel" style="margin-left: 280px;" onclick="closeForm()">X</button>
                        <div class="px-2 scroll">
                            <div class="d-flex align-items-center">
                                <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img9" /></div>
                                <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                                    <p class="msg">Hi Dr. Hendrikson, I haven't been falling well for past few days.</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-right justify-content-end ">
                                <div class="pr-2"> <span class="name">Dr. Hendrikson</span>
                                    <p class="msg">Let's jump on a video call</p>
                                </div>
                                <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img9" /></div>
                            </div>
                            <div class="text-center"><span class="between">Call started at 10:47am</span></div>
                            <div class="text-center"><span class="between">Call ended at 11:03am</span></div>
                            <div class="d-flex align-items-center">
                                <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img9" /></div>
                                <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                                    <p class="msg">How often should i take this?</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-right justify-content-end ">
                                <div class="pr-2"> <span class="name">Dr. Hendrikson</span>
                                    <p class="msg">Twice a day, at breakfast and before bed</p>
                                </div>
                                <div><img src="https://i.imgur.com/HpF4BFG.jpg" width="30" class="img9" /></div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-left pr-1"><img src="https://img.icons8.com/color/40/000000/guest-female.png" width="30" class="img9" /></div>
                                <div class="pr-2 pl-1"> <span class="name">Sarah Anderson</span>
                                    <p class="msg">How often should i take this?</p>
                                </div>
                            </div>
                        </div>
                        <nav class="navbars bg-white navbar-expand-sm d-flex justify-content-between"> <input type="text number" name="text" class="form-controls" placeholder="Type a message...">
                            <div class=" d-flex justify-content-end align-content-center text-center ml-2"> <svg width="33" height="35" viewBox="0 0 33 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M32.4419 20.4722C32.5822 19.2858 32.0534 18.1264 31.0686 17.4434L8.12261 1.50404C7.09665 0.772938 5.80289 0.713532 4.70133 1.30734C3.57966 1.91099 2.86538 3.55356 3.029 4.81133L4.30132 14.5749C4.43205 15.5761 5.23388 16.3557 6.23997 16.4571L19.7964 17.8394C20.4918 17.8985 20.9955 18.5204 20.9086 19.213C20.8348 19.8949 20.222 20.3912 19.5266 20.3321L5.95836 18.9379C4.95253 18.8342 4.00153 19.4326 3.65928 20.3856L0.300426 29.7007C-0.10413 30.8007 0.103129 31.9631 0.816651 32.8442C0.900595 32.9479 0.995031 33.0645 1.09201 33.1576C2.04085 34.0627 3.38245 34.3065 4.60167 33.8126L30.4291 23.1319C31.5361 22.6861 32.3016 21.6586 32.4419 20.4722Z" fill="#1161D9"/>
                              </svg>
                               </div>
                        </nav>
                    </div>
                </div>
                  
                </form>
              </div>
            

            <!-- <footer class="footer text-center text-muted">
                All Rights Reserved by t</a>.
            </footer> -->
          
        </div>
 
    </div>
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
        function openNav() {
          document.getElementById("sidebar").style.width = "260px";
          document.getElementById("main").style.marginLeft = "260px";
        }
        
        function closeNav() {
          document.getElementById("sidebar").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
          
        }
        </script>
        <script>
            let question = document.querySelectorAll(".question");

question.forEach(question => {
  question.addEventListener("click", event => {
    const active = document.querySelector(".question.active");
    if(active && active !== question ) {
      active.classList.toggle("active");
      active.nextElementSibling.style.maxHeight = 0;
    }
    question.classList.toggle("active");
    const answer = question.nextElementSibling;
    if(question.classList.contains("active")){
      answer.style.maxHeight = answer.scrollHeight + "px";
    } else {
      answer.style.maxHeight = 0;
    }
  })
})

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