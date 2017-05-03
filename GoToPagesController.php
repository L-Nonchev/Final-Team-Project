<?php
// autoload function
function __autoload($className){
	require_once './model/'. $className .'.php';
}
session_start();

if ($_SERVER['REQUEST_METHOD'] === "GET"){
	if (isset($_GET['page'])){
		$page = $_GET['page'];
		$pages = array("likedVideos", "watchLater", "playlist", "history");

		if (in_array($page, $pages)){

			include 'view/'.$page.".php";
		}else{
				include '404.php';
				die();
			}
	} else{
		include '404.php';
		die();
	}
} else{
	include '404.php';
	die();
}

?>