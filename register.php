<?php
	$title = "Staque | Inscription ";
	session_start();

	include("db.php");
	include("functions.php");

	//déclaration des variables du formulaire
	$name 			= "";
	$pseudo			= "";
	$mail 			= "";
	$password 		= "";
	$password_bis 	= "";

	$errors = array();

	//formulaire soumis ?
	if (!empty($_POST)){

		$name 			= strip_tags($_POST['name']);
		$pseudo			= strip_tags($_POST['pseudo']);
		$mail 			= strip_tags($_POST['mail']);
		$password 		= $_POST['password'];
		$password_bis 	= $_POST['password_bis'];

		//validation

		//email
		if (empty($mail)){
			$errors[] = "Merci d'indiquer un email !";
		}
		elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Votre email n'est pas valide !";
		}
		elseif (emailExists($mail)){
			$errors[] = "Cet email existe déjà !";
		}

		//username
		if (empty($name)){
			$errors[] = "Merci d'indiquer votre nom !";
		}
		//vérifie si username est présent en bdd
		elseif (usernameExists($name)){
			$errors[] = "Ce nom existe déjà !";
		}

		//username
		if (empty($pseudo)){
			$errors[] = "Merci d'indiquer votre nom !";
		}
		//vérifie si username est présent en bdd
		elseif (usernameExists($pseudo)){
			$errors[] = "Ce nom existe déjà !";
		}

		//password
		if (empty($password)){
			$errors[] = "Merci d'entrer un mot de passe !";
		}
		elseif (empty($password_bis)){
			$errors[] = "Merci de confirmer votre mot de passe !";
		}
		elseif ($password_bis != $password){
			$errors[] = "Erreur de mot de passe !";
		}
		elseif (strlen($password) < 7){
			$errors[] = "Votre mot de passe doit avoir au moins 7 caractères !";
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
			$sql = "INSERT INTO user (name, pseudo, mail, password, salt, token, dateRegistred, dateModified) 
				VALUES (:name, :pseudo, :mail, :password, :salt, :token, NOW(), NOW())";

			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(":mail", $mail);
			$stmt->bindValue(":pseudo", $pseudo);
			$stmt->bindValue(":name", $name);
			$stmt->bindValue(":password", $hashedPassword);
			$stmt->bindValue(":salt", $salt);
			$stmt->bindValue(":token", $token);

			$stmt->execute();

		 	header("Location: login.php");
		 	die();
		}
	}
include("inc/header.php");
include("inc/nav.php");

 ?>
<div class="container">
	<?php include("inc/register_form.php"); ?>
</div>
<?php include("inc/footer.php"); ?>