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


//  This is a magic constant in PHP that represents the directory of the current script.
//  In this case, it's used to specify the absolute path to the directory containing the current script.

// So, the line you provided is including the "database.php" file, establishing a database connection, 
// and storing the connection object in the variable $mysqli for use in the rest of the script.

$mysqli=require __DIR__  . "/database.php";



$sql = "INSERT INTO multi_order (name, email ,location ,choosed) VALUES(?, ? ,?,?)";

// $mysqli->stmt_init(): This initializes a new statement object associated with the provided MySQLi object ($mysqli).
//  This is used for prepared statements, 
// which are a way to execute SQL queries with parameters, preventing SQL injection attacks.
$stmt = $mysqli ->stmt_init();
// mysqil -> object
//  This is a variable that holds the MySQLi statement object
if(! $stmt -> prepare($sql)){
    die("SQL error : " . $mysqli->error); 
}
// s, and they are all expected to be strings (indicated by "ssss" in the first argument to bind_param). The actual values to be inserted into the SQL query come from $_POST["name"], $_POST["email"], $_POST["location"], and the $order variable.

/*
Explanation: The bind_param function is essential for two main reasons:

Type Safety: It ensures that the data types of the variables being bound match the types expected in the SQL query. This helps prevent SQL injection and ensures that the database receives the correct types of data.

Value Binding: It binds the actual values to the placeholders in the prepared statement. This is where the variables from the form data 
($_POST variables in this case) are associated with the placeholders in the SQL query.





*/





$stmt -> bind_param("ssss" , 
$_POST["name"] , $_POST["email"] ,$_POST["location"],$order );

$stmt->execute();
echo "succ message" ; 



?>