<?php
$db_server = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'tasbeera';
$conn = new mysqli($db_server, $db_user, $db_password, $db_name);

if (!$conn) {
	die("Connection to database failed: " . mysqli_connect_error());
}