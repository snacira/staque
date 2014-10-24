<?php
	$title = "Staque | Question ";
	session_start();
	include("db.php");
	include("functions.php");
	include("inc/header.php");
	include("inc/nav.php");
	
	//VOTER POUR LA MEILLEURE REPONSE	

	echo "<pre>";
	print_r ($_POST);
	echo "</pre>";

	$best_answer 	= "";	
	$id 			= "";

	if (!empty($_POST)){

		$best_answer 	= $_POST['bestAnswer']; //name dans l'input

		$sql = "UPDATE answer SET best_answer = 1
				WHERE id = :id";
		$stmt = $dbh->prepare($sql);	
		$stmt->bindValue(":id", $id);		
		$stmt->bindValue(":best_answer", $best_answer);		
		if ($stmt->execute()){
			header("Location: account.php");
			die();


	}
?>
<section class="container">
	<p></p>

</section>
<?php
include("inc/footer.php");
?>
