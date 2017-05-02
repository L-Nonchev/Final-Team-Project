<?php
session_start();

// autoload function
function __autoload($className){
	require_once '../model/'. $className .'.php';
}

if(isset($_SESSION['user'])){
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		if (isset($_POST['data']) && isset($_SESSION['user'])){
			$data = json_decode($_POST['data']);
			$user = json_decode($_SESSION['user']);
			$date = date("Y-m-d");
			
			try {
				$userData = new  UserDAO();
				$result = $userData->insertDiscussionComent($data->channelId, $data->text, $date, $user->userId);
				if ($result) {
					http_response_code ( 200 );
					echo json_encode(array(
							'usrtId' => $user->userId,
							'username' => $user->username,
							'userpic' => $user->profilPicName,
							'text' =>$data->text,
							'discussion_id' => $result
					));
				}
			} catch (PDOException $e){
				http_response_code ( 500 );
				echo json_encode(array(
						"error" =>  "Something went wrong, try again"
				));
				die();
			}catch (Exception $e){
				$error = $e->getMessage();
				http_response_code ( 401 );
				echo json_encode(array(
						"error" => $error
				));
				die();
			}
		}else{
			http_response_code ( 401 );
			echo json_encode(array(
					"error" => "Not Found!"
			));
			die();
		}
	}
	
	
	if ($_SERVER['REQUEST_METHOD'] === "GET"){
		
		$channelId = $_GET['@$^^%@@^@^$^@'];
		$offset = $_GET['offset'];
		try {
			$userData = new  UserDAO();
			$result = $userData->selectChannelDisussion($channelId, $offset);
			$cntDisscussions = $userData->countDiscussion($channelId);
			for ($index = 0 ; $index < count($result); $index++){
				$now = date_create(date("Y-m-d"));
				$uploadetDate = date_create($result[$index]['date']);
				$releaseDate = date_diff($now, $uploadetDate);
				if ( ($releaseDate->y) > 0 ){
					$printDate = $releaseDate->y . ' Year ago';
				}else if (($releaseDate->m) > 0){
					$printDate = $releaseDate->m . ' Мonth ago';
				}else if (($releaseDate->d) > 0){
					$printDate = $releaseDate->d . ' Days ago';
				}else{
					$printDate = " Today";
				}
				$result[$index]['cntDiscussions'] = $cntDisscussions;
				$result[$index]['date'] = $printDate;
			}
			http_response_code ( 200 );
			echo json_encode($result);
			die();
		}catch (Exception $e){
			$a = $e->getMessage();
			echo $a;
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
		$data = array();
		parse_str(file_get_contents("php://input"), $data);
		$delComent = json_decode($data['data']);		
		try {
			$userData = new  UserDAO();
			$result = $userData->deleteDiscussionComent($delComent->commentId, $delComent->userId);

			if ($result){
					http_response_code ( 200 );
					echo json_encode(array(
							'delete' => $result
					));
					die();
			}	
		}catch (Exception $e){
			http_response_code ( 500 );
			echo json_encode(array(
					"error" =>  "Something went wrong, try again"
			));
		}
	}
}else {
	http_response_code ( 400 );
	echo json_encode(array(
			'error' => "Can not comment or read comments, please log in first!"
	));
}
?>