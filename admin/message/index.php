<?php
require_once '../../basefunction/database_connection.php';
  //############################### SESSION #############################
session_start();
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
  $SESSION_ID = $_SESSION['session_id'];
  //############################### SESSION #############################
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Messages</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" type="text/css" href="assests/bootstrap/css/bootstrap.min.css">
  <!-- datatables css -->
  <link rel="stylesheet" type="text/css" href="assests/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="../ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

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
     Messages
        <small>All messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">admin</a></li>
        <li class="active">messages</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        

          <div class="box box-danger">
           <div class="box-header with-border">
          <h3 class="box-title">
           
            <span id="seen"></span>
          </h3>
            <h3 class="box-title pull-right">
              <button class="btn btn-primary pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
          <span class="fa fa-edit"></span> <strong>CREATE NEW MESSAGE</strong>
        </button>
          </h3>

          </div><br>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: auto;">
            <div class="row">
      <div class="col-md-12">
        <div class="removeMessages"></div>
 <div class="pickupMessages"></div>
 <div class="deliveryMessages"></div>

  

        <table class="table table-hover table-striped table-condensed" id="manageMemberTable">          
          <thead>
            <tr>
             <th class="bg-primary" style="width:20%;">FROM</th>
                <th class="bg-primary" style="width:40%;">MESSAGE</th>
               <th class="bg-primary" style="width:20%;">DATE AND TIME</th>          
         
             
             
            </tr>
          </thead>
        </table>
      </div>
    </div>
<!-- add modal -->
  <!-- edit modal -->
  <div class="modal fade" role="dialog" id="addMember">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span> Compose New Message</h4>
        </div>

    <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">       

    <div class="modal-body">
        <div class="messages"></div>
     
 <div class="row">
  <div class="col-md-12"> 
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
   
<select class="form-control select2" style="width:100%;" id="MESSAGE_TO" name="MESSAGE_TO">
  <option label="Choose Recipient"></option>
<?php
$query = mysqli_query($link,"select * from user inner join security ON user.USER_ID = security.USER_ID where security.SECURITY_ACCESS != 'admin'");
while($row = mysqli_fetch_array($query))
{
  $USER_ID = $row['USER_ID'];
  $SECURITY_USERNAME = $row['SECURITY_USERNAME'];
?>
  <option value="<?php echo $USER_ID;?>"><?php echo $SECURITY_USERNAME;?></option>

<?php
}
?>
</select>
  </div>
  </div>

</div>
 <br>
 <div class="row">
  <div class="col-md-12"> 
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="hidden" value="<?php echo $SESSION_ID;?>" name="MESSAGE_FROM"/>
<textarea class="form-control" id="MESSAGE_MESSAGE" name="MESSAGE_MESSAGE" onclick="seen()" placeholder="Anything you want to say"></textarea>
  </div>
  </div>

</div>


          <br>



      
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


  <!-- /remove modal -->

  
  <!-- /move to delivery modal -->
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
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>


  <script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
  <!-- include custom index.js -->
  <script type="text/javascript" src="assests/datatables//dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="custom/js/index.js"></script>
  <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

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
 <script language="javascript" type="text/javascript">
var timeout = setInterval(reloadChat, 1000);    
function reloadChat () {
$('#notif').load('php_action/notif.php');
 $('#cancelled').load('../php/cancelled.php');
 }
 
</script>
<script>
function seen(){
$('#seen').load('php_action/seen.php');
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
<!-- page script -->

</body>
</html>
