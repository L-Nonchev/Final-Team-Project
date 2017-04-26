<?php
function __autoload($className) {
	require_once "model/" . $className . '.php';
}
session_start();

function drawVideoContent($sortBy, $limit){
	try {
		$video = new VideoDAO();
		return $video->getSortedVideos($sortBy, $limit);
	}catch (Exception $e){
		echo $e->getMessage();
		header('Location: 404.php', true, 302);
	}	
}

function drowUserContent($sortBy, $limit){
	try {
		$user = new UserDAO();
		return $user->getSortedUsers($sortBy, $limit);
	}catch (Exception $e){
		echo $e->getMessage();
 		header('Location: 404.php', true, 302);
	}
}
$newVideos = drawVideoContent('video_id', 12);
$mostViewed = drawVideoContent('views', 12); 
$popularVideo = drawVideoContent('likes', 12);
$popularChannels = drowUserContent('subscribers', 6);

if (isset($_SESSION['user'])){

	include 'view/logInHeader.php';

}else {
	include 'view/header.php';
}
include 'view/index.php';

?>