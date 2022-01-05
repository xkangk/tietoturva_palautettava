
<?php
session_start();
$username = $_SESSION["username"];


$conn=mysqli_connect("localhost","root","","n0jaka00");
if(!$conn){
 die('Could not Connect My Sql:');
}
$result = mysqli_query($conn,"SELECT * FROM tiedot WHERE username = '$username'");
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

                ?>  

<?php
if (mysqli_num_rows($result) > 0) {
?>

<div style="font-size: 20px;margin: 10px;color: white;">Tarkista tiedot</div>  
  <table id="taulu">
  
  <tr>
    <td>Etunimi</td>
    <td>Sukunimi</td>
    <td>Käyttäjätunnus</td>
    <td>Sähköposti</td>
    <td>Puhelinnumero</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["first_name"]; ?></td>
    <td><?php echo $row["last_name"]; ?></td>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["phone"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
</div>
 </body>
</html>