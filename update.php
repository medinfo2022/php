<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "souk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE article SET name = '".$_POST["name"]."', price = '".$_POST["price"]."', qte = '".$_POST["qte"]."' WHERE id = '".$_REQUEST["idart"]."' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

$conn->close();
header("location: index.php");
?>