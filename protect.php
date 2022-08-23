<?php 


if (!isset($_SESSION)) {
	session_start();
}

if(!isset($_SESSION['id'])){

	die('Ta logado nao, nao acessa então.<p> <a href="index.php">Entrar</a>  </p>');
}




?>