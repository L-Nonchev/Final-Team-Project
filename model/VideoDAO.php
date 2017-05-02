<?php
class VideoDAO implements IVideoDAO{
	private $db;

	const ADD_VIDEO_SQL =  'INSERT INTO videos VALUES(null, ?,?,?,?,?,?,?,?,?,?);';
	
	const GET_VIDEO_SQL =  "SELECT v.video_id, v.title, v.path, v.duration, v.date, v.text, v.user_id, u.username, u.subscribers, u.picture,c.category_id, c.category_name
							FROM videos v JOIN users u 
							ON (v.user_id = u.user_id)
							LEFT OUTER JOIN category c
							ON (v.category_id = c.category_id)
							WHERE v.video_id=?;";
	const ADD_VIDEO_WHATCH_LATER = 'INSERT INTO watches_later VALUES(null,?,?);';
	
	const CHECK_VIDEO_EXIST_WHATCH_LATER = 'SELECT * FROM watches_later WHERE user_id= ? AND video_id = ?;';
	
	const COUNT_USER_VIDEO = 'SELECT count(video_id) FROM videos WHERE user_id= ?;';
	
	const GET_VIDEO_COMMENTS = 'SELECT c.comment_id, c.video_id, c.user_id, c.text, c.date, u.username, u.picture
							FROM comments c
							LEFT OUTER JOIN users u
							ON (c.user_id = u.user_id)
							WHERE video_id = ?
							ORDER BY c.comment_id DESC;';
	const ADD_VIDEO_COMMENT = 'INSERT INTO comments VALUES(null,?,?,?,?,null);';
	
	const COUNT_VIDEO_COMENTS = 'SELECT count(comment_id) FROM comments WHERE video_id = ?;';
	
	const CHECK_USER_VIEWED_VIDEO = 'SELECT * FROM video_views WHERE user_id= ? AND video_id = ?;';
	
	const INCREASE_VIDEO_VIEW = 'INSERT INTO video_views VALUES(?,?);';
	
	const CHECK_USER_LIKED_VIDEO = 'SELECT * FROM liked_videos WHERE user_id= ? AND video_id = ?;';
	
	const INCREASE_VIDEO_LIKE = 'INSERT INTO liked_videos VALUES(null,?,?);';
	
	const CHECK_USER_DISLIKED_VIDEO = 'SELECT * FROM disliked_videos WHERE user_id= ? AND video_id = ?;';
	
	const INCREASE_VIDEO_DISLIKE = 'INSERT INTO disliked_videos VALUES(?,?);';
	
	const REDUCE_DISLIKE = 'DELETE FROM disliked_videos WHERE user_id = ? AND video_id = ?;';
	
	const REDUCE_LIKE = 'DELETE FROM liked_videos WHERE user_id = ? AND video_id = ?;';
	
	const COUNT_VIDEO_VIEWS = 'SELECT count(user_id) FROM video_views WHERE video_id = ?;';
	
	const COUNT_VIDEO_LIKES = 'SELECT count(user_id) FROM liked_videos WHERE video_id = ?;';
	
	const COUNT_VIDEO_DISLIKES = 'SELECT count(user_id) FROM disliked_videos WHERE video_id = ?;';
	
	const ADD_VIDEO_IN_HISTORY = 'INSERT INTO history VALUES (?,?,now());';
	
	const GET_VIDEO_BY_CATEGORY = 'SELECT v.video_id, v.title, v.poster_path, v.duration, v.category_id, v.user_id, c.category_name
									FROM videos v
									JOIN category c
									ON (v.category_id = c.category_id)
									WHERE c.category_id = ? AND is_privacy = false;';

	const CHECH_WATCHED_VIDEO = 'SELECT user_id FROM history WHERE user_id = ? AND video_id = ?;';
	
	const UPDATE_VIDEO_DATE_IN_HISTORY = 'UPDATE history SET date=now() WHERE user_id = ? AND video_id= ?;';
	
	const DELETE_COMMENT = 'DELETE FROM comments WHERE comment_id = ?;';
	
	const GET_ALL_CATEGORIES = 'SELECT c.category_id, c.category_name, count(v.category_id) AS videoos_count
								FROM category c 
								LEFT OUTER JOIN videos v
								ON (c.category_id = v.category_id)
								GROUP BY category_id;';
	
