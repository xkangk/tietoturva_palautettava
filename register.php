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
	<title>Signup</title>
	<link rel="stylesheet" href="tyyli.css">
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