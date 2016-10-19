<html>
	<head>
		<!-- Meta -->
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- CSS -->
	    <link rel="stylesheet" type="text/css" href="./css/host.css">
	    <!-- Google API javascript reference -->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRZPYPla3xVeKG2j7-981GNrVjn3UMCwI&libraries=places&callback=initAutocomplete"
	     async defer></script>
	    <!-- Google Map Placement API -->
	    <script src="./js/host_google_maps.js"></script>
	    <!-- Formoid Stuff -->
	    <link rel="stylesheet" href="formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
	    <script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>
		<script type="text/javascript" src="formoid_files/formoid1/formoid-solid-blue.js"></script>
		<!-- Functions -->
		<script type="text/javascript" src="./js/functions.js"></script>
	
	</head>

	<body class="blurBg-false" style="background-color:#EBEBEB">
		<div class = "title page">
			"Host an Event"		
		</div>


<!-- Start Formoid form-->
<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
	<div class="title">
		<h2>Create Event</h2>
	</div>
	<div class="element-input">
		<label class="title"></label>
		<div class="item-cont">
			<input class="large" type="text" name="input" placeholder="Event Name"/>
			<span class="icon-place"></span>
		</div>

		<div class="element-separator"><hr>
			<h3 class="section-break-title">Map</h3>
		</div>

	</div>
			<!-- Maps placement -->
		<input id="pac-input" class="controls" type="text" placeholder="Search Box">
		<div id="map" style="width:80%px; height:500px"></div>
	<div class="submit">
		<input type="submit" value="Submit"/>
	</div>
	</form>
	<p class="frmd">
		<a href="http://formoid.com/v29.php">web forms</a> 
		Formoid.com 2.9
	</p>
<!-- Stop Formoid form-->

				

			<li>
				Rides Progress <div id = "addressArea" ></div>
			</li>




		</div>
	</body>

</html>