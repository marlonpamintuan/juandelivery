<?php
require('../basefunction/database_connection.php');
require('../basefunction/session_start.php');
$SESSION_ID = $_SESSION['session_id'];
  //############################### SESSION #############################
if(!isset($_SESSION['session_id']) || empty($_SESSION['session_id'])) {
    header("location: ../");
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
    <title>Juan Delivery - Online Booking</title>
  <link rel="icon" href="asset/img/logo2.png">
    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="../asset/css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">    
    <!-- Flat Icon -->
    <link href="../asset/fonts/flaticon/flaticon.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Style CSS -->
    <link href="../asset/css/style.css" rel="stylesheet">   
     <link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />


<link rel="stylesheet" href="../asset/css/jquery-ui.css">
<script src="../asset/js/jquery-2.1.4.min.js"></script>
<script src="../asset/js/jquery-ui.js"></script>
<!--     Fonts and icons     -->  
  <script src="../asset/js/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../asset/css/sweetalert.css">
  <script>
  $(function() {
    $( "#BOOKING_PCITY" ).autocomplete({
      source: 'php/pcity.php'
    });
      $( "#BOOKING_DCITY" ).autocomplete({
      source: 'php/dcity.php'
    });
      $( "#BOOKING_PSENDER" ).autocomplete({
      source: 'php/psender.php'
    });
      $( "#BOOKING_DCONSIGNEE" ).autocomplete({
      source: 'php/dconsignee.php'
    });
      $( "#BOOKING_PCONTACTNUMBER" ).autocomplete({
      source: 'php/pcontact.php'
    });
      $( "#BOOKING_DCONTACTNUMBER" ).autocomplete({
      source: 'php/dcontact.php'
    });
      $( "#BOOKING_PADDRESS" ).autocomplete({
      source: 'php/paddress.php'
    });
         $( "#BOOKING_DADDRESS" ).autocomplete({
      source: 'php/daddress.php'
    });
       $( "#BOOKING_PLANDMARK" ).autocomplete({
      source: 'php/plandmark.php'
    });
      $( "#BOOKING_DLANDMARK" ).autocomplete({
      source: 'php/dlandmark.php'
    });
  });
  </script>

</head>
<body >


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
                    <li class="get-a-quote"><a href="../online-tracker.php"> 
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
            <a class="navbar-brand" href="../index.php"><img src="../asset/img/aaa.png" alt=""/></a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse" id="#navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right main-nav">
                <li ><a href="../index.php">Home</a></li>
                <li ><a href="../about.php">About</a></li>
                <li><a href="../services.php">Rates and Services</a></li>
                <li><a href="../contact.php">Contact</a></li>
                 <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Branch <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="../branch.php">Branch</a></li>
                            <li><a href="../partner.php">Partner ni Juan</a></li>
                   
                    </ul>
                </li>
                             <?php
if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) 
{  ?>
                 <li class="dropdown dropdown-toggle"><a href="#" data-toggle="dropdown">Account <span><i class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="../customer/account/">Profile</a></li>

  <li><a href="../basefunction/logout.php">Logout</a></li>


                   
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
<!-- .nav -->


<section class="single-page-title single-page-title-about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Online Booking</h2>
            </div>
        </div>
    </div>
</section>
<!-- .page-title -->

<section class="about-text">
    <div class="container">

            
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2" >

            <!--      Wizard container        -->
            <div class="wizard-container" >

                <div class="card wizard-card" data-color="orange" id="wizardProfile" >
                    <form method="POST" id="form">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                        <div class="wizard-header">
                            <h3>
                               <b> ONLINE BOOKING </b><br>
                               <small>This information will let us know more about the transaction.</small>
                            </h3>
                        </div>

                        <div class="wizard-navigation">
                            <ul>
                                <li ><a href="#abouts" data-toggle="tab">Pickup point</a></li>
                                <li><a href="#account" data-toggle="tab">Destination Point</a></li>
                                <li><a href="#address" data-toggle="tab">Shipping Details</a></li>
                              <li><a href="#checking" data-toggle="tab">Checking</a></li>
                            </ul>

                        </div>

                        <div class="tab-content">
                            <div class="tab-pane" id="abouts">
                              <div class="row">
                          
                                  <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Sender Name <small>(required)</small></label>

                                         <input id="BOOKING_PSENDER" onchange="myFunction()" name="BOOKING_PSENDER" type="text" class="form-control" placeholder="Sender Full Name">
                                       
                                       
                                     
                                      </div>
                                      </div>
                                       <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Contact Number <small>(required)</small></label>
                                        <input  name="BOOKING_PCONTACTNUMBER" id="BOOKING_PCONTACTNUMBER" onchange="myFunction()" type="number" class="form-control" placeholder="Contact Number">
                                     
                                      </div>
                                  </div>
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>City <small>(required)</small></label>
                                        <input id="BOOKING_PCITY" name="BOOKING_PCITY" type="text" class="form-control city" placeholder="City">
                                   
                                      </div>
                                  </div>
                             <!--
                                     <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Email <small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="andrew@creative-tim.com">
                                      </div>
                                  </div>
                                 -->
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      <label>Address <small>(required)</small></label>
                                       <input onchange="myFunction()" name="BOOKING_PADDRESS" type="text" class="form-control" id="BOOKING_PADDRESS" placeholder="Sender Full Address">
                                      
                                 
                                  </div>
                                </div>
                              </div>
                                 <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      <label>Nearest Landmark <small>(required)</small></label>
                                        <input id="BOOKING_PLANDMARK" name="BOOKING_PLANDMARK" type="text" class="form-control" placeholder="Nearest Landmark to Pickup Point">
                                       
                               
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="account">
                                  <div class="row">
                          
                                  <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Consignee Name <small>(required)</small></label>
                                            <input  name="BOOKING_DCONSIGNEE" type="text" class="form-control" placeholder="Consignee Full Name" id="BOOKING_DCONSIGNEE" onchange="myFunction()">
                                     
                                     
                                      </div>
                                      </div>
                                       <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>Contact Number <small>(required)</small></label>
                                        
                                        <input name="BOOKING_DCONTACTNUMBER" type="number" class="form-control" placeholder="Contact Number" id="BOOKING_DCONTACTNUMBER" onchange="myFunction()">
                                        
                                      </div>
                                  </div>
                                      <div class="col-sm-4">
                                      <div class="form-group">
                                        <label>City <small>(required)</small></label>
                                         <input  name="BOOKING_DCITY" id="BOOKING_DCITY" type="text" class="form-control" placeholder="City">
                                       
                                     
                                      </div>
                                  </div>
                             <!--
                                     <div class="col-sm-4">
                                      <div class="form-group">
                                          <label>Email <small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="andrew@creative-tim.com">
                                      </div>
                                  </div>
                                 -->
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      <label>Address <small>(required)</small></label>
                                      <input name="BOOKING_DADDRESS" type="text" class="form-control" placeholder="Consignee Full Address" id="BOOKING_DADDRESS" onchange="myFunction()">
                                       
                                  </div>
                                </div>
                              </div>
                                 <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      <label>Nearest Landmark <small>(required)</small></label>
                                             <input name="BOOKING_DLANDMARK" type="text" class="form-control" id="BOOKING_DLANDMARK" placeholder="Nearest Landmark to Destination Point">
                                     
                                
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                  <div class="col-sm-8">
                                  <div class="form-group">
                                      <label>Apply Insurance <small>(it can affect the pricing)</small></label>
                                   
                                      <select class="form-control" id="insurance" onchange ="myFunction()" required="" data-toggle="wizard-radio" rel="tooltip" name="BOOKING_INSURANCE" title="Our default insurance is Php 2,000.00">
                                        <option label="-- Select Your Choice --"></option>
                                        <option value="yes">Yes, I want to apply insurance in my item</option>
                                        <option value="no">No, I dont want to apply insurance in my item</option>
                                      </select>
                                  </div>
                                </div>
                                   <div class="col-sm-4">
                                  <div class="form-group">
                                      <label>Payment <small>(it can affect the pricing)</small></label>
                                   
                                      <select class="form-control" id="payment" onchange ="myFunction()" required="" data-toggle="wizard-radio" rel="tooltip" name="BOOKING_PAYMENT" title="There is an additional P45.00 php / per waybill Metro Manila COD Charge (NO COD OUTSIDE METRO MANILA)">
                                        <option label="-- Mode of Payment --"></option>
                                        <option value="COP">Cash On Pickup (COP)</option>
                                        <option value="COD">Cash On Delivery (COD)</option>
                                      </select>
                                  </div>
                                </div>
                                    
                                    
                                </div>
                                 <div class="row">
                                  <div class="col-sm-4">
                                  <div class="form-group">
                                      <label>Shipment Type <small>(required)</small></label>
                                   
                                      <select class="form-control" name="BOOKING_TYPE" id="type" onchange ="myFunction()" required="" >
                                        <option label="-- Option --"></option>
                                        <option value="document">Document / Parcel</option>
                                        <option value="own-packaging">Own Packaging</option>
                                        <option value="dedicated">Dedicated</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                      <label>Weight <small>(own packaging only)</small></label>
                           
                                      <input name="BOOKING_WEIGHT" id="weight" onchange ="myFunction()" min=".1" value="" type="number" class="form-control" placeholder="">
                                 
                                  </div>
                                </div>
                                  <div class="col-sm-4">
                                  <div class="form-group">
                                      <label>Size <small>(document only)</small></label>
                                   
                                      <select class="form-control" name="BOOKING_SIZE" id="size" onchange ="myFunction()">
                                        <option label="-- Option --"></option>
                                        <option value="L">Large (L)</option>
                                        <option value="XL">Extra Large (XL)</option>
                                     
                                      </select>
                                  </div>
                                </div>
                                    
                                </div>
                                  <div class="row">
                                  <div class="col-sm-4">
                                   <div class="form-group">
                                      <label>Declared Value <small>(required)</small></label>
                           
                                      <input name="BOOKING_DECLAREDVALUE" onchange ="myFunction()" id="declared" type="number" class="form-control" placeholder="" required="" data-toggle="wizard-radio" rel="tooltip" title="State the price of your item">
                                 
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <div class="form-group">
                                      <label>Quantity <small>(required)</small></label>
                           
                                      <input name="BOOKING_QUANTITY" onchange ="myFunction()" type="number" id="quantity" value="1" min="1" class="form-control" placeholder="" required=""> 
                                 
                                  </div>
                                </div>
                                  <div class="col-sm-4">
                                  <div class="form-group">
                                      <label>Special Remarks <small>(required)</small></label>
                                   
                                      <input name="BOOKING_REMARKS" onchange ="myFunction()" type="text" id="remarks" data-toggle="wizard-radio" rel="tooltip" title="Pickup date / Delivery date / Item description or anything you want to say" class="form-control" placeholder="" required="">
                                  </div>
                                </div>
                                    
                                </div>
                                <div class="row">
                                <div class="col-sm-12 pull-right">
                                <input type="checkbox" id="check" onchange ="myFunction()">  <label>Check this if pickup address is outside Metro Manila <small>(this will affect the pricing)</small></label>
                                </div>
                                <input type="hidden" name="BOOKING_PRICE" id="total_price"/>
                                </div>
                              
                            </div>
                              <div class="tab-pane" id="checking">
                              <div class="row">
                              <div class="col-sm-12">
                              <div id="result"></div>
                                       <!--################# PICKUP###############-->
                                <table class="" bordercolor="#dddddd" border="1" width="100%"  >
                                <tR>
                                <td class="bg-primary" style="width:30%; padding: 4px;">Shipper's Name</td>
                                  <td class="bg-primary"style="width:30%; padding: 4px;">Contact Number</td>
                                <td class="bg-primary" style="width:40%; padding: 4px;">Address</td>
                                <tr>
                                  <tR>
                                <td style="width:30%; padding: 4px;"><span id="shipper_result"></span></td>
                                  <td style="width:30%; padding: 4px;"><span id="pcontact_result"></span></td>
                                <td style="width:40%; padding: 4px;"><span id="paddress_result"></span></td>
                                <tr>
                                </table><br>
                                         <!--################# PICKUP ###############-->
                               <!--################# CONSIGNEE ###############-->
                                 <table class="" bordercolor="#dddddd" border="1" width="100%"  >
                                <tR>
                                <td class="bg-primary" style="width:30%; padding: 4px;">Consignee's Name</td>
                                  <td class="bg-primary" style="width:30%; padding: 4px;">Contact Number</td>
                                <td class="bg-primary" style="width:40%; padding: 4px;">Address</td>
                                <tr>
                                  <tR>
                                <td style="width:30%; padding: 4px;"><span id="consignee_result"></span></td>
                                  <td style="width:30%; padding: 4px;"><span id="dcontact_result"></span></td>
                                <td style="width:40%; padding: 4px;"><span id="daddress_result"></span></td>
                                <tr>
                                </table><br>
                                <!--################# CONSIGNEE ###############-->
                                   <!--################# CONSIGNEE ###############-->
                                 <table class="" bordercolor="#dddddd" border="1" width="100%"  >
                                <tR>
                                <td class="bg-primary" style="width:30%; padding: 4px;">Declared Value</td>
                                  <td class="bg-primary" style="width:30%; padding: 4px;">Area</td>
                                <td class="bg-primary" style="width:40%; padding: 4px;">Special Remarks</td>
                                <tr>
                                  <tR>
                               <td style="width:30%; padding: 4px;"><span id="declared_result"></span></td>
                                    <td style="width:30%; padding: 4px;"><span id="check_result"></span></td>
                               <td style="width:40%; padding: 4px;"><span id="remarks_result"></span></td>
                                <tr>
                                </table><br>
                                <!--################# CONSIGNEE ###############-->
                                
                                <!--################# ITEM ###############-->
                                 <table class="" bordercolor="#dddddd" border="1" width="100%" >
                                <tR>
                                <td class="bg-primary" style="width:30%; padding: 4px;">Type</td>

                                 <td class="bg-primary" style="width:15%; padding: 4px;">Size</td>
                                  <td class="bg-primary" style="width:15%; padding: 4px;">Payment</td>
                                <td class="bg-primary" style="width:13%; padding: 4px;">Weight</td>
                                <td class="bg-primary" style="width:13%; padding: 4px;">Quantity</td>
                                     <td class="bg-primary" style="width:13%; padding: 4px;">Insurance</td>
                                <tr>
                                  <tR>
                               <td style="padding: 4px;"><span id="type_result"></span></td>
                                  <td style="padding: 4px;"><span id="size_result"></span></td>
                      <td style="padding: 4px;"><span id="payment_result"></span></td>
                  
                                    <td style=" padding: 4px;"><span id="weight_result"></span></td>
                                         <td style="padding: 4px;"><span id="quantity_result"></span></td>
                                          <td style="padding: 4px;"><span id="insurance_result"></span></td>
                                <tr>
                                </table><br>

                                <!--################# ITEM###############-->
                         
                               
                              
                                 <div class="alert alert-info"><strong>CALCULATED PRICE : <span id="total"></span></strong> </div>
                         
                            <span style="display:none;" id="ded"></span>
                       
                              </div>
                              </div>
                             
                             
                             
                             
                              </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' id="finish" value='Finish' disabled="" />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                <div id='loadingmessage' style='display:none;' class="text-center">
                <img src='../asset/img/loading.gif' style="width:12%;"/><br>
 
                </div>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
  <!--  big container -->

       
    </div>

</section>
<!-- .about-text-->




<footer class="footer">

    <!-- Footer Widget Section -->
 

    <div class="copyright-section">
        <div class="container clearfix">
             <span class="copytext">Copyright &copy; 2017 | MJNP</span>

            <ul class="list-inline pull-right">
                <li class="active"><a href="../index.php">Home</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="../services.php">Rates and Services</a></li>
                <li><a href="../contact.php">Contact</a></li>
                <li><a href="../branch.php">Branch</a></li>
                <li><a href="../partner.php">Partner ni Juan</a></li>
                           <?php
if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) 
{
   ?>
<li><a href="../customer/account">Profile</a></li>
    <li><a href="../basefunction/logout.php">Logout</a></li><?php 
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
                 <li><a href="../index.php">Home</a></li>
                <li><a href="../about.php">About</a></li>
                <li><a href="../services.php">Rates and Services</a></li>
                <li><a href="../contact.php">Contact</a></li>
                <li><a href="../branch.php">Branch</a></li>
                <li><a href="../partner.php">Partner ni Juan</a></li>
                      <?php
if(isset($_SESSION['session_id']) || !empty($_SESSION['session_id'])) 
{
   ?> 
   <li><a href="../customer/account">Profile</a></li>
   <li><a href="../basefunction/logout.php">Logout</a></li>

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



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="../asset/js/smoothscroll.js"></script>
<script src="../asset/js/mobile-menu.js"></script>
<script src="../asset/js/scripts.js"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <!--  Plugin for the Wizard -->

<script src="assets/js/gsdk-bootstrap-wizard.js"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<script src="assets/js/jquery.validate.min.js"></script>
<script src="js/booking_ajax.js"></script>
<script type="text/javascript">
function myFunction(){

  //DECLARATION
   var shipper = document.getElementById('BOOKING_PSENDER').value;
   var pcontact = document.getElementById('BOOKING_PCONTACTNUMBER').value;
   var paddress = document.getElementById('BOOKING_PADDRESS').value;
    var consignee = document.getElementById('BOOKING_DCONSIGNEE').value;
   var dcontact = document.getElementById('BOOKING_DCONTACTNUMBER').value;
   var daddress = document.getElementById('BOOKING_DADDRESS').value;
  var insurance = document.getElementById('insurance').value;
    var payment = document.getElementById('payment').value;
  var type = document.getElementById('type').value;
  var size = document.getElementById('size').value;
  var weight = document.getElementById('weight').value;
  var declared = document.getElementById('declared').value;
  var quantity = document.getElementById('quantity').value;
  var remarks = document.getElementById('remarks').value;
  var check = document.getElementById('check');
  //END OF DECLARTION
  document.getElementById('shipper_result').innerHTML = shipper;
    document.getElementById('pcontact_result').innerHTML = pcontact;
      document.getElementById('paddress_result').innerHTML = paddress;
        document.getElementById('consignee_result').innerHTML = consignee;
    document.getElementById('dcontact_result').innerHTML = dcontact;
      document.getElementById('daddress_result').innerHTML = daddress;
  document.getElementById('insurance_result').innerHTML = insurance;
  document.getElementById('payment_result').innerHTML = payment;
  document.getElementById('type_result').innerHTML = type;
  document.getElementById('size_result').innerHTML = size;
  document.getElementById('weight_result').innerHTML = weight;
  document.getElementById('declared_result').innerHTML = declared;
  document.getElementById('quantity_result').innerHTML = quantity;
  document.getElementById('remarks_result').innerHTML = remarks;
  //VALUE
  var weightprice = 0;
  var size_price = 0;
  var extend_weight = 25;
  var type_price = 0;
  var totals = 0;
  var insurance_price = 0;
  var payment_price = 0;
  var quant = 1;
  var province_rate = 0;
  //END VALUE
  //START
  if(check.checked){
      document.getElementById('check_result').innerHTML = "Provincial";

      document.getElementById("payment").value="";

  }else
  {
    document.getElementById('check_result').innerHTML = "Manila";
  
           
  }

  if(insurance === "yes")
  {
    if(declared > 2000)
    {
      declared -= 2000;
      insure = declared * .01;
      insurance_price +=insure;
    } 
    
  }
  else
  {
    insurance_price +=0;
    
  }
    if(payment === "COD")
  {
      payment_price += 45;
   
    
  }
  else
  {
    payment_price += 0;
    
  }
  //END
  //DISABLING
  if (type === "document") {
    document.getElementById("weight").disabled=true;
    document.getElementById("size").disabled=false;
    document.getElementById("weight").value ="";
    document.getElementById("size").required = true;
    document.getElementById("weight").required = false;
  }else if(type === "own-packaging"){
    document.getElementById("size").disabled=true;
    document.getElementById("weight").disabled=false;
    document.getElementById("size").value ="";
    document.getElementById("weight").required = true;
    document.getElementById("size").required = false;
  }else if(type === "dedicated"){
  
    document.getElementById("weight").disabled=true;
    document.getElementById("size").disabled=true;
    document.getElementById("weight").value ="";
    document.getElementById("size").value ="";
    document.getElementById("weight").required = false;
    document.getElementById("size").required = false;
  }
  //END DISABLING
  //SIZE
  if(size ==="L")
  {
    size_price += 65;
    province_rate += 40;
  }else if(size =="XL")
  {
    size_price += 85;
    province_rate += 90;
    
  }
  //END SIZE
  //WEIGHT
  if(weight <=1)
  {
  weightprice += 0;
  }
  else if(weight >= 1.1 && weight <= 3)
  {
  weightprice +=0;  
  }
  else if(weight > 3)
  {
  if(document.getElementById("check").checked)
  {
    var newprice = weight - 3;
    var getexcess = newprice * (extend_weight + 50); 
  weightprice += getexcess;
  }else
  {
    var newprice = weight - 3;
    var getexcess = newprice * extend_weight; 
  weightprice += getexcess;
    }
  }
  //END WEIGHT
  //ITEM TYPE
  //DOCUMENT
    if(type == "document")
    {
    document.getElementById("ded").innerHTML = "";
    if(document.getElementById("check").checked)
    {
    var temp = size_price + insurance_price + payment_price;
    document.getElementById("total").innerHTML = (temp + province_rate) * quantity;
    document.getElementById("total_price").value = (temp + province_rate) * quantity;
    }
    else
    {
    var temp = size_price + insurance_price + payment_price;
    document.getElementById("total").innerHTML = temp * quantity;
    document.getElementById("total_price").value = temp * quantity;
    }
    }
//END DOCUMENT
//OWN PACKAGING
  else if(type == "own-packaging")
  {
    document.getElementById("ded").innerHTML = "";
    if(weight <=1)
    {
    type_price = 65;
    province_rate +=40;
    }
    else if(weight >= 1.1 && weight <= 3)
    {
    type_price = 85;
    province_rate +=90; 
    }
    else
    {
    type_price = 85;
    province_rate +=90;
    }
    if(document.getElementById("check").checked)
    {
    var own = type_price + province_rate + weightprice + insurance_price + payment_price;
    document.getElementById("total").innerHTML = own * quantity;
    document.getElementById("total_price").value = own * quantity;
    }
    else
    {
    var own = type_price + weightprice + insurance_price + payment_price;
    document.getElementById("total").innerHTML = own * quantity;
    document.getElementById("total_price").value = own * quantity;
    }
  }
  //END OWN PACKAGING
  //DEDICATED
  else if(type == "dedicated")
  {
    if(check.checked)
    {
    type_price = 300;
    var ded = type_price + insurance_price + payment_price;
    var text = "Our admin will call you about the provincial rate for dedicated item";
    document.getElementById("total").innerHTML = ded * quantity + " " + "<font color='grey' size='1px'>(" + text + ")</font>";
    document.getElementById("total_price").value = ded * quantity;
    document.getElementById("ded").innerHTML = "Our admin will call you about the provincial rate for dedicated item";
    }
    else
    {
    document.getElementById("ded").innerHTML = ""; 
    type_price = 300;
    var ded = type_price + insurance_price + payment_price;
    document.getElementById("total").innerHTML = ded * quantity;
    document.getElementById("total_price").value = ded * quantity;
    }
  }
  //END DEDICATED
  //END ITEM TYPE
 
}
</script>
</body>
</html>