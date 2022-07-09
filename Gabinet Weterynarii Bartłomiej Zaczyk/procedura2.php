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
$connn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$sqll="CALL srednia2('pracownicy');";
if($resultt=mysqli_query($connn, $sqll)){
	while($roww=mysqli_fetch_assoc($resultt)){
	echo "<center>";
	echo "<h1>"."Dane dotyczące pomocników"."</h1>";
		echo "Ilość pracowników na tym stanowisku - ";
		echo $roww['ilosc_pracownikow']."<br/>";
		echo "Najmniej zarabiający pracownik na tym stanowisku  - ";
		echo $roww['minimalne']."zł"."<br/>";
		echo "Najwięcej zarabiający pracownik na tym stanowisku  - ";
		echo $roww['maksymalne']."zł"."<br/>";
		echo "Srednie zarobki pracownika na tym stanowisku  - ";
		echo $roww['srednie']."zł"."<br/>";
		echo "</center>";
}}




$connn->close();
?>
<center>
  <form action="procedura.php" method="post">
<button type="submit"> Powrót</button></center>
	</body>
</html>