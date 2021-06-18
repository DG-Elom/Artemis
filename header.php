<header class="fixed-top">
	<nav class="navbar navbar-expand bg-dark navbar-dark">
		<a href="index.php" class="navbar-brand">
			Artemis Site
		</a>
		<ul class="nav justify-content-end navbar-nav">
	      <li class="nav-item active">
	         <a class="nav-link" href="index.php">Accueil</a>
	      </li>
	      <?php if ($_SESSION['admin'] == 1) { ?>
				<li class="nav-item">
			        <a class="nav-link" href="admin.php">Tableau de bord</a>
			    </li>
			<?php } ?>
	      <li class="nav-item">
	         <a class="nav-link" href="inscription.php">Inscription</a>
	      </li>
	     <li class="nav-item">
	         <a class="nav-link" href="membres.php">Liste des membres</a>
	      </li> 
	      <li class="nav-item">
	         <a class="nav-link" href="login.php">Connexion</a>
	      </li>
	    </ul>
	    <div class="cl1">
	    	<p class="navbar-text" id="estCon">
	    		<?php echo $estCon; ?> 
	    	</p>
	    </div>
		<div class="cl2">
			<?php echo $deco; ?>
	    </div>
	</nav>
	
</header>
<body>
	<div class="container">
		<div class="jumbotron" id="jumb">
			<h1 class="display-2"><center> <?php echo $titre; ?></center></h1>
		</div>
	</div>
	<div class="container">