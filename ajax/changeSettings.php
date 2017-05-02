<?php
session_start();

// autoload function
function __autoload($className){
	require_once '../model/'. $className .'.php';
}

if(isset($_SESSION['user'])){
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		try {
			$user = json_decode($_SESSION['user']);
			$userData = new UserDAO();
			
			// check for exist username
			if (isset($_POST['username'])){
				$newUsername = json_decode($_POST['username']);
					
				if ($newUsername->username){
					$user2 = new User("example@gmail.com", "test1234" , $newUsername->username);
				
					$result = $userData->selectUsernameFromDB($user2);
					if ($result == 0){
						http_response_code ( 404 );
						echo json_encode(array(
								'check' => false));
					}else {
						http_response_code ( 200 );
						echo json_encode(array(
								'check' => true));
					}
				}
			}
			// update username
			if (isset($_POST['update'])){
				$updateUsername = json_decode($_POST['update']);
				$user2 = new User("example@gmail.com", "test1234" , $updateUsername->oldUsername);
				$result = $userData->selectUsernameFromDB($user2);
				if ($result === $user->userId){
					$result2 = $userData->updateUsername($user->userId, $updateUsername->newUsername);
					if ($result2){
						$user->username = $updateUsername->newUsername;
						$_SESSION['user'] = json_encode($user);
						http_response_code ( 200 );
						echo json_encode(array(
								"check" => $result2
						));
					}else{
						http_response_code ( 400 );
						echo json_encode(array(
								"update" => false
						));
					}
				}else{
					http_response_code ( 400 );
					echo json_encode(array(
							"update" => "Incorrect old Username, please write corect Username."
					));
				}
			}
			
			// chek for exist email
			if (isset($_POST['email'])){
				$newEmail = json_decode($_POST['email']);
				
				if ($newEmail->email){
					$user2 = new User($newEmail->email);
					$result = $userData->selectEmailFromDB($user2);
					if ($result == 0){
						http_response_code ( 404 );
						echo json_encode(array(
								'check' => false));
					}else {
						http_response_code ( 200 );
						echo json_encode(array(
								'check' => true));
					}
				}
			}
			
			//update email 
			if (isset($_POST['update-email'])){
				$updateEmail = json_decode($_POST['update-email']);
				$user2 = new User($updateEmail->oldEmail);
				$result = $userData->selectEmailFromDB($user2);
				if ($result === $user->userId){
					$result2  = $userData->updateEmail($user->userId, $updateEmail->newEmail);
					if ($result2){
						http_response_code ( 200 );
						echo json_encode(array(
								"check" => $result2
						));
					}else{
						http_response_code ( 400 );
						echo json_encode(array(
								"update" => false
						));
					}	
				}else{
					http_response_code ( 400 );
					echo json_encode(array(
							"update" => "Incorrect old email, please write corect Email."
					));
				}
			}
			
			//update password
			if (isset($_POST['update-password'])){
				$updatePassword = json_decode($_POST['update-password']);
				$result = $userData->selectPasswordFromDB($user->userId);
				if ((sha1($updatePassword->oldPassword) === $result) && ($updatePassword->rePassword === $updatePassword->newPassword)){
					$result2  = $userData->updatePassword($user->userId, $updatePassword->newPassword);
					if ($result2){
						http_response_code ( 200 );
						echo json_encode(array(
								"check" => $result2
						));
					}else{
						http_response_code ( 400 );
						echo json_encode(array(
								"update" => false
						));
					}
				}else{
					http_response_code ( 400 );
					echo json_encode(array(
							"update" => "Incorrect old password, please write corect password."
					));
				}
			}
			
			// update picture
			if (isset($_FILES['picture'])){
			
				// user pic
				$fileOnServer = $_FILES['picture']['tmp_name'];
				$fileRealName = $_FILES['picture']['name'];
				$mimeType =   mime_content_type($fileOnServer);
				$fileSize = filesize($fileOnServer);
				$size  = "10000000";
				if ($mimeType === "image/jpeg"){
					list($width, $height) = getimagesize($fileOnServer);
					if ($fileSize <= $size){
						if (($width > 149 && $height > 149) && ($width < 1200 &&  $height < 800)){
							include 'imageResize/updateUserImage.php';
							$result = updateProfilImage($fileOnServer, $fileRealName);
							if ($result){
								http_response_code ( 200 );
								echo "haha";
							}
						}else{
							http_response_code ( 400 );
							echo json_encode("The photo should be in a resolution: min 149x149x max 1200x800");
						}
					}else{
						http_response_code ( 400 );
						echo json_encode(	"Image size is too large. Maximum sixe is 10Mb");
					}
				}else {
					http_response_code ( 400 );
					echo json_encode("Image format is incorect. Allowed format jpeg");
				}
			}
			
			
			// update banner 
			if (isset($_FILES['banner'])){
					
				// user pic
				$fileOnServer = $_FILES['banner']['tmp_name'];
				$fileRealName = $_FILES['banner']['name'];
				$mimeType =   mime_content_type($fileOnServer);
				$fileSize = filesize($fileOnServer);
				$size  = "20000000";
				if ($mimeType === "image/jpeg"){
					list($width, $height) = getimagesize($fileOnServer);
					if ($fileSize <= $size){
						if (($width >= 1500 && $height >= 340) && ($width <= 2500 &&  $height <= 800)){
							include 'imageResize/updateUserBanner.php';
							$result = updateProfilBanner($fileOnServer, $fileRealName);
							if ($result){
								http_response_code ( 200 );
							}
						}else{
							http_response_code ( 400 );
							echo json_encode("The photo should be in a resolution: min 1500x350 max 2500x800");
						}
					}else{
						http_response_code ( 400 );
						echo json_encode(	"Image size is too large. Maximum sixe is 20Mb");
					}
				}else {
					http_response_code ( 400 );
					echo json_encode("Image format is incorect. Allowed format jpeg");
				}
			}
		}catch (Exception $e){
			http_response_code ( 400 );
			$error = $e->getMessage();
			echo json_encode(
					 $error);
		}
		

	}
}