<?php
function updateProfilImage ($fileOnServer, $fileRealName){
	//get email form user
	
	require 'resizeImage.php';
	
	$userData = new UserDAO();
	$user = json_decode( $_SESSION['user']);
	
	$milliseconds = round(microtime(true) * 1000);
	$fileRealName = $milliseconds.$fileRealName;
	$path = '../assets/images/user-pictures/'.$fileRealName;

	//MIME validation
	$mime =  mime_content_type($fileOnServer);
	$format = "image/jpeg";
	if ($mime === $format){
		// is uploadet all file ?
		if (is_uploaded_file($fileOnServer)){
			// is savet file in derictory
				
			if (move_uploaded_file($fileOnServer, $path)){

				// resize img

				//indicate which file to resize (can be any type jpg)
				$file = $path;

				//indicate the path and name for the new resized file
				$resizedFile = $path;

				//call the function (when passing path to pic)
				smart_resize_image($file , null, 150 , 150 , false , $resizedFile , false , false ,100 );

				$result = $userData->updatePicture($user->userId, $fileRealName);
				
				if($result){
					$user->profilPicName = $fileRealName;
					$_SESSION['user'] = json_encode($user);		
					return true;
				}
			}else {
				throw new Exception("The file is not successfully uploaded, please try again.");
			}
		}else {
			throw new Exception("The file is not successfully uploaded, please try again.");
		}
	}else {
		throw new Exception("Please upload  image/jpeg format !");
	}
}
?>