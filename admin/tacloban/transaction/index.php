<?php
  //############################### SESSION #############################
session_start();
require('../../../basefunction/database_connection.php');
$USER_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"select * from user where USER_ID='$USER_ID'");
$row = mysqli_fetch_array($query);
$USER_FIRSTNAME = $row['USER_FIRSTNAME'];
$USER_LASTNAME = $row['USER_LASTNAME'];

if(!isset($_SESSION['session_id']) || empty($_SESSION['session_id'])) {
    header("location: ../../../");
    exit();
  }
  if($_SESSION['session_access'] === "customer" || $_SESSION['session_access'] === "admin") {
    header("location: ../../../");
    exit();
  }
  //############################### SESSION #############################
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Transactions</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
  <!-- datatables css -->
  <link rel="stylesheet" type="text/css" href="assests/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="../../ionicons/css/ionicons.min.css">
      <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
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
<style>
th{
   white-space:nowrap;
}
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
   Transactions
        <small>All done transactions</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">transaction</a></li>
        <li class="active">trasaction list</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!--PRINT PER MODAL-->
    <div id="excel_per" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Exporting of data per date</h4>
      </div>
      <div class="modal-body">
      <form action="php_action/excel_per.php" method="POST">
             <div class="row">
            <div class="col-md-12">
            <div class="form-group">
                <label>Enter the date you want to export (<font color="green">Date based on the date customer requested a pickup</font>)</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="BOOKING_DATEEXCEL"  class="form-control pull-right" id="datepicker2" required/>
                </div>
                <!-- /.input group -->
              </div>
            </div>
           
            <!-- /.col -->
          </div>
          <div class="row">
          <div class="col-md-12 text-right">
          <input type="submit" value="Search" class="btn btn-success"/>
          </div>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
      <div class="row">
        <div class="col-xs-12">
        

          <div class="box box-danger">
           <div class="box-header with-border">
            <h3 class="box-title">
    
        <a class="btn btn-success btn-flat" href="php_action/excel.php"><strong><span class="fa fa-file-excel-o"></span>&nbsp;EXPORT TO EXCEL FILE</strong></a>
                <a class="btn btn-primary btn-flat" href="" data-toggle="modal" data-target="#excel_per"><strong><span class="fa fa-file-excel-o"></span>&nbsp;EXPORT TO EXCEL PER DATE</strong></a>
          </h3></div><br>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
      <div class="col-md-12">
        <div class="removeMessages"></div>
        <div class="cancelMessages"></div>
 <div class="pickupMessages"></div>
 <div class="doneMessages"></div>

  

        <table class="table table-hover table-striped table-condensed" id="manageMemberTable">          
          <thead>
            <tr>
             <th class="bg-primary"></th>
                   <th class="bg-primary">Waybill</th>
               <th class="bg-primary">Shipper's Name</th>          
              <th class="bg-primary">Contact Number</th>
              <th class="bg-primary">From</th>
              <th class="bg-primary">To</th>
              <th class="bg-primary">Item Type</th>
              <th class="bg-primary">Date</th>
          
             
            </tr>
          </thead>
        </table>
      </div>
    </div>
 

  <!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Member</h4>
        </div>
        <div class="modal-body">
          <p>Do you really want to remove ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="removeBtn">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="cancelModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Cancel Transaction</h4>
        </div>
        <div class="modal-body">
          <p>Do you really want to cancel this?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="cancelBtn">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /remove modal -->
    <!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="doneModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Member</h4>
        </div>
        <div class="modal-body">
          <p>Do you really want to remove ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="doneBtn">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /remove modal -->
  
  <!-- edit modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Data</h4>
        </div>

    <form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">       

    <div class="modal-body">
        <div class="edit-messages"></div>
          <ul class="nav nav-pills nav-justified">
          <li class="bg-warning active"><a data-toggle="pill" href="#home">Shipper's Information</a></li>
          <li class="bg-warning"><a data-toggle="pill" href="#menu1">Consignee's Information</a></li>
          <li class="bg-warning"><a data-toggle="pill" href="#menu2">Item Information</a></li>
              <li class="bg-warning"><a data-toggle="pill" href="#menu3">Pickup Information</a></li>
         </ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
 <br>
 <div class="row">
  <div class="col-sm-4"> 
  <label for="editName" class="control-label">Shipper's Name</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="Shipper's Name" id="BOOKING_PSENDER" name="BOOKING_PSENDER">
  </div>
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Contact Number</label>
        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
  <input type="number" class="form-control" placeholder="Contact Number" id="BOOKING_PCONTACTNUMBER" name="BOOKING_PCONTACTNUMBER">
  </div>
        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">City</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  <input type="text" class="form-control" placeholder="City" id="BOOKING_PCITY" name="BOOKING_PCITY">
  </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-12">
  <label for="editAddress" class="control-label">Address</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  <input type="text" class="form-control" placeholder="Address" id="BOOKING_PADDRESS" name="BOOKING_PADDRESS">
  </div>
          </div>
          </div>
          <br>
  <div class="row">
          <div class="col-sm-12">
          <label for="editContact" class="control-label">Landmark</label> 
             <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
  <input type="text" class="form-control" placeholder="Landmark" id="BOOKING_PLANDMARK" name="BOOKING_PLANDMARK">
  </div>
          </div>
          </div>
          <br>

  </div>
  <div id="menu1" class="tab-pane fade">
