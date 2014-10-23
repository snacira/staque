<?php 
	
	session_start();
	$id = $_SESSION['user']['id'];

	include("db.php");

	$sql ="DELETE from user WHERE id =$id";

	$stmt = $dbh->prepare($sql);

	$stmt->bindValue(":id", $id);

	$stmt->execute();

	header("location: logout.php")
	?>