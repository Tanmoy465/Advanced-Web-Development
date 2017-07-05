<?php
//Creating Connection
$db_host = 'localhost';
$db_name =  'quiz1';
$db_user = 'root';
$db_password = '';

//Create mysql object
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

//error
if($mysqli->connect_error) {
	printf("Connection failed: %s\n", $mysqli->connect_error);
	exit();
}