<?php
	require("config.php");
	$bdd = query("SELECT * FROM user WHERE pseudo=:$pseudo");

	$bdd->execute();

	return $bdd;
?>