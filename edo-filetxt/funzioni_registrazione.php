<?php
$nomeErr = $emailErr = $cognomeErr = $dateErr = $passErr = $pass_confErr = "";
$nome = $email =$cognome = $date = $password ="" ;
$bool = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST["nome"])) 
	{
		$nomeErr = "Name is required";
		$bool = false;
	}
	else 
	{
		$nome = test_input($_POST["nome"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$nome)) 
		{
			$nomeErr = "Err";
			$bool = false;
		}
	}
  
	if (empty($_POST["cognome"])) 
	{
		$cognomeErr = "Cognome is required";
		$bool = false;
	} 
	else 
	{
		$cognome = test_input($_POST["cognome"]);
		if (!preg_match("/^[a-zA-Z ]*$/",$cognome)) 
		{
			$cognomeErr = "Err";
			$bool = false;
		}	
	}
  
	if (empty($_POST["email"])) 
	{
		$emailErr = "Email is required";
		$bool = false;
	} 
	else 
	{
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$emailErr = "Err";
			$bool = false;
		}
		else
		{
			$file = "users.txt";
			$fp  = fopen($file, "r");
			while(!feof($fp))
			{
				$riga = fgets($fp);
				$info = explode("|", $riga);
				$mai = $info[2];
				if($email == $mai)
				{
					$emailErr = "Utente esistente";
					$bool = false;
				}
				else{}
			}
		}	
	}
  
	if(empty($_POST["date"])){
	$dateErr = "Date is required";
	$bool = false;
	}
	else
	{
		$date = test_input($_POST["date"]);
	}
  
	if(empty($_POST["password"]))
	{
		$passErr = "Password is required";
		$bool = false;
	}
	else
	{
		$password = $_POST["password"];
	}
  
	if(empty($_POST["conferma_password"]))
	{
		$pass_confErr = "Password is required";
		$bool = false;
	}
	else
	{
		$conferma_password = $_POST["conferma_password"];
		if($password === $conferma_password)
		{
			$password = password_hash($password, PASSWORD_DEFAULT);
		}
		else
		{
			$pass_confErr = "Err";
			$bool = false;
		}
	}
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($bool === true)
{
	$file = "users.txt";
	$fp  = fopen($file, "a");
	fwrite($fp, $nome . "|" .$cognome . "|" . $email. "|" .$date . "|" . $password. "|" . PHP_EOL);
	fclose($fp);
	
	header('location: login.php');
}
else
{
	header('location: registrazione.php');
}

?>