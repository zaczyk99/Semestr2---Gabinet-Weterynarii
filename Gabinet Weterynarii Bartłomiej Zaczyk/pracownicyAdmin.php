<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<html>
<head>
<title>Pracownicy</title>
</head>
<body background="tlo3.jpg">
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
      <li><a href="#">Pracownicy</a>
        <ul>
  <li><a href="zarzadzaniePracownik.php">Dodawanie pracownikow</a></li>
  <li><a href="zarzadzanie2Pracownik.php">usuwanie pracownikow</a></li>
  <li><a href="zarzadzanie3Pracownik.php">Wyswietlanie pracownikow</a></li>
        </ul>
 <li><a href="logout.php">Wyloguj się!</a></li>

      </li>
    </ol>
strona z pracownikami
</body>
</html>