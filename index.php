<!DOCTYPE html>



<html>
	<body>
		<?php
			include '../config.php';
			if($link){
				echo "Connection Made";

			}else{
				echo "Connection Failed";
			}
			$file_path = "../start.html";

			$fileContents=file_get_contents($file_path);
			$newHtmlContent=preg_replace("/<div class=\"main\">(.*)</div>/i",'<div class="main">Some text here</div>',$fileContents);
			file_put_contents($file_path,$newHtmlContent);
			
		?>

		<div class = "title page">
			"Welcome to Ride Share"		
		</div>

		<div>
			<li>
				<form action="host.php">
    				<input type="submit" value="Host an Event" />
				</form>
			</li>

			<li>
				<form action="driver_validation.php">
    				<input type="submit" value="Become a Driver" />
				</form>
			</li>
				
			<li>
				<form action="rider_validation.php">
    				<input type="submit" value="I Need to be Picked Up" />
				</form>
			</li>

			<li>
				Track Rides Progress
			</li>
		</div>

	</body>
</html>