<?php
	define('logInPage', './view/login.php');
	
	session_start();
	
	// autoload function
	function __autoload($className){
		require_once './model/'. $className .'.php';
	}
	
	// chech for exist sesion ande redirec to index.php
	if (isset($_SESSION['user'])){
		header('Location: ./HomePageController.php ' , true , 302);
		die();
	}
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['log-in-button'])){
			if (isset($_POST['email']) && isset($_POST['password'])){
				try {
					//-=-=-=-=-=-=---==-=-=-= Check input =-=-=-==-=-==-=-==--\\
					$email = htmlentities(trim($_POST['email']));
					$password = htmlentities(trim($_POST['password']));
				
					// create user
					//-=-=-=-=-=-=---==-=-=-= Create User=-=-=-==-=-==-=-==--\\
					$user = new User($email, $password);
						
					$userData = new UserDAO();
						
					//-=-=-=-=-=-=---==-=-=-= Insert new user to DB=-=-=-==-=-==-=-==--\\
					$ifCreatet = $userData->loginUser($user);
						
					if ($ifCreatet){
// 						echo json_encode($user);
							
						//-=-=-=-=-=-=---==-=-=-= CREATE  SESSION =-=-=-==-=-==-=-==--\\
							
						$_SESSION['user'] = json_encode($user);
							
						header('Location: ./HomePageController.php', true ,302);
						die();
					}
				}catch (PDOException $e){
					include '503.php';
				} catch (Exception $e){
					$errorMessage = $e->getMessage();
					include logInPage;
				}
			}else {
				$errorMessage = "There are blank fields!";
				include singUpPage;
			}
		}else{
			include logInPage;
		}
	}else{
		include logInPage;
	}
?>