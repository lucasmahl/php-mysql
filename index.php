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
session_start();
if(isset($_SESSION['login_user'])&&isset($_SESSION["password"])){
	header('Location: painel.php');
	exit();

}else {
	unset($_SESSION['login_user']);
	unset($_SESSION['password']);
?>
	<form action="autenticacao.php" method="post">
		<input type="text" name="login_user" placeholder="Login" maxlength="12"> <br/>
		<input type="password" name="password" placeholder="PassWord" maxlength="12" > <br/>
		<input type="submit" value="Acesso" >
	</form>
<?php 
}
?>
</body>
</html>