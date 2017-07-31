<?php

  //############################### SESSION #############################
session_start();
require('../../basefunction/database_connection.php');
$USER_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"select * from user where USER_ID='$USER_ID'");
$row = mysqli_fetch_array($query);
$USER_FIRSTNAME = $row['USER_FIRSTNAME'];
$USER_LASTNAME = $row['USER_LASTNAME'];

if(!isset($_SESSION['session_id']) || empty($_SESSION['session_id'])) {
    header("location: ../../");
    exit();
  }
  if($_SESSION['session_access'] === "customer" || $_SESSION['session_access'] === "tacloban") {
    header("location: ../../");
    exit();
  }
  //############################### SESSION #############################

$ID = $_REQUEST['id'];
 $query ="select * from booking where BOOKING_ID='$ID'";
 $result = mysqli_query($link,$query);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Waybill</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

<style>

@media print{
  .x{border:none;}
  .not-print{display:none;}
  .t{margin-top: -32px;}

}   @page { margin: 0; }

</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
   <header class="main-header">
    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</b></span>
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
             <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="../message/" title="Message our admin now">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-danger"><span id="notif"></span></span>
              </a>
             
            </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">

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
                  <a href="../../basefunction/logout.php" class="btn btn-default btn-flat">Sign out</a>
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
    <img src="../dist/img/avatar5.png" class="img-rounded" alt="User Image">
        </div>
        <div class="pull-left info">
       <p> <?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
  <form action="../search" method="GET" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="waybill" class="form-control" placeholder="Search way bill number" required="">
          <span class="input-group-btn">
                <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
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
          <a href="../user/" title="All System Users">
            <i class="fa fa-users"></i> <span>System Users</span>
            <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
          <li>
          <a href="../employee/" title="All Employees">
            <i class="fa fa-user-md"></i> <span>Employees</span>
            <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
             <li class="header text-center"><font color="#b8c7ce" face="verdana"><strong>REPORTS</strong></font></li>
            <li class="treeview">
          <a href="#">
            <i class="fa fa-line-chart"></i> <span>All Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
          
             <li><a href="../reports/transaction_reports"><i class="fa fa-circle-o"></i> All Transactions Report</a></li>
               <li><a href="../reports/cancelled_reports"><i class="fa fa-circle-o"></i> All Cancelled Report</a></li>
          </ul>
        </li>
       
       
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
 Print Copy of Waybill
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">for-delivery</a></li>
        <li class="active">print waybill</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


    <!--END MODAL-->
      <div class="row">
        <div class="col-xs-12">
        

          <div class="box box-danger x">
           <div class="box-header with-border not-print">
          <h3 class="box-title pull-right" >
        <a type="button" onclick="print();" class="btn btn-success"><strong><span class="fa fa-print"></span>&nbsp;PRINT THIS</strong></a>
    
          </h3></div><br>
            <!-- /.box-header -->
            <div class="box-body"><div>
        
  <?php
  if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result)){
  $PICKUP_TRACKINGID = $row['BOOKING_BILLNUMBER'];
  $PICKUP_SENDER = $row['BOOKING_PSENDER'];
  $PICKUP_CONTACTNUMBER = $row['BOOKING_PCONTACTNUMBER'];
  $PICKUP_CITY = $row['BOOKING_PCITY'];
  $PICKUP_ADDRESS = $row['BOOKING_PADDRESS'];
  $PICKUP_LANDMARK = $row['BOOKING_PLANDMARK'];
  $CONSIGNEE_RECEIVER = $row['BOOKING_DCONSIGNEE'];
  $CONSIGNEE_CONTACTNUMBER = $row['BOOKING_DCONTACTNUMBER'];
  $CONSIGNEE_CITY = $row['BOOKING_DCITY'];
  $CONSIGNEE_ADDRESS = $row['BOOKING_DADDRESS'];
  $CONSIGNEE_LANDMARK = $row['BOOKING_DLANDMARK'];
    $PICKUP_ITEMTYPE = $row['BOOKING_TYPE'];
    $PICKUP_ITEMWEIGHT = $row['BOOKING_WEIGHT'];
    $PICKUP_ITEMSIZE = $row['BOOKING_SIZE'];
    $PICKUP_ITEMINFO = $row['BOOKING_REMARKS'];
    $PICKUP_ITEMPRICE = $row['BOOKING_PRICE'];

?>


<div class="row">
<div class="col-xs-6 col-md-offset-1 col-md-10 t" style="border:1px solid black; padding:6px;" >
    <table class="tab" border="1" width="100%" style="border:3px solid orange;">
    <tr>
  <td colspan="3" style="border-right:none;padding:5px;"><h4 style="color:orange;"><strong>Juan Delivery</strong></h4>
  <font style="font-size:9px;">A subsidiary of Z Solutions Trucking Corp.</font><br>
  <font style="font-size:9px;">Room 607 Pacific Centre Quintin Paredes St.,</font><br>
  <font style="font-size:9px;">Binondo Manila * www.juandelivery.com</font><br>
  <font style="font-size:9px;">www.zsolutionsph.com * Tel No: 242-6318</font>
  </td>
  <td colspan="4" rowspan="2"  style="border-left:none;" class="text-right"><img src="../dist/img/logo2.png" style="width:180px; height:100px;"/></td>
    </tr>
    <tr>
  <td colspan="3" style="padding:5px;"><strong>NO.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color:red !important;"><?php echo $PICKUP_TRACKINGID;?></font></strong></td>


    </tr>
    <tr>
  <td colspan="2" style="width:10%; padding:7px;font-size:10px;">Shipper:</td>
  <td colspan="4" style="border-right: 3px solid orange;"><center><font style="color:red !important;font-size:10px;"><?php echo $PICKUP_SENDER;?></font></center></td>

    </tr>
      <tr>
  <td colspan="2" style="width:10%; padding:7px;font-size:10px;">Address:</td>
  <td colspan="4" style="border-right: 3px solid orange;"><center><font style="color:red !important;font-size:10px;"><?php echo $PICKUP_CITY.' - '.$PICKUP_ADDRESS;?></font></center></td>


    </tr>
      <tr>
  <td colspan="2" style="width:10%; padding:7px;font-size:10px;">Contact:</td>
  <td colspan="4" style="border-right: 3px solid orange;"><center><font style="color:red !important;font-size:10px;"><?php echo $PICKUP_CONTACTNUMBER;?></font></center></td>


    </tr>
        <tr>
  <td colspan="2" style="width:10%; padding:7px;font-size:10px;">Consignee:</td>
  <td colspan="4" style="border-right: 3px solid orange;"><center><font style="color:red !important;font-size:10px;"><?php echo $CONSIGNEE_RECEIVER;?></font></center></td>


    </tr>
        <tr>
  <td colspan="2" style="width:10%; padding:7px;font-size:10px;">Address</td>
  <td colspan="4" style="border-right: 3px solid orange;"><center><font style="color:red !important;font-size:10px;"><?php echo $CONSIGNEE_CITY.' - '.$CONSIGNEE_ADDRESS;?></font></center></td>
  

    </tr>
        <tr>
  <td colspan="2" style="width:10%; padding:7px;font-size:10px;">Contact</td>
  <td colspan="4" style="border-right: 3px solid orange;"><center><font style="color:red !important;font-size:10px;"><?php echo $CONSIGNEE_CONTACTNUMBER;?></font></center></td>


    </tr>
        <tr>
  <td style="padding:5px;font-size:10px;" >Value</td>
  <td colspan="2" style="padding:5px;font-size:10px;" >Php <font style="color:red!important;"><?php echo $PICKUP_ITEMPRICE;?></font></td>
  <td style="width:10%; padding:5px;font-size:10px;" rowspan="2">Payment</td>
  <td class="text-center" colspan="2" rowspan="2" style="border-right: 3px solid orange;"><input type="checkbox" checked/>&nbsp;<font style="font-size:10px;">Cash</font><br>&nbsp;&nbsp;<input type="checkbox" />&nbsp;<font style="font-size:10px;">Check</font></td>

    </tr>
    <tr>
  
  <td style="padding:5px;font-size:10px;">Size</td>
  <?php if($PICKUP_ITEMSIZE == "L"){
    ?>
    <td colspan="2" style="padding:5px;"><input type="checkbox" checked/>&nbsp;<font style="font-size:10px;">Large</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"/>&nbsp;<font style="font-size:10px;">XL</font></td>
  
    <?php
    
  }else if($PICKUP_ITEMSIZE == "XL"){
    ?> <td colspan="2" style="padding:5px;"><input type="checkbox"/>&nbsp;<font style="font-size:10px;">Large</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" checked/>&nbsp;<font style="font-size:10px;">XL</font></td>
  <?php
    
  }else{
  ?><td colspan="2" style="padding:5px;"><input type="checkbox"/>&nbsp;<font style="font-size:10px;">Large</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"/>&nbsp;<font style="font-size:10px;">XL</font></td>
  <?php 
    
  }?>
  
  

    </tr>
    <tr>
  <td rowspan="2" style="padding:5px;font-size:10px;" >Weight</td>

  <td colspan="2" style="padding:5px;font-size:10px;" > Actual&nbsp 
  <?php if(!empty($PICKUP_ITEMWEIGHT)){
    ?>
    <font style="color:red !important;"><?php echo $PICKUP_ITEMWEIGHT; ?>&nbsp;Kg.</font>
    <?php
    
  }else{
  ?><font style="color:red !important;"><?php echo $PICKUP_ITEMWEIGHT; ?></font>
  <?php 
    
  }?>
  </td>
  <td style="padding:5px;font-size:10px;" >Amount</td>
  
  <td colspan="2" style="padding:5px;font-size:10px; border-right:solid 3px orange;">

  
  </td>

    </tr>
    <tr>

  <td colspan="2" style="padding:5px;font-size:10px;" >Chargable</td>
  
  <td style="padding:5px;font-size:10px;" >Remarks</td>
  <td colspan="2" style="border-right: 3px solid orange;"><center><font style="color:red !important;font-size:10px;"><?php echo $PICKUP_ITEMINFO;?></font></center></td>
  

    </tr>
  
      <tr>
  <td colspan="3"><br><center><font style="color:red !important;font-size:10px;"><br><br><?php echo $PICKUP_SENDER;?></font></center></td>
  <td colspan="3" style="padding-left:5px; border-right:3px solid orange;"><font style="font-size:11px;">I received the pouch in complete and good condition</font><br><br>
  <center><font style="color:red !important;font-size:10px;"><?php echo $CONSIGNEE_RECEIVER;?></font></center>
  </td>
  
    </tr>
      <tr>
  <td colspan="3" class="text-center" style="padding:5px; width:50%; font-size:10px;">Shipper's signature over printed name</td>
  <td colspan="3" class="text-center" style="padding:5px; width:50%; font-size:10px; border-right:solid 3px orange;">Consignee's signature over printed name</td>
  
    </tr>
    
    </table>
    
    </div>
    </div>
    


  
<?php

    } 
}else{
  ?><script>alert('There\'s No Data To Print');
  window.location = "index.php";
  </script><?php
  
}
  ?>

    


            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer not-print">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2016-2017 <a href="#" title="Developer">MJNP</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->

<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->

<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>


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
