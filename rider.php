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
		
	</head>

	<body class="blurBg-false" style="background-color:#EBEBEB">
		<div class = "title page">
			"I Need to be Picked Up!"		
		</div>
<!-- PHP form validation -->



		<!-- Start Formoid form-->
		<form class="formoid-solid-blue"  style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
			<div class="title">
				<h2>I Need to be Picked Up!</h2>
			</div>
			<div class="element-input">
				<label class="title"></label>
				<div class="item-cont">
					<input class="large" type="text" name="rider_name" placeholder="Rider Name"/>
					<span class="icon-place"></span>
				</div>


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

	// bring in db configure 
	include '../config.php';
	// define variables and set to empty values

	// function test_input($data) {
	//   	$data = trim($data);
	//   	$data = stripslashes($data);
	//   	$data = htmlspecialchars($data);
	//   	return $data;
	// }

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$rider_name = $place_id = "";
		// $doc = new DomDocument;
		// // We need to validate our document before refering to the id
		// $doc->validateOnParse = true;
		// $doc->Load('host.php');
		// $docElement = $doc->getElementById('addressArea') ;
		// $place_id = DOMinnerHTML($docElement);
		// $place_id = test_input($_POST['variable']);

		$place_id = $_POST["place_id"];
	  	$rider_name = $_POST["rider_name"];
	  	// $place_id = test_input($_POST['variable']);

		// Create connection
		$conn = mysqli_connect($host, $user, $password, $db);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		// create sql command
		$sql = sprintf("INSERT INTO rider (rider_name,place_id) VALUES ('%s','%s')", $rider_name , $place_id );
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
	
?>

	    <!-- Google Map Placement API -->
	    <script src="./js/host_google_maps.js"></script>
	    <!-- Google API javascript reference -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBipA0YTrMPK1wx2Ok4DXNj7NTiiLVGpVY&libraries=places&callback=initAutocomplete"
	     async defer></script>
		<script scr="./js/jquery-3.1.1.js"
</html>