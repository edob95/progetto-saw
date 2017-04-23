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
	<title> Login </title>
	<link rel="stylesheet" href="login_stile.css">

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
	<h2>Login</h2>
	<div class="line"></div>
	<form method = "post" class="formy" action="funzioni_login.php">
		E-Mail</br>
		<input type="email" name="email" class="element"><br>
		Password</br>
		<input type="password" name="password" class="element"><br>
		Ricordami
		<input type="checkbox" name="ricordami"></br></br>
		<a class="forget" href="#">Hai dimenticato la password?</a>
		<input type="submit" name="submit" value="Invia" class="invia"></br>
	</form>
	
	<div class="right">
		<h1>City Care</h1>
		<pre>Accedi
Segnala il problema
Migliora la tua citt&#224;</pre>
<pre class="question">Non sei ancora registrato?
<a href="registrazione.php" class="register">Registrati</a></pre>
	</div>
</div>

</body>

</html>