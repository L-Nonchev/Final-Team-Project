<?php

	class UserDAO implements IUserDAO {
		private $db;
		
		//<!-- =-=-=-=-=-=-=  CONSTANTS  =-=-=-=-=-=-= -->\\
		const INSERT_NEW_USER_SQL ="INSERT INTO users VALUES (
								null, ?, sha1(?), sha1(?), ?, ?, ?, ?, ?, ?);";
		
		const SELECT_USER_ID_BY_USERNAME_SQL = "SELECT user_id FROM users WHERE username = ?;";
		
		const SELECT_USER_ID_BY_EMAIL_SQL = "SELECT user_id FROM users WHERE email = sha1(?);";
		
		const SELECT_PASSWORD_BY_ID_SQL = "SELECT password FROM users WHERE user_id = ?;";
		
		const SELECT_COUNTRY_NAME_SQL = "SELECT country_name FROM countries WHERE country_id = ?;";
		
		const SELECT_ALL_USER_DATA_BY_EMAIL_PASSWORD_SQL = "SELECT u.user_id, u.username, c.country_name, u.join_date, u.subscribers, u.description, u.picture , u.banner
									  FROM users u JOIN countries c ON ( u.country_id = c.country_id)
									  WHERE email = sha1(?) AND password = sha1(?);";
		
		const SELECT_ALL_USER_DATA_BY_ID_SQL = "SELECT u.user_id, u.username, c.country_name, u.join_date, u.subscribers, u.description, u.picture , u.banner , COUNT(ch.user_id) AS 'views'
												FROM users u 
												LEFT JOIN channel_views ch ON (u.user_id = ch.channel_id)
												LEFT JOIN countries c ON ( u.country_id = c.country_id)
												WHERE u.user_id = ? ;";
		
		const UPDATE_USER_SUSCRIBERS_SQL = "UPDATE users SET subscribers = ?  WHERE user_id = ?;";
		
		const INSERT_CHANNEL_SUSCRIBER_SQL = "INSERT INTO channel_subscribers (`channel_id`, `user_id`) VALUES (?, ?);";
		
		const DELETE_CHANEL_SUSCRIBER_SQL = "DELETE FROM channel_subscribers WHERE channel_id = ? && user_id = ?;";
		
		const CHECK_FOR_EXIST_CHANNEL_SQL = "SELECT channel_id FROM channel_subscribers WHERE channel_id = ? && user_id  = ?;";
		
		const SELECT_ALL_ID_SUBSCRIBERS_WHER_USER_IS_FOLLOWED_SQL = "SELECT channel_id FROM channel_subscribers WHERE user_id = ? LIMIT 8 OFFSET ?;";
		
		const SELECT_USER_COUNT_VIDEOS_SQL = "SELECT COUNT(video_id) FROM videos WHERE user_id  = ?;";
		
		const INSERT_DISCUSSION_COMENT_SQL = "INSERT INTO discussions (`channel_id`, `text`, `date`, `user_discussant_id`) VALUES (?, ?, ?, ?);";
		const DELETE_DISCUSSION_COMENT_SQL = "DELETE FROM discussions Where discussion_id = ? AND user_discussant_id = ?;";
		const COUNT_CHANNEL_DISSCUSIONS_SQL = "SELECT COUNT(discussion_id) FROM discussions WHERE channel_id = ?;";
		const SELECT_DISCUSSION_SQL ="SELECT d.discussion_id, d.user_discussant_id, d.text , d.date, d.user_discussant_id, u.username, u.picture
											FROM discussions d
											JOIN users u ON ( d.user_discussant_id = u.user_id)
											WHERE channel_id = ?
											ORDER BY d.discussion_id DESC
											LIMIT 8 OFFSET ?;";
		
		const UPDATE_USERNAME_SQL = "UPDATE users SET username = ? WHERE user_id = ?;";
		const UPDATE_EMAIL_SQL = "UPDATE users SET email = sha1(?) WHERE user_id = ?;";
		const UPDATE_PASSWORD_SQL = "UPDATE users SET password = sha1(?) WHERE user_id = ?;";
		const UPDATE_PICTURE_SQL = "UPDATE users SET picture = ? WHERE user_id = ?;";
		const UPDATE_BANNER_SQL = "UPDATE users SET banner = ? WHERE user_id = ?;";
		
		//<!-- =-=-=-=-=-=-=  DB CONECTION CREATE  =-=-=-=-=-=-= -->\\
		public function __construct(){
			$this->db = DBConnection::getDb();
		}
		
