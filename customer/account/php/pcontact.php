<?php
include "../../basefunction/database_connection.php";
include "../../basefunction/security.php";
session_start();
error_reporting(0);
$SESSION_ID = $_SESSION['session_id'];
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $link->query("SELECT BOOKING_PCONTACTNUMBER FROM booking WHERE BOOKING_PCONTACTNUMBER LIKE '%".$searchTerm."%' and USER_ID='$SESSION_ID' ORDER BY BOOKING_PCONTACTNUMBER ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['BOOKING_PCONTACTNUMBER'];
}
//return json data
echo json_encode($data);
?>