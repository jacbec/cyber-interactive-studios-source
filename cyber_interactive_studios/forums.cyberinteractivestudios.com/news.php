<?php 
require '../@/sessions.php';
require '../@/functions.php';
require '../@/db_connect.php'; 
?>
<?php
$_SESSION['page'] = 'news';
if(isset($_POST['create']))
{
	$errors = "";
	$messages = "";
	
	$topic_title = $_POST['topic_title'];
	$topic_body = $_POST['topic_body'];
	
	
	if(empty($topic_title) || empty($topic_body))
	{
		$errors .= "Error:\n All fields are required.\n";
	}
	
	if(empty($errors))
	{
		$date = date('F d\, Y');
		
		change_db($link, $db_forum);
		$topic_page = mysqli_prep($link, $_SESSION['page']);
		$topic_user_id = mysqli_prep($link, $_SESSION['user_id']);
		$topic_user_username = mysqli_prep($link, $_SESSION['user_username']);
		$topic_title = mysqli_prep($link, $_POST['topic_title']);
		$topic_body = mysqli_prep($link, $_POST['topic_body']);
		$topic_is_locked = mysqli_prep($link, 0);
		$created_date = mysqli_prep($link, $date);
		
		$sql = "INSERT INTO topics (topic_page, topic_user_id, topic_user_username, topic_title, topic_body, topic_is_locked, created_date) VALUES ('$topic_page', '$topic_user_id', '$topic_user_username', '$topic_title', '$topic_body', '$topic_is_locked', '$created_date')";
		
		if(mysqli_query($link, $sql))
		{
			header("Location: http://forums.cyberinteractivestudios.com/news.php");
			
		}
		else
		{
			$errors .= "Error:\n Could not create topic. " .mysqli_error($link);
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cyber Interactive Studios News Topics | forums.cyberinteractivestudios.comm</title>
			
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
	<?php if(isset($_GET['create_topic']) && $_SESSION['is_admin'] == 1): ?>
				<h2 class="h">Cyber Interactive Studios Create News Topics</h2>
					<p class="p" style="text-align: center;">
						Welcome to the Cyber Interactive Studios Create News Topics page. Here you can create topics about news we find important for others to read and talk about.
					</p>
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
				<form id="create_topic" name="create_topic_form" action="" method="post" enctype="multipart/form-data">
					<label>Topic Name:</label>
					<input placeholder="Enter topic name" tabindex="1" type="text" name="topic_title" required>
					<label></label>
					<div>
						<textarea id="topic_text" placeholder="" tabindex="25" rows="15" name="topic_body" required></textarea>
					</div>
					<br />
					<div style="text-align: left;">
						<input style="color: #00000;" type="submit" name="create" value="Create">
						<input style="color: #00000;" type="reset" name="reset" value="Reset">
					</div>
				</form>
	<?php else: ?>
				<h2 class="h">Cyber Interactive Studios News Topics</h2>
					<p class="p" style="text-align: center;">
						Welcome to the Cyber Interactive Studios News Topics page. Here you can browse and talk about any news we have posted.
					</p>
				<div class="discussion_forum">
					<div class="discussion_label_top">
						<ul>
							<li class="row_1">Cyber Interactive Studios News</li>
							<li class="row_2">replies</li>
							<li class="row_3">Last Reply</li>
							<li class="f_right"><a href="#" id="first_button"><img src="http://style.cyberinteractivestudios.com/img/up.png" width="15" height="15"></a></li>
						</ul>
					</div>
					<div class="discussion_body" id="first_body">
						<?php
							change_db($link, $db_forum);
							$sql = "SELECT * FROM topics WHERE topic_page = '{$_SESSION['page']}'"; 
							if($result = mysqli_query($link, $sql))
							{
								while($row = mysqli_fetch_array($result))
								{
									echo '<ul>
											<li class="row_1"><img src="http://style.cyberinteractivestudios.com/img/default_profile.png" width="30" height="30"><div><a href="topic.php?id=' .$row['topic_id'] .'">' .$row['topic_title'] .'</a></div><div style="font-size: 10px;">' .$row['topic_user_username'] .'</div></li>
											<li class="row_2"><div>replies: </div></li><li class="row_3">Last Reply: </li>
										  </ul>';
								}
							}
							else
							{
								die (mysqli_error($link));
							} 
						?>
						
					</div>
					<div class="discussion_label_bottom">
						<ul><li><?php if(@$_SESSION['is_admin'] == 1){ echo '<a href="?create_topic">Create Topic</a>'; } ?></li></ul> 
					</div>
				</div>
			</div>
	<?php endif; ?>
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