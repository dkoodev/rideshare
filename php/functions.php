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

	$query = mysqli_query($get_drivers);
	$results = array();
	while($line = mysqli_fetch_assoc($query)){
	    $results[] = $line;
	}
	echo $results['4'];
?>
	<script type="text/javascript">

	    var js_row_of_drivers = <?php echo json_encode($row_of_drivers); ?>;
	    var js_row_of_riders =  <?php echo json_encode($row_of_riders); ?>;
	    for (var i = 0; i < js_row_of_drivers.length; i++) {
	    	console.log(js_row_of_drivers[i]);
	    };

	    for (var i = 0; i < js_row_of_riders.length; i++) {
	    	console.log(js_row_of_riders[i]);
	    };

	</script>

<?php

	$result = shell_exec('python functions.py');
	echo $result;


	mysqli_close($conn);
?>
