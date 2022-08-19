<?php include("./inc/alert.php"); ?>
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
            /*background-color: #17548d;*/ /*#e3e3ff*/

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
<section class="new-section1__section1 layout">
  <div class="fixed-top">
    <div class="new-section1__block21 layout">
      <div class="new-section1__flex1 layout laptop">
        <div class="new-section1__text-body8-box layout">
          <div class="new-section1__text-body8">
            <span><b class="free">FREE </b></span><span class="new-section1__text-body8-span2 text business">Business
              Name Availability Search</span>
          </div>
        </div>
        <div class="new-section1__flex1-spacer"></div>
        <div class="new-section1__flex1-item">
          <input type="text" class="form-control form" placeholder=" search business name here">
          <a target="_blank" href="https://search.cac.gov.ng/home" class="btn hiddenbutton">SEARCH</a>
          <a href="+1 (302) 703-9867" class="hiddenphone ">+1 (302) 703-9867</a>
        </div>
        <div class="new-section1__flex1-spacer1"></div>
        <div class="new-section1__flex1-item1">
          <div class="">
            <a target="_blank" href="https://search.cac.gov.ng/home" class="btn buttons btnsearch">SEARCH</a>

          </div>
        </div>
        <div class="new-section1__flex1-spacer2"></div>

        <a href="+1 (302) 703-9867" class="phone">+1 (302) 703-9867</a>
      </div>
      <div class="mobile">
        <div class="">
          <span><b class="free">FREE </b></span><span class="new-section1__text-body8-span2 text business">Business
            Name Availability Search</span>
        </div>
        <div class="row">
          <div class="column">
            <input type="text" class="form-control formobile" placeholder=" search business name here">
          </div>
          <div class="column">
            <a target="_blank" href="https://search.cac.gov.ng/home" class="btn hiddenbutton">SEARCH</a>
          </div>
          <div class="column call">
            <a href="+1 (302) 703-9867" class="mobphone">+1 (302) 703-9867</a>
          </div>
        </div>
      </div>
    </div> 

    <nav class="navbar navbar-expand-lg bg-nav shadow navbar-light height" style="padding-bottom: 0px;">
      <div class="container-fluid cf cfheight">
        <a class="navbar-brand brand" href="index.php"><img src="assets/logo.png" class="logoimg" width="164"></a>
        <div class=" nav-item dropdown mobilelang">
          <div id="google_translate_element"></div>
          <a class="nav-link dropdown-toggle nav english" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
            <svg width="20" height="20" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.083313 7.00004C0.083313 3.45612 2.95606 0.583374 6.49998 0.583374C10.0439 0.583374 12.9166 3.45612 12.9166 7.00004C12.9166 10.544 10.0439 13.4167 6.49998 13.4167C2.95606 13.4167 0.083313 10.544 0.083313 7.00004ZM6.49998 1.75004C3.6004 1.75004 1.24998 4.10046 1.24998 7.00004C1.24998 9.89962 3.6004 12.25 6.49998 12.25C9.39956 12.25 11.75 9.89962 11.75 7.00004C11.75 4.10046 9.39956 1.75004 6.49998 1.75004Z" fill="#080C58"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.73049 0.731373C6.98705 0.536518 7.35299 0.586539 7.54785 0.843098L7.0833 1.19591C7.54785 0.843098 7.54771 0.842914 7.54785 0.843098L7.54843 0.843869L7.54917 0.844854L7.55114 0.847464L7.55693 0.855236L7.5757 0.880901C7.5913 0.902475 7.61293 0.932948 7.63972 0.972048C7.69328 1.05023 7.76758 1.16303 7.85561 1.30828C8.03155 1.59859 8.26313 2.01976 8.49387 2.55432C8.95493 3.62243 9.41664 5.15269 9.41664 7.00008C9.41664 8.84747 8.95493 10.3777 8.49387 11.4458C8.26313 11.9804 8.03155 12.4016 7.85561 12.6919C7.76758 12.8371 7.69328 12.9499 7.63972 13.0281C7.61293 13.0672 7.5913 13.0977 7.5757 13.1193L7.55693 13.1449L7.55114 13.1527L7.54917 13.1553L7.54843 13.1563C7.54829 13.1565 7.54785 13.1571 7.0833 12.8042L7.54785 13.1571C7.35299 13.4136 6.98705 13.4636 6.73049 13.2688C6.47424 13.0742 6.42403 12.7089 6.61805 12.4524C6.61811 12.4523 6.61847 12.4518 6.61853 12.4517C6.61861 12.4516 6.61845 12.4518 6.61853 12.4517L6.61971 12.4501L6.63021 12.4358C6.64025 12.4219 6.65622 12.3994 6.67728 12.3687C6.71942 12.3072 6.78185 12.2126 6.85788 12.0872C7.01006 11.8361 7.21598 11.4625 7.42274 10.9835C7.83668 10.0245 8.24997 8.65269 8.24997 7.00008C8.24997 5.34747 7.83668 3.97565 7.42274 3.01668C7.21598 2.5377 7.01006 2.16407 6.85788 1.91297C6.78185 1.78752 6.71942 1.69296 6.67728 1.63147C6.65622 1.60073 6.64025 1.57828 6.63021 1.56439L6.61971 1.55003L6.61853 1.54842C6.42395 1.29188 6.47403 0.92615 6.73049 0.731373Z" fill="#080C58"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38192 1.54777C6.57592 1.29125 6.5257 0.925984 6.26946 0.731373L6.38192 1.54777ZM5.91665 1.19591L5.45211 0.843098C5.64696 0.586539 6.0129 0.536518 6.26946 0.731373M5.91665 1.19591C5.45211 0.843098 5.45197 0.843272 5.45183 0.843456L5.45152 0.843868L5.45078 0.844853L5.44881 0.847464L5.44302 0.855236L5.42425 0.880901C5.40865 0.902475 5.38702 0.932948 5.36023 0.972048C5.30667 1.05023 5.23238 1.16303 5.14434 1.30828C4.9684 1.59859 4.73682 2.01976 4.50608 2.55432C4.04502 3.62243 3.58331 5.15269 3.58331 7.00008C3.58331 8.84747 4.04502 10.3777 4.50608 11.4458C4.73682 11.9804 4.9684 12.4016 5.14434 12.6919C5.23238 12.8371 5.30667 12.9499 5.36023 13.0281C5.38702 13.0672 5.40865 13.0977 5.42425 13.1193L5.44302 13.1449L5.44881 13.1527L5.45078 13.1553L5.45152 13.1563L5.45183 13.1567C5.45197 13.1569 5.45211 13.1571 5.91665 12.8042L5.45211 13.1571C5.64696 13.4136 6.0129 13.4636 6.26946 13.2688C6.52588 13.074 6.57599 12.7084 6.38152 12.4519L6.38142 12.4517L6.38119 12.4514" fill="#080C58"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.450806 9.04171C0.450806 8.71954 0.711973 8.45837 1.03414 8.45837H11.9658C12.288 8.45837 12.5491 8.71954 12.5491 9.04171C12.5491 9.36387 12.288 9.62504 11.9658 9.62504H1.03414C0.711973 9.62504 0.450806 9.36387 0.450806 9.04171Z" fill="#080C58"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M0.450806 4.95833C0.450806 4.63617 0.711973 4.375 1.03414 4.375H11.9658C12.288 4.375 12.5491 4.63617 12.5491 4.95833C12.5491 5.2805 12.288 5.54167 11.9658 5.54167H1.03414C0.711973 5.54167 0.450806 5.2805 0.450806 4.95833Z" fill="#080C58"/>
              </svg>
              &nbsp;<span class="langName">English |</span></a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item lang-select" href="#googtrans(en|en)" data-lang="en" style="color: black; font-size: 15px; padding-bottom: 10px;">English </a></li>
            <li><a class=" dropdown-item lang-select" href="#googtrans(en|es)" data-lang="es" style="color: black; font-size: 15px; padding-bottom: 10px;">Espanol</a></li>
            <li><a class=" dropdown-item lang-select" href="#googtrans(en|hi)" data-lang="hi" style="color: black; font-size: 15px; padding-bottom: 10px;">	Hindi</a></li>
            <li><a class=" dropdown-item lang-select" href="#googtrans(en|pt)" data-lang="pt" style="color: black; font-size: 15px; padding-bottom: 10px;">	Portuguese</a></li>
            <li><a class=" dropdown-item lang-select" href="#googtrans(en|ko)" data-lang="ko" style="color: black; font-size: 15px; padding-bottom: 10px;">	Korean</a></li>
            <li><a class=" dropdown-item lang-select"  href="#googtrans(en|fr)" data-lang="fr" style="color: black; font-size: 15px; padding-bottom: 10px;">French</a> </li>
            <li><a class="dropdown-item lang-select" href="#googtrans(en|zh-CN)" data-lang="zh-CN" style="color: black; font-size: 15px; padding-bottom: 10px;">Chinese</a> </li>
            <li><a class=" dropdown-item lang-select" href="#googtrans(en|ru)" data-lang="ru" style="color: black; font-size: 15px; padding-bottom: 10px;">Russian</a> </li>
          </ul>
        </div>
        <li>
          <img src="assets/flag2.png" class="flag">
        </li>
        <button class="navbar-toggler collapsebtn" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 10px;
        margin-top: 10px;">
          <rect y="6" width="19" height="3" fill="#A0BD1C"/>
          <rect y="12" width="19" height="3" fill="#A0BD1C"/>
          <rect width="19" height="3" fill="#A0BD1C"/>
          </svg>
          
          <!-- <span class="navbar-toggler-icon"></span> -->
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link nav link home" href="/">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link link services" href="SBForm"> Services</a>
            </li>
            <li class=" nav-item">
              <a class="nav-link link home" href="leaders">Leadership</a>
            </li>

            <li class=" nav-item">
              <a class="nav-link link contact" href="about">About Us</a>
            </li>
            
        
            <li class="nav-item apply ml-118">
              <a href="./SBForm" class="btn button btn-outline-light appbtn" type="button">Apply</a>
              <a href="./signin" class="btn button2 sign" type="button">Sign In</a>
            </li>
          
          <li class=" nav-item dropdown lang">
            <a class="nav-link dropdown-toggle nav english" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"
              >
              <img src="assets/image_2022-02-27_16-21-31.png" width="17" style="margin-top:-4px;font-size: 14px;">&nbsp;<span class="langName">English |</span></a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item lang-select" href="#googtrans(en|ar)" data-lang="ar" style="color: black; font-size: 15px; padding-bottom: 10px;">Arabic </a></li>
              <li><a class="dropdown-item lang-select" href="#googtrans(en|bn)" data-lang="bn" style="color: black; font-size: 15px; padding-bottom: 10px;">Bengali (Bangla) </a></li>
              <li><a class="dropdown-item lang-select" href="#googtrans(en|zh-CN)" data-lang="zh-CN" style="color: black; font-size: 15px; padding-bottom: 10px;">Chinese</a> </li>
              <li><a class="dropdown-item lang-select" href="#googtrans(en|cs)" data-lang="cs" style="color: black; font-size: 15px; padding-bottom: 10px;">Czech</a> </li>
              <li><a class="dropdown-item lang-select" href="#googtrans(en|nl)" data-lang="nl" style="color: black; font-size: 15px; padding-bottom: 10px;"> Dutch</a> </li>
              <li><a class="dropdown-item lang-select" href="#googtrans(en|en)" data-lang="en" style="color: black; font-size: 15px; padding-bottom: 10px;">English </a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|es)" data-lang="es" style="color: black; font-size: 15px; padding-bottom: 10px;">Espanol</a></li>
              <li><a class=" dropdown-item lang-select"  href="#googtrans(en|fr)" data-lang="fr" style="color: black; font-size: 15px; padding-bottom: 10px;">French</a> </li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|de)" data-lang="de" style="color: black; font-size: 15px; padding-bottom: 10px;">	German</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|el)" data-lang="el" style="color: black; font-size: 15px; padding-bottom: 10px;">	Greek</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|hi)" data-lang="hi" style="color: black; font-size: 15px; padding-bottom: 10px;">	Hindi</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|hu)" data-lang="hu" style="color: black; font-size: 15px; padding-bottom: 10px;">	Hungarian</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|it)" data-lang="it" style="color: black; font-size: 15px; padding-bottom: 10px;">	Italian</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|ko)" data-lang="ja" style="color: black; font-size: 15px; padding-bottom: 10px;">	Japanese</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|ko)" data-lang="ko" style="color: black; font-size: 15px; padding-bottom: 10px;">	Korean</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|mr)" data-lang="mr" style="color: black; font-size: 15px; padding-bottom: 10px;">	Marathi</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|pl)" data-lang="pl" style="color: black; font-size: 15px; padding-bottom: 10px;">	Polish</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|pt)" data-lang="pt" style="color: black; font-size: 15px; padding-bottom: 10px;">	Portuguese</a></li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|ru)" data-lang="ru" style="color: black; font-size: 15px; padding-bottom: 10px;">Russian</a> </li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|ta)" data-lang="ta" style="color: black; font-size: 15px; padding-bottom: 10px;"> Tamil</a> </li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|te)" data-lang="te" style="color: black; font-size: 15px; padding-bottom: 10px;"> Telugu</a> </li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|tr)" data-lang="tr" style="color: black; font-size: 15px; padding-bottom: 10px;"> Turkish</a> </li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|ur)" data-lang="ur" style="color: black; font-size: 15px; padding-bottom: 10px;"> Urdu</a> </li>
              <li><a class=" dropdown-item lang-select" href="#googtrans(en|vi)" data-lang="vi" style="color: black; font-size: 15px; padding-bottom: 10px;"> Vietnamese</a> </li>
            </ul>
          </li>
          <li>
            <img src="assets/flag2.png" class="laptopflag">
          </li>
        </ul>
        </div>
      </div>
    </nav>
  </div>
</section>