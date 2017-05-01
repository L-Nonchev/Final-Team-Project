<?php
function __autoload($className) {
	require_once "model/" . $className . '.php';
}
session_start();
try {
	$allCategories = (new VideoDAO()) ->getAllCategories();
}catch (Exception $e){
		header('Location: 503.php', true, 302);
		die();	
}
include 'view/categories.php';
?>