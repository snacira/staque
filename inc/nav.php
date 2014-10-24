<?php


?>
<header>
	<div class="connexion">
		<a href="index.php" id="logo">
			<h1>Staque</h1>
			<!-- <img src="img/logo.png" alt="logo Staque.fr" width="67px" height="30px"> -->
		</a>
		<div id="login">

			<?php 

			if (userIsLogged()){
				
				echo "<a href='account.php?id=" . $_SESSION['user']["id"] ."' class='userAvatar'><span><img src='" . $_SESSION['user']['image']."' class='avatar' width='30px' height='30px' /></span>";

				echo "<a href='account.php?id=" . $_SESSION['user']["id"] ."' class='userLogged'><span>" . $_SESSION['user']['pseudo'] . "</span>";

				echo '<a href="logout.php" title="Logout !" class="logout" id="logout">Logout</a>';
			}
			else {
			?>
				<a href="login.php" title="Login" class="login"> Se connecter </a> 
				<a href="register.php" title="signUp" class="register"> S'inscrire </a>
			<?php } ?>
		</div>
	</div>
	<nav class="navigation">
		<div class="liens">
			<a href="question_form.php" class="addQuestionBtn">Poser une question</a>
			<a href="profil_list.php">Utilisateurs</a>
			<a href="">Mots-clé</a>	
		</div>

		<div id="recherche">
			<div class="icon"></div>
			<form action="recherche.php" id="recherche_form" method="POST" novalidate>
			<input type="search" name="search" value="" placeholder="Recherche">
			</form>	
		</div>
	</nav>
</header>