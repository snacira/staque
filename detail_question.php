<?php
	$title = "Staque | Question ";
	session_start();
	include("db.php");
	include("functions.php");
	include("inc/header.php");
	include("inc/nav.php");

	$errors = array();
	if (!empty($_POST)){
		$mareponse = addanswer();
	}
	

	$id=$_GET['id'];

	$nbAnswers=nbRep($id);


	$sql = "SELECT question.id,title,score,dateCreated,pseudo,tags,content,vues,points,image FROM question
					LEFT JOIN user ON question.user_id=user.id 
					WHERE question.id=:id";

					
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(":id",$id);
	$stmt->execute();
	$question = $stmt->fetch();
	//print_r($question);


	$vues=$question['vues']+1;

	$sql = "UPDATE question
			SET vues=$vues
			WHERE id=:id";
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(":id",$id);
	$stmt->execute();


	$sql = "SELECT comment,comment.id FROM comment
			JOIN question ON questionOrAnswer_id=question.id 
			WHERE question.id=:id AND questionOrAnswer=0";
					
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(":id",$id);
	$stmt->execute();
	$commentsQ = $stmt->fetchAll();

	
	$sql = "SELECT answer.content, answer.user_id,pseudo, answer.dateCreated,image,answer.id FROM answer
					JOIN question ON question_id=question.id 
					LEFT JOIN user ON user.id=answer.user_id
					WHERE question.id=:id";

					
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(":id",$id);
	$stmt->execute();
	$answers = $stmt->fetchAll();
	//print_r($answers);	


?>

<section class="container">
	<div class="topQuestionWrap">
		<!-- QUESTION -->	
		<!-- colonne gauche -->
		<div class="clearboth colLeft user">

			<a href="account.php?id=<?= $question['id'];?>"  class="lien_user" title="Infos auteur">
				<div class="floatLeft"><img src="<?= $question['image'];?>" alt="">	</div>
				<div class="floatLeft">
					<h4><?= $question['pseudo'];?></h4>
					<p class="score"><?= $question['score'];?> Pt </p>
				</div>
				<div class="clearboth"></div>	
			</a>
			<div class="compteurs">
				<p><strong><?= $question['vues'];?></strong> vues</p>
			</div>
		</div>
		<!-- colonne droite -->
		<div class="colRight question">
			<h3><?php echo $question['title'];?></h3>

			<p><?php echo $question['content'];?></p>

			<p class="date"><?= $question['dateCreated'];?></p>
			<?php if(!empty($question['tags'])){ ?>
				<div class="tags"><?= $question['tags'];?></div> 
			<?php } ?>

			<!-- commentaires -->

				<!-- bouton commenter -->
			<a href="comment.php?id=<?php echo $id; ?>&q_a=<?php echo (0); ?>&id_q=<?php echo $id ?>" class="commentBtn">Commenter</a>
			

			<?php if(!empty($commentsQ)){ 			
					
				foreach ($commentsQ as $commentQ){ ?>
				<div id="commentaires" class="clearboth">
					<p class="commentText"><?php echo $commentQ['comment'];?></p>
				</div>			
			<?php }
			} ?>

		</div>
		<div class="clearboth"></div>
	</div>

		<!-- REPONSE -->	

		<!-- colonne gauche -->
	<h2 id="rep"><?php echo $nbAnswers;?> réponses</h2>
	<?php foreach ($answers as $answer){ ?>

	<div class="topQuestionWrap">
		<div class="clearboth colLeft user">
			<div id="voteQuestion">
				<a href="vote.php?type=moins&answerId=<?php echo $answer['id'];?>&id_q=<?php echo $id ?>"><span id="moins"></span></a>
				<span id="pointsQ"><?php echo $question['points'];?></span>
				<a href="vote.php?type=plus&answerId=<?php echo $answer['id'] ;?>&id_q=<?php echo $id ?>"><span id="plus"></span></a>
			</div>

			<a href="account.php?id=<?= $question['id'];?>"  class="lien_user" title="Infos auteur">
				<div class="floatLeft"><img src="<?= $answer['image'];?>" alt="">	</div>
				<div class="floatLeft">
					<h4><?= $answer['pseudo'];?></h4>
				</div>
				<div class="clearboth"></div>	
			</a>

		</div>
		<!-- colonne droite -->
		<div class="colRight question">

			<p><?php echo $answer['content'];?></p>

			<p class="date"><?= $answer['dateCreated'];?></p>

			<!-- commentaires -->
			<div class="contenuRep">
				<a href="comment.php?id=<?php echo $answer['id']; ?>&q_a=<?php echo (1); ?>&id_q=<?php echo $id ?>" class="commentBtn">Commenter</a>

	

				<?php 
					$sql = "SELECT comment FROM comment
								
								WHERE comment.questionOrAnswer_id=:id AND questionOrAnswer=1";

					$stmt = $dbh->prepare($sql);
					$stmt->bindValue(":id",$answer['id']);
					$stmt->execute();
					$commentsR = $stmt->fetchAll();	
					//print_r($commentsR);
					//die();
				
					if(!empty($commentsR)){ 	
					
						foreach ($commentsR as $commentR){ ?>
							<div id="commentaires" class="clearboth">
								<p><?php echo $commentR['comment'];?></p>
							</div>
					<?php }
					} ?>
				<div class="clearboth"></div>			
			</div>	
		</div>
		<div class="clearboth"></div>
					<?php } ?>

				<div id="votreReponse">
	</div>
<?php if(isset($_SESSION['user'])){ ?>
		

				
				<h4>Répondre</h4>
				<form method="POST">								
					<label class="questionarea">
						<textarea name="content" placeholder="Répondre a la question"></textarea>
					</label>					
					<label class="submit"><input type="submit" value="Envoyer votre réponse"></label>					
					<?php 
						if (!empty($errors)){
								echo '<ul class="errors">';
									foreach($errors as $error){
								echo '<li>'.$error.'</li>';
							}
							echo '</ul>';
						}

					?>
				</form>			
			</div>
		</div>

					

	<?php } else{ ?>
	

		<div class="deconnecter">
		<div id="errorLogin">
			<h3><a href="login.php">Connectez-vous</a> ou <a href="register.php">créez un compte</a> pour répondre a une question</h3>
		</div>
	

	<?php } ?>


	
		<a href="index.php" id="back">Retour</a>

	</div>

</section>

<?php
include("inc/footer.php");
?>




