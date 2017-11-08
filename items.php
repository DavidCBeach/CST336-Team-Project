<?php
$host = "us-cdbr-iron-east-05.cleardb.net";
$dbname="heroku_c95c62d6327a93c";
$username="bc1caf57472822";
$password="55c0d40e";
$conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
function getProductTypes() {
    global $conn;
    $sql = "SELECT DISTINCT(productType)
            FROM `tp_product` 
            ORDER BY productType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['productType'] . "</option>";
        
    }
}
function displayProducts(){
    global $conn;
    
    $sql = "SELECT * FROM tp_product WHERE 1 ";
    
    
    if (isset($_GET['submit'])){
        
        $namedParameters = array();
        
        
        if (!empty($_GET['productName'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND productName LIKE :productName"; //using named parameters
            $namedParameters[':productName'] = $_GET['productName'];
         }
         
        if (!empty($_GET['productType'])) {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND productType = :pType"; //using named parameters
            $namedParameters[':pType'] =   $_GET['productType'] ;
         }     
         
         if (isset($_GET['available'])) {
             $sql .= " AND status = :dAvailability"; //using named parameters
            $namedParameters[':dAvailability'] =  "y" ;
         }
        
         if (isset($_GET['orderBy']) == name) {
             if($_GET['orderBy'] == asc)
             {
                  $sql .= " ORDER BY productName";
             }else{
                 $sql .= " ORDER BY productName DESC";
             }
                   
         }
         
    
        
        
    }//endIf (isset)
    
    //If user types a deviceName
     //   "AND deviceName LIKE '%$_GET['deviceName']%'";
    //if user selects device type
      //  "AND deviceType = '$_GET['deviceType']";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
     foreach ($records as $record) {
        
        echo  $record['productName'] . "     " .
              "<a target='checkoutHistory' href='checkoutHistory.php?productId=".$record['productId'].
              "'> Checkout History </a>  <a href='addcart.php?item=".$record['productName'].
              "'> Add to Cart </a> <a href='description.php?productId=".$record['productId']."'> Description </a> <br /> </t>";
        
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Team Project: Shopping Cart</title>
    </head>
    <body >
        
        <h1> CSUMB Market: Fruits, Veggies, Nuts </h1>
        <div id = input>
        <form>
            Product: <input type="text" name="productName" placeholder="Product Name"/>
            Type: 
            <select name="productType">
               <option value="">Select One</option>
                <?=getProductTypes()?>
            </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available"> Available </label>
            
            <br>
            Order by Name:
            <input type="radio" name="orderBy" id="orderByName" value="asc"/> 
             <label for="orderByName"> Asc </label>
            <input type="radio" name="orderBy" id="orderByName" value="desc"/> 
             <label for="orderByName"> Desc </label>
            
            <input type="submit" value="Search!" name="submit" >
        </form>
        </div>
        
        <hr>
        <a href="cart.php">Look at cart</a>
        <div id = display>
        <?=displayProducts()?>
        </div>
        
        <div id = css>
        <iframe name="checkoutHistory" width="675" height="771" allowtransparency="true" style="background: #d5e1df;"></iframe>
        <iframe name="description" width="675" height="771" allowtransparency="true" style="background: #d5e1df;"></iframe>
        </div>
    </body>
</html>