<?php

	session_start();
	if(!isset($_SESSION['login_mail']))
	{
		if(isset($_COOKIE['mycookie']))
		{
			$file = "users.txt";
			$fp = fopen($file,'r');
			while(!feof($fp)) 
			{
				$riga = fgets($fp);
				$utente = explode('|', $riga);
				if($_COOKIE["mycookie"]==$utente[5])
				{
					$_SESSION['login_nome'] = $utente[0];
					$_SESSION['login_cognome'] = $utente[1];
					$_SESSION['login_mail'] = $utente[2];
					$_SESSION['login_data'] = $utente[3];
					header("location:index.php");
				}
			}
			setcookie('mycookie',"", time()-3600);
			header("location:index.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<title> Home </title>
	<link rel="stylesheet" href="stile.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>

<body>

<header class="large">
	<a href="index.php"><img class="logo" alt="logo" src="images/logo1.png"></a>
	<div class="container">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Segnala</a></li>
		
		<?php
			if(isset($_SESSION['login_mail'])):?>
			<?php
			{
			}
				else:?>
					<li><a href="registrazione.php">Registrati</a></li>
			<?php endif;
		?>
        
		
		
		<?php
			if(isset($_SESSION['login_mail'])):?>
				<li><a href="logout.php">Logout</a></li>
			<?php
				else:?>
					<li><a href="login.php">Login</a></li>
			<?php endif;
		?>
		
		
		
		<li><a href="profilo.php">Profilo</a></li>
      </ul>
	</div>
 </header>
 
<div id="sfondo"></div>

<div class="footer">
	<div class="white">
		<h1>Welcome to City Care </h1>
		<pre class="description">Migliora la tua citt&#224;:
segnala il problema,
contribuisci a risolverlo.</pre>
	</div>
	<p class="problem">Hai riscontrato un problema?</p> 
	<p class="segnala"><a href="#">Segnalalo</a></p>
		
	<div class="line"></div>
	
	<img class="footer_logo" alt="logo" src="images/logo1.png">
	<div class="contact_container">
		<p class="label_contatti">Contatti</p>
		<pre class="contatti">Bernardi Edoardo
Pastore Niko
Ingegneria Informatica</pre>
	</div>
	
	<div class="social_container">
		<p class="label_social">Social</p>
		<pre class="social">Facebook
Instagram
Twitter</pre>
	</div>
</div>

<script src="script.js"></script>
</body>

</html>