<?php
// autoload function
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
if (isset($_POST['uploadVideo'])){
	session_start();
	if (isset($_SESSION['user'])){
		$user = json_decode($_SESSION['user']);
	
		$userId = $user->userId;
		
		// create video object
		try {
			//-=-=-=-=-=-=---==-=-=-= create video object=-=-=-==-=-==-=-==--\\
			$newVideo = new Video( htmlentities( trim($video['title']) ),
					htmlentities( trim($video['pathVideo']) ),
					htmlentities( trim($video['posterVideo']) ),
					htmlentities( trim($video['description']) ),
					htmlentities( trim($video['privace']) ),
					htmlentities( trim($userId) ),
					htmlentities( trim($video['category']) ));
			
			//-=-===-=-=-= add video in DB=-=-=-==-=-==--\\
			$addVideo = new VideoDAO();
			$addVideo->addVideo($newVideo);
			
			include_once 'accsessUploaded.php';
		}catch (Exception $e){
			echo '{"error": ' .$e->getMessage (). '}';
		}
	}
}
?>