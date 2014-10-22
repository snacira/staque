 <?php
	
	
	$sql = "SELECT question.id,title,score,dateCreated,pseudo,tags,		content,vues FROM question
				JOIN user ON question.user_id=user.id 
				ORDER BY question.id DESC";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$questions = $stmt->fetchAll();
	
?>

<section class="container">

	<div class="qWrap">
		<h3 id="listeQ">Liste des Questions</h3>

		<?php
			foreach ($questions as $question){ ?>
			
		<div class="gauche">

			<div class="votes">	
				<div class="compteur_votes">
					<span>0</span>
				</div>
				<p>votes</p>
			</div>

			<div class="reponses">
				<div class="compteur_reponses">
					<span>0</span>
				</div>
				<p>réponses</p>
			</div>
			<div class="vues">
				<div  class="compteur_vues">
					<span><?= $question['vues'];?></span>
				</div>
				<p>vues</p>
			</div>

		</div>
		<div class="question">
		
			<h3>
				<a href="detail_question.php?id=<?= $question['id'];?>"  class="lien_question" id="<?= $question['id'];?>" title=""><?php echo $question['title']; ?></a>
			</h3>

			<?php echo substr($question['content'],0,300)."..."; ?>

			<div class="tags">
				<a href="" id="tags" title="">   
					<?= $question['tags'];?>  
				</a>
			</div> 

			<div class="date_user">
				<ul>
					<li class="score"><?= $question['score'];?></a></li>
					<li><a href="account.php?id=<?= $question['id'];?>"  class="lien_user" title=""><?= $question['pseudo'];?></a></li>
					<li><?= $question['dateCreated'];?></a></li>
				</ul>
			</div>
			
		</div>
		<?php } ?>
	</div>
</section>

