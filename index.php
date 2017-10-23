<?php

$host = "us-cdbr-iron-east-05.cleardb.net";
$dbname="heroku_c95c62d6327a93c";
$username="bc1caf57472822";
$password="55c0d40e";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);



//test
$sql= "SELECT DISTINCT(deviceType) FROM tc_device ORDER BY deviceType";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($records as $record){
        echo "<option> ".$record['deviceType']."</option>";
    }
//test^^

?>

<!DOCTYPE html>

<html>
    <head>
        
    </head>
    <body>
        
    </body>
</html>