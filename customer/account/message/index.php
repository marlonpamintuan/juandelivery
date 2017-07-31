<?php
require_once '../../../basefunction/database_connection.php';
session_start();
if(!isset($_SESSION['session_id']) || empty($_SESSION['session_id'])) {
    header("location: ../../../index.php");
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- datatables css -->
  <link rel="stylesheet" type="text/css" href="assests/datatables/dataTables.bootstrap.css">
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
                <img src="../../../admin/dist/img/avatar5.png" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../../../admin/dist/img/avatar5.png" class="img-circle" alt="User Image">

                  <p>
               <?php echo strtoupper($USER_FIRSTNAME.' '.$USER_LASTNAME);?>

                  
                  </p>
                </li>
                <!-- Menu Body -->
             
                <!-- Menu Footer-->
                <li class="user-footer">
             
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
          <li class="active">Message</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
<!-- add modal -->
  <!-- edit modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="addMember">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        </div>

    <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm">       

    <div class="modal-body">
        <div class="messages"></div>
        <div class="row">
          <div class="col-md-12"> 
 
         <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
  <input type="hidden" value="<?php echo $SESSION_ID;?>" name="userid"/>
  <textarea class="form-control" onclick="reloadChat()" id="MESSAGE_MESSAGE" name="MESSAGE_MESSAGE" placeholder="Anything you want to say"></textarea>
  </div>

        <!-- here the text will apper  -->
  </div>
</div>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  

      <!-- /.row -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Your Conversation with our Admin</h3>
             <h3 class="box-title pull-right">
              <button class="btn btn-primary pull pull-right" data-toggle="modal" data-target="#addMember" id="addMemberModalBtn">
          <span class="fa fa-edit "></span> <strong>Create New Message</strong>
        </button>
          </h3>
          </div>
          <div class="box-body">
         <div class="row">
      <div class="col-md-12">
        <div id="seen"></div>

        <table class="table table-hover table-striped" id="manageMemberTable">          
          <thead>
            <tr>
           
              <th class="bg-warning" style="width:20%">FROM</th>
              <th class="bg-warning">MESSAGE</th>
              <th class="bg-warning" style="width:20%">DATE</th>
             
            </tr>
          </thead>
        </table>
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
