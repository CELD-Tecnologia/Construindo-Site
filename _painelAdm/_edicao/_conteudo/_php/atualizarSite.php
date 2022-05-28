<?php
if(!isset($_SESSION)) { session_start(); }
include_once("../../../_php/conexao.php"); 

$titulo=$_POST['titulo'];
$descricao=$_POST['descricao'];
$keyword=$_POST['keyword'];
$cdCSS=$_POST['cdCSS'];

$sql = mysqli_query($conn, "UPDATE tbsite SET cdCSS = '" . $cdCSS . "', titulo = '" . $titulo . "', descricao = '" . $descricao . "', keyword = '" . $keyword . "' WHERE idSite = " . $_SESSION['idSite']);

//Inicio do salvamento do favicon
$tituloImagem = "Favicon";
$dsImagem = "Favicon";
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];

if ( $imagem != "none" && $tamanho > 0 )
{
    $fp = fopen($imagem, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);

	$sql = mysqli_query($conn, "DELETE from tbgaleria WHERE idSetorImagem = 0 AND idSite = " . $_SESSION['idSite']);

    $queryInsercao = "INSERT INTO tbgaleria (idSite, idSetorImagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem, imagem) 
    VALUES ('" . $_SESSION['idSite'] . "','0' ,'$tituloImagem','$dsImagem','$nome','$tamanho', '$tipo','$conteudo')";

    mysqli_query($conn, $queryInsercao);
}
//final do salvamento

echo '<meta http-equiv="refresh" content="0;url=../site.php">';
?>