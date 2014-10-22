 <?php
	
	
	$sql = "SELECT question.id,title,score,dateCreated,name,tags,		content,vues FROM question
				JOIN user ON question.user_id=user.id 
				ORDER BY question.id DESC";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$questions = $stmt->fetchAll();
	
?>

<section class="container topQuestion">
	<h2>Liste des Questions</h2>

	<div class="topQuestionWrap">
		<?php foreach ($questions as $question){ ?>
			
		<div class="clearboth colLeft">
			<ul class="compteurs">
				<li><strong>0</strong> votes</li>
				<li><strong>0</strong> réponses</li>
				<li><strong><?= $question['vues'];?></strong> vues</li>
			</ul>
		</div>
		<div class="colRight question">
			<h3>
				<a href="detail_question.php?id=<?= $question['id'];?>"  class="lien_question" id="<?= $question['id'];?>" title=""><?php echo $question['title']; ?></a>
			</h3>

			<p><?php echo substr($question['content'],0,300)."..."; ?></p>

			<div class="tags">
				<a href="" id="tags" title="">   
					<?= $question['tags'];?>  
				</a>
			</div> 

			<div class="date_user">
				<ul>
					<li class="score"><?= $question['score'];?></a></li>
					<li><a href="detail_profil.php?id=<?= $question['id'];?>"  class="lien_user" title=""><?= $question['name'];?></a></li>
					<li><?= $question['dateCreated'];?></a></li>
				</ul>
			</div>
			
		</div>
		<?php } ?>
	</div>
</section>

