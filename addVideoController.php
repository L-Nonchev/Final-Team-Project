<?php
// autoload function
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();
if (isset($_SESSION['user'])){
	$user = json_decode($_SESSION['user']);

	$userId = $user->userId;
	if (isset($_POST['uploadVideo'])){
		
		// create video object
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
			
			include_once 'accsessUploaded.php';
		}catch (Exception $e){
			echo '{"error": ' .$e->getMessage (). '}';
		}
	}
}
?>