<?php
    if(!isset($_SESSION)) { session_start(); }
    include_once("../../_php/conexao.php");

	$dtCriacao = date('Y-m-d');
    $cd_usuario = $_SESSION['cd_usuario'];

	$idProfissao = 1; //Montador de Móveis
	$dominio = "montador123";

    //cadastrar site na tabela do site
        //verificar se domínio ja existe - inserir em JS no modal da criação
        $sql = mysqli_query($conn, "INSERT INTO sites (cd_usuario, dtCriacao, site) VALUES ($cd_usuario, '$dtCriacao', '$dominio')");
    
    //inserir imagens na tabela de imagens
        //Recuperar o ID do site
        $idSite = mysqli_insert_id($conn);

        //Favicon
        $idSetorImagem = 0;
        $tituloImagem = "Favicon";
        $dsImagem = "Favicon";
        $nmOriginalImagem = "favicon.jpg"; 
        $tamanhoImagem = "27399"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/favicon.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");

        //Banner 01
        $idSetorImagem = 1;
        $tituloImagem = "Banner 01";
        $dsImagem = "Banner 01";
        $nmOriginalImagem = "banner01.jpg"; 
        $tamanhoImagem = "242258"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/banner01.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");

        //Banner 02
        $idSetorImagem = 1;
        $tituloImagem = "Banner 02";
        $dsImagem = "Banner 02";
        $nmOriginalImagem = "banner02.jpg"; 
        $tamanhoImagem = "301969"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/banner02.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");

        //PRINCIPAL
        $idSetorImagem = 2;
        $tituloImagem = "Logo";
        $dsImagem = "Logo";
        $nmOriginalImagem = "logo.jpg"; 
        $tamanhoImagem = "27399"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/logo.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");

        //SERVICO 01
        $idSetorImagem = 3;
        $tituloImagem = "Serviço 01";
        $dsImagem = "Serviço 01";
        $nmOriginalImagem = "servico01.jpg"; 
        $tamanhoImagem = "25753"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/servico01.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");

        //SERVICO 02
        $idSetorImagem = 4;
        $tituloImagem = "Serviço 02";
        $dsImagem = "Serviço 02";
        $nmOriginalImagem = "servico02.jpg"; 
        $tamanhoImagem = "28305"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/servico02.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");

        //SERVICO 03
        $idSetorImagem = 5;
        $tituloImagem = "Serviço 03";
        $dsImagem = "Serviço 03";
        $nmOriginalImagem = "servico03.jpg"; 
        $tamanhoImagem = "17490"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/servico03.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");

        //QUEM SOMOS
        $idSetorImagem = 6;
        $tituloImagem = "Quem Somos";
        $dsImagem = "Quem Somos";
        $nmOriginalImagem = "quemsomos.jpg"; 
        $tamanhoImagem = "27399"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/quemsomos.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");

        //GALERIA
        $idSetorImagem = 7;
        $tituloImagem = "Galeria";
        $dsImagem = "Galeria";
        $nmOriginalImagem = "galeria.jpg"; 
        $tamanhoImagem = "29246"; 
        $formatoImagem = "image/jpeg"; 

        $fp = fopen("_imagemMontador/galeria.jpg", "rb");
        $imagem = fread($fp, $tamanhoImagem);
        $imagem = addslashes($imagem);
        fclose($fp);

        for ($i = 1; $i <= 9; $i++) {
            $sql = mysqli_query($conn, "INSERT INTO tbgaleria (idSite, idSetorImagem, imagem, tituloImagem, dsImagem, nmOriginalImagem, tamanhoImagem, formatoImagem) VALUES ($idSite, $idSetorImagem, '$imagem', '$tituloImagem', '$dsImagem', '$nmOriginalImagem', '$tamanhoImagem', '$formatoImagem')");
        }

    echo '<meta http-equiv="refresh" content="0;url=../sites.php">';
?>