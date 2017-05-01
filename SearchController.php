<?php
	session_start();
	if (isset($_POST['searchField'])){
		$search = htmlentities(trim($_POST['searchField']));
	}else {
		header('Location: HomePageController.php', true, 302);
	}
	
	include 'view/search.php';
?>