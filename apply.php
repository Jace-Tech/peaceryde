<?php include("./inc/check_session.php") ?>

<?php

if (isset($_POST["apply"])) {
  $type = $_POST["type"];

  switch ($type) {
    case 'TWP':
      header("Location: ./NTWPForm.php");
      break;

    case 'NBV':
      header("Location: ./NBVForm.php");
      break;

    case 'NBI':
      header("Location: ./BIForm.php");
      break;

    default:
      break;
  }
}

?>

<!DOCTYPE html>
<html>
<!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon.png">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style>
    .new-section2__group.layout2 {
      position: relative;
      height: 100vh;
    }
  </style>
</head>


<body class="body">
  <main class="new new-main layout">
    <!-- ======= section1 ======= -->
    <!-- Header here -->
    <?php include("./inc/header.php"); ?>
    <!-- Header here -->
    <section class=" new-section2__group layout2 applypage" style="background-color: #f8f6f6;">
      <div class="new-section1__cover-block layout">


        <div class="">
          <div class="card applycard">
            <div style="margin-top: 65px;">
              <h2 class="applyh2">Fill the form below</h2>
              <p class="applyh2p">It takes less than 5 minutes to do this</p>
            </div>
            <form method="post">

              <p class="applyformp">Which of our services are you applying For?</p>

              <div class="form-row formrowdiv">


                <div class="form-group formgroupdiv">
                  <select class="form-select applyselect" aria-label="Default select example" name="type">
									<option selected>Services</option>
									<option value="NBV">Nigeria Business Visa</option>
									<option value="TWP">Nigeria Temporary Work Permit</option>
									<option value="NBI">Nigeria Business Incorporation</option>
								</select>

                </div>
              </div>


              <div class="applybtndiv">
                <button type="submit" name="apply" class="btn proceed">Next</button>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section>

    <?php include("./inc/footer.php"); ?>
    <!-- ======= End section8 ======= -->

  </main>
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