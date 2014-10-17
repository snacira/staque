<form name="yo" action="login.php" id="login_form" method="POST" novalidate>

	<!-- peut servir pour détecter facilement QUEL formulaire a été soumis -->
	<input type="hidden" name="forn_name" value="login_form" />

	<h3>SIGN IN !</h3>

	<div class="field_container">
		<label for="username">Username</label>
		<input type="text" id="username" name="username" value="<?php echo $username; ?>" />
	</div>

	<div class="field_container">
		<label for="password">Password</label>
		<input type="password" id="password" name="password" value="<?php echo $password; ?>" />
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
	<input type="submit" value="SIGN IN !" />
</form>
<a href="password_reset_1.php" title="Forgot your password ?">Forgot your password ?</a>