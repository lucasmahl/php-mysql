<?php
include("dbaccess.php");
include("verifica_login.php");
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
 	<h2>Olá, <?php echo $_SESSION['login'];	?>	</h2> <br/>

 	<a href="cadastrando.php"><button>Cadastrar</button></a>
 	<a href="consulta.php"><button>Consultar</button></a>
 	<br/>
 	<a href="logout.php"><button>Log Out</button></a>

 </body>
 </html>