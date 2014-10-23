<?php

	function userIsLogged(){
		if (!empty($_SESSION['user'])){
			return true;
		}
		return false;
	}

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

	function infosPerso($id){

		global $dbh;

		$sql = "SELECT * FROM user
				WHERE id = :id";

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $id);		
		$stmt->execute();
		$monCompte = $stmt->fetch();

		return $monCompte;
	}
			

	function getProfilList(){

		$id = "";
		$image = "";
		$pseudo = "";
		$location = "";

		global $dbh; 

		$sql = "SELECT id, image, pseudo, location FROM user";

		$stmt = $dbh->prepare($sql);

		$stmt->execute();
		$profilsList = $stmt->fetchAll();
		
		/*echo "<pre>";
		print_r($profilsList);*/

		return $profilsList;
	}

	//Ajouter une question
	function addquestion(){

		global $dbh;
		global $errors;

		/*Ajout de points*/ 
		$user = $_SESSION['user']['id'];

		$sql = "SELECT score FROM user
				WHERE id = $user";

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$score = $stmt->fetchColumn();

		$addpoint = $score +2;

		$sql = "UPDATE user SET score = $addpoint";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		/* fin de l'ajout*/

		if (!empty($_POST)){

			$title = $_POST['title'];
			$content = $_POST['content'];
			$tags = $_POST['tags'];

			if (empty($title)){
				$errors[] = "Titre manquant !";
			}

			if (empty($title)){
				$errors[] = "Titre manquant !";
			}

			if (empty($content)){
					$errors[] = "Veuiller rediger une question !";
			}


			if (empty($errors)){

				$sql = "INSERT INTO question(id, title, content, user_id, dateCreated, dateModified,tags)
						VALUES ('',:title, :content, :user_id, NOW(), NOW(),:tags )";

				$stmt = $dbh->prepare($sql);
				$stmt->bindValue(":title", $title);
				$stmt->bindValue(":content", $content);
				$stmt->bindValue(":user_id", $_SESSION['user']['id']);
				$stmt->bindValue(":tags", $tags);
				$stmt->execute();
			
			$lastId = $dbh->lastInsertId();
			header("Location:detail_question.php?id=".$lastId);
			die();
			}
		}
	}


	function nbRep($id){
	global $dbh; 	
	$sql = "SELECT COUNT(*) FROM answer
					JOIN question ON question_id=question.id 
					WHERE question.id=:id";
					
				$stmt = $dbh->prepare($sql);
				$stmt->bindValue(":id",$id);
				$stmt->execute();
				$nbAnswers = $stmt->fetchColumn();
				return $nbAnswers;
	}

function addcomment(){

		global $dbh;
		global $errors;
		$questionOrAnswer_id = $_GET['id'];
		$qOrA=$_GET['q_a'];
		//echo($qOrA);

		if (!empty($_POST)){

			$comment = $_POST['comment'];

			if (empty($comment)){
				$errors[] = "Ecriver un commentaire !";
			}

			if (empty($errors)){

				$sql = "INSERT INTO comment(id, comment,questionOrAnswer, questionOrAnswer_id, user_id)
						VALUES ('',:comment,:qOrA ,:questionOrAnswer_id, :user_id)";

				$stmt = $dbh->prepare($sql);
					$stmt->bindValue(":comment", $comment);
					$stmt->bindValue(":qOrA", $qOrA);
					$stmt->bindValue(":questionOrAnswer_id", $questionOrAnswer_id);
					$stmt->bindValue(":user_id", $_SESSION['user']['id']);
					$stmt->execute();

			$lastId = $dbh->lastInsertId();
			header("Location:detail_question.php?id=".$lastId);
			die();
			}
		}
	}

function addanswer(){

		global $dbh;
		global $errors;
		$question_id = $_GET['id'];

		
		/*Ajout de points*/ 
		$user = $_SESSION['user']['id'];

		$sql = "SELECT score FROM user
				WHERE id = $user";

		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$score = $stmt->fetchColumn();

		$addpoint = $score +4;

		$sql = "UPDATE user SET score = $addpoint";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		/* fin de l'ajout*/

		if (!empty($_POST)){

			$answer = $_POST['content'];

			if (empty($answer)){
				$errors[] = "Ecriver une reponse !";
			}

			if (empty($errors)){

				$sql = "INSERT INTO answer(id, content, user_id, question_id, dateCreated, dateModified)
						VALUES ('',:content, :user_id, :question_id, NOW(), NOW())";

				$stmt = $dbh->prepare($sql);
					$stmt->bindValue(":content", $answer);
					$stmt->bindValue(":user_id", $_SESSION['user']['id']);
					$stmt->bindValue(":question_id", $question_id);
					$stmt->execute();
			}
		}

	}