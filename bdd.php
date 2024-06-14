<?php 
$host='localhost';
$dbname='artbox';
$username='root';
$password='';
$mysqlClient = new PDO(
	'mysql:host='. $host.';dbname=' . $dbname . ';charset=utf8',
	$username,
    $password
);
?>