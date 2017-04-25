<?php

	define('INSERT_CHANNEL_SUSCRIBER_SQL', 'INSERT INTO channel_subscribers (`channel_id`, `user_id`) VALUES (?, ?);');	
		
	define('DELETE_CHANEL_SUSCRIBER_SQL', 'DELETE FROM channel_subscribers WHERE channel_id = ? && user_id = ?;');
	
	define('SELECT_CHANEL_SQL', 'SELECT channel_id FROM channel_subscribers WHERE user_id = ? && channel_id = ?;');
	
	
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	$data = json_decode($_POST['data']);
		$channelId = $data->channelId;
		$userId = $data->userId;
		$suscribers = $data->suscribers;
		
		try {
		$userData = new UserDAO();
		
		$userData->updateUserSuscribers($userId, $suscribers);
		
		
		
		}catch (PDOException $e){
	
		
	}catch (Exception $e){
			
	}
		
		
	echo $channelId;
	echo($userId);
	echo ($suscribers);
		
	
	
}
	
	
	
// $db = DBConnection::getDb();

