<?php

	session_start();
	if(isset($_SESSION['login_mail']))
	{
		header("location:profilo.php");
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<title> Registrazione </title>
	<link rel="stylesheet" href="registrazione_stile.css">

</head>

<body>

<header class="large">
	<a href="index.php"><img class="logo" alt="logo" src="images/logo1.png"></a>
	<div class="container">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Segnala</a></li>
        <li><a href="registrazione.php">Registrati</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="profilo.php">Profilo</a></li>
      </ul>
	</div>
 </header>
 
<div class="info">
	<h2>Registrati</h2>
	<div class="line"></div>
	<form method="post" class="formy" action="funzioni_registrazione.php">
		Nome<br>
		<input type="text" name="nome" class="element"><br>
		Cognome<br>
		<input type="text" name="cognome" class="element"><br>
		Data di Nascita<br>
		<input type="date" name="date" class="element"><br>
		E-Mail<br>
		<input type="email" name="email" class="element"><br>
		Password<br>
		<input type="password" name="password" class="element"><br>
		Conferma Password<br>
		<input type="password" name="conferma_password" class="element">
		<input type="submit" name="submit" value="Invia" class="invia">
	</form>
	
		<div class="right">
		<h1>City Care</h1>
		<pre>Registrati
Segnala il problema
Migliora la tua citt&#224;</pre>

<pre class="question">Sei gi&#224; registrato?
<a href="login.php" class="login">Accedi</a></pre>
	</div>
</div>

</body>

</html>