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
					if ($result !== $user->userId){
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
					if ($result !== $user->userId){
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
		}catch (Exception $e){
			http_response_code ( 400 );
			$error = $e->getMessage();
			echo json_encode(array(
					'check' => $error));
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
			if ($fileSize <= $size){
				
			}
			echo "qkooo";
		}else {
			echo " ebaisi !";
		}

		if ($fileSize < $size){
			if (!empty($fileOnServer)){
				$error = updateProfilImage($user_id, $fileOnServer, $fileRealName);
			}
		}else{
			$error = "Please upload the image to 1MB!";
		}
	}
	

}