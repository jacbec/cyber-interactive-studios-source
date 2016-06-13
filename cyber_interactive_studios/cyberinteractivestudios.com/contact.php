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
		<title>Contact | Cyber Interactive Studios</title>
			
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
				<h2 class="h">To Get In Touch</h2>
					<p class="p">
						To get in touch with us just fill out the form below and we will get back to you as soon as possible. All of the fields are required for the email to be sent. The form is self explanatory, but I will give information on how to fill it out. In the name field enter your first and last name. Your last name is not needed or required, but will help us out. In the email field enter you email. In the reason field, give a reason like Fix A PC, Need A Website, or Reporting Bugs. As for the message field, just leave us a message. Give us your phone number if you prefer us to contact you by phone instead, just make sure you tell us what the best time to call would be. After you are finished with the form click the send button and if your email was sent successfully, you will see a message display saying so. If it did not send successfully, an error message will display with a brief reason why.
					</p>
			</div>
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
				<label>
					Name: <input placeholder="Enter your name" tabindex="1" type="text" name="user_name" required autofocus>
				</label>
				<label>
					Email: <input placeholder="Enter your email" tabindex="2" type="email" name="user_email" required>
				</label>
				<label>
					Reason: <input placeholder="Enter your reason" tabindex="2" type="text" name="user_reason" required>
				</label>
				<label>
					Message:<textarea placeholder="Enter your message" tabindex="5" rows="5" name="user_message" required></textarea>
				</label>
				<input style="color: #000000;" type="submit" name="send" value="Send">
				<input style="color: #000000;" type="reset" value="Reset">
				<div style="text-align: center;">
					<a href="#"><img src="http://style.cyberinteractivestudios.com/img/twitter.png" width="40px" height="40px" alt=""></a>
					<a href="#"><img src="http://style.cyberinteractivestudios.com/img/facebook.png" width="40px" height="40px" alt=""></a>
				</div>
			</form>
		</div>
		<!------------ Footer ------------>
		 <footer>
			<span><strong>&copy; 2015 Cyber Interactive Studios</strong><br>
			All Rights Reserved</span>
		</footer>
	</body>
</html>