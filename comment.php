<?php 
	session_start();
	include("db.php");
	include("functions.php");

	$errors = array();
	if (!empty($_POST)){
		$moncommentaire = addcomment();
	}

	include("inc/header.php");
	include("inc/footer.php"); 

	$id = $_GET['id'];
	$idQ = $_GET['id_q'];
?>

<div class="container">
	
	<?php if(isset($_SESSION['user'])){ ?>
	
	<form method="POST">
				
				<label>
					<textarea name="comment" placeholder="ecriver une réponse">
					</textarea>
				</label>
				
				<label class="submit"><input type="submit" value="valider la réponse"></label>

				<?php 
		if (!empty($errors)){
			echo '<ul class="errors">';
			foreach($errors as $error){
				echo '<li>'.$error.'</li>';
			}
			echo '</ul>';
		}
	?>
	</form>

	<?php } else{ ?>

	<div class="deconnecter">
		<div id="errorLogin">
			<h3><a href="login.php">Connectez-vous</a> ou <a href="register.php">créez un compte</a> pour ajouter un commentaire</h3>
	</div>

	<?php } ?>

	<a href="detail_question.php?id=<?php echo $idQ ?>" id="back">back</a>

</div>