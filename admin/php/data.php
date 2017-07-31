<?php
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );

// Connect to MySQL
include "../../basefunction/database_connection.php";
if ( !$link ) {
  die( 'Could not connect: ' . mysqli_error() );
}

// Select the data base


// Fetch the data
$query = "
  SELECT *,COUNT(*) as ct FROM booking where BOOKING_STATUS != 'deleted' and BOOKING_STATUS != 'cancelled' and BOOKING_BRANCH='Manila' GROUP BY BOOKING_DATE HAVING ct > 0";
$result = mysqli_query($link,$query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysqli_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "category": "' . $row['BOOKING_DATE'] . '",' . "\n";
  echo '  "value1": ' . $row['ct'] . '' . "\n";

  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysqli_close( $link );
?>