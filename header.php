<?php
if (isset($_SESSION['user'])){
	$user = json_decode($_SESSION['user']);
	include 'view/logInHeader.php';
}else {
	$userPic = "default-user.jpg";
	include 'view/notLoginheader.php';
}
?>