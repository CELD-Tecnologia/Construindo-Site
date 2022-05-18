<?php
session_start();
include_once("../../../_php/conexao.php"); 

//Inicio de incluir novo Banner
$tituloImagem = "Galeria";
$dsImagem = "Galeria";
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

    $queryInsercao = "INSERT INTO tbgaleria (idSite, idSetorImagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem, imagem) 
    VALUES ('" . $_SESSION['idSite'] . "','7' ,'$tituloImagem','$dsImagem','$nome','$tamanho', '$tipo','$conteudo')";

    mysqli_query($conn, $queryInsercao);
}
//final do salvamento

echo '<meta http-equiv="refresh" content="0;url=../galeria.php">';
?>