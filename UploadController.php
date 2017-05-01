<?php
session_start();
if (isset($_SESSION['user'])){
	include 'view/upload.php';
}header('Location: HomePageController.php', true, 302);
?>