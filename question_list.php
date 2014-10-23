 <?php

	$numPerPage= 2;
	$page = 1;	

	if(!empty($_GET["page"])){
		$page = $_GET["page"];	
	}

	$direction = "DESC";
	if(!empty($_GET["dir"])){
		if($_GET["dir"]==="desc"){
			$direction = "DESC";
		}
	}
	$offset = ($page-1)*$numPerPage;

	$sql = "SELECT question.id,title,score,dateCreated,pseudo,tags,	content,vues 
			FROM question LEFT JOIN user ON question.user_id=user.id 
			ORDER BY question.id $direction LIMIT :offset,$numPerPage";
			//LEFT = Tout afficher

			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(":offset", ($page-1)*2, PDO::PARAM_INT);
			$stmt->execute();
			$questions = $stmt->fetchAll();

			//on recup le total des questions
			$sql = "SELECT COUNT(*) FROM question";
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$totalNumber = $stmt->fetchColumn();
			$totalPages = ceil($totalNumber / $numPerPage); //ceil arrondi 


?>

<section class="container topQuestion">
	<h2>Liste des Questions</h2>

	<?php foreach ($questions as $question){ $nbAnswers=nbRep($question['id']);?>
	<div class="topQuestionWrap">		
		<div class="clearboth colLeft">
			<ul class="compteurs">
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
				<?= $question['tags'];?>  
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

	<p>Affichage des questions <?php echo $offset+1; ?> à <?php echo $offset+$numPerPage; ?> sur <?php echo $totalNumber; ?><p>


	<?php if($page > 1 ) { ?>
		<a href="index.php?dir=<?php echo strtolower($direction); ?>&page=<?php echo $page - 1; ?>">Page precedente</a>
	<?php } ?>

	<?php if($page < $totalPages ) { ?>
		<a href="index.php?dir=<?php echo strtolower($direction); ?>&page=<?php echo $page + 1; ?>">Page suivante</a>
	<?php } ?>


</section>

