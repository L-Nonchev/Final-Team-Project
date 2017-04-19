<?php
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);

session_start();

//-=-=-=-=-= check user login=-=-=-==--==--\\
if (isset($_SESSION['user'])){

	if (isset($_FILES['video'])){
		$fileType = trim( $_FILES['video']['type'] );
		
		//-=-=-=-=-= check mime/type=-=-=-==--==--\\
		switch ($fileType){
			case 'video/mp4': $corectMimeType = true; break;
			case 'video/x-msvideo': $corectMimeType = true; break;
			case 'video/x-flv': $corectMimeType = true; break;
			case 'video/quicktime': $corectMimeType = true; break;
			case 'video/3gpp': $corectMimeType = true; break;
			case 'video/x-ms-wmv': $corectMimeType = true; break;
			
			default: $corectMimeType = false;
		}
		if ($corectMimeType){
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
				$filePath = str_replace("$videoType", '.mp4',$_FILES['video']['name']);	
				
				$videoPosterPath = preg_replace('/\s+/', '', $fileName) . ".jpg";
				exec("ffmpeg.exe");
				exec("ffmpeg -ss 00:00:02 -i $fileOnServerName -vf scale=800:-1 -vframes 1 assets/images/$videoPosterPath");
				$timeVideo = exec("ffprobe -i $fileOnServerName -sexagesimal -show_entries format=duration -v quiet -of csv=\"p=0\"");
				$printDuration = strstr($timeVideo, '.' ,true);
				
				include_once 'uploadEdit.php';
				
				if ($_FILES['video']['error'] === 0){
					if (move_uploaded_file($fileOnServerName,'videos/' . $filePath)) {
						echo "<input type='hidden' id='videoPath' value='$filePath'>";
						echo "<input type='hidden' id='videoPosterPath' value='$videoPosterPath'>";
					}
				}
			}
		}
	}
}
?>