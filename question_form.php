<?php 
	include("inc/header.php");
	include("inc/nav.php"); ?>

<section class="container">
	

	<h1>Poser une question</h1>

	<form method="post">
		<div class="field_container">
			<input type="text" placeholder="Entrez votre titre">
		</div>


			<p><textarea name="question"placeholder="Poser votre question"></textarea></p>
			<p><input type="text"placeholder="Choisiez vos mots clé"></p>
			<p><input type="submit"></p>
	</form>

</section>
<? include("inc/footer.php");?>