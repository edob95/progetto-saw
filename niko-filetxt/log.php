<?php
session_start(); 

if(isset($_COOKIE['user'])){
    $_SESSION['login_user'] = $_COOKIE['user'];
    header("location:profile.php");
}



if(isset($_POST['submit'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    $filename = "user.txt";
    $handle = fopen($filename, "r");
    
    while(!feof ($handle)){
        $riga = fgets($handle)."<br/>";
        $word = explode (" ", $riga);
        if ($mail == $word[0]){
            if ($password == trim($word[1])){  
                            //COOKIE
                $cookie_name = "user";
                $cookie_value = $mail;
                setcookie($cookie_name,$cookie_value,time() + (60*5), "/");
  
                $_SESSION['login_user'] = $mail;
                header("location: profile.php");
            }
        }
            
    }
    die("Errore accesso");
    fclose($handle);
}
?>