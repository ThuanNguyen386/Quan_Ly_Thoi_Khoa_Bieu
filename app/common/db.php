<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB =' no.2-quan-ly-tkb';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$DB; charset=UTF8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $status = 1;
  return $conn;
} catch(PDOException $e) {
$status = 0;
  echo "Connection failed: " . $e->getMessage();
}