<?php
class VideoDAO implements IVideoDAO{
	private $db;
	const ADD_VIDEO_SQL = 'INSERT INTO videos VALUES(null, ?,?,?,?,?, 0,0,0,?,?,?,?);';
	const OPEN_VIDEO = '';
	
	public function __construct(){
		$this->db = DBConnection::getDb();
	}
	
	public function addVideo(Video $video){
		$video->setVideoDate(date("Y-m-d"));
// 		try{
			$pstmt = $this->db->prepare(self::ADD_VIDEO_SQL);
			$pstmt->execute ( array ($video->videoTitle, $video->videoPath, $video->videoPoster,$video->videoDate, $video->videoText, $video->categoryId, $video->musicGenre, $video->privacy, $video->userId) );
// 		}catch (PDOException $e){
// 			throw new Exception('Incorect data!');
// 		}
	}
	
	public function openVideo(Video $video){
	
	}
	
	public function checkVideoName($videoName){
		try {
			return $this->db->query("SELECT video_id FROM videos WHERE v_path = '$videoName';")->fetchColumn();
		}catch (PDOException $e){
			throw new Exception('Incorect video name!');
		}
	}
}
?>