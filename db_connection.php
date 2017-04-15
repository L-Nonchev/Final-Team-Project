<?php
// -=-==-=--=-=-=-=-=-=--=-==--==-= DB Constants=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
require './db_constants.php';
// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB Constants=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB connection establish=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function db_connection(){
	$dbcon = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
	$dbcon->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	return $dbcon;
};

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB connection establish=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function cach_handler($e){
	$errorType = $e->errorInfo . "<br />";
	$errorMessage = $e->getMessage ();
	mail ( 'ludmil.nonchev@gmail.com', $errorType, $errorMessage );
	header ( 'Location: ./404.html' );
};




// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User Name function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_user_name($userID) {
		
	try {
		$dbcon = db_connection ();
		
		$execute = $dbcon->prepare ( SELECT_USER_NAME_SQL );
		
		if ($execute->execute ( array ($userID))) {
			$result = $execute->fetchColumn ();
			return $result;
		} else {
			
			$result = false;
			return $result;
		}
		;
	} catch ( PDOException $e ) {
		cach_handler ( $e );
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB User Name function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= DB User Picture address retrive function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_user_picture_address($userID){
	try {
		$dbcon = db_connection();
		$execute = $dbcon->prepare ( FECH_PIC_ADDRESS_SQL );
		if ($execute->execute ( array ($userID) )) {
			
			$result = $execute->fetchColumn ();
			return $result;
	
		} else {
			
			$result = false;
			return $result;
		};	
		
	} catch (PDOException $e) {
		cach_handler($e);
	}
};

// -=-==-=--=-=-=-=-=-=--=-==--==-=END of DB User Picture address retrive function=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Creat acount for new users=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function db_create_user ($firstName, $lastName, $email, $password, $pathImage ) {

	//-=-=-=-=-=-=---==-=-=-= Check input =-=-=-==-=-==-=-==--\\
	$firstName = htmlentities($firstName);
	$lastName = htmlentities($lastName);
	$email = htmlentities($email);
	$password = htmlentities($password);


	//-=-=-=-=-=-=---==-=-=-= Hash input=-=-=-==-=-==-=-==--\\
	$mailSha1 = sha1($email);
	$passMd5 = md5($password);
	$passSha1 = sha1($passMd5);


	try{
	
		$dbcon = db_connection();
		//-=-=-=-=-=-=---==-=-=-= Insert data=-=-=-==-=-==-=-==--\\

		// check for exist e-mail
		$check = $dbcon->prepare(SELECT_USER_ID_SQL);
		$check->execute(array($mailSha1, $passSha1));
		if ($check->fetchColumn() > 0) {

			$result = false;
			return $result;

		} else {
			//insert new user
			$stmt = $dbcon->prepare(INSERT_USER_DATA_SQL);
			if ($stmt->execute(array($firstName, $lastName, $mailSha1, $passSha1, $pathImage))){
				
				//-=-=-=-=-=-=---==-=-=-= Creat folder for client =-=-=-==-=-==-=-==--\\
				
				mkdir('./assets/users/'. $mailSha1 );
				mkdir('./assets/users/'.$mailSha1.'/image');

				//-=-=-=-=-=-=---==-=-=-= CREATE  SESSION =-=-=-==-=-==-=-==--\\
				session_start();
				
				$userID = $dbcon->lastInsertId();

				$_SESSION['user_id'] = $userID;

				$result = true;
				return $result;
			}
		}
	} catch ( PDOException $e ) {
		cach_handler($e);
	}

}

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of DB Creat acount for new users=-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Log In chek =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function logInUser ($email, $password){

	$email = htmlentities($email);
	$password = htmlentities($password);


	//-=-=-=-=-=-=---==-=-=-= Hash input=-=-=-==-=-==-=-==--\\
	$mailSha1 = sha1($email);
	$passMd5 = md5($password);
	$passSha1 = sha1($passMd5);

	try{
	
		$dbcon = db_connection();

			
		$check = $dbcon->prepare(SELECT_USER_ID_SQL);
		$check->execute(array($mailSha1, $passSha1));;
		$userId = $check->fetch(PDO::FETCH_COLUMN);
			
		if ($userId > 0 ){
			//-=-=-=-=-=-=---==-=-=-= Create SESSION =-=-=-==-=-==-=-==--\\
			session_start();

			$_SESSION['user_id'] = $userId;

			$result = true;
			return $result;
		}else {

			$result = false;
			return $result;
		}
			
			
	} catch ( PDOException $e ) {
		cach_handler($e);
	}
}
// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Log In chek =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Get email for user =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function getEmail ($userID) {

	try{
	
		$dbcon = db_connection();
		
		$check = $dbcon->prepare(FETCH_EMAIL_SQL);
		$check->execute(array($userID));
		$email = $check->fetch(PDO::FETCH_COLUMN);
	
		return $email;
		
		} catch ( PDOException $e ) {
			cach_handler($e);
		}
}

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Get email for user =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Check email for user =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

function updateImage ($userID, $imgPath){
	
	try{
	
		$dbcon = db_connection();
	
		$check = $dbcon->prepare(UPDATE_PIC_ADDRESS_SQL);
		if ($check->execute(array($imgPath, $userID))){
			return true;
		}
	
	} catch ( PDOException $e ) {
		cach_handler($e);
	}
	
}

// -=-==-=--=-=-=-=-=-=--=-==--==-= END of check email for user =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

// -=-==-=--=-=-=-=-=-=--=-==--==-= Update user password =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\
function updatePassword ($userID, $password){
	
	$password = htmlentities($password);
	$passMd5 = md5($password);
	$passSha1 = sha1($passMd5);

	try{

		$dbcon = db_connection();
		
		$check = $dbcon->prepare(UPDATE_USER_PASSWORD_SQL);
		if ($check->execute(array($passSha1, $userID))){
			return "Òhe password is changed successfully";
		}

	} catch ( PDOException $e ) {
		cach_handler($e);
	}
};
// -=-==-=--=-=-=-=-=-=--=-==--==-= END of Update user password =-=--=-=-=-=-=-=-=-=-=-=-=-=-\\

?>