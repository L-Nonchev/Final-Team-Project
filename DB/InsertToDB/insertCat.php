<?php
$cat = array(
		"Film & Animation",
		"Cars & Vehicles",
		"Music",
		"Pets & Animals",
		"Sports",
		"Travel & Events",
		"Gaming",
		"People & Blogs",
		"Comdy",
		"Entertaiment",
		"News & Politics",
		"How-to & Style",
		"Education",
		"Science & Technology",
		"Non-profits & Activitsm"
);



print_r($cat);

define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'circle_tube' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );

$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


for ($index = 0; $index < count($cat); $index++){
	$check = $dbcon->prepare("INSERT INTO category VALUES (null, ?);");
	$check->execute(array($cat[$index]));
};


?>