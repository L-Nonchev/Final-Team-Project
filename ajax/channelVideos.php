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
	// sorted 
	switch ($orderBy) {	
		case "1234": $orderBy = 'video_id DESC' ; break;
		case "2345": $orderBy = 'video_id' ; break;
		case "3456": $orderBy = 'views DESC' ; break;
		case "4567": $orderBy = 'v.title' ; break;
		case "5678": $orderBy = 'duration' ; break;
			
		default: $order = 'video_id DESC' ; break;
	}
	// privacys
	switch ($privacy) {
		case "6789": $privacy = '0' ; break;
		case "7890": $privacy = '1' ; break;	
		default: $privacy = '0' ; break;
	}

	$videos = $videoDATA->getChannelVideos($useId, $ofset, $orderBy , $privacy);
	// style date
	$now = date_create(date("Y-m-d"));
	for ($index = 0 ; $index < count($videos); $index++){
		$uploadetDate = date_create($videos[$index]['date']);
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
		// create rate precent
		$dislikes = $videoDATA->countVideoDislikes($videos[$index]['video_id']);
		$likes = $videoDATA->countVideoLikes($videos[$index]['video_id']);
		if ($likes != 0){
			$percent =( $dislikes/$likes )*100;
			$percent = floor(100 - $percent);
			if ($percent < 0) {
				$percent = 0;
			}
		}else $percent = 0;
		$videos[$index]['date'] = $printDate;
		$videos[$index]['prcent'] = $percent;
	}

	http_response_code ( 200 );
	echo json_encode($videos);
	die();
	}catch (PDOException $e){
		http_response_code ( 500 );
		echo json_encode(array(
				"error" =>  "Something went wrong, try again"
		));
		die();
	}catch (Exception $e){
		http_response_code ( 500 );
		echo json_encode(array(
				"error" =>  "Something went wrong, try again"
		));
		die();
	}
}
?>