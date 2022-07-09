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




$imie_wlasciciela = $_POST['imie_wlasciciela'];
$nazwisko_wlasciciela = $_POST['nazwisko_wlasciciela'];
$imie_zwierzaka = $_POST['imie_zwierzaka'];
$gatunek = $_POST['gatunek'];
$plec = $_POST['plec'];
$rasa = $_POST['rasa'];
$wiek = $_POST['wiek'];
$waga = $_POST['waga'];
$wzrost = $_POST['wzrost'];
$powod_przyjecia = $_POST['powod_przyjecia'];






$sql = "INSERT INTO karta_pacjentow (id, imie_wlasciciela, nazwisko_wlasciciela, imie_zwierzaka, gatunek, plec, rasa, wiek, waga, wzrost, powod_przyjecia) 
VALUES ('','$imie_wlasciciela','$nazwisko_wlasciciela','$imie_zwierzaka','$gatunek','$plec','$rasa','$wiek','$waga','$wzrost','$powod_przyjecia')";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();
?>
  <form action="zarzadzanie.php" method="post">
<button type="submit"> Powrót</button>