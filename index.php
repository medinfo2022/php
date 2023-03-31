<!DOCTYPE html>
<html>
<head>
    <title>Manage Article</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

a {
  
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}


</style>
<script>
    function deleteconfig(){

    var del=confirm("Are you sure you want to delete this record?");
    if (del==true){
        header("location: index.php")
    }else{
        alert("Record Not Deleted")
    }
    return del;
    }
</script>
</head>
<body>

<h2 style="text-align:center;">Gestion des Articles</h2>
<br /><br>
<a href="article.html" style="background-color:green;">CREATE</a>
<br /><br>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>EDIT</td>
    <th>DELETE</th>
  </tr>
  
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

$sql = "SELECT id, name, price, qte FROM article";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td> " . $row["price"]. "</td><td>" . $row["qte"]. "</td>
          <td><a href='edit.php?idart=" . $row["id"]. "' style='background-color:blue;'>EDIT</a></td>
          <td><a href='delete.php?idart=" . $row["id"]. "' style='background-color:red;' onclick='return deleteconfig();'>DELETE</a></td></tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</table>
</body>
</html>