<?php
$hostname = "localhost";
$database = "our_store";
$username = "root";
$password = "";

try {
  $connection = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
} 

catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

require_once('function.php');


// Get APP URL
function APP_URL(){
  echo "http://localhost/our_store";
}
function GET_APP_URL(){
  return "http://localhost/our_store";
}

?>