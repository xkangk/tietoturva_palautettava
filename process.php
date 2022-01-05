<?php
$conn=mysqli_connect("localhost","root","","n0jaka00");
if(!$conn){
   die('Could not Connect My Sql:');
}
if(isset($_POST['save']))
{	 
	 $first_name = $_POST['first_name'];
	 $last_name = $_POST['last_name'];
	 $username = $_POST['username'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];

	 $sql = "INSERT INTO `tiedot` (first_name,last_name,username,email,phone)
	 VALUES ('$first_name','$last_name','$username','$email', '$phone')";
	 if (mysqli_query($conn, $sql)) {
		echo "Teidot tallennettu onnistuneesti";
        header("Location:entry.php");

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>