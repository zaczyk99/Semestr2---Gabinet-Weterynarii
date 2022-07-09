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

$data = $_POST['data'];
$zajecie = $_POST['zajecie'];





$update5 = "UPDATE harmonogram_dni SET data='$data', zajecie='$zajecie' where id='$id'";

if ($conn->query($update5) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $update5 . "<br>" . $conn->error;

}

$conn->close();
?>
