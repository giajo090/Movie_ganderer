
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
</head>
<body>
<?php $pdo = new PDO('mysql:dbname=movie_ganderer; host=127.0.0.1; charset=UTF8', 'root', '+webForce3');?>
<?php	
	
			$entreeFilm=$pdo -> prepare("INSERT INTO 
				film (`fil_titre`,`fil_annee`,`fil_synopsis`,`fil_description`,`fil_filename`,`fil_affiche`,`fil_acteurs`)
					VALUES(:fil_titre,:fil_annee,:fil_synopsis,:fil_description,:fil_filename,:fil_affiche,:fil_acteurs)");
			$entreeFilm-> bindvalue		(':filfiltre',$_POST["fil_titre"],PDO::PARAM_STR);
			$entreeFilm-> bindvalue		(':filannee',$_POST["fil_annee"],PDO::PARAM_INT);
			$entreeFilm-> bindvalue		(':filsynopsis',$_POST["fil_synopsis"],PDO::PARAM_STR);
			$entreeFilm-> bindvalue		(':fildescription',$_POST["fil_description"],PDO::PARAM_STR);
			$entreeFilm-> bindvalue		(':filfilename',$_POST["fil_filename"],PDO::PARAM_STR);
			$entreeFilm-> bindvalue		(':filaffiche',$_POST["fil_affiche"],PDO::PARAM_STR);
			$entreeFilm-> bindvalue		(':filacteurs',$_POST["fil_acteurs"],PDO::PARAM_STR);
		

		if (!empty($_POST)) {
			$entreeFilm -> execute();
			print_r($entreeFilm);
		} else {
			echo "pas rempli";
		}


		if (isset($_GET['id'])) {
		$currentId = intval($_GET['id']);
		//echo $currentId;
		
		$sql = '
		SELECT fil_id, fil_titre,fil_annee,fil_synopsis,fil_description,fil_filename,fil_affiche,fil_acteurs
		FROM film
		WHERE fil_id = :fil_id
		LIMIT 1
		';
		$pdoStatement = $pdo->prepare($sql);
		$pdoStatement->bindValue(':fil_id', $currentId, PDO::PARAM_INT);
		if ($pdoStatement->execute()) {
		$resList = $pdoStatement->fetch();
		$fil_titre = $resList['fil_titre'];
		$fil_annee = $resList['fil_annee'];
		$fil_synopsis = $resList['fil_synopsis'];
		$fil_description = $resList['fil_description'];
		$fil_filename = $resList['fil_filename'];
		$fil_affiche = $resList['fil_affiche'];
		$fil_acteurs = $resList['fil_acteurs'];
		//echo $fil_titre;
	}
};
	for ($i=1975; $i < 2017; $i++) { 
		echo '<option value='$i'></option>';
		}
		?>	
	<section>
		<form method="post" id="movieForm">
			<input type="text" name="fil_titre" type="text" placeholder="Titre ..." value="<?php echo $fil_titre; ?>"/>
			<p>Année
				<select name="fil_annee" value="">
					<option value=""><?php echo $fil_annee; ?></option>
					<option value="">choisissez</option>
					<option value="1990">1990</option>
					<option value="1995">1995</option>
					<option value="2000">2000</option>
					<option value="2005">2005</option>
					<option value="2010">2005</option>
					<option value="2015">2005</option>
					<option value="2016">2005</option>
				</select>  
			</p>
			<p>
				Description<textarea name="fil_synopsis"  maxlength="150" rows="6" cols="80"placeholder="Synopsis" value=""><?php echo $fil_synopsis; ?></textarea>
			</p>
			<p>
				Description<textarea name="fil_description" maxlength="150" rows="6" cols="80"placeholder="It as during a cold summer day that Billy swam up the lake ..."><?php echo $fil_description; ?></textarea>
			</p>
			<p>
				Fichier<input  type="text" name="fil_filename" placeholder="Fichier" value="<?php echo $fil_filename; ?>">
			</p>
			<p>
				Affiche<input type="text"name="fil_affiche" placeholder="Affiche" value="<?php echo $fil_affiche; ?>">
			</p>
			<p>
				Acteurs<input type="text" name="fil_acteurs"placeholder="Acteur/Actrices" value="<?php echo $fil_acteurs; ?>">
			</p>
			<p>
				<input type="submit" value="Valider">
			</p>
		</form>
	</section>
		
	
</body>
</html>