<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Juan Delivery - About Us</title>
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
                <li class="active"><a href="about.php">About</a></li>
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
                <h2>About us</h2>
            </div>
        </div>
    </div>
</section>
<!-- .page-title -->

<section class="about-text">
    <div class="container">
   <div class="row">
   <div class="col-md-12">
   <h2>Let us introduce ourselves</h2>
   </div>
   </div>
        <div class="row">  
            <div class="col-md-12">
                <p><font size="5">"Juan Delivery"</font> is an expansion business and subsidiary of <a href="http://zsolutionsph.com/" title="Z Solutions PH" target="_blank"><strong>Z Solutions Trucking Corporation</strong></a> which focuses on courier services in order to penetrate the potential market of ever growing e-commerce industry such as online shopping. With overwhelming demands from various customers all over the country, Juan Delivery ventures in serving a fast-paced and dynamic market be it household shipper or corporate client. Juan delivery was conceptualized in 2016 and was launched late February 2017. With a stiff competition over numerous players in courier industry, the company took a research, made an environmental scanning and later on settled to assemble a team of couriers proudly Pinoy style.
                </p>


            </div>
          
        </div>
         <div class="row">  
           <div class="col-md-6">
          <img src="asset/img/tamad.jpg" class="img img-responsive img-rounded" title="Credits to the owner of this photo" style="height:340px;width:100%;"/>


            </div>
           <div class="col-md-6">
           <div class="row">
<div class="col-md-12">
<div class="well" style="background: none; border-left:5px solid #337ab7;">
 <h3>Mission</h3>
                <p>
               “To be the premier provider of couriering solutions all throughout the Philippines”
                </p>

            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <div class="well" style="background: none;border-left:5px solid #337ab7;">
            <h3>Vision</h3>
                <p>
                “We deliver excellence through complete, on-time and discrepancy-free couriering services towards our customers”
                </p>

           </div>
           </div>
           </div>
           

            </div>
</div>
    </div>

</section>
<!-- .about-text-->

<section class="about-text-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Excellence</h3>
                <div class="well text-center" style="background: #fcf9f4; border:none; ">
                <span style="font-size:100px; color:orange;" class="fa fa-lightbulb-o"></span>
                </div>
                <p class="">We serve and provide complete, on-time and discrepancy-free services.</p>
            </div>
            <div class="col-sm-4">
                <h3>Team Work</h3>
                <div class="well text-center" style="background: #fcf9f4; border:none; ">
                <span style="font-size:100px;" class="fa fa-users text-primary"></span>
                </div>
                <p class="">There is no I in Juan, but we are all one in achieving our goals.</p>
            </div>
            <div class="col-sm-4">
                <h3>Reliability</h3>
                <div class="well text-center" style="background: #fcf9f4; border:none; ">
                <span style="font-size:100px;" class="fa fa-check-circle-o text-success" aria-hidden="true"></span>
                </div>
                <p class="">You can always depend on us even if no one else does.</p>
            </div>
        </div><hR>
            <div class="row">
            <div class="col-sm-4">
                           <h3>Customer Driven</h3>
                              <div class="well text-center" style="background: #fcf9f4; border:none; ">
                <span style="font-size:100px;" class="fa fa-handshake-o text-danger" aria-hidden="true"></span>
                </div>

                <p class="">We value each customers as if a king or a queen. Your needs are our command.</p>
            </div>
            <div class="col-sm-4">
                <h3>Resourcefullness</h3>
                   <div class="well text-center" style="background: #fcf9f4; border:none; ">
                <span style="font-size:100px;" class="fa fa-eye" aria-hidden="true"></span>
                </div>

                <p class="">We always have the will and therefore, there will always be a way.</p>
            </div>
            <div class="col-sm-4">
                <h3>Innovation</h3>
                   <div class="well text-center" style="background: #fcf9f4; border:none; ">
                <span style="font-size:100px;" class="fa fa-refresh text-warning" aria-hidden="true"></span>
                </div>

                <p class="">We always challenge ourselves. We accept changes within ourselves. We will continue to change for the better and challenge to be the best.</p>
            </div>
        </div>
    </div>

</section>
<!-- .skills -->

<footer class="footer">

    <!-- Footer Widget Section -->
 

    <div class="copyright-section">
        <div class="container clearfix">
             <span class="copytext">Copyright &copy; 2017 | MJNP</span>

            <ul class="list-inline pull-right">
                <li ><a href="index.php">Home</a></li>
                <li class="active"><a href="about.php">About</a></li>
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
</body>
</html>