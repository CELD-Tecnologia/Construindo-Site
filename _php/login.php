<?php
	if(!isset($_SESSION)) { session_start(); }

	$_SESSION['cd_usuario'] = 0;

	include_once("conexao.php"); 

	$usuario_email = $_POST['login'];
	$usuario_senha = $_POST['senha'];

	$usuario_senha = hash('whirlpool', $usuario_senha);
	$sql = mysqli_query($conn, "select cd_usuario, usuario_nome, usuario_email, usuario_tipo from usuarios where usuario_email = '" . $usuario_email . "' and usuario_senha = '" . $usuario_senha . "'") or die();
	while($row = mysqli_fetch_array($sql)){
		$_SESSION['cd_usuario'] = $row['cd_usuario'];
		$_SESSION['usuario_nome'] = $row['usuario_nome'];
		$_SESSION['usuario_email'] = $row['usuario_email'];
		$_SESSION['usuario_tipo'] = $row['usuario_tipo'];
	}

	if($_SESSION['cd_usuario'] == 0) {
		echo json_encode("erro");
	} else {
		echo json_encode("sucesso");
	}
?>