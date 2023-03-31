<!DOCTYPE html>
<html>
    <head>
        <title>Edit article</title>
    </head>
<body>

    <h3>Edit Article</h3>
    <div>
    <form action="update.php" method="post">

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

$sql = "SELECT name, price, qte FROM article WHERE id ='".$_REQUEST["idart"]."'";
$result = $conn->query($sql);


  // output data of each row
  $row = $result->fetch_assoc() ;
    echo "<table border='0'><tr><td><label for='idart'>Id Article :</label></td>
    <td><input type='text' id='idart' name='idart' value='" . $_REQUEST["idart"]. "' style='background-color : #d1d1d1; cursor: not-allowed;' readonly /></td></tr>"; 
    echo "<tr><td><label for='name'>Name :</label></td>
    <td><input type='text' id='name' name='name' value='" . $row["name"]. "' /></td></tr>";
    echo "<tr><td><label for='price'>Price :</label></td>
    <td><input type='text' id='price' name='price' value='" . $row["price"]. "' /></td></tr>";
    echo "<tr><td><label for='qte'>Quantity :</label></td>
    <td><input type='text' id='qte' name='qte' value='" . $row["qte"]. "' /></td></tr>";         
    echo "</tr><td colspan='2'><input type='submit' value='Update'></td></tr></table>";

$conn->close();

?>



</form>
</div>
</body>
</html>