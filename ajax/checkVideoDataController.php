<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
session_start();
function checkDublicateName (){
	
	//-=-=-=-=-= check corect title=-=-=-==--==--\\		
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
}

function deleteVideo (){
	$video = htmlentities( trim ($_POST['deleteVideo']) );
	if ($video !==''){
		$videoPath = "../videos/$video";
		if (unlink("$videoPath")){
			return true;
		}
	}
}

	//-=-=-=-=-= check user login=-=-=-==--==--\\
if (isset($_SESSION['user'])){
	if (isset($_POST['title'])){
		echo json_encode(checkDublicateName());
	}
	
	if (isset($_POST['deleteVideo'])){
		echo deleteVideo ();
	}
	
	if (isset($_POST['checkLoginUser'])){
		echo true;
	}
}
?>