<?php 
require'inc/config.php';
if (isset($_GET['page'])) {
	$currentPage = intval($_GET['page']);

	$offsetPage =($currentPage-1)*4;
;
$sql= 'SELECT fil_titre, fil_affiche, fil_id, fil annee, fil_synopsis
	FROM film
	ORDER BY fil_id DESC LIMIT 4';

$pdoStatement = $pdo->query($sql);

if ($pdoStatement && $pdoStatement->rowcount()>0) {
	$filmList = $pdoStatement-> fetchAll();
}
$pagetitle='Catalogue';
?>

<?php require 'html/header.php'; ?>

 <section class="pagination">
 <a href="&lt; précédent"></a> 
  </section>
<section class="filmList">
	<?php 
		if (isset($filmList)&&sizeof($filmList)>0) {
			foreach ($filmList as $currentFilmInfos) {?>
				<article>
					<img src="<?php echo $filmList['fil_affiche'];?>" border="0">
					<div class="titre"> 
					<?php echo $currentFilmInfos['fil_id']; ?> &nbsp;
					<?php echo $currentFilmInfos['fil_titre'];?>
					</div>
					<div class="synopsis"> 
						<?php echo $currentFilmInfos['fil_synopsis'];?>
					</div>
					<div class="actions">
							<a href="details.php?id=<?php echo $currentFilmInfos['fil_id'];?>">details</a>
							<a href="form_film.php?id=<?php echo $currentFilmInfos['fil_id'];?>">modifier</a>
					 </div>
				</article>
	<?php 
			};
		};
		
		?>
	</section> 

<?php require 'html/footer.php' ; ?>