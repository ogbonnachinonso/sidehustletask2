<?php
$errors = "";
define('DB_HOST','localhost');
define('DB_USER','uba');
define('DB_PASS','ogbonna123@');
define('DB_NAME','todos');

	$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	//checking connection
	if(!$connect){
    die ('Connection error:'. mysqli_error($connect));
	}
  
 