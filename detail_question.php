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

	$sql = "SELECT question.id,title,score,dateCreated,pseudo,tags,content,vues,	points,image FROM question
			JOIN user ON question.user_id=user.id 
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
			JOIN user ON user.id=answer.user_id
			WHERE question.id=:id";
					
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(":id",$id);
	$stmt->execute();
	$answers = $stmt->fetchAll();
	//print_r($answers);	


?>

<section class="container">
	<div id="voteQ">
		<div id="plus">
			<span>+</span>
		</div>
		<div id="pointsQ">
			<span><?php echo $question['points'];?></span>
		</div>
		<div id="moins">
		 	<span>-</span>
		</div>		
	</div>

	<div id="statsQ">
		<p>Posée le : <?= $question['dateCreated'];?></p>
		<p>Vue :<?= $question['vues']+1;?> fois</p>
	</div>

	<div id="Q">
		<h3><?php echo $question['title'];?></h3>

		<p><?php echo $question['content'];?></p>
		<p><?php echo $question['tags'];?></p>

		<p> Auteur : <a href="account.php?id=<?= $question['id'];?>"  class="lien_user" title=""><?= $question['pseudo'];?></a></p>
		<p><?php echo $question['score'];?></p>
		<img src="img/<?php echo $question['image'];?>"/>
		<p> Le <?php echo $question['dateCreated'];?></p>

		<a href="comment.php?id=<?php echo $id; ?>&q_a=<?php echo (0);?>">Commenter la question</a>
		<p id="com">Commentaires de la question</p>
		<?php foreach ($commentsQ as $commentQ){ ?>
			<p><?php echo $commentQ['comment'];?></p>
		<?php } ?>

		<p id="rep"><?php echo $nbAnswers;?> réponses</p>

		
		<?php foreach ($answers as $answer){ ?>
		<div id="reponses">
			<div class="voteR">
				<div class="plus">
					<span>+</span>
				</div>
				<div class="pointsR">
					<span>0</span>
				</div>
				<div class="moins">
				 	<span>-</span>
				</div>
			</div>		
			<div class="contenuRep">
				<p><?php echo $answer['content'];?></p>
				<p><?php echo $answer['pseudo'];?></p>
				<p><?php echo $answer['dateCreated'];?></p>
				<a href="comment.php?id=<?php echo $id; ?>&q_a=<?php echo (1); ?>">Commenter la réponse</a>

				<p>Commentaires de la réponse</p>	

				<?php 
				$sql = "SELECT comment FROM comment
							
							WHERE comment.questionOrAnswer_id=:id AND questionOrAnswer=1";

				$stmt = $dbh->prepare($sql);
				$stmt->bindValue(":id",$answer['id']);
				$stmt->execute();
				$commentsR = $stmt->fetchAll();	
				//print_r($commentsR);
				//die();

					foreach ($commentsR	as $commentR) { ?>
						<p><?php echo $commentR['comment'];?></p>
					<?php }?>	



							
							</div>	
				<?php } ?>
			<div id="votreReponse">
				
				<p>Votre réponse</p>
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
	
		<a href="index.php" id="back">back</a>

	</div>

</section>

<?php
include("inc/footer.php");
?>




