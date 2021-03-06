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
		$pages = array("Video","Playlist","Settings","LikedChannels", "Discusion", "About");
		try {
			$userData = new UserDAO();
			$user = $userData->getAllUserData($userId);
			if (in_array($page, $pages)	&& $user->userId === $userId){
				// user data
				$channelName = $user->username;
				$channelBanner = $user->profilBanner;
				$channelPic = $user->profilPicName;
				$subscribers = $user->subscribers;
				
				// visit channel
				if (isset($_SESSION['user'])){
					$userSession = json_decode($_SESSION['user']);
					$sessuionUserId = $userSession->userId;
					$result = $userData->checkUserVisitchannel($user->userId, $sessuionUserId);
					if ($result !== $sessuionUserId  && $user->userId !==$sessuionUserId) {
						$userData->addUserToVisitedTabel($user->userId, $sessuionUserId);
					}
				}
				include 'view/channel'.$page.'.php';
				die();
				
			}else{
				include '404.php';
				die();
			}
		}catch (PDOException $e){
			include '501.php';
			die();
		}catch (Exception $e){
			$a = $e->getMessage();
			echo $a;
			include '404.php';
			die();
		}	
	}else{
		include '404.php';
		die();
	}
} else{
	include '404.php';
	die();
}
?>