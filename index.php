
<?php 

	session_start();

	if (isset($_SESSION['login'])) {
		$deco = '<a class="nav-link" href="logout.php">Déconnexion</a>';
		# code...
		$estCon = $_SESSION['prenom']." ".$_SESSION['nom'];
	}
	
?>

<?php require("head.php"); ?>
<?php $titre = "Accueil"; require("header.php"); ?>

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="img1.jpeg" alt="First slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="img6.jpg" alt="Second slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="img4.jpg" alt="Third slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="img8.jpg" alt="Third slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="img7.jpg" alt="Third slide">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
<?php
	require("config.php");

	$query = $conn ->prepare('SELECT * FROM user');


	$executeIsOk = $query->execute();


	$membres = $query->fetchAll();

?>

	<?php 
	if (isset($_SESSION['login'])) {
?>
	<h1>Liste des membres</h1>
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
						<strong>E-mail: </strong> <?= $membre['email'] ?> 
					</div>
					<?php if ($_SESSION['admin'] == 1) { ?>
						<div class="card-footer">
						<a href="delete.php?numMembre=<?= $membre['id'] ?>"><button type="submit" class="btn btn-outline-danger" >Supprimer</button></a>
						<a href="modif.php?numMember=<?= $membre['id'] ?>"><button type="button" class="btn btn-outline-warning" >Modifier</button></a>
						<?php if($membre['admin'] == 0) { ?>
							<a href="devientAdmin.php?numMember=<?=$membre['id']?>&amp;adMember=<?=$membre['admin']?>"><button type="button" class="btn btn-outline-success" >Promouvoir</button></a>
						<?php } else { ?>
							<a href="devientAdmin.php?numMember=<?=$membre['id']?>&amp;adMember=<?=$membre['admin']?>"><button type="button" class="btn btn-outline-success" >Retrograder</button></a>
						<?php } ?>
					</div>
					<?php } ?>

					
				</div>
			</div>			
		<?php endforeach; ?>

	</div>
<?php } ?>
<?php require("footer.php"); ?>
<?php require("foot.php"); ?>