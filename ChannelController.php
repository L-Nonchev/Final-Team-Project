<?php
// autoload function
function __autoload($className){
	require_once './model/'. $className .'.php';
}
session_start();

if ($_SERVER['REQUEST_METHOD'] === "GET") {
	if (isset($_GET['@$^^%@@^@^$^@']) && isset($_GET['page'])){
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
			include '501.php';
			die();
		}catch (Exception $e){
			$a = $e->getMessage();
			echo $a;
			include '404.php';
			die();
		}
		include 'view/channel'.$page.'.php';
	}else{
		include '404.php';
		die();
	}
	
} else{
	include '404.php';
	die();
}



