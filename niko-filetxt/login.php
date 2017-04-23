<?php
include ('log.php');
if(isset($_SESSION['login_user'])){
    header("location: profile.php");
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
	<a href="index.php"><img class="logo" src="images/logo1.png"></a>
	<div class="container">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Segnala</a></li>
        <li><a href="registrazione.php">Registrati</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="#">Info</a></li>
      </ul>
	</div>
 </header>


<div class="info">
	<h2>Login</h2>
	<div class="line"></div>
	<form class="formy" action="" method="post">
		E-Mail<br>
		<input type="mail" name="mail" class="element"><br>
		Password<br>
		<input type="password" name="password" class="element"><br>
		<a class="forget" href="#">Hai dimenticato la password?</a>
		<input type="submit" name="submit" value="Invia" class="invia"><br>
	</form>
	
	<div class="right">
		<h1>City Care</h1>
		<p><pre>Accedi
Segnala il problema
Migliora la tua citta'</pre></p>
<pre class="question">Non sei ancora registrato?
<a href="registrazione.php" class="register">Registrati</a></pre>
	</div>
</div>

</body>

</html>