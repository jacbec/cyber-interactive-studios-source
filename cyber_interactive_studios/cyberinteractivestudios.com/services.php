<?php 
require '../@/sessions.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Services | Cyber Interactive Studios</title>
			
		<meta charset="utf-8">

		<meta name="description" content="Cyber Interactive Studios is a team dedicated to all thing programming and IT. We develop websites, rent servers, fix PCs, and build PCs. We also make Android, IOS, and PC applications, along with games for Wii U, PS4, Xbox1, and PC.">
		<meta name="keywords" content="Games Development, Application Development, Website Development, Fix PCs, Build PCs, Rent Servers, Lawrenceburg IN, Near 47025 ">
		<meta name="author" content="Cyber Interactive Studios">

			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/style.css">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">	
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">
			<link rel="shortcut icon" href="http://style.cyberinteractivestudios.com/img/favicon.ico">

			<script src="http://style.cyberinteractivestudios.com/js/jquery-1.11.2.min.js"></script>
			<script src="http://style.cyberinteractivestudios.com/js/sticky.js"></script>
			<script src="http://style.cyberinteractivestudios.com/js/"></script>
			<script src="http://style.cyberinteractivestudios.com/js/"></script>
			<script src="http://style.cyberinteractivestudios.com/js/"></script>
			<script type="text/javascript">
			</script>

	</head>
	<body>
		<!-- Header ------------------------------------------------------------------------------------------------>
		<div class="header">
			<div class="logo">
				<a href="index.php"><img src="http://style.cyberinteractivestudios.com/img/logo.png" alt=""></a>
			</div>
			<p>
				A team dedicated to all things programming and IT.
			</p>
		</div>
		<!-- Content ------------------------------------------------------------------------------------------------>
		<div class="content">
			<!-- Top Menu ------------------------------------------------------------------------------------------------>
			<div class="top_menu">
				<nav>
					<ul style="text-align: right;">
						<?php
							if(@$_SESSION['is_admin'] == 1)
							{
								echo '<li><a href="profile.php" target="_blank">Profile</a></li>';
								echo '<li><a href="?log_out">Log Out</a></li>';
							}
							else if(@$_SESSION['user_username'])
							{
								echo '<li><a href="profile.php" target="_blank">Profile</a></li>';
								echo '<li><a href="?log_out">Log Out</a></li>';
							}
							else
							{
								echo '<li><a href="login.php" target="_blank">Create Profile</a></li>';
							}
						?>
						<li style="margin-right: 50px;"><a href="http://store.cyberinteractivestudios.com/" target="_blank">store.cyberinteractivestudios.com</a></li> 
					</ul>
				</nav>
			</div>
			<!-- Bottom Menu ------------------------------------------------------------------------------------------------>
			<div class="bottom_menu">
				<nav>
					<ul style="text-align: center;">
						<li style="padding-left: 0px;"><a href="index.php">Home</a></li>
						<li><a href="about.php">About Us</a></li>
						<li><a href="contact.php">Contact</a></li>
						<li><a href="services.php">Services</a></li>
						<li><a href="careers.php">Careers</a></li>
						<li><a href="http://forums.cyberinteractivestudios.com/" target="_blank">Forums</a></li>
					</ul>
				</nav>
			</div>
			<div class="area" style="padding-top: 150px;">
				<div class="col_3 f_left" style="margin-left: 30px;">
					<h2 id="website" class="h">Need A Website<h2>
						<p>
							One of the main jobs of this company is making websites. The price for each website varies on the code and time needed. For example a website requiring PHP and Database interaction will cost more than your basic HTML5, CSS3, and JavaScript website. The websites we are able to make can be made with HTML5, CSS3, JavaScript, Ajax, jQuery, PHP, and MySQL so we have you covered. Right now we do not have any quick and easy website templates made, but we are currently working on making some. 
						</p>
					<footer>
						<a href="templates.php" target="_blank">Browse Templates</a> or <a href="contact.php" target="_blank">Get In Touch</a>
					</footer>
				</div>
				<div class="col_3 f_left">
					<h2 id="server" class="h">Rent A Server<h2>
						<h3 style="text-align: center;">Coming Soon</h3>
						<p>
							Our servers are made for many different uses. Rather you need a server for hosting websites or you need a server to host your favourite game, we have what you need. The type of hosting we do include Websites, Databases, games, and VoIP applications. 
						</p>
					<footer>
						<a href="servers.php" target="_blank">Browse Servers</a>
					</footer>
				</div>
			</div>
			<div class="area">
				<div class="col_3 f_left" style="margin-left: 30px;">
					<h2 id="fix" class="h">Fix A PC<h2>
						<p>
							Another main job of this company is fixing PCs. We are very good with PCs and know a lot about them. We will do basic trouble shooting for free, but will charge a fair price on the required repairs. We would also let you know if the PC is worth fixing or if the better option would be to just get a new PC.
						</p>
					<footer>
						<a href="contact.php" target="_blank">Get In Touch</a>
					</footer>
				</div>
				<div class="col_3 f_left">
					<h2 id="build" class="h">Build A PC<h2>
						<h3 style="text-align: center;">Coming Soon</h3>
						<p>
							Building PCs is something we are really passionate about doing. PCs are this companies main asset. There is allot you can do with a PC and want everyone to be able to experience that. The problem with PCs is that they can be a bit on the pricey side. Hopefully we can change that.
						</p>
					<footer>
						<a href="build.php" target="_blank">Build</a>
					</footer>
				</div>
			</div>
		</div>
		<!------------ Footer ------------>
		 <footer>
			<span><strong>&copy; 2015 Cyber Interactive Studios</strong><br>
			All Rights Reserved</span>
		</footer>
	</body>
</html>