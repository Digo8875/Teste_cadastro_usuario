<?php

function connect()
{
	$connection = new PDO("mysql:host=localhost;dbname=cadastro_usuario", 'cadastro_usuario', 'cadastro_usuario');
	return $connection;
}

?>