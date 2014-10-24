<?php
	session_start();
	include("db.php");


	$answerID = $_GET["answerId"]; //id de la réponse
	$type = $_GET["type"];		   // + ou - de points
	$idQ = $_GET['id_q']; //id question

	

	//récupere ID de l'USER de la réponse 
	$sql = "SELECT user_id FROM answer WHERE id = :id";
		$stmt = $dbh->prepare($sql);
		$stmt-> bindValue(":id",$answerID);
		$stmt->execute();
		$userID = $stmt->fetchColumn();
	
	

	
	//récuprer le score du poseur de question

	$sql = "SELECT score FROM user WHERE id = $userID";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$score = $stmt->fetchColumn();

	


	//vote positif
	if ($type == "plus"){ ;

	
		$addpoint = $score +5;

		$sql = "UPDATE user SET score = $addpoint WHERE id =$userID";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

	}

	//vote negatif
	else{

		//enleve des point a l'autre USER
		$removepoint = $score -5;

		$sql = "UPDATE user SET score = $removepoint WHERE id =$userID";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();


		//retire 1 de mes points

		$mysession = $_SESSION['user']['id'];


		//recupere mes points
		$sql = "SELECT score FROM user WHERE id = $mysession";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$myscore = $stmt->fetchColumn();

		$removemypoint = $myscore -1;

		//retire mon point
		$sql = "UPDATE user SET score = $removemypoint WHERE id = $mysession";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();


	}

	header("Location:detail_question.php?id=".$idQ);
			