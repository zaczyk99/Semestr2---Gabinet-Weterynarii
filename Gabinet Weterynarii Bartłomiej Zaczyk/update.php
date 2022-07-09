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




$update = "UPDATE karta_pacjentow SET imie_wlasciciela='$imie_wlasciciela', nazwisko_wlasciciela='$nazwisko_wlasciciela', imie_zwierzaka='$imie_zwierzaka', gatunek='$gatunek', plec='$plec', rasa='$rasa', wiek='$wiek', waga='$waga', wzrost='$wzrost', powod_przyjecia='$powod_przyjecia' where id='$id'";

if ($conn->query($update) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $update . "<br>" . $conn->error;

}

$conn->close();
?>
