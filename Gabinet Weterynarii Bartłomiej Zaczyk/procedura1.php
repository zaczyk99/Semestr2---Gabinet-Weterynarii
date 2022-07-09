<?php

	session_start();
	
	if (!isset($_SESSION['zalogowanyAdmin']))
	{
		header('Location: index.php');
		exit();
	}

?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style>
			
			
			
			table,
td,
th {
    border: 2px solid #000000;
    text-align: center;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    padding: 14px;
}

th {
    background-color: rgb(252, 252, 224);
    color: white;
}
			
		</style>
	</head>
	<body background="tlo3.jpg">
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



$sql="CALL srednia('pracownicy');";
if($result=mysqli_query($conn, $sql)){
	while($row=mysqli_fetch_assoc($result)){
	echo "<center>";
	echo "<h1>"."Dane dotyczące weterynarzy"."</h1>";
		echo "Ilość pracowników na tym stanowisku - ";
		echo $row['ilosc_pracownikow']."<br/>";
		echo "Najmniej zarabiający pracownik na tym stanowisku  - ";
		echo $row['minimalne']."zł"."<br/>";
		echo "Najwięcej zarabiający pracownik na tym stanowisku  - ";
		echo $row['maksymalne']."zł"."<br/>";
		echo "Srednie zarobki pracownika na tym stanowisku  - ";
		echo $row['srednie']."zł"."<br/>";
		echo "</center>";
}}




$conn->close();
?>
<center>
  <form action="procedura.php" method="post">
<button type="submit"> Powrót</button></center>
	</body>
</html>