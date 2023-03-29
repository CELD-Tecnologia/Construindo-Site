<?php
	$cd_site = 0;
	$cd_template = 0;
	$template_versao = 0;
	if(file_exists("config.php")) {
		require("config.php");
		$cd_site = $config['cd_site'];
		$cd_template = $config['cd_template'];
		$template_versao = $config['template_versao'];
	}
	
	header('Content-Type: text/html; charset=utf-8');

	$servidor = "criadordesite.mysql.uhserver.com";
	$usuario = "celdtecnologia";
	$senha = "marinhaBrasil@1";
	$dbname = "criadordesite";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	/*codificação dos caracteres para acentuação*/
	mysqli_query($conn, "SET NAMES 'utf8'");
	mysqli_query($conn, 'SET character_set_connection=utf8');
	mysqli_query($conn, 'SET character_set_client=utf8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	
	$sql = mysqli_query($conn, "SELECT cd_update, update_php FROM updates ORDER BY cd_update DESC LIMIT 1") or die();
	while($row = mysqli_fetch_assoc($sql)){
		$cd_update = $row['cd_update'];
		$update_php = $row['update_php'];
	}

	if(empty($config) || empty($config['cd_update']) || $config['cd_update'] < $cd_update) {

		if(file_exists("update.php")) {
			unlink("update.php");
		}

		$arquivo = fopen('update.php', 'w');
		fwrite($arquivo, $update_php);
		fclose($arquivo);

		if(file_exists("config.php")) {
			unlink("config.php");
		}

		$conteudo = "<?php 
						\$config = array(
							'cd_site' => {$cd_site},
							'cd_template' => {$cd_template},
							'template_versao' => {$template_versao},
							'cd_update' => {$cd_update}
						);
						return \$config;
					?>";
		
		$arquivo = fopen('config.php', 'w');
		fwrite($arquivo, $conteudo);
		fclose($arquivo);

		header('Location: update.php');
	}
?>