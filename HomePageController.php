<?php
function __autoload($className) {
	require_once "model/" . $className . '.php';
}
session_start();

function getNewestVideos($limit){
	$video = new VideoDAO();
	$newVideos = $video->getNewestVideos($limit);
	for ($index=0; $index<count($newVideos);$index++){
		$newVideos[$index]['views'] =  $video->countVideoViews($newVideos[$index]['video_id']);
		$dislikes = $video->countVideoDislikes($newVideos[$index]['video_id']);
		$likes = $video->countVideoLikes($newVideos[$index]['video_id']);
		if ($likes != 0){
			$percent =( $dislikes/$likes )*100;
			$percent = floor(100 - $percent);
			if ($percent < 0) {
				$percent = 0;
			}
		}else $percent = 0;
		$newVideos[$index]['percent'] = $percent;
	}
	return $newVideos;
}

function getViewestVideos($limit){
	$video = new VideoDAO();
	$newVideos = $video->getViewestVideo($limit);
	for ($index=0; $index<count($newVideos);$index++){
		$newVideos[$index]['views'] =  $video->countVideoViews($newVideos[$index]['video_id']);
		$dislikes = $video->countVideoDislikes($newVideos[$index]['video_id']);
		$likes = $video->countVideoLikes($newVideos[$index]['video_id']);
		if ($likes != 0){
			$percent =( $dislikes/$likes )*100;
			$percent = floor(100 - $percent);
			if ($percent < 0) {
				$percent = 0;
			}
		}else $percent = 0;
		$newVideos[$index]['percent'] = $percent;
	}
	return $newVideos;
}

function getMostPopularVideos($limit){
	$video = new VideoDAO();
	$newVideos = $video->getMostPopularVideo($limit);
	for ($index=0; $index<count($newVideos);$index++){
		$newVideos[$index]['views'] =  $video->countVideoViews($newVideos[$index]['video_id']);
		$dislikes = $video->countVideoDislikes($newVideos[$index]['video_id']);
		$likes = $video->countVideoLikes($newVideos[$index]['video_id']);
		if ($likes != 0){
			$percent =( $dislikes/$likes )*100;
			$percent = floor(100 - $percent);
			if ($percent < 0) {
				$percent = 0;
			}
		}else $percent = 0;
		$newVideos[$index]['percent'] = $percent;
	}
	return $newVideos;
}

function drowUserContent($sortBy, $limit){
	$user = new UserDAO();
	return $user->getSortedUsers($sortBy, $limit);
}
try {
	$newVideos = getNewestVideos(12);
 	$mostViewed = getViewestVideos(12); 
 	$popularVideo = getMostPopularVideos(12);
	$popularChannels = drowUserContent('subscribers', 6);
}catch (Exception $e){
 		header('Location: 503.php', true, 302);
 		die();
	}

include 'view/index.php';
?>