<?php 

	session_start();

	if (isset($_SESSION['login'])) {
		$deco = '<a class="nav-link" href="logout.php">Déconnexion</a>';
		# code...
		$estCon = $_SESSION['prenom']." ".$_SESSION['nom'];
	}
	

	
	
?>

<?php require("head.php"); ?>
<?php $titre = "Administrateur"; require("header.php"); ?>
	
	<div class="row">
		<div class="col-md-4">
			<div id="ins2">
				<p class="h2"><u>Tableau de bord</u></p><br>
				<p><a href="index.php"><button type="submit" class="btn btn-outline-success btn-lg" >Aller à l'Accueil</button></a></p>
				<p><a href="inscription.php"><button type="submit" class="btn btn-outline-warning btn-lg" >Inscire un membre</button></a></p>
				<p><a href="membres.php"><button type="submit" class="btn btn-outline-info btn-lg" >Administrer les membres</button></a></p>
				<p><a href="logout.php"><button type="submit" class="btn btn-outline-danger btn-lg" >Se déconnecter</button></a></p>
			</div>
		</div>
		<div class="col-md-8">
			<div id="ins">
				<h1 class="display-4">Bienvenue <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?>!</h1>
				<p class="lead">Vous êtes sur votre tableau de bord.</p>
			</div>
		</div>
	</div>
	



<?php require("footer.php"); ?>
<?php require("foot.php"); ?>