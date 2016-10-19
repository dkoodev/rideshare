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
				<a href = "host.php">
					Host an Event
				</a>
			</li>

			<li>
				Be a Driver
			</li>
				

			<li>
				I need to be picked up
			</li>
			<li>
				Track Rides Progress
			</li>
		</div>

	</body>
</html>