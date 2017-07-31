<?php
include "../../basefunction/database_connection.php";
include "../../basefunction/security.php";
session_start();
error_reporting(0);
$SESSION_ID = $_SESSION['session_id'];
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $link->query("SELECT BOOKING_DLANDMARK FROM booking WHERE BOOKING_DLANDMARK LIKE '%".$searchTerm."%' and USER_ID='$SESSION_ID' GROUP BY BOOKING_DLANDMARK ORDER BY BOOKING_DLANDMARK ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['BOOKING_DLANDMARK'];
}
//return json data
echo json_encode($data);
?>