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






$zwierz = $_POST['imie_zwierzaka'];






$usun = "DELETE FROM karta_pacjentow WHERE imie_zwierzaka='$zwierz'";


if ($conn->query($usun) === TRUE) {
  echo " record zostal usuniety";

} else {
  echo "Error: " . $usun . "<br>" . $conn->error;

}

$conn->close();
?>
  <form action="zarzadzanie2.php" method="post">
<button type="submit"> Powrót</button>