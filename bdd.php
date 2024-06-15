<?php
function connexion()
{
	try {
		$host = 'localhost';
		$dbname = 'artbox';
		$username = 'root';
		$password = '';
		$mysqlClient = new PDO(
			'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8',
			$username,
			$password
		);
		// Définit l'attribut ERRMODE pour lever des exceptions en cas d'erreur 
		//PDO PHP Data Objects
		$mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $mysqlClient; // Retourne l'objet PDO
	} catch (PDOException $e) {
		echo 'Erreur de connexion : ' . $e->getMessage();
		exit;
	}
}
