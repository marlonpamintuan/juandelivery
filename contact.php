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
    <title>Juan Delivery - Contact Us</title>
  <link rel="icon" href="asset/img/logo2.png">
    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="asset/css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Flat Icon -->
    <link href="fonts/flaticon/flaticon.css" rel="stylesheet">
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
                <li class="active"><a href="contact.php">Contact</a></li>
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


<section class="single-page-title single-page-title-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Contact us</h2>
            </div>
        </div>
    </div>
</section>
<!-- .page-title -->
<!-- .page-title -->

              <section class="our-location">
                <div class="container">
                <div class="row">
                <div class="col-sm-8">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.0092744090025!2d120.97380886439655!3d14.598547339803757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca107e5d5d83%3A0x520f6aa40026099f!2sPacific+Centre%2C+Sabino+Padilla+St%2C+Binondo%2C+Manila%2C+Metro+Manila!5e0!3m2!1sen!2sph!4v1497768757305" width="100%" height="300" frameborder="0" style="border:0" class="img img-rounded"  allowfullscreen></iframe>
                </div>
                 <div class="col-sm-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m0!4v1497769569052!6m8!1m7!1sL6NHv_9tyEKPwOhXLQvhlw!2m2!1d14.59840323064318!2d120.9759752751673!3f336.10386479921215!4f-3.477947741273681!5f0.7820865974627469" class="img img-rounded" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                </div>
                  
                </div>
              </section>



              <section class="contact-detail gray-bg">
                <div class="container text-left">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="promo-block-wrapper clearfix">
                        <div class="promo-icon promo-icon-blue">
                          <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="promo-content">
                          <h3>OFFICE ADDRESS</h3>
                          <address>
                            Room 607 Pacific Center <br> 
                            Binondo Manila, Philippines
                          </address>
                        </div>
                      </div><!-- /.promo-block-wrapper -->
                    </div>

                    <div class="col-md-4">
                      <div class="promo-block-wrapper clearfix">
                        <div class="promo-icon promo-icon-blue">
                          <i class="fa fa-phone"></i>
                        </div>
                        <div class="promo-content">
                          <h3>PHONE NUMBER</h3>
                          <address>
                            <span title="Landline">Landline:</span> 242-6318, 711-3592<br>
                            <span title="Cellphone">Mobile:</span> 0999-708-8920
                          </address>
                        </div>
                      </div><!-- /.promo-block-wrapper -->
                    </div>

                    <div class="col-md-4">
                      <div class="promo-block-wrapper clearfix">
                        <div class="promo-icon promo-icon-blue">
                          <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="promo-content">
                          <h3>EMAIL ADDRESS</h3>
                          <address>
                            <a href="mailto:#">juandelivery.inquiry@gmail.com</a><br>
                            <a href="#">&nbsp;</a>
                          </address>
                        </div>
                      </div><!-- /.promo-block-wrapper -->
                    </div>
                  </div><!-- /.row -->
                </div>
              </section> <!-- contact-detail -->



              <section class="contact-section">
                <div class="container">
                  <div class="section-title text-center">
                    <h2>If you have any questions or comments,
                       please feel free to contact us</h2>
                  </div>

                  <div class="contact-form mt-50">
                    <form action="send.php" method="post">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="nameTwo" class="sr-only">Name</label>
                            <input type="text" class="form-control" name="name" required="" id="nameTwo" placeholder="Your Name">
                          </div>
                          
                          <div class="form-group">
                            <label for="emailTwo" class="sr-only">Email</label>
                            <input type="email" class="form-control" name="email" required="" id="emailTwo" placeholder="Email Address">
                          </div>

                          <div class="form-group">
                            <label for="emailTwo" class="sr-only">Subject</label>
                            <input type="text" class="form-control" name="subject" required="" id="emailTwo" placeholder="Subject">
                          </div>
                        </div> <!-- col-md-4 -->

                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="messageTwo" class="sr-only">Message</label>
                            <textarea class="form-control" required="" name="message" rows="7" placeholder="Write message"></textarea>
                          </div>
                        </div> <!-- col-md-8 -->
                      </div><!-- /.row-->

                      <button type="submit" class="btn btn-primary btn-lg pull-right"><strong>Send Message</strong></button>
                    </form>
                  </div> <!-- contact-form -->           
                </div>
              </section> <!-- contact-section -->


<footer class="footer">

    <!-- Footer Widget Section -->
 

    <div class="copyright-section">
        <div class="container clearfix">
             <span class="copytext">Copyright &copy; 2017 | MJNP</span>

            <ul class="list-inline pull-right">
                <li ><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="services.php">Rates and Services</a></li>
                <li class="active"><a href="contact.php">Contact</a></li>
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
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="asset/js/scripts.js"></script>
</body>
</html>