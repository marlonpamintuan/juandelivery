<?php 
include "../../../basefunction/database_connection.php";
$query = mysqli_query($link,"select * from todo where TODO_BRANCH='Tacloban'");
if(mysqli_num_rows($query)>0)
{
while($row = mysqli_fetch_array($query))
{
	$TODO_ID= $row['TODO_ID'];
	$TODO_INFO = $row['TODO_INFO'];
	$TODO_TIME = $row['TODO_TIME'];
	$SECONDS = time() - $TODO_TIME;
	$MINUTE = gmdate("H:i", $SECONDS);
	?>
 <li>
  <span class="handle">
	<i class="fa fa-ellipsis-v"></i>
    <i class="fa fa-ellipsis-v"></i>
 </span>
                  <!-- checkbox -->
      <!-- todo text -->
<span class="text"><?php echo strtoupper($TODO_INFO);?></span>      <!-- Emphasis label -->
<small class="label label-danger" title="<?php echo $MINUTE.' '.'ago';?>"><i class="fa fa-clock-o"></i> <?php echo $MINUTE.' '.'ago';?></small>
<div class="tools">

 <a href="javascript:delete_id('<?php echo $TODO_ID; ?>')"><i class="fa fa-trash-o text-danger"></i></a>
</div>
</li>

<?php
}
}

?>