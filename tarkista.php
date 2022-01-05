<?php
session_start();
if(!isset($_SESSION["username"]))  
{ 
    $query = "SELECT * FROM tiedot WHERE username = $_SESSION[username]"; 
 } 


?>