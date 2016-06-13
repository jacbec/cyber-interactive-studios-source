<?php 
require '../@/sessions.php';
require '../@/functions.php';
require '../@/db_connect.php'; 
?>
<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile | Cyber Interactive Studios</title>
			
		<meta charset="utf-8">

		<meta name="description" content="Cyber Interactive Studios is a team dedicated to all thing programming and IT. We develop websites, rent servers, fix PCs, and build PCs. We also make Android, IOS, and PC applications, along with games for Wii U, PS4, Xbox1, and PC.">
		<meta name="keywords" content="Games Development, Application Development, Website Development, Fix PCs, Build PCs, Rent Servers, Lawrenceburg IN, Near 47025 ">
		<meta name="author" content="Cyber Interactive Studios">

			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/style.css">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/form.css">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/profile.css">	
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
			<div class="section" style="padding: 150px 0px 0px 0px;">
<?php if(@$_SESSION['is_admin'] == 1): ?>
	<?php if(@$_SESSION['user_username']): ?>
				<div class="profile_content" style="margin-left: 425px;">
					<div class="left_menu f_left">
						<ul>
							<h2 class="">Services</h2>
								<li><a href="http://cyberinteractivestudios.com/templates.php" target="_blank">Website Templates</a> or <a href="contact.php" target="_blank">Get In Touch</a></li>
								<li><a href="http://cyberinteractivestudios.com/servers.php" target="_blank">Browse Servers</a></li>
								<li><a href="http://cyberinteractivestudios.com/contact.php" target="_blank">Fix a PC</a></li>
								<li><a href="http://cyberinteractivestudios.com/build.php" target="_blank">Build a PC</a></li>
							<h2 class="">Careers</h2>
								<li><a href="http://cyberinteractivestudios.com/programmer.php" target="_blank">Programmer</a></li>
								<li><a href="http://cyberinteractivestudios.com/webdesigner.php" target="_blank">Web Designer</a></li>
								<li><a href="http://cyberinteractivestudios.com/artist.php" target="_blank">2D Artist</a></li>
								<li><a href="http://cyberinteractivestudios.com/graphicdesigner.php" target="_blank">3D Graphic Designer</a></li>
								<li><a href="http://cyberinteractivestudios.com/animator.php" target="_blank">Animator</a></li>
							<h2 class="">Forums</h2>
								<li><a href="http://forums.cyberinteractivestudios.com/news.php" target="_blank">Cyber Interactive Studios News</a></li>
								<li><a href="http://forums.cyberinteractivestudios.com/updates.php" target="_blank">Cyber Interactive Studios Updates</a></li>
								<li><a href="http://forums.cyberinteractivestudios.com/projects.php" target="_blank">Cyber Interactive Studios Projects</a></li>
								<li><a href="http://forums.cyberinteractivestudios.com/random.php" target="_blank">Cyber Interactive Studios Random</a></li>
								<li><a href="http://forums.cyberinteractivestudios.com/pcs.php" target="_blank">Troubleshooting PCs</a></li>
								<li><a href="http://forums.cyberinteractivestudios.com/websites.php" target="_blank">Troubleshooting Websites</a></li>
								<li><a href="http://forums.cyberinteractivestudios.com/servers.php" target="_blank">Troubleshooting Servers</a></li>
								<li><a href="http://forums.cyberinteractivestudios.com/general.php" target="_blank">General Discussions</a></li>
							</ul>
					</div>
					<div class="middle_menu f_left">
						<div class="middle_top_menu">
							<nav>
								<ul style="text-align: center;">
									<li style="margin-left: -80px;"><a href="profile.php">Profile</a></li>
									<li><a href="?account">My Account</a></li>
									<li><a href="?message">Messages</a></li>
									<li><a href="?replies">Replies</a></li>
								</ul>
							</nav>
						</div>
						<div class="col_5">
						<?php if(isset($_GET['account'])): ?>
							<?php elseif(isset($_GET['message'])): ?>
								<?php elseif(isset($_GET['replies'])): ?>
						<?php else: ?>
							<div style="border-bottom: 1px solid rgba(0, 0, 0, 0.4)">
								<p style="padding: 0px 0px 10px 10px;">
									<img src="http://style.cyberinteractivestudios.com/img/default_profile.png" width="100px" height="100px" alt="Profile Picture" title="Profile Picture">
									<?php echo $_SESSION['user_username']; ?>
									<br /><br /><br /><br /><br /><br />
									<?php
									change_db($link, $db_profile);
									$sql = "SELECT * FROM users_extra"; 
									if($result = mysqli_query($link, $sql))
									{
										while($row = mysqli_fetch_array($result))
										{
											echo $row['user_summery'];
										}
									}
									else
									{
										
									} 
									$sql = "SELECT * FROM users_stream"; 
									if($result = mysqli_query($link, $sql))
									{
										while($row = mysqli_fetch_array($result))
										{
											echo $row[''];
										}
									}
									else
									{
										
									} 
									?>
								</p>
							</div>
							<div>
							</div>
						<?php endif; ?>
						</div>
					</div>
					<div class="right_menu f_left">
						<ul>
							<h2 class="">Profiles</h2>
								<?php
									change_db($link, $db_profile);
									$sql = "SELECT * FROM users_info"; 
									if($result = mysqli_query($link, $sql))
									{
										while($row = mysqli_fetch_array($result))
										{
											echo	'<li> 
														<a href="?message">' .$row['user_username'] .'</a>
													</li>';
										}
									}
									else
									{
										die (mysqli_error());
									} 
								?>
						</ul>
					</div>
				</div>
			</div>
	<?php else: ?>
			<footer style="padding: 30px 0px 30px 0px;">
				To use this page you will need to login or create a profile <a href="login.php">here</a>.
			</footer>
	<?php endif; ?>
<?php else: ?>
			<footer style="padding: 30px 0px 30px 0px;">
				This part of the website is under development.
			</footer>
<?php endif; ?>
		</div>
		<!------------ Footer ------------>
		 <footer>
			<span><strong>&copy; 2015 Cyber Interactive Studios</strong><br>
			All Rights Reserved</span>
		</footer>
	</body>
</html>