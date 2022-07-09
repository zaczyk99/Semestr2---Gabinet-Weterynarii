<?php

	session_start();
	
	if (!isset($_SESSION['zalogowanyPracownik']))
	{
		header('Location: index.php');
		exit();
	}
	if (isset($_SESSION['zalogowanyAdmin']))
	{
		header('Location: update1Admin.php');
		exit();
	}

	
?>

<html>
<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Dodawanie nowych pracowników</title>
<head>
</head>

<body background="tlo4.jpg">
<style>

      ol {
        list-style-type:none;
        padding:0;
        margin:0;
        background-color:#333;
        font-size:18px;
        height:2em;
        line-height:2em;
        text-align:center;
      }

      
      ol a {
        display:block;
        text-decoration:none;
        color:#000;
        padding:0 5px;
      }

      ol > li {
        float:left;
        width:150px;
        margin-left:1px;
        background-color:#778899;
        height:2em;
      }

      ol > li:first-child {
        margin-left:0;
      }

      ol > li:hover {
        background-color:#EEE;
      }

      ol > li:hover > a {
        color:#09C;
      }

      ol > li:hover > ul {
        display:block;
      }

      /* ------------------------CZĘŚĆ-ROZWIJANA-MENU------------------------ */

      ol > li > ul {
        display:none;
        list-style-type:none;
        padding:0;
        margin:0;
      }

      ol > li > ul > li {
        position:relative;
        background-color:#EEE;
      }

      ol > li > ul > li > a {
        border-top:1px solid #FFF;
      }

      ol > li > ul > li:hover {
        background-color:#DDD;
      }

      ol > li > ul > li:hover > a {
        color:#09C;
      }
    </style>



  <body>

    <ol>
	<li><a class="active" href="Salon weterynarii.php">Strona domowa</a></li>
      <li><a href="#">Strony</a>
        <ul>
          <li><a href="onas.php">O gabinecie</a></li>
  <li><a href="kontakt.php">Kontakt</a></li>
  <li><a href="pracownicy.php">Nasi pracownicy</a></li>
        </ul>
      </li>

      <li><a href="#">Pacjenci</a>
        <ul>
  <li><a href="zarzadzanie.php">Dodawanie danych</a></li>
  <li><a href="zarzadzanie2.php">Usuwanie danych</a></li>
  <li><a href="zarzadzanie3.php">Wyswietlanie tabeli</a></li>
  <li><a href="update1.php">Zaktualizuj dane</a></li>
        </ul>
      </li>

 <li><a href="logout.php">Wyloguj się!</a></li>
	
      </li>
    </ol>


<div class="center">
<div id="panel">
<center> 
<h2> Aktualizacje Pacjenta </h2>
Uwaga: Wszystkie pola są obowiązkowe
</br>
<form action="update.php" method="post">

	<input type="text" name="imie_wlasciciela" placeholder="Podaj imię właściciela: " required/> <br>
	<input type="text" name="nazwisko_wlasciciela" placeholder="Podaj nazwisko właściciela: " required/> <br>
	<input type="text" name="imie_zwierzaka" placeholder="Podaj imię zwierzaka: " required/> <br>
	<input type="text" name="gatunek" placeholder="Podaj gatunek: " required/> <br>
	<input type="text" name="plec" placeholder="Podaj płeć zwierzaka: " required/> <br>
	<input type="text" name="rasa" placeholder="Podaj rasę: " required/> <br>
	<input type="text" name="wiek" placeholder="Podaj wiek zwierzaka: " required/> <br>
	<input type="text" name="waga" placeholder="Podaj wagę: " required/> <br>
	<input type="text" name="wzrost" placeholder="Podaj wzrost zwierzaka (w cm): " required/> <br>
	<input type="text" name="powod_przyjecia" placeholder="Podaj powód przyjęcia zwierzaka: " required/> <br>

	<input type="text" name="id" placeholder="Podaj id kolumny do zmiany: " required/> <br>

	<div id="lower">
</br>
<button type="submit"> Aktualizuj.</button>

</center>


		   
		   </div>
    </form>
</div>

</div>






</body>

</html>