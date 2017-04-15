<?php
	interface IUserDAO {
		public function loginUser(User $user) ;
		
		public function singInUser(User $user) ;
	}
?>