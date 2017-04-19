<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$data = array();
	parse_str(file_get_contents("php://input"), $data);
	$video = json_decode($data['video'], true);
	
	try {
		$newVideo = new Video( htmlentities( trim($video['title']) ), 
							htmlentities( trim($video['pathVideo']) ), 
							htmlentities( trim($video['posterVideo']) ), 
							htmlentities( trim($video['description']) ), 
							htmlentities( trim($video['privace']) ),
							htmlentities( trim(1) ), 
							htmlentities( trim($video['category']) ));
		
		$addVideo = new VideoDAO();
		$addVideo->addVideo($newVideo);
	}catch (Exception $e){
		echo '{"error": ' .$e->getMessage (). '}';
	}
}
?>