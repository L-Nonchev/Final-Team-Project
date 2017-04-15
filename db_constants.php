<?php

//-=-=-=-=-=-=-=-=-=-=-=-=-=--=  Define connection constants -=-=-=-=-==-==-==-=-===-==-=\\
						
	define ( 'DB_USER', 'root' );
	define ( 'DB_PASS', '' );
	define ( 'DB_HOST', 'localhost' );
	define ( 'DB_NAME', 'circle_tube' );

//-=-=-=-=-=-=-=-=-=-=-=-=-=--=END of Define connection constants -=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define fech user name -=-=-=-=-==-==-==-=-===-==-=\\

	define('SELECT_USER_NAME_SQL', 'SELECT username FROM users WHERE user_id = ?');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define fech user name-=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define fech user picture address-=-=-=-=-==-==-==-=-===-==-=\\

	define('FECH_PIC_ADDRESS_SQL', 'SELECT pic_path FROM users WHERE user_id = ?');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define fech user picture address-=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define fech user ID-=-=-=-=-==-==-==-=-===-==-=\\

	define('SELECT_USER_ID_SQL', 'SELECT user_id FROM users WHERE u_email = ? AND u_password = ?;');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define fech user ID-=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define Insert user data-=-=-=-=-==-==-==-=-===-==-=\\

	define('INSERT_USER_DATA_SQL', 'INSERT INTO users VALUES (	null, ?, ?, ?, ?, now(), 0, 0, null, ?);');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define fech user ID-=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define fetch user email -=-=-=-=-==-==-==-=-===-==-=\\

	define('FETCH_EMAIL_SQL', 'SELECT u_email FROM users WHERE user_id = ?;');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define fetch user email-=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define update user picture address-=-=-=-=-==-==-==-=-===-==-=\\

	define('UPDATE_PIC_ADDRESS_SQL', 'UPDATE users SET u_pic = ? WHERE user_id = ?;');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define update user picture addressc-=-=-=-=-==-==-==-=-===-==-=\\

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= Define update user password -=-=-=-=-==-==-==-=-===-==-=\\

define('UPDATE_USER_PASSWORD_SQL', 'UPDATE users SET u_password = ? WHERE user_id = ?;');

//-=-=-=-=-=-=-=-=-=-=-=-=-=--= END of Define update user password -=-=-=-=-==-==-==-=-===-==-=\\










?>