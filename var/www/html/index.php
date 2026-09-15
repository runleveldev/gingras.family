<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to gingras.family!</title>
		<meta name="viewport" content="width=device-width" />
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
		<h2>Getting Started</h2>
		<ol>
			<li>Create and send me an SSH key</li>
			<li>SSH to gingras.family using your username</li>
			<li>Edit files in <code>~/pulic_html</code></li>
			<li>Navigate to <a href="#">https://gingras.family/~yourname</a> to see your website!</li>
		</ol>
	</body>
</html>
