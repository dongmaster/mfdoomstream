<!DOCTYPE html>

<html>
	<head>
		<title>External IP Address</title>
		<link rel='stylesheet' href='screen.css'/>
		<link rel='shortcut icon' href='favicon.ico'/>
	</head>
	<body>
		<?php
			echo '<p id="ipAddress">Your external IP Address is: '.$_SERVER['REMOTE_ADDR'].'</p>' . '<br>';
		?>
	</body>
</html>
