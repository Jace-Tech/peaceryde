<?php include("./inc/check_session.php"); ?>
<?php 
    $messages = new Message($connect);

    $USER_MESSAGES = $messages->get_conversation($USER_ID, "MAIN_ADMIN");
    $isUnread = count($messages->get_user_unread_messages($USER_ID));
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include("../google_analytics.php"); ?>
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
        .box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}
.box.box-primary {
    border-top-color: #3c8dbc;
}

.box.collapsed-box .box-body, .box.collapsed-box .box-footer {
    display: none;
}
.box .nav-stacked>li {
    border-bottom: 1px solid #f4f4f4;
    margin: 0;
}
.box .nav-stacked>li:last-of-type {
    border-bottom: none;
}
.box.height-control .box-body {
    max-height: 300px;
    overflow: auto;
}
.box .border-right {
    border-right: 1px solid #f4f4f4;
}
.box .border-left {
    border-left: 1px solid #f4f4f4;
}
.box.box-solid {
    border-top: 0;
}
.box.box-solid>.box-header .btn.btn-default {
    background: transparent;
}
.box.box-solid>.box-header .btn:hover, .box.box-solid>.box-header a:hover {
    background: rgba(0, 0, 0, 0.1);
}
.box.box-solid.box-default {
    border: 1px solid #d2d6de;
}
.box.box-solid.box-default>.box-header {
    color: #444;
    background: #d2d6de;
    background-color: #d2d6de;
}
.box.box-solid.box-default>.box-header a, .box.box-solid.box-default>.box-header .btn {
    color: #444;
}
.box.box-solid.box-primary {
    border: 1px solid #3c8dbc;
}
.box.box-solid.box-primary>.box-header {
    color: #fff;
    background: #3c8dbc;
    background-color: #3c8dbc;
}
.box.box-solid.box-primary>.box-header a, .box.box-solid.box-primary>.box-header .btn {
    color: #fff;
}


.box.box-solid>.box-header>.box-tools .btn {
    border: 0;
    box-shadow: none;
}
.box.box-solid[class*='bg']>.box-header {
    color: #fff;
}
.box .box-group>.box {
    margin-bottom: 5px;
}
.box .knob-label {
    text-align: center;
    color: #333;
    font-weight: 100;
    font-size: 12px;
    margin-bottom: 0.3em;
}
.box>.overlay, .overlay-wrapper>.overlay, .box>.loading-img, .overlay-wrapper>.loading-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%}
.box .overlay, .overlay-wrapper .overlay {
    z-index: 50;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 3px;
}
.box .overlay>.fa, .overlay-wrapper .overlay>.fa {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -15px;
    margin-top: -15px;
    color: #000;
    font-size: 30px;
}
.box .overlay.dark, .overlay-wrapper .overlay.dark {
    background: rgba(0, 0, 0, 0.5);
}
.box-header:before, .box-body:before, .box-footer:before, .box-header:after, .box-body:after, .box-footer:after {
    content: " ";
    display: table;
}
.box-header:after, .box-body:after, .box-footer:after {
    clear: both;
}
.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}
.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}
.collapsed-box .box-header.with-border {
    border-bottom: none;
}
.box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}
.box-header>.fa, .box-header>.glyphicon, .box-header>.ion {
    margin-right: 5px;
}
.box-header>.box-tools {
    position: absolute;
    right: 10px;
    top: 5px;
}
.box-header>.box-tools [data-toggle="tooltip"] {
    position: relative;
}
.box-header>.box-tools.pull-right .dropdown-menu {
    right: 0;
    left: auto;
}
.btn-box-tool {
    padding: 5px;
    font-size: 12px;
    background: transparent;
    color: #97a0b3;
}
.open .btn-box-tool, .btn-box-tool:hover {
    color: #606c84;
}
.btn-box-tool.btn:active {
    box-shadow: none;
}
.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.no-header .box-body {
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}
.box-body>.table {
    margin-bottom: 0;
}
.box-body .fc {
    margin-top: 5px;
}
.box-body .full-width-chart {
    margin: -19px;
}
.box-body.no-padding .full-width-chart {
    margin: -9px;
}
.box-body .box-pane {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 3px;
}
.box-body .box-pane-right {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 0;
}
.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}
.direct-chat .box-body {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    position: relative;
    overflow-x: hidden;
    padding: 0;
}
.direct-chat.chat-pane-open .direct-chat-contacts {
    -webkit-transform: translate(0,  0);
    -ms-transform: translate(0,  0);
    -o-transform: translate(0,  0);
    transform: translate(0,  0);
}
.direct-chat-messages {
    -webkit-transform: translate(0,  0);
    -ms-transform: translate(0,  0);
    -o-transform: translate(0,  0);
    transform: translate(0,  0);
    padding: 10px;
    height: 250px;
    overflow: auto;
}
.direct-chat-msg, .direct-chat-text {
    display: block;
}
.direct-chat-msg {
    margin-bottom: 10px;
}
.direct-chat-msg:before, .direct-chat-msg:after {
    content: " ";
    display: table;
}
.direct-chat-msg:after {
    clear: both;
}
.direct-chat-messages, .direct-chat-contacts {
    -webkit-transition: -webkit-transform .5s ease-in-out;
    -moz-transition: -moz-transform .5s ease-in-out;
    -o-transition: -o-transform .5s ease-in-out;
    transition: transform .5s ease-in-out;
}
.direct-chat-text {
    border-radius: 5px;
    position: relative;
    padding: 5px 10px;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    margin: 5px 0 0 50px;
    color: #444;
}
.direct-chat-text:after, .direct-chat-text:before {
    position: absolute;
    right: 100%;
    top: 15px;
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    width: 0;
    pointer-events: none;
}
.direct-chat-text:after {
    border-width: 5px;
    margin-top: -5px;
}
.direct-chat-text:before {
    border-width: 6px;
    margin-top: -6px;
}
.right .direct-chat-text {
    margin-right: 50px;
    margin-left: 0;
}
.right .direct-chat-text:after, .right .direct-chat-text:before {
    right: auto;
    left: 100%;
    border-right-color: transparent;
    border-left-color: #d2d6de;
}
.direct-chat-img {
    border-radius: 50%;
    float: left;
    width: 40px;
    height: 40px;
}
.right .direct-chat-img {
    float: right;
}
.direct-chat-info {
    display: block;
    margin-bottom: 2px;
    font-size: 12px;
}
.direct-chat-name {
    font-weight: 600;
}
.direct-chat-timestamp {
    color: #999;
}
.direct-chat-contacts-open .direct-chat-contacts {
    -webkit-transform: translate(0,  0);
    -ms-transform: translate(0,  0);
    -o-transform: translate(0,  0);
    transform: translate(0,  0);
}
.direct-chat-contacts {
    -webkit-transform: translate(101%,  0);
    -ms-transform: translate(101%,  0);
    -o-transform: translate(101%,  0);
    transform: translate(101%,  0);
    position: absolute;
    top: 0;
    bottom: 0;
    height: 250px;
    width: 100%;
    background: #222d32;
    color: #fff;
    overflow: auto;
}
.contacts-list>li {
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    padding: 10px;
    margin: 0;
}
.contacts-list>li:before, .contacts-list>li:after {
    content: " ";
    display: table;
}
.contacts-list>li:after {
    clear: both;
}
.contacts-list>li:last-of-type {
    border-bottom: none;
}
.contacts-list-img {
    border-radius: 50%;
    width: 40px;
    float: left;
}
.contacts-list-info {
    margin-left: 45px;
    color: #fff;
}
.contacts-list-name, .contacts-list-status {
    display: block;
}
.contacts-list-name {
    font-weight: 600;
}
.contacts-list-status {
    font-size: 12px;
}
.contacts-list-date {
    color: #aaa;
    font-weight: normal;
}
.contacts-list-msg {
    color: #999;
}

