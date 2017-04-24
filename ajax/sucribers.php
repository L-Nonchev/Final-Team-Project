<?php

	define('INSERT_CHANNEL_SUSCRIBER_SQL', 'INSERT INTO channel_subscribers (`channel_id`, `user_id`) VALUES (?, ?);');	
	
	define('UPDATE_USER_SUSCRIBERS_SQL', 'UPDATE users SET subscribers = subscribers ?  WHERE user_id = ?;');
	
	define('DELETE_CHANEL_SUSCRIBER_SQL', 'DELETE FROM channel_subscribers WHERE channel_id = ? && user_id = ?;');
	
	define('SELECT_CHANEL_SQL', 'SELECT channel_id FROM channel_subscribers WHERE user_id = ? && channel_id = ?;');
	
	
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	$data = json_decode($_POST['data']);
		$channelId = $data->channelId;
		$userId = $data->userId;
		

	echo($channelId);
	echo($userId);
		
	
	
}
	
	
	
// $db = DBConnection::getDb();

