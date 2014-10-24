<?php
	$title = "Staque | Profil ";
	session_start();

	include("db.php");
	include("functions.php");

	$mesInfosPerso = infosPerso($_GET['id']);
	$myQuestions = addQuestionHistory($_GET['id']);
	$myAnswers = addAnswerHistory($_GET['id']);
	//$bestAnswers = chooseBestAnswer($_GET['id']);

	//VOTER POUR LA MEILLEURE REPONSE	

/*	echo "<pre>";
	print_r ($_POST);
	echo "</pre>";*/

	$best_answer 	= false;	
	$id 			= "";	

	if (!empty($_POST)){

		$best_answer 	= $_POST['bestAnswer']; //name dans l'input
		
		$sql = "UPDATE answer 
				SET best_answer = :best_answer
				WHERE id = :id";

		//tjr mettre un where apres un update pour ne pas mettre à jour toute la table
		$stmt = $dbh->prepare($sql);						
		$stmt->bindValue(":id", $id);
		$stmt->bindValue(":best_answer", $best_answer);
		$bestAnswer = $stmt->execute();

		echo $bestAnswer["content"];

/*		$sql = "SELECT content FROM answer
				WHERE content = :content, $bestAnswer = 1";
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":content", $content);
		//$stmt->bindValue(":best_answer", $best_answer);
		$stmt->execute();

		echo $bestAnswer["content"];*/
	}



	$profils = getProfilList();
	$avatarDefault = "img/perso10.jpg";

include("inc/header.php");
include("inc/nav.php");

?>

<section class="container">

	<div id="account">

	<?php if(empty($profils)) { ?>

		<h2>Ce profil n'existe plus !</h2>
		<img src="<?php echo $avatarDefault; ?>" alt="avatar" width="120" height="120">

	<?php } else {?>

		<h2 class="login"><?php echo $mesInfosPerso["pseudo"]; ?></h2>

		<!-- A afficher que si c'est mon compte -->
		<?php if($_SESSION['user']["id"] == $_GET["id"]){ ?>
		<div class="boutonsCompte">
			<a href="edit_profil.php" title="Modifier mon compte" class="edit">Modifier</a>
			<a href="delete_profil.php" title="Supprimer" class="delete">Supprimer mon profil</a>
		</div>
		<?php } ?>




		<div class="clearboth colLeft avatar">
			<img src="<?php echo $mesInfosPerso["image"]; ?>" class="avatar" alt="avatar" width="120" height="120">
		</div>
	

		<div id="infos">
			

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
		</div>

	</div>
	<div id="account">
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

					<!-- VOTER POUR LA MEILLEURE REPONSE -->
					<form method="POST" class="bestRep">
						<?php foreach ($myAnswersQuestions as $myAnswersQuestion) { ?>
						<label for="bestAnswer">

							<input type="checkbox" name="bestAnswer" class="floatLeft" value="<?php echo $myAnswersQuestion['id'];  ?>">
							<span  class="floatLeft"><?php echo $myAnswersQuestion['content']; ?></span>
						</label>
						<?php } 

						if(!empty($myAnswersQuestions)){?>
							<input type="submit" name="" value="Valider">
						<?php } ?>
					</form>
					<!-- <p>La meilleure réponse : <?php echo $bestAnswer["content"]; ?></p> -->
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

		<?php }  ?>

	</div>


</section>

<?php include("inc/footer.php"); ?>