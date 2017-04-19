<?php

$genre = array(
		"Asian Pop (J-Pop, K-pop)",
		"Blues",
		"Children’s Music",
		"Classical Music",
		"Country Music",
		"Dance Music",
		"European Music (Folk/Pop)",
		"Hip Hop/Rap",
		"Indie Pop",
		"Inspirational (incl. Gospel)",
		"Jazz",
		"Latin Music",
		"New Age",
		"Opera",
		"Pop (Popular music)",
		"R&B/Soul",
		"Reggae",
		"Rock",
		"Singer/Songw",
		"Singer/Songwriter (inc. Folk)",
		"Soundtrack",
		"Vocal",
		"World Music/Beats"	
);

print_r($genre);

define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'circle_tube' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );

$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


for ($index = 0; $index < count($genre); $index++){
	$check = $dbcon->prepare("INSERT INTO music_genre VALUES (null, ?);");
	$check->execute(array($genre[$index]));
};



?>