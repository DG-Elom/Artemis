<?php 

	session_start();

	if (isset($_SESSION['login'])) {
		$deco = '<a class="nav-link" href="logout.php">Déconnexion</a>';
		# code...
		$estCon = $_SESSION['prenom']." ".$_SESSION['nom'];
	}
	

	
	
?>

<?php require("head.php"); ?>
<?php $titre = "Inscription"; require("header.php"); ?>

<?php
	require('config.php');
	if(isset($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['password'])){
		$nom = ucwords($_POST['nom']);
		$prenom = ucwords($_POST['prenom']);
		$pseudo = $_POST['pseudo'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$admin = 0;

		$_POST = array();
		
		$bdd = $conn->prepare("SELECT * FROM user WHERE pseudo=:pseud");
		$bdd->bindValue(':pseud', $pseudo, PDO::PARAM_STR);
		$bdd->execute();
		if($donnee = $bdd->fetch()){
				echo "<div id='ins'>
		             <h3 class='display-4'>Vous vous êtes déjà inscrit.</h3>
		             <p class='lead'>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
		       	</div>";
		}else {
			$query = $conn->prepare('INSERT INTO user VALUES (NULL, :nom, :prenom, :pseudo, :email, :password, :admin)');

			$query->bindValue(':nom', $nom, PDO::PARAM_STR);
			$query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
			$query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
			$query->bindValue(':email', $email, PDO::PARAM_STR);
			$query->bindValue(':password', $password, PDO::PARAM_STR);
			$query->bindValue(':admin', $admin, PDO::PARAM_STR);

			$insertIsOk = $query->execute();
			if($insertIsOk){
				echo "<div id='ins'>
			             <h3 class='display-4'>Vous êtes inscrit avec succès.</h3>
			             <p class='lead'>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			       	</div>";
			} else {
				echo "<div>
			             <h3>L'inscription a echoué.</h3>
			       	</div>";
			}
		}
		
		
	} else { 
?>
<div id="insc">
	<form method="POST" action="" class="form-group" name="internet">
		<div class="row">
			<div class="form-group col">
				<label for="nom">Nom:</label>
				<input id="nom" class="form-control" type="text" name="nom" required>
			</div>

			<div class="form-group col">
				<label for="prenom">Prenom:</label>
				<input id="prenom" class="form-control" type="text" name="prenom" required>
			</div>
		</div>
		

		<div class="form-group">
			<label for="pseudo">Login:</label>
			<input id="pseudo" class="form-control" type="text" name="pseudo" required>
		</div>

		<div class="form-group">
			<label for="email">E-mail:</label>
			<input id="email" class="form-control" type="text" name="email" required>
		</div>

		<div class="form-group">
			<label for="motdp">Password:</label>
			<input id="password" class="form-control" type="password" name="password" required>
		</div>

		<div><button type="submit" name="submit" class="btn btn-primary">S'inscrire</button> </div>
		<p>Pour se connecter, cliquez <a href="connexion.php">ici</a>!</p>
	</form>
</div>
<?php } ?>

<?php require("footer.php"); ?>
<?php require("foot.php"); ?>
