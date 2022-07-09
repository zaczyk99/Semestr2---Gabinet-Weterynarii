<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: Salon weterynarii.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="arkusz.css" rel="stylesheet" type="text/css">
	<title>Weterynaria - Logowanie</title>
</head>

<body background="tlo1.jpg">
	
	<center><h1>Witaj w Gabinecie weterynarii</h1>
<img src="cat.png">

</center>
	
<div class="center">
<div id="panel">
	

	
	<form action="zaloguj.php" method="post">
	
	<center> 
	
	<label for="username">Nazwa użytkownika:</label>
		<input type="text" name="login" />
		<label for="password">Hasło:</label>
		<input type="password" name="haslo" />
		
		
		</center>
		<div id="lower">
		
		<input type="submit" value="Zaloguj" />
		   
		   </div>
    </form>
</div>




</div>

</br>
<center>



<form action="LogAdmin.php" method="post">
<button type="submit"> Zaloguj jako admin</button>
</center></form><center>
<form action="LogPrac.php" method="post">
<button type="submit"> Zaloguj jako pracownik</button>
</center></form>
</body>
	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>

</body>
</html>