<?php
include('insert.php');
if(isset($_SESSION['login_user'])){
    header("location: profile.php");
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
	<a href="layout.php"><img class="logo" src="images/logo1.png"></a>
	<div class="container">
      <ul>
        <li><a href="layout.php">Home</a></li>
        <li><a href="#">Segnala</a></li>
        <li><a href="registrazione.php">Registrati</a></li>
		<li><a href="login.php">Login</a></li>
		<li><a href="#">Info</a></li>
      </ul>
	</div>
 </header>


<div class="info">
	<h2>Registrati</h2>
	<div class="line"></div>
	<form class="formy" action="" method="post">
		Nome<br>
		<input type="text" name="nome" class="element"><br>
		Cognome<br>
		<input type="text" name="cognome" class="element"><br>
		Data di Nascita<br>
		<input type="date" name="data" class="element"><br>
		E-Mail<br>
		<input type="mail" pattern="[^ @]*@[^ @]*" name="mail" class="element"><br>
		Password<br>
		<input type="password" name="password" class="element"><br>
		Conferma Password<br>
		<input type="password" name="conferma" class="element"><br>
		<input type="submit" name="submit" value="Invia" class="invia">
	</form>
	<div class="right">
		<h1>City Care</h1>
		<p><pre>Registrati
Segnala il problema
Migliora la tua citta'</pre></p>

<pre class="question">Sei gia' registrato?
<a href="login.php" class="login">Accedi</a></pre>
	</div>
</div>

</body>

</html>