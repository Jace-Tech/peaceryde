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
    padding-top: 1rem!important;
    padding-bottom: 1rem!important;
}
.px-4 {
    padding-right: 1.5rem!important;
    padding-left: 1.5rem!important;
}
.flex-grow-0 {
    flex-grow: 0!important;
}
.border-top {
    border-top: 1px solid #dee2e6!important;
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
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                        
            <main class="content">
              <div class="container-fluid p-0">
          
              <h1 class="h3 mb-3">Messages</h1>
          
              <div class="card">
                <div class="row g-0">
                  <div class="col-md-5 col-lg-5 col-xl-3 border-right">
          
                    <div class="px-4 d-none d-md-block">
                      <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                          <input type="text" class="form-control my-3" placeholder="Search...">
                        </div>
                      </div>
                    </div>
          
                    <a href="#" class="list-group-item list-group-item-action border-0">
                      <div class="badge bg-success float-right">5</div>
                      <div class="d-flex align-items-start">
                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                          Vanessa Tucker
                          <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                      <div class="badge bg-success float-right">2</div>
                      <div class="d-flex align-items-start">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="William Harris" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                          William Harris
                          <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                      <div class="d-flex align-items-start">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                          Sharon Lessman
                          <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                      <div class="d-flex align-items-start">
                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle mr-1" alt="Christina Mason" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                          Christina Mason
                          <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                      <div class="d-flex align-items-start">
                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Fiona Green" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                          Fiona Green
                          <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                      <div class="d-flex align-items-start">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="Doris Wilder" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                          Doris Wilder
                          <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                      <div class="d-flex align-items-start">
                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="rounded-circle mr-1" alt="Haley Kennedy" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                          Haley Kennedy
                          <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                        </div>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                      <div class="d-flex align-items-start">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Jennifer Chang" width="40" height="40">
                        <div class="flex-grow-1 ml-3">
                          Jennifer Chang
                          <div class="small"><span class="fas fa-circle chat-offline"></span> Offline</div>
                        </div>
                      </div>
                    </a>
          
                    <hr class="d-block d-lg-none mt-1 mb-0">
                  </div>
                  <div class="col-md-7 col-lg-7 col-xl-9">
                    <div class="py-2 px-4 border-bottom d-none d-lg-block">
                      <div class="d-flex align-items-center py-1">
                        <div class="position-relative">
                          <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                        </div>
                        <div class="flex-grow-1 pl-3">
                          <strong>Sharon Lessman</strong>
                          <div class="text-muted small"><em>Typing...</em></div>
                        </div>
                        <!-- <div>
                          <button class="btn btn-primary btn-lg mr-1 px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone feather-lg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></button>
                          <button class="btn btn-info btn-lg mr-1 px-3 d-none d-md-inline-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video feather-lg"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></button>
                          <button class="btn btn-light border btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal feather-lg"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg></button>
                        </div> -->
                      </div>
                    </div>
          
                    <div class="position-relative">
                      <div class="chat-messages p-4">
          
                        <div class="chat-message-right pb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">You</div>
                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                          </div>
                        </div>
          
                        <div class="chat-message-left pb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                            Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                          </div>
                        </div>
          
                        <div class="chat-message-right mb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:35 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">You</div>
                            Cum ea graeci tractatos.
                          </div>
                        </div>
          
                        <div class="chat-message-left pb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:36 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                            Sed pulvinar, massa vitae interdum pulvinar, risus lectus porttitor magna, vitae commodo lectus mauris et velit.
                            Proin ultricies placerat imperdiet. Morbi varius quam ac venenatis tempus.
                          </div>
                        </div>
          
                        <div class="chat-message-left pb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:37 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                            Cras pulvinar, sapien id vehicula aliquet, diam velit elementum orci.
                          </div>
                        </div>
          
                        <div class="chat-message-right mb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:38 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">You</div>
                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                          </div>
                        </div>
          
                        <div class="chat-message-left pb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:39 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                            Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                          </div>
                        </div>
          
                        <div class="chat-message-right mb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:40 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">You</div>
                            Cum ea graeci tractatos.
                          </div>
                        </div>
          
                        <div class="chat-message-right mb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:41 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">You</div>
                            Morbi finibus, lorem id placerat ullamcorper, nunc enim ultrices massa, id dignissim metus urna eget purus.
                          </div>
                        </div>
          
                        <div class="chat-message-left pb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:42 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                            Sed pulvinar, massa vitae interdum pulvinar, risus lectus porttitor magna, vitae commodo lectus mauris et velit.
                            Proin ultricies placerat imperdiet. Morbi varius quam ac venenatis tempus.
                          </div>
                        </div>
          
                        <div class="chat-message-right mb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:43 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                            <div class="font-weight-bold mb-1">You</div>
                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                          </div>
                        </div>
          
                        <div class="chat-message-left pb-4">
                          <div>
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                            <div class="text-muted small text-nowrap mt-2">2:44 am</div>
                          </div>
                          <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                            <div class="font-weight-bold mb-1">Sharon Lessman</div>
                            Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                          </div>
                        </div>
          
                      </div>
                    </div>
          
                    <div class="flex-grow-0 py-3 px-4 border-top">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type your message">
                        <button class="btn btn-primary">Send</button>
                      </div>
                    </div>
          
                  </div>
                </div>
              </div>
            </div>
          </main>
          
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
          document.getElementById("sidebar").style.width = "260px";
          document.getElementById("main").style.marginLeft = "260px";
        }
        
        function closeNav() {
          document.getElementById("sidebar").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
          
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