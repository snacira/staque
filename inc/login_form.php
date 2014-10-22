<form name="yo" action="login.php" id="login_form" method="POST" novalidate>

		<!-- peut servir pour détecter facilement QUEL formulaire a été soumis -->
		<input type="hidden" name="form_name" value="login_form" />

		<h3>SIGN IN !</h3>

		<div class="field_container">
			<input type="text" id="pseudo" name="pseudo" value="<?php echo $pseudo; ?>" placeholder="Pseudo" />
		</div>

		<div class="field_container">
			<input type="password" id="password" name="password" value="<?php echo $password; ?>" placeholder="Mot de passe" />
		</div>

		<?php 
			if (!empty($errors)){
				echo '<ul class="errors">';
				foreach($errors as $error){
					echo '<li>'.$error.'</li>';
				}
				echo '</ul>';
			}
		?>
		<input type="submit" value="Valider" />
		<div class="field_container">
			<a href="password_reset_1.php" title="Mot de passe oublié ?" class="forgotPswd">Mot de passe oublié ?</a>	
		</div>

	</form>