<?php

$host = "us-cdbr-iron-east-05.cleardb.net";
$dbname="heroku_c95c62d6327a93c";
$username="bc1caf57472822";
$password="55c0d40e";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);






?>

<!DOCTYPE html>

<html>
    <head>
        <title>Customer Login</title>
    </head>
    <body>
        <h1>Fruits, Vegetables, and Nuts</h1>
        <h2>Choose login:</h2>
        <a href="/userLogin.php" >Customer Login</a>
        <a href="/staffLogin.php">Staff Login</a>
        
    </body>
</html>