<?php
// autoload function
function __autoload($className){
	require_once '../model/'. $className .'.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	$channelId = $_GET['CH'];
	$userId = $_GET['UID'];
	
	
	try {
		$userData = new UserDAO();
		if ($userData->cheangeChannelFollowed($userId, $channelId)){
				echo json_encode(array(
						'result' => true
				));
		}else{
			echo json_encode(array(
					'result' => false
			));
		}
	}catch (Exception $e){
		
	}
}



if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	$data = json_decode($_POST['data']);
	
		$channelId = $data->channelId;
		$userId = $data->userId;
		$suscribers = $data->suscribers;	
		
		
// 		echo $userId;
// 		echo $channelId;
// 		echo $suscribers;
		try {
			$userData = new UserDAO();
			
			$results = $userData->channelSuscribers($userId, $channelId, $suscribers);
			
			echo json_encode($results);
	
		}catch (Exception $e){
			$a = $e->getMessage();
			
			echo json_encode(array(
					'update'  => false,
					'error' => $a
			));
		}
}
?>
