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
								echo "<li><a href=\"~$home\">~$home</a></li>", PHP_EOL;
							}
						}
					?>
				</ul>
			</section>
			<section id="getting-started">
				<h2>Getting Started</h2>
				<ol>
					<li>Create and send me an SSH key</li>
					<details name="ssh-os">
						<summary role="button">Windows</summary>
						<p>
							<a href="https://www.chiark.greenend.org.uk/~sgtatham/putty/">PuTTY</a> is the de-facto standard on Windows. After installing it, refer to <a href="https://the.earth.li/~sgtatham/putty/0.85/htmldoc/Chapter8.html#pubkey-puttygen">Chapter 8: Using public keys for SSH authentication</a> for generating and using SSH keys for authentication.
						</p>
					</details>
					<details name="ssh-os">
						<summary role="button">MacOS</summary>
						<p>MacOS can follow similar instructions to Linux below, but if you prefer a GUI based approach, <a href="https://secretive.dev/">Secretive</a> is an interesting option that securely stores the private key in the MacOS secure enclave.</p>
					</details>
					<details name="ssh-os">
						<summary role="button">Linux</summary>
						<ol>
							<li>Open your terminal of choice.</li>
							<li>Run <code>ssh-keygen</code>.</li>
							<li>Accept the default file path.</li>
							<li>Enter and confirm a password.</li>
							<li>Copy and send the contents of the pulic key file. This should have been placed in your home directory such as <code>~/.ssh/id_rsa.pub</code> or <code>~/.ssh/id_ed25519.pub</code>.</li>
						</ol>
					</details>
					<li>SSH to gingras.family using your username</li>
					<li>Edit files in <code>~/pulic_html</code></li>
					<li>Navigate to <a href="#"><?= $_SERVER['HTTPS'] ? 'https' : 'http' ?>://<?= $_SERVER['HTTP_HOST'] ?>/~yourname</a> to see your website!</li>
				</ol>
			</section>
		</main>
	</body>
</html>
