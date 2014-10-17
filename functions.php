<?php


	function randomString($length = 50){
		$chars = "ABCDEFGHIJKLMNOPQRSTRUVWYXZabcdefghijklmnopqrstruvwyxz0123456789";
		$string = "";
		for($i=0;$i<$length;$i++){
			$num = mt_rand(0, strlen($chars)-1);
			$string .= $chars[$num];
		}
		return $string;
	}

	function hashPassword($password, $salt){
		$pepper = "zDO3Byl7rsYAgz6fGAjf4*Ej23dvlAvvmOzFXG3E2m4FTXb4l5o";
		$hashedPassword = hash("sha512", $password);
		for($i=0;$i<5000;$i++){
			$hashedPassword = hash("sha512", $pepper . $hashedPassword . $salt);
		}
		return $hashedPassword;
	}


	//retourne un booléen, en fonction de si le nom d'utilisateur
	//est présent en bdd
	function usernameExists($name){

		global $dbh;

		$sql = "SELECT COUNT(*) FROM user 
				WHERE name = :name";
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":name", $name);
		$stmt->execute();

		$usernameFound = $stmt->fetchColumn(); //usernameFound vaut 1 ou 0
		return $usernameFound;

	}

	//retourne un booléen, en fonction de si l'email
	//est présent en bdd
	function emailExists($mail){

		global $dbh;

		$sql = "SELECT COUNT(*) FROM user 
				WHERE mail = :mail";
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":mail", $mail);
		$stmt->execute();

		$emailFound = $stmt->fetchColumn(); //emailFound vaut 1 ou 0
		return $emailFound;

	}

	function userIsLogged(){
		if (!empty($_SESSION['user'])){
			return true;
		}
		return false;
	}

