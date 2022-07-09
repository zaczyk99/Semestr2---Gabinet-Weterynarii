
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
				$order='imie_wlasciciela';
			}
			
			if(isset($_GET['sort'])){
				$sort=$_GET['sort'];
			}
			else
			{          ////////////////// BLAD
				$sort='ASC';
			}
			
			
			
			
			
			$wynik = $conn->query("SELECT * FROM karta_pacjentow ORDER BY $order $sort ");
			
			
			if($wynik->num_rows > 0)
			{
				
				$sort =='DESC' ? $sort= 'ASC' : $sort = 'DESC';
				
				echo "<table>";                   // TO TUTAJ TO SA TYLKO NAZWY NAD TABELAMI TO SIE MOGE BAWIC ILE CHCE
				echo "<tr>";
				
				
				
				
				echo "<th><a href='?order=id&&sort=$sort'>  Id </a></th>";
				echo "<th><a href='?order=imie_wlasciciela&&sort=$sort'> Imie wlasciciela </a></th>";
				echo "<th><a href='?order=nazwisko_wlasciciela&&sort=$sort'> Nazwisko Właściciela </a></th>";
				echo "<th><a href='?order=imie_zwierzaka&&sort=$sort'>  Imie Zwierzaka</a></th>";
				echo "<th><a href='?order=gatunek&&sort=$sort'>  Gatunek </a></th>";
				echo "<th><a href='?order=plec&&sort=$sort'>  Płeć </a></th>";
				echo "<th><a href='?order=rasa&&sort=$sort'>  Rasa </a></th>";
				echo "<th><a href='?order=wiek&&sort=$sort'>  Wiek (w latach)</a></th>";
				echo "<th><a href='?order=waga&&sort=$sort'>  Waga (w kg) </a></th>";
				echo "<th><a href='?order=wzrost&&sort=$sort'>  Wzrost (w cm)</a></th>";
				echo "<th><a href='?order=powod_przyjecia&&sort=$sort'>  Powód Przyjęcia </a></th>";
				echo "</tr>";
				
				while( $wiersz = $wynik->fetch_assoc() )
				{
	
					$id = $wiersz['id'];
					echo "<tr>";
					
					echo "<td>" . $wiersz["id"]    . "</td>";
					echo "<td>" . $wiersz["imie_wlasciciela"] . "</td>";
				
					echo "<td>" . $wiersz["nazwisko_wlasciciela"] . "</td>";
					echo "<td>" . $wiersz["imie_zwierzaka"]    . "</td>";
					echo "<td>" . $wiersz["gatunek"]    . "</td>";
					echo "<td>" . $wiersz["plec"]    . "</td>";
					echo "<td>" . $wiersz["rasa"]    . "</td>";
					echo "<td>" . $wiersz["wiek"]    . "</td>";
					echo "<td>" . $wiersz["waga"]    . "</td>";
					echo "<td>" . $wiersz["wzrost"]    . "</td>";
					echo "<td>" . $wiersz["powod_przyjecia"]    . "</td>";
				
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
		
<form action="zarzadzanie3.php" method="post">
<button type="submit"> Powrót</button>
		
	</body>
</html>
