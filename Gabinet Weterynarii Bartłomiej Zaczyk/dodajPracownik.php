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



$login = $_POST['login'];
$haslo = $_POST['haslo'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$rodzaj_zatrudnienia = $_POST['rodzaj_zatrudnienia'];
$telefon = $_POST['telefon'];
$plec = $_POST['plec'];
$adres_korespondencyjny = $_POST['adres_korespondencyjny'];
$wiek = $_POST['wiek'];
$adres_email = $_POST['adres_email'];
$stanowisko = $_POST['stanowisko'];
$pensja = $_POST['pensja'];


$sql3 = "INSERT INTO pracownicy (id,login,haslo, imie, nazwisko, wiek, plec, rodzaj_zatrudnienia, telefon, adres_korespondencyjny, adres_email, stanowisko, pensja) 
VALUES ('','$login','$haslo','$imie','$nazwisko','$wiek','$plec','$rodzaj_zatrudnienia','$telefon','$adres_korespondencyjny','$adres_email','$stanowisko','$pensja')";


if ($conn->query($sql3) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $sql3 . "<br>" . $conn->error;

}

$conn->close();
?>
  <form action="zarzadzaniePracownik.php" method="post">
<button type="submit"> Powrót</button>