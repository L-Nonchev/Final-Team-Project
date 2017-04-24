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
	
}
?>