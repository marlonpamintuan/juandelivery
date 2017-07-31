
<?php
include "../basefunction/database_connection.php";
include "../basefunction/security.php";
$TRACKING_ID= security($_POST['TRACKING_ID']);

$query= "select * from booking where BOOKING_BILLNUMBER='$TRACKING_ID'";
$result = mysqli_query($link,$query);
if(mysqli_num_rows($result) == 0){
?>
<div class='row'><div class='col-md-12'><div id='danger-alert2' class='alert alert-danger alert-dismissable text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong style="font-family: arial;">SORRY, NO RECORDS FOUND</strong></div></div></div>

<?php
exit();
}elseif(empty($TRACKING_ID))
{
?>
<div class='row'><div class='col-md-12'><div id='danger-alert2' class='alert alert-danger alert-dismissable text-center'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong style="font-family: arial;">SORRY, NO RECORDS FOUND</strong></div></div></div>

<?php
}else{

$row = mysqli_fetch_array($result);
$BOOKING_PDATE = $row['BOOKING_PDATE'];
$BOOKING_PTIME = $row['BOOKING_PTIME'];
$BOOKING_PCITY = $row['BOOKING_PCITY'];
$BOOKING_PADDRESS = $row['BOOKING_PADDRESS'];
$BOOKING_DCITY = $row['BOOKING_DCITY'];
$BOOKING_DADDRESS = $row['BOOKING_DADDRESS'];
$BOOKING_PSENDER = $row['BOOKING_PSENDER'];
$BOOKING_DCONSIGNEE = $row['BOOKING_DCONSIGNEE'];
$BOOKING_IDATE = $row['BOOKING_IDATE'];
$BOOKING_ITIME = $row['BOOKING_ITIME'];
$BOOKING_DDATE = $row['BOOKING_DDATE'];
$BOOKING_DTIME = $row['BOOKING_DTIME'];
$BOOKING_REMARKS = $row['BOOKING_REMARKS'];
$BOOKING_RBY = $row['BOOKING_RBY'];
$BOOKING_TYPE = $row['BOOKING_TYPE'];
if(empty($BOOKING_ITIME))
{
$BOOKING_ITIME='not yet available';
}
if(empty($BOOKING_PTIME))
{
$BOOKING_PTIME='not yet available';
}
if(empty($BOOKING_DTIME))
{
$BOOKING_DTIME='not yet available';
}
if(empty($BOOKING_IDATE))
{
$BOOKING_IDATE='not yet available';
}
if(empty($BOOKING_PDATE))
{
$BOOKING_PDATE='not yet available';
}
if(empty($BOOKING_DDATE))
{
$BOOKING_DDATE='not yet available';
}
if(empty($BOOKING_RBY))
{
$BOOKING_RBY='not yet available';
}
?>
<table class="table table-responsive table-bordered table-striped table-collapsed">
<tr>
<td style="width:33%;" class="bg-primary"><strong style="font-family: arial;">Remarks</strong></td>
<td style="width:33%;" class="bg-primary"><strong style="font-family: arial;">Date</strong></td>
<td style="width:33%;" class="bg-primary"><strong style="font-family: arial;">Time (24-hour clock )</strong></td>
</tr>
<tr>
<td><font color="black"><strong style="font-family: arial;">Pickup</strong></font></td>
<td><font color="black"><strong style="font-family: arial;"><?php echo $BOOKING_PDATE;?></strong></font></td>
<td><font color="black"><strong style="font-family: arial;"><?php echo $BOOKING_PTIME;?></strong></font></td>
</tr>
<tr>
<td><font color="black"><strong style="font-family: arial;">Intransit</strong></font></td>
<td><font color="black"><strong style="font-family: arial;"><?php echo $BOOKING_IDATE;?></strong></font></td>
<td><font color="black"><strong style="font-family: arial;"><?php echo $BOOKING_ITIME;?></strong></font></td>
</tr>
<tr>
<td><font color="black"><strong style="font-family: arial;">Delivery</strong></font></td>
<td><font color="black"><strong style="font-family: arial;"><?php echo $BOOKING_DDATE;?></strong></font></td>
<td><font color="black"><strong style="font-family: arial;"><?php echo $BOOKING_DTIME;?></strong></font></td>
</tr>
<table>
<table class="table table-responsive table-bordered table-striped table-collapsed">
<tr>
<td style="width:33%;" class="bg-primary"><strong>Item Type</strong></td>
<td style="width:33%;" class="bg-primary"><strong>Received By</strong></td>
<td style="width:33%;" class="bg-primary"><strong>Remarks</strong></td>

</tr>
<tr>


<td><font color="black"><strong><?php echo strtoupper($BOOKING_TYPE);?></strong></font></td>
<td><font color="black"><strong><?php echo strtoupper($BOOKING_RBY) ;?></strong></font></td>
<td><font color="black"><strong><?php echo strtoupper($BOOKING_REMARKS);?></strong></font></td>
</tr>

</table>
<?php

}

?>
