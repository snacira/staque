<?php
	$title = "Staque | Utilisateurs";
	session_start();

	include("db.php");
	include("functions.php");


	$profils = getProfilList();
	
	$avatarDefault = "perso10.jpg";

	include("inc/header.php");
	include("inc/nav.php");

?>

<section class="container">

	<h2>Utilisateurs</h2>

	<?php foreach($profils as $profil): ?>
		<div id="profil">
			<figure class="avatar">
				<a href="#" title="">
					<?php if(empty($profil["image"])) { ?>

						<img src="img/<?php echo $avatarDefault; ?>" alt="avatar" width="48" height="48">

					<?php } else { ?>

						<img src="img/<?php echo $profil["image"]; ?>" alt="avatar" width="48" height="48">

					<?php } ?>
				</a>
			</figure>
			<div class="user-details">

	            <h2><a href="account.php?id=<?php echo $profil["id"]; ?>"><?php echo $profil["pseudo"]; ?></a></h2>
	            <span class="user-location"><?php echo $profil["location"]; ?></span><br>
	            <!-- <span class="reputation-score"><?php echo $profil["score"]; ?></span> -->
	        </div>
		</div>	
	<?php endforeach; ?>
		

</section>

<?php include("inc/footer.php"); ?>