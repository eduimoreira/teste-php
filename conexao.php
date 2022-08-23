<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';


$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error){
	die('Deu pau no banco: '.$mysqli->error);

}



?>