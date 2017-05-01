<?php
session_start();
if ($_GET['category'] > 0 && $_GET['category'] <= 15){
	$categoryId = htmlentities(trim($_GET['category']));
}else {
	header('Location: 404.php', true, 302);
}

include 'view/category.php';
?>