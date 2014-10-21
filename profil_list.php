<?php
	session_start();

	include("db.php");
	include("functions.php");



	$profils = getProfilList("id");

	
	include("inc/header.php");
	include("inc/nav.php");

?>



<section class="container">

<h1>Utilisateurs</h1>

<?php foreach($profils as $profil): ?>
	<div id="profil">
		<figure class="avatar">
			<a href="#" title=""><img src="img/<?php echo $profil["image"]; ?>" alt="avatar" width="48" height="48"></a>
		</figure>
		<div class="user-details">
			<?php echo $profil["id"]; ?>
            <h4><a href="account.php?id=<?php echo $profil["id"]; ?>"><?php echo $profil["pseudo"]; ?></a></h4>
            <span class="user-location"><?php echo $profil["location"]; ?></span><br>
            <!-- <span class="reputation-score"><?php echo $profil["score"]; ?></span> -->
        </div>
	</div>	
<?php endforeach; ?>
		

</section>

<?php include("inc/footer.php"); ?>