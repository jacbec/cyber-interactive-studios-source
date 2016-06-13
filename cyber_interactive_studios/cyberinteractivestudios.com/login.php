<?php 
require '../@/sessions.php'; 
require '../@/functions.php';
require '../@/db_connect.php';
?>
<?php
if(@$_SESSION['user_username'])
{
	session_unset();
	session_destroy();
}
?>
<?php
if(isset($_POST['login']))
{
	//Set my variables
	$login_errors = "";
	$login_messages = "";
	
	change_db($link, $db_profile);
	$user_username = mysqli_prep($link, $_POST['user_username']);
	$user_password = mysqli_prep($link, $_POST['user_password']);
	
	//Check to make sure no fields are empty
	if(empty($user_username) ||  empty($user_password))
	{
		$login_errors .= "Error:\n Username and password are required to login.\n";
	}
	
	//Check if errors are empty
	if(empty($login_errors))
	{
		//Check if user exists and if so checks if password matches
		$found_user = attempt_login($user_username, $user_password);
		
		//If user exists and password matches 
		if($found_user)
		{
			//Set sessions
			$_SESSION['user_id'] = $found_user['user_id'];
			$_SESSION['user_username'] = $found_user['user_username'];
			$_SESSION['is_admin'] = $found_user['is_admin'];
			
			if(@$_POST['user_remember'] == 1)
			{
				session_set_cookie_params(1209600, '/', '.cyberinteractivestudios.comm');
				session_regenerate_id(true);
				
			}
			
			header("location: profile.php");
		}
		else
		{
			$login_errors .= "Error:\n Username/Password is invalid";
		}
	}
}

