<?php
/*
	Connect to GMail account
*/

require 'PHPMailer/class.phpmailer.php';
require 'PHPMailer/class.pop3.php';
require 'PHPMailer/class.smtp.php';
		
$EMAIL = new PHPMailer;

$EMAIL->isSMTP();
$EMAIL->SMTPAuth = true;
//$EMAIL->SMTPDebug = 2;

$EMAIL->Host = 'smtp.gmail.com';
$EMAIL->Username = 'youradress@gmail.com';
$EMAIL->Password = 'yourpassword';
$EMAIL->SMTPSecure = 'tls';
$EMAIL->Port = 587;

?>