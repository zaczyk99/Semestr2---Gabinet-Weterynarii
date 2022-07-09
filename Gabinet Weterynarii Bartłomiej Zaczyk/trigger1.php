<!DOCTYPE html>
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
			
			$conn = new mysqli("localhost", "root", "", "gabinet_weterynarii") or die("Błąd");
			
			IF(isset($_GET['order'])){
				$order=$_GET['order'];
			}
			else
			{
				$order='Komunikat';
			}
			
			if(isset($_GET['sort'])){
				$sort=$_GET['sort'];
			}
			else
			{          ////////////////// BLAD
				$sort='ASC';
			}
			
			
			
			
			
			$wynik = $conn->query("SELECT * FROM dziennik ORDER BY $order $sort ");
			
			
			if($wynik->num_rows > 0)
			{
				
				$sort =='DESC' ? $sort= 'ASC' : $sort = 'DESC';
				
				echo "<table>";                   // TO TUTAJ TO SA TYLKO NAZWY NAD TABELAMI TO SIE MOGE BAWIC ILE CHCE
				echo "<tr>";
				
				
				
				
				echo "<th><a href='?order=id&&sort=$sort'>  Id </a></th>";
				echo "<th><a href='?order=komunikat&&sort=$sort'> Komunikat </a></th>";

				echo "</tr>";
				
				while( $wiersz = $wynik->fetch_assoc() )
				{
	
					$id = $wiersz['id'];
					echo "<tr>";
					
					echo "<td>" . $wiersz["id"]    . "</td>";
					echo "<td>" . $wiersz["komunikat"] . "</td>";
				

				
					echo "</tr>";
				}
				
				echo "</table>";
				
			}
			else 
			{
				echo "Nie ma nic w bazie danych";
			}
			
			$conn->close();
		
		?>
<center>
  <form action="Salon weterynarii Admina.php" method="post">
<button type="submit"> Powrót</button></center>
	</body>
</html>