if(isset($_POST['create']))
{
	//Set my variables
	$create_errors = "";
	$create_messages = "";

	$user_username = $_POST['user_username'];
	$user_first_name = $_POST['user_first_name'];
	$user_last_name = $_POST['user_last_name'];
	$user_email = $_POST['user_email'];
	$user_confirm_email = $_POST['user_confirm_email'];
	$user_password = $_POST['user_password'];
	$user_confirm_password = $_POST['user_confirm_password'];
	
	//Check to make sure no fields are empty
	if(empty($user_username) || empty($user_first_name) || empty($user_last_name) || empty($user_email) || empty($user_confirm_email) || empty($user_password) || empty($user_confirm_password))
	{
		$create_errors .= "Error:\n All fields are required.\n";
	}
	
	//Check that username is available
	change_db($link, $db_profile);
	$result = mysqli_query($link, "SELECT * FROM users_info WHERE user_username = '$user_username'");
	if(mysqli_num_rows($result) > 0)
	{
		$create_errors .= "Error:\n Username already in use.\n";
	}
	
	$result = mysqli_query($link, "SELECT * FROM users_info WHERE user_email = '$user_email'");
	if(mysqli_num_rows($result) > 0)
	{
		$create_errors .= "Error:\n Email already in use.\n";
	}
	
	//Check if unsername is 2- 20 characters long
	$user_username_length = strlen($user_username);
	if($user_username_length < 2 || $user_username_length > 20)
	{
		$create_errors .= "Error:\n Username can only be 2 - 20 characters long.\n";
	}
	
	//Check if username only has valid characters
	if(!check_user_username($user_username))
	{
		$create_errors .= "Error\n Username can only be (a-z, A-Z, 0-9, dashes(-), and underscores( _ ).)\n";
	}
	
	//Check if email only has valid characters
	if(!check_user_email($user_email))
	{
		$create_errors .= "Error:\n Invalid email address.\n";
	}
	
	//Check if confirm email matches email
	$user_email_check = check_length($user_email);
	$user_confirm_email_check = check_length($user_confirm_email);
	if($user_confirm_email_check != $user_email_check)
	{
		$create_errors .= "Error:\n Confirm email does not match email.\n";
	}
	
	//Check if confirm password matches password
	if($user_confirm_password != $user_password)
	{
		$create_errors .= "Error:\n Confirm password does not match password.\n";
	}
	
	//Check if errors are empty
	if(empty($create_errors))
	{
		//Prepare information for insertion into database
		change_db($link, $db_profile);
		$user_username = mysqli_prep($link, $user_username);
		$user_first_name = mysqli_prep($link, $user_first_name);
		$user_last_name = mysqli_prep($link, $user_last_name);
		$user_email = mysqli_prep($link, $user_email);
		$user_password = mysqli_prep($link, $user_password);
		
		//Create hashed password
		$hashed_password = password_encrypt($user_password);
		
		//Insert the prepared information into the database 
		$sql = "INSERT INTO users_info (user_username, user_first_name, user_last_name, user_email, user_password, is_admin) VALUES ('$user_username', '$user_first_name', '$user_last_name', '$user_email', '$hashed_password', '0')";
		
		if(mysqli_query($link, $sql))
		{
			$create_messages .= "Profile created. Please login to validate your profile.";
		}
		else
		{
			$create_errors .= "Error\n There was a problem try again later.\n";
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login | Cyber Interactive Studios</title>
			
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
			<script src="http://style.cyberinteractivestudios.com/js/password.js"></script>
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
				<h2 class="h">Profile</h2>
					<p class="p">
						Welcome to Cyber Interactive Studios profile page. Here is were you can create a profile or login to an existing one to get the ability to buy from store.cyberinteractivestudios.com as well as post on our forums. It is easy to login. Just enter your username and password, click login and you are all set. If you do not have a profile with us, just fill out the create profile form. The form is self explanatory, but I will give information on how to fill it out. All the fields are required in order to create a profile. The information you enter can be changed once your profile is created. In the first name field, enter your fist name. In the last name field, enter you last name. In the email field, enter you email. In the confirm email field, just re-enter your email. In the username field, enter a username. Usernames can only contain (a-z, A-Z, 0-9, dashes(-), and underscores( _ ). The username can only be 2-20 charters long). By default your username will be displayed when you post to the forums. Once the profile is created, you can choose to have your name or username as the displayed name. In the password field, enter a password that only you know. In the confirm password field, just re-enter your password. The password strength box will indicate how strong your password is. The password strength does not have to be strong in order for you to create a password. After you are finished with the form click the create button and if your profile was created successfully, you will see a message display saying so. If it did not create successfully, an error message will display with a brief reason why.
					</p>
				<div class="col_3 f_left" style="text-align: left; margin-left: 25px;">
					<h2 class="h">Login</h2>
					<form id="profile_form" name="profile_form" action="" method="post" enctype="multipart/form-data">
						<label>
							Username: <input placeholder="Enter username" tabindex="1" type="text" name="user_username" autocomplete="off" required>
						</label>
						<label>
							Password: <input placeholder="Enter password" tabindex="2" type="password" name="user_password" autocomplete="off" required>
						</label>
						<label>
							&nbsp;Remember me: <input type="checkbox" name="user_remember" value="1"><br />
						</label>
						<input style="color: black;" type="submit" name="login" value="Login">
						<input style="color: black;" type="reset" name="reset" value="Reset">
					</form>
				</div>
				<div class="col_3 f_left" style="text-align: left; border-left: 1px solid #009cff;">
					<h2 class="h">Create Profile</h2>
					<form id="profile_form" name="create_profile_form" action="" method="post" enctype="multipart/form-data">
						<label>
							Username: <input placeholder="Enter username" tabindex="1" type="text" name="user_username" autocomplete="off" required>
						</label>
						<label>
							First Name: <input placeholder="Enter first name" tabindex="1" type="text" name="user_first_name" autocomplete="off" required>
						</label>
						<label>
							Last Name: <input placeholder="Enter last name" tabindex="1" type="text" name="user_last_name" autocomplete="off" required>
						</label>
						<label>
							Email: <input placeholder="Enter email" tabindex="1" type="email" name="user_email" autocomplete="off" required>
						</label>
						<label>
							Confirm Email: <input placeholder="Confirm email" tabindex="1" type="email" name="user_confirm_email" autocomplete="off" required>
						</label>
						<label>
							Password: <input placeholder="Enter password" tabindex="2" type="password" name="user_password" onkeyup="password_strength(this.value)" autocomplete="off" required>
						</label>
						<label>
							Confirm Password: <input placeholder="Confirm password" tabindex="2" type="password" name="user_confirm_password" autocomplete="off" required>
						</label>
						<label for="password_strength">
							Password Strength: <div id="password_strength" class="strength_0">Password not entered</div>
						</label>
						<input style="color: black;" type="submit" name="create" value="Create">
						<input style="color: black;" type="reset" name="reset" value="Reset">
					</form>
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