//<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=   FUNCTIONS FOR User   =-=-=-=-=-=- =-=-=-=-=-=-=-=-=-=-=-=-= -->\\
		
		
		//<!-- =-=-=-=-=-=-=  LogIn user  =-=-=-=-=-=-= -->\\
		/**
		 * get user date when loged in
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
		 * Insert new user data when create new account
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
		 * get user data from DB using username
		 * 
		 * @param User $user -obcejt user
		 * @return mixed|boolean
		 */
		public function selectUsernameFromDB (User $user){
			$pstmt = $this->db->prepare(self::SELECT_USER_ID_BY_USERNAME_SQL);
			if ($pstmt->execute(array($user->username))){
				if ($resutl = $pstmt->fetchColumn()){
					return $resutl;
				}else {
					return false;
				}
			}	
		}
		
		//<!-- =-=-=-=-=-=-=  Check for exist email  Ajax valid=-=-=-=-=-=-= -->\\
		/**
		 * get user data from Db using email
		 * 
		 * 
		 * @param User $user - objec user
		 * @return boolean
		 */
		public function selectEmailFromDB (User $user){
			$pstmt = $this->db->prepare(self::SELECT_USER_ID_BY_EMAIL_SQL);
			if ($pstmt->execute(array($user->email))){
				if ($resutl = $pstmt->fetchColumn()){
					return $resutl;
				}else {
					return false;
				}
			}		
		}
		//<!-- =-=-=-=-=-=-=  Check for exist password  Ajax valid=-=-=-=-=-=-= -->\\
		/**
		 * get user password from DB for validations
		 *
		 * @param User $user - user id
		 * @return boolean
		 */
		public function selectPasswordFromDB ($userId){
			$pstmt = $this->db->prepare(self::SELECT_PASSWORD_BY_ID_SQL);
			if ($pstmt->execute(array($userId))){
				if ($resutl = $pstmt->fetchColumn()){
					return $resutl;
				}else {
					return false;
				}
			}
		}
	
		
		//<!-- =-=-=-=-=-=-=  Update user data=-=-=-=-=-=-= -->\\
		/**
		 * update user data to DB
		 * 
		 * @param unknown $userId
		 * @param unknown $new
		 * @throws Exception
		 * @return boolean
		 */
		public function updateUsername ($userId, $new){
			if (is_numeric($userId) && (strlen(trim($new)) > 0 && 20 >= strlen(trim($new)))){
				$newUsername = htmlentities($new);
			
				$pstmt = $this->db->prepare(self::UPDATE_USERNAME_SQL);
				if ($pstmt->execute(array($newUsername, $userId))){
					return true;
				}else{
					throw new Exception("Updating username failed ");
				}
			}else {
				throw new Exception("Incorenct input data!");
			}
		}
		/**
		 * update user email to DB
		 * 
		 * @param unknown $userId
		 * @param unknown $new
		 * @throws Exception
		 * @return boolean
		 */
		public function updateEmail ($userId, $new){
			if (is_numeric($userId) && (strlen(trim($new)) > 0 && 40 >= strlen(trim($new)))){
				$newEmail = htmlentities($new);
				
				$pstmt = $this->db->prepare(self::UPDATE_EMAIL_SQL);
				if ($pstmt->execute(array($newEmail, $userId))){
					return true;
				}else{
					throw new Exception("Updating e-mail failed ");
				}
			}else {
				throw new Exception("Incorenct input data!");
			}
		}
		/**
		 * update user password to DB
		 * 
		 * @param unknown $userId
		 * @param unknown $new
		 * @throws Exception
		 * @return boolean
		 */
		public function updatePassword ($userId, $new){
			if (is_numeric($userId) && (strlen(trim($new)) > 0 && 40 >= strlen(trim($new)))){
				$newPassword = htmlentities($new);
	
				$pstmt = $this->db->prepare(self::UPDATE_PASSWORD_SQL);
				if ($pstmt->execute(array($newPassword, $userId))){
					return true;
				}else{
					throw new Exception("Updating e-mail failed ");
				}
			}else {
				throw new Exception("Incorenct input data!");
			}
		}
		/**
		 * update user profil picture to DB
		 * 
		 * @param unknown $userId
		 * @param unknown $pictureName
		 * @throws Exception
		 * @return boolean
		 */
		public function updatePicture ($userId, $pictureName){
			if (is_numeric($userId) && (strlen(($pictureName)) > 0 && 150 >= strlen(($pictureName)))){
				$pictureName = htmlentities($pictureName);
				
				$pstmt = $this->db->prepare(self::UPDATE_PICTURE_SQL);
				if ($pstmt->execute(array($pictureName, $userId))){
					return true;
				}
			}else{
				 throw new Exception("File name is too long, maximum characters 150");
			}
		}
		/**
		 * update user profil banner to DB
		 * 
		 * @param unknown $userId
		 * @param unknown $banner
		 * @throws Exception
		 * @return boolean
		 */
		public function updateBanner ($userId, $banner){
			if (is_numeric($userId) && (strlen(($banner)) > 0 && 150 >= strlen(($banner)))){
				$banner = htmlentities($banner);
		
				$pstmt = $this->db->prepare(self::UPDATE_BANNER_SQL);
				if ($pstmt->execute(array($banner,$userId))){
					return true;
				}
			}else{
				 throw new Exception("File name is too long, maximum characters 150");
			}
		}
		
		
		//<!-- =-=-=-=-=-=-=  Get All data for user by ID =-=-=-=-=-=-= -->\\
		/**
		 * get all user data by Id
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
							 $result['picture'], $result['banner'] ,$result['description'], $result['user_id'], $result['views']);
					return $user;
				}
			}

		}	
	
		
		//-=-=-=-=-=-= get sorted users =-=-=-==-=-==--\\
		/**
		 * function gets sorted users
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
		 * update user suscribers 
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
		public function cheangeChannelFollowed ($userId, $channelId){
			$pstmt = $this->db->prepare(self::CHECK_FOR_EXIST_CHANNEL_SQL);
			if ($pstmt->execute(array($channelId, $userId))){
				$result = $pstmt->fetchColumn();
				
				if ($result > 0){
					return true;
				}else {
					return false;
				}
			}else {
				throw new Exception("Incorect data");
			}
		}
		/**
		 * Delete user following channel
		 *
		 * @param unknown $userId
		 * @param unknown $channelId
		 * @return boolean
		 */
		public function deleteChannelSybscriber ($userId, $channelId){
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
		public function addChannelSybscriber ($userId, $channelId){
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
		public function channelSuscribers ($userId, $channelId, $suscribers){
			try {
				$this->db->beginTransaction();
				if ($this->cheangeChannelFollowed($userId, $channelId)){
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
		
//-=-=-=-=-=-=-=-=-=-=-=-=  USER Channels functions =-=-=-==-=-==-=-=-=-==-=-==--\\
		/**
		 * count user videos
		 * 
		 * @param unknown $userId
		 * @return mixed
		 */
		public function getVideosCount($userId){
			$pstmt = $this->db->prepare(self::SELECT_USER_COUNT_VIDEOS_SQL);
			if ($pstmt->execute(array($userId))){
				 $result = $pstmt->fetchColumn();		 
				 return $result;
			}
		}
		/**
		 * get all page wher user is followed
		 * 
		 * @param unknown $user_id
		 * @param unknown $offset
		 */
		public function allFollowedPages($user_id , $offset){
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
			$pstmt = $this->db->prepare(self::SELECT_ALL_ID_SUBSCRIBERS_WHER_USER_IS_FOLLOWED_SQL);
			
			if ($pstmt->execute(array($user_id, $offset))){
				$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				
				return $result;
			}
		}
		//-=-=-=-=-=-= /USER Channels functions =-=-=-==-=-==--\\
		
//-=-=-=-=-=-=-=-=-=-=-=-=  USER DISCUSSIONS functions =-=-=-==-=-==-=-=-=-==-=-==--\\
		/**
		 * Iner discuission on user channel to DB
		 * 
		 * @param unknown $channelId
		 * @param unknown $text
		 * @param unknown $date
		 * @param unknown $discussant_id
		 * @throws Exception
		 * @return string|boolean
		 */
		public function insertDiscussionComent ($channelId, $text, $date, $discussant_id){
			$text = trim($text);
			if (strlen($text) > 500 || strlen($text) < 1){
				throw new Exception("Text too long or empty. Max 500 characters");
			}else{ 
				$text = htmlentities($text);
				$pstmt = $this->db->prepare(self::INSERT_DISCUSSION_COMENT_SQL);
				
				if ($pstmt->execute(array($channelId, $text, $date, $discussant_id))){
					$discuscusion_id = $this->db->lastInsertId();
					return $discuscusion_id;
				}else{
					 return false;
				}
			}
		}
		/**
		 * get user discussions from DB
		 * 
		 * @param unknown $channelId
		 * @param unknown $offset
		 * @throws Exception
		 */
		public function selectChannelDisussion ($channelId , $offset){
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
			$pstmt = $this->db->prepare(self::SELECT_DISCUSSION_SQL);
			if ($pstmt->execute(array($channelId, $offset))){
				$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}else{
				throw new Exception("Coments is missing");
			}
		}
		/**
		 * delete one discussions comentar
		 * 
		 * @param unknown $comentId
		 * @param unknown $discuUserId
		 * @return boolean
		 */
		public function deleteDiscussionComent ($comentId, $discuUserId){
			$pstmt = $this->db->prepare(self::DELETE_DISCUSSION_COMENT_SQL);
			if ($pstmt->execute(array($comentId, $discuUserId))){
				return true;
			}else{
				return false;
			}
		}
		/**
		 * get count for user discussion comentars
		 * 
		 * @param unknown $channelId
		 * @return mixed
		 */
		public function countDiscussion ($channelId){
			$pstmt = $this->db->prepare(self::COUNT_CHANNEL_DISSCUSIONS_SQL);
			if ($pstmt->execute(array($channelId))){
				$result = $pstmt->fetchColumn();
				return $result;
			}
			
			
		}
//-=-=-=-=-=-=-=-=-=-=-=-=  all channels functions =-=-=-==-=-==-=-=-=-==-=-==--\\
		/**
		 * get info fro channels
		 * 
		 * @param unknown $orderBy
		 * @param unknown $offset
		 */
		public function getInfoAbouthChannels($orderBy, $offset){
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
			$pstmt = $this->db->prepare("SELECT u.user_id, u.username, c.country_name, u.join_date, u.subscribers, u.picture , u.banner , COUNT(ch.user_id) AS 'views'
										FROM users u
										LEFT JOIN channel_views ch ON (u.user_id = ch.channel_id)
										LEFT JOIN countries c ON ( u.country_id = c.country_id)
										GROUP BY u.user_id
										ORDER BY $orderBy
										LIMIT 12 OFFSET ?;");
			if ($pstmt->execute(array($offset))){
				$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
		}
		/**
		 * serch channel by like paramethers
		 * 
		 * @param unknown $like
		 * @param unknown $orderBy
		 */
		public function searchChannels ($like, $orderBy){
			$pstmt = $this->db->prepare("SELECT u.user_id, u.username, c.country_name, u.join_date, u.subscribers, u.picture , u.banner , COUNT(ch.user_id) AS 'views'
										FROM users u
										LEFT JOIN channel_views ch ON (u.user_id = ch.channel_id)
										LEFT JOIN countries c ON ( u.country_id = c.country_id)
										WHERE u.username  LIKE CONCAT('%',?,'%')
										GROUP BY u.username
										ORDER BY ?;");
			if ($pstmt->execute(array($like, $orderBy ))){
				$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			}
		}
	//end class
	}	
?>