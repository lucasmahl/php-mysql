<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CADASTRANDO</title>
	<link rel="stylesheet" href="">
	
	<script type="text/javascript" charset="utf-8" async defer>
			function loginsuccessfully(){
				setTimeout("window.location='cadastrando.php'",3000);
			}
			function loginfailed(){
				setTimeout("window.location='index.php'",3000);
			}
	</script>

</head>
<body>
<?php 
	include("dbaccess.php");
	include("verifica_login.php");
?>
<h2>Olá, <?php echo $_SESSION['login'];	?>	</h2> <br/>

 	<form action="gravacadastro.php" method="post">
		<input type="text" name="nome" placeholder="Nome" required><br/>
		<input type="number" name="idade" placeholder="Idade" minlength="1" maxlength="3" min="0" max="120" required><br/>
		<input type="submit" value="SUBMIT">
	</form> 

</body>
</html>