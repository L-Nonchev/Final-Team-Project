<?php
function __autoload($className) {
	require_once "../model/" . $className . '.php';
}
function getUserInfo($userId){
	$userId = htmlentities(trim($userId));
	return (new UserDAO())->getUserInformation($userId);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
	try {
		if (isset($_GET['userId'])){
			echo json_encode(getUserInfo($_GET['userId']));
		}else http_response_code(400);
	}catch (Exception $e){
		http_response_code(500);
		echo json_encode(array ("error" => $e->getMessage ()));
	}

}
?>