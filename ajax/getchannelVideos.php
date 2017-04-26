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
	
	$videos = $videoDATA->getChannelVideos($useId, $ofset, $orderBy , $privacy);
	
	
	echo json_encode($videos);
	
	}catch (PDOException $e){
	
		
	}catch (Exception $e){
			
		
	}
}

?>