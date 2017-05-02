<?php
// autoload function
function __autoload($className){
	require_once './model/'. $className .'.php';
}
session_start();

if ($_SERVER['REQUEST_METHOD'] === "GET") {
	if (isset($_GET['page'])){
		$page = $_GET['page'];
		if ($page == "channels"){
		
			try {
					include 'view/allChannelsPage.php';
			}catch (Exception $e){
					
			}
			
		}else{
			include '404.php';
			die();
		}
	}
}