<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gabinet_weterynarii";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




$data = $_POST['data'];
$zajecie = $_POST['zajecie'];







$sql7 = "INSERT INTO harmonogram_dni (id, data, zajecie) 
VALUES ('','$data','$zajecie')";


if ($conn->query($sql7) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $sql7 . "<br>" . $conn->error;

}

$conn->close();
?>
  <form action="zarzadzaniekalendarz.php" method="post">
<button type="submit"> Powrót</button>