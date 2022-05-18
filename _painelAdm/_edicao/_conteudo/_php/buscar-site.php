<?php
    //header('Content-Type: text/html; charset=utf-8');

    session_start();
    $idSite = $_SESSION['idSite'];

    if(empty($idSite)) {
        //Site não selecionado, deve retornar a tela de gestão de sites
        //Aqui deverá ser inserida toda a segurança do editor, já que esta tela será executada sempre
    }

    $setor = $_SESSION['setor'];
    if(empty($setor)) {
        $setor = 0;
    }

    /*
    Imagens
    0 - favicon
    1 - banner
    2 - principal
    3 - servico
    4 - servico
    5 - servico
    6 - Quem Somos
    7 - Galeria
    */
    switch($setor) {
        case 1: //Principal
            $dadosSite = 'principalDescricao, principalSubtitulo, principalTitulo';
            $setorImagem = ' idSetorImagem = 2 ';
            break;

        case 2: //Banner
            $dadosSite = 'idSite';
            $setorImagem = ' idSetorImagem = 1 ';
            break;

        case 3: //Serviço
            $dadosSite = 'servicoTitulo, servicoSubtitulo, servicoFoto01Titulo, servicoFoto01Descricao, servicoFoto02Titulo, servicoFoto02Descricao, servicoFoto03Titulo, servicoFoto03Descricao';
            $setorImagem = ' idSetorImagem IN(3, 4, 5) ';
            break;

        case 5: //Galeria
            $dadosSite = 'idSite';
            $setorImagem = ' idSetorImagem = 7 ';
            break;

        case 6: //Configurações
            $dadosSite = 'titulo, descricao, keyword, cdCSS';
            $setorImagem = ' idSetorImagem = 0 ';
            break;

        default: //Sem distinção
            $dadosSite = '*';
            $setorImagem = ' 1 ';
            break;
    }

    $PDO = new PDO('mysql:host=criadordesite.mysql.uhserver.com;dbname=criadordesite;charset=utf8', 'celdtecnologia', 'marinhaBrasil@1' );

    $sql = "SELECT {$dadosSite} FROM tbsite WHERE idSite = '{$idSite}'";
    $result = $PDO->query( $sql );
    $site = $result->fetch();

    $sql = "SELECT * FROM tbgaleria WHERE {$setorImagem} AND idSite = '{$idSite}'";
    $result = $PDO->query( $sql );

    //Aqui define se retorna uma ou mais imagens na consulta
    if($setor == 1 || $setor == 6){
        $imagensSite = $result->fetch();
    } else {
        $imagensSite = $result->fetchAll();
    }

    //var_dump('<pre>' . print_r($imagensSite,1) . '</pre>');
    //die();

?>