<?php
require_once '../../basefunction/database_connection.php';
session_start();
if(!isset($_SESSION['session_id']) || empty($_SESSION['session_id'])) {
    header("location: ../../index.php");
    exit();
  }
$SESSION_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"select * from user where USER_ID='$SESSION_ID'");
$row = mysqli_fetch_array($query);
$USER_FIRSTNAME = $row['USER_FIRSTNAME'];
$USER_LASTNAME = $row['USER_LASTNAME'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $USER_FIRSTNAME.' '.$USER_LASTNAME;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
     <link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
  <!-- datatables css -->
  <link rel="stylesheet" type="text/css" href="assests/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../../admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
@media screen and (max-width: 768px) {
    .request_body {
        overflow: auto;
    }
    .transaction_body {
        overflow: auto;
    }
} 
</style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav" >
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../" class="navbar-brand" alt=""/><strong><font color="white">JUAN</font><font color="white">DELIVERY</font></strong></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">HOME<span class="sr-only">(current)</span></a></li>
            <li><a href="../../online-booking">SCHEDULE PICKUP</a></li>
              <li><a href="../../online-tracker.php">ONLINE TRACKER</a></li>
   
          </ul>
     
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="message/" title="Message our admin now">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-danger"><span id="notif"></span></span>
              </a>
             
            </li>
            <!-- /.messages-menu -->

   
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="../../admin/dist/img/avatar5.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../../admin/dist/img/avatar5.png" class="img-circle" alt="User Image">

                  <p>
                <?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?>

                  
                  </p>
                </li>
                <!-- Menu Body -->
             
                <!-- Menu Footer-->
                <li class="user-footer">
             
                  <div class="pull-right">
                    <a href="../../basefunction/logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Welcome <font color="green"><?php echo $USER_FIRSTNAME;?></font>
       
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Customer</a></li>
          <li><a href="#">Account</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Cancel Book Request</h4>
        </div>
        <div class="modal-body">
          <p>Do you really want to cancel ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="removeBtn">Save changes</button>
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
          <h4 class="modal-title"><span class="fa fa-eye"></span> VIEWING OF DATA ONLY</h4>
        </div>



    <div class="modal-body">
        <div class="edit-messages"></div>
          <ul class="nav nav-pills nav-justified">
          <li class="bg-warning active"><a data-toggle="pill" href="#home">SHIPPER'S INFO</a></li>
          <li class="bg-warning"><a data-toggle="pill" href="#menu1">CONSIGNEE'S INFO</a></li>
          <li class="bg-warning"><a data-toggle="pill" href="#menu2">ITEM INFO</a></li>
             <li class="bg-warning"><a data-toggle="pill" href="#menu3">PICKUP INFO</a></li>
           
         </ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
 <br>
 <div class="row">
  <div class="col-sm-4"> 
  <label for="editName" class="control-label">Shipper's Name</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="Shipper's Name" id="BOOKING_PSENDER" name="BOOKING_PSENDER" disabled="">
  </div>
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Contact Number</label>
        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
  <input type="number" class="form-control" placeholder="Contact Number" id="BOOKING_PCONTACTNUMBER" name="BOOKING_PCONTACTNUMBER" disabled="">
  </div>
        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">City</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  <input type="text" class="form-control" placeholder="City" id="BOOKING_PCITY" name="BOOKING_PCITY" disabled="">
  </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-12">
  <label for="editAddress" class="control-label">Address</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  <input type="text" class="form-control" placeholder="Address" id="BOOKING_PADDRESS" name="BOOKING_PADDRESS" disabled="">
  </div>
          </div>
          </div>
          <br>
  <div class="row">
          <div class="col-sm-12">
          <label for="editContact" class="control-label">Landmark</label> 
             <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
  <input type="text" class="form-control" placeholder="Landmark" id="BOOKING_PLANDMARK" name="BOOKING_PLANDMARK" disabled="">
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
  <input type="text" class="form-control" placeholder="Consignee's Name" id="BOOKING_DCONSIGNEE" name="BOOKING_DCONSIGNEE" disabled="">
  </div>
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Contact Number</label>
        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
  <input type="number" class="form-control" placeholder="Contact Number" id="BOOKING_DCONTACTNUMBER" name="BOOKING_DCONTACTNUMBER" disabled="">
  </div>
        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">City</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  <input type="text" class="form-control" placeholder="City" id="BOOKING_DCITY" name="BOOKING_DCITY" disabled="">
  </div>
  </div>
</div>
<br>
<div class="row">
<div class="col-sm-12">
  <label for="editAddress" class="control-label">Address</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
  <input type="text" class="form-control" placeholder="Address" id="BOOKING_DADDRESS" name="BOOKING_DADDRESS" disabled="">
  </div>
          </div>
          </div>
          <br>
  <div class="row">
          <div class="col-sm-12">
          <label for="editContact" class="control-label">Landmark</label> 
             <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
  <input type="text" class="form-control" placeholder="Landmark" id="BOOKING_DLANDMARK" name="BOOKING_DLANDMARK" disabled="">
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
      <label for="editName" class="control-label">Item Type</label>
      <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-question"></i></span>
  <select class="form-control" id="BOOKING_TYPE" name="BOOKING_TYPE" disabled="">
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
  <input type="number" class="form-control" id="BOOKING_WEIGHT" name="BOOKING_WEIGHT" placeholder="Item Weight" disabled="">
  </div>

        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Item Size (For Documents)</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
  <select class="form-control" id="BOOKING_SIZE" name="BOOKING_SIZE" disabled="">
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
      <label for="editName" class="control-label">Item Remarks</label>
          <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-info"></i></span>
  <input type="text" class="form-control" id="BOOKING_REMARKS" name="BOOKING_REMARKS" placeholder="Item Remarks" disabled="">
  </div>
      </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Item Insurance</label>
           <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-question"></i></span>
  <input type="text" class="form-control" id="BOOKING_INSURANCE" name="BOOKING_INSURANCE" placeholder="" disabled="">
  </div>
        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-4"> 
      <label for="editName" class="control-label">Item Price</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-money"></i></span>
  <input type="number" class="form-control" id="BOOKING_PRICE" name="BOOKING_PRICE" placeholder="Booking Price" disabled="">
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
  <div class="col-sm-12"> 
  <label for="editName" class="control-label">Bill Number</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
  <input type="text" class="form-control" placeholder="Bill Number" id="BOOKING_BILLNUMBER" name="BOOKING_BILLNUMBER" disabled="">
  </div>
  </div>
  </div>
  <br>
  <div class="row">
  <div class="col-sm-6"> 
      <label for="editName" class="control-label">Pickup Date</label>
        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" class="form-control" placeholder="" id="BOOKING_PDATE" name="BOOKING_PDATE" disabled="">
  </div>
        <!-- here the text will apper  -->
  </div>
  <div class="col-sm-6"> 
      <label for="editName" class="control-label">Pickup Time</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-clock"></i></span>
  <input type="time" class="form-control" placeholder="Email" id="BOOKING_PTIME" name="BOOKING_PTIME" disabled="">
  </div>
  </div>
</div>

          <br>
          <div class="row">
<div class="col-sm-6">
  <label for="editAddress" class="control-label">Intransit Date</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" class="form-control" placeholder="Pickup By" id="BOOKING_IDATE" name="BOOKING_IDATE" disabled="">
  </div>
          </div>
          <div class="col-sm-6">
  <label for="editAddress" class="control-label">Intransit Time</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
  <input type="time" class="form-control" placeholder="Amount Collected" id="BOOKING_ITIME" name="BOOKING_ITIME" disabled="">
  </div>
          </div>
     
          </div>
                   <br>
          <div class="row">
<div class="col-sm-3">
  <label for="editAddress" class="control-label">Date Delivered</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  <input type="date" class="form-control" placeholder="Pickup By" id="BOOKING_DDATE" name="BOOKING_DDATE" disabled="">
  </div>
          </div>
          <div class="col-sm-3">
  <label for="editAddress" class="control-label">Time Delivered</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
  <input type="time" class="form-control" placeholder="Amount Collected" id="BOOKING_DTIME" name="BOOKING_DTIME" disabled="">
  </div>
          </div>
             <div class="col-sm-6">
  <label for="editAddress" class="control-label">Received By</label>
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-money"></i></span>
  <input type="text" class="form-control" placeholder="Received By" id="BOOKING_RBY" name="BOOKING_RBY" disabled="">
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
     
        </div>
     
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /edit modal -->
  

          <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3 id="request">...</h3>

              <p>Pickup Request</p>
            </div>
            <div class="icon">
              <i class="fa fa-bell-o"></i>
            </div>
             <a href="" title="Reload" onclick="reload()" class="small-box-footer"> <i class="fa fa-refresh"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 id="pickup">...</h3>

              <p>For Pickup</p>
            </div>
            <div class="icon">
              <i class="fa fa-spinner"></i>
            </div>
            <a href="" title="Reload" onclick="reload()" class="small-box-footer"> <i class="fa fa-refresh"></i></a>
         
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3 id="delivery">...</h3>

              <p>For Delivery</p>
            </div>
            <div class="icon">
              <i class="fa fa-spinner"></i>
            </div>
              <a href="" title="Reload" onclick="reload()" class="small-box-footer"> <i class="fa fa-refresh"></i></a>
         
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3 id="transaction">...</h3>

              <p>Done Transactions</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square-o"></i>
            </div>
            <a href="" title="Reload" onclick="reload()" class="small-box-footer"> <i class="fa fa-refresh"></i></a>
         
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Your Book Request</h3>
          </div>
          <div class="box-body request_body">
             <div class="row">
      <div class="col-md-12">
        <div class="removeMessages"></div>
        <table class="table table-hover table-striped" id="manageMemberTable" style="font-size:12px;">          
          <thead>
            <tr>
             <th class="bg-primary"></th>
               <th class="bg-primary">SHIPPER</th>
               <th class="bg-primary">CONSIGNE</th>          
              <th class="bg-primary" title="Shipper's Contact Number">CONTACT NUMBER</th>
              <th class="bg-primary">FROM</th>
              <th class="bg-primary">TO</th>
              <th class="bg-primary">ITEM TYPE</th>
                      <th class="bg-primary">REMARKS</th>
              <th class="bg-primary">DATE</th>
   
             
            </tr>
          </thead>
        </table>
      </div>
    </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
         <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Your Transactions</h3>
          </div>
          <div class="box-body transaction_body">
                <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-striped" id="TransactionTable" style="font-size:12px;">          
          <thead>
            <tr>
       <th class="bg-success" ></th>
               <th class="bg-success" >SHIPPER</th>
               <th class="bg-success" style="font-size:11px;">CONSIGNEE</th>          
              <th class="bg-success" title="Shipper's Contact Number" style="font-size:11px;">CONTACT NUMBER</th>
              <th class="bg-success" style="font-size:11px;">FROM</th>
              <th class="bg-success" style="font-size:11px;">TO</th>
              <th class="bg-success" style="font-size:11px;">ITEM TYPE</th>
                      <th class="bg-success" style="font-size:11px;">REMARKS</th>
                            <th class="bg-success" style="font-size:11px;">STATUS</th>
              <th class="bg-success" style="font-size:11px;">DATE</th>
   
             
            </tr>
          </thead>
        </table>
      </div>
    </div>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- Direct Chat -->

        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
      </div>
       <strong>Copyright &copy; 2016-2017 <a href="#" title="Developer">MJNP</a>.</strong> All rights
    reserved.
    </div>
    <!-- /.container -->
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../admin/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../admin/dist/js/demo.js"></script>
<script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
  <!-- include custom index.js -->
  <script type="text/javascript" src="assests/datatables//dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="custom/js/index.js"></script>
    <script type="text/javascript" src="transaction_custom/js/index.js"></script>
    <script type="text/javascript">
      function reload()
      {
        location.reload();
      }
    </script>
      <script language="javascript" type="text/javascript">
var timeout = setInterval(reloadChat, 1500);    
function reloadChat () {
$('#request').load('php/request.php');
$('#pickup').load('php/pickup.php');
$('#delivery').load('php/delivery.php');
$('#transaction').load('php/transaction.php');
$('#notif').load('php/notif.php');
 }


</script>
</body>
</html>
