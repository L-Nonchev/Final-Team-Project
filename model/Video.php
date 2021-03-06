<?php
class Video implements JsonSerializable {
	private $videoId;
	private $videoTitle;
	private $videoPath;
	private $videoPoster;
	private $duration;
	private $videoDate;
	private $videoText;
	private $categoryId;
	private $privacy;
	private $userId;
	private $musicGenre;
	
	//get Property
	public function __get($propertyName){
		return $this->$propertyName;
	}
	
	//Loading object in session
	public function jsonSerialize() {
		return get_object_vars($this);
	}
	
	public function __construct($videoTitle, $videoPath, $videoPoster, $duration, $videoText, $privacy, $userId = null,
			$categoryId = null, $musicGenre = null, $videoId = null){
	
				$this->setVideoTitle($videoTitle);
				$this->setVideoPath($videoPath);
				$this->setVideoPoster($videoPoster);
				$this->setVideoText($videoText);
				$this->setPrivacy($privacy);
				$this->setVideoDuration($duration);
				$this->setCategoryId($categoryId);
				$this->setMusicGenre($musicGenre);
				$this->setUserId($userId);
	}
	public function setVideoId($videoId){
		if (is_numeric($videoId) && $videoId > 0){
			$this->videoId = $videoId;
		}else throw new Exception("Incorect video id!");
	}
	
	public function setVideoTitle($videoTitle){
		if ($videoTitle !== '' && strlen($videoTitle) < 200) {
			if (!preg_match("/^[- _ a-zA-Z0-9 . ()]*$/",$videoTitle)) {
				throw new Exception ( 'Title ERROR: Only letters ,numbers , - , _ , ( ) and white space allowed.');
			}else {
				$this->videoTitle = htmlentities($videoTitle);
			}
		}else throw new Exception("Incorect video title!");
	}
	
	public function setVideoPath($videoPath){
		if ($videoPath !== '' && strlen($videoPath) < 200 && preg_match("/^[- _ a-zA-Z0-9 . \ () ]*$/",$videoPath) ){
			$this->videoPath = $videoPath;
		}else throw new Exception("Incorect video path!");
	}
	
	public function setVideoDuration($duration){
		if ($duration !== '' && strlen($duration) < 50){
			$this->duration = $duration;
		}else throw new Exception("Incorect video duration!");
	}
	
	public function setVideoPoster($videoPoster){
		if ($videoPoster !== '' && strlen($videoPoster) < 100 && preg_match("/^[- _ a-zA-Z0-9 . \ () ]*$/",$videoPoster)){
			$this->videoPoster = $videoPoster;
		}else throw new Exception("Incorect video poster path!");
	}
	
	
	public function setVideoText($videoText){
		if ($videoText !== '' && strlen($videoText) < 500){
			$this->videoText = $videoText;
		}else throw new Exception("Incorect description! Maximum characters is 500");
	}
	
	public function setCategoryId($categoryId){
		if (is_numeric($categoryId) && $categoryId > 0){
			$this->categoryId = $categoryId;
		}else throw new Exception("Incorect category id!");
	}
	
	public function setUserId($userId){
		if (is_numeric($userId) && $userId > 0){
			$this->userId = $userId;
		}else throw new Exception("Incorect user id!");
	}
	
	public function setPrivacy($privacy){
		if ($privacy !== ''){
			$this->privacy = $privacy;
		}else throw new Exception("Incorect type of privace!");
	}
	
	public function setMusicGenre($musicGenre){
		if ($musicGenre !== ''){
			$this->musicGenre = $musicGenre;
		}else throw new Exception("Incorect music genre!");
	}
	
	public function setVideoDate($videoDate){
		if (strlen($videoDate) !== 0){
			$this->videoDate = $videoDate;
		}else throw new Exception("Incorect video date!");
	}
}

?>