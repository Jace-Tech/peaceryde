<?php include("./inc/check_session.php") ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icon.png">
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/New.css" />
    <link rel="stylesheet" type="text/css" href="css/Laptops.css">
    <link rel="stylesheet" type="text/css" href="css/smallscreen800.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/header.css"> -->
    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>
    <style>


        .new-section2__group.layout2 {
            position: relative;
            height: 1500px;
        }
    </style>
</head>


<body class="body">
    <main class="new new-main layout">
        <!-- ======= section1 ======= -->
       <?php include("./inc/header.php"); ?>
       <section class=" new-section2__group layout2 faqheight" style="background-color: #f8f6f6;">
                <div class="new-section1__cover-block layout signinpage">
                    <div style="width: 100%; height: 200px; background-color: #ADC92E;">
                        <p class="faqtext">FAQs</p>
                        <h2 class="helptext">
                            <b>
                                Help
                    Center
                            </b>
                        </h2>
                        <p class="everythingtext">
                            Everything you need to know
                about your Visa
                        </p>
                    </div>
                    <div>
                        <p class="everythingtext2">
                            Everything you need to know
                        about processing your
                        Nigerian Visas and payment.
                        </p>
                        <div class="containerques" style="margin-top: 83px;">
                            <div class="question">
                                How do I verify my email?
                            </div>
                            <div class="answercont">
                                <div class="answer">
                                    Click the link in the verification email from verify@codepen.io (be sure to check your spam folder or other email tabs if it's not in your inbox).
                      
                      Or, send an email with the subject "Verify" to verify@codepen.io from the email address you use for your CodePen account.
                                    <br>
                                    <br>
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
                                    It's likely an infinite loop in JavaScript that we could not catch. To fix, add ?turn_off_js=true to the end of the URL (on any page, like the Pen or Project editor, your Profile page, or the Dashboard) to temporarily turn off JavaScript. When you're ready to run the JavaScript again, remove ?turn_off_js=true and refresh the page.
                                    <br>
                                    <br>
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
                                    You can leave a comment on any public Pen. Click the "Comments" link in the Pen editor view, or visit the Details page.
                                    <br>
                                    <br>
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
                                    We have our current list of library versions
                                    <a href="https://codepen.io/versions">here</a>
                                </div>
                            </div>
                        </div>
                        <div class="containerques">
                            <div class="question">
                                What are forks?
                            </div>
                            <div class="answercont">
                                <div class="answer">
                                    A fork is a complete copy of a Pen or Project that you can save to your own account and modify. Your forked copy comes with everything the original author wrote, including all of the code and any dependencies.
                                    <br>
                                    <br>
                                    <a href="https://blog.codepen.io/documentation/features/forks/">Learn More About Forks</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <comment content="======= End section7 =======" break="true"></comment>
            <!-- ======= section8 ======= -->
            <?php include("./inc/footer.php"); ?>
            <!-- ======= End section8 ======= -->

    </main>
    <script type="text/javascript">
        AOS.init();
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
</body>

</html>