<html>
<head>
 <link rel="stylesheet" href="asset/css/example.css">
  <script src="asset/js/jquery-2.1.4.min.js"></script>

  <!-- This is what you need -->
  <script src="asset/js/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="asset/css/sweetalert.css">
  <!--.......................-->

</head>
<body>


<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message2 = $_POST['message'];
          $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $subject = @trim(stripslashes($_POST['subject'])); 
    $message = @trim(stripslashes($_POST['message'])); 

    $email_from = $email;
    $email_to = 'juandelivery.inquiry.@gmail.com';//replace with your email

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;

    $retval = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');
         if( $retval == true ) {
           ?>
       <script>
      setTimeout(function() {
        swal({
            title: "Message successfully sent!",
            text: "It will be sent in our company email to answer your inquiries, thank you",
            type: "success"
        }, function() {
            window.location = "contact.html";
        });
    }, 100);
       </script>
       <?php
         }else {
             ?>
       <script>
     setTimeout(function() {
        swal({
            title: "Ooops something went wrong!",
            text: "sorry, we will solve this problem as soon as possible thank you",
            type: "warning"
        }, function() {
            window.location = "contact.php";
        });
    }, 100);
    
       </script>
       
       <?php
         }
  
      ?>
    
    </body>
</html>