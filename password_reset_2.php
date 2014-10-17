<?php

	session_start();

	include("db.php");
	include("functions.php");

	$email = "";
	if (!empty($_GET['email'])){
		$email = $_GET['email'];
	}		
	$token = "";
	if (!empty($_GET['token'])){
		$token = $_GET['token'];
	}

	if ($token && $email){
		//vérifier que les données dans l'url sont valides
		$sql = "SELECT * FROM users
				WHERE email = :email AND token = :token";
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":email", $email);
		$stmt->bindValue(":token", $token);
		$stmt->execute();
		$foundUser = $stmt->fetch();
	}

	if (empty($foundUser)){
		die("oops");
	}

	//déclaration des variables du formulaire
	$password 		= "";
	$password_bis 	= "";

	$errors = array();

	//formulaire soumis ?
	if (!empty($_POST)){

		$password 		= $_POST["password"];
		$email 		= $_POST["email"];
		$token 		= $_POST["token"];
		$password_bis 	= $_POST['password_bis'];


		//password
		if (empty($password)){
			$errors[] = "Please choose a password !";
		}
		elseif (empty($password_bis)){
			$errors[] = "Please confirm your password !";
		}
		elseif ($password_bis != $password){
			$errors[] = "Your passwords do not match !";
		}
		elseif (strlen($password) < 7){
			$errors[] = "Your password should have at least 7 characters !";
		}

		if (empty($errors)){
			
			$sql = "UPDATE users 
					SET password = :password,
						dateModified = NOW()
					WHERE email = :email 
					AND token = :token";

			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(":password", hashPassword($password, $foundUser['salt']));
			$stmt->bindValue(":email", $email);
			$stmt->bindValue(":token", $token);
			if ($stmt->execute()){
				$sql = "UPDATE users 
						SET token = :token,
							dateModified = NOW()
						WHERE email = :email";

				$stmt = $dbh->prepare($sql);
				$stmt->bindValue(":token", randomString());
				$stmt->bindValue(":email", $email);
				if ($stmt->execute()){
					//log the user automatically
					$_SESSION['user'] = $foundUser;
					header("Location: index.php");
					die();
				}
			}
		}
	}

	include("inc/top.php");
?>
<div class="container">
<form name="yo" action="password_reset_2.php?<?php echo $_SERVER['QUERY_STRING']; ?>" id="password_reset_2" method="POST" novalidate>

	<!-- peut servir pour détecter facilement QUEL formulaire a été soumis -->
	<input type="hidden" name="forn_name" value="password_reset_2" />
	<input type="hidden" name="token" value="<?= $token ?>" />
	<input type="hidden" name="email" value="<?= $email ?>" />

	<h3>FORGOT YOUR PASSWORD ?</h3>

	<div class="field_container">
		<label for="password">New password</label>
		<input type="password" id="password" name="password" value="" />
	</div>
	<div class="field_container">
		<label for="password_bis">Confirm</label>
		<input type="password" id="password_bis" name="password_bis" value="" />
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
	<input type="submit" value="SAVE !" />
</form>
</div>
<?php 	include("inc/bottom.php"); ?>