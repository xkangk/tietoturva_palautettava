<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
try {

		//Jotakin on lähetetty, 
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $hash_pw = password_hash($password, PASSWORD_DEFAULT);

				$conn = new PDO("mysql:host=localhost;dbname=n0jaka00", 'root', '');		
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT); //hashing password
				
				$query = "INSERT INTO `kayttaja` (`username`,`password`) 
										   VALUES (:username, :password)";
   
				$stmt = $conn->prepare($query);
				$stmt->bindParam('username', $_POST['username']);
				$stmt->bindParam('password', $password);
				$stmt->execute();
				header("Location:login.php");
			}
			catch(PDOException $e){
				echo "Connection failed: " . $e->getMessage();exit;
		}	}

        ?>
        <html>
        <head>  
           <title>Rekisteröidy</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		   <link rel="stylesheet" href="tyyli.css" />  
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </head> 
<body>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Rekisteröidy</div>

			<input id="text" type="text" name="username"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			Jo käyttäjä?<a href="login.php"> Kirjaudu sisään</a><br><br>
		</form>
	</div>
</body>
</html>