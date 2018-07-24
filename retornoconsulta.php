<?php 
	include("dbaccess.php");
	include("verifica_login.php");
?>

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
exit();
?>