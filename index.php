<?php 
	$title = "Staque | Acceuil";
	session_start();

	//connexion à la base
	include("db.php");
	include("functions.php");

	include("inc/header.php");
	include("inc/nav.php");?>

<div id="presentation"><h1>Binvenue sur Staque</h1>
<p>Stack Overflow is a question and answer site for professional and enthusiast programmers. It's built and run by you as part of the Stack Exchange network of Q&A sites. With your help, we're working together to build a library of detailed answers to every question about programming.</p></div>

<?php	
	include("question_list.php");
	include("inc/footer.php");
?>


