<?php
// autoload function
function __autoload($className){
	require_once '../model/'. $className .'.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	$offset = $_GET['offset'];
	$userId = $_GET['@$^^%@@^@^$^@'];

	
	try {
		$userData = new UserDAO();
		
		$usersID = $userData->àllFollowedPages($userId, $offset);
		
		$usersArray = array();
		
		for ($index = 0; $index < count($usersID); $index++) {
			$user = $userData->getAllUserData($usersID[$index]['channel_id']);
			
			$cntVideos = $userData->getVideosCount($user->userId);
			
			$usersArray[] = array(
				'userId' =>	$user->userId,
				'username' => $user->username,
				'country' => $user->country,
				'subscribers' => $user->subscribers,
				'profilPic' => $user->profilPicName,
				'profilBanner' => $user->profilBanner,
				'cntVideos' => $cntVideos
			);
		}
		
		echo json_encode($usersArray);
	} catch (Exception $e){
		echo $e->getMessage();
		
	}
	
	
	
// 	$user = $userData->getAllUserData(1);
	
// 	print_r($user);
	
// 	$cntVideos = $userData->getVideosCount($user->userId);
	
// 	print_r($cntVideos);
	
	
	
	
	
	
	
}

?>
