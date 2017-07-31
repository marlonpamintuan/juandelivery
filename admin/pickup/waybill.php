<?php
require('../../basefunction/database_connection.php');
  //############################### SESSION #############################
session_start();
$id = $_REQUEST['id'];
$query = mysqli_query($link,"select * from booking where BOOKING_ID='$id'");
if(mysqli_num_rows($query)>0)
{
$row = mysqli_fetch_array($query);
$BOOKING_PSENDER = $row['BOOKING_PSENDER'];
$BOOKING_PADDRESS = $row['BOOKING_PADDRESS'];
$BOOKING_PCONTACTNUMBER = $row['BOOKING_PCONTACTNUMBER'];
$BOOKING_DCONSIGNEE = $row['BOOKING_DCONSIGNEE'];
$BOOKING_DADDRESS = $row['BOOKING_DADDRESS'];
$BOOKING_DCONTACTNUMBER = $row['BOOKING_DCONTACTNUMBER'];
$BOOKING_PRICE = $row['BOOKING_PRICE'];
$BOOKING_SIZE = $row['BOOKING_SIZE'];
$BOOKING_PAYMENT = $row['BOOKING_PAYMENT'];

$BOOKING_WEIGHT = $row['BOOKING_WEIGHT'];
}else
{
  header("location:index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>For Pickup</title>
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
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <!-- Select2 -->
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
<body>
<div class="row">
<div class="col-xs-offset-1 col-xs-5 text-center xs" style="margin-top:179px; font-size:12px; color:red!important;">
<?php echo strtoupper($BOOKING_PSENDER);?><br><br>
<font style="font-size:11px; color:red!important;"><?php echo strtoupper($BOOKING_PADDRESS);?></font><br><br>
<?php echo strtoupper($BOOKING_PCONTACTNUMBER);?><br><br>
<?php echo strtoupper($BOOKING_DCONSIGNEE);?><br><br>
<font style="font-size:11px; color:red!important;"><?php echo strtoupper($BOOKING_DADDRESS);?></font><br><br><br>
<?php echo strtoupper($BOOKING_DCONTACTNUMBER);?>
<br><br>
<div class="row">
<div class="col-xs-6" style="margin-top:-5px;">
<?php echo strtoupper($BOOKING_SIZE);?>
</div>
<div class="col-xs-6">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($BOOKING_PAYMENT);?>
</div>
</div>
<br><br>
<div class="row">
<div class="col-xs-6" style="margin-top:-10px;">
<?php echo strtoupper($BOOKING_WEIGHT);?>
</div>
<div class="col-xs-6" style="margin-top:-10px;">
<?php echo strtoupper($BOOKING_PRICE);?>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-xs-3 text-center" style="margin-top:60px;font-size:12px; color:red!important;">
<?php echo strtoupper($BOOKING_PSENDER);?>
</div>
<div class="col-xs-3 text-center" style="margin-top:60px;font-size:12px; color:red!important;">
<?php echo strtoupper($BOOKING_DCONSIGNEE);?>
</div>
</div>
</body>
</head>

</html>
