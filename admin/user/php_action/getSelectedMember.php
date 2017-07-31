<?php 

require_once '../../../basefunction/database_connection.php';
$USER_ID = $_POST['USER_ID'];
$sql = "SELECT * FROM user inner join security ON user.USER_ID = security.USER_ID where user.USER_ID='$USER_ID'";
$query = $link->query($sql);
$result = $query->fetch_assoc();

$link->close();

echo json_encode($result);

