<html>
	<head>
		<!-- Meta -->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- CSS -->
	    <link rel="stylesheet" type="text/css" href="./css/host.css">

	    <!-- Formoid Stuff -->
	    <link rel="stylesheet" href="formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
	    <script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>
		<script type="text/javascript" src="formoid_files/formoid1/formoid-solid-blue.js"></script>
		<!-- Functions -->
		<?php
		session_start();
		

		include '../config.php';
		$event_code = $_SESSION['event_code'];

		echo $event_code;
		$conn = mysqli_connect($host, $user, $password, $db);
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$get_event_name = sprintf("SELECT event_name FROM host WHERE event_code = '%s'", $event_code);
		$query_result = mysqli_query($conn, $get_event_name);

		if (!$query_result) {
		    echo 'Could not run query: ' . mysqli_error();
		    exit;
		}
		$row = mysqli_fetch_array($query_result);

		$event_name = $row[0];


		$get_drivers = sprintf("SELECT driver_name,place_id FROM driver WHERE event_code = '%s'", $event_code);
		if (!$query_result) {
		    echo 'Could not run query: ' . mysqli_error();
		    exit;
		}
		$row_of_drivers = mysqli_query($conn, $get_drivers);
		
		$get_riders= sprintf("SELECT rider_name,place_id FROM rider WHERE event_code = '%s'", $event_code);
		if (!$query_result) {
		    echo 'Could not run query: ' . mysqli_error();
		    exit;
		}
		$row_of_riders = mysqli_query($conn, $get_riders);

		?>
	</head>

	<body class="blurBg-false" style="background-color:#EBEBEB">
		<div class = "title page">
			Check Progress		
		</div>
<!-- PHP form validation -->



		<!-- Start Formoid form-->
		<form class="formoid-solid-blue"  style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
			<div class="title">
				<h2>Check Progress of Your Event</h2>
			</div>
			<div class="element-input">
				<label class="title"> 
					<h3 class="section-break-title"> Event Name: <?php echo $event_name; ?> </h3>
				</label>

				<?php
					echo "Drivers: <br>";
					while ($row = mysqli_fetch_array($row_of_drivers))  
					{
					    echo "<label class=\"title\"> 
					    			<h3 class=\"section-break-title\"> 
						    			Driver: " .$row["driver_name"]. 
						    			"<br>
						    			Starting Location:" . $row["place_id"] 
					    			."</h3>
							</label>";


					}
					
					echo "<br> Riders: <br>";

					while ($row = mysqli_fetch_array($row_of_riders))  
					{
					    echo "<label class=\"title\"> 
					    			<h3 class=\"section-break-title\"> 
						    			Rider: " .$row["rider_name"]. 
						    			"<br>
						    			Starting Location:" . $row["place_id"] 
					    			."</h3>
							</label>";

					}

				?>


				<div class="element-separator"><hr>
					<h3 class="section-break-title">Map</h3>
				</div>

				<!-- Maps placement -->
				<input id="pac-input" class="controls" type="text" placeholder="Search Box" name="searchbox_input">
				<div id="map" style="width:80%px; height:500px"></div>
				
				<div>				
					Area Code: 
					<input id = "addressArea" name= "place_id">
				</div>
			</div>

			<div class="submit">
				<input type="submit" value="Submit" />
			</div>
		</form>
		<p class="frmd">
			<a href="http://formoid.com/v29.php">web forms</a> 
			Formoid.com 2.9
		</p>
		<!-- Stop Formoid form-->		


	</body>
<?php

	// for ($i=0; $i < count($row_of_drivers); $i++) { 
	// 	echo "<script type=\"text/javascript\">
 //    			var javaScriptVar = ". echo $someVar; .";
	// 		 </script>";
	// }
	// for ($j=0; $j <count($row_of_riders) ; $j++) { 
	// 	# code...
	// }
	// session_start();
	// bring in db configure 
	// define variables and set to empty values

	// function test_input($data) {
	//   	$data = trim($data);
	//   	$data = stripslashes($data);
	//   	$data = htmlspecialchars($data);
	//   	return $data;
	// }

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$driver_name = $place_id = "";
		// $doc = new DomDocument;
		// // We need to validate our document before refering to the id
		// $doc->validateOnParse = true;
		// $doc->Load('host.php');
		// $docElement = $doc->getElementById('addressArea') ;
		// $place_id = DOMinnerHTML($docElement);
		// $place_id = test_input($_POST['variable']);

		$place_id = $_POST["place_id"];
	  	$driver_name = $_POST["driver_name"];
	  	// $place_id = test_input($_POST['variable']);

		// Create connection
		// $conn = mysqli_connect($host, $user, $password, $db);
		// Check connection
	  	// if (!$conn) {
	  	//     die("Connection failed: " . mysqli_connect_error());
	  	// }
		// create sql command
		$sql = sprintf("INSERT INTO driver (driver_name,place_id,event_code) VALUES ('%s','%s','%s')", $driver_name , $place_id , $event_code);
		// $sql = sprintf("INSERT INTO host (event_name) VALUES ('%s')", $event_name );
		// $sql = sprintf("INSERT INTO host (place_id) VALUES ('%s')" , $place_id );

		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		    echo $sql;
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	mysqli_close($conn);
	include'./php/functions.php';
?>

	    <!-- Google Map Placement API -->
	    <script src="./js/host_google_maps.js"></script>
	    <!-- Google API javascript reference -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ_0Uy4w3qTnmYQCnGZZIcHQk5Hu9j4MA&libraries=places&callback=initMap"
	     async defer></script>
		<script scr="./js/jquery-3.1.1.js"
</html>