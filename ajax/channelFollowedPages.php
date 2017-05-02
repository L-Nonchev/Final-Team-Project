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
		
		$usersID = $userData->allFollowedPages($userId, $offset);
		
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
				'cntVideos' => $cntVideos,
				'views' => $user->views
			);
		}
		http_response_code ( 200 );
		echo json_encode($usersArray);
		die();
	} catch (Exception $e){
		http_response_code ( 500 );
		echo json_encode(array(
				"error" =>  "Something went wrong, try again"
		));
		die();
	}	
}

?>
