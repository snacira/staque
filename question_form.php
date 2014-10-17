<?php 
	include("inc/header.php");
	include("inc/nav.php"); ?>

<h1>Poser une question</h1>

<form method="post">
		<p><input type="text" placeholder="Entré votre titre"></p>
		<p><textarea name="question"placeholder="Poser votre question"></textarea></p>
		<p><input type="text"placeholder="Choisiez vos mots clé"></p>
		<p><input type="submit"></p>
</form>

<? include("inc/footer.php");?>