<br>
<div class="row">
  <div class="col-sm-4"> 
  <label for="editName" class="control-label">Consignee's Name</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="Consignee's Name" id="BOOKING_DCONSIGNEE" name="BOOKING_DCONSIGNEE">
  </div>
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Contact Number</label>
        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
  <input type="number" class="form-control" placeholder="Contact Number" id="BOOKING_DCONTACTNUMBER" name="BOOKING_DCONTACTNUMBER" >
  </div>
        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">City</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  <input type="text" class="form-control" placeholder="City" id="BOOKING_DCITY" name="BOOKING_DCITY">
  </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-12">
  <label for="editAddress" class="control-label">Address</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  <input type="text" class="form-control" placeholder="Address" id="BOOKING_DADDRESS" name="BOOKING_DADDRESS">
  </div>
          </div>
          </div>
          <br>
  <div class="row">
          <div class="col-sm-12">
          <label for="editContact" class="control-label">Landmark</label> 
             <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
  <input type="text" class="form-control" placeholder="Landmark" id="BOOKING_DLANDMARK" name="BOOKING_DLANDMARK">
  </div>
          </div>
          </div>
          <br>
          <br>
  </div>
  <div id="menu2" class="tab-pane fade">
   <br>
    <div class="row">
      <div class="col-sm-4"> 
      <label for="editName" class="control-label">Mode of Payment</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
 <select class="form-control" id="BOOKING_PAYMENT" name="BOOKING_PAYMENT">
  <option label="Choose Payment"></option> 
   <option value="COP">Cash on Pickup</option> 
   <option value="COD">Cash on Delivery</option> 

  </select>
  </div>

        <!-- here the text will apper  -->
  </div>
   <div class="col-sm-8"> 
      <label for="editName" class="control-label">Item Description</label>
          <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-info"></i></span>
  <input type="text" class="form-control" id="BOOKING_DESCRIPTION" name="BOOKING_DESCRIPTION" placeholder="Item Description">
  </div>
      </div>
    </div>
    <br>
 <div class="row">
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Item Type</label>
      <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-question"></i></span>
  <select class="form-control" id="BOOKING_TYPE" name="BOOKING_TYPE">
  <option label="Choose Type"></option> 
   <option value="document">Documents/Parcel</option> 
   <option value="own-packaging">Own-Packaging</option> 
   <option value="dedicated">Dedicated</option> 
 
  </select>
  </div>
      </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Item Weight (For Own-Packaging)</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
  <input type="number" class="form-control" id="BOOKING_WEIGHT" name="BOOKING_WEIGHT" placeholder="Item Weight">
  </div>

        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Item Size (For Documents)</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
  <select class="form-control" id="BOOKING_SIZE" name="BOOKING_SIZE">
    <option label="Choose Size"></option> 
   <option value="L">Large</option> 
   <option value="XL">Extra Large</option> 
  
 
  </select>
  </div>
  </div>
