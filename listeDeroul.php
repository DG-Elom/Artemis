<?php
	require('config.php');

	$query = $conn->prepare('SELECT nom, prenom FROM user ');

	$query->execute();

?>
<select class="select">
<?php 
	while ($donnees = $query->fetch())
	{
	?>
			
	<option value=" <?php echo $donnees['nom']; ?>"> 
		<?php echo $donnees['prenom'].' '.$donnees['nom']; ?>
	</option>
	       
	<?php
	}
?>
</select>