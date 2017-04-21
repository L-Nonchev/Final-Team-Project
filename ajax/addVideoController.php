<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	session_start();
	
	//-=-=-=-=-= check user login=-=-=-==--==--\\
	if (isset($_SESSION['user'])){
		$user = json_decode($_SESSION['user']);
		$data = array();
		parse_str(file_get_contents("php://input"), $data);
		$video = json_decode($data['video'], true);	
		$userId = $user->userId;
	
		try {
			//-=-=-=-=-=-=---==-=-=-= create video object=-=-=-==-=-==-=-==--\\
			$newVideo = new Video( htmlentities( trim($video['title']) ), 
								htmlentities( trim($video['pathVideo']) ), 
								htmlentities( trim($video['posterVideo']) ), 
								htmlentities( trim($video['duration']) ),
								htmlentities( trim($video['description']) ),								
								($video['privacy']==='true')?true:false ,
								htmlentities( trim($userId)), 
								htmlentities( trim($video['category']) ),
								($video['genre'])?htmlentities( trim($video['genre'])):null);
			
			//-=-===-=-=-= add video in DB=-=-=-==-=-==--\\
			$addVideo = new VideoDAO();
			$addVideo->addVideo($newVideo);
			
			echo '{"success" : true}';
		}catch (Exception $e){
			echo json_encode(array(
					'error' => $e->getMessage ())
			);
		}
	}
}
?>