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
	const ADD_VIDEO_WHATCH_LATER = 'INSERT INTO watches_later VALUES(?,?);';
	
	const CHECK_VIDEO_EXIST_WHATCH_LATER = 'SELECT * FROM watches_later WHERE user_id= ? AND video_id = ?;';
	
	const COUNT_USER_VIDEO = 'SELECT count(video_id) FROM videos WHERE user_id= ?;';
	
	const GET_VIDEO_COMENTS = 'SELECT c.comment_id, c.video_id, c.user_id, c.text, c.date, u.username, u.picture
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
	
	const INCREASE_VIDEO_LIKE = 'INSERT INTO liked_videos VALUES(?,?);';
	
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
	
	
	public function __construct(){
		try {
			$this->db = DBConnection::getDb();
		}catch (Exception $e){
			throw new Exception('Problem with DB!');
		}
	}
	
	//-=-=-=-=-=-=Insert video in DB=-=-=-==-=-==--\\
	/**
	 * function for check video name
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
	
	public function getVideo($videoId){
		try {
			$pstmt = $this->db->prepare(self::GET_VIDEO_SQL);
			$pstmt->execute(array($videoId));
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
		
	}
	
	public function countUserVideo ($userId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_USER_VIDEO);
			$pstmt->execute(array($userId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad user ID!');
		}
	}
	
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
	
	//-=-=-=-=-=-= get sorted videos =-=-=-==-=-==--\\
	/**
	 * function gets all videos order by
	 *
	 * @param string $sortBy
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
		$pstmt = $this->db->prepare("SELECT v.video_id, v.title  , v.path , v.poster_path , v.duration, COUNT(l.user_id) AS 'liked',COUNT(d.user_id) AS 'dliked',COUNT(w.user_id) AS 'views'
									FROM videos v
									LEFT JOIN liked_videos l ON (v.video_id = l.video_id)
									LEFT JOIN disliked_videos d ON (v.video_id = d.video_id)
									LEFT JOIN video_views w ON (v.video_id = w.video_id)
									WHERE v.user_id = ? && v.is_privacy = ?
									GROUP BY v.video_id, v.title  , v.path , v.poster_path , v.duration
									ORDER BY $order
									LIMIT 8 OFFSET ?;");
		if ($pstmt->execute(array($userId , $privacy , $ofset))){
			$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $result;
		}
		
	}
	//-=-=-=-=-=-= get video comments=-=-=-==-=-==--\\
	public function getVideoComents ($videoId){
		try {
			$pstmt = $this->db->prepare(self::GET_VIDEO_COMENTS);
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
			return $pstmt->execute(array($videoId, $userId, $comment, $date));
		}catch (PDOException $e){
			throw new Exception($e);
		}
	}
	
	public function getCountComents ($videoId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_VIDEO_COMENTS);
			$pstmt->execute(array($videoId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
	public function checkUserWhatchVideo($userId, $videoId){
		$pstmt = $this->db->prepare(self::CHECK_USER_VIEWED_VIDEO);
		$pstmt->execute(array($userId, $videoId));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
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
	
	
	//-=-=-=-=-=-= update video likes =-=-=-==-=-==--\\
	
	public function checkUserDislikedVideo($userId, $videoId){
		$pstmt = $this->db->prepare(self::CHECK_USER_DISLIKED_VIDEO);
		$pstmt->execute(array($userId, $videoId));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function checkUserLikedVideo($userId, $videoId){
		$pstmt = $this->db->prepare(self::CHECK_USER_LIKED_VIDEO);
		$pstmt->execute(array($userId, $videoId));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	
	public function reduceLikes($userId, $videoId){
		$pstmt = $this->db->prepare(self::REDUCE_LIKE);
		$result = $pstmt->execute(array($userId, $videoId));
		return $pstmt;
	}
	
	public function reduceDislikes($userId, $videoId){
		$pstmt = $this->db->prepare(self::REDUCE_DISLIKE);
		return	$pstmt->execute(array($userId, $videoId));
	}
	
		
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
	
	public function countVideoViews ($videoId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_VIDEO_VIEWS);
			$pstmt->execute(array($videoId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
	public function countVideoLikes ($videoId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_VIDEO_LIKES);
			$pstmt->execute(array($videoId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
	public function countVideoDislikes ($videoId){
		try{
			$pstmt = $this->db->prepare(self::COUNT_VIDEO_DISLIKES);
			$pstmt->execute(array($videoId));
			return $pstmt->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Bad video ID!');
		}
	}
	
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
	
}
?>