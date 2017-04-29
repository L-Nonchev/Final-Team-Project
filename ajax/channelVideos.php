<?php

// autoload function
function __autoload($className){
	require_once '../model/'. $className .'.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	$useId = $_GET['@$^^%@@^@^$^@'];
	$ofset = $_GET['limit'];
	$orderBy = $_GET['orderBy'];
	$privacy = $_GET['privacy'];
	
	try {
	$videoDATA = new VideoDAO();
	
	switch ($orderBy) {	
		case "1234": $orderBy = 'video_id DESC' ; break;
		case "2345": $orderBy = 'video_id' ; break;
		case "3456": $orderBy = 'views DESC' ; break;
		case "4567": $orderBy = 'likes DESC' ; break;
		case "5678": $orderBy = 'duration' ; break;
			
		default: $order = 'video_id DESC' ; break;
	}
	
	switch ($privacy) {
			
		case "6789": $privacy = '0' ; break;
		case "7890": $privacy = '1' ; break;

			
		default: $privacy = '0' ; break;
	}
	
	$videos = $videoDATA->getChannelVideos($useId, $ofset, $orderBy , $privacy);
	
	
	echo json_encode($videos);
	
	}catch (PDOException $e){
	
		
	}catch (Exception $e){
			
		
	}
}

?>