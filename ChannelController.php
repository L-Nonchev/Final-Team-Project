<?php

session_start();

// autoload function
function __autoload($className){
	require_once './model/'. $className .'.php';
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
	$userId = $_GET['@$^^%@@^@^$^@'];
	$page = $_GET['page'];
	$sessuionUserId = "";
	
	try {
		$userData = new UserDAO();
		$user = $userData->getAllUserData($userId);
			
		// user data
		$channelName = $user->username;
		$channelBanner = $user->profilBanner;
		$channelPic = $user->profilPicName;
		$subscribers = $user->subscribers;
				
	}catch (PDOException $e){
	
		header('Location: view/404.php', true , 302);
	}catch (Exception $e){
			
		header('Location: view/404.php', true , 302);
	}
	
	if (isset($_SESSION['user'])){
		
		$user = json_decode($_SESSION['user']);
// 		$sessuionUserId = $user->userId;

		include 'view//logInHeader.php';
		include 'view/channel'.$page.'.php';
	} else{
		include 'view/header.php';
		include 'view/channel'.$page.'.php';

	}
} else{
	header('Location: 404.php', true , 302);
}



