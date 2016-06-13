<?php 
require '../@/sessions.php';
require '../@/functions.php';
require '../@/db_connect.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>forums.cyberinteractivestudios.comm | Cyber Interactive Studios</title>
			
		<meta charset="utf-8">

		<meta name="description" content="Cyber Interactive Studios is a team dedicated to all thing programming and IT. We develop websites, rent servers, fix PCs, and build PCs. We also make Android, IOS, and PC applications, along with games for Wii U, PS4, Xbox1, and PC.">
		<meta name="keywords" content="Games Development, Application Development, Website Development, Fix PCs, Build PCs, Rent Servers, Lawrenceburg IN, Near 47025 ">
		<meta name="author" content="Cyber Interactive Studios">

			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/style.css">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/form.css">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/forum.css">	
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">
			<link rel="shortcut icon" href="http://style.cyberinteractivestudios.com/img/favicon.ico">

			<script src="http://style.cyberinteractivestudios.com/js/jquery-1.11.2.min.js"></script>
			<script src="http://style.cyberinteractivestudios.com/js/sticky.js"></script>
			<script src="http://style.cyberinteractivestudios.com/js/slide.js"></script>
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
								echo '<li><a href="http://cyberinteractivestudios.com/profile.php" target="_blank">Profile</a></li>';
								echo '<li><a href="?log_out">Log Out</a></li>';
							}
							else if(@$_SESSION['user_username'])
							{
								echo '<li><a href="http://cyberinteractivestudios.com/profile.php" target="_blank">Profile</a></li>';
								echo '<li><a href="?log_out">Log Out</a></li>';
							}
							else
							{
								echo '<li><a href="http://cyberinteractivestudios.com/login.php" target="_blank">Create Profile</a></li>';
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
						<li style="padding-left: 0px;"><a href="http://cyberinteractivestudios.com/index.php">Home</a></li>
						<li><a href="http://cyberinteractivestudios.com/about.php">About Us</a></li>
						<li><a href="http://cyberinteractivestudios.com/contact.php">Contact</a></li>
						<li><a href="http://cyberinteractivestudios.com/services.php">Services</a></li>
						<li><a href="http://cyberinteractivestudios.com/careers.php">Careers</a></li>
						<li><a href="index.php">Forums</a></li>
					</ul>
				</nav>
			</div>
			<!-- About Us ------------------------------------------------------------------------------------------------>
			<div class="forum_area" style="padding-top: 150px;">
<?php if(@$_SESSION['user_username']): ?>
				<h2 class="h">Cyber Interactive Studios Forums</h2>
					<p class="p" style="text-align: center;">
						Welcome to Cyber Interactive Studios forums page. Here you can browse topics that others have posted or read and talk about any topic we have posted.
					</p>
				<div class="discussion_forum">
					<div class="discussion_label_top">
						<ul>
							<li class="row_1">Cyber Interactive Studios Discussions</li>
							<li class="row_2">Topics/Replys</li>
							<li class="row_3">Last Reply</li>
							<li class="f_right"><a href="#" id="first_button"><img src="http://style.cyberinteractivestudios.com/img/up.png" width="15" height="15"></a></li>
						</ul>
					</div>
					<div class="discussion_body" id="first_body">
						<ul>
							<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/discussion.png" width="30" height="30"><div><a href="news.php">Cyber Interactive Studios News</a></div><div style="font-size: 10px;">Here you will find topics about news we found to be important.</div></li>
							<li class="row_2"><div>Topics:  </div><div>Replys: </div></li>
							<li class="row_3">Last Reply</li>
						</ul>
						<ul>
							<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/discussion.png" width="30" height="30"><div><a href="updates.php">Cyber Interactive Studios Updates</a></div><div style="font-size: 10px;">Here you will find topics about any update we have made to the website or to our company</div></li>
							<li class="row_2"><div>Topics:  </div><div>Replys: </div></li>
							<li class="row_3">Last Reply</li>
						</ul>
						<ul>
							<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/discussion.png" width="30" height="30"><div><a href="projects.php">Cyber Interactive Studios Projects</a></div><div style="font-size: 10px;">Here you will find topics about our project.</div></li>
							<li class="row_2"><div>Topics:  </div><div>Replys: </div></li>
							<li class="row_3">Last Reply</li>
						</ul>
						<ul>
							<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/discussion.png" width="30" height="30"><div><a href="random.php">Cyber Interactive Studios Random</a></div><div style="font-size: 10px;">Here you will find random topics we post. There could be something special here as well.</div></li>
							<li class="row_2"><div>Topics:  </div><div>Replys: </div></li>
							<li class="row_3">Last Reply</li>
						</ul>
					</div>
					<div class="discussion_label_bottom">
						<ul><li></li></ul>
					</div>
				</div>
				<div class="discussion_forum">
					<div class="discussion_label_top">
						<ul>
							<li class="row_1">Troubleshooting Discussions</li>
							<li class="row_2">Topics/Replys</li>
							<li class="row_3">Last Reply</li>
							<li class="f_right"><a href="#" id="second_button"><img src="http://style.cyberinteractivestudios.com/img/up.png" width="15" height="15"></a></li>
						</ul>
					</div>
					<div class="discussion_body" id="second_body">
						<ul>
							<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/discussion.png" width="30" height="30"><div><a href="pcs.php">Troubleshooting PCs</a></div><div style="font-size: 10px;">Here you will find topics about troubleshooting PCs.</div></li>
							<li class="row_2"><div>Topics:  </div><div>Replys: </div></li>
							<li class="row_3">Last Reply</li>
						</ul>
						<ul>
							<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/discussion.png" width="30" height="30"><div><a href="websites.php">Troubleshooting Websites</a></div><div style="font-size: 10px;">Here you will find topics about troubleshooting websites.</div></li>
							<li class="row_2"><div>Topics:  </div><div>Replys: </div></li>
							<li class="row_3">Last Reply</li>
						</ul>
						<ul>
							<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/discussion.png" width="30" height="30"><div><a href="servers.php">Troubleshooting Servers</a></div><div style="font-size: 10px;">Here you will find topics about troubleshooting servers.</div></li>
							<li class="row_2"><div>Topics:  </div><div>Replys: </div></li>
							<li class="row_3">Last Reply</li>
						</ul>
					</div>
					<div class="discussion_label_bottom">
						<ul><li></li></ul>
					</div>
				</div>
				<div class="discussion_forum">
					<div class="discussion_label_top">
						<ul>
							<li class="row_1">General Discussions</li>
							<li class="row_2">Topics/Replys</li>
							<li class="row_3">Last Reply</li>
							<li class="f_right"><a href="#" id="third_button"><img src="http://style.cyberinteractivestudios.com/img/up.png" width="15" height="15"></a></li>
						</ul>
					</div>
					<div class="discussion_body" id="third_body">
						<ul>
							<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/discussion.png" width="30" height="30"><div><a href="general.php">General Discussions</a></div><div style="font-size: 10px;">Here you will find topics about anything and everything.</div></li>
							<li class="row_2"><div>Topics:  </div><div>Replys: </div></li>
							<li class="row_3">Last Reply</li>
						</ul>
					</div>
					<div class="discussion_label_bottom">
						<ul><li></li></ul>
					</div>
				</div>
			</div>
<?php else: ?>
			<footer style="padding: 30px 0px 30px 0px;">
				To use this page you will need to login or create a profile <a href="http://cyberinteractivestudios.com/login.php">here</a>.
			</footer>
<?php endif; ?>
		</div>
		<!-- Footer ------------------------------------------------------------------------------------------------>
		<footer>
			<span><strong>&copy; 2015 Cyber Interactive Studios</strong><br>
			All Rights Reserved</span>
		</footer>
	</body>
</html>