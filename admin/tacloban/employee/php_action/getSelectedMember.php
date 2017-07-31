<?php 

require_once '../../../../basefunction/database_connection.php';
$EMPLOYEE_ID = $_POST['EMPLOYEE_ID'];
$sql = "SELECT * FROM employee where EMPLOYEE_ID='$EMPLOYEE_ID'";
$query = $link->query($sql);
$result = $query->fetch_assoc();

$link->close();

echo json_encode($result);

