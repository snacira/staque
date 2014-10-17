<?php
	$minYear = null;
	if (!empty($_GET['min_year'])){
		$minYear = $_GET['min_year'];
	}
	$maxYear = null;
	if (!empty($_GET['max_year'])){
		$maxYear = $_GET['max_year'];
	}
	$minRating = null;
	if (!empty($_GET['min_rating'])){
		$minRating = $_GET['min_rating'];
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>WF3 Movies !</title>
	<meta name="description" content="">
	<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<div id="wrapper">
		<header>
			<div class="container">
				<h1>WF3 MOVIES</h1>

				<form id="filter_form" method="GET" action="index.php">
					
					<select name="min_year">
						<option value="">Minimum year</option>

						<?php $minYearInDatabase = getMinYearInDatabase(); ?>

<?php for($i=$minYearInDatabase;$i<=date("Y");$i++): ?>
<option <?php if ($i == $minYear){ echo 'selected="selected"' ;} ?> value="<?= $i ?>"><?= $i ?></option>
<?php endfor; ?>
					</select>

					<select name="max_year">
						<option value="">Maximum year</option>
						<?php for($i=$minYearInDatabase;$i<=date("Y");$i++): ?>
						<option <?php if ($i == $maxYear){ echo 'selected="selected"' ;} ?>value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>

					<select name="min_rating">
						<option value="">Minimum rating</option>
						<?php for($i=0;$i<=100;$i+=10): ?>
						<option <?php if ($i == $minRating){ echo 'selected="selected"' ;} ?> value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>

					<input type="submit" value="OK" />

				</form>

				<nav>
					<?php 
					if (userIsLogged()){
						echo "Yo " . $_SESSION['user']['username'] . "!";
						echo ' <a href="logout.php" title="Logout !">Logout</a>';
					}
					else {
					?>
					<a href="login.php" title="Sign in !">Sign in</a> | 
					<a href="register.php" title="Sign up !">Sign up</a>
					<?php } ?>
				</nav>
			</div>
		</header>