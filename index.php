<?php
$connect = mysqli_connect("localhost","root", "", "n0jaka00");
session_start();

if(isset($_POST["login"]))  
 {  

      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Molemmat kentät tulee täyttää !")</script>';  
      }  
      else  
      {  
        $con = new PDO("mysql:host=localhost;dbname=n0jaka00", 'root', '');		
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);  
           $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);  
           $query = "SELECT * FROM kayttaja WHERE username = '$username'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          //return true;  
                          $_SESSION["username"] = $username;  
                          header("location:entry.php");  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                }  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
     }

    ?>






<html>  
<head>  
           <title>Kirjaudu sisään</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		   <link rel="stylesheet" href="tyyli.css" />  
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </head>  
      <body>  
           <br /><br />  
           <div id="box">  
           <?php  
                if(isset($_GET["action"]) == "login")  
                { } 
                ?>  
                <div style="font-size: 20px;margin: 10px;color: white;">Kirjaudu sisään</div>  
                <br />  
                <form method="post">  
                     <label>Käyttäjätunnus</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Salasana</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Kirjaudu sisään" class="btn btn-info" />  
                     <br />  
                     <p>Etkö ole käyttäjä? <a href="register.php">Rekisteröidy</a></p>  
                </form>  

                </div>  
      </body>  
 </html>