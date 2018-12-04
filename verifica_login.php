<?php
session_start();
if(!$_SESSION['login_user']&&!$_SESSION["password"]&&!isset($_SESSION["login_user"])&&!isset($_SESSION["password"])){
	header('Location: index.php');
	exit();
}

?>