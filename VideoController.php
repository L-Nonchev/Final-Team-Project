<?php
function __autoload($className) {
	require_once "model/" . $className . '.php';
}
session_start();

if ($_GET['físeán%'] > 0){
	try {
		$videoId = $_GET['físeán%'];
		$getVideo = new VideoDAO();
		$video = $getVideo->getVideo($videoId);
		$countOfVideo = $getVideo->countUserVideo($video[0]['user_id']);
		
		$now = date_create(date("Y-m-d"));
		$uploadetDate = date_create($video[0]['date']);
		$releaseDate = date_diff($now, $uploadetDate);
		if ( ($releaseDate->y) > 0 ){
			$printDate = $releaseDate->y . ' Year ago';
		}else if (($releaseDate->m) > 0){
			$printDate = $releaseDate->m . ' Мonth ago';
		}else if (($releaseDate->d) > 0){
			$printDate = $releaseDate->d . ' Days ago';
		}
		$countOfViews = $getVideo->countVideoViews($videoId);
		$countOfLikes = $getVideo->countVideoLikes($videoId);
		$countOfDislikes = $getVideo->countVideoDislikes($videoId);
		$countOfComments = $getVideo->getCountComents($videoId);
		
		if ($countOfLikes != 0){
			$percent =( $countOfDislikes/$countOfLikes )*100;
			$percent = floor(100 - $percent);
		}
	}catch (Exception $e){
		header('Location: 404.php', true, 302);
		die();
	}

}else {
	header('Location: 404.php', true, 302);
	die();
}		
if (isset($_SESSION['user'])){
	$user = json_decode($_SESSION['user']);
	$userId = $user->userId;
	$getVideo->whachedVideo($videoId, $userId);
	$getVideo->updateHistory($userId, $videoId);
}
include 'view/Video.php';
?>