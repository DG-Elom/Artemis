

	<?php
		$conn = require("config.php");
		if($_GET['adMember'] == 0){
			$admin = 1;
		} else {
			$admin = 0;
		}
		
		
		$bdd = $conn->prepare('UPDATE user SET admin=:admin WHERE id = :num LIMIT 1');
		$bdd->bindValue(':admin', $admin, PDO::PARAM_INT);
		$bdd->bindValue(':num', $_GET['numMember'], PDO::PARAM_INT);
		
		$isOk = $bdd->execute();
		
		if($isOk){
			
			header("Location:membres.php");

		} else {
			header("Location:login.php");
		}
	?>
