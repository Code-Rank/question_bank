<!DOCTYPE html>
<html lang="en">
    <head>
    

    <style>
body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}


.circle {
        border-radius: 50%;

        width: 15px;
        height: 15px;
        padding: 10px;
        background: #fff;
        border: 2px solid #000;
        color: #000;
        text-align: center;

        font: 15px Arial, sans-serif;
      }
.circle p{
    margin-top:-8px;
    margin-left:-5px;
}

.t1 table , td, th {
	border: 1px solid #595959;
	border-collapse: collapse;
    
}
.t1 table{
    margin-left:20px;
    
}
.t1 td, th {
	padding: 3px;
	width: 250px;
	height: 25px;
}
.t1 th {
	background: #f0e6cc;
     height: 25px;
}

.t2 table , td, th {
	border: 1px solid #595959;
	border-collapse: collapse;
    
}
.t2 table{
    margin-left:20px;
    
}
.t2 td, th {
	padding: 1px;
	width: 30px;
	height: 25px;
}
.t2 th {
	background: #f0e6cc;
     height: 25px;
}


.t3 table , td, th {
	border: 1px solid #595959;
	border-collapse: collapse;
   
    
}
.t3 table{
    margin-left:20px;
    width:94.5%;
    table-layout: fixed;

    
}
.t3 td{
    word-break: break-all;
}
.t4 table , td, th {
	border: 1px solid #595959;
	border-collapse: collapse;
   
    
}
.t4 table{
    margin-left:20px;
    width:94.5%;
    table-layout: fixed;

    
}
.t4 td{
    word-break: break-all;
}

.even {
	background: #fbf8f0;
}
.odd {
	background: #fefcf9;
}
.n1 p{
    
    border:1px solid black;
}
</style>
        
        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Required meta tags-->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="au theme template" />
        <meta name="author" content="Hau Nguyen" />
        <meta name="keywords" content="au theme template" />

        <!-- Title Page-->
        <title>@yield('title')</title>

        <!-- Fontfaces CSS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="{{asset('assets/css/font-face.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all" />

        <!-- Bootstrap CSS-->
        <link href="{{asset('assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all" />

        <!-- Vendor CSS-->
        <link href="{{asset('assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/slick/slick.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all" />
        <link href="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all" />

        <!-- Main CSS-->
        <link href="{{asset('assets/css/theme.css')}}" rel="stylesheet" media="all" />
    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="index.html">
                            <p style="font-size:17px;">ASIM SCIENCE ACADEMY</p>
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li class="@yield('select_Question')">
                                <a class="js-arrow" href="">
                                    <i class="fas fa-trophy"></i>Question
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li class="@yield('select_objective')">
                                        <a href="{{url('admin/question_objective')}}"> <i class="fas fa-table"></i>Objective type</a>
                                    </li>
                                    <li class="@yield('select_subjective')">
                                        <a href="{{url('admin/question_subjective')}}"> <i class="far fa-check-square"></i>subjective type</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="@yield('select_classes')">
                                <a href="{{url('admin/classes')}}"> <i class="fas fa-user"></i>classes </a>
                            </li>
                            <!-- <li class="@yield('select_group')">
                                <a href="{{url('admin/group')}}"> <i class="fas fa-user"></i>group </a>
                            </li> -->
                            <li class="@yield('select_chapter')">
                                <a href="{{url('admin/chapter')}}"> <i class="fas fa-user"></i>Book Chapter </a>
                            </li>
                            <li class="@yield('select_book')">
                                <a href="{{url('admin/book')}}"> <i class="fas fa-user"></i>Book  </a>
                            </li>
                            <li class="@yield('select_generator')">
                                <a href="{{url('admin/book')}}"> <i class="fas fa-user"></i>Generate test  </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                       <!--  <img src="{{asset('public/assets/images/logo.png')}}" alt="Cool Admin" /> -->
                       <p style="font-size:17px;">ASIM SCIENCE ACADEMY</p>
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li class="@yield('select_Question')">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-trophy"></i>Question
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li class="@yield('select_objective')">
                                        <a href="{{url('admin/question_objective')}}"> <i class="fas fa-table"></i>Objective type</a>
                                    </li>
                                    <li class="@yield('select_subjective')">
                                        <a href="{{url('admin/question_subjective')}}"> <i class="far fa-check-square"></i>subjective type</a>
                                    </li>
                                </ul>
                            </li>

                            <!--  <li class="@yield('select_Question')">
                        <a href="{{url('admin/question')}}">
                                <i class="fas fa-user"></i>Question
                            </a>
                        </li> -->

                            <li class="@yield('select_classes')">
                                <a href="{{url('admin/classes')}}"> <i class="fas fa-user"></i>class </a>
                            </li>
                            <!-- <li class="@yield('select_group')">
                                <a href="{{url('admin/group')}}"> <i class="fas fa-user"></i>group </a>
                            </li> -->
                            <li class="@yield('select_chapter')">
                                <a href="{{url('admin/chapter')}}"> <i class="fas fa-user"></i>Book Chapter </a>
                            </li>
                            <li class="@yield('select_book')">
                                <a href="{{url('admin/book')}}"> <i class="fas fa-user"></i>Book  </a>
                            </li>
                            <li class="@yield('select_generator')">
                                <a href="{{url('admin/generator')}}"> <i class="fas fa-user"></i>Generate test  </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                             <form class="form-header" action="" method="POST" style="visibility:hidden;">
                                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form> 
                                <div class="header-button">
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu" >
                                            <div class="image">
                                                <!-- <img src="" alt="John Doe" /> -->
                                                {{session('admin_mail')}}
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#"></a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image"></div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#"></a>
                                                        </h5>
                                                        <span class="email"></span>
                                                    </div>
                                                </div>
                                              <!--   <div class="account-dropdown__body">
                                                    <div class="account-dropdown__item">
                                                        <a href="#"> <i class="zmdi zmdi-account"></i>Account</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#"> <i class="zmdi zmdi-settings"></i>Setting</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="#"> <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                    </div>
                                                </div> -->
                                                <div class="account-dropdown__footer">
                                                    <a href="{{url('admin/logout')}}"> <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- END HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    @section('contain') @show
                </div>
                <!-- END PAGE CONTAINER-->
            </div>

            <!-- Jquery JS-->
            <script src="{{asset('assets/vendor/jquery-3.2.1.min.js')}}"></script>
            <!-- Bootstrap JS-->
            <script src="{{asset('assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
            <script src="{{asset('assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
            <!-- Vendor JS       -->
            <script src="{{asset('assets/vendor/slick/slick.min.js')}}"></script>
            <script src="{{asset('assets/vendor/wow/wow.min.js')}}"></script>
            <script src="{{asset('assets/vendor/animsition/animsition.min.js')}}"></script>
            <script src="{{asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
            <script src="{{asset('assets/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
            <script src="{{asset('assets/vendor/counter-up/jquery.counterup.min.js')}}"></script>
            -->
            <script src="{{asset('assets/vendor/circle-progress/circle-progress.min.js')}}"></script>
            <script src="{{asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
            <script src="{{asset('assets/vendor/chartjs/Chart.bundle.min.js')}}"></script>
            <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
            <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
            <!-- Main JS-->
            <script src="{{asset('assets/js/main.js')}}"></script>
            <!-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            

</body> -->
                      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        

            <!-- end document-->
        </div>
    </body>
</html>
