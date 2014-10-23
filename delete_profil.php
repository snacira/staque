<?php 

	$id = $_GET['user'];

	include("db.php");

	$sql ="DELETE from user WHERE id =$id";

	$stmt = $dbh->prepare($sql);

	$stmt->bindValue(":id", $id);

	$stmt->execute();

	header("location: index.php")
	?>
