<?php
session_start();
include_once("../../../_php/conexao.php"); 

$tituloImagem=$_POST['tituloImagem'];
$dsImagem=$_POST['dsImagem'];
$idImagem=$_GET['idImagem'];

$sql = mysqli_query($conn, "UPDATE tbgaleria SET tituloImagem = '" . $tituloImagem . "', dsImagem = '" . $dsImagem . "' WHERE idImagem = " . $idImagem);

echo '<meta http-equiv="refresh" content="0;url=../banner.php">';
?>