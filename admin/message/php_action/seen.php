<?php 

require_once '../../../basefunction/database_connection.php';
//if form is submitted

$query = mysqli_query($link,"update message SET MESSAGE_SEEN='1' WHERE MESSAGE_SEEN='0'");

