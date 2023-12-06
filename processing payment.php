<?php

// validate the name
// print_r($_POST);

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

    if(empty($_POST["choosed"])){
        die("choosed is required");
        
        
        }

        if(empty($_POST["quantity"])){
            die("quantity is required");
            
            
            }
        
    




// hashing the password
// password_hash function 
// apply default password hash function 
// return the hash function as a string 
// return 60 character string of seemingly random characters
// no extract the password


$mysqli=require __DIR__  . "/database.php";



$sql = "INSERT INTO user (name, email ,location,choosed,quantity) VALUES(?, ? ,?,?,?)";

$stmt = $mysqli ->stmt_init();

if(! $stmt -> prepare($sql)){
    die("SQL error : " . $mysqli->error); 
}

$stmt -> bind_param("sssss" , 
$_POST["name"] , $_POST["email"] ,$_POST["location"],$_POST["choosed"],$_POST["quantity"] );

$stmt->execute();
echo "succ message" ; 



?>