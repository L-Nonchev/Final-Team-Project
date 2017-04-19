<?php

	class UserDAO implements IUserDAO {
		private $db;
		
		//<!-- =-=-=-=-=-=-=  CONSTANTS  =-=-=-=-=-=-= -->\\
		const INSERT_NEW_USER_SQL ="INSERT INTO users VALUES (
								null, ?, sha1(?), sha1(?), ?, ?, ?, ?, ?);";
		
		const SELECT_USER_NAME_SQL = "SELECT username FROM users WHERE username = ?;";
		
		const SELECT_EMAIL_SQL = "SELECT u_email FROM users WHERE u_email = sha1(?);";
		
		const SELECT_COUNTRY_NAME_SQL = "SELECT country_name FROM countries WHERE country_id = ?;";
		
		const SELECT_ALL_USER_DATA = "SELECT u.user_id, u.username, c.country_name, u.join_date, u.subscribers, u.description, u.pic_path
									  FROM users u JOIN countries c ON ( u.country_id = c.country_id)
									  WHERE u_email = sha1(?) AND u_password = sha1(?);";
		
		//<!-- =-=-=-=-=-=-=  DB CONECTION CREATE  =-=-=-=-=-=-= -->\\
		public function __construct(){
			$this->db = DBConnection::getDb();
		}
		
		//<!-- =-=-=-=-=-=-=  FUNCTIONS FOR User  =-=-=-=-=-=-= -->\\
		
		public function loginUser(User $user){
			$pstmt = $this->db->prepare(self::SELECT_ALL_USER_DATA);
			if ($pstmt->execute(array($user->email, $user->password))){
				
				
				$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				
				if (count($result) === 0 ){
					throw new Exception("This account does not exist!");
				}else{
					$result = $result[0];
					$user->setUserId($result['user_id']);
					$user->setUserName($result['username']);
					$user->setCountry($result['country_name']);
					$user->setJoinDate($result['join_date']);
					$user->setSubscribers($result['subscribers']);
					$user->setDescription($result['description']);
					$user->setProfilPicName($result['pic_path']);
					
					return true;
				}				
			}
		}
		
		public function singInUser(User $user){
			$user->setJoinDate(date("Y-m-d"));
			$user->setSubscribers(0);
			$user->setDescription("Welcome to my chanel!");
			$user->setProfilPicName("default-user.jpg");
			
			$pstmt = $this->db->prepare(self::INSERT_NEW_USER_SQL);
			
			if ($pstmt->execute(array($user->username, $user->email, $user->password, $user->country
				,$user->joinDate,  $user->subscribers,  $user->description, $user->profilPicName))){
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
	}

	
?>