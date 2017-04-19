<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
	// check mime/type and name dublicate of video file
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		session_start();
		
		//-=-=-=-=-= check user login=-=-=-==--==--\\
		if (isset($_SESSION['user'])){
			$data = array();
			parse_str(file_get_contents("php://input"), $data);
			$videoName = json_decode($data['fileType'], true);
			$videoType = pathinfo($videoName['type'],PATHINFO_EXTENSION );
			
			$newVideoName = substr($videoName['type'], 12);
			$checkName = str_replace("$videoType", 'mp4',$newVideoName);	
			
			$allowedType = array('mp4', 'avi', 'flv', 'mov', '3gp', 'wmv');
			$available = false;
			for ($index=0;$index<count($allowedType);$index++){
				if ($allowedType[$index] === $videoType){
					$available = true;
					break;
				}
			}
			
			if ($available){
				$newVideo = new VideoDAO();
				$checkVideoName = $newVideo->checkVideoName($checkName);
				if ($checkVideoName){
					echo '{"dublicate" : true}';
				}else echo '{"succsess" : true}';;
			}else echo '{"succsess" : false}';
		}
	}
?>