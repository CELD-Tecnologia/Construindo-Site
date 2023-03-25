<?php
	$resposta = array();
	if(!isset($_SESSION)) { session_start(); }
	include_once("../../_php/conexao.php");

	$nome = $_POST['nome'];
	$dominio = $_POST['dominio'];
	$dtCriacao = date('Y-m-d');
	$cd_usuario = $_SESSION['cd_usuario'];

	$cd_site = 0;
	$sql = mysqli_query($conn, "SELECT cd_site FROM sites WHERE site_dominio = '" . $dominio . "'") or die(mysqli_error());
	while($row = mysqli_fetch_array($sql)){
		$cd_site = $row['cd_site'];
	}

	if($cd_site > 0) {
		$resposta = array(
			'resposta' => 'erro',
			'mensagem' => 'Domínio já cadastrado.'
		);
		echo json_encode($resposta);
		return;
	}

    $sql = mysqli_query($conn, "INSERT INTO sites (cd_usuario, site_data_criacao, site_nome_exibicao, site_dominio) VALUES ($cd_usuario, '$dtCriacao', '$nome', '$dominio')");
	$cd_site = mysqli_insert_id($conn);

	//Favicon
	$cd_imagem_setor = 0;
	$imagem_titulo = "Favicon";
	$imagem_descricao = "Favicon";
	$imagem_nome_original = "favicon.jpg"; 
	$imagem_tamanho = "27399"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/favicon.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");

	//Banner 01
	$cd_imagem_setor = 1;
	$imagem_titulo = "Banner 01";
	$imagem_descricao = "Banner 01";
	$imagem_nome_original = "banner01.jpg"; 
	$imagem_tamanho = "242258"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/banner01.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");

	//Banner 02
	$cd_imagem_setor = 1;
	$imagem_titulo = "Banner 02";
	$imagem_descricao = "Banner 02";
	$imagem_nome_original = "banner02.jpg"; 
	$imagem_tamanho = "301969"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/banner02.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");

	//PRINCIPAL
	$cd_imagem_setor = 2;
	$imagem_titulo = "Logo";
	$imagem_descricao = "Logo";
	$imagem_nome_original = "logo.jpg"; 
	$imagem_tamanho = "27399"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/logo.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");

	//SERVICO 01
	$cd_imagem_setor = 3;
	$imagem_titulo = "Serviço 01";
	$imagem_descricao = "Serviço 01";
	$imagem_nome_original = "servico01.jpg"; 
	$imagem_tamanho = "25753"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/servico01.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");

	//SERVICO 02
	$cd_imagem_setor = 4;
	$imagem_titulo = "Serviço 02";
	$imagem_descricao = "Serviço 02";
	$imagem_nome_original = "servico02.jpg"; 
	$imagem_tamanho = "28305"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/servico02.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");

	//SERVICO 03
	$cd_imagem_setor = 5;
	$imagem_titulo = "Serviço 03";
	$imagem_descricao = "Serviço 03";
	$imagem_nome_original = "servico03.jpg"; 
	$imagem_tamanho = "17490"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/servico03.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");

	//QUEM SOMOS
	$cd_imagem_setor = 6;
	$imagem_titulo = "Quem Somos";
	$imagem_descricao = "Quem Somos";
	$imagem_nome_original = "quemsomos.jpg"; 
	$imagem_tamanho = "27399"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/quemsomos.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");

	//GALERIA
	$cd_imagem_setor = 7;
	$imagem_titulo = "Galeria";
	$imagem_descricao = "Galeria";
	$imagem_nome_original = "galeria.jpg"; 
	$imagem_tamanho = "29246"; 
	$imagem_formato = "image/jpeg"; 

	$fp = fopen("_imagemMontador/galeria.jpg", "rb");
	$imagem = fread($fp, $imagem_tamanho);
	$imagem = addslashes($imagem);
	fclose($fp);

	for ($i = 1; $i <= 9; $i++) {
		$sql = mysqli_query($conn, "INSERT INTO imagens (cd_site, cd_imagem_setor, imagem, imagem_titulo, imagem_descricao, imagem_nome_original, imagem_tamanho, imagem_formato) VALUES ($cd_site, $cd_imagem_setor, '$imagem', '$imagem_titulo', '$imagem_descricao', '$imagem_nome_original', '$imagem_tamanho', '$imagem_formato')");
	}

	$resposta = array(
		'resposta' => 'sucesso',
		'cd_site' => $cd_site,
		'data_criacao' => date('d/m/Y', strtotime($site['site_data_criacao'])),
		'template' => '1'
	);

	echo json_encode($resposta);
?>