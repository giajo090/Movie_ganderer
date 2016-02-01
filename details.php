<?php
	require 'inc/config.php';
	$pageTitle='details';

	if (isset($_GET['id'])) {
	$currentID=$_GET['id'];
	$sql = 'SELECT fil_titre, fil_id, fil_affiche, fil_acteurs, fil_annee, fil_synopsis, fil_filename
	FROM film
	WHERE fil_id=:fil_id
	';
	
	$pdoStatement = $pdo -> prepare($sql);
	$pdoStatement -> bindValue(':fil_id',$currentID ,PDO::PARAM_INT);
	};

	if ($pdoStatement -> execute()) {
		$resList=$pdoStatement-> fetch();
		$detail_titre=$resList['fil_titre'];
		$detail_id=$resList['fil_id'];
		$detail_affiche=$resList['fil_affiche'];
		$detail_acteur=$resList['fil_acteur'];
		$detail_annee=$resList['fil_annee'];
		$detail_synopsis=$resList['fil_synopsis'];
		$detail_filename=$resList['fil_filename'];
		echo $detail_titre;
;
	};
echo $resList;
?>
<?php
	require 'html/header.php';
?>
<div>
	<a href="http://localhost/p9-10-11/Movie_ganderer/form_film.php">Ajout/Modif</a>
</div>
	<div><a href="http://localhost/p9-10-11/Movie_ganderer/catalogue.php">Catalogue</a></div>


<h1>Details</h1>

<?php  ?>
<img src="<?php echo $detail_affiche; ?>"/>
<?php require 'html/footer.php';