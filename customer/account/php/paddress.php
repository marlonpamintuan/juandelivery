<?php
include "../../basefunction/database_connection.php";
include "../../basefunction/security.php";
session_start();
error_reporting(0);
$SESSION_ID = $_SESSION['session_id'];
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $link->query("SELECT BOOKING_PADDRESS FROM booking WHERE BOOKING_PADDRESS LIKE '%".$searchTerm."%' and USER_ID='$SESSION_ID' ORDER BY BOOKING_PADDRESS ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['BOOKING_PADDRESS'];
}
//return json data
echo json_encode($data);
?>