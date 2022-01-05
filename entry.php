<?php  
 //entry.php  
 session_start();  
  if(!isset($_SESSION["username"]))  
 { 
      
  } 
 
 
 
 
 
 
 
 
 ?>
 
 
  <!DOCTYPE html>
<html>
<head>  
           <title>Tarkista tiedot</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		   <link rel="stylesheet" href="tyyli.css" />  
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </head> 
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
		Sähköposti:<br>
		<input type="email" name="email">
        <br>
        Puhelinnumero:<br>
		<input type="text" name="phone">
		<br><br>
		<input type="submit" name="save" value="Tallenna">
	</form>
  </div>
  </body>
</html>