<?php
/*
	Connect to DB_HOST
*/

$DB_HOST = 'Your.domain.com:3306';
$DB_USER = 'youruser';
$DB_PASSWORD = 'yourpassword';

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
if (!$link) 
{
	die("Database connection failed");
}

$db_profile = 'cyber_interactive_studios_profile';
$db_forum = 'cyber_interactive_studios_forum';

function change_db($link, $str)
{
	$db_name = mysqli_select_db($link, $str);
	return $db_name;
}

?>