<?php

?>
<header>
	<div class="connexion">
		<a href="index.php" id="logo">
			<img src="img/logo.png" alt="logo Staque.fr" width="67px" height="30px">
		</a>
		<div id="login">

			<?php 

			if (userIsLogged()){
				echo "Bonjour " . "<a href='account.php'>" . $_SESSION['user']['pseudo'] . " !" ;
				echo " - " . '<a href="logout.php" title="Logout !" id="logout">Logout</a>';
			}
			else {
			?>
				<a href="login.php" title="Login" class="login"> Connexion </a>|
				<a href="register.php" title="signUp" class="login"> Crée un compte </a>
			<?php } ?>
		</div>
	</div>
	<nav class="navigation">
		<div class="liens">
			<a href="question_form.php">Poser une question</a>
			<a href="profil_list.php">Utilisateurs</a>
			<a href="">Mots-clé</a>	
		</div>
		<div id="recherche">
			<div class="icon"></div>
			<input type="search" name="search" value="" placeholder="Recherche">	
		</div>
	</nav>
</header>