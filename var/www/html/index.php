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
							<a href="https://www.chiark.greenend.org.uk/~sgtatham/putty/">PuTTY</a> is the de-facto standard on Windows. After installing it, refer to <a href="https://the.earth.li/~sgtatham/putty/0.85/htmldoc/Chapter8.html#pubkey-puttygen">Chapter 8: Using public keys for SSH authentication</a> for generating and using SSH keys for authentication. I specifically need the public key in the format per the section <a href="https://the.earth.li/~sgtatham/putty/0.85/htmldoc/Chapter8.html#puttygen-pastekey">8.2.12 ‘Public key for pasting into OpenSSH authorized_keys file’</a>.
						</p>
					</details>
					<details name="ssh-os">
						<summary role="button">MacOS</summary>
						<p>MacOS can follow similar instructions to Linux below, but if you prefer a GUI based approach, <a href="https://secretive.dev/">Secretive</a> is an interesting option that securely stores the private key in the MacOS Secure Enclave.</p>
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
			<section id="about">
				<h2>About</h2>
				<p>gingras.family is an intentionally simple website. Every family member is entitled to a user account on a shared Linux server which will grow and have more services as time goes on. To start with, the server is a shared web hosting platform. Based on the Apache2 webserver, every user gets a workspace to host HTML, PHP, or CGI applications. By copying files into your home directory under <code>~/public_html</code> those files are immediately visible on the site under the <code>/~username</code> path. Under that path you can do anything you can imagine. Maybe you host a personal blog built with a static site generator. Maybe you want to develop PHP applications. Maybe you want to put pictures of your cat in a scrapbook. Whatever it is, if you can build it, you can host it.</p>
				<p>While you're free to organize your home directory however you see fit, the server itself is not a shared endeavour. I have to work pretty diligently to ensure that everyone is able to stay secure in an ever evolving online landscape. If you were to ask a modern security analyst if sharing a server between this many people is a good idea they'd probably call you crazy, but I'm determined to make it work. That said, I don't want to be a dictator over what you can do. If you find you need a change to the server's configuration outside of what you're able to make happen in your home directory, the server's important configuration is available at <a href="https://github.com/runleveldev/gingras.family">https://gitub.com/runleveldev/gingras.family</a>. You can file issues for bugs or feature requests, or, if you're inclined, submit a pull request for direct changes.</p>
				<p>There's more to come in the future. Once I finish the shared web hosting configuration, I'm hoping to add a simple email service and maybe a database in the future to allow for full stack LAMP development. Lastly, I'm here to help. I want this to be a learning environment as well as a creative one. If you need additional help getting setup or finding out how to do something please reach out. Or, if you figure out something, let's turn it into a guide for everyone to benefit from. We can all invent a better internet together.</p>
			</section>
		</main>
	</body>
</html>
