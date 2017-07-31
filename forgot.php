<?php
  //############################### SESSION #############################
session_start();
if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) {
    header("location: index.php");
    exit();
  }
  
  //############################### SESSION #############################
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Juan Delivery - Fogot Password</title>
  <link rel="icon" href="asset/img/logo2.png">
    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="asset/css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Flat Icon -->
    <link href="asset/fonts/flaticon/flaticon.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Style CSS -->
    <link href="asset/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="main-wrapper">

<!-- Page Preloader -->
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>

<div class="uc-mobile-menu-pusher">

<div class="content-wrapper">
<!-- Header Top -->
<div class="header-top visible-md visible-lg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <ul class="social-icon">
                <li><a><i class="fa fa-map-marker" aria-hidden="true"></i> Room 607 Pacific Centre, Binondo Manila Philippines
 </a></li>
    
                    
                </ul>
            </div>

            <div class="col-sm-12 col-md-8">
                <ul class="top-contact pull-right">
                    <li class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i> 242-6318</li>
                    <li class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i> 711-3592</li>
                    <li class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i>  0999-708-8920</li>
                    <li class="get-a-quote"><a href="online-tracker.php"> 
                    <strong><i class="fa fa-search"></i>&nbsp;ONLINE TRACKER</strong></a></li>
                </ul>
            </div>
        </div>
    </div>
</div> 
<!-- .navbar-top -->
<nav class="navbar m-menu navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="asset/img/aaa.png" alt=""/></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse" id="#navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-nav">
                <li ><a href="index.php">Home</a></li>
                <li ><a href="about.php">About</a></li>
                <li><a href="services.php">Rates and Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                 <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Branch <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="branch.php">Branch</a></li>
                            <li><a href="partner.php">Partner ni Juan</a></li>
                   
                    </ul>
                </li>
                             <?php
if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) 
{  ?>
                 <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Account <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="customer/account/">Profile</a></li>

  <li><a href="basefunction/logout.php">Logout</a></li>


                   
                    </ul>
                </li>
                <?php 
               }
                ?>
            </ul>

        </div>
        <!-- .navbar-collapse -->
    </div>
    <!-- .container -->
</nav>
<!-- .nav -->

<section class="single-page-title single-page-title-about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Forgot Password</h2>
            </div>
        </div>
    </div>
</section>
<!-- .page-title -->

<section class="about-text">
    <div class="container">
    <form method="POST" id="form">
    <div class="row">
    <div class="col-md-offset-3 col-md-6 col-md-offset-3">
    <div id="result"></div>  
    <div id='loadingmessage' style='display:none;' class="text-center">
        <img src='asset/img/loading.gif' style="width:12%;"/><br>
        </div>
    <div class="well" style="background: none; border:2px solid #337ab7; padding-bottom:50px;">
    <div class="row">
    <div class="col-md-12 text-center" style="margin-bottom: 20px;">
    <span class="fa fa-envelope text-primary" style="font-size: 50px;"></span>
    </div>
    </div>
<div class="row">
<div class="col-md-12">
<input type="email" name="USER_EMAIL" id="USER_EMAIL" placeholder="Email Address" title="Your email address" class="form-control" style="font-size:18px;color:#2d2d2d; border:1px solid #c3c3c3; border-radius: 5px;" required="" />
</div>
</div>
<br>
<div class="row">
<div class="col-xs-12">
<button type="submit" class="btn-info btn btn-block" title="Sign In to Book Online"><strong><span class="fa fa-question-circle"></span>&nbsp;RETRIEVE PASSWORD</strong></button>
</div>
</div>

    </div>
    </div>
    </div>
    </form>
       
    </div>

</section>
<!-- .about-text-->
<br>

<footer class="footer">

    <!-- Footer Widget Section -->
 

    <div class="copyright-section">
        <div class="container clearfix">
             <span class="copytext">Copyright &copy; 2017 | MJNP</span>

            <ul class="list-inline pull-right">
                <li ><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Rates and Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="branch.php">Branch</a></li>
                <li><a href="partner.php">Partner ni Juan</a></li>
                           <?php
if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) 
{
   ?>
<li><a href="customer/account">Profile</a></li>
    <li><a href="basefunction/logout.php">Logout</a></li><?php 
}
?>
            </ul>
        </div><!-- .container -->

    </div><!-- .copyright-section -->
</footer>
<!-- .footer -->

</div>
<!-- .content-wrapper -->
</div>
<!-- .uc-mobile-menu-pusher -->

<div class="uc-mobile-menu uc-mobile-menu-effect">
    <button type="button" class="close" aria-hidden="true" data-toggle="offcanvas"
            id="uc-mobile-menu-close-btn">&times;</button>
    <div>
        <div>
            <ul id="menu">
                 <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Rates and Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="branch.php">Branch</a></li>
                <li><a href="partner.php">Partner ni Juan</a></li>
                      <?php
if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) 
{
   ?> 
   <li><a href="customer/account">Profile</a></li>
   <li><a href="basefunction/logout.php">Logout</a></li>

   <?php 
}
?>
            </ul>
        </div>
    </div>
</div>
<!-- .uc-mobile-menu -->
</div>
<!-- #main-wrapper -->


<!-- Script -->
<script src="asset/js/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="asset/js/smoothscroll.js"></script>
<script src="asset/js/mobile-menu.js"></script>
<script src="asset/js/scripts.js"></script>
<script src="js/forgot.js"></script>
</body>
</html>