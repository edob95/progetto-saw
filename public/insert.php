<?php
session_start();
$error='';
if(isset($_POST['submit'])){
    if (empty($_POST['mail']) || empty($_POST['password'])) {
        $error = "Nome or Password is invalid";
        die($error);
    }
    else {
        $connessione_al_server=mysqli_connect("localhost", "root", "root", "scotchbox");    
        $username = $_POST['mail'];
        $password = $_POST['password'];
        $date = $_POST['data'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $conferma = $_POST['conferma'];
        $filename = "user.txt";
        $handle = fopen($filename, 'a'); 
        if (!$handle){
            die ("Errore nell'apertura del file");
        } 
        if($conferma === $password){
            fwrite($handle, $username." ");
            fwrite($handle, $password." ");
            fwrite($handle, $date." ");
            fwrite($handle, $nome." ");
            fwrite($handle, $cognome." ");
            fwrite($handle, "\n");
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: profile.php");
            fclose($handle);
        }
        else
        {
            die ("Password non corrispondenti");
        }
    }
}
?>

