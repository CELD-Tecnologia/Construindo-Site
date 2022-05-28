<?php
//Aqui precisa fazer as seguintes alterações:


if(!isset($_SESSION)) { session_start(); }
include_once("../../../../_php/conexao.php"); 

$principalTitulo=$_POST['principalTitulo'];
$principalSubtitulo=$_POST['principalSubtitulo'];
$principalDescricao=$_POST['principalDescricao'];

$sql = mysqli_query($conn, "UPDATE tbsite SET principalTitulo = '" . $principalTitulo . "', principalSubtitulo = '" . $principalSubtitulo . "', principalDescricao = '" . $principalDescricao . "' WHERE idSite = " . $_SESSION['idSite']);

$tituloImagem=$_POST['tituloImagem'];
$dsImagem=$_POST['dsImagem'];
$idImagem=$_GET['idImagem'];

$sql = mysqli_query($conn, "UPDATE tbgaleria SET tituloImagem = '" . $tituloImagem . "', dsImagem = '" . $dsImagem . "' WHERE idImagem = " . $idImagem);

//Inicio do salvamento do Principal
$tituloImagem = "Principal";
$dsImagem = "Principal";
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

	$sql = mysqli_query($conn, "DELETE from tbgaleria WHERE idSetorImagem = 2 AND idSite = " . $_SESSION['idSite']);

    $queryInsercao = "INSERT INTO tbgaleria (idSite, idSetorImagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem, imagem) 
    VALUES ('" . $_SESSION['idSite'] . "','2' ,'$tituloImagem','$dsImagem','$nome','$tamanho', '$tipo','$conteudo')";

    mysqli_query($conn, $queryInsercao);
}
//final do salvamento

//echo '<meta http-equiv="refresh" content="0;url=../principal.php">';

echo 'concluido - quando inserir o ajax, este concluído ira sair daqui';
?>