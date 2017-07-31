<?php
require('../../../basefunction/database_connection.php');
  //############################### SESSION #############################
session_start();
$USER_ID = $_SESSION['session_id'];
if(!isset($_SESSION['session_id']) || empty($_SESSION['session_id'])) {
    header("location: ../../../");
    exit();
  }
  if($_SESSION['session_access'] === "customer" || $_SESSION['session_access'] === "admin") {
    header("location: ../../../");
    exit();
  }
  //############################### SESSION #############################
  if(!isset($_REQUEST['waybill']) || empty($_REQUEST['waybill'])){
    header('location:../');
  }
$query = mysqli_query($link,"select * from user inner join security ON user.USER_ID = security.USER_ID where user.USER_ID ='$USER_ID'");
if(mysqli_num_rows($query) > 0)
{
$row = mysqli_fetch_array($query);
$USER_FIRSTNAME = $row['USER_FIRSTNAME'];
$USER_LASTNAME = $row['USER_LASTNAME'];
$USER_CONTACTNUMBER = $row['USER_CONTACTNUMBER'];
$USER_EMAIL = $row['USER_EMAIL'];
$USER_USERNAME = $row['SECURITY_USERNAME'];
}
$WAYBILL = $_REQUEST['waybill'];
$query2 = mysqli_query($link,"select * from booking where BOOKING_BILLNUMBER='$WAYBILL' and BOOKING_BRANCH='Tacloban'");
if(mysqli_num_rows($query2) > 0){
$row2 = mysqli_fetch_array($query2);
$BOOKING_BILLNUMBER = $row2['BOOKING_BILLNUMBER'];
$BOOKING_STATUS = $row2['BOOKING_STATUS'];
$BOOKING_PSENDER = $row2['BOOKING_PSENDER'];
$BOOKING_PCONTACTNUMBER = $row2['BOOKING_PCONTACTNUMBER'];
$BOOKING_PCITY = $row2['BOOKING_PCITY'];
$BOOKING_PADDRESS = $row2['BOOKING_PADDRESS'];
$BOOKING_PLANDMARK = $row2['BOOKING_PLANDMARK'];
$BOOKING_DCONSIGNEE = $row2['BOOKING_DCONSIGNEE'];
$BOOKING_DCONTACTNUMBER = $row2['BOOKING_DCONTACTNUMBER'];
$BOOKING_DCITY = $row2['BOOKING_DCITY'];
$BOOKING_DADDRESS = $row2['BOOKING_DADDRESS'];
$BOOKING_DLANDMARK = $row2['BOOKING_DLANDMARK'];
$BOOKING_PAYMENT = $row2['BOOKING_PAYMENT'];
$BOOKING_DESCRIPTION = $row2['BOOKING_DESCRIPTION'];
$BOOKING_TYPE = $row2['BOOKING_TYPE'];
$BOOKING_SIZE = $row2['BOOKING_SIZE'];
$BOOKING_WEIGHT = $row2['BOOKING_WEIGHT'];
$BOOKING_INSURANCE = $row2['BOOKING_INSURANCE'];
$BOOKING_PRICE = $row2['BOOKING_PRICE'];
$BOOKING_REMARKS = $row2['BOOKING_REMARKS'];
$BOOKING_PDATE = $row2['BOOKING_PDATE'];
$BOOKING_PTIME = $row2['BOOKING_PTIME'];
$BOOKING_IDATE = $row2['BOOKING_IDATE'];
$BOOKING_ITIME = $row2['BOOKING_ITIME'];
$BOOKING_DDATE = $row2['BOOKING_DDATE'];
$BOOKING_DTIME = $row2['BOOKING_DTIME'];
$BOOKING_PBY = $row2['BOOKING_PBY'];
$BOOKING_RBY = $row2['BOOKING_RBY'];
$BOOKING_AMOUNTCOLLECTED = $row2['BOOKING_CODPAYMENT'];




}else{
  ?><script type="text/javascript"> alert('Sorry, that way bill number does\'nt exist');
window.location = "../";
  </script><?php
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Search</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
  <!-- datatables css -->
  <link rel="stylesheet" type="text/css" href="assests/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="../../ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- bootstrap css -->
  <!-- bootstrap css -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
   <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Tacloban</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
           
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                <?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?>
             
                </p>
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../../../basefunction/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
              <img src="../../dist/img/avatar5.png" class="img-rounded" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   <!-- search form -->
      <form action="../search" method="GET" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="waybill" class="form-control" placeholder="Search way bill number" required="">
          <span class="input-group-btn">
                <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
   <li class="header text-center"><font color="#b8c7ce" face="verdana"><strong>DATE and TIME</strong></font></li>
       <li><a  onclick="return false" href=""><i class="fa fa-calendar "></i><span>Calendar: </span><span id="websitedate"></span></a></li>
    <li><a onclick="return false" href=""><i class="fa fa-clock-o "></i><span>Time: </span> <span id="websitetime"></span></a></li>
 

        <li class="header text-center"><font color="#b8c7ce" face="verdana"><strong>MAIN NAVIGATION</strong></font></li>
        <li>
          <a href="../request/" title="All Request For Pickup">
            <i class="fa fa-bell-o"></i> <span>Pickup Request</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
         <li>
          <a href="../pickup/" title="Ready To Pickup">
            <i class="fa fa-spinner"></i> <span>For Pickup</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
         <li>
          <a href="../delivery/" title="Ready For Delivery">
            <i class="fa fa-spinner"></i> <span>For Delivery</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
          <li>
          <a href="../cancelled/" title="All Cancelled Items">
            <i class="fa fa-times"></i> <span>Cancelled Items</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red" id="cancelled">---</small>
            </span>
          </a>
        </li>
         <li>
          <a href="../transaction/" title="All Done Transactions">
            <i class="fa fa-check-square-o"></i> <span>Done Transactions</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
         <li class="header text-center"><font color="#b8c7ce" face="verdana"><strong>CMS</strong></font></li>
      
          <li>
          <a href="../employee/" title="All Employees">
            <i class="fa fa-user-md"></i> <span>Employees</span>
            <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
         
       
    </section>
    <!-- /.sidebar -->
  </aside>  <!-- Content Wrapper. Contains page content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
      <h1>
      Way Bill Number
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">admin</a></li>
        <li class="active">search</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
           <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                         <?php echo $BOOKING_BILLNUMBER;?>
                        </span>
                         <span class="bg-green">
                         STATUS : <?php echo strtoupper($BOOKING_STATUS);?>
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-blue"></i>

                    <div class="timeline-item">
                     

                      <h3 class="timeline-header"><a href="#">SHIPPER'S INFORMATION</a> </h3>

                      <div class="timeline-body">
                      Shipper Name : <?php echo strtoupper($BOOKING_PSENDER);?><br>
                      Contact Number : <?php echo strtoupper($BOOKING_PCONTACTNUMBER);?><br>
                      City : <?php echo strtoupper($BOOKING_PCITY);?><br>
                      Address : <?php echo strtoupper($BOOKING_PADDRESS);?><br>
                      Landmark : <?php echo strtoupper($BOOKING_PLANDMARK);?>
                      </div>
                   
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                   

                      <h3 class="timeline-header"><a href="#">CONSIGNEE'S INFORMATION</a>
                      </h3>
                       <div class="timeline-body">
                       Consignee Name : <?php echo strtoupper($BOOKING_DCONSIGNEE);?><br>
                      Contact Number : <?php echo strtoupper($BOOKING_DCONTACTNUMBER);?><br>
                      City : <?php echo strtoupper($BOOKING_DCITY);?><br>
                      Address : <?php echo strtoupper($BOOKING_DADDRESS);?><br>
                      Landmark : <?php echo strtoupper($BOOKING_DLANDMARK);?>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                   

                      <h3 class="timeline-header"><a href="#">ITEM INFORMATION</a> </h3>

                      <div class="timeline-body">
                      <div class="row">
                      <div class="col-md-6">
                     Mode of Payment : <?php echo strtoupper($BOOKING_PAYMENT);?><br>
                     Item Description : <?php echo strtoupper($BOOKING_DESCRIPTION);?><br>
                     Item Type : <?php echo strtoupper($BOOKING_TYPE);?><br>
                     Item Size : <?php echo strtoupper($BOOKING_SIZE);?><br>
                     Item Weight : <?php echo strtoupper($BOOKING_WEIGHT);?><br>
                     Insurance : <?php echo strtoupper($BOOKING_INSURANCE);?><br>
                     Price : <?php echo strtoupper($BOOKING_PRICE);?><br>
                     Remarks : <?php echo strtoupper($BOOKING_REMARKS);?><br>
                     </div>
                      <div class="col-md-6">
                 
                     Pickup Date and Time : <?php echo strtoupper($BOOKING_PDATE.' T '.$BOOKING_PTIME);?><br>
                     Pickup By : <?php echo strtoupper($BOOKING_PBY);?><br>
                     COD Payment : <?php echo strtoupper($BOOKING_AMOUNTCOLLECTED);?><br>
                     Intransit Date and Time : <?php echo strtoupper($BOOKING_IDATE.' T '.$BOOKING_ITIME);?><br>
                     
                     Date and Time Delivered : <?php echo strtoupper($BOOKING_DDATE.' T '.$BOOKING_DTIME);?><br>
                      Received By : <?php echo strtoupper($BOOKING_RBY);?><br>
                     </div>
                     </div>

                      </div>
                  
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
            
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
             
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-flag bg-gray"></i>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

      
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="#" title="Developer">MJNP</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->

<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>



  <script type="text/javascript" src="js/ajax.js"></script>
<!-- page script -->

<script type="text/javascript">
   var timeouts = setInterval(reloadChats, 1000);    
function reloadChats () {
 $('#notif').load('../php/notif.php');
 $('#cancelled').load('../php/cancelled.php');
 }
</script>
<script>
  var myVar=setInterval(function(){myTimer()},1000);
    function myTimer() {
      var d = new Date();
      document.getElementById("websitetime").innerHTML = d.toLocaleTimeString();
      document.getElementById("websitedate").innerHTML = d.toDateString();
    }
</script>
</body>
</html>
