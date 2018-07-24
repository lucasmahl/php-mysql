<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script type="text/javascript" charset="utf-8" async defer>
		function voltar(){
			setTimeout("window.location='cadastrando.php'",1000);
		}
	</script>
</head>
<body>
	
</body>
</html>
<?php 
	include("dbaccess.php");
	include("verifica_login.php");
?>

<?php 
	$nome = $_POST['nome'];
	$idade = $_POST['idade'];

	$sql = mysqli_query($conn,"INSERT INTO `conexao`.`pessoas`(`nome`,`idade`)
		VALUES('$nome','$idade');
	");
	echo "<center><h1>Dados inseridos com sucesso!!!</h1></center>";
	echo "<script>voltar()</script>";
?>
