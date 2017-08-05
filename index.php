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
    <title>Juan Delivery - Homepage</title>
    <!-- web-fonts -->
    <link rel="icon" href="asset/img/logo2.png">
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

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="border:2px solid orange; background: whitesmoke;">
    
      <div class="modal-body">
        <h4 style="color:#272822; font-weight: 400;">ANNOUNCEMENT</h4>
        <hr>
        <h4> Welcome to our new Juan Delivery website. There are some changes in the system that will give better service to our dear customer. </h4>
        <p style="color:#272822;">
        <div class="container-fluid">
        <ul style="list-style-type: square;">
        <li>Experience new interface in booking</li>
        <li>Customers can cancel their request</li>
        <li>Customers can see the status of their transaction(s)</li>
        <li>Customers can see all of their transaction(s)</li>
        <li>Customers can now directly message our admin</li>
        </ul>    
        </div>
        </p>
      
        <strong>ADDITIONAL P 45/ WAYBILL FOR METRO MANILA COD CHARGE.</strong>
     
        <p style="color:#272822;">
        <br>
        Please be guided accordingly.  <br><br>
        JUAN DELIVERY MANAGEMENT

</p>

 <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fweb.facebook.com%2Fjuandeliveryph%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId" width="450" height="80" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
      </div>
  <div class="modal-footer" style="border-top: 1px solid #deb887;">
        <button type="button" class="btn btn-default" style="border:2px solid orange;" data-dismiss="modal">CLOSE</button>
      </div>
    </div>

  </div>
</div>
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
                <li class="active"><a href="index.php">Home</a></li>
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
<div id="my-carousel" class="carousel slide hero-slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#my-carousel" data-slide-to="1"></li>
        <li data-target="#my-carousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="asset/img/rizal.jpg" alt="Hero Slide" style="filter:brightness(75%);">

            <div class="carousel-caption">
       
                <h1 style="color:#f49a48; background: white; opacity: .7;"><strong>WELCOME TO JUAN DELIVERY</strong></h1>

                <p><strong>A FILIPINO STYLE COURIER</strong></p>
            </div>
        </div>
        <div class="item">
            <img src="asset/img/laptop.jpg" alt="...">

            <div class="carousel-caption">
                <h1 style="color:#f49237;"><strong>BOOK ONLINE</strong></h1>

                <p style="color:#4a595e; background: white; opacity: .6;"><strong>EASILY SCHEDULE PICK UP AND DELIVERY ONLINE
                </strong></p>
            </div>
        </div>
        <div class="item">
            <img src="asset/img/1.jpg" alt="..." style="filter:brightness(95%);">

            <div class="carousel-caption">
                <h1 style="color:#f49a48; background: white; opacity: .7;"><strong>FAST AND TRUSTED SERVICE</strong></h1>

                <p style="color:white; "><strong>PICK UP AND DELIVERY NATIONWIDE</strong></p>
            </div>
        </div>
    </div>
    
    <!-- Controls -->
    <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
<?php
if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) 
{
    ?>
        <a class="btn btn-info btn-block btn-flat" href="online-booking/"><strong>SCHEDULE A PICKUP &nbsp;<i class="fa fa-calendar-check-o" style="font-size:20px!important;"></i></strong></a>
    <?php
}
else
{
  ?>
    <a class="btn btn-info btn-block btn-flat" title="Please login to experience our online booking" href="login.php"><strong>LOGIN TO ACCESS ONLINE BOOKING &nbsp;<i class="fa fa-lock" style="font-size:20px!important;"></i></strong></a>
  <?php  
}
?>

 <a href="online-tracker.html" class="btn btn-danger btn-block btn-flat visible-xs visible-sm"><strong><i class="fa fa-search"></i>&nbsp;ONLINE TRACKER</strong></a>
<!-- #my-carousel-->



<section class="section-content-left-icon">
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="left-icon-wraper">
                    <div class="icon">
                        <i style="color: #f49237;"><strong>1<sup>st</sup> Step</strong></i>
                    </div>
                    
                    <div class="content">
                    <h2>Sender Info</h2>
                    <p>After you logged in, the first step is to fill-up the sender form for us to know all information about the shipper.
</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="left-icon-wraper">
                <div class="icon">
                 <i style="color: #f49237;"><strong>2<sup>nd</sup> Step</strong></i>
                </div>
                
                <div class="content">
                    <h2>Receiver Info</h2>
                    <p>Second step is to fill-up the consignee form for us to know all information about the consignee.</p>
                </div>
                    
                </div>
            </div>
            <div class="col-md-3">
                <div class="left-icon-wraper">
                <div class="icon">
            <i style="color: #f49237;"><strong>3<sup>rd</sup> Step</strong></i>
                </div>

                <div class="content">
                     <h2>Shipping Details</h2>
                    <p>Third step is to fill-up the shipping form. Tell us the details of the item you want us to pickup.</p>
                </div>
                   
                </div>
            </div>
            <div class="col-md-3">
                <div class="left-icon-wraper">
                <div class="icon">
                 <i style="color: #f49237;"><strong>4<sup>th</sup> Step</strong></i>
                </div>

                <div class="content">
                     <h2>You're All Set</h2>
                    <p>Final step is to review all the details and click finish then wait for our call for confirmation.</p>
                </div>
                   
                </div>
            </div>
        </div>
       
    </div>
    <!-- .container -->
