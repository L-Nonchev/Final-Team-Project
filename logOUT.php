<?php
// destroy session
session_start();
session_destroy();
header('Location: ./HomePageController.php', true, 302);
die();