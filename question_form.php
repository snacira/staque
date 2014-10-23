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

	<?php if(isset($_SESSION['user'])){ ?>
	
	<div class="connecter">
		<h2>Poser une question</h2>
		
		<form id="formulairedequestion" method="POST">
				<label>Titre
					<input class="intext" type="text" name="title" placeholder="Entrez votre titre" value="<?php if (!empty($_POST['title'])){ echo $_POST['title'] ;}?>">
				</label>
				
				<label class="questionarea">
					<textarea name="content" placeholder="Poser votre question"><?php if (!empty($_POST['content'])){ echo $_POST['content'] ;}?></textarea>
				</label>
				
				<label id="tags">Mots-clés
					<input id="autocompletion" class="intext" type="text"placeholder="Choisissez vos mots-clés" name="tags">
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
	</div> <?php } 
			else{ ?>

	<div class="deconnecter">
		<div id="errorLogin">
			<h3><a href="login.php">Connectez-vous</a> ou <a href="register.php">créez un compte</a> pour poser une question</h3>
		</div>
	</div> <?php } ?>


</section>



<?php include("inc/footer.php");?>