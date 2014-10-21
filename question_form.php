<?php 
	
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
				<input class="intext" type="text" name="title" placeholder="Entré votre titre" value="<?php if (!empty($_POST['title'])){ echo $_POST['title'] ;}?>">
			</label>
			
			<label class="questionarea">
				<textarea name="content" placeholder="Poser votre question"><?php if (!empty($_POST['content'])){ echo $_POST['content'] ;}?></textarea>
			</label>
			
			<label id="tags">Mots-clé
				<input class="intext" type="text"placeholder="Choisiez vos mots clé">
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
			
			<label class="submit"><input type="submit" value="Posser la question"></label>
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