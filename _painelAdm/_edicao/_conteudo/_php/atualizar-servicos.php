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
                                WHERE idSite = " . $_SESSION['idSite']);

$servicos = [1, 2, 3]; //Aqui podemos descidir quantos serviços terá no site. Hoje o BD só aceita 3 -> tentar mudar para uma constante
foreach($servicos as $servico) {

    $idSetorImagem = $_POST['idSetorImagem' . $servico];

    if(!empty($_FILES['imagem' . $servico])) {

        //Atualizando a imagem do serviço
        $imagem = $_FILES['imagem' . $servico]['tmp_name'];
        $tamanho = $_FILES['imagem' . $servico]['size'];
        $formatoImagem = $_FILES['imagem' . $servico]['type'];
        $nmOriginalImagem = $_FILES['imagem' . $servico]['name'];

        if ( $imagem != "none" && $tamanho > 0 ) {
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
                                        WHERE idSetorImagem = {$idSetorImagem} AND idSite = " . $_SESSION['idSite']);
        } else {
            $dados = "";
        }
    }

    $dados .= " tituloImagem      = '{$_POST['tituloImagem' . $servico]}',
                dsImagem          = '{$_POST['dsImagem' . $servico]}'
            ";

    $sql = mysqli_query($conn, "UPDATE tbgaleria 
                                    SET {$dados}
                                    WHERE idSetorImagem = {$idSetorImagem} AND idSite = " . $_SESSION['idSite']);

}

$_SESSION['setor'] = 3;
header("location: ../../index.php");

?>