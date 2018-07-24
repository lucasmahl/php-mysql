<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Acesso</title>
	<link rel="stylesheet" href="">

</head>
<body>
<?php
	if(isset($_SESSION["login"])||isset($_SESSION["password"])){
		header('Location: autenticacao.php');
		exit();
	}
?>
	<form action="autenticacao.php" method="post">
		<input type="text" name="login" placeholder="Login" maxlength="12"> <br/>
		<input type="password" name="password" placeholder="PassWord" maxlength="12" > <br/>
		<input type="submit" value="Acesso" >
	</form>

</body>
</html>