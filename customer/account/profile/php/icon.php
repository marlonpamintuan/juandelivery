<html>
<head>
  <script src="../../../../asset/js/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../../../asset/css/sweetalert.css">
</head>
</html>
<?php
include "../../../../basefunction/database_connection.php";
include "../../../../basefunction/security.php";
$target_dir = "../../image/";
$imageName = mt_rand().$_FILES["fileToUpload"]["name"];
$SESSION_ID = security($_POST['SESSION_ID']);
$target_file = $target_dir . basename($imageName);
$message ='';
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
       $uploadOk = 1;
    } else {
        $message.="File is not an image. ";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
        ?><script type="text/javascript">
	       	alert('Sorry, file already exists.');
	     window.location = '../';
	       </script><?php  
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
  
    $uploadOk = 0;
     ?><script type="text/javascript">
	       	alert('Sorry, your file is too large.');
	     window.location = '../';
	       </script><?php  
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $message.="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
     ?><script type="text/javascript">
	       	alert('<?php echo $message;?>');
	     window.location = '../';
	       </script><?php     	
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	    ?><script type="text/javascript">
	     
	       swal({
            title: "Something went wrong",
            text: "Sorry, your file was not uploaded.",
            type: "warning"
        }, function() {
      
          window.location = '../';
        });
	       </script><?php  
   
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $query = mysqli_query($link,"update user set USER_IMAGE='$imageName' where USER_ID='$SESSION_ID'");
        if($query){
	       ?><script type="text/javascript">
	        swal({
            title: "Successfully Updated",
            text: "Successfully updated image icon",
            type: "success"
        }, function() {
      
          window.location = '../';
        });
	      
	   
	       </script><?php     	
        }
    } else {
  
            ?><script type="text/javascript">
	    
	     swal({
            title: "Something went wrong",
            text: "Sorry, there was an error uploading your file.",
            type: "warning"
        }, function() {
      
          window.location = '../';
        });
	       </script><?php  
    }
}
?>