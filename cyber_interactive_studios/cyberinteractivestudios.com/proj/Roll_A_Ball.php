<?php 
require '../../@/sessions.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Unity Web Player | Roll-A-Ball</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			
		<meta name="description" content="Cyber Interactive Studios is a team dedicated to all thing programming and IT. We develop websites, rent servers, fix PCs, and build PCs. We also make Android, IOS, and PC applications, along with games for Wii U, PS4, Xbox1, and PC.">
		<meta name="keywords" content="Games Development, Application Development, Website Development, Fix PCs, Build PCs, Rent Servers, Lawrenceburg IN, Near 47025 ">
		<meta name="author" content="Cyber Interactive Studios">

			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/style.css">
			<link rel="shortcut icon" href="http://style.cyberinteractivestudios.com/img/favicon.ico">
			<style type="text/css">
			<!--
			body {
				font: 14px/18px "Times New Roman", Times, serif;
				color: #000000;
				background-color: #FFFFFF;
			}
			a:link, a:visited {
				color: #000000;
			}
			a:active, a:hover {
				color: #009cff;
			}
			p.header {
				font-size: small;	
			}
			p.header span {
				font-weight: bold;
			}
			p.footer {
				font-size: x-small;
				text-align: center;
			}
			div.body {
				margin: auto;
				width: 960px;
			}
			div.broken,
			div.missing {
				margin: auto;
				position: relative;
				top: 50%;
				width: 193px;
			}
			div.broken a,
			div.missing a {
				height: 63px;
				position: relative;
				top: -31px;
			}
			div.broken img,
			div.missing img {
				border-width: 0px;
			}
			div.broken {
				display: none;
			}
			div#unityPlayer {
				cursor: default;
				height: 600px;
				width: 960px;
			}
			-->
			</style>

			<script src="http://style.cyberinteractivestudios.com/js/jquery-1.11.2.min.js"></script>
			<script src="http://style.cyberinteractivestudios.com/js/sticky.js"></script>

			<script type='text/javascript' src='https://ssl-webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/jquery.min.js'></script>
			<script type="text/javascript">
			<!--
			var unityObjectUrl = "http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject2.js";
			if (document.location.protocol == 'https:')
				unityObjectUrl = unityObjectUrl.replace("http://", "https://ssl-");
			document.write('<script type="text\/javascript" src="' + unityObjectUrl + '"><\/script>');
			-->
			</script>
			<script type="text/javascript">
			<!--
				var config = {
					width: 960, 
					height: 600,
					params: { enableDebugging:"0" }
					
				};
				var u = new UnityObject2(config);

				jQuery(function() {

					var $missingScreen = jQuery("#unityPlayer").find(".missing");
					var $brokenScreen = jQuery("#unityPlayer").find(".broken");
					$missingScreen.hide();
					$brokenScreen.hide();
				
					u.observeProgress(function (progress) {
						switch(progress.pluginStatus) {
							case "broken":
								$brokenScreen.find("a").click(function (e) {
									e.stopPropagation();
									e.preventDefault();
									u.installPlugin();
									return false;
								});
								$brokenScreen.show();
							break;
							case "missing":
								$missingScreen.find("a").click(function (e) {
									e.stopPropagation();
									e.preventDefault();
									u.installPlugin();
									return false;
								});
								$missingScreen.show();
							break;
							case "installed":
								$missingScreen.remove();
							break;
							case "first":
							break;
						}
					});
					u.initPlugin(jQuery("#unityPlayer")[0], "Roll_A_Ball.unity3d");
				});
			-->
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
				<h2 class="h"><span>Unity Web Player | </span>Roll-A-Ball</h2>
				<div class="body">
					<div id="unityPlayer">
						<div class="missing">
							<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!">
								<img alt="Unity Web Player. Install now!" src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63" />
							</a>
						</div>
						<div class="broken">
							<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now! Restart your browser after install.">
								<img alt="Unity Web Player. Install now! Restart your browser after install." src="http://webplayer.unity3d.com/installation/getunityrestart.png" width="193" height="63" />
							</a>
						</div>
					</div>
				</div>
				<p class="footer">&laquo; created with <a href="http://unity3d.com/unity/" title="Go to unity3d.com">Unity</a> &raquo;</p>
			</div>
		</div>
		<!------------ Footer ------------>
		<footer>
			<span><strong>© 2015 Cyber Interactive Studios</strong><br>
			All Rights Reserved</span>
		</footer>
	</body>
</html>
