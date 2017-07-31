<?php 

require_once '../../../../basefunction/database_connection.php';
$BOOKING_ID = $_POST['BOOKING_ID'];
$sql = "SELECT * FROM booking where BOOKING_ID='$BOOKING_ID' and BOOKING_STATUS='cancelled'";
$query = $link->query($sql);
$result = $query->fetch_assoc();

$link->close();

echo json_encode($result);

