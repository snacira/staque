<?php 
	$title = "Staque | Poser une question ";
	session_start();

	include("db.php");
	include("functions.php");

	$errors = array();
	if (!empty($_POST)){
		$maquestion = addquestion();
	}

	include("inc/header.php");
	include("inc/nav.php"); 
	?>

<section class="container">

	<h1>Poser une question</h1>
	
	<form id="formulairedequestion" method="POST">
			<label>Titre
				<input class="intext" type="text" name="title" placeholder="Entrez votre titre" value="<?php if (!empty($_POST['title'])){ echo $_POST['title'] ;}?>">
			</label>
			
			<label class="questionarea">
				<textarea name="content" placeholder="Poser votre question"><?php if (!empty($_POST['content'])){ echo $_POST['content'] ;}?></textarea>
			</label>
			
			<label id="tags">Mots-clés
				<input class="intext" type="text"placeholder="Choisissez vos mots-clés">
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
			
			<label class="submit"><input type="submit" value="Poser la question"></label>
	</form>

</section>

<?php


$sql = "SELECT * FROM question ORDER BY dateCreated DESC LIMIT 1";
$sth = $dbh->prepare($sql);
$sth->execute();



$questions = $sth->fetchAll();
foreach($questions as $question){
	echo 
		"<div class='Question'>" .
			"<h3 class='titreQuestion'>" . 
				$question["title"] . 
			"</h3>" .
			"<div class='contenueQuestion'>" 
				. $question["content"] . 
			"</div>" .
		"</div>";
}

		?>

<?php include("inc/footer.php");?>