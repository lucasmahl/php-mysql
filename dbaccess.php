<?php
$host = "localhost";
	$user = "root";
	$pass = "";
	$banco = "conexao";
	$conn = new mysqli($host,$user,$pass,$banco);
	
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "<script>console.log('Connected successfully.')</script>";

?>