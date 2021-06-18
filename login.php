
	<?php
		require('config.php');
		session_start();
		
		if(isset($_POST['login'])){
			$login = $_POST['login'];
			$pass = $_POST['pass'];

			$query = $conn->prepare('SELECT * FROM user WHERE pseudo=:login AND password=:pass');
			$query->bindValue(':login', $login, PDO::PARAM_STR);
			$query->bindValue(':pass', $pass, PDO::PARAM_STR);

			$query->execute();

			if($data=$query->fetch()){
				$_SESSION['nom'] = $data['nom'];
				$_SESSION['prenom'] = $data['prenom'];
				$_SESSION['login'] = $data['pseudo'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['admin'] = $data['admin'];
				if ($_SESSION['admin'] == TRUE){
					header("Location:admin.php");
				} else {
					header("Location:index.php");
				}

				
			} else {
				$erreur = "Le nom d'utilisateur ou le mot de passe est incorrect!";
			}
		}
	?>
<?php require("head.php"); ?>
<?php $titre = "Connexion"; $estCon = ""; require("header.php"); ?>
	
		<div id="log">
			<form method="POST" name="formulaire" action="">
			<div class="form-group">
				<label for="login">Login:</label>
				<input type="text" name="login" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="pass">Mot de passe:</label>
				<input type="password" name="pass" class="form-control" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary">Se connecter</button>  
			</div>
			<p>Pour s'inscrire, cliquez <a href="inscription.php">ici</a>!</p>
			<?php if(!empty($erreur)){ ?>
				<p><?php echo $erreur; ?></p>
			<?php } ?>

		</form>
		</div>

	

<?php require("footer.php"); ?>
<?php require("foot.php"); ?>
