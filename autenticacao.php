<?php
	session_start();
	require_once('dbaccess.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Autenticando</title>
	<link rel="stylesheet" href="">

 	<script type="text/javascript" charset="utf-8" async defer>
		function loginsuccessfully(){
			setTimeout("window.location='painel.php'",1000);
		}
		function loginfailed(){
			setTimeout("window.location='index.php'",1000);
		}
	</script>


</head>
<body>
	
</body>
</html>



<?php  
	$login_user=$_POST['login_user'];
	$password=$_POST['password'];

	$sql = mysqli_query($conn, "SELECT login_user FROM acesso WHERE login_user = '$login_user' AND password =md5('$password')");
	$row = @mysqli_num_rows($sql);
	if ($row>0) {
//		session_start();
		$_SESSION['login_user']=$_POST['login_user'];
		$_SESSION['password']=$_POST['password'];

		echo "<h1><center>Você foi autenticado com sucesso!Aguarde um instante.</center></h1>";
		echo "<script>console.log('Você foi autenticado com sucesso!')</script>";
		//echo "<script>loginsuccessfully()</script>";
		header('Location: painel.php');
		exit();
	}else{
		$_SESSION['nao_autenticado'] = true;
		echo "<h1><center>Nome de usuário e/ou senha inválidos.</h1></center>";
		echo "<script>console.log('Nome de usuário e/ou senha inválidos.')</script>";
		//mysqli_close($conn);
//		session_start();
		//session_destroy();
		echo "<script>loginfailed()</script>";
		//exit();		
	}

?>