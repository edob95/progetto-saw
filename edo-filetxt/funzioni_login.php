<?php
$bool = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	if (empty($_POST["email"]) || empty($_POST["password"])) 
	{
		$bool = false;
	}
	else
	{
		$email = test_input($_POST["email"]);
		$password = $_POST["password"];
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$bool = false;
		}
		
		else
		{
			$userlist = file('users.txt');
			foreach($userlist as $user)
			{
				$user_detail = explode('|', $user);				
				
				if($email == $user_detail[2])
				{
					if(crypt($password, $user_detail[4])==$user_detail[4])
					{
						$bool = true;
						session_start();
						$_SESSION['login_nome'] = $user_detail[0];
						$_SESSION['login_cognome'] = $user_detail[1];
						$_SESSION['login_mail'] = $user_detail[2];
						$_SESSION['login_data'] = $user_detail[3];
						
						if(isset($_POST['ricordami']))
						{
							setcookie('mycookie', $user_detail[2], time()+(86400*30));
							
															
							/**************************************SCRITTURA COOKIE SU FILE*******************************************/
							$file = "users.txt";
							$fp = fopen($file,'r+');							
							$utenti = '';
							while(!feof($fp)) 
							{
								$riga = fgets($fp);
								$utente = explode('|', $riga);
								$email_salvata = trim($utente[2]);
								if ($email_salvata == $_SESSION['login_mail']) 
								{
									$riga.= $user_detail[2] . "|";
								}
								$riga = str_replace(PHP_EOL, '', $riga);
								$utenti .=  $riga . PHP_EOL;
							}
							file_put_contents('users.txt', $utenti);
							fclose($fp); 
						}
					}
				}
				else
				{	
						$bool = false;
				}
			}
		}
	}
	
	if($bool == true)
	{
		header('location: profilo.php');
	}
	else
	{
		header('location: login.php');
	}
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>