<?php
	$resposta = array();
	if(!isset($_SESSION)) { session_start(); }
	include_once("../../_php/conexao.php");

	$nome = $_POST['nome'];
	$dominio = $_POST['dominio'];
	$dtCriacao = date('Y-m-d');
	$cd_usuario = $_SESSION['cd_usuario'];
	$site_modelo = 152;

	$cd_site = 0;
	$sql = mysqli_query($conn, "SELECT func_criar_novo_site({$site_modelo}, '{$dominio}', '{$dtCriacao}', '{$nome}', {$cd_usuario}) AS cd_site") or die();
	while($row = mysqli_fetch_array($sql)){
		$cd_site = $row['cd_site'];
	}

	if($cd_site <= 0) {
		$resposta = array(
			'resposta' => 'erro',
			'mensagem' => 'Domínio já cadastrado.'
		);
	} else {
		$resposta = array(
			'resposta' => 'sucesso',
			'cd_site' => $cd_site,
			'data_criacao' => date('d/m/Y', strtotime($dtCriacao)),
			'template' => '1'
		);
	}
	
	echo json_encode($resposta);
?>