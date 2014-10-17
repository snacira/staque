<?php
	session_start();

	include("db.php");
	include("functions.php");

	//déclaration des variables du formulaire
	$mail 			= "";
	$name 		= "";
	$password 		= "";
	$password_bis 	= "";

	$errors = array();

	//formulaire soumis ?
	if (!empty($_POST)){
		//on écrase les valeurs définies ci-dessus, tout en se protegeant
		//pas de strip tags sur la password par contre (si la personne veut mettre des balises dans son pw, c'est son affaire, et on le hache anyway)
		$mail 			= strip_tags($_POST['mail']);
		$name 		= strip_tags($_POST['name']);
		$password 		= $_POST['password'];
		$password_bis 	= $_POST['password_bis'];

		//validation

		//email
		if (empty($mail)){
			$errors[] = "Please provide an email !";
		}
		elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Your email is not valid !";
		}
		elseif (emailExists($mail)){
			$errors[] = "This email already exists !";
		}

		//username
		if (empty($name)){
			$errors[] = "Please provide an username !";
		}
		//vérifie si username est présent en bdd
		elseif (usernameExists($name)){
			$errors[] = "This username already exists !";
		}

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


		//form valide ?
		if (empty($errors)){
			//prépare les données pour l'insertion en base

			//génère un salt unique pour cet user
			$salt = randomString();

			//fonction déclarée dans functions.php
			$hashedPassword = hashPassword($password, $salt);

			//utilisée pour l'oubli du mdp, le remember me...
			$token = randomString();

			//sql d'insertion de l'user
			$sql = "INSERT INTO user (name, mail, password, salt, token, dateRegistered, dateModified) 
				VALUES (:name, :mail, :password, :salt, :token, NOW(), NOW())";

			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(":mail", $mail);
			$stmt->bindValue(":name", $name);
			$stmt->bindValue(":password", $hashedPassword);
			$stmt->bindValue(":salt", $salt);
			$stmt->bindValue(":token", $token);

			$stmt->execute();
			//@guillaume : rediriger vers le formulaire de login
		}
	}
include("inc/header.php");
include("inc/nav.php");

 ?>
<div class="container">
	<?php include("inc/register_form.php"); ?>
</div>
<?php include("inc/footer.php"); ?>