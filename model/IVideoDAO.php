<?php
interface IVideoDAO {
	public function addVideo(Video $video);
	public function openVideo(Video $video);
}
?>