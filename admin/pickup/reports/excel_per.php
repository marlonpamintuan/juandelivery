<?php
// Connection 

include('../../../basefunction/database_connection.php');
$filename = "pickup_perdate_report.xls"; // File Name
// Download file

header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$BOOKING_DATEEXCEL = date("Y-m-d",strtotime($_POST['BOOKING_DATEEXCEL']));
$user_query = mysqli_query($link,"select BOOKING_DATE,BOOKING_PAYMENT,BOOKING_PSENDER,BOOKING_PCONTACTNUMBER,BOOKING_PCITY,BOOKING_PADDRESS,BOOKING_PLANDMARK,BOOKING_DCONSIGNEE,BOOKING_DCONTACTNUMBER,BOOKING_DCITY,BOOKING_DADDRESS,BOOKING_DLANDMARK,BOOKING_TYPE,BOOKING_WEIGHT,BOOKING_SIZE,BOOKING_REMARKS,BOOKING_DESCRIPTION,BOOKING_INSURANCE,BOOKING_PRICE from booking where BOOKING_STATUS = 'for-pickup' and BOOKING_DATE='$BOOKING_DATEEXCEL' and BOOKING_BRANCH='Manila'");
// Write data to file
$flag = false;
while ($row = mysqli_fetch_assoc($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
?>