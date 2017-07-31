<?php
//load the database configuration file
$link = mysqli_connect("localhost","root","","juan");
date_default_timezone_set('UTC');
        $upload_date= date("m-d-Y H:i:s", strtotime('+6 hours'));
        $upload_dateonly = date("m-d-Y",strtotime('+6 hours'));    
if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
        
                    //insert member data into database
                    $link->query("INSERT INTO booking(USER_ID,BOOKING_BILLNUMBER,BOOKING_PSENDER,BOOKING_PCONTACTNUMBER,BOOKING_PCITY,BOOKING_PADDRESS,BOOKING_PLANDMARK,BOOKING_DCONSIGNEE,BOOKING_DCONTACTNUMBER,BOOKING_DCITY,BOOKING_DADDRESS,BOOKING_DLANDMARK,BOOKING_TYPE,BOOKING_WEIGHT,BOOKING_SIZE,BOOKING_REMARKS,BOOKING_INSURANCE,BOOKING_PRICE,BOOKING_STATUS,BOOKING_PDATE,BOOKING_PTIME,BOOKING_PBY,BOOKING_DDATE,BOOKING_DTIME,BOOKING_RBY,BOOKING_IDATE,BOOKING_ITIME,BOOKING_DATE,BOOKING_BRANCH) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."','".$line[7]."','".$line[8]."','".$line[9]."','".$line[10]."','".$line[11]."','".$line[12]."','".$line[13]."','".$line[14]."','".$line[15]."','".$line[16]."','".$line[17]."','".$line[18]."','".$line[19]."','".$line[20]."','".$line[21]."','".$line[22]."','".$line[23]."','".$line[24]."','".$line[25]."','".$line[26]."','".$line[27]."','".$line[28]."')");
                    

            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
header("Location: beginning_balance.php".$qstring);