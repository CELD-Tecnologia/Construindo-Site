<?php
	if(!isset($_SESSION)) { session_start(); }
	include_once("../../_php/conexao.php");

	$cd_site = $_GET['cd_site'];

	$sql = mysqli_query($conn, "SELECT cd_site_area_atuacao FROM sites_area_atuacao WHERE cd_site = " . $cd_site);
    while($row = mysqli_fetch_assoc($sql)){
		$idAreaAtuacao = $row['cd_site_area_atuacao'];
		mysqli_query($conn, "DELETE from sites_area_atuacao_sub WHERE cd_site_area_atuacao = $idAreaAtuacao");
	}

	mysqli_query($conn, "DELETE from sites_area_atuacao WHERE cd_site = $cd_site;");
	mysqli_query($conn, "DELETE from imagens WHERE cd_site = $cd_site;");
	mysqli_query($conn, "DELETE from sites WHERE cd_site = $cd_site;");
	mysqli_query($conn, "DELETE from sites_cidades WHERE cd_site = $cd_site;");

	echo '<meta http-equiv="refresh" content="0;url=../sites.php">';
	/*
	CRIAR UMA FUNC QUE FAÇA A EXCLUSÃO DO SITE, PRECISA VERIFICAR SE:
		-> AS COBRANÇAS ESTÃO ATRELADAS AO SITE
		-> EXISTE OUTROS ITENS ATRELADOS AO SITE, ALÉM DA COBRANÇA PARA PERMITIR QUE SEJA EXCLUÍDO
		-> SE NÃO PUDER EXCLUIR, PENSAR NUMA FORMA DE PERMITIR A EXCLUSÃO, DE MODO A NÃO OCUPAR MUITO O BD
	*/
?>