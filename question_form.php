<?php 
	
	session_start();

	include("db.php");
	include("functions.php");

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
				<input class="intext" type="text" name="title" placeholder="Entré votre titre">
			</label>
			
			<label class="questionarea">
				<textarea name="content" placeholder="Poser votre question"></textarea>
			</label>
			
			<label id="tags">Mots-clé
				<input class="intext" type="text"placeholder="Choisiez vos mots clé">
			</label>
			
			<label class="submit"><input type="submit"></label>
	</form>

</section>

<?php


$sql = "SELECT * FROM question";
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