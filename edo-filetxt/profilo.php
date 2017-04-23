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
					header("location:profilo.php");
				}
			}
			setcookie('mycookie',"", time()-3600);
			header("location:login.php");
		}
		else
		{
			header("location:login.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<title> Profilo </title>
	<link rel="stylesheet" href="login_stile.css">

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
     
		<li><a href="logout.php">Logout</a></li>
		<li><a href="#">Profilo</a></li>
      </ul>
	</div>
 </header>


<div class="info">
	<h2>Profilo</h2>
	<div class="line"></div>
	
	<div class="right">
		<h1>Le tue informazioni</h1>
		<pre>NOME: <?php echo $_SESSION['login_nome'];?>     
COGNOME:<?php echo $_SESSION['login_cognome'];?>    
EMAIL:<?php echo $_SESSION['login_mail'];?>    
DATA DI NASCITA: <?php echo $_SESSION['login_data'];?></pre>
	</div>
</div>

</body>

</html>