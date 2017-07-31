<?php
$conn = new mysqli('localhost', 'root', ''); 
mysqli_select_db($conn, 'courier'); 
$sql = "SELECT * FROM pickup inner join consignee on pickup.REQUEST_ID = consignee.REQUEST_ID where pickup.STATUS !='invalid' and pickup.USER_ACCESS='tacloban'"; 
$setRec = mysqli_query($conn, $sql); 
$columnHeader = ''; 
$columnHeader = "PICKUP ID" . "\t" . "REQUEST ID" . "\t" . "USER ID" . "\t" . "USER ACCESS" . "\t" . "TRACKING ID" . "\t" . "SENDER" . "\t" . "CONTACT NUMBER" . "\t" . "CITY" . "\t" . "ADDRESS" . "\t" . "LANDMARK" . "\t" . "NOTES" . "\t" . "REMARKS" . "\t" . "TYPE" . "\t" . "WEIGHT" . "\t" . "SIZE" . "\t" . "INSURANCE" . "\t" . "PRICE" . "\t" . "PDATE" . "\t" . "PTIME" . "\t" . "PBY" . "\t" . "COLLECTED" . "\t" . "IDATE" . "\t" . "ITIME" . "\t" . "DDATE" . "\t" . "DTIME" . "\t" . "RECEIVED BY" . "\t" . "DATECREATED" . "\t" . "TIMECREATED" . "\t" . "DATEAPPROVE" . "\t" . "DATEDELETED" . "\t" . "STATUS" . "\t" . "DELIVER_STATUS" . "\t" . "REQUEST DATE" . "\t" . "PICKUP REMARKS" . "\t" . "CONSIGNEE ID" . "\t" . "REQUEST ID" . "\t" . "USER ID" . "\t" . "TRACKING ID" . "\t" . "RECEIVER" . "\t" . "CONTACT NUMBER" . "\t" . "EMAIL" . "\t" . "ADDRESS" . "\t" . "LANDMARK" . "\t" . "CITY" . "\t"; 
$setData = ''; 
while ($rec = mysqli_fetch_row($setRec)) { 
$rowData = ''; 
foreach ($rec as $value) { 
$value = '"' . $value . '"' . "\t"; 
$rowData .= $value; 
} 
$setData .= trim($rowData) . "\n"; 
} 
header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=User_Detail.xls"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 
echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
?>