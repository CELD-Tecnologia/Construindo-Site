<?php
    if(!isset($_SESSION)) { session_start(); }
    include_once("_conexao.php"); 

    $etapa = $_GET['etapa'];
    $cd_imagem = $_GET['cd_imagem'];
    
    switch($etapa) {
        case 1:
            novaImagem($conn);
            break;
        case 2:
            editarImagem($conn, $cd_imagem);
            break;
        case 3:
            excluirImagem($conn, $cd_imagem);
            break;        
    }

    $_SESSION['setor'] = 5;
    header("location: ../../index.php");

    function novaImagem($conn) {
        $imagem_titulo   = $_POST['imagem_titulo'];
        $imagem_descricao       = $_POST['imagem_descricao'];
        $imagem         = $_FILES['imagem']['tmp_name'];
        $tamanho        = $_FILES['imagem']['size'];
        $tipo           = $_FILES['imagem']['type'];
        $nome           = $_FILES['imagem']['name'];
        
        if ( $imagem != "none" && $tamanho > 0 ) {
            $fp = fopen($imagem, "rb");
            $conteudo = fread($fp, $tamanho);
            $conteudo = addslashes($conteudo);
            fclose($fp);
        
            $queryInsercao = "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato, imagem) 
            VALUES ('" . $_SESSION['cd_site'] . "','7' ,'$imagem_titulo','$imagem_descricao','$nome','$tamanho', '$tipo','$conteudo')";
        
            mysqli_query($conn, $queryInsercao);
        }
    }

    function excluirImagem($conn, $cd_imagem) {
        $cd_imagem = $_GET['cd_imagem'];
        $sql = mysqli_query($conn, "DELETE FROM imagens 
                                    WHERE cd_imagem = $cd_imagem 
                                        AND cd_imagem_setor = 7 AND cd_imagem = {$cd_imagem} AND cd_site = " . $_SESSION['cd_site']);
    }

    function editarImagem($conn, $cd_imagem) {
        $cd_imagem = $_GET['cd_imagem'];
        $dados = "  imagem_titulo    = '{$_POST['imagem_titulo']}',
                    imagem_descricao        = '{$_POST['imagem_descricao']}'
                ";

        $sql = mysqli_query($conn, "UPDATE imagens 
                                    SET {$dados}
                                    WHERE cd_imagem = $cd_imagem 
                                        AND cd_imagem_setor = 7 AND cd_imagem = {$cd_imagem} AND cd_site = " . $_SESSION['cd_site']);
    }

?>