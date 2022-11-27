<?php
    if(!isset($_SESSION)) { session_start(); }
    $cd_site = $_SESSION['cd_site'];

    if(empty($cd_site)) {
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
            $dadosSite = 'site_principal_titulo, site_principal_subtitulo, site_principal_descricao';
            $setorImagem = ' cd_imagem_setor = 2 ';
            break;

        case 2: //Banner
            $dadosSite = 'cd_site';
            $setorImagem = ' cd_imagem_setor = 1 ';
            break;

        case 3: //Serviço
            $dadosSite = 'site_servico_titulo, site_servico_subtitulo, site_servico_foto_titulo_01, site_servico_foto_descricao_01, site_servico_foto_titulo_02, site_servico_foto_descricao_02, site_servico_foto_titulo_03, site_servico_foto_descricao_03';
            $setorImagem = ' cd_imagem_setor IN(3, 4, 5) ';
            break;

        case 4: //Quem Somos
            $dadosSite = 'site_quem_somos_titulo, site_quem_somos_subtitulo, site_quem_somos_foto_titulo_01, site_quem_somos_foto_subtitulo_01, site_possui_video, site_video';
            $setorImagem = ' cd_imagem_setor = 6 ';
            break;

        case 5: //Galeria
            $dadosSite = 'site_galeria_titulo, site_galeria_subtitulo';
            $setorImagem = ' cd_imagem_setor = 7 ';
            break;

        case 6: //Configurações
            $dadosSite = 'site_google_analytics, site_titulo, site_descricao, site_keyword, cd_site_css';
            $setorImagem = ' cd_imagem_setor = 0 ';
            break;

        default: //Sem distinção
            $dadosSite = '*';
            $setorImagem = ' 1 ';
            break;
    }

    $PDO = new PDO('mysql:host=criadordesite.mysql.uhserver.com;dbname=criadordesite;charset=utf8', 'celdtecnologia', 'marinhaBrasil@1' );

    $sql = "SELECT {$dadosSite} FROM sites WHERE cd_site = '{$cd_site}'";
    $result = $PDO->query( $sql );
    $site = $result->fetch();

    $sql = "SELECT * FROM imagens WHERE {$setorImagem} AND cd_site = '{$cd_site}'";
    $result = $PDO->query( $sql );

    //Aqui define se retorna uma ou mais imagens na consulta
    if($setor == 1 || $setor == 6 || $setor == 4){
        $imagensSite = $result->fetch();
    } else {
        $imagensSite = $result->fetchAll();
    }

?>