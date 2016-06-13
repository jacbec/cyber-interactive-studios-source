<?php 
require '../@/sessions.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>About Us | Cyber Interactive Studios</title>
			
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
				<div class="col_2 f_left" style="margin-left: 125px;">
					<h2 class="h">Cyber Interactive Studios</h2>
						<p>
							<img src="http://style.cyberinteractivestudios.com/img/logo.png" alt="Cyber Interactive Studios Logo" title="Cyber Interactive Studios Logo">Cyber Interactive Studios is a team dedicated to all things programming and IT. The services we offer are to make websites, rent servers, fix PCs, and build PCs. We also make Android, Apple, and PC applications along with design games for PC, Wii U, Xbox one, and PS4. We lack a 3D designer and animator right now so the game designing is a little delayed. We do however have a few mini projects we made following tutorials on Unity's website. You will need to install Unity Web Player when prompt to and allow through your browser to play them. These are as I said mini games. We made them as a way to learn Unity. <br /><br /><a href="proj/Roll_A_Ball.php" target="_blank">Roll_A_Ball</a><br /><a href="proj/Space_Shooter.php" target="_blank">Space_Shooter</a><br /><a href="proj/Nightmares.php" target="_blank">Nightmares</a><br /><br /> This team is only made up three people so far. The plan is to start off small and work our way up. As of now we are located in southern Indian and southern Ohio. Once we have a team we will establish our actual headquarters. As soon as we finish this website we will hammer down on either learning 3D design and animation or find us someone so we can get some actual projects done.
						</p>
				</div>
				<div class="col_2 f_left">
					<h2 class="h">Founder</h2>
						<p>
							<img src="http://style.cyberinteractivestudios.com/img/Jacob Beck.png" width="100px" height="100px" alt="Jacob Beck" title="Jacob Beck"> My name is Jacob Beck. I am the founder of Cyber Interactive Studios. I am married with 3 kids, 2 boys and a girl. I am in college in pursuit of my degree in Software Development. I really enjoy programming and tinkering with computers. I have built 3 computers so far and fixed hundreds of them. I can program in C++ and C#(I am not including scripting languages or website development. To me they are completely different). Right now I am in the process of learning Java and Objective-C.
						</p>
				</div>
				<div class="col_2 f_left">
					<h2 class="h" >Co-founder</h2>
						<p>
							<img src="http://style.cyberinteractivestudios.com/img/Corey Farmer.jpg" width="100px" height="100px" alt="Corey Farmer" title="Corey Farmer"> Hey, my name is Corey Farmer. I am the co-founder of Cyber Interactive Studios. I am engaged and I do not have any kids right now, but one day. I can program in C++ and C#. Same as Jacob said, I plan to learn more languages here soon. I am also very good with Adobe Photoshop, so if you need a logo I have you covered.
						</p>
				</div>
				<div class="col_1 f_left">
					<h2 class="h">Co-founder</h2>
						<p>
							<img src="http://style.cyberinteractivestudios.com/img/Darrell McClarie.png" width="100px" height="100px" alt="Darrell McClarie" title="Darrell McClarie">
						</p>
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