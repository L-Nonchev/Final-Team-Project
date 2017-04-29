<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
		
	function __autoload($className){
		require_once '../model/' . $className .'.php';
	}
	
	define ('SELECT_ALL_COUNTRYES', 'SELECT * FROM countries;' );
	
	/**
	 * function for get all country and return json
	 * 
	 * @param array $countres - 
	 * @throws Exception
	 * @return json
	 */
	function getAllCountryes(&$countres = array()){
		try {
			$db = DBConnection::getDb();
			$ress = $db->query(SELECT_ALL_COUNTRYES);
			if ($ress->rowCount() > 0){
				while ($row = $ress->fetch(PDO::FETCH_ASSOC)){
					$countres[] = array(
							"id" => $row['country_id'],
							"name" => $row['country_name']
					);		
				}
				return json_encode($countres);
			}
		} catch ( PDOException $e){
			throw new Exception( $e->getMessage());
		}
	}
	
	$countres = array();
	echo getAllCountryes($countres);
}
	
	