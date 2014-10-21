<?php
	session_start();

	include("db.php");
	include("functions.php");

	$mesInfosPerso = infosPerso($_SESSION['user']['id']);

/*	echo "<pre>";
print_r ($mesInfosPerso);*/


include("inc/header.php");
include("inc/nav.php");

?>

<section class="container">

	<div id="account">
		<img src="img/<?php echo $mesInfosPerso["image"]; ?>" alt="avatar" width="90" height="90">

		<br>
		<div id="infos">
			<p class="login"><span>Pseudo : </span><span><?php echo $mesInfosPerso["pseudo"]; ?></span></p>

			<p class="login"><span>Nom : </span><span><?php echo $mesInfosPerso["name"]; ?></span></p>


			<p class="login"><span>Mail : </span><span><?php echo $mesInfosPerso["mail"]; ?></span></p>

			<!-- <p class="login"><span>Mot de passe :</span><span><?php echo $mesInfosPerso["password"]; ?></span></p> -->

			<br>
			<p class="perso"><span>Date de naissance : </span><span><?php echo $mesInfosPerso["birthday"]; ?></span></p>

			<p class="perso"><span>Métier : </span><span><?php echo $mesInfosPerso["job"]; ?></span></p>

			<p class="perso"><span>Pays : </span><span><?php echo $mesInfosPerso["location"]; ?></span></p>

			<p class="perso"><span>Langue : </span><span><?php echo $mesInfosPerso["lang"]; ?></span></p>

			<p class="perso"><span>Sites : </span><span><?php echo $mesInfosPerso["websites"]; ?></span></p>

			<br>
			<p class="activity"><span>Score : </span><span><?php echo $mesInfosPerso["score"]; ?></span></p>
			<p class="activity"><span>Votes : </span><span><?php echo $mesInfosPerso["vote"]; ?></span></p>
		</div>
		<div class=""><a href="edit_profil.php" title="Editer">Modifier</a></div>
	</div>


</section>

<?php include("inc/footer.php"); ?>