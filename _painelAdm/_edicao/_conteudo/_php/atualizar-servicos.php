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
        
    $sql = mysqli_query($conn, "UPDATE tbsite 
                                SET {$dados}
                                WHERE idSite = " . $_SESSION['idSite']);

    $_SESSION['setor'] = 3;
    header("location: ../../index.php");

?>