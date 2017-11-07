<?php
session_start();


include 'dbConnection.php';
$conn = getDatabaseConnection();



$username = $_POST['email'];
//$password = $_POST['lastName'];


$sql = "SELECT *
        FROM tp_user
        WHERE email = :email";

$namedParameters = array();
$namedParameters[':email'] = $username;
//$namedParameters[':lastName'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record



if (empty($record)) {
    
    echo "wrong username!";
    
} else {
    
    //echo "right credentials!";
    $_SESSION['username'] = $record['email'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
  
   header("Location: items.php"); //redirecting to admin portal
}
?>

