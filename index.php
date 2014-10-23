<?php 
	$title = "Staque | Acceuil";
	session_start();

	//connexion à la base
	include("db.php");
	include("functions.php");

	include("inc/header.php");
	include("inc/nav.php");?>

<div id="presentation">
	<h2>Bienvenue sur Staque</h2>
	<h3>< All you need is CODE /></h3>
	<p>Staque est un site de questions et réponses pour les programmeurs professionnels et amateurs. Il est construit et géré par vous dans le cadre du réseau de la pile d'échange des sites de Questions &amp; Réponses.</p>
	<p>Avec votre aide, nous allons travailler ensemble pour construire une bibliothèque de réponses détaillées à toutes les questions sur la programmation.</p>
</div>

<?php	
	include("question_list.php");
	include("inc/footer.php");
?>


