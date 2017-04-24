<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();
function checkDublicateName (){
	
	//-=-=-=-=-= check corect title=-=-=-==--==--\\
	if (isset($_POST['title'])){		
		$videoTitle = htmlentities( trim($_POST['title']) );
		if ($videoTitle !== ''){
			
			//-=-=-=-=-=-=-=-=-= check simbol of video title=-=-=-=-=-=-=--=-=--\\
			if (preg_match("/^[- _ a-zA-Z0-9 . ()]*$/",$videoTitle)){
					try {
						$newVideo = new VideoDAO();
						$checkVideoName = $newVideo->checkVideoName($videoTitle);
						
						//-=-=-=-=-= check dublicate video name=-=-=-==--==--\\
						if ($checkVideoName){
							return $responce = array("error" => "Dublicate video title!");
						}else return $responce = array ("success" => true);
					}catch (Exception $e){	
						$responce = array ("error" => $e->getMessage ());
					}
			}else return $responce = array("error"=> "File name ERROR: Only letters ,numbers , - , _ , ( ) and white space allowed.");
		}else return $responce = array("error" => "Please, enter video title!");						
	}else return $responce = array("error" => "Please, enter video title!");
}
	//-=-=-=-=-= check user login=-=-=-==--==--\\
if (isset($_SESSION['user'])){
	echo json_encode(checkDublicateName());
}
?>