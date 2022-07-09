
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
				$order='imie';
			}
			
			if(isset($_GET['sort'])){
				$sort=$_GET['sort'];
			}
			else
			{         
				$sort='ASC';
			}
			
			
			
			
			
			$wynik = $conn->query("SELECT * FROM pracownicy ORDER BY $order $sort ");
			
			
			if($wynik->num_rows > 0)
			{
				
				$sort =='DESC' ? $sort= 'ASC' : $sort = 'DESC';
				
				echo "<table>";                   // TO TUTAJ TO SA TYLKO NAZWY NAD TABELAMI TO SIE MOGE BAWIC ILE CHCE
				echo "<tr>";
				
				
				
		
					
					
	
				
				echo "<th><a href='?order=id&&sort=$sort'>  Id </a></th>";
				echo "<th><a href='?order=imie=$sort'> Imie </a></th>";
				echo "<th><a href='?order=nazwisko&&sort=$sort'> Nazwisko </a></th>";
				echo "<th><a href='?order=wiek&&sort=$sort'>  Wiek</a></th>";
				echo "<th><a href='?order=plec&&sort=$sort'>  Płeć </a></th>";
				echo "<th><a href='?order=rodzaj_zatrudnienia&&sort=$sort'>  Rodzaj Zatrudnienia </a></th>";
				echo "<th><a href='?order=telefon&&sort=$sort'>  Telefon </a></th>";
				echo "<th><a href='?order=adres_korespondencyjny&&sort=$sort'>  Adres Korespondencyjny</a></th>";
				echo "<th><a href='?order=adres_email&&sort=$sort'>  Adres email (w kg) </a></th>";
				echo "<th><a href='?order=stanowisko&&sort=$sort'>  Stanowisko</a></th>";
				echo "<th><a href='?order=pensja&&sort=$sort'>  Pensja</a></th>";
				echo "</tr>";
				
				while( $wiersz = $wynik->fetch_assoc() )
				{
	
					$id = $wiersz['id'];
					echo "<tr>";
					
					echo "<td>" . $wiersz["id"]    . "</td>";
					echo "<td>" . $wiersz["imie"] . "</td>";
				
					echo "<td>" . $wiersz["nazwisko"] . "</td>";
					echo "<td>" . $wiersz["wiek"]    . "</td>";
					echo "<td>" . $wiersz["plec"]    . "</td>";
					echo "<td>" . $wiersz["rodzaj_zatrudnienia"]    . "</td>";
					echo "<td>" . $wiersz["telefon"]    . "</td>";
					echo "<td>" . $wiersz["adres_korespondencyjny"]    . "</td>";
					echo "<td>" . $wiersz["adres_email"]    . "</td>";
					echo "<td>" . $wiersz["stanowisko"]    . "</td>";
			echo "<td>" . $wiersz["pensja"]    . "</td>";
				
				
				
				
				
				
				
				
				
				
					echo "</tr>";
				}
				
				echo "</table>";
				
			
			}
			else {
				echo "Nie ma nic w bazie danych";
			}
			
			$conn->close();
		
		?>
		
<form action="zarzadzanie3Pracownik.php" method="post">
<button type="submit"> Powrót</button>
		
	</body>
</html>
