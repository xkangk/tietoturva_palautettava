<?php  
 //entry.php  
 session_start();  
  if(!isset($_SESSION["username"]))  
 { 
  } 
 
 
 
 
 
 
 
 
 ?>
 
 
  <!DOCTYPE html>
<html>
<link rel="stylesheet" href="tyyli.css">

  <body>
  <div id="box">
     <?php  
                echo '<h1>Tervetuloa - '.$_SESSION["username"].'</h1>';  
                echo '<label><a href="logout.php">Kirjaudu ulos</a></label>'; 
                echo "<br>" ;
                echo '<label><a href="tarkista.php">Tarkista tiedot</a></label>';  
                ?>  
	<form method="post" action="process.php">
     <div style="font-size: 20px;margin: 10px;color: white;">Tallenna tiedot tietokantaan</div>

		Etunimi<br>
		<input type="text" name="first_name">
		<br>
		Sukunimi:<br>
		<input type="text" name="last_name">
		<br>
		Käyttäjätunnus:<br>
		<input type="text" name="username">
		<br>
		Sähköposti:<br>
		<input type="email" name="email">
        <br>
        Puhelinnumero:<br>
		<input type="text" name="phone">
		<br><br>
		<input type="submit" name="save" value="Tallenna">
	</form>
  </body>
</html>