.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
}
.direct-chat-primary .right>.direct-chat-text:after, .direct-chat-primary .right>.direct-chat-text:before {
    border-left-color: #3c8dbc;
}

.avatar {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 80px;
		height: 80px;
		border-radius: 50%;
		font-size: 1.5rem;
		background-color: #fff !important;
		color: #555;
	}

                                    
    </style>
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
                                <h3 class="page-title text-truncate mb-1 servicesh3">Chat</h3>
                                
                            </div>
                        </div> 
                    </div>
                   
                </div>
            </div>               
       
            <div class="row bootstrap snippets">
                <div class="col-md-6 col-lg-5">
                  <!-- DIRECT CHAT PRIMARY -->
                  <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Direct Chat</h3>
                
                      <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages">3</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                          <i class="fa fa-comments"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                      <div class="direct-chat-messages">
                        <?php if(count($USER_MESSAGES)): ?>
                        <?php foreach($USER_MESSAGES as $message): ?>
							<?php $messages->mark_read($message['message_id'], $USER_ID); ?>
                            <!--   SENDER  -->
							<?php if($message['sender_id'] == $USER_ID): ?>
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name  pull-right"><?= $USER['firstname'] . ' ' . $USER['lastname']; ?></span>
                                        <span class="direct-chat-timestamp pull-left"><?= date("j M g:i a", strtotime($message["date"])); ?></span>
                                    </div>
                                    <div class="direct-chat-img avater">
                                        <?= getSubName($USER['firstname'] . ' ' . $USER['lastname']); ?>
                                    </div>
                                    <div class="direct-chat-text">
                                        <?= $message['message']; ?>
                                    </div>
                                </div>
							<?php else: ?>
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">Admin</span>
                                        <span class="direct-chat-timestamp pull-right"><?= date("j M g:i a", strtotime($message["date"])); ?></span>
                                    </div>
                                    <div class="avater direct-chat-img">
                                        <?= "A"; ?>
                                    </div>
                                    <div class="direct-chat-text">
                                        <?= $message['message'] ?>.
                                    </div>
                                </div>
							<?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted text-center">No messages yet</p>
                    <?php endif; ?>
                    <div class="box-footer">
                      <form action="./handler/message_handler.php" method="post">
                        <div class="input-group">
                            <input type="hidden" name="sender" value="<?= $USER_ID ?>">
                            <input type="hidden" name="reciever" value="<?= "MAIN_ADMIN" ?>">
                            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-btn">
                                <button name="send" type="submit" class="btn btn-primary btn-flat">Send</button>
                            </span>
                        </div>
                      </form>
                    </div>
                    <!-- /.box-footer-->
                  </div>
                  <!--/.direct-chat -->
                </div>

            </div>

          
        </div>
 
    </div>
    <script>
      function openForm() {
     document.getElementById("myForm").style.display = "block";
     }
     
     function closeForm() {
     document.getElementById("myForm").style.display = "none";
     }
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