<?php


	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	

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



$id = $_POST['id'];

$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$wiek = $_POST['wiek'];
$plec = $_POST['plec'];
$rodzaj_zatrudnienia = $_POST['rodzaj_zatrudnienia'];
$telefon = $_POST['telefon'];
$adres_korespondencyjny = $_POST['adres_korespondencyjny'];
$adres_email = $_POST['adres_email'];
$stanowisko = $_POST['stanowisko'];
$pensja = $_POST['pensja'];




$update2 = "UPDATE pracownicy SET imie='$imie', nazwisko='$nazwisko', wiek='$wiek', plec='$plec', rodzaj_zatrudnienia='$rodzaj_zatrudnienia', telefon='$telefon', adres_korespondencyjny='$adres_korespondencyjny', adres_email='$adres_email', stanowisko='$stanowisko',pensja='$pensja' where id='$id'";

if ($conn->query($update2) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $update2 . "<br>" . $conn->error;

}

$conn->close();
?>
