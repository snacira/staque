<?php

	session_start();

	include("db.php");
	include("functions.php");

	//déclaration des variables du formulaire
	$name 		= "";
	$password 		= "";

	$errors = array();

	//formulaire soumis ?
	if (!empty($_POST)){

		//on écrase les valeurs définies ci-dessus, tout en se protegeant
		//pas de strip tags sur la password par contre (si la personne veut mettre des balises dans son pw, c'est son affaire, et on le hache anyway)
		$name 		= strip_tags($_POST['name']);
		$password 		= $_POST['password'];

		//validation

		//username
		if (empty($name)){
			$errors[] = "Merci d'ajouter un nom !";
		}

		//password
		if (empty($password)){
			$errors[] = "Merci de choisir un mot de passe !";
		}

		//form valide ?
		if (empty($errors)){
			
			//recherche l'utilisateur en bdd par son username (ou email)
			$sql = "SELECT * FROM user
					WHERE name = :login OR mail = :login
					LIMIT 1";

			$stmt = $dbh->prepare($sql);
			$stmt->bindValue(":login", $name);
			$stmt->execute();

			$user = $stmt->fetch();

			$hashedPassword = hashPassword($password, $user['salt']);
			if ($hashedPassword === $user['password']){
				$_SESSION['user'] = $user;
				header("Location: index.php");
				die();
			}
		}
	}

	include("inc/header.php");
	include("inc/nav.php");
?>

<section class="container">
	<?php include("inc/login_form.php"); ?>
</section>

<?php include("inc/footer.php"); ?>