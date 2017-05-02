<?php

// autoload function
function __autoload($className){
	require_once '../model/'. $className .'.php';
}


session_start();

$user = json_decode($_SESSION['user']);
$userId = $user->userId;

if ($_SERVER['REQUEST_METHOD'] === "GET"){
	if (isset($_GET['page'])){
		$page = $_GET['page'];
		$offset = $_GET['offset'];
		$videoData = new VideoDAO();
		$user = $_SESSION['user'];
		try {
			if ($page === "like-video") {
				
				$result = $videoData->getLikedVideos($userId, $offset);
			}
			if ($page === "watchLater") {
				$result = $videoData->getWatchMoreVideos($userId, $offset);
			}
			if ($page === "history-video") {
				$result = $videoData->getHistoryVideos($userId, $offset);
			}
			
			$now = date_create(date("Y-m-d"));
			for ($index = 0 ; $index < count($result); $index++){
				$uploadetDate = date_create($result[$index]['date']);
				$releaseDate = date_diff($now, $uploadetDate);
				if ( ($releaseDate->y) > 0 ){
					$printDate = $releaseDate->y . ' Year ago';
				}else if (($releaseDate->m) > 0){
					$printDate = $releaseDate->m . ' Мonth ago';
				}else if (($releaseDate->d) > 0){
					$printDate = $releaseDate->d . ' Days ago';
				}else{
					$printDate = " Today";
				}
				$dislikes = $videoData->countVideoDislikes($result[$index]['video_id']);
				$likes = $videoData->countVideoLikes($result[$index]['video_id']);
				if ($likes != 0){
					$percent =( $dislikes/$likes )*100;
					$percent = floor(100 - $percent);
				}else $percent = 0;
			
				$result[$index]['date'] = $printDate;
				$result[$index]['prcent'] = $percent;
			}

			http_response_code ( 200 );
			echo json_encode($result);

		}catch (Exception $e){
			$error = $e->getMessage();
			http_response_code(500);
		}
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
	$data = array();
	parse_str(file_get_contents("php://input"), $data);
	$deleteVideo = json_decode($data['data']);
	try {
		$videoData = new VideoDAO();
		// delete for one video
		if ($deleteVideo->deleteLikedVideo){
			$result = $videoData->deleteLikedVideo($deleteVideo->deleteLikedVideo);	
		}
		if ($deleteVideo->deleteWatchLaterVido){
			$result = $videoData->deleteWatchMoreVideo($deleteVideo->deleteWatchLaterVido);
		}
		if ($deleteVideo->deleteHistoryideo){
			$result = $videoData->deleteHistoryVideo($deleteVideo->deleteHistoryideo, $userId);
		}
		
		
		//delete all videos
		if ($deleteVideo->deleteAllLikedVideo){
			$result = $videoData->deleteAllLikedVideos($userId);
		}
		if ($deleteVideo->deleteAllWatchMoreVideos){
			$result = $videoData->deleteAllWatchMoreVideos($userId);
		}
		if ($deleteVideo->deleteAllHistoryVideos){
			$result = $videoData->deleteAllHistoryMoreVideos($userId);
		}

		
		if ($result){
			http_response_code ( 200 );
			echo json_encode(array(
					'delete' => $result
			));
		}else{
			
		}
		
	}catch (Exception $e){
		http_response_code(500);
	}
}