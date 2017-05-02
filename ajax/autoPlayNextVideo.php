<?php
// check for autoplay options
if($_SERVER['REQUEST_METHOD'] === "GET"){
	if (isset($_GET['ukuzidlalela'])) {
		if(isset($_COOKIE['ukuzidlalelaividiyoelandelayo'])) {
			http_response_code ( 200 );
			echo json_encode(array(
					'ukuzidlalela' => true
			));
		} else {
			http_response_code ( 200 );
			echo json_encode(array(
					'ukuzidlalela' => false
			));
		}
	}
}
// change autoplay;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	$autoPlay = json_decode($_POST['data']);
	if ($autoPlay->autoPlay === "on"){
		$cookie_name = "ukuzidlalelaividiyoelandelayo";
		$cookie_value = "ukuzidlalelasamukelwa";
		$time =  time() + (10 * 365 * 24 * 60 * 60);
		setcookie($cookie_name, $cookie_value, $time, "/");
		http_response_code ( 200 );
		echo json_encode(array(
				'ukuzidlalela' => "ON"
		));
	}else{
		$cookie_name = "ukuzidlalelaividiyoelandelayo";
		$cookie_value = "ukuzidlalelasamukelwa";
		$time =  time() -1;
		setcookie($cookie_name, $cookie_value, $time, "/");
		http_response_code ( 200 );
		echo json_encode(array(
				'ukuzidlalela' => "OFF"
		));
	}
}
?>