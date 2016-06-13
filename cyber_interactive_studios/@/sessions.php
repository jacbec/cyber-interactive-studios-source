<?php
session_name('cyberinteractivestudios');
session_set_cookie_params(0, '/', '.cyberinteractivestudios.com');
session_start();

if(isset($_GET['log_out']))
{
	session_set_cookie_params(-1209600, '/', '.cyberinteractivestudios.com');
	session_regenerate_id(true);
	session_unset();
	session_destroy();
	
	header("Location: http://cyberinteractivestudios.com/login.php");
	exit;
}
?>