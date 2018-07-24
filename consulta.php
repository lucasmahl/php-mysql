<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Consulta</title>
	<link rel="stylesheet" href="">
</head>
<body>
<?php 
	include("dbaccess.php");
	include("verifica_login.php");
?>
<h2>Olá, <?php echo $_SESSION['login'];	?>	</h2> <br/>

 	<form action="consulta.php" method="post">
		<input type="text" name="NOME" placeholder="Nome" ><br/>
		<input type="submit" value="SUBMIT">
	</form> 
<br/>
<br/>
</body>
</html>


<?php
	$NOME = $_POST['NOME'];

	$sql = "SELECT * FROM conexao.pessoas WHERE NOME LIKE '%$NOME%';";

	//fetchAll = Retorna todas as linhas (registros) como um array
	$result = mysqli_query($conn, $sql);

/*	foreach ($result as $row) {
		//key=nome da coluna e value é o valor digitado dentro dela
		foreach ($row as $key => $value) {
			echo "<strong>" . $key . "</strong> ".$value. "<br/>";
		}
		echo "========================================<br/>";
	}*/

	if ($result->num_rows > 0) {
    	echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Idade</th><th>Incrito</th></tr>";
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
       	 echo "<tr><td>".$row["ID"]."</td>	<td>".$row["NOME"]." </td>	<td>".$row["IDADE"]." </td>	<td>".$row["DATA_INSERCAO"]." </td>	</tr>";
	    }
    	echo "</table>";
	} else {
    	echo "0 results";
		}

$conn->close();

?>
