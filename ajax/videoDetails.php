<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();
function deleteVideoComment(){
	if ($_POST['commentId']>0){
		$commentId = $_POST['commentId'];
		(new VideoDAO())->deleteVideoComment($commentId);
		return '{"success": true}';
	}http_response_code(400);
}

function drawVideoComents(){
	$videoId = htmlentities( trim($_GET['showComents']));
	$userId = htmlentities( trim($_GET['userId']));
	$coments = new VideoDAO();
	$showComents = $coments->getVideoComments($videoId);
	if (isset($_SESSION['user'])){
		$user = json_decode($_SESSION['user']);
		$sesUserId = $user->userId;
		for ($index=0;$index<count($showComents);$index++){
			if ($sesUserId===$showComents[$index]["user_id"] || $userId === $sesUserId){
				$showComents[$index]['deleteComent'] = true;
			}
		}
	}
	return $showComents;
}

function addVideoComments(){
	$user = json_decode($_SESSION['user']);
	$userId = $user->userId;
	$username = $user->username;
	$profilPic = $user->profilPicName;
	$videoId = trim ($_POST['videoId']);
	$videoComment = htmlentities( trim($_POST['comment']));
	if (strlen($videoComment)<500 && strlen($videoComment)>0){
		$videoId = htmlentities( trim($_POST['videoId']));
		$coment = new VideoDAO();
		$addComent = $coment->addCommentsVideo($videoId, $userId, $videoComment);
		if ($addComent){
			return array(
					"userId"	=> "$userId",
					"username"  => "$username",
					"userPic" 	=> "$profilPic",
					"commentId"	=> "$addComent"
			);
		}
	}else http_response_code(400);
}

function increaseVideoLike(){
	$user = json_decode($_SESSION['user']);
	$userId = $user->userId;
	$videoId = trim ($_POST['likesVideoId']);
	if ($videoId > 0){
		(new VideoDAO())->increaseLikes($userId, $videoId);
		return array("success"=>true);
	}else http_response_code(400);
}

function increaseDisikes(){
	$user = json_decode($_SESSION['user']);
	$userId = $user->userId;
	$videoId = trim ($_POST['disLikesVideoId']);
	if ($videoId > 0){
		(new VideoDAO())->increaseDisikes($userId, $videoId);
		return array("success"=>true);
	}else http_response_code(400);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){	
	try {
		if (isset($_GET['showComents'])){
			echo json_encode(drawVideoComents());
		}else http_response_code(400);
	}catch (Exception $e){
		http_response_code(401);
		echo json_encode(array ("error" => $e->getMessage ()));
	}
	
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	if (isset($_SESSION['user'])){
		try {
			if (isset($_POST['comment']) && isset($_POST['videoId'])){
				echo json_encode(addVideoComments());
			}
			if (isset($_POST['likesVideoId'])){
				increaseVideoLike();
			}
			if (isset($_POST['disLikesVideoId'])){
				echo json_encode(increaseDisikes());
			}
			if (isset($_POST['commentId'])){
				deleteVideoComment();
			}
		}catch (Exception $e){
			http_response_code(401);
			echo json_encode(array ("error" => $e->getMessage ()));
		}
	}else{
		http_response_code(401);
		echo '{"notLogin":true }';	
	}
}

?>