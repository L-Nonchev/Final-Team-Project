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
			$checkName = str_replace(".$videoType", '.mp4',$newVideoName);	
			
			//-=-=-=-=-= check mime/type=-=-=-==--==--\\
			$allowedType = array('mp4', 'avi', 'flv', 'mov', '3gp', 'wmv');
			
			if (in_array($videoType, $allowedType)){
				try {
					$newVideo = new VideoDAO();
					$checkVideoName = $newVideo->checkVideoName($checkName);
				
				
					//-=-=-=-=-= check dublicate file name=-=-=-==--==--\\
					if ($checkVideoName){
						echo '{"dublicate" : true}';
					}else echo '{"success" : true}';;
				}catch (Exception $e){
					echo json_encode(array(
							'error' => $e->getMessage ())
							);
				}
			}else echo '{"success" : false}';
		}
	}
?>