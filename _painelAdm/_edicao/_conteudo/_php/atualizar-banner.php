<?php
    if(!isset($_SESSION)) { session_start(); }
    include_once("_conexao.php"); 

    $etapa = $_GET['etapa'];
    switch($etapa) {
        case 1:
            novoBanner($conn);
            break;
        case 2:
            editarBanner($conn);
            break;
        case 3:
            excluirBanner($conn);
            break;        
    }

    $_SESSION['setor'] = 2;
    header("location: ../../index.php");

    function novoBanner($conn) {
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
        
            $queryInsercao = "INSERT INTO tbgaleria (cd_site, idSetorImagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem, imagem) 
            VALUES ('" . $_SESSION['cd_site'] . "','1' ,'$tituloImagem','$dsImagem','$nome','$tamanho', '$tipo','$conteudo')";
        
            mysqli_query($conn, $queryInsercao);
        }
    }

    function excluirBanner($conn) {
        $idImagem = $_GET['idImagem'];
        $sql = mysqli_query($conn, "DELETE FROM tbgaleria 
                                    WHERE idImagem = $idImagem 
                                        AND idSetorImagem = 1 AND cd_site = " . $_SESSION['cd_site']);
    }

    function editarBanner($conn) {
        $idImagem = $_GET['idImagem'];
        $dados = "  tituloImagem    = '{$_POST['tituloImagem']}',
                    dsImagem        = '{$_POST['dsImagem']}'
                ";

        $sql = mysqli_query($conn, "UPDATE tbgaleria 
                                    SET {$dados}
                                    WHERE idImagem = $idImagem 
                                        AND idSetorImagem = 1 AND cd_site = " . $_SESSION['cd_site']);
    }

?>