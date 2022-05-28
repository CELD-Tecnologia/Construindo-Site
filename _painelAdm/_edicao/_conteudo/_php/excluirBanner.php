<?php
if(!isset($_SESSION)) { session_start(); }
include_once("../../../_php/conexao.php"); 

$idImagem=$_GET['idImagem'];
$sql = mysqli_query($conn, "DELETE from tbgaleria WHERE idImagem = $idImagem AND idSetorImagem = 1 AND idSite = " . $_SESSION['idSite']);

echo '<meta http-equiv="refresh" content="0;url=../banner.php">';
?>