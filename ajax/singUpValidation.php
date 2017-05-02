<?php

// autoload function
function __autoload($className){
	require_once '../model/'. $className .'.php';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$userData = new UserDAO();
	// JSON request
	$data = json_decode($_POST['data'], true);
	if (isset($data['username'])){
		try {
			$user = new User("example@gmail.com", "test1234" , $data['username']);
			$result = $userData->selectUsernameFromDB($user);
			if ($result){
			echo json_encode(array(
					'check' => true,
					'username' => $result));
			}else {
				http_response_code ( 200 );
				echo json_encode(array("Username not found!"));
				die();
			}
		}catch (Exception $e){
			echo json_encode(array(
					'exception' => true,
					'errorMesageUser' => $e->getMessage()
			));
			die();
		}
	}
	if (isset($data['email'])){
		try {
			$user = new User($data['email']);
			$result = $userData->selectEmailFromDB($user);
			if ($result){
				http_response_code ( 200 );
				echo json_encode(array(
						'email' => $result
				));
				die();
			}else {
				http_response_code ( 200 );
				echo json_encode(array(
						'email' => $result
				));
				die();
			}		
		}catch (Exception $e){
			echo json_encode(array(
					'exception' => true,
					'errorMesageEmail' => $e->getMessage()
			));
		}
	};	
}
?>