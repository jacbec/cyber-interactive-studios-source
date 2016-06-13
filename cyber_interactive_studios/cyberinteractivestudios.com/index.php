<?php 
require '../@/sessions.php'; 
require '../@/functions.php';
require '../@/gmail_connect.php';
?>
<?php 
if(isset($_POST['send']))
{
	//Set variables
	$errors = "";
	$messages = "";
	
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_reason = $_POST['user_reason'];
	$user_message = $_POST['user_message'];
	
	//Check and validate fields
	if(empty($user_name) || empty($user_email) || empty($user_reason) || empty($user_message))
	{
		$errors .= "Error:\n All fields are required.\n";
	}

	if(!check_user_email($user_email))
	{
		$errors .= "Error:\n Invalid email address.\n";
	}

	if(empty($errors))
	{
		//Send Email
		$EMAIL->setFrom($user_email, $user_name);
		$EMAIL->addReplyTo($user_email, $user_name);
		$EMAIL->addAddress('cyberinteractivestudios@gmail.com' , '');
	
		$EMAIL->isHTML(true);
		
		$EMAIL->Subject = "Contact form submission: $user_reason";
		
		$EMAIL->Body = $user_message;
		$EMAIL->AltBody = $user_message;
	
		$EMAIL->WordWrap = 50;
	
		if(!$EMAIL->send())
		{
			$errors .= "Error:\n Email not sent.";
		}
		else
		{
			$messages .= "Your Email was sent successfully<br />We will get back to you as soon as possible.";
		}
	}
}
?>		
<!DOCTYPE html>
<html>
	<head>
		<title>Cyber Interactive Studios</title>
			
		<meta charset="utf-8">

		<meta name="description" content="Cyber Interactive Studios is a team dedicated to all thing programming and IT. We develop websites, rent servers, fix PCs, and build PCs. We also make Android, IOS, and PC applications, along with games for Wii U, PS4, Xbox1, and PC.">
		<meta name="keywords" content="Games Development, Application Development, Website Development, Fix PCs, Build PCs, Rent Servers, Lawrenceburg IN, Near 47025 ">
		<meta name="author" content="Cyber Interactive Studios">

			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/style.css">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/form.css">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">	
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">
			<link rel="stylesheet" type="text/css" media="screen" href="http://style.cyberinteractivestudios.com/css/">
			<link rel="shortcut icon" href="http://style.cyberinteractivestudios.com/img/favicon.ico">

			<script src="http://style.cyberinteractivestudios.com/js/jquery-1.11.2.min.js"></script>
			<script src="http://style.cyberinteractivestudios.com/js/sticky.js"></script>
			<script src="http://style.cyberinteractivestudios.com/js/"></script>
			<script src="http://style.cyberinteractivestudios.com/js/"></script>
			<script src="http://style.cyberinteractivestudios.com/js/"></script>
			<script type="application/ld+json">
			{
				"@context": "http://schema.org",
				"@type": "LocalBusiness",
				"address": {
					"@type": "PostalAddress",
					"addressLocality": "Lawrenceburg",
					"addressRegion": "IN",
					"streetAddress": ""
				},
				"description": "Cyber Interactive Studios is a team dedicated to all thing programming and IT. We develop websites, rent servers, fix PCs, and build PCs. We also make Android, IOS, and PC applications, along with games for Wii U, PS4, Xbox1, and PC.",
				"name": "Cyber Interactive Studios",
				"telephone": "812-655-3806"
			}
			</script>
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
			<!-- About Us ------------------------------------------------------------------------------------------------>
			<div class="area" style="padding-top: 150px;">
				<h2 class="h">About Us</h2>
				<p class="p">
					Cyber Interactive Studios is a team dedicated to all things programming and IT. The services we offer are to make websites, rent servers, fix PCs, and build PCs. We also make Android, Apple, and PC applications along with design games for PC, Wii U, Xbox one, and PS4. <a href="about.php">Read More</a>
				</p>
			</div>
			<div class="area">
				<!-- Services ------------------------------------------------------------------------------------------------>
				<div class="col_1 f_left" style="margin-left: 125px;">
					<h2 class="h">Services</h2>
					<ul>
						<li><a href="services.php#website">Need A Website</a></li>
						<li><a href="services.php#server">Rent A Server(Coming Soon)</a></li>
						<li><a href="services.php#fix">Fix A PC</a></li>
						<li><a href="services.php#build">Build A PC(Coming Soon)</a></li>
					</ul>
				</div>
				<!-- Careers ------------------------------------------------------------------------------------------------>
				<div class="col_0 f_left">
					<h2 class="h">Careers</h2>
					<ul>
						<li><a href="programmer.php">Programmer</a></li>
						<li><a href="webdesigner.php">Web Designer</a></li>
						<li><a href="artist.php">Artist</a></li>
						<li><a href="graphicdesigner.php">Graphic Designer</a></li>
						<li><a href="animator.php">Animator</a></li>
					</ul>
				</div>
				<div class="col_1 f_left">
					<h2 class="h">Forums</h2>
					<ul>
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
			</div>
			<!-- Contact ------------------------------------------------------------------------------------------------>
			<h2 class="h">To Get In Touch</h2>
			<?php
				if(!empty($errors))
				{
					echo '<div id="errors"><p>' . nl2br($errors) . '</p></div>';
				}
				if(!empty($messages))
				{
					echo '<div id="messages"><p>' . nl2br($messages) . '</p></div>';
				}
			?>
			<form id="contact_form" name="contact_form" action="" method="post" enctype="multipart/form-data">
				<label>Name:</label>
				<input placeholder="Enter your name" tabindex="1" type="text" name="user_name" required>
				<label>Email:</label>
				<input placeholder="Enter your email" tabindex="2" type="email" name="user_email" required>
				<label>Reason:</label>
				<input placeholder="Enter your reason" tabindex="2" type="text" name="user_reason" required>
				<label>Message:</label>
				<textarea placeholder="Enter your message" tabindex="5" rows="5" name="user_message" required></textarea>
				<input style="color: #000000;" type="submit" name="send" value="Send">
				<input style="color: #000000;" type="reset" value="Reset">
				<div>
					<a href="#" style="margin-left: 200px"><img src="http://style.cyberinteractivestudios.com/img/twitter.png" width="40px" height="40px" alt=""></a>
					<a href="#"><img src="http://style.cyberinteractivestudios.com/img/facebook.png" width="40px" height="40px" alt=""></a>
				</div>
			</form>
		</div>
		<!-- Footer ------------------------------------------------------------------------------------------------>
		<div style="display: none" Itemtype="http://www.data-vocabulary.org/Organization"  itemscope="itemscope">
			<span itemprop="name">Cyber Interactive Studios</span>	  
			<span itemprop="address" itemtype="http://www.data-vocabulary.org/Address" itemscope="itemscope"> 
				<span itemprop="street-address"></span>
				<span itemprop="locality">Lawrenceburg,</span> 
				<span itemprop="region">IN</span>
				<span itemprop="postal-code">47025</span> 
				<span itemprop="tel">(812)-655-3806</span>
			</span>
		</div>
		<footer>
			<span><strong>&copy; 2015 Cyber Interactive Studios</strong><br>
			All Rights Reserved</span>
		</footer>
	</body>
</html>