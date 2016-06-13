<?php 
require '../@/sessions.php'; 
require '../@/functions.php';
require '../@/gmail_connect.php';
?>
<?php
if(isset($_POST['apply']))
{
	//Set variables
	$errors = ""; 
	$messages = "";
	
	$user_name = $_POST['user_name'];
	$user_number = $_POST['user_number'];
	$user_email = $_POST['user_email'];
	$user_summery = $_POST['user_summery'];
	$user_skills = $_POST['user_skills'];
	$user_education = $_POST['user_education'];
	
	$max_file_size = 100;
	$allowed_extensions = array('docx', 'doc', 'txt', 'rtf');
	$upload_folder = '../@/uploads/';

	$resume_name =  basename($_FILES['user_resume']['name']);
	$type_of_file = substr($resume_name, strrpos($resume_name, '.') + 1);
	$size_of_file = $_FILES['user_resume']['size']/1024;
	
	//Check if file is the right size
	if($size_of_file > $max_file_size ) 
	{
		$errors .= "Error:\n Size of file should be less than $max_file_size MB.\n";
	}

	//Check if file has the right extensions
	$allowed_ext = false;
	for($i=0; $i<sizeof($allowed_extensions); $i++) 
	{ 
		if(strcasecmp($allowed_extensions[$i],$type_of_file) == 0)
		{
			$allowed_ext = true;		
		}
		
		if(empty($_FILES['user_resume']['tmp_name']))
		{
			$allowed_ext = true;
		}
	}

	if(!$allowed_ext)
	{
		$errors .= "Error:\n The uploaded file is not supported file type. ".
		" Only the following file types are supported: ".implode(',',$allowed_extensions) .".\n";
	}
	
	//Check and validate fields
	if(empty($user_name) || empty($user_number) || empty($user_email))
	{
		$errors .= "Error:\n Name, Number, and Email are required fields.\n" ;
	}
	
	if(empty($user_summery) && empty($user_skills) && empty($user_education) && empty($_FILES['user_resume']['tmp_name']))
	{
		$errors .= "Error:\n You need to fill out the form or attach a resume.\n";
	}
	
	if(!empty($user_summery) && empty($user_skills) && empty($user_education) && empty($_FILES['user_resume']['tmp_name']))
	{
		$errors .= "Error:\n If you are not attaching a resume, the Summery, Skills, and Education fields are required.\n";
	}
	
	if(empty($user_summery) && !empty($user_skills) && empty($user_education) && empty($_FILES['user_resume']['tmp_name']))
	{
		$errors .= "Error:\n If you are not attaching a resume, the Summery, Skills, and Education fields are required.\n";
	}
	
	if(empty($user_summery) && empty($user_skills) && !empty($user_education) && empty($_FILES['user_resume']['tmp_name']))
	{
		$errors .= "Error:\n If you are not attaching a resume, the Summery, Skills, and Education fields are required.\n";
	}
	
	if(!empty($user_summery) && !empty($user_skills) && empty($user_education) && empty($_FILES['user_resume']['tmp_name']))
	{
		$errors .= "Error:\n If you are not attaching a resume, the Summery, Skills, and Education fields are required.\n";
	}
	
	if(empty($user_summery) && !empty($user_skills) && !empty($user_education) && empty($_FILES['user_resume']['tmp_name']))
	{
		$errors .= "Error:\n If you are not attaching a resume, the Summery, Skills, and Education fields are required.\n";
	}
	
	if(!empty($user_summery) && empty($user_skills) && !empty($user_education) && empty($_FILES['user_resume']['tmp_name']))
	{
		$errors .= "Error:\n If you are not attaching a resume, the Summery, Skills, and Education fields are required.\n";
	}

	if(!check_user_email($user_email))
	{
		$errors .= "Error:\n Invalid email address.\n";
	}
	
	if(!check_user_number($user_number))
	{
		$errors .= "Error:\n Invalid US phone number. \n Example: 555-555-5555\n";
	}

	if(empty($errors))
	{
		//Check/Set folder path
		$path_of_file = $upload_folder . $resume_name;
		$tmp_path = $_FILES['user_resume']['tmp_name'];
		
		if(is_uploaded_file($tmp_path))
		{
		    if(!copy($tmp_path,$path_of_file))
		    {
		    	$errors .= "Error:\n Error while copying the uploaded file.\n";
		    }
		}
		
		//Send Email
		$EMAIL->From = $user_email;
		$EMAIL->FromName = $user_name;
		$EMAIL->addReplyTo($user_email, $user_name);
		$EMAIL->addAddress('cyberinteractivestudios@gmail.com' , '');
	
		$EMAIL->isHTML(true);
		
		$EMAIL->Subject = 'Contact form submission: Web Designer';
		
		$EMAIL->Body = "Name: " .$user_name ."<br />Number: " .$user_number ."<br />Email: " .$user_email 
		."<br /><br />Summery: <br />" .$user_summery ."<br /><br />Computer Skills: <br />" .$user_skills 
		."<br /><br />Education: <br />" .$user_education;
		$EMAIL->AltBody = "Name: " .$user_name ."<br />Number: " .$user_number ."<br />Email: " .$user_email 
		."<br /><br />Summery: <br />" .$user_summery ."<br /><br />Computer Skills: <br />" .$user_skills 
		."<br /><br />Education: <br />" .$user_education;
		
		$EMAIL->addAttachment($path_of_file);
	
		$EMAIL->WordWrap = 50;
		
		if(!$EMAIL->send())
		{
			$errors .= "Error:\n Application not sent.\n";
		}
		else
		{
			$messages .= "Your application was sent successfully<br />We will get back to you as soon as possible.\n";
		}
	}
}		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Web Designer Application | Cyber Interactive Studios</title>
			
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
				<h2 class="h">Web Designer Application</h2>
					<p class="p">
						This is the application page for web designers. The fields below are laid out like a simple resume. You do how ever have the option to attach a resume instead. The resume file size cannot be larger than 100mb, and must be in the format of ".docx", ".doc", ".txt", or ".rtf". There are a few ways to complete this form. You can fill out the form and leave the resume field blank, you can leave the fields blank and just attach a resume, or you can fill out the fields and attach a resume. The name, number, and email fields are required no matter what. The form is self explanatory, but I will give information on how to fill it out. In the name field enter your first and last name. Your last name is not required, but will look better on your part. In the number field enter your 10 digit phone number with dashes like this, 555-555-5555. This form only excepts US numbers. If you have an out of country number get in touch with us <a href="contact.php">here</a>. In the email field enter your email. In the summery field just tell us a little about your self, if you have a portfolio about some of your work you can put the link to it in this field. In the web designer skills field tell us the web development languages you know. Tell us how many websites you built, things like that. In the education field tell us if you have a college degree and if so from where. If you do not have a college degree tell us the last grade you completed. A college degree is not mandatory just helps on the decision. As for the resume just click the resume button and navigate to your resume. Once you found it double-click it or click on it and click the open button. After you are finished with the form click the apply button and if your application was sent successfully, you will see a message display saying so. If it did not send successfully, an error message will display with a brief reason why.
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
			<form id="apply_form" name="webdesigner_form" action="" method="post" enctype="multipart/form-data">
				<label>
					Name: <input placeholder="Enter your name" tabindex="1" type="text" name="user_name" autofocus required>
				</label>
				<label>
					Number: <input placeholder="Enter your number" tabindex="1" type="text" name="user_number" required>
				</label>
				<label>
					Email: <input placeholder="Enter your email" tabindex="2" type="email" name="user_email" required>
				</label>
				<label>
					Summery: <textarea placeholder="Tell us about your self" tabindex="5" rows="5" name="user_summery" ></textarea>
				</label>
				<label>
					Web Development Skills: <textarea placeholder="Tell us about your skills" tabindex="5" rows="5" name="user_skills" ></textarea>
				</label>
				<label>
					Education: <textarea placeholder="Tell us about your education" tabindex="5" rows="5" name="user_education" ></textarea>
				</label>
				<input id="input_file" type="file" name="user_resume">
				<label id="input_file_label" style="color: black;" for="input_file">Resume</label>
				<input style="color: black;" type="submit" name="apply" value="Apply">
				<input style="color: black;" type="reset" value="Reset">
			</form>
		</div>
		<!------------ Footer ------------>
		 <footer>
			<span><strong>&copy; 2015 Cyber Interactive Studios</strong><br>
			All Rights Reserved</span>
		</footer>
	</body>
</html>