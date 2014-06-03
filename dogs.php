<!DOCTYPE html>

<html>
	<head>
		<title>Dogs</title>
		<link rel='stylesheet' href='screen.css'/>
	</head>
	<body>
		<?php
			$pictures = glob('dogs/*');
			$picture = $pictures[array_rand($pictures)];
			echo '<img style="display: block; margin-left: auto; margin-right: auto;" src="'.$picture.'"/>';
		?>
		<script>
			window.addEventListener('click', function() {
				location.reload();
			}, false);
		</script>
	</body>
</html>
