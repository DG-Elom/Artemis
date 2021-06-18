<?php require("head.php"); ?>
<?php $titre = "Suppression"; require("header.php"); ?>

	<?php
		$conn = require("config.php");
		
		$bdd = $conn->prepare('DELETE FROM user WHERE id = :num LIMIT 1');
echo $_GET['numMembre'];
		$bdd->bindValue(':num', $_GET['numMembre'], PDO::PARAM_INT);
		
		$isOk = $bdd->execute();
		
		if($isOk){
			
			header("Location:membres.php");

		} else {
			echo "<div id='ins'>
		             <h3 class='display-4'>Suppression s'est mal passée.</h3>
		             <p class='lead'>Cliquez ici pour retourner à la <a href='membres.php'>liste des membres</a></p>
		       	</div>";
		}
	?>

<?php require("footer.php"); ?>
<?php require("foot.php"); ?>