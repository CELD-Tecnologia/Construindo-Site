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
    $imagem_formato = $_FILES['imagem']['type'];
    $imagem_nome_original = $_FILES['imagem']['name'];

    if ( $imagem != "none" && $tamanho > 0 )
    {
        $fp = fopen($imagem, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp);

            
        $dados = "  imagem            = '{$conteudo}',
                    imagem_tamanho     = '{$tamanho}',
                    imagem_formato     = '{$imagem_formato}',
                    imagem_nome_original  = '{$imagem_nome_original}'
                ";

        $sql = mysqli_query($conn, "UPDATE imagens 
                                    SET {$dados}
                                    WHERE cd_imagem_setor = 6 AND cd_site = " . $_SESSION['cd_site']);
    } else {
        $dados = "";
    }

    $dados .= " imagem_titulo      = '{$_POST['imagem_titulo']}',
                imagem_descricao          = '{$_POST['imagem_descricao']}'
            ";

    $sql = mysqli_query($conn, "UPDATE imagens 
                                    SET {$dados}
                                    WHERE cd_imagem_setor = 6 AND cd_site = " . $_SESSION['cd_site']);

    $_SESSION['setor'] = 4;
    header("location: ../../index.php");

?>