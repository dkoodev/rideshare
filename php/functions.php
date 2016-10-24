<?php

session_start();
include '../config.php';
$event_code = $_SESSION['event_code'];

// Create connection
$conn = mysqli_connect($host, $user, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// create sql command
$sql = sprintf("INSERT INTO rider (event_name, place_id ,event_code) VALUES ('%s','%s','%s')", $event_name , $place_id ,$substring_place_id);
// $sql = sprintf("INSERT INTO host (event_name) VALUES ('%s')", $event_name );
// $sql = sprintf("INSERT INTO host (place_id) VALUES ('%s')" , $place_id );

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    echo $sql;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);


?>
