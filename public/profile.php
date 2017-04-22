<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="stileUser.css" rel="stylesheet">
</head>
<body>
<div id="profile">
<p id="welcome">Benvenuto nella tua area personale: <i><?php 
    echo $_SESSION['login_user']; 
    ?>
    </i>
    <br>Nel corso della sessione sarai ricordato finchè non effettuerai il logout.
    </p>
    <br>
<p id ="links">
    <a href="index.php">Go to Home Page</a><br>
    <a href="logout.php">Logout</a>   
</p>

</div>
</body>
</html>