	const GET_LIKED_VIDEOS_SQL = "SELECT l.video_id, v.title, v.poster_path ,v.duration , v.date , COUNT(vv.user_id) AS view , l.id
									FROM liked_videos l
									LEFT JOIN videos v ON (l.video_id = v.video_id)
									LEFT JOIN video_views vv ON (v.video_id = vv.video_id)
									WHERE l.user_id = ?
									GROUP BY l.video_id, v.title, v.poster_path ,v.duration , v.date
									ORDER BY l.id DESC
									LIMIT 12 OFFSET ?;";
	const DELETE_ONE_LIKED_VIDEO_SQL = "DELETE FROM liked_videos WHERE id = ?;";
	const DELETE_ALL_LIKED_VIDEOS_SQL = "DELETE FROM liked_videos WHERE user_id = ?;";
	
	const GET_WATCH_LATER_VIDEOS_SQL = "SELECT w.video_id, v.title, v.poster_path ,v.duration , v.date , COUNT(vv.user_id) AS view , w.id
										FROM watches_later w
										LEFT JOIN videos v ON (w.video_id = v.video_id)
										LEFT JOIN video_views vv ON (v.video_id = vv.video_id)
										WHERE w.user_id = ?
										GROUP BY w.video_id, v.title, v.poster_path ,v.duration , v.date
										ORDER BY w.id DESC
										LIMIT 12 OFFSET ?;";
	const DELETE_ONE_WATCH_LATER_VIDEO_SQL = "DELETE FROM watches_later WHERE id = ?;";
	const DELETE_ALL_WATCH_LATER_VIDEOS_SQL = "DELETE FROM watches_later WHERE user_id = ?;";
	
	const GET_HISTORY_OF_VIDEOS_WATCHED_SQL = "SELECT h.video_id, h.date, v.title, v.poster_path ,v.duration , v.date , COUNT(vv.user_id) AS view
													FROM history h
													LEFT JOIN videos v ON (h.video_id = v.video_id)
													LEFT JOIN video_views vv ON (v.video_id = vv.video_id)
													WHERE h.user_id = ?
													GROUP BY h.video_id, v.title, v.poster_path ,v.duration , v.date
													ORDER BY  h.date DESC
													LIMIT 12 OFFSET ?;";
	const DELETE_ONE_HISTORY_VIDEO_SQL = "DELETE FROM history WHERE video_id = ? AND user_id = ? ;";
	CONST DELETE_ALL_HISTROY_VIDEOS_SQL ="DELETE FROM history WHERE user_id = ?;";
	
	public function __construct(){
		try {
			$this->db = DBConnection::getDb();
		}catch (Exception $e){
			throw new Exception('Problem with DB!');
		}
	}
	
	//-=-=-=-=-=-=Add, get, delete and whatch later video=-=-=-==-=-==--\\
	/**
	 * function add video in DB
	 *
	 * @param object Video
	 * @throws Exception
	 * @return bool
	 */
	public function addVideo(Video $video){		
		try{
			$video->setVideoDate(date("Y-m-d"));
			$pstmt = $this->db->prepare(self::ADD_VIDEO_SQL);
			return $pstmt->execute ( array ($video->videoTitle, $video->videoPath, $video->videoPoster, $video->duration, $video->videoDate,$video->videoText , $video->categoryId, $video->musicGenre, $video->privacy, $video->userId) );
		}catch (PDOException $e){
			throw new Exception('Incorect data!');
		}
	}
	
	
	/**
	 * function chek video whatched
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function existVideoWhatchLater($userId, $videoId){
		try {
			$pstmt = $this->db->prepare(self::CHECK_VIDEO_EXIST_WHATCH_LATER);
			$pstmt->execute(array($userId, $videoId));
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}catch (PDOException $e){
			throw new Exception('Bad user ID or video ID!');
		}
	}
	
	/**
	 * function add video in watch later
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function watchLater($userId, $videoId){
		if (!($this->existVideoWhatchLater($userId, $videoId))){
			try {
				$pstmt = $this->db->prepare(self::ADD_VIDEO_WHATCH_LATER);
				return	$pstmt->execute(array($userId, $videoId));
			}catch (PDOException $e){
				throw new Exception('Bad user ID or video ID!');
			}
		}return true;
	}
	
	
	/**
	 * function chek user viewed video
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function checkUserWhatchVideo($userId, $videoId){
		$pstmt = $this->db->prepare(self::CHECK_USER_VIEWED_VIDEO);
		$pstmt->execute(array($userId, $videoId));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/**
	 * function increase video views
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function whachedVideo($videoId, $userId){
		if (!($this->checkUserWhatchVideo($userId, $videoId))){
			try {
				$pstmt = $this->db->prepare(self::INCREASE_VIDEO_VIEW);
				return	$pstmt->execute(array($videoId, $userId));
			}catch (PDOException $e){
				throw new Exception('Bad user ID or video ID!');
			}
		}
	}
	
	
	/**
	 * function get video information
	 *
	 * @param int $videoId
	 * @throws Exception
	 * @return array
	 */
	public function getVideo($videoId){
			$pstmt = $this->db->prepare(self::GET_VIDEO_SQL);
			$pstmt->execute(array($videoId));
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			if (count($result) === 0){
				throw new Exception('Bad video ID!');
			}
			return $result;
		}
	
