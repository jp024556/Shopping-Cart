<?php
	session_start();

	$host = 'localhost';
	$user = 'root';
	$pswd = '';
	$dbName = '_test';

	$conn = mysqli_connect($host, $user, $pswd, $dbName);
	if(!$conn) die('Connection error !');
?>