<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();

function drawVideoComents(){
	$videoId = htmlentities( trim($_POST['showComents']));
	$coments = new VideoDAO();
	$showComents = $coments->getVideoComents($videoId);
	if (isset($_SESSION['user'])){
		$user = json_decode($_SESSION['user']);
		$userId = $user->userId;
		for ($index=0;$index<count($showComents);$index++){
			if ($userId===$showComents[$index]["user_id"]){
				$showComents[$index]['deleteComent'] = true;
			}
		}
	}

	return $showComents;
}
if (isset($_POST['showComents'])){
	echo json_encode(drawVideoComents());
}

?>