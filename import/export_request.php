<?php
$conn = new mysqli('localhost', 'root', ''); 
mysqli_select_db($conn, 'courier'); 
$sql = "SELECT * FROM `request` INNER JOIN request_consignee ON request.PICKUP_ID = request_consignee.REQUEST_ID where request.USER_ACCESS='tacloban'"; 
$setRec = mysqli_query($conn, $sql); 
$columnHeader = ''; 
$columnHeader = "PICKUP ID" . "\t" . "USER ID" . "\t" . "USER ACCESS" . "\t" . "SENDER" . "\t" . "CONTACT NUMBER" . "\t" . "CITY" . "\t" . "ADDRESS" . "\t" . "LANDMARK" . "\t" . "NOTES" . "\t" . "REMARKS" . "\t" . "TYPE" . "\t" . "WEIGHT" . "\t" . "SIZE" . "\t" . "INSURANCE" . "\t" . "PRICE" . "\t" . "PDATE" . "\t" . "PTIME" . "\t" . "PSTATUS" . "\t" . "PBY" . "\t" . "COLLECTED" . "\t" . "DATECREATED" . "\t" . "DATEAPPROVE" . "\t" . "DATEDELETED" . "\t" . "CONSIGNEE ID" . "\t" . "REQUEST ID" . "\t" . "USER ID" . "\t" . "RECEIVER" . "\t" . "CONTACT" . "\t" . "ADDRESS" . "\t" . "LANDMARK" . "\t" . "NOTES" . "\t" . "CITY" . "\t"; 
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