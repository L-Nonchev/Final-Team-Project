<?php
function __autoload($className) {
	require_once "model/" . $className . '.php';
}
session_start();

if (isset($_GET['físeán%'])){
	$videoId = $_GET['físeán%'];
	$getVideo = new VideoDAO();
	$video = $getVideo->getVideo($videoId);
	$countOfVideo = $getVideo->countUserVideo($video[0]['user_id']);
	$percent =( $video[0]['dislikes']/$video[0]['likes'] )*100;
	$percent = floor(100 - $percent);
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
	

}
if (isset($_SESSION['user'])){

	include 'logInHeader.php';

}else {
	include 'header.php';
}
include 'Video.php';
?>