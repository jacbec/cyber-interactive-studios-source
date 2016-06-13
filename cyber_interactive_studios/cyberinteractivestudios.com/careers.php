<?php 
require '../@/sessions.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Careers | Cyber Interactive Studios</title>
			
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
				<div class="">
					<h2 class="h">Positions<h2>
						<p class="p">
							Our positions are of a different kind as of now. We are not looking to employ people, but looking for people to join our team. We are just starting off. 
						</p>
				</div>
			</div>
			<div class="area">
				<div class="col_3 f_left" style="margin-left: 30px;">
					<h2 class="h">Programmer<h2>
						<p>
							The programming position will require you to know C#. C++, Objective-C, Java, and Python will be a bonus. Your job will require you to program Android, IOS, and PC applications. You will also be programming games for PC, Wii U, PS4, and XBox One. Our games will be made with Unity.
						</p>
					<footer>
						<a href="programmer.php" target="_blank">Apply-Programmer</a>
					</footer>
				</div>
				<div class="col_3 f_left">
					<h2 class="h">Web Designer<h2>
						<p>
							The web designer position will require you to know HTML5, CSS3, and JavaScript. Ajax, jQuery, PHP, and MySQL would be a bonus. The software you will need to know how to use are Photoshop, Notepad++, and possibly Dreamweaver. 
						</p>
					<footer>
						<a href="webdesigner.php" target="_blank">Apply-Web Designer</a>
					</footer>
				</div>
			</div>
			<div class="area">
				<div class="col_3 f_left" style="margin-left: 30px;">
					<h2 class="h">2D Artist<h2>
						<p>
							The artist position will require you to know how to draw. Some things you will be drawing are logos, maps, landscapes, buildings, characters, animals, sprite sheets, items, and UIs. We are not choosy about the software you use as long as it gets the job done and gets it done right.
						</p>
					<footer>
						<a href="artist.php" target="_blank">Apply-2D Artist</a>
					</footer>
				</div>
				<div class="col_3 f_left">
					<h2 class="h">3D Graphic Designer<h2>
						<p>
							The graphic designers position will require you to know how to use Maya. Some other options would be to know how to use Mudbox, 3DsMax, Zbrush, or Blender. We prefer you to know how to use Maya, but we are just starting off so we do not have a set tool yet. Who knows if you are good with the tool you use, maybe you can persuade our thoughts. Some 3D graphic designs you will be designing are weapons, items, landscapes, buildings, animals, characters, and possibly UIs.
						</p>
					<footer>
						<a href="graphicdesigner.php" target="_blank">Apply-3D Graphic Designer</a>
					</footer>
				</div>
			</div>
			<div class="area">
				<div class="col_3 f_left" style="margin-left: 270px;">
					<h2 class="h">Animator<h2>
						<p>
							The animator position will require you to know how to do the things similar to the graphic designer. Instead of knowing how to model 3D objects, you will need to know how to animate 2D and 3D objects in at least Maya. Some other options would be to know how to use 3DsMax or Blender. We prefer you to know how to use Maya, but we are just starting off so we do not have a set tool yet. Who knows if you are good with the tool you use, maybe you can persuade our thoughts. Some animations will be making are for animals, characters, sprite sheets, and environments.
						</p>
					<footer>
						<a href="animator.php" target="_blank">Apply-Animator</a>
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