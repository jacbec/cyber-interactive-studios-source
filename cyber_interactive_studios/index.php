<?php
if(!@$_SESSION['is_admin'] == 1)
{
	header("Location: http://cyberinteractivestudios.com");
}
?>
