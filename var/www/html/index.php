<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta name="color-scheme" content="light dark">
		<link rel="stylesheet" href="css/pico.classless.min.css">
		<title>Welcome to gingras.family!</title>
	</head>
	<body>
		<header>
			<h1>Welcome to gingras.family!</h1>
		</header>
		<main>
			<section id="users">
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
			</section>
			<section id="getting-started">
				<h2>Getting Started</h2>
				<ol>
					<li>Create and send me an SSH key</li>
					<li>SSH to gingras.family using your username</li>
					<li>Edit files in <code>~/pulic_html</code></li>
					<li>Navigate to <a href="#">https://gingras.family/~yourname</a> to see your website!</li>
				</ol>
			</section>
		</main>
	</body>
</html>
