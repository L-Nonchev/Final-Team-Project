<?php

	class UserDAO implements IUserDAO {
		private $db;
		
		//<!-- =-=-=-=-=-=-=  CONSTANTS  =-=-=-=-=-=-= -->\\
		const INSERT_NEW_USER_SQL ="INSERT INTO users VALUES (
								null, ?, sha1(?), sha1(?), ?, ?, ?, ?, ?, ?);";
		
		const SELECT_USER_NAME_SQL = "SELECT username FROM users WHERE username = ?;";
		
		const SELECT_EMAIL_SQL = "SELECT email FROM users WHERE email = sha1(?);";
		
		const SELECT_COUNTRY_NAME_SQL = "SELECT country_name FROM countries WHERE country_id = ?;";
		
		const SELECT_ALL_USER_DATA_BY_EMAIL_PASSWORD_SQL = "SELECT u.user_id, u.username, c.country_name, u.join_date, u.subscribers, u.description, u.picture , u.banner
									  FROM users u JOIN countries c ON ( u.country_id = c.country_id)
									  WHERE email = sha1(?) AND password = sha1(?);";
		
		const SELECT_ALL_USER_DATA_BY_ID_SQL = "SELECT u.user_id, u.username, c.country_name, u.join_date, u.subscribers, u.description, u.picture , u.banner
									  FROM users u JOIN countries c ON ( u.country_id = c.country_id)
									  WHERE user_id = ?;";
		
		//<!-- =-=-=-=-=-=-=  DB CONECTION CREATE  =-=-=-=-=-=-= -->\\
		public function __construct(){
			$this->db = DBConnection::getDb();
		}
		
		//<!-- =-=-=-=-=-=-=  FUNCTIONS FOR User  =-=-=-=-=-=-= -->\\
		
		public function loginUser(User $user){
			$pstmt = $this->db->prepare(self::SELECT_ALL_USER_DATA_BY_EMAIL_PASSWORD_SQL);
			if ($pstmt->execute(array($user->email, $user->password))){
				
				
				$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				
				if (count($result) === 0 ){
					throw new Exception("Wrong email or password! Try again.");
				}else{
					$result = $result[0];
					$user->setUserId($result['user_id']);
					$user->setUserName($result['username']);
					$user->setCountry($result['country_name']);
					$user->setJoinDate($result['join_date']);
					$user->setSubscribers($result['subscribers']);
					$user->setDescription($result['description']);
					$user->setProfilPicName($result['picture']);
					$user->setProfilBanner($result['banner']);
					
					return true;
				}				
			}
		}
		
		public function singInUser(User $user){
			$user->setJoinDate(date("Y-m-d"));
			$user->setSubscribers(0);
			$user->setDescription("Welcome to my chanel!");
			$user->setProfilPicName("default-user.jpg");
			$user->setProfilBanner("channel-banner.png");
			
			$pstmt = $this->db->prepare(self::INSERT_NEW_USER_SQL);
			
			if ($pstmt->execute(array($user->username, $user->email, $user->password, $user->country
				,$user->joinDate,  $user->subscribers,  $user->description, $user->profilPicName, $user->profilBanner))){
					//get user_id
					$user->setUserId($this->db->lastInsertId());
					//get country name
					$pstmt = $this->db->prepare(self::SELECT_COUNTRY_NAME_SQL);
					$pstmt->execute(array($user->country));
					$user->setCountry($pstmt->fetchColumn());
					
					return true;
			}else{
				throw new Exception("Imperceptibly create an account");
			}
		}		
		
		// check for exist user
		/**
		 * 
		 * @param User $user - Object ,and we need  only user->username
		 * @return mixed|string
		 */
		public function selectUsernameFromDB (User $user){
			$pstmt = $this->db->prepare(self::SELECT_USER_NAME_SQL);
			if ($pstmt->execute(array($user->username))){
				if ($resutl = $pstmt->fetchColumn()){
					return $resutl;
				}else {
					return "Username not found!";
				}
				
			}
			
		}
		
		/**
		 * 
		 * @param User $user
		 * @return boolean
		 */
		public function selectEmailFromDB (User $user){
			$pstmt = $this->db->prepare(self::SELECT_EMAIL_SQL);
			if ($pstmt->execute(array($user->email))){
				if ($resutl = $pstmt->fetchColumn()){
					return true;
				}else {
					return false;
				}
		
			}
				
		}
		
		
		public  function getAllUserData ($id){
			$pstmt = $this->db->prepare(self::SELECT_ALL_USER_DATA_BY_ID_SQL);
			if ($pstmt->execute(array($id))){
			
				$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				
				if (count($result) === 0 ){
					throw new Exception("User not found");
				}else{
					$result = $result[0];
					
					$user = new User(null, null, $result['username'], $result['country_name'], $result['join_date'], $result['subscribers'],
							 $result['picture'], $result['banner'] ,$result['description'], $result['user_id']);
					
					return $user;
				}
			}
		}
		
		
		
	}

	
?>