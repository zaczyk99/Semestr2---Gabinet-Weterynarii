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





$ema = $_POST['adres_email'];







$usunPrac = "DELETE FROM pracownicy WHERE adres_email='$ema'";


if ($conn->query($usunPrac) === TRUE) {
  echo " record zostal usuniety";

} else {
  echo "Error: " . $usunPrac . "<br>" . $conn->error;

}

$conn->close();
?>
  <form action="zarzadzanie2Pracownik.php" method="post">
<button type="submit"> Powrót</button>