<?php
$host="localhost";
$dbname="order_db";
$username="root";
$password="";
// we usw it when we d

// This line creates a new MySQLi object, 
// establishing a connection to the MySQL server using the provided host, username, password, and database name.
$mysqli =new  mysqli (hostname:$host,username:$username,password:$password,database:$dbname);

if($mysqli ->connect_error){
    die("connection error " .$mysqli ->connect_error );;
}

return $mysqli;



?>