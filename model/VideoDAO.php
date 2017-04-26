<?php
class VideoDAO implements IVideoDAO{
	private $db;

	const ADD_VIDEO_SQL =  'INSERT INTO videos VALUES(null, ?,?,?,?,?,?, 0,0,0,?,?,?,?);';
	const GET_VIDEO_SQL =  'SELECT v.video_id, v.title, v.path, v.duration, v.date, v.text, v.likes, v.dislikes, v.views, v.user_id, u.username, u.subscribers, c.category_name
							FROM videos v JOIN users u 
							ON (v.user_id = u.user_id AND video_id=?)
							JOIN category c
							ON (v.category_id = c.category_id)';
	const ADD_VIDEO_WHATCH_LATER = 'INSERT INTO watches_later VALUES(?,?);';
	const CHECK_VIDEO_EXIST_WHATCH_LATER = 'SELECT * FROM watches_later WHERE user_id= ? AND video_id = ?;';
	const COUNT_USER_VIDEO = 'SELECT count(video_id) FROM videos WHERE user_id= ?;';
		
	public function __construct(){
		try {
			$this->db = DBConnection::getDb();
		}catch (Exception $e){
			throw new Exception('Please, try again later!');
		}
	}
	
	//-=-=-=-=-=-=Insert video in DB=-=-=-==-=-==--\\
	public function addVideo(Video $video){		
		try{
			$video->setVideoDate(date("Y-m-d"));
			$pstmt = $this->db->prepare(self::ADD_VIDEO_SQL);
			$pstmt->execute ( array ($video->videoTitle, $video->videoPath, $video->videoPoster, $video->duration, $video->videoDate,$video->videoText , $video->categoryId, $video->musicGenre, $video->privacy, $video->userId) );
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
			throw new Exception('Bad user ID or video ID!');
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
	public function getSortedVideos($sortBy, $limit){
		try {
			return $this->db->query("SELECT  video_id, title , poster_path , duration 
									FROM videos 
									WHERE is_privacy = false
									ORDER BY $sortBy DESC LIMIT $limit;")->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $e){
			throw new Exception('Incorect data!');
		}
	}	
	
	
	//-=-=-=-=-=-= get videos for user by id=-=-=-==-=-==--\\
	public function getChannelVideos ($userId, $ofset, $order, $privacy){
				
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		$pstmt = $this->db->prepare("SELECT video_id, title , poster_path , duration
				FROM videos WHERE user_id = ? && is_privacy = ? ORDER BY $order  LIMIT 8 OFFSET ?;");
		$pstmt->execute(array($userId , $privacy , $ofset));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	
		return $result;
	}
	
}
?>