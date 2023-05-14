<?php

	// Database Configuration
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'koratuwa');

	// define('DB_HOST', 'koratuwa.csjajiu1hjs0.ap-south-1.rds.amazonaws.com');
	// define('DB_USER', 'admin');
	// define('DB_PASSWORD', 'apsara99##');
	// define('DB_NAME', 'koratuwa');

	//APPROOT
	 define('APPROOT', dirname(dirname(__FILE__)));

	//URLROOT
	 define('URLROOT', 'http://localhost/koratuwa');

	//UPLOADS
	define('UPLOADS', URLROOT . '/public/img/uploads/');

	//USERS
	define('USERS', URLROOT . '/public/img/users/');


	//WEBSITE NAME
	 define('SITENAME', 'කොරටුව​');

	//PUBROOT
	// define('PUBROOT', dirname(dirname(dirname(__FILE__))).'\public');

?>
