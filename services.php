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
    <title>Juan Delivery - Rates and Services</title>
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
                <li><a href="about.php">About</a></li>
                <li class="active"><a href="services.php">Rates and Services</a></li>
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

<section class="single-page-title single-page-title-services">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Rates and Services</h2>
            </div>
        </div>
    </div>
</section>
<!-- .page-title -->


<section class="section-content-left-icon">
    <div class="container">

    <a data-toggle="pill" href="#home" class="btn btn-success" title="Metro Manila Rate"><strong>METRO MANILA RATE</strong></a>
  <a data-toggle="pill" class="btn btn-success" href="#menu1" title="Provincial Rate"><strong>PROVINCIAL RATE</strong></a>
<a data-toggle="pill" class="btn btn-success" href="#menu2" title="Other Information"><strong>OTHER INFORMATION</strong></a>


<br><br>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <!--############################# M A N I L A ################################-->
    <div id="manila">
    <div class="row">
        <div class="col-md-4">
    <div class="well text-center" style="background: none;">
    <h2 style="color: #666666;"><strong>Documents / Parcel</strong></h2>
    <hr>
    <div class="well" style="background: #5bc0de; color:white;"><strong>Large ( L )</strong></div>
    <h3 style="border-bottom: 1px solid #e3e3e3;"><strong>P 65</strong>.<sup>00</sup></h3>
    <div class="well" style="background: #5bc0de; color:white;"><strong>Extra Large ( XL )</strong></div>
    <h3><strong>P 85</strong>.<sup>00</sup></h3>
    
    </div>
    </div>
      <div class="col-md-4">
    <div class="well text-center" style="background: none;">
    <h2 style="color: #666666;"><strong>Own-Packaging</strong></h2>
    <hr>
    <div class="well" style="background: #d9534f; color:white;"><strong>0 Kg - 1 Kg </strong></div>
    <h3 style="border-bottom: 1px solid #e3e3e3;"><strong>P 65</strong>.<sup>00</sup></h3>
    <div class="well" style="background: #d9534f; color:white;"><strong>1.1 Kg - 3 Kg</strong></div>
    <h3 style="border-bottom: 1px solid #e3e3e3;"><strong>P 85</strong>.<sup>00</sup></h3>
       <div class="well" style="background: #d9534f; color:white;"><strong>+ P 25.<sup>00</sup> per additional Kg</strong></div>
 
    </div>
    </div>
      <div class="col-md-4">
    <div class="well text-center" style="background: none;">
    <h2 style="color: #666666;"><strong>Dedicated</strong></h2>
    <hr>
    <div class="well" style="background: #5cb85c; color:white;"><strong>(BEST FOR URGENT TRANSACTION) </strong></div>
    <h3 ><strong>P 300</strong>.<sup>00</sup></h3>
 
 
 
    </div>
    </div>
    </div>
    </div>
    <!--############################# M A N I L A ################################-->
    </div>
    <div id="menu1" class="tab-pane fade">
         <!--############################# P R O V I N C E ################################-->

      <div id="province">
    <div class="row">
    <div class="col-md-4">
    <div class="well text-center" style="background: none;">
    <h2 style="color: #666666;"><strong>Documents / Parcel</strong></h2>
    <hr>

        <div class="well" style="background: #8a6d3b; color:white;"><strong>Large ( L )</strong></div>
    <h3 style="border-bottom: 1px solid #e3e3e3;"><strong>P 105</strong>.<sup>00</sup></h3>
        <div class="well" style="background: #8a6d3b; color:white;"><strong>Extra Large ( XL )</strong></div>
    <h3 style="border-bottom: 1px solid #e3e3e3;"><strong>P 175</strong>.<sup>00</sup></h3>
    </div>
    </div>
      <div class="col-md-4">
    <div class="well text-center" style="background: none;">
    <h2 style="color: #666666;"><strong>Own-Packaging</strong></h2>
    <hr>
  
        <div class="well" style="background: #8a6d3b; color:white;"><strong>0 Kg - 1 Kg</strong></div>
    <h3 style="border-bottom: 1px solid #e3e3e3;"><strong>P 105</strong>.<sup>00</sup></h3>
        <div class="well" style="background: #8a6d3b; color:white;"><strong>1.1 Kg - 3 Kg</strong></div>
    <h3 style="border-bottom: 1px solid #e3e3e3;"><strong>P 175</strong>.<sup>00</sup></h3>
      <div class="well" style="background: #8a6d3b; color:white;"><strong>+ P 80.<sup>00</sup> per additional Kg</strong></div>
    </div>
    </div>
       <div class="col-md-4">
    <div class="well text-center" style="background: none;">
    <h2 style="color: #666666;"><strong>Dedicated</strong></h2>
    <hr>
    
        <div class="well" style="background: #8a6d3b; color:white;"><strong>(BEST FOR URGENT TRANSACTION)</strong></div>
    <h3 ><strong>CONTACT US FOR MORE INFO</strong></h3>
       
    </div>
    </div>
    </div>
    </div>
    </div>
   <div id="menu2" class="tab-pane fade">
    <div class="well" style="background: papayawhip; color:#444444;"><strong>WE OFFER OUR SERVICES NATIONWIDE</strong></div>
 <div class="well" style="background: #444444; color:#ffefd5;"><strong>ALL PACKAGES INCLUDE UP TO P2,000 FREE INSURANCE</strong></div>
     <div class="well" style="background: papayawhip; color:#444444;"><strong>RATES WILL BE BASED ON YOUR SHIPMENT'S DESTINATION REGARDLESS OF YOUR PICKUP LOCATION</strong></div>
         <div class="well" style="background: #444444; color:#ffefd5;"><strong>ADDITIONAL P45.00/ WAYBILL FOR METRO MANILA COD CHARGE</strong></div>
       
               <div class="panel-group" id="accordion">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="fa fa-file-text-o"></span>&nbsp;Documents / Parcels</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
        <ul style="margin-left:5px;">
        <li type="disc">Starts at Php 65.00 only per pouch or parcel (Large size). Provincial rate for large size is Php 105.00 only.</li>
        <li type="disc">Starts at Php 85.00 only per pouch or parcel (Extra-Large size). Provincial rate for extra-large size is Php 175.00 only.</li>
        <li type="disc">Reservation must be made prior 1PM and can be pickup the same day.</li>
        <li type="disc">If reservation meets the 1pm cut-off, it will be pickup the following day.</li>
        <li type="disc">Pouch or parcel will be delivered the following day of pickup no longer than 5PM.</li>
        <li type="disc">Pick-up and delivery services are within Luzon area only.</li>
        </ul>
        </div>
      </div>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="fa fa-archive"></span>&nbsp;Own-Packaging</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        <ul style="margin-left:5px;">
        <li type="disc">Starts at Php 65.00 only per package range from 0kg. to 1kg. Provincial rate for 0kg to 1kg is Php 105.00 only.</li>
        <li type="disc">Starts at Php 85.00 only per package range from 1.1kg. to 3kg. Provincial rate for 1.1kg to 3kg. is Php 175.00 only.</li>
        <li type="disc">Additional of Php 25.00 per kg in excess of 3 Kgs. Example, if your package is 4kg the price is Php 110.00. Additional price for provincial rate is Php 75.00 only.</li>
        <li type="disc">Reservation must be made prior 1PM and can be pickup the same day.</li>
        <li type="disc">If reservation meets the 1pm cut-off, it will be pickup the following day.</li>
        <li type="disc">Package will be delivered the following day no longer than 5PM.</li>
        <li type="disc">Pick-up and delivery services are within Luzon area only.</li>
        </ul>
        </div>
      </div>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="fa fa-bell-o"></span>&nbsp;Dedicated</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
            <ul style="margin-left:5px;">
        <li type="disc">Starts at Php 300.00 only. Call us for provincial rate.</li>
        <li type="disc">Reservation must be made prior 1PM.</li>
        <li type="disc">Pouch or parcel will be delivered from 9AM to 5PM.</li>
        <li type="disc">Pick-up and delivery services are within Metro Manila only.</li>
        <li type="disc">Suitable for urgent business documents or items.</li>
        <li type="disc">Same day pick-up and delivery.</li>
        </ul>
        </div>
      </div>
    </div>
  </div> 
   </div>
  </div>
 
  <hr style="border-top: 2px solid #337ab7;">
  <br>
        <div class="row">
            <div class="col-md-4">
                <div class="left-icon-wraper">
                    <div class="icon">
                        <i class="fa fa-file"></i>
                    </div>
                    
                    <div class="content">
                    <h2>Documents</h2>
                    <p>We offer to you the shipment of documents/parcels . You can choose from our available sizes, large and extra-large.</p>
                    
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="left-icon-wraper">
                <div class="icon"><i class="fa fa-archive"></i></div>
                
                <div class="content">
                    <h2>Own-Packaging</h2>
                    <p>We offer to you the shipment of your own package. Price depends on the weights of the package.</p>
                </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="left-icon-wraper">
                <div class="icon"><i class="fa fa-exclamation-circle"></i></div>

                <div class="content">
                     <h2>Dedicated</h2>
                    <p>We offer to you dedicated type of item. Suitable for urgent business documents or items. Same day pickup and Delivery.</p>
                </div>
                   
                </div>
            </div>
        </div>
        
    </div>
    <!-- .container -->
</section>
<!-- /.services-left-icon -->



<section class="gray-bg">
    <div class="container">
      

    </div>


</section>
<!-- .about-text-->

<footer class="footer">

    <!-- Footer Widget Section -->
 

    <div class="copyright-section">
        <div class="container clearfix">
             <span class="copytext">Copyright &copy; 2017 | MJNP</span>

            <ul class="list-inline pull-right">
                <li ><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li class="active"><a href="services.php">Rates and Services</a></li>
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
<script src="asset/js/flexSlider/jquery.flexslider-min.js"></script>
<script src="asset/js/scripts.js"></script>
<script type="text/javascript">
 function change()
 {
    var choose = document.getElementById('choose').value;
    if(choose === "manila")
    {
    document.getElementById('manila').style.visibility = "visible";
     document.getElementById('province').style.visibility = "hidden";
    }
    else if(choose === "province")
    {
     document.getElementById('manila').style.visibility = "hidden";
     document.getElementById('province').style.visibility = "visible";
          
          document.getElementById('province').style="position:absolute; top:450px;";
    }
 }   

</script>
</body>
</html>