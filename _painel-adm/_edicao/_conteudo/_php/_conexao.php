<?php	
	header('Content-Type: text/html; charset=utf-8');

	$servidor = "criadordesite.mysql.uhserver.com";
	$usuario = "celdtecnologia";
	$senha = "marinhaBrasil@1";
	$dbname = "criadordesite";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	/*codificação dos caracteres para acentuação*/
	mysqli_query($conn, "SET NAMES 'utf8'");
	mysqli_query($conn, 'SET character_set_connection=utf8');
	mysqli_query($conn, 'SET character_set_client=utf8');
	mysqli_query($conn, 'SET character_set_results=utf8');

    return $conn;
	
?>