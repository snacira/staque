<?php
	$title = "Staque | Question ";
	session_start();
	include("db.php");
	include("functions.php");
	include("inc/header.php");
	include("inc/nav.php");
	

	$id=$_GET['id'];
	$sql = "SELECT question.id,title,score,dateCreated,pseudo,tags,content,vues,points FROM question
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


	$sql = "SELECT comment FROM comment
					JOIN question ON questionOrAnswer_id=question.id 
					WHERE question.id=:id";
					
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue(":id",$id);
				$stmt->execute();
				$comments = $stmt->fetchAll();

	$sql = "SELECT answer.content, answer.user_id,pseudo, answer.dateCreated FROM answer
					JOIN question ON question_id=question.id 
					JOIN user ON user.id=answer.user_id
					WHERE question.id=:id";
					
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue(":id",$id);
				$stmt->execute();
				$answers = $stmt->fetchAll();
				//print_r($answers);	

	$sql = "SELECT COUNT(*) FROM answer
					JOIN question ON question_id=question.id 
					WHERE question.id=:id";
					
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue(":id",$id);
				$stmt->execute();
				$nbAnswers = $stmt->fetchColumn();
				//print_r($nbAnswers);	






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
		<p> Le <?php echo $question['dateCreated'];?></p>

		<a href="comment.php?id=<?php echo $id; ?>">Commenter la question</a>
		<p id="com">Commentaires de la question</p>
		<?php foreach ($comments as $comment){ ?>
		<p><?php echo $comment['comment'];?></p>
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
		
		<div class="contenuRep">
			<p><?php echo $answer['content'];?></p>
			<p><?php echo $answer['pseudo'];?></p>
			<p><?php echo $answer['dateCreated'];?></p>
		</div>	
			<?php } ?>
		<div id="votreReponse">
			<p>Votre réponse</p>
			<form id="formulairederuestion" method="POST">
			
			
			<label class="questionarea">
				<textarea name="content" placeholder="Poser votre question"><?php if (!empty($_POST['content'])){ echo $_POST['content'] ;}?></textarea>
			</label>
			
			

			<?php 
		if (!empty($errors)){
			echo '<ul class="errors">';
			foreach($errors as $error){
				echo '<li>'.$error.'</li>';
			}
			echo '</ul>';
		}
	?>
			
			<label class="submit"><input type="submit" value="Envoyer votre réponse"></label>
	</form>
		</div>

	</div>
	
	<a href="index.php" id="back">back</a>



</section>

<?php
include("inc/footer.php");
?>




