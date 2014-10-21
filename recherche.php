 <?php
 	session_start();

 	include("db.php");
 	include("functions.php");
	include("inc/header.php");
	include("inc/nav.php");

	$recherche="";

	if (!empty ($_POST)){
		$recherche=strip_tags($_POST['search']);
	}
	
	echo"Votre recherche :"." ".($recherche);

	echo"<br/>";


	$sql = "SELECT title,question.id FROM question
				
				WHERE tags LIKE '%$recherche%'";
				
			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$questions_tag = $stmt->fetchAll();
			//print_r($questions_tag);
			
?>

<section class="container">

	<?php foreach($questions_tag as $question_tag){ ?>
		<h3>
			<a href="detail_question.php?id=<?= $question_tag['id'];?>"   id="lien_question" title=""><?php echo $question_tag['title']; ?></a>
		</h3>
	<?php } ?>

	<a href="index.php" id="back">back</a>

</section>

<?php
include("inc/footer.php");
?>