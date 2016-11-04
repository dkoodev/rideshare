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

	$get_drivers = sprintf("SELECT driver_name,place_id FROM driver WHERE event_code = '%s'", $event_code);

	$row_of_drivers = mysqli_fetch_assoc( mysqli_query($conn, $get_drivers));

	$get_riders= sprintf("SELECT * FROM rider WHERE event_code = '%s'", $event_code);

	$row_of_riders = mysqli_fetch_assoc(mysqli_query($conn, $get_riders));
	echo $row_of_riders[0];

	$query = mysqli_query($conn, $get_drivers);

	$results = array();
	while($line = mysqli_fetch_assoc($query)){
	    $results[] = $line;
	}

	// This is the data you want to pass to Python
	// $data = array('as', 'df', 'gh');

	// Execute the python script with the JSON data
	$shell_result = shell_exec('python ../python/functions.py ' . escapeshellarg(json_encode($results)));
	echo "after shell_result";

	echo $shell_result;


	// Decode the result
	$resultData = json_decode($result, true);

	// This will contain: array('status' => 'Yes!')
	var_dump($resultData);
	echo "<br><br><br><br>";
	mysqli_close($conn);
?>
