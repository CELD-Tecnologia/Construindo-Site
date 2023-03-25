<?php
    if(!isset($_SESSION)) { session_start(); }
    include_once("_conexao.php"); 

    //Atualizando o site
    //Falta as validações nas strings

    //site_google_analytics
    $dados = "  cd_site_css      = '{$_POST['cdCSS']}',
                site_titulo      = '{$_POST['titulo']}',
                site_descricao   = '{$_POST['descricao']}',
                site_keyword     = '{$_POST['keyword']}',
                site_email     = '{$_POST['site_email']}',
                site_dominio     = '{$_POST['site_dominio']}',
                site_nome_exibicao     = '{$_POST['site_nome_exibicao']}',
                site_whats     = '{$_POST['site_whats']}',
                site_telefone     = '{$_POST['site_telefone']}',
                site_facebook     = '{$_POST['site_facebook']}',
                site_instagram     = '{$_POST['site_instagram']}',
                site_area_atuacao_titulo     = '{$_POST['site_area_atuacao_titulo']}',
                site_area_atuacao_subtitulo     = '{$_POST['site_area_atuacao_subtitulo']}',
                site_area_atuacao_frase     = '{$_POST['site_area_atuacao_frase']}'
            ";

            //var_dump($dados); die();
        
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
                    imagem_tamanho    = '{$tamanho}',
                    imagem_formato     = '{$imagem_formato}',
                    imagem_nome_original  = '{$imagem_nome_original}'
                ";

        $sql = mysqli_query($conn, "UPDATE imagens 
                                    SET {$dados}
                                    WHERE cd_imagem_setor = 0 AND cd_site = " . $_SESSION['cd_site']);
    } else {
        $dados = "";
    }

    $dados .= " imagem_titulo      = '{$_POST['imagem_titulo']}',
                imagem_descricao   = '{$_POST['imagem_descricao']}'
            ";

    $sql = mysqli_query($conn, "UPDATE imagens 
                                    SET {$dados}
                                    WHERE cd_imagem_setor = 0 AND cd_site = " . $_SESSION['cd_site']);

    $_SESSION['setor'] = 6;
    header("location: ../../index.php");

?>