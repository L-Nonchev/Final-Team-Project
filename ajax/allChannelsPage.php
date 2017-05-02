<?php
// autoload function
function __autoload($className){
	require_once '../model/'. $className .'.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	try {
		$userData = new UserDAO();
		if (isset($_GET['offset']) && isset($_GET['orderBy'])) {
			$offset = $_GET['offset'];
			$orderBy = $_GET['orderBy'];
			// get ordered
			switch ($orderBy) {
				case "1": $orderBy = 'views DESC' ; break;
				case "2": $orderBy = 'u.join_date DESC' ; break;
				case "3": $orderBy = 'u.username' ; break;
				case "4": $orderBy = 'u.username DESC' ; break;
				default: $orderBy = 'views DESC' ; break;
			}
			// get channels infos
			$channels = $userData->getInfoAbouthChannels($orderBy, $offset);
			for ($index = 0; $index < count($channels); $index++){
				$cntVideos = $userData->getVideosCount($channels[$index]['user_id']);
				$channels[$index]['videoCnt'] = $cntVideos;
			}
		}
		// get more info
		if (isset($_GET['orderBy']) && isset($_GET['usesho']) ){
			$like = $_GET['usesho'];
			if (!preg_match("/^[- _ a-zA-Z0-9 ()]*$/",$like)) {
				http_response_code ( 400 );
				echo json_encode(array("User ERROR: Only letters ,numbers , - , _ , ( ) and white space allowed."));
				die();
			} else {
				$orderBy = $_GET['orderBy'];
				$channels = $userData->searchChannels($like, $orderBy);
				for ($index = 0; $index < count($channels); $index++){
					$cntVideos = $userData->getVideosCount($channels[$index]['user_id']);
					$channels[$index]['videoCnt'] = $cntVideos;
				}
			}	
		}
		http_response_code ( 200 );
		echo json_encode($channels);
	} catch (Exception $e){
		http_response_code ( 500 );
	}
}
?>
