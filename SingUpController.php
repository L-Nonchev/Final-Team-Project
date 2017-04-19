<?php
	define('singUpPage', './view/signup.php');
	
	session_start();

	// autoload function
	function __autoload($className){
		require_once './model/'. $className .'.php';
	}
	
	// chech for exist sesion ande redirec to index.php
	if (isset($_SESSION['user'])){
		header('Location: ./index.php ' , true , 302);
		die();
	}
		
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['sing-up-button'])){
			try {
				//-=-=-=-=-=-=---==-=-=-= Check input =-=-=-==-=-==-=-==--\\
				$userName = htmlentities(trim($_POST['username']));
				$email = htmlentities(trim($_POST['email']));
				$country = htmlentities(trim($_POST['country']));
				$password = htmlentities(trim($_POST['password']));
				$reRassword = htmlentities(trim($_POST['re-password']));
				
				// check for same passwords
				if ($password !== $reRassword){
					$errorMessage = "The password you entered does NOT match! <br /> TRY AGAIN.";
					include singUpPage;
				} else {
					
					// create user
					//-=-=-=-=-=-=---==-=-=-= Create User=-=-=-==-=-==-=-==--\\
					$user = new User($email, $password, $userName, $country);
					
					$userData = new UserDAO();
					
					//-=-=-=-=-=-=---==-=-=-= Insert new user to DB=-=-=-==-=-==-=-==--\\
					$ifCreatet = $userData->singInUser($user);
					
					if ($ifCreatet){

						
						//-=-=-=-=-=-=---==-=-=-= CREATE  SESSION =-=-=-==-=-==-=-==--\\

						$_SESSION['user'] = json_encode($user);
						
						header('Location: ./index.php', true ,302);
					}
				} 
			}catch (PDOException $e){
				$errorMessage = "Username or Email already exists!";
				include singUpPage;
				
			} catch (Exception $e){
				$errorMessage = $e->getMessage();
				include singUpPage;
			}
		}else {
			include singUpPage;
		}
	}else {
		include singUpPage;
	}

?>