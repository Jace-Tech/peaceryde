<?php include("./inc/check_session.php") ?>
<?php 
    $FAQ = new FAQs($connect);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icon.png">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
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

    <!-- get jquery link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                    <?php if(count($FAQ->get_all_questions())): ?>
                        <?php $counter = 1;  ?>
                        <?php foreach($FAQ->get_all_questions() as $faq):  ?>
                            <div class="containerques" <?= $counter == 1 ? "style='margin-top: 83px;'" : "" ?>>
                                <div class="question">
                                   <?= $faq['question']; ?>
                                </div>
                                <div class="answercont">
                                    <div class="answer">
                                        <?= $faq['answer']; ?>
                                    </div>
                                </div>
                            </div>
                        <?php $counter++; endforeach; ?>
                    <?php else:?>
                        <p class="text-center text-muted p-5">No FAQ available</p>
                    <?php endif; ?>
                    
                </div>
            </div>
        </section>
        <comment content="======= End section7 =======" break="true"></comment>
        <!-- ======= section8 ======= -->
               <?php include("./inc/footer.php"); ?><?php include("./inc/langChange.php") ?>
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
                if (active && active !== question) {
                    active.classList.toggle("active");
                    active.nextElementSibling.style.maxHeight = 0;
                }
                question.classList.toggle("active");
                const answer = question.nextElementSibling;
                if (question.classList.contains("active")) {
                    answer.style.maxHeight = answer.scrollHeight + "px";
                } else {
                    answer.style.maxHeight = 0;
                }
            })
        })
    </script>
</body>

</html>