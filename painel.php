<?php
require_once("dbaccess.php");
require_once("verifica_login.php");
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
<?php
	$login_user=$_SESSION['login_user'];
	$password=$_SESSION['password'];
	$sql = "SELECT nome_user FROM conexao.acesso WHERE login_user ='$login_user' AND password =md5('$password') ";

	//fetchAll = Retorna todas as linhas (registros) como um array
	$nome = mysqli_query($conn, $sql);
	$row = $nome->fetch_assoc(); 

	echo "<h1>Olá, ".$row["nome_user"]."! </h1><br/>";
 	echo "
 		<a href='cadastrando.php'><button>Cadastrar</button></a>
 		<a href='consulta.php'><button>Consultar</button></a>
 		<br/>
 		<a href='logout.php'><button>Log Out</button></a>
 	";
$conn->close();
exit();
?>
 </body>
 </html>