</div>

<br>
 <div class="row">
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Remarks</label>
          <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-info"></i></span>
  <input type="text" class="form-control" id="BOOKING_REMARKS" name="BOOKING_REMARKS" placeholder="Remarks">
  </div>
      </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Item Insurance</label>
           <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-question"></i></span>
  <input type="text" class="form-control" id="BOOKING_INSURANCE" name="BOOKING_INSURANCE" placeholder="">
  </div>
        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Item Price</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-money"></i></span>
  <input type="number" class="form-control" id="BOOKING_PRICE" name="BOOKING_PRICE" placeholder="Booking Price">
  </div>
        <!-- here the text will apper  -->
  </div>
</div>
<br>

          <br>

  </div>
   <div id="menu3" class="tab-pane fade">
<br>
<div class="row">
  <div class="col-sm-4"> 
  <label for="editName" class="control-label">Bill Number</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
  <input type="text" class="form-control" placeholder="Bill Number" id="BOOKING_BILLNUMBER" name="BOOKING_BILLNUMBER">
  </div>
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Pickup Date</label>
        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" class="form-control" placeholder="" id="BOOKING_PDATE" name="BOOKING_PDATE">
  </div>
        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Pickup Time</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-clock"></i></span>
  <input type="time" class="form-control" placeholder="Email" id="BOOKING_PTIME" name="BOOKING_PTIME">
  </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-4">
  <label for="editAddress" class="control-label">Pickup By</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="Pickup By" id="BOOKING_PBY" name="BOOKING_PBY">
  </div>
          </div>
          <div class="col-sm-4">
  <label for="editAddress" class="control-label">COD Payment</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-money"></i></span>
  <input type="number" class="form-control" placeholder="COD Payment" id="BOOKING_CODPAYMENT" name="BOOKING_CODPAYMENT">
  </div>
          </div>
          <div class="col-sm-4">
  <label for="editAddress" class="control-label">Delivery Date</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" class="form-control" placeholder="" id="BOOKING_DELIVERYDATE" name="BOOKING_DELIVERYDATE">
  </div>
          </div>
          </div>
          <br>
          <div class="row">
<div class="col-sm-4">
  <label for="editAddress" class="control-label">Intransit Date</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" class="form-control" placeholder="Pickup By" id="BOOKING_IDATE" name="BOOKING_IDATE">
  </div>
          </div>
          <div class="col-sm-4">
  <label for="editAddress" class="control-label">Intransit Time</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
  <input type="time" class="form-control" placeholder="Amount Collected" id="BOOKING_ITIME" name="BOOKING_ITIME">
  </div>
          </div>
     
          </div>
                   <br>
          <div class="row">
<div class="col-sm-4">
  <label for="editAddress" class="control-label">Date Delivered</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" class="form-control" placeholder="Pickup By" id="BOOKING_DDATE" name="BOOKING_DDATE">
  </div>
          </div>
          <div class="col-sm-4">
  <label for="editAddress" class="control-label">Time Delivered</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
  <input type="time" class="form-control" placeholder="Amount Collected" id="BOOKING_DTIME" name="BOOKING_DTIME">
  </div>
          </div>
             <div class="col-sm-4">
  <label for="editAddress" class="control-label">Received By</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-money"></i></span>
  <input type="text" class="form-control" placeholder="Received By" id="BOOKING_RBY" name="BOOKING_RBY">
  </div>
          </div>
     
          </div>
          
          <br>

          <br>
    
  </div>
</div>

      
        </div>
        <div class="modal-footer editMemberModal">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /edit modal -->
  
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
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


  <script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
  <!-- include custom index.js -->
  <script type="text/javascript" src="assests/datatables//dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="custom/js/index.js"></script>

<!-- page script -->

<script type="text/javascript">
   var timeouts = setInterval(reloadChats, 1000);    
function reloadChats () {
 $('#notif').load('../php/notif.php');
 $('#cancelled').load('../php/cancelled.php');
 }
</script>
<script>
  $(function () {
    //Initialize Select2 Elements

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
     $('#datepicker2').datepicker({
      autoclose: true
    });
   //Timepicker
   
  });
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
