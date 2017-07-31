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
  <title>Employee</title>
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
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
  Employee
        <small>Employee list</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Employee</a></li>
        <li class="active">Employee list</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        

          <div class="box box-danger">
           <div class="box-header with-border">
          <h3 class="box-title pull-right">
              <button class="btn btn-primary pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
          <span class="glyphicon glyphicon-plus-sign "></span> <strong>ADD NEW EMPLOYEE</strong>
        </button>
          </h3></div><br>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row">
      <div class="col-md-12">
        <div class="removeMessages"></div>
 <div class="pickupMessages"></div>
 <div class="deliveryMessages"></div>

  

        <table class="table table-hover table-striped table-condensed" id="manageMemberTable">          
          <thead>
            <tr>
             <th class="bg-primary"></th>
                   <th class="bg-primary">First Name</th>
               <th class="bg-primary">Last Name</th>          
              <th class="bg-primary">Contact Number</th>
              <th class="bg-primary">Position</th>
            
          
             
            </tr>
          </thead>
        </table>
      </div>
    </div>
 <!-- add modal -->
  <!-- edit modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Add New Employee</h4>
        </div>

    <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">       

    <div class="modal-body">
        <div class="messages"></div>
        <div class="row">
  <div class="col-md-6"> 
  <label for="editName" class="control-label">First Name</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="First Name" id="EMPLOYEE_FIRSTNAMEC" name="EMPLOYEE_FIRSTNAMEC">
  </div>
  </div>
  <div class="col-md-6"> 
  <label for="editName" class="control-label">Last Name</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="Last Name" id="EMPLOYEE_LASTNAMEC" name="EMPLOYEE_LASTNAMEC">
  </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-6"> 
  <label for="editName" class="control-label">Contact Number</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
  <input type="number" class="form-control" placeholder="Contact Number" id="EMPLOYEE_CONTACTNUMBERC" name="EMPLOYEE_CONTACTNUMBERC">
  </div>
  </div>
  <div class="col-md-6"> 
  <label for="editName" class="control-label">Position</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="Position" id="EMPLOYEE_POSITIONC" name="EMPLOYEE_POSITIONC">
  </div>
  </div>
</div>
  


      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /edit modal -->
  <!-- /add modal -->

  <!-- remove modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Employee</h4>
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
  <!-- /remove modal -->
  
  <!-- edit modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="editMemberModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit Employee</h4>
        </div>

    <form class="form-horizontal" action="php_action/update.php" method="POST" id="updateMemberForm">       

    <div class="modal-body">
        <div class="edit-messages"></div>
<div class="row">
  <div class="col-md-6"> 
  <label for="editName" class="control-label">First Name</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="First Name" id="EMPLOYEE_FIRSTNAME" name="EMPLOYEE_FIRSTNAME">
  </div>
  </div>
  <div class="col-md-6"> 
  <label for="editName" class="control-label">Last Name</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="Last Name" id="EMPLOYEE_LASTNAME" name="EMPLOYEE_LASTNAME">
  </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-6"> 
  <label for="editName" class="control-label">Contact Number</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
  <input type="number" class="form-control" placeholder="Contact Number" id="EMPLOYEE_CONTACTNUMBER" name="EMPLOYEE_CONTACTNUMBER">
  </div>
  </div>
  <div class="col-md-6"> 
  <label for="editName" class="control-label">Position</label>
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input type="text" class="form-control" placeholder="Position" id="EMPLOYEE_POSITION" name="EMPLOYEE_POSITION">
  </div>
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
  var myVar=setInterval(function(){myTimer()},1000);
    function myTimer() {
      var d = new Date();
      document.getElementById("websitetime").innerHTML = d.toLocaleTimeString();
      document.getElementById("websitedate").innerHTML = d.toDateString();
    }
</script>
</body>
</html>
