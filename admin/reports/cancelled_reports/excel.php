<?php
// Connection 

include('../../../basefunction/database_connection.php');
$filename = "all_cancelled_report.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
$user_query = mysqli_query($link,'select BOOKING_DATE,BOOKING_BRANCH,BOOKING_PSENDER,BOOKING_BILLNUMBER,BOOKING_TYPE,BOOKING_SIZE,BOOKING_WEIGHT,BOOKING_PRICE,BOOKING_PAYMENT,BOOKING_CODPAYMENT,BOOKING_DCONSIGNEE,BOOKING_DCONTACTNUMBER,BOOKING_DCONSIGNEE,BOOKING_DESCRIPTION from booking where BOOKING_STATUS = "cancelled"');
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