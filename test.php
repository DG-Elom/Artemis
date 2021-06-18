<?php require("head.php"); ?>
<?php $titre = "Test"; require("header.php"); ?>

<?php 
	require('config.php');	
	$bdd = $conn->query("SELECT * FROM user WHERE pseudo='balal'");
	$bdd->execute();

	$donnee = $bdd->fetch();

	echo $donnee['nom'].' '.$donnee['prenom'];
?>

<?php require("footer.php"); ?>
<?php require("foot.php"); ?>