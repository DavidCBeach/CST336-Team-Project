
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
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">
        <title>Farm Fresh </title>
        
    </head>
    <body>
        <h1>Farm Fresh: Fruits, Veggies, and Nuts</h1>
        <h2>Choose login:</h2>
        <a href="userLogin.php" >Customer Login</a>
        
        
        
    </body>
</html>