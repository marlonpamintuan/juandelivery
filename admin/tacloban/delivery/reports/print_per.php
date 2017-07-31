<?php
require('../../../../basefunction/database_connection.php');
  //############################### SESSION #############################
session_start();
if(!isset($_SESSION['session_id']) || empty($_SESSION['session_id'])) {
    header("location: ../../../../");
    exit();
  }
  if($_SESSION['session_access'] === "customer") {
    header("location: ../../../../");
    exit();
  }
  //############################### SESSION #############################
?>
<html>
<head>

  <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
<style>
@media print {
  body {
    margin: 0;
    padding: 0 !important;
    min-width: 768px;
  }
  .s{page-break-inside: avoid;
  }
  .print{display:none;}
  .container {
    width: auto;
    min-width: 750px;
  }
   @page { margin: 0; }
  body { margin: .5cm .5cm; }
}
h6,h5{font-size:11px;}
</style>
  </head>
<body>
	<div class="container">
	<div class="print">
<br>
<button type="button" class="btn btn-primary btn-flat pull-right" onclick="window.print()">PRINT</button>
	</div>
	</div>
 <?php
 $DATECREATED = date("m-d-Y", strtotime('+6 hours'));
$BOOKING_DATE = date("Y-m-d",strtotime($_POST['BOOKING_DATE']));
// $query ="select * from pickup inner join consignee on pickup.REQUEST_ID = consignee.REQUEST_ID where PICKUP_DATECREATED='$DATECREATED' and CONSIGNEE_DATECREATED='$DATECREATED' and STATUS != 'invalid'";
 $query ="select * from booking where BOOKING_STATUS = 'for-delivery' and BOOKING_DATE='$BOOKING_DATE' and BOOKING_BRANCH='Tacloban'";
