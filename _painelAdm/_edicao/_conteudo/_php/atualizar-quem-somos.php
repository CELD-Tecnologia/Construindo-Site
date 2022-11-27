<?php
    if(!isset($_SESSION)) { session_start(); }
    include_once("_conexao.php"); 

    //Atualizando o site
    //Falta as validações nas strings

    $dados = "  quemsomosTitulo           = '{$_POST['quemsomosTitulo']}',
                quemsomosSubtitulo        = '{$_POST['quemsomosSubtitulo']}',
                quemsomosFoto01Titulo     = '{$_POST['quemsomosFoto01Titulo']}',
                quemsomosFoto01Subtitulo  = '{$_POST['quemsomosFoto01Subtitulo']}',
                video                     = '{$_POST['video']}',
                icVideo                   = '{$_POST['icVideo']}'
            ";
        
    $sql = mysqli_query($conn, "UPDATE sites 
                                SET {$dados}
                                WHERE cd_site = " . $_SESSION['cd_site']);

    //Atualizando a imagem e dados do principal
    $imagem = $_FILES['imagem']['tmp_name'];
    $tamanho = $_FILES['imagem']['size'];
    $formatoImagem = $_FILES['imagem']['type'];
    $nmOriginalImagem = $_FILES['imagem']['name'];

    if ( $imagem != "none" && $tamanho > 0 )
    {
        $fp = fopen($imagem, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);

            
        $dados = "  imagem            = '{$conteudo}',
                    tamanhoImagem     = '{$tamanho}',
                    formatoImagem     = '{$formatoImagem}',
                    nmOriginalImagem  = '{$nmOriginalImagem}'
                ";

        $sql = mysqli_query($conn, "UPDATE tbgaleria 
                                    SET {$dados}
                                    WHERE idSetorImagem = 6 AND cd_site = " . $_SESSION['cd_site']);
    } else {
        $dados = "";
    }

    $dados .= " tituloImagem      = '{$_POST['tituloImagem']}',
                dsImagem          = '{$_POST['dsImagem']}'
            ";

    $sql = mysqli_query($conn, "UPDATE tbgaleria 
                                    SET {$dados}
                                    WHERE idSetorImagem = 6 AND cd_site = " . $_SESSION['cd_site']);

    $_SESSION['setor'] = 4;
    header("location: ../../index.php");

?>