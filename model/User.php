<?php
class User implements JsonSerializable {
	private $userId ;
	private $username;
	private $email;
	private $password;
	private $country;
	private $joinDate;
	private $subscribers;
	private $profilPicName;
	private $profilBanner;
	private $description;
	private $views;
	
	
	// auto get fields
	public function __get($fieldName){
		return $this->$fieldName;
	}
	
	//set user id
	public function setUserId($userId){
		if (isset($userId))
		if (is_numeric($userId) && $userId >= 0) {
			$this->userId = htmlentities($userId);
		}else{
			throw new Exception ( 'Problem with user id validation');
		}
	}
	
	//set username
	public function setUserName($username){
		if (isset($username))
		if (!empty($username)) {
			$name = $username;
			if (strlen($username) <= 20){
				if (!preg_match("/^[- _ a-zA-Z0-9 ()]*$/",$name)) {
					throw new Exception ( 'User ERROR: Only letters ,numbers , - , _ , ( ) and white space allowed.');
				}else {
					$this->username = htmlentities($username);
				}
			}else{
				throw new Exception ( 'Username ERROR: Please enter the length of the username no greater than 20 characters.');
			}
			
		}else{
			throw new Exception ( 'Empty username');
		}
	}
	
	//set email
	public function setEmail($email){
		if (isset($email))
		if (!empty($email)) {
			if (strlen($email) <= 40){
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					throw new Exception ( 'Email ERROR: Invalid email address format!');
				}else {
					$this->email = htmlentities($email);
				}
			}else{
				throw new Exception ( 'Email ERROR: Please enter the length of the email no greater than 40 characters.');
			}
			
			
		}else{
			throw new Exception ( 'Empty e-mail');
		}
	}
	
	//set password
	public function setPassword($password){
		if (isset($password))
		if (strlen(trim($password)) > 7) {
			if (strlen(trim($password)) <= 40){
				$this->password = htmlentities($password);
			}else{
			throw new Exception ( 'You must enter no more than 40 characters for passwords');
		}	
		}else{
			throw new Exception ( 'You must enter at last 8 characters for your password');
		}
	}
	
	//set country
	public function setCountry($country){
		if (isset($country))
		if (!empty($country)) {
			$this->country = htmlentities($country);
		}else{
			throw new Exception ( 'Empty country');
		}
	}
	
	//set profil picture name
	public function setProfilPicName($profilPicName){
		if (isset($profilPicName))
		if (!empty($profilPicName)) {
			$this->profilPicName = htmlentities($profilPicName);
		}else{
			throw new Exception ( 'Empty profil picture name');
		}
	}
	
	//set profil banner name
	public function setProfilBanner($profilBanner){
		if (isset($profilBanner))
			if (!empty($profilBanner)) {
				$this->profilBanner = htmlentities($profilBanner);
			}else{
				throw new Exception ( 'Empty profil banner name');
			}
	}
	
	//set description for profil
	public function setDescription($description){
		if (isset($description))
		if (!empty($description)) {
			if (strlen($description) <= 500){
				$this->description = htmlentities($description);
			}else{
				throw new Exception ( 'You must enter no more than 40 characters for description');
			}
			
		}else{
			throw new Exception ( 'Empty description');
		}
	}
	
	//set subscribers
	public function setSubscribers($subscribers){
		if (isset($subscribers))
		if (is_numeric($subscribers) &&  $subscribers >= 0) {
			$this->subscribers = htmlentities($subscribers);
		}else{
			throw new Exception ( ' Problem with subscribers validation');
		}
	}
	
	//set views
	public function setViews($views){
		if (isset($views))
			if (is_numeric($views) &&  $views >= 0) {
				$this->views = htmlentities($views);
			}else{
				throw new Exception ( ' Problem with view validation');
			}
	}
	
	//set join date
	public function setJoinDate($joinDate){
		if (isset($joinDate))
		if (!empty($joinDate)) {
			$this->joinDate = htmlentities($joinDate);
		}else{
			throw new Exception ( ' Empty join date');
		}
	}
	
	// create object to json 
	public function jsonSerialize() {
		$result = get_object_vars($this);
		unset($result['password']);
		unset($result['email']);
		return $result;
	}
	
	
	//constructor
	public function __construct($email = null, $password = null , $username = null,  $country = null, $joinDate = null,
			$subscribers = 0, $profilPicName = null, $profilBanner = null, $description = null, $userId = 0 , $views = 0){
						
				 $this->setUserName($username);
				 $this->setEmail($email);
				 $this->setPassword($password);
				 $this->setCountry($country);
				 $this->setJoinDate($joinDate);
				 $this->setSubscribers($subscribers);
				 $this->setViews($views);
				 $this->setProfilPicName($profilPicName);
				 $this->setProfilBanner($profilBanner);
				 $this->setDescription($description);
				 $this->setUserId($userId);			 	
	}	
}
?>