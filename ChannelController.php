<?php

session_start();

// autoload function
function __autoload($className){
	require_once './model/'. $className .'.php';
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
	$userId = $_GET['@$^^%@@^@^$^@'];
	$page = $_GET['page'];
	
	if (isset($_SESSION['user'])){
	
		$user = json_decode($_SESSION['user']);
		$sessuionUserId = $user->userId;
		
		//<!-- =-=-=-=-=-=-=  get data for loget  users  =-=-=-=-=-=-= -->\\
		if ($userId === $sessuionUserId){
			$userId = $sessuionUserId;	
		}
		
		try {
			$userData = new UserDAO();
			$user = $userData->getAllUserData($userId);
			
			// user data
			$channelName = $user->username;
			$channelBanner = $user->profilBanner;
			$channelPic = $user->profilPicName;
			$subscribers = $user->subscribers;
			
			include './logInHeader.php';
			include './channel'.$page.'.php';
			
		}catch (PDOException $e){
		
			header('Location: 404.php', true , 302);
		}catch (Exception $e){
			
			header('Location: 404.php', true , 302);
		}
	}
	//<!-- =-=-=-=-=-=-=  get data for other users when SESSION missed  =-=-=-=-=-=-= -->\\
	else{
		try {
			$userData = new UserDAO();
			$user = $userData->getAllUserData($userId);
			
			// user data
			$channelName = $user->username;
			$channelBanner = $user->profilBanner;
			$channelPic = $user->profilPicName;
			$subscribers = $user->subscribers;
			
			include './header.php';
			include './channel'.$page.'.php';
		}catch (PDOException $e){
				
			header('Location: 404.php', true , 302);
		}catch (Exception $e){
				
			header('Location: 404.php', true , 302);
		};
	}
} else{
	header('Location: 404.php', true , 302);
}



