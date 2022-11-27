<?php
    if(!isset($_SESSION)) { session_start(); }
    include_once("_conexao.php"); 

    //Atualizando o site
    //Falta as validações nas strings
    $dados = "  servicoTitulo           = '{$_POST['servicoTitulo']}',
                servicoSubtitulo        = '{$_POST['servicoSubtitulo']}',
                servicoFoto01Titulo     = '{$_POST['servicoFoto01Titulo']}',
                servicoFoto01Descricao  = '{$_POST['servicoFoto01Descricao']}',
                servicoFoto02Titulo     = '{$_POST['servicoFoto02Titulo']}',
                servicoFoto02Descricao  = '{$_POST['servicoFoto02Descricao']}',
                servicoFoto03Titulo     = '{$_POST['servicoFoto03Titulo']}',
                servicoFoto03Descricao  = '{$_POST['servicoFoto03Descricao']}'
            ";
        
    $sql = mysqli_query($conn, "UPDATE sites 
                                SET {$dados}
                                WHERE cd_site = " . $_SESSION['cd_site']);

$servicos = [1, 2, 3]; //Aqui podemos descidir quantos serviços terá no site. Hoje o BD só aceita 3 -> tentar mudar para uma constante
foreach($servicos as $servico) {

    $cd_imagem_setor = $_POST['cd_imagem_setor' . $servico];

    if(!empty($_FILES['imagem' . $servico])) {

        //Atualizando a imagem do serviço
        $imagem = $_FILES['imagem' . $servico]['tmp_name'];
        $tamanho = $_FILES['imagem' . $servico]['size'];
        $imagem_formato = $_FILES['imagem' . $servico]['type'];
        $imagem_nome_original = $_FILES['imagem' . $servico]['name'];

        if ( $imagem != "none" && $tamanho > 0 ) {
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
                                        WHERE cd_imagem_setor = {$cd_imagem_setor} AND cd_site = " . $_SESSION['cd_site']);
        } else {
            $dados = "";
        }
    }

    $dados .= " imagem_titulo      = '{$_POST['imagem_titulo' . $servico]}',
                imagem_descricao          = '{$_POST['imagem_descricao' . $servico]}'
            ";

    $sql = mysqli_query($conn, "UPDATE imagens 
                                    SET {$dados}
                                    WHERE cd_imagem_setor = {$cd_imagem_setor} AND cd_site = " . $_SESSION['cd_site']);

}

$_SESSION['setor'] = 3;
header("location: ../../index.php");

?>