<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();

function showVideosByCategory(){
	if (isset($_GET['categoryId'])){
		$videoCategoty = htmlentities(trim($_GET['categoryId']));
		$video = new VideoDAO();
		$responce = $video->getVideoByCategory($videoCategoty);
		for ($index=0; $index<count($responce);$index++){
			$responce[$index]['views'] =  $video->countVideoViews($responce[$index]['video_id']);
			$dislikes = $video->countVideoDislikes($responce[$index]['video_id']);
			$likes = $video->countVideoLikes($responce[$index]['video_id']);
			if ($likes != 0){
				$percent =( $dislikes/$likes )*100;
				$percent = floor(100 - $percent);
				if ($percent < 0) {
					$percent = 0;
				}
			}else $percent = 0;
			$responce[$index]['percent'] = $percent;
		}		
 		 shuffle($responce);
 		 return $responce;	
 		
	}http_response_code(400);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	echo json_encode(showVideosByCategory());
}
?>