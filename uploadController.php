<?php
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);

session_start();

//-=-=-=-=-= check user login=-=-=-==--==--\\

	
function uploadedFile(){
	if (isset($_FILES['video'])){
		if ($_FILES['video']['error'] === 0){
			$fileOnServerName = trim( $_FILES['video']['tmp_name'] );
			$fileOriginName = trim( $_FILES['video']['name'] );			
			$fileType = trim( $_FILES['video']['type'] );
			$milliseconds = round(microtime(true) * 1000);
			
			$allowedType = array('mp4', 'avi', 'flv', 'mov', '3gp', 'wmv');
			$videoType = pathinfo($fileOriginName,PATHINFO_EXTENSION );
			
			//-=-=-=-=-=-=-=-=-= check video name=-=-=-=-=-=-=--=-=--\\
			if (!preg_match("/^[- _ a-zA-Z0-9 . \ () ]*$/",$fileOriginName)){
				return $responce = array("error"=> "File name ERROR: Only letters ,numbers , - , _ , ( ) and white space allowed.") ;
			}
			
			//-=-=-=-=-=-=-=-=-= check video type=-=-=-=-=-=-=--=-=--\\
			if (!in_array($videoType, $allowedType)) {
				return $responce = array ("error" => "Please, enter corect video type!"); 
			}
			
			
			//-=-=-=-=-= check mime/type=-=-=-==--==--\\
			$allowedMimeType = array(	'video/mp4', 'video/x-msvideo', 'video/avi', 'video/x-msvideo',
										'video/x-flv', 'video/quicktime', 'video/3gpp','video/x-ms-wmv' );
			
			if (in_array($fileType, $allowedMimeType)){
				$fileSize = trim( ($_FILES['video']['size']) );
				
 				//-=-=-=-=-= check file size=-=-=-==--==--\\
				if ($fileSize < GB){
										
					if ($fileSize < MB){
						$fileSize /= KB;
						$printFileSize = round($fileSize, 2) . ' KB';
					}else {
						$fileSize /= MB;
						$printFileSize = round($fileSize, 2) . ' MB';
					}
					
					$videoType = substr($fileOriginName, -4);
					$fileName = str_replace("$videoType", '', $fileOriginName);
					
					$filePath = str_replace("$videoType", "$milliseconds",$_FILES['video']['name']);
					$filePath .= '.mp4';
					
					$videoPosterPath = preg_replace('/\s+/', '', $fileName) . "$milliseconds.jpg";
					exec("ffmpeg.exe");
					exec("ffmpeg -ss 00:00:02 -i $fileOnServerName -vf scale=800:-1 -vframes 1 assets/images/video-poster/$videoPosterPath");
					$timeVideo = exec("ffprobe -i $fileOnServerName -sexagesimal -show_entries format=duration -v quiet -of csv=\"p=0\"");
					$printDuration = strstr($timeVideo, '.' ,true);
					
					if (move_uploaded_file($fileOnServerName,'videos/' . $filePath)) {
						return $responce = array(
								"videoName" => "$fileName",
								"videoSize" => "$printFileSize",
								"videoPath" => "$filePath",
								"posterPath" => "$videoPosterPath",
								"duration" => "$printDuration",
								"originName" => "$fileOnServerName"
						);
					}else return $responce = array("error" => "Problems with $fileOriginName");
				}else return $responce = array("error" => "Please select a file smaller than 1GB");
			}else return $responce = array("error" => "Please, enter corect video type!"); 
		}else header('Location: upload.php', true , 302);
	}else header('Location: upload.php', true , 302);
}

if (isset($_SESSION['user'])){
	echo json_encode(uploadedFile());
}else header('Location: index.php', true , 302);
?>