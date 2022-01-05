
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
 <title> Tarkista tiedot</title>
 </head>
 <link rel="stylesheet" href="tyyli.css">

<body>
<div id="box">


<?php
if (mysqli_num_rows($result) > 0) {
?>

  <table>
  
  <tr>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Username</td>
    <td>Email</td>
    <td>Phone</td>
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
 </body>
</html>