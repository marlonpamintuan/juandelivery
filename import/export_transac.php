<?php
$conn = new mysqli('localhost', 'root', ''); 
mysqli_select_db($conn, 'courier'); 
$sql = "SELECT * FROM transaction where TRANSACTION_BRANCH='' and TRANSACTION_DATEAPPROVE='07-17-2017'"; 
$setRec = mysqli_query($conn, $sql); 
$columnHeader = ''; 
$columnHeader = "TRANSACTION ID" . "\t" . "USER ID" . "\t" . "BRANCH" . "\t" . "WAYBILL" . "\t" . "SENDER" . "\t" . "CONTACT NUMBER" . "\t" . "CITY" . "\t" . "ADDRESS" . "\t" . "LANDMARK" . "\t" . "NOTES" . "\t" . "RECEIVER" . "\t" . "CONTACT NUMBER" . "\t" . "CITY" . "\t" . "ADDRESS" . "\t" . "LANDMARK" . "\t" . "NOTES" . "\t" . "TYPE" . "\t" . "WEIGHT" . "\t" . "SIZE" . "\t" . "INSURANCE" . "\t" . "PRICE" . "\t" . "PBY" . "\t" . "PDATE" . "\t" . "PTIME" . "\t" . "AMOUNT COLLECTED" . "\t" . "IDATE" . "\t" . "ITIME" . "\t" . "DDATE" . "\t" . "DTIME" . "\t" . "RBY" . "\t" . "DATEAPPROVE" . "\t" . "MODIFIED" . "\t" . "ACTIVE" . "\t" . "ITEM INFO" . "\t" . "REMARKS" . "\t"; 
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