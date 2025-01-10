<?php
$hostname = 'localhost';
$username =  'root';
$password = '';
$dbname = 'shopping_db';

$conn = new mysqli($hostname , $username , $password , $dbname);
if(!$conn){
    die("the connection failed". $conn->connect_error);
}
// else{
//     echo("connection successfully");
// }

?>