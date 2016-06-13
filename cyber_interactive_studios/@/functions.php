<?php
function mysqli_prep($link, $string) 
{
	global $link;
	
	return mysqli_real_escape_string($link, $string);
}

function confirm_query($result_set) 
{
	if(!$result_set) 
	{
		die("Database query failed: " . mysql_error());
	}
}

function find_all_users($str) 
{
	global $link;
	
	$query = "SELECT * FROM users_info ";
	if ($str) 
	{
		$query .= "WHERE visible = 1 ";
	}
	$query .= "ORDER BY position ASC";
	$user_set = mysqli_query($link, $query);
	confirm_query($user_set);
	return $user_set;
}

function find_user_by_id($user_id) 
{
	global $link;
	
	$user_id = mysqli_prep($link, $user_id);
	
	$query = "SELECT * ";
	$query .= "FROM users_info ";
	$query .= "WHERE user_id = {$user_id} ";
	$query .= "LIMIT 1";
	$user_set = mysqli_query($link, $query);
	confirm_query($user_set);
	if ($user = mysqli_fetch_array($user_set)) {
		return $user;
	} else {
		return NULL;
	}
}

function find_user_by_username($user_username) 
{
	global $link;
	
	$user_username = mysqli_prep($link, $user_username);
	
	$query = "SELECT * ";
	$query .= "FROM users_info ";
	$query .= "WHERE user_username = '{$user_username}' ";
	$query .= "LIMIT 1";
	$user_set = mysqli_query($link, $query);
	confirm_query($user_set);
	if ($user = mysqli_fetch_array($user_set)) {
		return $user;
	} else {
		return NULL;
	}
}

function find_user_by_first_name($user_first_name) 
{
	global $link;
	
	$user_first_name = mysqli_prep($link, $user_first_name);
	
	$query = "SELECT * ";
	$query .= "FROM users_info ";
	$query .= "WHERE user_first_name = '{$user_first_name}' ";
	$query .= "LIMIT 1";
	$user_set = mysqli_query($link, $query);
	confirm_query($user_set);
	if ($user = mysqli_fetch_array($user_set)) {
		return $user;
	} else {
		return NULL;
	}
}

function find_user_by_last_name($user_last_name) 
{
	global $link;
	
	$user_last_name = mysqli_prep($link, $user_last_name);
	
	$query = "SELECT * ";
	$query .= "FROM users_info ";
	$query .= "WHERE user_last_name = '{$user_last_name}' ";
	$query .= "LIMIT 1";
	$user_set = mysqli_query($link, $query);
	confirm_query($user_set);
	if ($user = mysqli_fetch_array($user_set)) {
		return $user;
	} else {
		return NULL;
	}
}

function find_user_by_email($user_email) 
{
	global $link;
	
	$user_email = mysqli_prep($link, $user_email);
	
	$query = "SELECT * ";
	$query .= "FROM users_info ";
	$query .= "WHERE user_email = '{$user_email}' ";
	$query .= "LIMIT 1";
	$user_set = mysqli_query($link, $query);
	confirm_query($user_set);
	if ($user = mysqli_fetch_array($user_set)) {
		return $user;
	} else {
		return NULL;
	}
}
	
function check_user_username($user_username)
{
	return preg_match('/^[a-z\d-_]{2,20}$/i', $user_username);
}

function check_user_number($user_number)
{
	return preg_match('/^[0-9]{1,3}-[0-9]{3}-[0-9]{4}$/', $user_number);
}

function check_user_email($user_email)
{
	return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $user_email);
}

function check_length($length)
{
	return trim(strtolower($length));
}

function password_encrypt($user_password)
{
	$format_and_salt = ['cost' => 11, 'salt' => mcrypt_create_iv(32, MCRYPT_DEV_URANDOM),];
	$hashed_password = password_hash($user_password, PASSWORD_BCRYPT, $format_and_salt);
	return $hashed_password;
}

function attempt_login($user_username, $user_password)
{
	$user = find_user_by_username($user_username);
	if($user)
	{
		if(password_verify($user_password, $user['user_password']))
		{
			return $user;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

/*function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
function confirm_logged_in() {
	if (!logged_in()) {
		redirect_to('login.php');
	}
}*/
?>