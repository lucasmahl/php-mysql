<?php
	$host = "127.0.0.1:3306";
	$user = "root";
	$pass = "";
	$banco = "conexao";
	$conn = new mysqli($host,$user,$pass,$banco);
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<script>console.log('Connected successfully.')</script>";

?>