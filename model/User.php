<?php

class User {
	private $userId ;
	private $username;
	private $email;
	private $password;
	private $country;
	private $joinDate;
	private $subscribers;
	private $profilPicName;
	
	
	// auto get fields
	public function __get($fieldName){
		return $tihs->$fieldName;
	}
	
	//set username
	public function setUserName($username){
		if (!empty($username)) {
			$this->username = htmlentities($username);
		}else{
			throw new Exception ( 'Empty username');
		}
	}
	
	//set email
	public function setEmail($email){
		if (!empty($email)) {
			$this->email = htmlentities($email);
		}else{
			throw new Exception ( 'Empty e-mail');
		}
	}
	
	//set password
	public function setPassword($password){
		if (strlen(trim($password)) > 0) {
			$this->password = htmlentities($password);
		}else{
			throw new Exception ( 'Empty password');
		}
	}
	
	//set country
	public function setCountry($country){
		if (!empty($country) > 0) {
			$this->country = htmlentities($country);
		}else{
			throw new Exception ( 'Empty country');
		}
	}
	
	//set profil picture name
	public function setProfilPicName($profilPicName){
		if (!empty($profilPicName)) {
			$this->profilPicName = htmlentities($profilPicName);
		}else{
			throw new Exception ( 'Empty profil picture name');
		}
	}
	
	//set subscribers
	public function setProfilPicName($subscribers){
		if (!empty($subscribers)) {
			$this->subscribers = htmlentities($subscribers);
		}else{
			throw new Exception ( 'Empty subscribers');
		}
	}
	
	
	public function __construct($username, $email, $password, $country, $joinDate){
		
	}
	
}

?>