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
			$responce = array();
			parse_str(file_get_contents("php://input"), $data);
			$videoName = json_decode($data['fileType'], true);
			$videoType = pathinfo($videoName['type'],PATHINFO_EXTENSION );
			
			$newVideoName = substr($videoName['type'], 12);
			if (preg_match("/^[- _ a-zA-Z0-9 . \ () ]*$/",$newVideoName)){
				$checkName = str_replace(".$videoType", '.mp4',$newVideoName);	
				
				//-=-=-=-=-= check mime/type=-=-=-==--==--\\
				$allowedType = array('mp4', 'avi', 'flv', 'mov', '3gp', 'wmv');
				
				if (in_array($videoType, $allowedType)){
					try {
						$newVideo = new VideoDAO();
						$checkVideoName = $newVideo->checkVideoName($checkName);
					
					
						//-=-=-=-=-= check dublicate file name=-=-=-==--==--\\
						if ($checkVideoName){
							$responce['dublicate'] = true;
						}else $responce['success'] = true; //echo '{"success" : true}';;
					}catch (Exception $e){

						$responce['error'] = $e->getMessage ();
					}
				}
			}else $responce['incorectName'] = true; 
		}echo json_encode($responce);
	}
?>