$result = mysqli_query($link,$query);
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result)){
				
	$BOOKING_DATE = $row['BOOKING_DATE'];
	$BOOKING_PSENDER = $row['BOOKING_PSENDER'];
	$BOOKING_PCONTACTNUMBER = $row['BOOKING_PCONTACTNUMBER'];
	$BOOKING_PCITY = $row['BOOKING_PCITY'];
	$BOOKING_PADDRESS = $row['BOOKING_PADDRESS'];
	$BOOKING_PLANDMARK = $row['BOOKING_PLANDMARK'];
	$BOOKING_DESCRIPTION = $row['BOOKING_DESCRIPTION'];
	$BOOKING_DCONSIGNEE = $row['BOOKING_DCONSIGNEE'];
	$BOOKING_DCONTACTNUMBER = $row['BOOKING_DCONTACTNUMBER'];
	$BOOKING_DATE = $row['BOOKING_DATE'];
	$BOOKING_DCITY = $row['BOOKING_DCITY'];
	$BOOKING_DADDRESS = $row['BOOKING_DADDRESS'];
	$BOOKING_DLANDMARK = $row['BOOKING_DLANDMARK'];
		$BOOKING_TYPE = $row['BOOKING_TYPE'];
		$BOOKING_WEIGHT = $row['BOOKING_WEIGHT'];
		$BOOKING_SIZE = $row['BOOKING_SIZE'];
		$BOOKING_PRICE = $row['BOOKING_PRICE'];
		$BOOKING_INSURANCE = $row['BOOKING_INSURANCE'];
			$BOOKING_BILLNUMBER = $row['BOOKING_BILLNUMBER'];
?>
<div class="container s">

		
		<h5>Date : <?php echo $BOOKING_DATE;?> <strong>(FOR-DELIVERY)</strong></h5>
		
		<div class="row">
		<div class="col-xs-6">
			<table class="" border="1" style="width:100%;">
		<tr>
		<td style="padding-left:5px;padding:right:5px; width:45%;"><h6 style="">Shipper Name</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:55%;"><h6><?php echo $BOOKING_PSENDER;?></h6></td>
		</tr>
		
		<tr>
		<td style="padding-left:5px;padding:right:5px; width:45%;"><h6>Contact Number</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:55%;"><h6><?php echo $BOOKING_PCONTACTNUMBER;?></h6></td>
		</tr>
		<tr>
		<td style="padding-left:5px;padding:right:5px; width:45%;"><h6 style="">City</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:55%;"><h6><?php echo $BOOKING_PCITY;?></h6></td>
		</tr>
		<tr>
		<td style="padding-left:5px;padding:right:5px; width:45%;"><h6 style="">Address</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:55%;"><h6><?php echo $BOOKING_PADDRESS;?></h6></td>
		</tr>
		
		</table>
		</div>
		<div class="col-xs-6">
			<table class="" border="1" style="width:100%;">
		<tr>
		<td style="padding-left:5px;padding:right:5px; width:45%;"><h6 style="">Consignee Name</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:55%;"><h6><?php echo $BOOKING_DCONSIGNEE;?></h6></td>
		</tr>
		
		<tr>
		<td style="padding-left:5px;padding:right:5px; width:45%;"><h6>Contact Number</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:55%;"><h6><?php echo $BOOKING_DCONTACTNUMBER;?></h6></td>
		</tr>
		<tr>
		<td style="padding-left:5px;padding:right:5px; width:45%;"><h6 style="">City</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:55%;"><h6><?php echo $BOOKING_DCITY;?></h6></td>
		</tr>
		<tr>
		<td style="padding-left:5px;padding:right:5px; width:45%;"><h6 style="">Address</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:55%;"><h6><?php echo $BOOKING_DADDRESS;?></h6></td>
		</tr>
		
		</table>
		</div>
		</div>
		<br>
		<div class="row">
		<div class="col-xs-12">
		<table class="" border="1" style="width:100%;">
		<thead>
		<tr>
<td style="padding-left:5px;padding:right:5px; width:8%;"><h6 style="">Tracking ID</h6></td>		
<td style="padding-left:5px;padding:right:5px; width:8%;"><h6 style="">ITEM TYPE</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:7%;" class="text-center"><h6>ITEM WEIGHT</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:7%;" class="text-center"><h6>ITEM SIZE</h6></td>
			<td class="text-center" style="padding-left:5px;padding:right:5px; width:5%;"><h6>Insurance</h6></td>
				<td style="padding-left:5px;padding:right:5px; width:7%;" class="text-center"><h6>Price</h6></td>
		<td style="padding-left:5px;padding:right:5px; width:20%;"><h6>Remarks</h6></td>
		</tr>
		</thead>
		<tbody>
		<tr>
<td style="padding-left:5px;"><h6><?php echo $BOOKING_BILLNUMBER;?></h6></td>
		<td style="padding-left:5px;"><h6><?php echo $BOOKING_TYPE;?></h6></td>
<td style="padding-left:5px;" class="text-center"><h6><?php echo $BOOKING_WEIGHT;?></h6></td>
<td style="padding-left:5px;" class="text-center"><h6><?php echo $BOOKING_SIZE;?></h6></td>
<td style="padding-left:5px;" class="text-center"><h6><?php echo $BOOKING_INSURANCE;?></h6></td>
<td style="padding-left:5px;" class="text-center"><h6><?php echo $BOOKING_PRICE;?></h6></td>
<td style="padding-left:5px;"><h6><?php echo $BOOKING_DESCRIPTION;?></h6></td>
		</tr>
		</tbody>
		</table>
		<hr style="border:dashed 1px black;">
		</div>
		</div>
</div>	
	
     <!--
<div class="container">
		<h4><strong>Juan Delivery</strong></h4>
		<h5>Date : <?php echo date("m-d-Y", strtotime('+7 hours'));?></h5>
		
		<div class="row">
		<div class="col-md-6 col-lg-6 col-xs-6" >
		<div style="border:2px solid black; padding:10px; font-size:13px;">
		<strong>Ship From:</strong> <?php echo $PICKUP_SENDER;?><br>
		<strong>Contact Number:</strong> <?php echo $PICKUP_CONTACTNUMBER;?><br>
		<strong>City:</strong> <?php echo $PICKUP_CITY;?><br>
		<strong>Address:</strong> <?php echo $PICKUP_ADDRESS;?><br>
		<strong>Nearest Landmark:</strong> <?php echo $PICKUP_LANDMARK;?><br>
		<strong>Notes:</strong> <?php echo $PICKUP_NOTES;?><br>
		
		</div>

		</div>
		<div class="col-md-6 col-lg-6 col-xs-6" >
		<div style="border:2px solid black;  padding:10px;font-size:13px;">
		<strong>Ship To:</strong> <?php echo $CONSIGNEE_RECEIVER;?><br>
		<strong>Contact Number:</strong> <?php echo $CONSIGNEE_CONTACTNUMBER;?><br>
		<strong>City:</strong> <?php echo $CONSIGNEE_CITY;?><br>
		<strong>Address:</strong> <?php echo $CONSIGNEE_ADDRESS;?><br>
		<strong>Nearest Landmark:</strong> <?php echo $CONSIGNEE_LANDMARK;?><br>
		<strong>Notes:</strong> <?php echo $CONSIGNEE_NOTES;?><br>
		
		</div>
		</div>
		
		</div>
		<br>
		<div class="row">
		<div class="col-md-12">
		<table class="table table-striped table-bordered">
		<thead>
		<tr>
		<td ><h6 style="">ITEM TYPE</h6></td>
		<td><h6>ITEM WEIGHT (FOR OWN-PACKAGING ONLY)</h6></td>
		<td><h6>ITEM SIZE (FOR DOCUMENT ONLY)</h6></td>
		<td><h6>ITEM DESCRIPTION</h6></td>
		</tr>
		</thead>
		<tbody>
		<tr>
		<td><h6><?php echo $PICKUP_ITEMTYPE;?></h6></td>
<td><h6><?php echo $PICKUP_ITEMWEIGHT;?></h6></td>
<td><h6><?php echo $PICKUP_ITEMSIZE;?></h6></td>
<td><h6><?php echo $PICKUP_ITEMINFO;?></h6></td>
		</tr>
		</tbody>
		</table>
		<hr style="border:dashed 1px black;">
		</div>
		</div>
</div>	
-->
	
		
	
<?php	
}	
}else{
	?><script>alert('There\'s No Data To Print');
	window.location = "../index.php";
	</script><?php
	
}
?>      
			
</body>
</html>