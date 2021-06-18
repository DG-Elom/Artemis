<?php require("head.php"); ?>
<?php $titre = "Modification"; require("header.php"); ?>

<?php
	require('config.php');
	if(isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['password'])){
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$pseudo = $_POST['pseudo'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$admin = 0;

		$_POST = array();
		
		$query = $conn->prepare('UPDATE user SET nom=:nom, prenom=:prenom, pseudo=:pseudo, email=:email, password=:password, admin=:admin WHERE id=:id');

		$query->bindValue(':nom', $nom, PDO::PARAM_STR);
		$query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
		$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
		$query->bindValue(':email', $email, PDO::PARAM_STR);
		$query->bindValue(':password', $password, PDO::PARAM_STR);
		$query->bindValue(':admin', $admin, PDO::PARAM_STR);
		$query->bindValue(':id', $_GET['numMember'], PDO::PARAM_INT);

		$insertIsOk = $query->execute();
		if($insertIsOk){

			header("Location:membres.php");
			
		} else {
			echo "<div id='ins'>
		             <h3 class='display-4'>Votre modification s'est mal passées.</h3>
		             <p class='lead'>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
		       	</div>";
		}
	} else { 
		$bdd = $conn->prepare("SELECT * FROM user WHERE id=:id");
		$bdd->bindValue(':id', $_GET['numMember'], PDO::PARAM_STR);
		$bdd->execute();
		$member = $bdd->fetch();
?>
	<div id="insc">
		<form method="POST" action="" class="form-group" name="internet">
			<div class="row">
				<div class="form-group col">
					<label for="nom">Nom:</label>
					<input id="nom" class="form-control" type="text" name="nom" value="<?= $member['nom'] ?>" required>
				</div>

				<div class="form-group col">
					<label for="prenom">Prenom:</label>
					<input id="prenom" class="form-control" type="text" name="prenom" value="<?= $member['prenom'] ?>" required>
				</div>
			</div>
			

			<div class="form-group">
				<label for="pseudo">Login:</label>
				<input id="pseudo" class="form-control" type="text" name="pseudo" value="<?= $member['pseudo'] ?>" required>
			</div>

			<div class="form-group">
				<label for="email">E-mail:</label>
				<input id="email" class="form-control" type="text" name="email" value="<?= $member['email'] ?>" required>
			</div>

			<div class="form-group">
				<label for="motdp">Password:</label>
				<input id="password" class="form-control" type="password" name="password" value="<?= $member['password'] ?>" required>
			</div>

			<div><button type="submit" name="submit" class="btn btn-primary">Modifier</button> </div>
			<p>Pour se connecter, cliquez <a href="connexion.php">ici</a>!</p>
		</form>
	</div>
<?php } ?>

<?php require("footer.php"); ?>
<?php require("foot.php"); ?>
