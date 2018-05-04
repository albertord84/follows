<?php 

// Script By Qassim Hassan, wp-time.com

session_start();

if( isset($_SESSION['user_info']) ){ // check is user is logged in
	$title = "Logged in as ".$_SESSION['user_info']['data']['full_name']; // page title
	//$title = 0;
}

else{
	$title = "Login With Instagram"; // page title
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
</head>
<body>

<?php

	if( isset($_SESSION['user_info']) ){ // if user is logged in
		$user_info = $_SESSION['user_info']; // get user info array
		$full_name = $_SESSION['user_info']['data']['full_name']; // get full name
		$username = $_SESSION['user_info']['data']['username']; // get username
		$bio = $_SESSION['user_info']['data']['bio']; // get bio
		$ID = $_SESSION['user_info']['data']['id']; // get bio
		$website = $_SESSION['user_info']['data']['website']; // get bio
		$media_count = $_SESSION['user_info']['data']['counts']['media']; // get media count
		$followers_count = $_SESSION['user_info']['data']['counts']['followed_by']; // get followers
		$following_count = $_SESSION['user_info']['data']['counts']['follows']; // get following
		$profile_picture = $_SESSION['user_info']['data']['profile_picture']; // get profile picture
		?>
		<h2>Welcome <?php echo $full_name; ?>!</h2>
		<p>Your username: <?php echo $username; ?></p>
		<p>Your bio: <?php echo $bio; ?></p>
		<p>Your website: <a href="<?php echo $website; ?>"><?php echo $website; ?></a></p>
		<p>Media count: <?php echo $media_count; ?></p>
		<p>Followers count: <?php echo $followers_count; ?></p>
		<p>Following count: <?php echo $following_count; ?></p>
		<p>Your ID: <?php echo $ID; ?></p>
		<p><img src="<?php echo $profile_picture; ?>"></p>
		<p><a href="logout.php">Logout?</a></p>
		<?php
	}

	else{ // if user is not logged in
		echo '<a href="login.php">Login With Instagram</a>';
	}

?>

<p><a target="_blank" href="http://wp-time.com/login-with-instagram-using-api-in-php/">Download Script & Usage</a></p>

</body>
</html>