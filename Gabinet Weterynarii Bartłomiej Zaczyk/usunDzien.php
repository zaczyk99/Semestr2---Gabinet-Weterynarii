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






$dzie = $_POST['data'];






$usun3 = "DELETE FROM harmonogram_dni WHERE data='$dzie'";


if ($conn->query($usun3) === TRUE) {
  echo " record zostal usuniety";

} else {
  echo "Error: " . $usun3 . "<br>" . $conn->error;

}

$conn->close();
?>
  <form action="zarzadzanie2kalendarz.php" method="post">
<button type="submit"> Powrót</button>