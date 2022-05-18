<?php
	session_start();
	include_once("../../_php/conexao.php");

	$idSite = $_GET['idSite'];

	$sql = mysqli_query($conn, "SELECT idAreaAtuacao FROM tbareaatuacao WHERE idSite = " . $idSite);
    while($row = mysqli_fetch_array($sql)){
		$idAreaAtuacao = $row['idAreaAtuacao'];
		mysqli_query($conn, "DELETE from tbsubareaatuacao WHERE idAreaAtuacao = $idAreaAtuacao");
	}

	mysqli_query($conn, "DELETE from tbareaatuacao WHERE idSite = $idSite;");
	mysqli_query($conn, "DELETE from tbgaleria WHERE idSite = $idSite;");
	mysqli_query($conn, "DELETE from tbsite WHERE idSite = $idSite;");
	mysqli_query($conn, "DELETE from tbsitecidade WHERE idSite = $idSite;");

	echo '<meta http-equiv="refresh" content="0;url=../projects.php">';

?>