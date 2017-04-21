<?php

session_start();

// autoload function
function __autoload($className){
	require_once './model/'. $className .'.php';
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
	$userId = $_GET['@$^^%@@^@^$^@'];
	$page = $_GET['page'];
	$page;
	
	

	if (isset($_SESSION['user'])){
	
		$user = json_decode($_SESSION['user']);
		$sessuionUserId = $user->userId;
		//data for  logged user channelVideo
		if ($userId === $sessuionUserId){
			try {
				$userData = new UserDAO();
				$user = $userData->getAllUserData($userId);
			}catch (PDOException $e){
				
				header('Location: 404.php', true , 302);
			}catch (Exception $e){
				
				header('Location: 404.php', true , 302);
			}
			
		}
		// log 
		else{
			// data for other users
			try {
				$userData = new UserDAO();
				$user = $userData->getAllUserData($userId);
			}catch (PDOException $e){
			
				header('Location: 404.php', true , 302);
			}catch (Exception $e){
				
				header('Location: 404.php', true , 302);
			}
		}
		
		// user data
		$userId = $user->userId;
		$channelName = $user->username;
		$channelBanner = $user->profilBanner;
		$channelPic = $user->profilPicName;
		$subscribers = $user->subscribers;
	
		
		include './logInHeader.php';
		include './channel'.$page.'.php';
	}
	// data for other users
	else{
		try {
			$userData = new UserDAO();
			$user = $userData->getAllUserData($userId);
			
			// user data
			$userId = $user->userId;
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
	
	
}



