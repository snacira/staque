<form action="register.php" id="register_form" method="POST" novalidate>

	<!-- peut servir pour détecter facilement QUEL formulaire a été soumis -->
	<input type="hidden" name="form_name" value="register_form" />

	<h3>INSCRIPTION</h3>

	<div class="field_container">
		<input type="email" placeholder="Email" id="mail" name="mail" value="<?php if(isset($_GET["email"])) {
					echo $mail;
			 		} ?>" 
		/>
	</div>

	<div class="field_container">
		<input type="text" id="name" name="name" value="<?php echo $name; ?>" placeholder="Nom"/>

	</div>
	<div class="field_container">
		<input type="text" id="pseudo" name="pseudo" value="<?php echo $pseudo; ?>" placeholder="Pseudo"/>

	</div>

	<div class="field_container">
		<input type="password" id="password" name="password" value="<?php echo $password; ?>" placeholder="Mot de passe (7 caractères min)" />
	</div>

	<div class="field_container">
		<input type="password" id="password_bis" name="password_bis" value="<?php echo $password_bis; ?>" placeholder="Again" />
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
</form>