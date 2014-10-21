<?php

	session_start();

	include("db.php");
	include("functions.php");

	//déclaration des variables du formulaire
	$mail 		= "";

	$errors = array();

	//formulaire soumis ?
	if (!empty($_POST)){

		$email= $_POST['email'];

		//vérifier que l'email existe bel et bien
		$sql = "SELECT mail, name, token FROM user
				WHERE mail = :mail";
		$stmt = $dbh->prepare($sql);
		$stmt->bindValue(":mail", $mail);
		$stmt->execute();
		$user = $stmt->fetch();

		if (!empty($user)){
			//envoyer un message

			include("phpMailer/PHPMailerAutoload.php"); //chargera les fichiers nécessaires

			$mail = new PHPMailer();        //Crée un nouveau message (Objet PHPMailer)
			$mail->CharSet = 'UTF-8';       //Encodage en utf8

			//INFOS DE CONNEXION
			$mail->isSMTP();                                    //On utilise SMTP
			$mail->Username = "s.nacira@gmail.com"; //nom d'utilisateur
			$mail->Password = "38Utc_Sd5KdI4sz0Gr2Y4g";         //mot de passe
			$mail->Host = 'smtp.mandrillapp.com';               //smtp.gmail.com pour gmail
			$mail->Port = 587;                                  //Le numéro de port
			$mail->SMTPAuth = true;                             //On utilise l'authentification SMTP ?
			//$mail->SMTPSecure = 'tls';                        //décommenter pour gmail

			//CONFIGURATION DES PERSONNES
			$mail->setFrom('account@staque.fr', 'Staque !');                   //qui envoie ce message ? (email, noms)
			$mail->addReplyTo('account@staque.fr', 'Staque !');        //à qui répondre si on clique sur "reply" (email, noms)
			$mail->addAddress($user['mail'], $user['name']);   //destinataire
			
			//CONFIGURATION DU MESSAGE
			$mail->isHTML(true);                                // Contenu du message au format HTML
			$mail->Subject = 'Password reset on Staque !';         


			$resetUrl = "http://localhost/staque/password_reset_2.php?email="
			 . urlencode($mail) . '&token=' . urlencode($user['token']);

			                       //le sujet
			$mail->Body = 'Yo. Please click on the link below to reset your password:<br /><a href="'.$resetUrl.'">'.$resetUrl.'</a>';                                   //le message

			//envoie le message
			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    echo "Message sent!";
			}
		}


	}

	include("inc/header.php");
	include("inc/nav.php");
?>
<section class="container">
	<form name="yo" action="password_reset_1.php" id="password_reset_1" method="POST" novalidate>

		<!-- peut servir pour détecter facilement QUEL formulaire a été soumis -->
		<input type="hidden" name="form_name" value="password_reset_1" />

		<h3>Mot de passe oublié ?</h3>

		<div class="field_container">
			<input type="mail" id="mail" name="mail" value="" placeholder="Email"/>
		</div>

		<input type="submit" value="SIGN IN !" />
		<?php 
			if (!empty($errors)){
				echo '<ul class="errors">';
				foreach($errors as $error){
					echo '<li>'.$error.'</li>';
				}
				echo '</ul>';
			}
		?>

	</form>
</section>
<?php 	include("inc/footer.php"); ?>