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
?>

<div class="container">
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
</div>