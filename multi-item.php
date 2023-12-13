<?php
// validate the name
// print_r($_POST);

$orders=$_POST["orders"];
$order = "";
if(empty($_POST["name"])){
die("name is required");


}


$email = $_POST['email']; // Make sure this is correct
// Other form data retrieval

// Check if email is not null before proceeding
if ($_POST["email"] == null) {
    die("Email cannot be null");}  
   


// validate the email 
// THIS return false if the email is not valid address
if(!filter_var($_POST["email"] , FILTER_VALIDATE_EMAIL)) {
    die("valid email is required");

}

if ($_POST["location"] == null) {

    echo "location cannot be null";
}

 


    

foreach($orders as $row){
    $order .=$row. ",";

}


$mysqli=require __DIR__  . "/database.php";



$sql = "INSERT INTO multi_order (name, email ,location ,choosed) VALUES(?, ? ,?,?)";

$stmt = $mysqli ->stmt_init();

if(! $stmt -> prepare($sql)){
    die("SQL error : " . $mysqli->error); 
}

$stmt -> bind_param("ssss" , 
$_POST["name"] , $_POST["email"] ,$_POST["location"],$order );

$stmt->execute();
echo "succ message" ; 



?>