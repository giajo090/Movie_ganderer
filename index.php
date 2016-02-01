<?php

require 'inc/config.php'

?>

<?php 
	require 'html/header.php';
	$sql ='SELECT count(*) AS nbr, categorie.cat_id, categorie.cat_nom FROM film INNER JOIN categorie ON categorie.cat_id=film.cat_id GROUP BY categorie.cat_id, categorie.cat_nom'

?>
<section>
	<form action="catalogue.php" method="get">
		<input type="text" name="q" value="" />
		<input type="submit" value="Rechercher"/>
	</form>
	<a href="http://localhost/p9-10-11/Movie_ganderer/form_film.php">Ajout/modif</a>
</section>
<?php 
	require 'html/footer.php'
?>