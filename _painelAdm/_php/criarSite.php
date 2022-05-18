<?php
	session_start();
	include_once("../../_php/conexao.php");

	$idProfissao = $_POST['idProfissao'];
	$dominio = $_POST['dominio'];
	$dtCriacao = date('Y-m-d');

	$idProfissao = 1; //Montador de Móveis
	$dominio = "montador123";

	if($idProfissao == 1){
		echo '<meta http-equiv="refresh" content="0;url=novoMontadorMoveis.php">';
	}
?>