<?php
	if(!isset($_SESSION)) { session_start(); }

	if(file_exists("conexao.php")) {
		include_once("conexao.php");
	} else {
		include_once("../../_php/conexao.php");
	}

	if(file_exists("config.php")) {
		require("config.php");
		$cd_site = $config['cd_site'];
	} else if(!empty($_GET['cd_site'])) {
		$cd_site = $_GET['cd_site'];
	} else if(!empty($_SESSION['cd_site'])) {
		$cd_site = $_SESSION['cd_site'];
	}

	$idAreaAtuacao = $_GET['idAreaAtuacao'];

	$sql = mysqli_query($conn, "SELECT site_titulo, site_descricao, site_keyword, site_dominio, site_whats, site_telefone, site_facebook, site_instagram, site_email, sites_css.site_css_caminho 
								FROM sites 
								INNER JOIN sites_css ON sites_css.cd_site_css = sites.cd_site_css
								WHERE cd_site = " . $cd_site);
    while($row = mysqli_fetch_array($sql)){
		$titulo = $row['site_titulo'];
		$descricao = $row['site_descricao'];
		$keyword = $row['site_keyword'];
		$site = $row['site_dominio'];
		$whats = $row['site_whats'];
		$telefone = $row['site_telefone'];
		$facebook = $row['site_facebook'];
		$instagram = $row['site_instagram'];
		$email = $row['site_email'];
		$cdCSS = $row['site_css_caminho'];
	}

	$sql = mysqli_query($conn, "SELECT sites_area_atuacao.* FROM sites_area_atuacao WHERE cd_site_area_atuacao = " . $idAreaAtuacao);
    while($row = mysqli_fetch_array($sql)){
		$siteAreaAtuacao = $row;
	}
	
	if($cd_site != $siteAreaAtuacao['cd_site']){
		echo "<script>alert('Área de atuação inválida!');</script>";
		echo '<meta http-equiv="refresh" content="0;url='.$dominio.'.com.br/">';
	}

	$querySelecionaPorCodigo = "SELECT * FROM imagens WHERE cd_imagem_setor IN (0, 1) AND cd_site = " . $cd_site;
    $resultado = mysqli_query($conn, $querySelecionaPorCodigo);
    $imagens = array(); //FAZER O FAVOR DE ARRUMAR ESTA PORCARIA DE CÓDIGO KKKKK
    while($row = mysqli_fetch_array($resultado)){
       $imagens[$row['cd_imagem_setor']][] = $row;
    }

    $favicon = current($imagens[0]);
    $banners = $imagens[1];

	$sql = "SELECT * FROM sites_area_atuacao_sub WHERE cd_site_area_atuacao = " . $idAreaAtuacao;
    $resultado = mysqli_query($conn, $sql);
    $areasAtuacaoSub = array();
    while($row = mysqli_fetch_array($resultado)){
        $areasAtuacaoSub[$row['site_area_atuacao_sub_coluna']][] = $row;
    }

?>

<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $siteAreaAtuacao['site_area_atuacao_titulo']; ?></title>
		<meta name="keyword" content="<?php echo $siteAreaAtuacao['site_area_atuacao_descricao']; ?>">
		<meta name="description" content="<?php echo $siteAreaAtuacao['site_area_atuacao_keyword']; ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://construindosite.com.br/_css/<?php echo $cdCSS; ?>/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" <?php echo 'href="data:image/jpeg;base64,' . base64_encode( $favicon['imagem'] ) . '"';?> type="image/x-icon" />

	</head>
  
	<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
		
		<div class="navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><span><?php echo $titulo; ?></span></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-ex-collapse">
					<script>
						$(function(){ 
							var navMain = $("#navbar-ex-collapse");
							navMain.on("click", "a", null, function () {
								navMain.collapse('hide');
							});
						});			
					</script>		
					
					<ul class="nav navbar-nav navbar-right">
						<li class="active hidden-sm hidden-xs">
							<a href="#home" class="smoothScroll">Principal</a>
						</li>
						
						<li class="active hidden-lg hidden-md">
							<a href="#homeMobile" class="smoothScroll">Principal</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		
		<div class="carousel hidden-sm hidden-xs slide" id="fullcarousel-example" data-interval="5000" data-ride="carousel">
			<div id="home" class="carousel-inner">

				<?php
					$active = "active";
                    foreach ($banners as $banner):
				?>
					<div class="item <?php echo $active ?>">
						<?php echo '<img src="data:' . $banner['imagem_formato'] . ';base64,' . base64_encode( $banner['imagem'] ) . '" />'; ?>
					</div>
				<?php
					$active = "";
					endforeach;
				?>
				
			</div>
			
			<a class="left carousel-control" href="#fullcarousel-example" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
			<a class="right carousel-control" href="#fullcarousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
		</div>
		
		<div class="carousel hidden-lg hidden-md slide" id="fullcarousel-exampleMobile" data-interval="5000" data-ride="carousel">
			<div id="homeMobile" class="carousel-inner">
                <?php
                $active = "active";
                foreach ($banners as $banner):
                    ?>
                    <div class="item <?php echo $active ?>">
                        <?php echo '<img src="data:' . $banner['imagem_formato'] . ';base64,' . base64_encode( $banner['imagem'] ) . '" />'; ?>
                    </div>
                    <?php
                    $active = "";
                endforeach;
                ?>
			</div>
			
			<a class="left carousel-control" href="#fullcarousel-example" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
			<a class="right carousel-control" href="#fullcarousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
		</div>
		
		<div class="hidden-lg hidden-md section">
			<div class="container"></div>
		</div>
		
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="text-center"><?php echo $siteAreaAtuacao['site_area_atuacao_titulo']; ?>
							<small>
							<br>
							<br><?php echo $siteAreaAtuacao['site_area_atuacao_descricao']; ?></small>
						</h1>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section" id="atuacao">
			<div class="container">
				<div class="row">
					<?php $rows = array(1, 2, 3, 4); ?>
					<?php foreach($rows as $row): ?>
						<div class="col-md-3 estilo-link">
							<?php
							if(!empty($areasAtuacaoSub[$row])):
								foreach($areasAtuacaoSub[$row] as $areaAtuacaoSub):
							?>
								<h5>
									<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $areaAtuacaoSub['site_area_atuacao_sub_nome']; ?></a>
								</h5>
							<?php
								endforeach;
							endif;
							?>
						</div>
					<?php endforeach; ?>
                </div>
			</div>
		</div>

		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h4>Aceitamos Cartões Débito e Crédito</h4>
						<hr>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<img src="http://construindosite.com.br/_images/cartoesGeral.jpg" alt="Aceitamos todos os Cartões" title="Aceitamos todos os Cartões" class="img-responsive">
				</div>
			</div>
		</div>

		<div class="tab-content">
			<div class="tab-pane fade in active" id="home"></div>
		</div>
		
		<footer class="estilo-rodape section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 font-site text-justify">
						<hr class="hidden-lg hidden-md">
						<h4 class="estilo-fonte2 text-center"><?php echo $titulo; ?></h4>
						<hr class="hidden-sm hidden-xs">
						<p class="estilo-fonte2 text-center"><?php echo $site; ?></p>
					</div>
					
					<div class="col-md-4 col-sm-6 font-site text-justify">
						<hr class="hidden-lg hidden-md">
						<h4 class="estilo-fonte2 text-center">Contatos</h4>
						<hr class="hidden-sm hidden-xs">
						<p class="estilo-fonte2 text-center">WhatsApp: &nbsp;<?php echo $whats; ?>
							<br>
						</p>
						<p class="estilo-fonte2 text-center">Telefone: &nbsp;<?php echo $telefone; ?></p>
						<p class="estilo-fonte2 text-center">E-mail: <?php echo $email; ?></p>
					</div>
					
					<div class="col-sm-6 col-md-4">
						<hr class="hidden-lg hidden-md">
						<h4 class="estilo-fonte2 text-center">Redes Sociais</h4>
						<hr class="hidden-sm hidden-xs">
						<div class="row">
							<div class="col-md-12 hidden-lg hidden-md hidden-sm text-center">
								<a href="https://api.whatsapp.com/send?phone=55<?php echo $whats; ?>&amp;text=Olá!" target="_blank"><i class="fa fa-2x fa-fw fa-whatsapp text-success"></i></a>
								<a href="tel:<?php echo $telefone; ?>" class="hidden-lg hidden-md" target="_blank"><i class="fa fa-2x fa-fw fa-phone-square text-warning"></i></a>
								<a href="https://www.facebook.com/<?php echo $facebook; ?>" target="_blank"><i class="fa fa-2x fa-facebook-official fa-fw text-primary"></i></a>
								<a href="https://www.instagram.com/<?php echo $instagram; ?>" target="_blank"><i class="-official fa fa-2x fa-fw fa-instagram text-danger"></i></a>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12 hidden-xs text-center">
								<a href="tel:<?php echo $telefone; ?>" class="hidden-lg hidden-md" target="_blank"><i class="fa fa-2x fa-fw fa-phone-square text-warning"></i></a>
								<a href="https://www.facebook.com/<?php echo $facebook; ?>" target="_blank"><i class="fa fa-2x fa-facebook fa-fw text-primary"></i></a>
								<a href="https://api.whatsapp.com/send?phone=55<?php echo $whats; ?>&amp;text=Olá!" target="_blank"><i class="fa fa-2x fa-fw fa-whatsapp text-success"></i></a>
								<a href="https://www.instagram.com/<?php echo $instagram; ?>" target="_blank"><i class="fa fa-2x fa-fw fa-instagram text-danger"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
    
		<div class="estilo-copy section">
			<div class="container">
				<div class="row">
					<div class="col-md-6 hidden-sm hidden-xs text-left">
						<h5 class="text-left">
							<a href="https://www.celdtecnologia.com.br/" target="_blank">Desenvolvido por CELD Tecnologia </a>
						</h5>
					</div>
					
					<div class="col-md-6 text-left">
						<h5 class="text-right">
							<a href="https://www.celdtecnologia.com.br/" target="_blank">CELD Tecnologia | Soluções em TI</a>
							<a href="https://www.facebook.com/celdtecnologia/" target="_blank"><i class="fa fa-facebook-official fa-fw fa-lg"></i></a>
						</h5>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>