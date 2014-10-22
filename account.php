<?php
	$title = "Staque | Profil ";
	session_start();

	include("db.php");
	include("functions.php");

	$mesInfosPerso = infosPerso($_GET['id']);

/*	echo "<pre>";
print_r ($mesInfosPerso);*/
	$avatarDefault = "perso10.jpg";

include("inc/header.php");
include("inc/nav.php");

?>

<section class="container">

	<div id="account">
		<?php if(empty($mesInfosPerso["image"])) { ?>

			<img src="img/<?php echo $avatarDefault; ?>" alt="avatar" width="90" height="90">

		<?php } else { ?>

			<img src="img/<?php echo $mesInfosPerso["image"]; ?>" alt="avatar" width="90" height="90">

		<?php } ?>
		<br>
		<div id="infos">
			<p class="login"><span>Pseudo : </span><span><?php echo $mesInfosPerso["pseudo"]; ?></span></p>

			<!-- A afficher que si c'est mon compte -->
			<?php if($_SESSION['user']["id"] == $_GET["id"]){ ?>
				<p class="login"><span>Nom : </span><span><?php echo $mesInfosPerso["name"]; ?></span></p>

				<p class="login"><span>Mail : </span><span><?php echo $mesInfosPerso["mail"]; ?></span></p>
			<?php } ?>

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


			<p class="activity"><span>Inscrit le : </span><span><?php echo $mesInfosPerso["dateRegistred"]; ?></span></p>		

			<!-- <p class="activity"><span>Connecté le : </span><span><?php echo $mesInfosPerso["dateConnected"]; ?></span></p> -->

			<p class="activity"><span>Mis à jour le : </span><span><?php echo $mesInfosPerso["dateModified"]; ?></span></p>			
		</div>
		<br>
		<!-- A afficher que si c'est mon compte -->
		<?php if($_SESSION['user']["id"] == $_GET["id"]){ ?>
			<div class=""><a href="edit_profil.php" title="Editer">Modifier</a></div>
		<br><br>
			<div class="red"><a href="delete_profil.php" title="Supprimer">Supprimer mon profil</a></div>
		<?php } ?>
	</div>


</section>

<?php include("inc/footer.php"); ?>