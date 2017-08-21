<?php
require_once '../../../basefunction/database_connection.php';
session_start();
if(!isset($_SESSION['session_id']) || empty($_SESSION['session_id'])) {
    header("location: ../../../index.php");
    exit();
  }
$SESSION_ID = $_SESSION['session_id'];
$query = mysqli_query($link,"select * from user inner join security ON user.USER_ID=security.USER_ID where user.USER_ID='$SESSION_ID'");
$row = mysqli_fetch_array($query);
$USER_FIRSTNAME = $row['USER_FIRSTNAME'];
$USER_LASTNAME = $row['USER_LASTNAME'];
$USER_EMAIL = $row['USER_EMAIL'];
$USER_CONTACTNUMBER = $row['USER_CONTACTNUMBER'];
$SECURITY_USERNAME = $row['SECURITY_USERNAME'];
$USER_IMAGE = $row['USER_IMAGE'];

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
  <link rel="stylesheet" type="text/css" href="../../../admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../admin/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
    <link rel="stylesheet" href="../../../admin/ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../admin/dist/css/skins/_all-skins.min.css">
  <script src="../../../asset/js/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../../asset/css/sweetalert.css">
<style>
input[type=file] {
  background: whitesmoke;
}
</style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../../" class="navbar-brand" alt=""/><strong><font color="white">JUAN</font><font color="white">DELIVERY</font></strong></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../">HOME<span class="sr-only">(current)</span></a></li>
            <li><a href="../../../online-booking" >SCHEDULE PICKUP</a></li>
              <li><a href="../../../online-tracker.php" >ONLINE TRACKER</a></li>
   
          </ul>
     
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="../message" title="Message our admin now">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-danger"><span id="notif"></span></span>
              </a>
          
            </li>
            <!-- /.messages-menu -->

   
               <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="../image/<?php echo $USER_IMAGE?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../image/<?php echo $USER_IMAGE?>" class="img-circle" alt="User Image">

                  <p>
               <?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?>

                  
                  </p>
                </li>
                <!-- Menu Body -->
             
                <!-- Menu Footer-->
                <li class="user-footer">
                 <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="../../../basefunction/logout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <li class="active">Profile</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
<!-- add modal -->

      <!-- /.row -->
        <div class="box box-primary">
          <div class="box-header with-border">
          
             <div class="box-title">
             <form id="icon_form" method="POST" action="php/icon.php" enctype="multipart/form-data">
             <font style="font-size:14px;"><strong>Change Profile Icon</strong></font>
          <div class="btn-group">
                  <input type="file" id="file" class="btn btn-sm" name="fileToUpload" required="" />
                  <input type="hidden" name="SESSION_ID" value="<?php echo $SESSION_ID;?>"/>
              <input type="submit" name="submit" class="btn btn-success" value="Save"/>
           </div>
    </form>
        <div id='loadingmessage3' style='display:none;' class="text-left">
  <img src='loading.gif' style="width:5%;"/><br>
 
</div>
          </div> 
          </div>
          <div class="box-body">
         <div class="row">
      <div class="col-md-12">


     <div class="row">
  <div class="col-md-6">

<h3>PERSONAL INFORMATION</h3>
  <div class="well" style="background: none;">
  <form id="personal_form" method="POST">
<div class="row">
<div class="col-md-6">
<label>First Name</label>
<input type="text" name="USER_FIRSTNAME" id="USER_FIRSTNAME" value="<?php echo $USER_FIRSTNAME;?>" placeholder="First Name" class="form-control" disabled/>

</div>
<div class="col-md-6">
<label>Last Name</label>
<input type="text" name="USER_LASTNAME" id="USER_LASTNAME" value="<?php echo $USER_LASTNAME;?>" placeholder="Last Name" class="form-control" disabled/>

</div>
</div>
<br>
<div class="row">
<div class="col-md-6">
<label>Contact Number</label>
<input type="number" name="USER_CONTACTNUMBER" id="USER_CONTACTNUMBER" value="<?php echo $USER_CONTACTNUMBER;?>" placeholder="Contact Number" class="form-control" required/>
<input type="hidden" name="SESSION_ID" value="<?php echo $SESSION_ID;?>"/>
</div>
<div class="col-md-6">
<label>Email Address</label>
<input type="email" name="USER_EMAIL" id="USER_EMAIL" value="<?php echo $USER_EMAIL;?>" placeholder="Email Address" class="form-control" required/>

</div>
</div>
<br>
<div class="row">
<div class="col-md-12 text-right">
<input type="submit" class="btn btn-success" value="Save Changes"/>
</div>
</div>
</form>
     <div id='loadingmessage' style='display:none;' class="text-center">
  <img src='loading.gif' style="width:12%;"/><br>
 
</div>
</div>

  </div>

  <!--#######-->
  <div class="col-md-6">

<h3>ACCOUNT INFORMATION</h3>
  <div class="well" style="background: none;">
   <form id="account_form" method="POST">
<div class="row">
<div class="col-md-12">
<label>Username</label>
<input type="text" name="USER_USERNAME" id="USER_USERNAME" value="<?php echo $SECURITY_USERNAME;?>" placeholder="Username" class="form-control"/>
<input type="hidden" name="SESSION_ID" value="<?php echo $SESSION_ID;?>"/>
</div>

</div>
<br>
<div class="row">
<div class="col-md-6">
<label>Current Password</label>
<input type="password" name="USER_PASSWORD" id="USER_PASSWORD" placeholder="Current Password" class="form-control" required="" />

</div>
<div class="col-md-6">
<label>New Password</label>
<input type="password" name="USER_NEWPASSWORD" id="USER_NEWPASSWORD" placeholder="New Password" class="form-control" required="" />

</div>
</div>
<br>
<div class="row">
<div class="col-md-12 text-right">
<input type="submit" class="btn btn-success" value="Save Changes"/>
</div>
</div>
</form>
    <div id='loadingmessage2' style='display:none;' class="text-center">
  <img src='loading.gif' style="width:12%;"/><br>
 
</div>
</div>
  </div>
  <!--####-->
   </div>


      </div>
    </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

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
<script src="../../../admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!--SCRIPT FOR PERSONAL INFO-->
<script src="js/ajax.js"></script>
<!--SCRIPT FOR PERSONAL INFO-->
<!--SCRIPT FOR ACCOUNT INFO-->
<script src="js/ajax2.js"></script>
<!--SCRIPT FOR ACCOUNT INFO-->
<!-- Bootstrap 3.3.6 -->
<script src="../../../admin/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../../admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../admin/dist/js/demo.js"></script>
  <script type="text/javascript" src="assests/datatables/datatables.min.js"></script>
  <!-- include custom index.js -->
  <script type="text/javascript" src="assests/datatables//dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="custom/js/index.js"></script>

 <script language="javascript" type="text/javascript">

function reloadChat () {
$('#seen').load('php_action/seen.php');

 }
 
</script>
<script language="javascript" type="text/javascript">
var timeouts = setInterval(reloadChats, 1000);    
function reloadChats () {

$('#notif').load('../php/notif.php');
 }


</script>

</body>
</html>