	/**
	 * function get all videos by category
	 *
	 * @param int $categoryId
	 * @param string $sortBy
	 * @throws Exception
	 * @return array
	 */
	public function getAllVideosByCategory($categoryId, $sortBy){
		$pstmt = $this->db->prepare("SELECT v.video_id, v.title, v.path, v.poster_path, v.duration, v.category_id, v.user_id, v.duration, count(w.user_id) as views
				FROM videos v
				JOIN video_views w
				ON (v.video_id = w.video_id)
				WHERE v.category_id = ?
				GROUP BY video_id
				ORDER BY $sortBy DESC;");
	
		$pstmt->execute(array($categoryId));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	
	/**
	 * function  video information by category
	 *
	 * @param int $categoryId
	 * @throws Exception
	 * @return array
	 */
	public function getVideoByCategory($categoryId){
		try {
			$pstmt = $this->db->prepare(self::GET_VIDEO_BY_CATEGORY);
			$pstmt->execute(array($categoryId));
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}catch (PDOException $e){
			throw new Exception('Invalid category_id');
		}
	}
		
	//-=-=-=-=-=-= get newest videos =-=-=-==-=-==--\\
	/**
	 * function gets video sort by video_id
	 *
	 * @param int $limit
	 * @throws Exception
	 * @return array
	 */
	public function getNewestVideos($limit){
		try {
			return $this->db->query("SELECT  video_id, title , poster_path , duration
					FROM videos
					WHERE is_privacy = false
					ORDER BY video_id DESC
					LIMIT $limit;")->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $e){
			throw new Exception('Incorect data!');
		}
	}
	
	//-=-=-=-=-=-= get viewest videos =-=-=-==-=-==--\\
	/**
	 * function gets video sort by count of user_id
	 *
	 * @param int $limit
	 * @throws Exception
	 * @return array
	 */
	public function getViewestVideo($limit){
		try {
			return $this->db->query("SELECT  v.video_id, v.title , v.poster_path , v.duration, count(w.user_id) AS views
					FROM videos v
					JOIN video_views w
					ON (v.video_id = w.video_id)
					WHERE is_privacy = false
					GROUP BY v.video_id
					ORDER BY views DESC
					LIMIT $limit;")->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $e){
			throw new Exception('Incorect data!');
		}
	}
	
	//-=-=-=-=-=-= get most popular videos =-=-=-==-=-==--\\
	/**
	 * function gets video sort by count of likes
	 *
	 * @param int $limit
	 * @throws Exception
	 * @return array
	 */
	public function getMostPopularVideo($limit){
		try {
			return $this->db->query("SELECT  v.video_id, v.title , v.poster_path , v.duration, count(l.user_id) AS likes
					FROM videos v
					JOIN liked_videos l
					ON (v.video_id = l.video_id)
					WHERE is_privacy = false
					GROUP BY v.video_id
					ORDER BY likes DESC
					LIMIT $limit;")->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $e){
			throw new Exception('Incorect data!');
		}
	}
	
	
	//-=-=-=-=-=-= get videos for user by id=-=-=-==-=-==--\\
	public function getChannelVideos ($userId, $ofset, $order, $privacy){
	
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		$pstmt = $this->db->prepare("SELECT v.video_id, v.title, v.poster_path , v.duration, v.date, COUNT(w.user_id) AS 'views'
				FROM videos v
				LEFT JOIN liked_videos l ON (v.video_id = l.video_id)
				LEFT JOIN video_views w ON (v.video_id = w.video_id)
				WHERE v.user_id = ? && v.is_privacy = ?
				GROUP BY v.video_id, v.title  , v.path , v.poster_path , v.duration
				ORDER BY $order
				LIMIT 16 OFFSET ?;");
		if ($pstmt->execute(array($userId , $privacy , $ofset))){
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
	
	}
	
	/**
	 * function for count of user video
	 *
	 * @param int $userId
	 * @throws Exception
	 * @return int
	 */
	public function countUserVideo ($userId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_USER_VIDEO);
			$pstmt->execute(array($userId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad user ID!');
		}
	}
	
	/**
	 * function for check video name
	 *
	 * @param string $videoName -
	 * @throws Exception
	 * @return json
	 */	
	public function checkVideoName($videoName){
		try {
			return $this->db->query("SELECT video_id FROM videos WHERE title = '$videoName';")->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Incorect video title!');
		}
	}
	
//----------------------------------------------video comment-------------------------------------//

	
	//-=-=-=-=-=-= get video comments=-=-=-==-=-==--\\
	
	/**
	 * function get video comments
	 *
	 * @param int $videoId
	 * @throws Exception
	 * @return array
	 */
	public function getVideoComments ($videoId){
		try {
			$pstmt = $this->db->prepare(self::GET_VIDEO_COMMENTS);
			$pstmt->execute(array($videoId));
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
	
	//-=-=-=-=-=-= add video comments=-=-=-==-=-==--\\
	/**
	 * function add video comments
	 *
	 * @param int $videoId
	 * @param int $userId
	 * @param string $comment
	 * @param string $date
	 * @throws Exception
	 * @return bool
	 */
	public function addCommentsVideo($videoId, $userId, $comment){
		try{
			$date = date("Y-m-d");
			$pstmt = $this->db->prepare(self::ADD_VIDEO_COMMENT);
			$pstmt->execute(array($videoId, $userId, $comment, $date));
			return $this->db->lastInsertId();
		}catch (PDOException $e){
			throw new Exception($e);
		}
	}
	
	/**
	 * function for count of video comments
	 *
	 * @param int $videoId
	 * @throws Exception
	 * @return int
	 */
	public function getCountComents ($videoId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_VIDEO_COMENTS);
			$pstmt->execute(array($videoId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
	
	/**
	 * function delete comment
	 *
	 * @param in $commentId
	 * @throws Exception
	 * @return bool
	 */
	public function deleteVideoComment($commentId){
		try{
			$pstmt = $this->db->prepare(self::DELETE_COMMENT);
			return $pstmt->execute(array($commentId));
		}catch (PDOException $e){
			throw new Exception('Incorect comment id!');
		}
	}

	
	
	//-=-=-=-=-=-= update video likes =-=-=-==-=-==--\\
	/**
	 * function check user likes video
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function checkUserLikedVideo($userId, $videoId){
		$pstmt = $this->db->prepare(self::CHECK_USER_LIKED_VIDEO);
		$pstmt->execute(array($userId, $videoId));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/**
	 * function reduce video likes
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function reduceLikes($userId, $videoId){
		$pstmt = $this->db->prepare(self::REDUCE_LIKE);
		$result = $pstmt->execute(array($userId, $videoId));
		return $pstmt;
	}
	
	/**
	 * function increase video likes
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function increaseLikes($userId, $videoId){
		try {
			if ($this->checkUserDislikedVideo($userId, $videoId)){
				$this->reduceDislikes($userId, $videoId);
			}
			if (!($this->checkUserLikedVideo($userId, $videoId))){
				$pstmt = $this->db->prepare(self::INCREASE_VIDEO_LIKE);
				return	$pstmt->execute(array($userId, $videoId));
			}
		}catch (PDOException $e){
			throw new Exception('Bad user ID or video ID!');
		}
	}
	
	//-=-=-=-=-=-= update video dislikes =-=-=-==-=-==--\\	
	/**
	 * function check user dislikes video
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function checkUserDislikedVideo($userId, $videoId){
		$pstmt = $this->db->prepare(self::CHECK_USER_DISLIKED_VIDEO);
		$pstmt->execute(array($userId, $videoId));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	/**
	 * function increase video dislikes
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function increaseDisikes($userId, $videoId){
		try {
			if ($this->checkUserLikedVideo($userId, $videoId)){
				$this->reduceLikes($userId, $videoId);
			}
			if (!($this->checkUserDislikedVideo($userId, $videoId))){			
				$pstmt = $this->db->prepare(self::INCREASE_VIDEO_DISLIKE);
				return	$pstmt->execute(array($userId, $videoId));
			}
		}catch (PDOException $e){
			throw new Exception('Bad user ID or video ID!');
		}
	}
	
	/**
	 * function reduce video dislikes
	 *
	 * @param int $userId
	 * @param int $videoId
	 * @throws Exception
	 * @return bool
	 */
	public function reduceDislikes($userId, $videoId){
		$pstmt = $this->db->prepare(self::REDUCE_DISLIKE);
		return	$pstmt->execute(array($userId, $videoId));
	}
	
	
	/**
	 * function count of video likes
	 *
	 * @param int $videoId
	 * @throws Exception
	 * @return int
	 */
	public function countVideoLikes ($videoId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_VIDEO_LIKES);
			$pstmt->execute(array($videoId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
	/**
	 * function count of video dislikes
	 *
	 * @param int $videoId
	 * @throws Exception
	 * @return int
	 */
	public function countVideoDislikes ($videoId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_VIDEO_DISLIKES);
			$pstmt->execute(array($videoId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
	/**
	 * function count of video views
	 *
	 * @param int $videoId
	 * @throws Exception
	 * @return int
	 */
	public function countVideoViews ($videoId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_VIDEO_VIEWS);
			$pstmt->execute(array($videoId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
	//--------------------------------update history-----------------------------------------//
	public function checkWatchedVideo($userId, $videoId){
		$pstmt = $this->db->prepare(self::CHECH_WATCHED_VIDEO);
		$pstmt->execute(array($userId, $videoId));
		return $pstmt->fetchColumn();
	}
	
	public function addVideoInHistory ($userId, $videoId){
		$pstmt = $this->db->prepare(self::ADD_VIDEO_IN_HISTORY);
		return $pstmt->execute(array($userId, $videoId));
	}
	
	public function updateDateOfVideoHistory($userId, $videoId){		
		$pstmt = $this->db->prepare(self::UPDATE_VIDEO_DATE_IN_HISTORY);
		return $pstmt->execute(array($userId, $videoId));
	}
	
	public function updateHistory($userId, $videoId){
		try {
			if ($this->checkWatchedVideo($userId, $videoId)){
				$this->updateDateOfVideoHistory($userId, $videoId);
			}else{
				$this->addVideoInHistory($userId, $videoId);
			}
		}catch (PDOException $e){
			throw new Exception('Bad user ID or video ID!');
		}
	}
	
	
	//--------------------------------------search-----------------------------------------------------//
	
	/**
	 * function search
	 *
	 * @param string $searchBy
	 * @param string sortBy
	 * @throws Exception
	 * @return array
	 */
	public function searchVideoByTitle($searchBy, $sortBy){
		$pstmt = $this->db->prepare("SELECT v.video_id, v.title, v.path, v.poster_path, v.duration, v.category_id, v.user_id, v.duration, count(w.user_id) as views
									FROM videos v
                                    JOIN video_views w
                                    ON (v.video_id = w.video_id)
									WHERE title LIKE CONCAT('%', ?, '%')
                                    GROUP BY video_id
									ORDER BY $sortBy DESC;");									
		
		$pstmt->execute(array($searchBy));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	
	/**
	 * function search and filter results
	 *
	 * @param string $searchBy
	 * @param string $timeFilter
	 * @param string $dataUpload
	 * @param string sortBy
	 * @throws Exception
	 * @return array
	 */
	public function getFilterVideos($searchBy, $dataUpload, $timeFilter, $sortBy){
		$pstmt = $this->db->prepare("SELECT v.video_id, v.title, v.path, v.date,  v.poster_path, v.duration, v.category_id, v.user_id, v.duration, count(w.user_id) as views
									FROM videos v
                                    JOIN video_views w
                                    ON (v.video_id = w.video_id)
									WHERE title LIKE CONCAT('%', ?, '%') AND ( v.date > (DATE_SUB(CURDATE(), INTERVAL ? DAY)) ) 
										AND v.duration < ?
                                    GROUP BY video_id
									ORDER BY $sortBy DESC;");
		
		$pstmt->execute(array($searchBy, $dataUpload, $timeFilter));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	
	//------------------------------------------------get all categories--------------------------------------------------------//
	public function getAllCategories(){
		$allCategories = $this->db->query('SELECT c.category_id, c.category_name, count(v.category_id) AS videos_count
											FROM category c 
											LEFT OUTER JOIN videos v
											ON (c.category_id = v.category_id)
											GROUP BY category_id;')->fetchAll(PDO::FETCH_ASSOC);
		if ($allCategories){
			return $allCategories;
		}else throw new Exception('Incorect category name!');
	}
	
	//-=-=-=-=-=-= Liked video functions =-=-=-==-=-==--\\
	public function getLikedVideos ($userId, $offset){
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		$pstmt = $this->db->prepare(self::GET_LIKED_VIDEOS_SQL);
		if ($pstmt->execute(array($userId, $offset))){
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			if (count($pstmt) !== 0) {
				return $result;
			}else{
				return false;
			}
		}
	}
	
	public function deleteLikedVideo ($likded_video_id){
		$pstmt = $this->db->prepare(self::DELETE_ONE_LIKED_VIDEO_SQL);
		if ($pstmt->execute(array($likded_video_id))){
			return true;
		}else{
			return false;
		}
	}
	
	public function deleteAllLikedVideos ($userId){
		$pstmt = $this->db->prepare(self::DELETE_ALL_LIKED_VIDEOS_SQL);
		if ($pstmt->execute(array($userId))){
			return true;
		}else{
			return false;
		}
	}
	
	//-=-=-=-=-=-= Watch later video functions =-=-=-==-=-==--\\
	public function getWatchMoreVideos ($userId, $offset){
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		$pstmt = $this->db->prepare(self::GET_WATCH_LATER_VIDEOS_SQL);
		if ($pstmt->execute(array($userId, $offset))){
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			if (count($pstmt) !== 0) {
				return $result;
			}else{
				return false;
			}
		}
	}
	
	public function deleteWatchMoreVideo ($likded_video_id){
		$pstmt = $this->db->prepare(self::DELETE_ONE_WATCH_LATER_VIDEO_SQL);
		if ($pstmt->execute(array($likded_video_id))){
			return true;
		}else{
			return false;
		}
	}
	
	public function deleteAllWatchMoreVideos ($userId){
		$pstmt = $this->db->prepare(self::DELETE_ALL_WATCH_LATER_VIDEOS_SQL);
		if ($pstmt->execute(array($userId))){
			return true;
		}else{
			return false;
		}
	}
	//-=-=-=-=-=-= History video functions =-=-=-==-=-==--\\
	
	public function getHistoryVideos ($userId, $offset){
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		$pstmt = $this->db->prepare(self::GET_HISTORY_OF_VIDEOS_WATCHED_SQL);
		if ($pstmt->execute(array($userId, $offset))){
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			if (count($pstmt) !== 0) {
				return $result;
			}else{
				return false;
			}
		}
	}
	
	public function deleteHistoryVideo ($video_id , $userId){
		$pstmt = $this->db->prepare(self::DELETE_ONE_HISTORY_VIDEO_SQL);
		if ($pstmt->execute(array($video_id, $userId))){
			return true;
		}else{
			return false;
		}
	}
	
	public function deleteAllHistoryMoreVideos ($userId){
		$pstmt = $this->db->prepare(self::DELETE_ALL_HISTROY_VIDEOS_SQL);
		if ($pstmt->execute(array($userId))){
			return true;
		}else{
			return false;
		}
	}
}
?>