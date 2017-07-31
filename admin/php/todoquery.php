<?php
include "../../basefunction/database_connection.php";
include "../../basefunction/security.php";
$TODO_INFO = security($_POST['TODO_INFO']);
$TODO_TIME = time();
$query= "INSERT INTO todo(TODO_INFO,TODO_TIME,TODO_BRANCH) VALUES('$TODO_INFO','$TODO_TIME','Manila')";
$result = mysqli_query($link,$query);
if($result){
echo 'done';
exit();
}else{
echo 'error';
exit();
}

?>
