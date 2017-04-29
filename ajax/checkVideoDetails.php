<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();
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
					"userPic" 	=> "$profilPic"
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
	}catch (Exception $e){
		echo json_encode(array ("error" => $e->getMessage ()));
	}
}else{
	http_response_code(401);
	echo '{"notLogin":true }';	
}

?>