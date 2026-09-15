<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to gingras.family!</title>
	</head>
	<body>
		<h1>Welcome to gingras.family!</h1>
		<h2>Users</h2>
		<ul>
			<?php
				$homes = scandir('/home');
				foreach ($homes as $home) {
					if (str_starts_with($home, '.')) { continue; }
					if (is_dir("/home/$home/public_html")) {
						echo "<li><a href=\"~$home\">~$home</a></li>";
					}
				}
			?>
		</ul>
	</body>
</html>
