<?php
	$title = "Staque | Profil ";
	session_start();

	include("db.php");
	include("functions.php");

	$mesInfosPerso = infosPerso($_GET['id']);
	$myQuestions = addQuestionHistory($_GET['id']);
	$myAnswers = addAnswerHistory($_GET['id']);


/*	echo "<pre>";
	print_r ($myAnswersQuestions);
	echo "</pre>";*/

	/*Ajout de points*/

/*	$voter = $_POST["voter"];

	echo "<pre>";
	print_r ($_POST);
	echo "</pre>";

	//je recup l'id du user
	$user = $_GET['id'];

	$sql = "SELECT score FROM user
			WHERE id = $user";

	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$score = $stmt->fetchColumn();

	$addpoint = $score +20;

	$sql = "UPDATE user SET score = $addpoint";	
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(":voter", $voter);
	$stmt->execute();*/


	$avatarDefault = "perso10.jpg";

include("inc/header.php");
include("inc/nav.php");

?>

<section class="container">

	<div id="account">


			<img src="<?php echo $mesInfosPerso["image"]; ?>" class="bxsliderAvatar" alt="avatar" width="90" height="90">

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

			<p class="activity"><span>Inscrit le : </span><span><?php echo $mesInfosPerso["dateRegistred"]; ?></span></p>		

			<!-- <p class="activity"><span>Connecté le : </span><span><?php echo $mesInfosPerso["dateConnected"]; ?></span></p> -->

			<p class="activity"><span>Mis à jour le : </span><span><?php echo $mesInfosPerso["dateModified"]; ?></span></p>		

			<h2>Mon historique</h2>
				<h3>Mes questions</h3>

				<?php if(!empty($myQuestions)){

				foreach ($myQuestions as $myQuestion) { ?>
				<div class="maQuestion">
					<p>Id question : <?php echo $myQuestion["id"]; ?></p>	
					<p><a href="detail_question.php?id=<?php echo $myQuestion['id']; ?>" title="ma question"><?php echo $myQuestion['title']; ?></a></p>
				</div>	
					<p>*** Les réponses :</p>
					<?php 
					//appel de la fonction 
					$myAnswersQuestions = addAnswerOfQuestionHistory($myQuestion["id"]);

					?>
						<form method="POST">
							<?php foreach ($myAnswersQuestions as $myAnswersQuestion) { ?>
							<label for="voter">
								<input type="radio" name="voter" value="<?php echo $myAnswersQuestion['id'];  ?>">
								<span><?php echo $myAnswersQuestion['content']; ?></span>
							</label>
							<?php } ?>
							<input type="submit" name="" value="Valider">
						</form>

				<br>
				<?php } 
				}else {?>

					<p>Vous n'avez pas encore de questions</p>

				<?php } ?>

				<h3>Mes réponses</h3>


				<?php if(!empty($myAnswers)){

				foreach ($myAnswers as $myAnswer) { ?>
				<div class="maQuestion">
					<p>Id question : <?php echo $myAnswer["id"]; ?></p>			
					<p><a href="detail_question.php?id=<?php echo $myAnswer['id']; ?>" title="ma question"><?php echo $myAnswer['content']; ?></a></p>
					<p class="activity"><span>Votes : </span><span><?php echo $mesInfosPerso["vote"]; ?></span></p>	
				</div>	
				<br>
				<?php } 
				}else {?>

					<p>Vous n'avez pas encore de réponses</p>

				<?php } ?>


		</div>
		<br>
		<!-- A afficher que si c'est mon compte -->
		<?php if($_SESSION['user']["id"] == $_GET["id"]){ ?>
		<div>
			<a href="edit_profil.php" title="Modifier mon compte" class="edit">Modifier</a>
			<a href="delete_profil.php" title="Supprimer" class="delete">Supprimer mon profil</a>
		</div>
		<?php } ?>

	</div>


</section>

<?php include("inc/footer.php"); ?>