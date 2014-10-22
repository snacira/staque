 <?php
	
	
	$sql = "SELECT question.id,title,score,dateCreated,pseudo,tags,		content,vues FROM question
				JOIN user ON question.user_id=user.id 
				ORDER BY question.id DESC LIMIT 2";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$questions = $stmt->fetchAll();

?>

<section class="container topQuestion">
	<h2>Liste des Questions</h2>

	<?php foreach ($questions as $question){ $nbAnswers=nbRep($question['id']);?>
	<div class="topQuestionWrap">		
		<div class="clearboth colLeft">
			<ul class="compteurs">
				<li><strong>0</strong> votes</li>
				<li><strong><?php echo $nbAnswers;?></strong> réponses</li>
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

			<div class="user">
				<ul>
					<li class="score"><?= $question['score'];?></a></li>
					<li><a href="account.php?id=<?= $question['id'];?>"  class="lien_user" title=""><?= $question['pseudo'];?></a></li>
					<li><?= $question['dateCreated'];?></a></li>
				</ul>
			</div>			
		</div>
		<div class="clearboth"></div>
	</div>
	<?php } ?>

	<?php if ($page > 1){ ?>
	<a href="index.php?dir=<?php echo strtolower($direction); ?>&page=<?php echo $page - 1; ?>">Page précédente</a>
	<?php } ?>

	<?php if ($page < $totalPages){ ?>
	<a href="index.php?dir=<?php echo strtolower($direction); ?>&page=<?php echo $page + 1; ?>">Page suivante</a>
	<?php } ?>

</section>

