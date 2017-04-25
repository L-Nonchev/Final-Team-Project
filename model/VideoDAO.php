<?php
class VideoDAO implements IVideoDAO{
	private $db;
	const ADD_VIDEO_SQL = 'INSERT INTO videos VALUES(null, ?,?,?,?,?,?, 0,0,0,?,?,?,?);';
	const OPEN_VIDEO = '';
	
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
	
	public function openVideo(Video $video){
	
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
	
	
	
	
	
	
	
	
	
	//-=-=-=-=-=-= get videos for user by id=-=-=-==-=-==--\\
	public function getChannelVideos ($userId, $ofset, $order, $privacy){
		
		switch ($order) {
			
			case "1234": $order = 'video_id DESC' ; break;
			case "2345": $order = 'video_id' ; break;
			case "3456": $order = 'views DESC' ; break;
			case "4567": $order = 'likes DESC' ; break;
			case "5678": $order = 'duration' ; break;
			
			default: $order = 'video_id DESC' ; break;
		}
		
		
		
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		$pstmt = $this->db->prepare("SELECT video_id, title , poster_path , duration , views
				FROM videos WHERE user_id = ? && is_privacy = ? ORDER BY $order  LIMIT 8 OFFSET ?;");
		$pstmt->execute(array($userId , $privacy , $ofset));
		$result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
	
		return $result;
	}
	
}
?>