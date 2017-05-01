<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();
function search($sortBy){
	if (isset($_REQUEST['searchBy'])){
		$searchField = htmlentities( trim($_REQUEST['searchBy']) );
		switch ($sortBy){
			case 'Recent': $sortBy = 'video_id';break;
			case 'Viewed': $sortBy = 'views';break;
			case 'Longest': $sortBy = 'duration';break;
		
			default:$sortBy='video_id';
		}
		if (strlen($searchField) !== 0){
			if (preg_match("/^[- _ a-zA-Z0-9 . \ () ]*$/",$searchField)){
				$video = new VideoDAO();
				$findsVideos = $video->searchVideoByTitle($searchField, $sortBy);
				if ($findsVideos){
					for ($index=0; $index<count($findsVideos);$index++){
						$dislikes = $video->countVideoDislikes($findsVideos[$index]['video_id']);
						$likes = $video->countVideoLikes($findsVideos[$index]['video_id']);
						if ($likes != 0){
							$percent =( $dislikes/$likes )*100;
							$percent = floor(100 - $percent);
						}else $percent = 0;
						$findsVideos[$index]['percent'] = $percent;
					}
					return $findsVideos;
				}else return array ("notFount" => true);
			}else{
				http_response_code(400);
				return array ("error" => "allowed letters: numbers , - , _ , ( ) and space");
			}
		}else{
				http_response_code(400);
				return array ("error" => "Please, describe what you are looking! ");
			}
	}else http_response_code(400);
}

function filter($dataUpload, $timeFilter, $sortBy, $searchBy){
		
	switch ($sortBy){
		case 'Recent': $sortBy = 'video_id';break;
		case 'Viewed': $sortBy = 'views';break;
		case 'Longest': $sortBy = 'duration';break;
			
		default: $sortBy='video_id';
	}
		
	switch ($timeFilter){
		case 'Short': $timeFilter = '0:03:00';break;
		case 'Medium': $timeFilter = '0:15:00';break;
		case 'Long': $timeFilter = '0:30:00';break;
	
		default: $timeFilter = '9:99:99';
	}
		
	switch ($dataUpload){
		case 'week': $dataUpload = 7;break;
		case 'month': $dataUpload = 31;break;
		
		default: $dataUpload = 365;
	}
	$video = new VideoDAO();
	$findsVideos = $video->getFilterVideos($searchBy, $dataUpload, $timeFilter, $sortBy);
	for ($index=0; $index<count($findsVideos);$index++){
		$dislikes = $video->countVideoDislikes($findsVideos[$index]['video_id']);
		$likes = $video->countVideoLikes($findsVideos[$index]['video_id']);
		if ($likes != 0){
			$percent =( $dislikes/$likes )*100;
			$percent = floor(100 - $percent);
		}else $percent = 0;
		$findsVideos[$index]['percent'] = $percent;
	}
	return $findsVideos;
}

function getAllcategories($sortBy){
	if (isset($_REQUEST['categoryId'])){
		$searchField = htmlentities( trim($_REQUEST['categoryId']) );
		if ($searchField > 0 && $searchField < 15){
			$video = new VideoDAO();
			$findsVideos = $video->getVideoByCategory($searchField, $sortBy);
			if ($findsVideos){
				for ($index=0; $index<count($findsVideos);$index++){
					$dislikes = $video->countVideoDislikes($findsVideos[$index]['video_id']);
					$likes = $video->countVideoLikes($findsVideos[$index]['video_id']);
					if ($likes != 0){
						$percent =( $dislikes/$likes )*100;
						$percent = floor(100 - $percent);
					}else $percent = 0;
					$findsVideos[$index]['percent'] = $percent;
				}
				return $findsVideos;
			}else return array ("notFount" => true);
		}else http_response_code(400);
	}else http_response_code(400);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	try {
		if (isset($_GET['searchBy'])){
			echo json_encode(search('video_id'));
		}	
		if (isset($_GET['categoryId'])){
			echo json_encode(getAllcategories('video_id'));
		}
	}catch (Exception $e){
		http_response_code(500);
	}
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	try {
		if (isset($_POST['searchBy']) && isset($_POST['sortBy'])){
			$sortBy = htmlentities( trim($_POST['sortBy']));						
			echo json_encode(search($sortBy));
		}
		
		if (isset($_POST['dataUpload']) && isset($_POST['timeFilter']) && isset($_POST['sortsBy']) ){
			$dataUpload = htmlentities(trim($_POST['dataUpload']));
			$timeFilter = htmlentities(trim($_POST['timeFilter']));
			$sortBy = htmlentities(trim($_POST['sortsBy']));
			$searchBy = htmlentities(trim($_POST['searchBy']));
			echo json_encode(filter($dataUpload, $timeFilter, $sortBy, $searchBy));
		}
	}catch (Exception $e){
		http_response_code(500);
	}
}

?>