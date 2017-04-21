<?php
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);

session_start();

//-=-=-=-=-= check user login=-=-=-==--==--\\
if (isset($_SESSION['user'])){

	if (isset($_FILES['video'])){
		$milliseconds = round(microtime(true) * 1000);
		$fileType = trim( $_FILES['video']['type'] );
		
		//-=-=-=-=-= check mime/type=-=-=-==--==--\\
		$allowedMimeType = array(	'video/mp4', 'video/x-msvideo', 'video/avi', 'video/x-msvideo',
									'video/x-flv', 'video/quicktime', 'video/3gpp','video/x-ms-wmv' );
		
		if (in_array($fileType, $allowedMimeType)){
			$fileSize = trim( ($_FILES['video']['size']) );
			
			//-=-=-=-=-= check file size=-=-=-==--==--\\
			if ($fileSize < GB){
				$fileOnServerName = trim( $_FILES['video']['tmp_name'] );
				$fileOriginName = trim( $_FILES['video']['name'] );
				
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
				
				include_once 'uploadEdit.php';
				
				if ($_FILES['video']['error'] === 0){
					if (move_uploaded_file($fileOnServerName,'videos/' . $filePath)) {
						echo "<input type='hidden' id='videoPath' value='$filePath'>";
						echo "<input type='hidden' id='videoPosterPath' value='$videoPosterPath'>";
					}else die("Problems with " . $fileOriginName);
				}
			}
		}else header('Location: upload.php', true , 302); 
	}else header('Location: upload.php', true , 302);
}else header('Location: index.php', true , 302);
?>