<?php
session_start();
include_once("../../../_php/conexao.php"); 

$idImagem=$_GET['idImagem'];
$sql = mysqli_query($conn, "DELETE from tbgaleria WHERE idImagem = $idImagem AND idSetorImagem = 7 AND idSite = " . $_SESSION['idSite']);

echo '<meta http-equiv="refresh" content="0;url=../galeria.php">';
?>