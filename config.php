<?php
	$conn = null;
	$host = 'mysql: host=localhost; dbname=bdd';
	$dbuser = 'root';
	$pw = 'root';

	try {
		$conn = new PDO($host, $dbuser, $pw);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Connexion réussie!";
	}
	catch (PDOException $e) {
		echo 'Connexion échoué'.$e->getMessage();
	}
	return $conn;
?>