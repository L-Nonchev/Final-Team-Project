<?php
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);

session_start();	
function uploadedFile(){
	if (isset($_FILES['video'])){
		if ($_FILES['video']['error'] === 0){
			$fileOnServerName = trim( $_FILES['video']['tmp_name'] );
			$fileOriginName = trim( $_FILES['video']['name'] );			
			$fileType = trim( $_FILES['video']['type'] );
			$milliseconds = round(microtime(true) * 1000);
			
			$allowedType = array('mp4', 'ogv', 'mov');
			$videoType = pathinfo($fileOriginName,PATHINFO_EXTENSION );
			
			//-=-=-=-=-=-=-=-=-= check video type=-=-=-=-=-=-=--=-=--\\
			if (!in_array($videoType, $allowedType)) {
				http_response_code(400);
				return array ("error" => "Please, enter corect video type (Allowed type: ogg, mp4, mov)!");
			}
			
			//-=-=-=-=-=-=-=-=-= check video name=-=-=-=-=-=-=--=-=--\\
			if (!preg_match("/^[- _ a-zA-Z0-9 . \ () ]*$/",$fileOriginName)){
				http_response_code(400);
				return array ("error" => "File name ERROR: Only letters ,numbers , - , _ , ( ) and white space allowed.");
			}
			
			//-=-=-=-=-= check mime/type=-=-=-==--==--\\
			$fileInfo = new finfo(FILEINFO_MIME_TYPE);
			$mimeType = $fileInfo->buffer(file_get_contents($fileOnServerName));
			$allowedMimeType = array(	'video/mp4', 'video/ogg', 'video/quicktime');
			
			if (in_array($mimeType, $allowedMimeType)){
				$fileSize = trim( ($_FILES['video']['size']) );
				
 				//-=-=-=-=-= check file size=-=-=-==--==--\\
				if ($fileSize < GB){										
					if ($fileSize < MB){
						$printFileSize = round($fileSize/KB, 2) . ' KB';
					}else {
						$printFileSize = round($fileSize/MB, 2) . ' MB';
					}
					
					$videoType = substr($fileOriginName, -4);
					$fileName = str_replace("$videoType", '', $fileOriginName);
					
					$filePath = str_replace("$videoType", "$milliseconds",$_FILES['video']['name']);
					$filePath .= '.mp4';
					
					$videoPosterPath = preg_replace('/\s+/', '', $fileName) . "$milliseconds.jpg";
					exec("ffmpeg.exe");
					exec("ffmpeg -ss 00:00:02 -i $fileOnServerName -vf scale=800:-1 -vframes 1 ../assets/images/video-poster/$videoPosterPath");
					$timeVideo = exec("ffprobe -i $fileOnServerName -sexagesimal -show_entries format=duration -v quiet -of csv=\"p=0\"");
					$printDuration = strstr($timeVideo, '.' ,true);
					
					if (move_uploaded_file($fileOnServerName,'../videos/' . $filePath)) {
						return array(
								"videoName" => "$fileName",
								"videoSize" => "$printFileSize",
								"videoPath" => "$filePath",
								"posterPath" => "$videoPosterPath",
								"duration" => "$printDuration",
								"originName" => "$fileType"
						);
					}else {
						http_response_code(400);
						return array ("error" => "Problems with $fileOriginName");
					}
				}else { 
					http_response_code(400);
					return array ("error" => "Please select a file smaller than 1GB");
				}
			}else {
				http_response_code(400);
				return array ("error" => "Please, enter corect video type (Allowed mime/type: video/ogg, video/mp4, video/quicktime)!");
			}
		}else {
			http_response_code(400);
			return array ("error" => "Problem with file!");
		}
	}else {
		http_response_code(400);
		return array ("error" => "Please, enter file!");
	}		
}

//-=-=-=-=-= check user login=-=-=-==--==--\\
if (isset($_SESSION['user'])){
	echo json_encode(uploadedFile());
}else header('Location: view/index.php', true , 302);
?>