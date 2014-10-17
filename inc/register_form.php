<form action="register.php" id="register_form" method="POST" novalidate>

	<!-- peut servir pour détecter facilement QUEL formulaire a été soumis -->
	<input type="hidden" name="forn_name" value="register_form" />

	<h3>SIGN UP !</h3>

	<div class="field_container">
		<label for="email">Email</label>
		<input type="email" id="email" name="email" value="<?php echo $email; ?>" />
	</div>

	<div class="field_container">
		<label for="username">Username</label>
		<input type="text" id="username" name="username" value="<?php echo $username; ?>" />
	</div>

	<div class="field_container">
		<label for="password">Password</label>
		<input type="password" id="password" name="password" value="<?php echo $password; ?>" />
	</div>

	<div class="field_container">
		<label for="password_bis">Again</label>
		<input type="password" id="password_bis" name="password_bis" value="<?php echo $password_bis; ?>" />
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
	<input type="submit" value="SIGN UP !" />
</form>