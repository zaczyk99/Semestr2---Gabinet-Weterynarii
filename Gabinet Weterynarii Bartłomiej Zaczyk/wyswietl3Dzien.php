
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
<body background="tlo1.jpg">
		
		<?php
			
			$conn = new mysqli("localhost", "root", "", "gabinet_weterynarii") or die("Błąd");
			
			IF(isset($_GET['order'])){
				$order=$_GET['order'];
			}
			else
			{
				$order='data';
			}
			
			if(isset($_GET['sort'])){
				$sort=$_GET['sort'];
			}
			else
			{          ////////////////// BLAD
				$sort='ASC';
			}
			
			
			
			
			
			$wynik5 = $conn->query("SELECT * FROM harmonogram_dni ORDER BY $order $sort ");
			
			
			if($wynik5->num_rows > 0)
			{
				
				$sort =='DESC' ? $sort= 'ASC' : $sort = 'DESC';
				
				echo "<table>";                   // TO TUTAJ TO SA TYLKO NAZWY NAD TABELAMI TO SIE MOGE BAWIC ILE CHCE
				echo "<tr>";
				
				
				
				
				echo "<th><a href='?order=id&&sort=$sort'>  Id </a></th>";
				echo "<th><a href='?order=data&&sort=$sort'> Data </a></th>";
				echo "<th><a href='?order=zajecie&&sort=$sort'> Wydarzenie </a></th>";
				
				echo "</tr>";
				
				while( $wiersz = $wynik5->fetch_assoc() )
				{
	
					$id = $wiersz['id'];
					echo "<tr>";
					
					echo "<td>" . $wiersz["id"]    . "</td>";
					echo "<td>" . $wiersz["data"] . "</td>";
				
					echo "<td>" . $wiersz["zajecie"] . "</td>";
					
				
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
		
<form action="zarzadzanie3kalendarz.php" method="post">
<button type="submit"> Powrót</button>
		
	</body>
</html>
