<?php
	if(!isset($_SESSION)) { session_start(); }
	include_once("../../_php/conexao.php");

	$cd_site = $_GET['cd_site'];

	$sql = mysqli_query($conn, "SELECT idAreaAtuacao FROM tbareaatuacao WHERE cd_site = " . $cd_site);
    while($row = mysqli_fetch_array($sql)){
		$idAreaAtuacao = $row['idAreaAtuacao'];
		mysqli_query($conn, "DELETE from tbsubareaatuacao WHERE idAreaAtuacao = $idAreaAtuacao");
	}

	mysqli_query($conn, "DELETE from tbareaatuacao WHERE cd_site = $cd_site;");
	mysqli_query($conn, "DELETE from tbgaleria WHERE cd_site = $cd_site;");
	mysqli_query($conn, "DELETE from sites WHERE cd_site = $cd_site;");
	mysqli_query($conn, "DELETE from sitescidade WHERE cd_site = $cd_site;");

	echo '<meta http-equiv="refresh" content="0;url=../sites.php">';

?>