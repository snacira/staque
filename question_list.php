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

	$sql = "SELECT question.id,title,score,dateCreated,image,pseudo,tags,content,vues 
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
				<p><strong><?php echo $nbAnswers;?></strong> réponses</p>
				<p><strong><?= $question['vues'];?></strong> vues</p>
			</div>
		</div>
		<div class="colRight question">
			<a href="detail_question.php?id=<?= $question['id'];?>" class="lien_question" id="<?= $question['id'];?>" title="">
				<h3><?php echo $question['title']; ?></h3>
			</a>			

			<p><?php echo substr($question['content'],0,300)."..."; ?></p>
			<p class="date"><?= $question['dateCreated'];?></p>
			<?php if(!empty($question['tags'])){ ?>
				<div class="tags"><?= $question['tags'];?></div> 
			<?php } ?>
			<div class="clearboth"></div>	
		</div>
		<div class="clearboth"></div>
	</div>
	<?php } ?>

	<p><?php echo $offset+1; ?> à <?php echo $offset+$numPerPage; ?> sur <?php echo $totalNumber; ?><p>


	<?php if($page > 1 ) { ?>
		<a href="index.php?dir=<?php echo strtolower($direction); ?>&page=<?php echo $page - 1; ?>">Page precedente</a>
	<?php } ?>

	<?php if($page < $totalPages ) { ?>
		<a href="index.php?dir=<?php echo strtolower($direction); ?>&page=<?php echo $page + 1; ?>">Page suivante</a>
	<?php } ?>


</section>

