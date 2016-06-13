<?php 
require '../@/sessions.php';
require '../@/functions.php';
require '../@/db_connect.php'; 
?>
<?php 
if(isset($_POST['reply']))
{
	$errors = "";
	$messages = "";
	
	$reply_body = $_POST['reply_body'];
	
	
	if(empty($reply_body))
	{
		$errors .= "Error:\n You need to fill out the field in order to reply.\n";
	}
	
	if(empty($errors))
	{
		$date = date('F d\, Y');
		
		change_db($link, $db_forum);
		$reply_page = mysqli_prep($link, $_SESSION['page']);
		$reply_id = mysqli_prep($link, $_GET['id']);
		$reply_user_id = mysqli_prep($link, $_SESSION['user_id']);
		$reply_user_username = mysqli_prep($link, $_SESSION['user_username']);
		$reply_body = mysqli_prep($link, $_POST['reply_body']);
		$created_date = mysqli_prep($link, $date);
		
		$sql = "INSERT INTO replies (reply_page, reply_id, reply_user_id, reply_user_username, reply_body, created_date) VALUES ('$reply_page', '$reply_id', '$reply_user_id', '$reply_user_username', '$reply_body', '$created_date')";
		
		if(mysqli_query($link, $sql))
		{
			header('Location: http://' .$_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI']);
		}
		else
		{
			$errors .= "Error:\n Could not create topic. " .mysqli_error($link);
		}
	}
}
if(isset($_GET['delete']))
{
	change_db($link, $db_forum);
	if($result = mysqli_query($link, "DELETE FROM topics WHERE topic_id = '{$_SESSION['delete_topic']}'"))
	{
		if($result = mysqli_query($link, "DELETE FROM replies WHERE reply_id = '{$_SESSION['delete_topic']}'"))
		{
			header('Location: http://forums.cyberinteractivestudios.com/' .$_SESSION['page'] .'.php');
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Topics | forums.cyberinteractivestudios.comm</title>
			
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
				<div class="discussion_forum">
					<div class="discussion_label_top">
						<ul>
							<?php
								change_db($link, $db_forum);
								if($result = mysqli_query($link, "SELECT * FROM topics WHERE topic_id = '{$_GET['id']}' LIMIT 1"))
								{
									if($rows = mysqli_fetch_array($result))
									{
										echo '<li class="row_1 f_left" style="font-size: 18px;">' .$rows['topic_title'] .'</li>';
										echo '<li class="f_right" style="font-size: 18px;">' .$rows['created_date'] .'</li>';
									}
								}
							?>
						</ul>
					</div>
					<div class="topic_body" id="first_body">
						<ul>
							<?php
								change_db($link, $db_forum);
								if($result = mysqli_query($link, "SELECT * FROM topics WHERE topic_id = '{$_GET['id']}' LIMIT 1"))
								{
									if($rows = mysqli_fetch_array($result))
									{
										if($_SESSION['user_username'] == $rows['topic_user_username'])
										{
											$_SESSION['delete_topic'] = $rows['topic_id'];
											
											echo '<li class="row_1" style="width: 100%; border-bottom: 1px solid rgba(0,0,0,0.25);"><img style="padding-bottom: 5px;" src="http://style.cyberinteractivestudios.com/img/default_profile.png" width="50" height="50"><div style="font-size: 16px; padding-top: 15px;">' .$rows['topic_user_username'] .'</div><div class="f_right" style="font-size: 10px; margin-top: -40px; padding-right: 10px;"><a href="?delete" style="text-decoration: none; font-size: 10px;">Delete</a></div></li>';
											echo '<li class="f_left" style="width: 100%; padding: 5px 0px 5px 50px; border-bottom: 1px solid rgba(0,0,0,0.25);"><p style="">' .$rows['topic_body'] .'</p></li>';
										}
										else
										{
											echo '<li class="row_1" style="width: 100%; border-bottom: 1px solid rgba(0,0,0,0.25);"><img style="padding-bottom: 5px;" src="http://style.cyberinteractivestudios.com/img/default_profile.png" width="50" height="50"><div style="font-size: 16px; padding-top: 15px;">' .$rows['topic_user_username'] .'</div></li>';
											echo '<li class="f_left" style="width: 100%; padding: 5px 0px 5px 50px; border-bottom: 1px solid rgba(0,0,0,0.25);"><p style="">' .$rows['topic_body'] .'</p></li>';
										}
									}
								}
								if($result = mysqli_query($link, "SELECT * FROM replies WHERE reply_id = '{$_GET['id']}'"))
								{
									while($rows = mysqli_fetch_array($result))
									{
										echo '<li class="row_1" style="width: 100%; border-bottom: 1px solid rgba(0,0,0,0.25);"><img style="padding-bottom: 5px;" src="http://style.cyberinteractivestudios.com/img/default_profile.png" width="50" height="50"><div style="font-size: 16px; padding-top: 15px;">' .$rows['reply_user_username'] .'</div></li>';
										echo '<li class="f_left" style="width: 100%; padding: 5px 0px 5px 50px; border-bottom: 1px solid rgba(0,0,0,0.25);"><p>' .$rows['reply_body'] .'</p></li>';
									}
								}
							?>
						</ul>
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
					<p class="f_left">
						<img src="http://style.cyberinteractivestudios.com/img/default_profile.png" width="75" height="75">
					</p>
					<form id="reply" name="reply_form" action="" method="post" enctype="multipart/form-data">
						<div>
							<textarea id="topic_text" placeholder="" tabindex="15" rows="5" name="reply_body" required></textarea>
						</div>
						<div style="text-align: left;">
						<input style="color: #00000;" type="submit" name="reply" value="Reply">
						<input style="color: #00000;" type="reset" name="reset" value="Reset">
					</div>
					</form>
				</div>
			</div>
<?php else: ?>
			<footer style="padding: 30px 0px 30px 0px;">
				To use this page you will need to login or create a profile <a href="http://cyberinteractivestudios.com/login.php">here</a>.
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