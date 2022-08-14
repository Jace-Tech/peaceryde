<?php include("./inc/check_session.php"); ?>
<?php

$main_admin = getSubAdmin($connect, "MAIN_ADMIN");
$messages = new Message($connect);

if (isset($_GET['message'])) {
    $id = $_GET['message'];
    $USER_MESSAGES = $messages->get_conversation($USER_ID, $id);

}
$messagers = getUserMessagers($connect, $USER_ID);

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
        .chat-online {
            color: #34ce57
        }

        .chat-offline {
            color: #e4606d
        }

        .chat-messages {
            display: flex;
            flex-direction: column;
            max-height: 800px;
            overflow-y: scroll
        }

        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }

        .chat-message-left {
            margin-right: auto
        }

        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .flex-grow-0 {
            flex-grow: 0 !important;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }

        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-size: 1.5rem;
            background-color: #fff !important;
            color: #555;
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
                    <rect y="6" width="19" height="3" fill="#A0BD1C" />
                    <rect y="12" width="19" height="3" fill="#A0BD1C" />
                    <rect width="19" height="3" fill="#A0BD1C" />
                </svg>
            </span>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Messages</h1>

                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-5 col-lg-5 col-xl-3 border-right">

                                <div class="px-4 d-none d-md-block">
                                    <div class="d-flex align-items-center">
                                        <!-- <div class="flex-grow-1">
                                            <input type="text" class="form-control my-3" placeholder="Search...">
                                        </div> -->
                                    </div>
                                </div>

                                <?php if (count($messagers)) : ?>
                                    <?php foreach ($messagers as $messager): ?>
                                        <a href="?message=<?= $messager['admin_id']; ?>" class="list-group-item <?= $messager['admin_id'] == $_GET['message'] ? "bg-light" : "" ?> list-group-item-action border-0">
                                            <!-- <div class="badge bg-success float-right">5</div> -->
                                            <div class="d-flex align-items-start">
                                                <img src="./pic/index.png" class="rounded-circle mr-1" alt="<?= $main_admin['name']; ?>" width="40" height="40">
                                                <div class="flex-grow-1 ml-3">
                                                    <p> 
                                                        <?= $messager['name']; ?> 

                                                        <div class="ml-2">
                                                            <?php if(count($messages->get_unread_messages($messager['admin_id'], $USER_ID))): ?>
                                                                <div class="badge badge-danger">
                                                                    <?=  count($messages->get_unread_messages($messager['admin_id'], $USER_ID)) ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </p>
                                                    <div class="text-muted text-sm font-weight-light">
                                                        <?= $messager['admin_id'] == "MAIN_ADMIN" ? "Admin" : "Sub admin" ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p class="text-muted text-sm">No messager found</p>
                                <?php endif; ?>

                                <hr class="d-block d-lg-none mt-1 mb-0">
                            </div>

                            <?php if (isset($_GET['message'])) : ?>
                                <div class="col-md-7 col-lg-7 col-xl-9">
                                    <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                        <div class="d-flex align-items-center py-1">
                                            <div class="position-relative">
                                                <?php if (0) : ?>
                                                    <img src="./pic/<?= $USER_PROFILE_PIC; ?>" class="rounded-circle mr-1" alt="" width="40" height="40">
                                                <?php else : ?>
                                                    <div class="avater">
                                                        <?= getSubName(getSubAdmin($connect, $_GET['message'])['name']); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="flex-grow-1 pl-3">
                                                <strong>
                                                    <?= getSubAdmin($connect, $_GET['message'])['name'];  ?>
                                                </strong>
                                                <div class="text-muted small"><em>
                                                    <?= $_GET['message'] == "MAIN_ADMIN" ? "Admin" : "Sub admin" ?>
                                                </em></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="position-relative">
                                        <div class="chat-messages p-4">

                                            <?php if (count($USER_MESSAGES)) : ?>
                                                <?php foreach ($USER_MESSAGES as $__message) : ?>
                                                    <?php $messages->mark_read($__message['message_id'], $USER_ID); ?>

                                                    <!-- Attachment -->
                                                    <?php if ($__message['attachment']) : ?>
                                                        <?php $attachments = json_decode($__message['attachment'], true); ?>
                                                        <div class="<?= $USER_ID == $__message['sender_id'] ? "chat-message-right" : "chat-message-left" ?> d-flex align-items-center p-2 bg-light g-2" style="max-height: 50px;">
                                                            <?php foreach ($attachments as $attachment) : ?>
                                                                <a download="<?= $attachment; ?>" href="../attachment/<?= $attachment ?>" class="rounded d-flex p-2">
                                                                    <svg class="fill-current text-muted flex-shrink-0 mr-3" style="height: 20px; height: 20px;" viewBox="0 0 12 12">
                                                                        <path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z"></path>
                                                                    </svg>
                                                                    <span class="text-secondary">
                                                                        <?= $attachment; ?>
                                                                    </span>
                                                                </a>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if ($__message['sender_id'] == $USER_ID) : ?>
                                                        <!-- User -->
                                                        <div class="chat-message-right pb-4">
                                                            <?php if ($USER_PROFILE_PIC) : ?>
                                                                <div>
                                                                    <img src="./pic/<?= $USER_PROFILE_PIC; ?>" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                                    <div class="text-muted small text-nowrap mt-2">
                                                                        <?= date("D, h:i a", strtotime($__message['date'])); ?>
                                                                    </div>
                                                                </div>

                                                            <?php else : ?>
                                                                <div>
                                                                    <div class="avater">
                                                                        <?= getSubName(getSubAdmin($connect, $_GET['message'])["name"]); ?>
                                                                    </div>
                                                                    <div class="text-muted small text-nowrap mt-2">
                                                                        <?= date("D, h:i a", strtotime($__message['date'])); ?>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>

                                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                                <div class="font-weight-bold mb-1">You</div>
                                                                <?= $__message['message']; ?>
                                                            </div>
                                                        </div>
                                                    <?php else : ?>
                                                        <!-- Admin -->
                                                        <?php $_admin = getAdmin($connect, $_GET['message']); ?>
                                                        <div class="chat-message-left pb-4">
                                                            <div>
                                                                <img src="./pic/index.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                                <?= date("D, h:i a", strtotime($__message['date'])); ?>
                                                            </div>
                                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                                <div class="font-weight-bold mb-1">
                                                                    <?= $_admin['name']; ?>
                                                                </div>
                                                                <?= $__message['message']; ?>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <div class="text-sm text-muted text-center">No messages yet</div>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <form action="./handler/message_handler.php" method="post" enctype="multipart/form-data" class="flex-grow-0 py-3 px-4 border-top">
                                        <div class="input-group">
                                            <input type="hidden" name="sender" value="<?= $USER_ID ?>">
                                            <input type="hidden" name="reciever" value="<?= $_GET['message']; ?>">
                                            <input type="text" name="message" class="form-control" placeholder="Type your message">
                                            <input type="file" name="attachment[]" multiple id="hiddenInput" hidden>
                                            <button id="fileBtn" type="button" class="btn btn-secondary">Files  <svg class="fill-current text-muted flex-shrink-0 mr-3" style="height: 20px; fill: #ccc; height: 20px;" viewBox="0 0 12 12">
                                        <path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z"></path>
                                    </svg></button>
                                            <button name="send" type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                        <div id="filesScreen"></div>
                                    </form>

                                </div>
                            <?php else : ?>
                                <div class="col-md-7 col-lg-7 col-xl-9">
                                    <div class="position-relative">
                                        <div class="chat-messages p-4">
                                            <div class="text-center text-muted text-lg">Click on a chat to see messages</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </main>

        </div>

    </div>
    <script>
        const fileBtn = document.querySelector("#fileBtn")
        const fileInput = document.querySelector("#hiddenInput")
        const filesScreen = document.querySelector("#filesScreen")

        fileBtn.addEventListener("click", (e) => {
            e.preventDefault();
            fileInput.click();
        })

        fileInput.addEventListener("change", (e) => {
            const files = [...e.target.files]
            filesScreen.innerHTML = ""

            if (files.length) {
                files.forEach(file => {
                    const div = document.createElement('div');
                    div.className = "flex items-center p-2 g-2"
                    div.innerHTML = `
                                    <svg class="fill-current text-muted flex-shrink-0 mr-3" style="height: 20px; height: 20px;" viewBox="0 0 12 12">
                                        <path d="M15 15V5l-5-5H2c-.6 0-1 .4-1 1v14c0 .6.4 1 1 1h12c.6 0 1-.4 1-1zM3 2h6v4h4v8H3V2z"></path>
                                    </svg>
                                    <span class="text-gray-500 text-sm">${file.name}</span>
                                `
                    filesScreen.appendChild(div)
                })
            }
        })
    </script>
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