</section>
<!-- /.services-left-icon -->

<section class="featured-box">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="featured-content-wrapper">
            <div class="row">
            <div class="col-md-6">
            <div class="featured-img">
               <iframe width="100%" height="350" src="https://www.youtube.com/embed/zTyBJATZlQ4" frameborder="0" allowfullscreen>
</iframe>
            </div>
            </div>
              <div class="col-md-6">
             <div class="featured-content">
             <br>
                <h1>We Improve Your Pickup and Delivery Experience</h1>
                <p>
                   By our new online booking system, you can now easily set and book a pickup and delivery transaction. Experience now our very affordable service, less-hassle pickup and delivery and update you always with your item.
                </p>
                <?php
                if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) 
                {
                    ?>  <a href="online-booking/" class="btn btn-default btn-lg">Schedule A Pickup</a><?php
                }else{
                    ?>   <a href="login.php" class="btn btn-default btn-lg">Sign In</a><?php
                }

                ?>
             
            </div>
            </div>
            </div>
            
          
            </div>
            </div>
        </div>
    </div>
</section>
<!-- /.featured-box -->

<section class="testimonial">
    <div class="container">
        <div id="testimonialSlider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#testimonialSlider" data-slide-to="0" class="active"></li>
          <li data-target="#testimonialSlider" data-slide-to="1"></li>
               <!--    <li data-target="#testimonialSlider" data-slide-to="2"></li>
            --></ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <blockquote>
                    
                        <p>I was skeptical at first kasi bago palang ang Juan Delivery. But thank God Mr. Capili introduced JD to me kaya lumipat na ko ngayon sa kanila. Cheapest Provincial rate na alam ko na nagseservice ng pickup sa select areas of Bulacan
                        </p>

                        <ul class="user-details">
                            <li class="avatar"><img src="asset/img/customer_image.jpg" class="img-responsive" alt=""/></li>
                            <li class="name">Anna Baldivas</li>
                            <li class="company">customer</li>
                        </ul>

                    </blockquote>
                </div>
                 <div class="item">
                    <blockquote>
                    
                        <p>so patient with customers and very interactive!
1st time cust. � and is satisfied
                        </p>

                        <ul class="user-details">
                            <li class="avatar"><img src="asset/img/customer_image2.jpg" class="img-responsive" alt=""/></li>
                            <li class="name">Tricia Louise</li>
                            <li class="company">customer</li>
                        </ul>

                    </blockquote>
                </div>
            
            </div>
        </div>
        <!-- #testimonialSlider -->
    </div>
</section>
<!-- /.testimonial -->

<section class="client-logo ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
            <div class="well" style="background: none;">
                <a href="http://quickbooksphl.com/" target="_blank" title="QBM IT Services"><img src="asset/img/1.png" style="width:100%; height:100px;" alt="Image"></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
             <div class="well" style="background: none;">
                <a href="http://zsolutionsph.com/" target="_blank" title="Z Solutions Trucking Corp"><img src="asset/img/2.png" style="width:100%; height:100px;" alt="Image"></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
             <div class="well" style="background: none;">
                <a  href="https://www.facebook.com/maricelonlinestore1/" target="_blank" title="Maricel Online Store"><img src="asset/img/3.png" style="width:100%; height:100px;" alt="Image"></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
             <div class="well" style="background: none;">
                <a href="http://cartj.com.ph" target="_blank" title="Cart J"><img src="asset/img/4.png" style="width:100%; height:100px;" alt="Image"></a>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
             <div class="well" style="background: none;">
                <a href="https://www.facebook.com/EmpresaPH/" target="_blank" title="Empresa Hermano"><img src="asset/img/5.png" style="width:100%; height:100px;" alt="Image"></a>
                </div>
            </div>
           <div class="col-md-2 col-sm-4 col-xs-6 section-margin">
             <div class="well" style="background: none;">
                <a href="https://shopee.ph/" target="_blank" title="Shopee"><img src="asset/img/6.jpg" style="width:100%; height:100px;" alt="Image"></a>
                </div>
            </div>
        </div>
    </div>
    <!--end of .container -->
</section>
<!-- /.client-logo -->


<footer class="footer">

    <!-- Footer Widget Section -->
 

    <div class="copyright-section">
        <div class="container clearfix">
             <span class="copytext">Copyright &copy; 2017 | MJNP</span>

            <ul class="list-inline pull-right">
                <li class="active"><a href="index.php">Home</a></li>
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

<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
   


<div/>
		<a style="font-size:0; height:0; width:0; opacity:0; position:absolute" target="_blank" href="http://www.uicookies.com">Bootstrap Templates by uiCookies</a>        
	</div>
</body>
</html>