<?php
session_start();
if(!$_SESSION['login']||!$_SESSION["password"]&&!isset($_SESSION["login"])||!isset($_SESSION["password"])){
	header('Location: index.php');
	exit();
}

?>