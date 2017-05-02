<?php

define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'circle_tube' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASS', '' );

// define ( 'DB_HOST', 'localhost' );
// define ( 'DB_NAME', 'j7cheers_circle_video' );
// define ( 'DB_USER', 'j7cheers_root' );
// define ( 'DB_PASS', 'aK%3W[vJ7)ox' );

class DBConnection {
	private static $db = null;

	public static function getDb() {
		if (self::$db === null) {
			try {
				self::$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
				self::$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			}
			catch (PDOException $e) {
				throw new PDOException("DataBase dosn't work!");
			}
		}
		return self::$db;
	}
}
?>