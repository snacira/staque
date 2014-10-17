<?php

	session_start();
	include("db.php");
	include("functions.php");
	
	if (empty($_GET['id'])){
		die("404");
	}

	//enlève l'id des paramètres d'url pour le lien de retour
	//sinon, celui-ci persiste de page en page
	//on aurait peut-être dû utiliser les sessions pour conserver en mémoire les paramètres de filtres
	$backLinkParams = $_SERVER['QUERY_STRING'];
	$backLinkParams = preg_replace("#id=[0-9]+&#", "", $backLinkParams);

	$movie = getMovieById( $_GET['id'] );

?>
<?php include("inc/top.php"); ?>
<div class="container">

	<div class="left_col">
		<img src="posters/<?= $movie['id'] ?>.jpg" alt="<?= $movie['title']; ?>" />

		<div id="rating_container">
			<div id="rating" style="width: <?= $movie['rating']*2; ?>px"></div>
		</div>
		<?= $movie['rating']; ?>%

		<div>
		<a href="index.php?<?php echo $backLinkParams ?>">Back</a>
		</div>
		<?php if (userIsLogged()): ?>
			<div>
			<a href="save_movie.php?id=<?php echo $movie['id']; ?>" title="Add to my favorites">ADD THIS MOVIE !</a>
			</div>
		<?php endif; ?>
	</div>

	<div class="right_col">
		<h1><?= $movie['title']; ?> (<?= $movie['year']; ?>)</h1>
		<h2>Plot</h2>
		<p><?= $movie['plot']; ?></p>
		<h2>Directors</h2>
		<p><?= $movie['directors']; ?></p>
		<h2>Writers</h2>
		<p><?= $movie['writers']; ?></p>
		<h2>Starring</h2>
		<p><?= $movie['cast']; ?></p>
		<h2>Genres</h2>
		<p><?= $movie['genres']; ?></p>
	</div>

</div>

<?php include("inc/bottom.php"); ?>
