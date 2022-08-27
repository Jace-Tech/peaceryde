<?php include("./inc/check_session.php") ?>
<?php if (isset($_SESSION['LOGGED_USER'])) header("location: ./Dashboard/"); ?>


<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
  <meta charset="utf-8" />
  <title>PeaceRyde Africa LLC - Sign In</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/icon.png">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&family=Ubuntu:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <style>
    .proceed {
      background-color: #a0bd1c;
      font-family: Ubuntu;
      font-size: 14px;
      font-style: normal;
      font-weight: 400;
      color: #ffffff;
    }
  </style>
</head>


<body class="body">
  <main class="new new-main layout">
    <!-- ======= section1 ======= -->
    <?php include("./inc/header.php"); ?>
    <section class=" new-section2__group layout2 resetpassword" style="background-color: #f8f6f6;">
      <div class="new-section1__cover-block layout signinpage">
        <h2 class="sih2">Sign into your PeaceRyde Africa account </h2>

        <div class="">
          <div class="card resetform">
            <form action="./handlers/login.php" method="post">
              <div class="form-row rpml">
                <div class="form-group inputdiv">
                  <p class="fpp">Email Address</p>
                  <input type="email" name="email" class="form-control rpinput" placeholder="" style="margin-top: 6px;" />
                  <p class="fpp" style="padding-top: 27px;">Password</p>
                  <div class="input-group mb-3">
                    <input type="password" id="id_password" required name="password" class="form-control rpinput" style="margin-top: 6px;" placeholder="" />
                    <span class="input-group-text fa fa-eye" style="height: 45px;
    margin-top: 5px;
    opacity: 0.5;
    background: white;" id="togglePassword"></span>
                </div> 
                  
                </div>
              </div>
              <div class="row buttonrow2" style="margin-top: 27px;">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xl-8" style="color: #ffffff;">
                  <input type="checkbox" class="textcheck" style="font-size: 12px;"> Keep me signed in on this computer
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xl-4">
                  <div class="rpmb">
                    <button name="login" type="submit" class="btn proceed sibutton">Sign In</button>
                  </div>
                </div>
              </div>


            </form>
          </div>
          <p><a href="./forgotpass" class="forgot">Forgot your password ?</a></p>
        </div>

      </div>
    </section>

    <!-- ======= End section8 ======= -->

  </main>
  <!--Start of Tawk.to Script-->
  <?php include("./inc/langChange.php") ?>
  <script>
     const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa fa-eye-slash');
});
  </script>
  <script>
   
    function inVisible(element) {
      //Checking if the element is
      //visible in the viewport
      var WindowTop = $(window).scrollTop();
      var WindowBottom = WindowTop + $(window).height();
      var ElementTop = element.offset().top;
      var ElementBottom = ElementTop + element.height();
      //animating the element if it is
      //visible in the viewport
      if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
        animate(element);
    }

    function animate(element) {
      //Animating the element if not animated before
      if (!element.hasClass('ms-animated')) {
        var maxval = element.data('max');
        var html = element.html();
        element.addClass("ms-animated");
        $({
          countNum: element.html()
        }).animate({
          countNum: maxval
        }, {
          //duration 5 seconds
          duration: 1000,
          easing: 'linear',
          step: function() {
            element.html(Math.floor(this.countNum) + html);
          },
          complete: function() {
            element.html(this.countNum + html);
          }
        });
      }

    }

    //When the document is ready
    $(function() {
      //This is triggered when the
      //user scrolls the page
      $(window).scroll(function() {
        //Checking if each items to animate are 
        //visible in the viewport
        $("h1[data-max]").each(function() {
          inVisible($(this));
        });
      })
    });
  </script>
  <script type="text/javascript">
    AOS.init();
  </script>
</body>

</html>