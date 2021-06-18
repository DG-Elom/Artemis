<?php 

	session_start();

	if(!isset($_SESSION['login'])){
		header("Location:login.php");
		exit();
	} else if ($_SESSION['admin'] == 0) {
		header("Location:index.php");
	} else {
		$deco = '<a class="nav-link" href="logout.php">Déconnexion</a>';
		$estCon = $_SESSION['prenom']." ".$_SESSION['nom'];
	}
?>
<?php
	require("config.php");

	$query = $conn ->prepare('SELECT * FROM user');


	$executeIsOk = $query->execute();


	$membres = $query->fetchAll();

?>

 <?php 
 	$titre = "Liste des membres";
 	if (isset($_SESSION['login'])){
  		 $estCon = $_SESSION['prenom']." ".$_SESSION['nom']; 
  	} else {
  		$estCon = "";
  	}
 	require("head.php"); 
 	require("header.php");
 ?>
	<h1 class="display-4">Liste des membres</h1>
	<div class="card-columns">
		
		<?php foreach ($membres as $membre): ?>
			<div class="card-row">
				<div class="card">
					<div class="card-header" > 

						<?php if ($membre['admin'] == FALSE ){ ?>
							<p class="display-5" id="admin">Membre</p> <?php } else { ?>
							<p class="display-5" id="admin">Administrateur</p><?php } ?>
					</div>
					<div class="card-body">
						<strong>Nom:</strong> <?= $membre['nom'] ?> <br>
						<strong>Prénom:</strong> <?= $membre['prenom'] ?> <br>
						<strong>Login:</strong> <?= $membre['pseudo'] ?> <br>
						<strong>E-mail: </strong> <?= $membre['email'] ?> <br>
						<strong>Mot de passe:</strong> <?= $membre['password'] ?>
					</div>
					<div class="card-footer">
						<a href="delete.php?numMembre=<?= $membre['id'] ?>"><button type="submit" class="btn btn-outline-danger" >Supprimer</button></a>
						<a href="modif.php?numMember=<?= $membre['id'] ?>"><button type="button" class="btn btn-outline-warning" >Modifier</button></a>
						<?php if($membre['admin'] == 0) { ?>
							<a href="devientAdmin.php?numMember=<?=$membre['id']?>&amp;adMember=<?=$membre['admin']?>"><button type="button" class="btn btn-outline-success" >Promouvoir</button></a>
						<?php } else { ?>
							<a href="devientAdmin.php?numMember=<?=$membre['id']?>&amp;adMember=<?=$membre['admin']?>"><button type="button" class="btn btn-outline-success" >Retrograder</button></a>
						<?php } ?>
					</div>
				</div>
			</div>			
		<?php endforeach; ?>
	
	</div>
	<div>
		<p class="lead"><a href="index.php">Page de formulaire</a></p>
	</div>
	
 <?php 
 	require("footer.php");
 	require("foot.php"); 
 ?>
