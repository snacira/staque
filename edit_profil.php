<?php
	$title = "Staque | Editer profil ";
	session_start();

	include("db.php");
	include("functions.php");

	//récupère nos données depuis la bdd
	$id 		= "";
	$image 		= "";
	$name 		= "";
	$pseudo 	= "";
	$mail 		= "";
	$birthday 	= "";
	$job 		= "";
	$location 	= "";
	$lang 		= "";
	$websites 	= "";

	$mesInfosPerso = infosPerso($_SESSION["user"]['id']);
	$avatarDefault = "perso10.jpg";

	//à afficher qu'à la validation du form
	if(!empty($_POST)){

		echo "<pre>";
		print_r($_POST);

		global $dbh;

		$image 		= $_POST['image'];
		$pseudo 	= $_POST['pseudo'];
		$name 		= $_POST['name'];
		$mail 		= $_POST['mail'];
		$birthday 	= $_POST['birthday'];
		$job 		= $_POST['job'];
		$Location 	= $_POST['location'];
		$lang 		= $_POST['lang'];
		$websites 	= $_POST['websites'];
		$id 		= $_SESSION["user"]['id'];


		$sql = "UPDATE user
				SET image = :image,
				pseudo = :pseudo, 
				name = :name, 
				mail = :mail, 
				birthday = :birthday, 
				job = :job,
				location = :location, 
				lang = :lang, 
				websites = :websites,
				dateModified = NOW()
				WHERE id = :id";

		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->bindValue(":image", $image);
		$stmt->bindValue(":pseudo", $pseudo);
		$stmt->bindValue(":name", $name);
		$stmt->bindValue(":mail", $mail);
		$stmt->bindValue(":birthday", $birthday);
		$stmt->bindValue(":job", $job);
		$stmt->bindValue(":location", $location);
		$stmt->bindValue(":lang", $lang);
		$stmt->bindValue(":websites", $websites);

		if($stmt->execute()){
			header("Location:account.php?id=" . $_SESSION['user']["id"]);
			die();
		}

	}

include("inc/header.php");
include("inc/nav.php");

?>



<section class="container">

	<form action="edit_profil.php" id="edit-profil" method="POST" novalidate>

		<h3>Modifier votre profil</h3>
		<div class="field_container">
		<?php if(empty($mesInfosPerso["image"])) { ?>

			<img src="img/<?php echo $avatarDefault; ?>" alt="avatar" width="90" height="90">

		<?php } else { ?>

			<img src="img/<?php echo $mesInfosPerso["image"]; ?>" alt="avatar" width="90" height="90">

		<?php } ?>	

			<br>
			<label for="image"><span>Changer l'image</span><input type="file" name="image" value="" placeholder=""></label>
		</div>
		<div id="infos">
			<div class="field_container">
				<span>Pseudo</span>
				<input type="text" id="pseudo" name="pseudo" value="<?php echo $mesInfosPerso["pseudo"]; ?>" placeholder="pseudo" />
				<!-- <a href="<?php echo [""]; ?>" class="delete" title=""></a> -->
				</div>
				<div class="field_container">
					<span>Name</span>
					<input type="text" id="name" name="name" value="<?php echo $mesInfosPerso["name"]; ?>" placeholder="nom"/>
				</div>
				<div class="field_container">
					<span>Email</span>
					<input type="text" id="mail" name="mail" value="<?php echo $mesInfosPerso["mail"]; ?>"  placeholder="mail"/>
				</div>
				<div class="field_container">
					<span>Birthday</span>
					<input type="text" id="birthday" name="birthday" value="<?php echo $mesInfosPerso["birthday"]; ?>"  placeholder="dd/mm/yyyy" />
				</div>
				<div class="field_container">
					<span>Métier</span>
					<input type="text" id="job" name="job" value="<?php echo $mesInfosPerso["job"]; ?>" placeholder="metier"/>
				</div>	
				<div class="field_container">
					<span>Pays</span>
					<input type="text" id="location" name="location" value="<?php echo $mesInfosPerso["location"]; ?>" placeholder="pays" />
				</div>		
				<div class="field_container">
					<span>Langue</span>
					<input type="text" id="lang" name="lang" value="<?php echo $mesInfosPerso["lang"]; ?>"  placeholder="langue" />
				</div>		
				<div class="field_container">
					<span>Sites</span>
					<input type="text" id="websites" name="websites" value="<?php echo $mesInfosPerso["websites"]; ?>"  placeholder="google.com, free.fr, monsite.com"/>
				</div>		
			</div>
		</div>
		<input type="submit" value="Valider" />
	</form>


</section>

<?php include("inc/footer.php"); ?>