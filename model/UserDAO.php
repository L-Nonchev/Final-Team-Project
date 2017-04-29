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
		
		const UPDATE_USER_SUSCRIBERS_SQL = "UPDATE users SET subscribers = ?  WHERE user_id = ?;";
		
		const INSERT_CHANNEL_SUSCRIBER_SQL = "INSERT INTO channel_subscribers (`channel_id`, `user_id`) VALUES (?, ?);";
		
		const DELETE_CHANEL_SUSCRIBER_SQL = "DELETE FROM channel_subscribers WHERE channel_id = ? && user_id = ?;";
		
		const CHECK_FOR_EXIST_CHANNEL_SQL = "SELECT channel_id FROM channel_subscribers WHERE channel_id = ? && user_id  = ?;";
		
		const SELECT_ALL_ID_SUBSCRIBERS_WHER_USER_IS_FOLLOWED_SQL = "SELECT channel_id FROM channel_subscribers WHERE user_id = ? LIMIT 2 OFFSET ?;";
		
		const SELECT_USER_COUNT_VIDEOS_SQL = "SELECT COUNT(video_id) FROM videos WHERE user_id  = ?;";
		
		
		
		
// 		const SELECT_CHANNE:S
		

		//<!-- =-=-=-=-=-=-=  DB CONECTION CREATE  =-=-=-=-=-=-= -->\\
		public function __construct(){
			$this->db = DBConnection::getDb();
		}
		
//<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=   FUNCTIONS FOR User   =-=-=-=-=-=- =-=-=-=-=-=-=-=-=-=-=-=-= -->\\
		
		
		//<!-- =-=-=-=-=-=-=  LogIn user  =-=-=-=-=-=-= -->\\
		/**
		 * 
		 * {@inheritDoc}
		 * @see IUserDAO::loginUser()
		 */
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
		
		//<!-- =-=-=-=-=-=-=  Sing Up user  =-=-=-=-=-=-= -->\\
		/**
		 * 
		 * {@inheritDoc}
		 * @see IUserDAO::singInUser()
		 */
		public function singInUser(User $user){
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
		
		//<!-- =-=-=-=-=-=-=  Check for Exist user for Ajax valid=-=-=-=-=-=-= -->\\
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
		
		//<!-- =-=-=-=-=-=-=  Check for exist email  Ajax valid=-=-=-=-=-=-= -->\\
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
		
		//<!-- =-=-=-=-=-=-=  Get All data for user by ID =-=-=-=-=-=-= -->\\
		/**
		 * 
		 * @param unknown $id
		 * @throws Exception
		 * @return User
		 */
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
	
		
		//-=-=-=-=-=-= get sorted users =-=-=-==-=-==--\\
		/**
		 * function gets sorted user
		 *
		 * @param string $sortBy
		 * @throws Exception
		 * @return array
		 */
		public function getSortedUsers($sortBy, $limit){
			try {
				return $this->db->query("SELECT user_id, username, subscribers, picture FROM users ORDER BY  $sortBy DESC LIMIT $limit;")->fetchAll(PDO::FETCH_ASSOC);
			}catch (PDOException $e){
				throw new Exception('Incorect data!');
			}
		}
		
//-=-=-=-=-=-=-=-=-=-=-=-=  Channel suscribers functions =-=-=-==-=-==-=-=-=-==-=-==--\\
		/**
		 * 
		 * @param unknown $userId
		 * @param unknown $suscribers
		 * @return boolean
		 */
		

		public function updateUserSuscribers ($userId ,$suscribers){
			$pstmt = $this->db->prepare(self::UPDATE_USER_SUSCRIBERS_SQL);
			if ($pstmt->execute(array($suscribers, $userId))){
				return true;
			}else {
				return false;
			}
		}
		
		/**
		 * Checks if the user has followed this channel
		 *
		 * @param unknown $userId - user wants to follow channel
		 * @param unknown $channelId - ide for used channel
		 * @return boolean
		 */
		function cheangeChannelFollowed ($userId, $channelId){
			$pstmt = $this->db->prepare(self::CHECK_FOR_EXIST_CHANNEL_SQL);
			$pstmt->execute(array($channelId, $userId));
			
			$result = $pstmt->fetchColumn();
	
			if ($result > 0){
				return true;
			}else {
				return false;
			}	
		}
		/**
		 * Delete user following channel
		 *
		 * @param unknown $userId
		 * @param unknown $channelId
		 * @return boolean
		 */
		function deleteChannelSybscriber ($userId, $channelId){
			$pstmt = $this->db->prepare(self::DELETE_CHANEL_SUSCRIBER_SQL);
		
			if ($pstmt->execute(array($channelId, $userId))){
				return true;
			}else {
				throw new Exception("Unsubscribe from subscribers");
			}
		}
		
		/**
		 * Add user to follows channel
		 *
		 * @param unknown $userId
		 * @param unknown $channelId
		 * @return boolean
		 */
		function addChannelSybscriber ($userId, $channelId){
			$pstmt = $this->db->prepare(self::INSERT_CHANNEL_SUSCRIBER_SQL);
			
			if ($pstmt->execute(array($channelId, $userId))){
				return true;
			}else {
				throw new Exception("Subscription unsuccessful");
			}
		}
		
		 
		/**
		 * The feature brings together all channel follower options
		 * 
		 * @param unknown $userId -
		 * @param unknown $channelId
		 * @param unknown $suscribers
		 * @return boolean
		 */
		function channelSuscribers ($userId, $channelId, $suscribers){
			try {
				$this->db->beginTransaction();
				if ($this->cheangeChannelFollowed($userId, $channelId)){
					// 				$this->db->beginTransaction();
					$suscribers--;
					if ($this->deleteChannelSybscriber($userId, $channelId));
					if ($this->updateUserSuscribers($channelId, $suscribers));
					$this->db->commit();
					
					return  array( 
							'upload' => "success",
							'suscribers' => $suscribers,
							'ko stna' => "dell"
					);
				
				}else {
					$suscribers++;
					$this->addChannelSybscriber($userId, $channelId);
					$this->updateUserSuscribers($channelId, $suscribers);
					$this->db->commit();
					
					return  array(
							'upload' => "success",
							'suscribers' => $suscribers,
							'ko stna' => "add"
					);
				}
			}catch (Exception $e){
					$error = $e->getMessage();
				throw new Exception($error);
			}
		}
		
		//-=-=-=-=-=-= /Channel suscribers functions =-=-=-==-=-==--\\
		
		//-=-=-=-=-=-= USER Channels functions =-=-=-==-=-==--\\
		function getVideosCount($userId){
			$pstmt = $this->db->prepare(self::SELECT_USER_COUNT_VIDEOS_SQL);
			
			if ($pstmt->execute(array($userId))){
				 $result = $pstmt->fetchColumn();
				 
				 return $result;
			}
			
		}
		
		function �llFollowedPages($user_id , $offset){
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
			$pstmt = $this->db->prepare(self::SELECT_ALL_ID_SUBSCRIBERS_WHER_USER_IS_FOLLOWED_SQL);
			
			if ($pstmt->execute(array($user_id, $offset))){
				$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				
				return $result;
			}
		}
		
		
		
		
		function getInfAboutChannelsFollwed($user_id , $offset){
				
		}
		
		
		
		
		
	//end class
	}	
?>