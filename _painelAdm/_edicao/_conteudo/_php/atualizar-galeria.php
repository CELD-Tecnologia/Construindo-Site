<?php
    if(!isset($_SESSION)) { session_start(); }
    include_once("_conexao.php"); 

    $etapa = $_GET['etapa'];
    $idImagem = $_GET['idImagem'];
    
    switch($etapa) {
        case 1:
            novaImagem($conn);
            break;
        case 2:
            editarImagem($conn, $idImagem);
            break;
        case 3:
            excluirImagem($conn, $idImagem);
            break;        
    }

    $_SESSION['setor'] = 5;
    header("location: ../../index.php");

    function novaImagem($conn) {
        $tituloImagem   = $_POST['tituloImagem'];
        $dsImagem       = $_POST['dsImagem'];
        $imagem         = $_FILES['imagem']['tmp_name'];
        $tamanho        = $_FILES['imagem']['size'];
        $tipo           = $_FILES['imagem']['type'];
        $nome           = $_FILES['imagem']['name'];
        
        if ( $imagem != "none" && $tamanho > 0 ) {
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);
        
            $queryInsercao = "INSERT INTO tbgaleria (idSite, idSetorImagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem, imagem) 
            VALUES ('" . $_SESSION['idSite'] . "','7' ,'$tituloImagem','$dsImagem','$nome','$tamanho', '$tipo','$conteudo')";
        
            mysqli_query($conn, $queryInsercao);
        }
    }

    function excluirImagem($conn, $idImagem) {
        $idImagem = $_GET['idImagem'];
        $sql = mysqli_query($conn, "DELETE FROM tbgaleria 
                                    WHERE idImagem = $idImagem 
                                        AND idSetorImagem = 7 AND idImagem = {$idImagem} AND idSite = " . $_SESSION['idSite']);
    }

    function editarImagem($conn, $idImagem) {
        $idImagem = $_GET['idImagem'];
        $dados = "  tituloImagem    = '{$_POST['tituloImagem']}',
                    dsImagem        = '{$_POST['dsImagem']}'
                ";

        $sql = mysqli_query($conn, "UPDATE tbgaleria 
                                    SET {$dados}
                                    WHERE idImagem = $idImagem 
                                        AND idSetorImagem = 7 AND idImagem = {$idImagem} AND idSite = " . $_SESSION['idSite']);
    }

?>