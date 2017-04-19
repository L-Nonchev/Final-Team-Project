<?php
class Video implements JsonSerializable {
	private $videoId;
	private $videoTitle;
	private $videoPath;
	private $videoPoster;
	private $videoDate;
	private $videoText;
	private $videoLike;
	private $videoDislike;
	private $videView;
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
	
	public function __construct($videoTitle, $videoPath, $videoPoster, $videoText, $privacy, $userId = null,
			$categoryId = null, $musicGenre = null, $videoLike = 0, $videoDislike = 0, $videView = 0,
			$videoId = null){
	
				$this->setVideoTitle($videoTitle);
				$this->setVideoPath($videoPath);
				$this->setVideoPoster($videoPoster);
				$this->setVideoText($videoText);
				$this->setPrivacy($privacy);
				$this->setCategoryId($categoryId);
				$this->setMusicGenre($musicGenre);
				$this->setVideoLike($videoLike);
				$this->setVideoDislike($videoDislike);
				$this->setVideoView($videView);
				$this->setUserId($userId);
	}
	public function setVideoId($videoId){
		if (is_numeric($videoId) && $videoId > 0){
			$this->videoId = $videoId;
		}else throw new Exception("Incorect video id!");
	}
	
	public function setVideoTitle($videoTitle){
		if ($videoTitle !== '' && strlen($videoTitle) < 100) {
			$this->videoTitle = $videoTitle;
		}else throw new Exception("Incorect video title!");
	}
	
	public function setVideoPath($videoPath){
		if ($videoPath !== '' && strlen($videoPath) < 100){
			$this->videoPath = $videoPath;
		}else throw new Exception("Incorect video path!");
	}
	
	public function setVideoPoster($videoPoster){
		if ($videoPoster !== '' && strlen($videoPoster) < 100){
			$this->videoPoster = $videoPoster;
		}else throw new Exception("Incorect video poster path!");
	}
	
	
	public function setVideoText($videoText){
		if ($videoText !== '' && strlen($videoText) < 500){
			$this->videoText = $videoText;
		}else throw new Exception("Incorect description!");
	}
	
	public function setVideoLike($videoLike){
		if (is_numeric($videoLike) && $videoLike >= 0){
			$this->videoLike = $videoLike;
		}else throw new Exception("Incorect number of video like!");
	}
	
	public function setVideoDislike($videoDislike){
		if (is_numeric($videoDislike) && $videoDislike >= 0){
			$this->videoDislike = $videoDislike;
		}else throw new Exception("Incorect number of video dislike!");
	}
	
	public function setVideoView($videView){
		if (is_numeric($videView) && $videView >= 0){
			$this->videView = $videView;
		}else throw new Exception("Incorect number of video view!");
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
		if (strlen($privacy) !== 0){
			$this->privacy = $privacy;
		}else throw new Exception("Incorect type of privace!");
	}
	
	public function setMusicGenre($musicGenre){
		if ($musicGenre !== '' && strlen($musicGenre) < 60){
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