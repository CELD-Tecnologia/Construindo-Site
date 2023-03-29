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

	$_SESSION['cd_site'] = $cd_site;

	$sql = mysqli_query($conn, "SELECT sites.*, sites_css.*
								FROM sites 
								INNER JOIN sites_css ON sites_css.cd_site_css = sites.cd_site_css
								WHERE cd_site = " . $cd_site);
    while($row = mysqli_fetch_assoc($sql)){
        $status = $row['site_status'];
        $googleAnalytics = $row['site_google_analytics'];
        $nomeSite = $row['site_nome_exibicao'];
		$titulo = $row['site_titulo'];
		$descricao = $row['site_descricao'];
		$keyword = $row['site_keyword'];
		$site = $row['site_dominio'];
		$principalTitulo = $row['site_principal_titulo'];
		$principalSubtitulo = $row['site_principal_subtitulo'];
		$principalDescricao = $row['site_principal_descricao'];
		$whats = $row['site_whats'];
		$telefone = $row['site_telefone'];
		$facebook = $row['site_facebook'];
		$instagram = $row['site_instagram'];
		$servicoTitulo = $row['site_servico_titulo'];
		$servicoSubtitulo = $row['site_servico_subtitulo'];
		$servicoFoto01Titulo = $row['site_servico_foto_titulo_01'];
		$servicoFoto01Descricao = $row['site_servico_foto_descricao_01'];
		$servicoFoto02Titulo = $row['site_servico_foto_titulo_02'];
		$servicoFoto02Descricao = $row['site_servico_foto_descricao_02'];
		$servicoFoto03Titulo = $row['site_servico_foto_titulo_03'];
		$servicoFoto03Descricao = $row['site_servico_foto_descricao_03'];
		$quemsomosTitulo = $row['site_quem_somos_titulo'];
		$quemsomosSubtitulo = $row['site_quem_somos_subtitulo'];
		$quemsomosFoto01Titulo = $row['site_quem_somos_foto_titulo_01'];
		$quemsomosFoto01Subtitulo = $row['site_quem_somos_foto_subtitulo_01'];
		$areadeatuacaoTitulo = $row['site_area_atuacao_titulo'];
		$areadeatuacaoSubtitulo = $row['site_area_atuacao_subtitulo'];
        $fraseMunicipio = $row['site_area_atuacao_frase'];
		$galeriaTitulo = $row['site_galeria_titulo'];
		$galeriaSubtitulo = $row['site_galeria_subtitulo'];
		$email = $row['site_email'];
		$icVideo = $row['site_possui_video'];
		$video = $row['site_video'];
		$cdCSS = $row['site_css_caminho'];
	}

    $querySelecionaPorCodigo = "SELECT * FROM imagens WHERE cd_site = " . $cd_site;
    $resultado = mysqli_query($conn, $querySelecionaPorCodigo);
    $imagens = array(); //FAZER O FAVOR DE ARRUMAR ESTA PORCARIA DE CÓDIGO KKKKK
    while($row = mysqli_fetch_assoc($resultado)){
       $imagens[$row['cd_imagem_setor']][] = $row;
    }

    $favicon = current($imagens[0]);
    $banners = $imagens[1];
    $principal = current($imagens[2]);
    $servico01 = current($imagens[3]);
    $servico02 = current($imagens[4]);
    $servico03 = current($imagens[5]);
    $quemSomos = current($imagens[6]);
    $galeria = $imagens[7];

    $sql = "SELECT * FROM sites_area_atuacao WHERE cd_site = " . $cd_site;
    $resultado = mysqli_query($conn, $sql);
    $areasAtuacao = array(); //FAZER O FAVOR DE ARRUMAR ESTA PORCARIA DE CÓDIGO KKKKK
    while($row = mysqli_fetch_assoc($resultado)){
        $areasAtuacao[$row['site_area_atuacao_coluna']][] = $row;
    }

?>

<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
		<meta name="keyword" content="<?php echo $keyword; ?>">
		<meta name="description" content="<?php echo $descricao; ?>">
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
					<a class="navbar-brand" href="http://<?php echo $site; ?>.com.br"><span><?php echo $nomeSite; ?></span></a>
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
						
						<li>
							<a href="#servicos" class="smoothScroll"><?php echo $servicoTitulo; ?></a>
						</li>
						
						<li>
							<a href="#sobreNos" class="smoothScroll"><?php echo $quemsomosTitulo; ?></a>
						</li>
						
						<li>
							<a href="#atuacao" class="smoothScroll"><?php echo $areadeatuacaoTitulo; ?></a>
						</li>
						
						<li>
							<a href="#galeria" class="smoothScroll"><?php echo $galeriaTitulo; ?></a>
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
					<div class="col-md-5">
					    <img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $principal['imagem'] ) . '"';?>>
					</div>
					<div class="col-md-7">
						<h3 class="text-left"><?php echo $principalTitulo; ?></h3>
						<h4 class="text-justify"><?php echo $principalSubtitulo; ?></h4>
						<p class="text-justify"><?php echo $principalDescricao; ?></p>
						<hr>
						<a href="https://api.whatsapp.com/send?phone=55<?php echo $whats; ?>&amp;text=Olá!" target="_blank"><i class="fa fa-3x fa-fw fa-whatsapp text-success"></i></a>
						<a href="tel:<?php echo $telefone; ?>" class="hidden-lg hidden-md" target="_blank"><i class="fa fa-3x fa-fw fa-phone-square text-warning"></i></a>
						<a href="https://www.facebook.com/<?php echo $facebook; ?>" target="_blank"><i class="fa fa-3x fa-facebook-official fa-fw"></i></a>
						<a href="https://www.instagram.com/<?php echo $instagram; ?>" target="_blank"><i class="-official fa fa-3x fa-fw fa-instagram text-danger"></i></a>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section background" id="servicos">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3 class="text-center"><?php echo $servicoTitulo?>
							<small>&nbsp;
								<br>
								<br><?php echo $servicoSubtitulo?></small>
						</h3>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<hr>
					</div>
				</div>
			</div>
			
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $servico01['imagem'] ) . '"';?>>
						<h4><?php echo $servicoFoto01Titulo; ?></h4>
						<p class="text-justify"><?php echo $servicoFoto01Descricao; ?></p>
					</div>
					
					<div class="col-md-4">
						<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $servico02['imagem'] ) . '"';?>>
						<h4><?php echo $servicoFoto02Titulo; ?></h4>
						<p class="text-justify"><?php echo $servicoFoto02Descricao; ?></p>
					</div>
					
					<div class="col-md-4">
						<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $servico03['imagem'] ) . '"';?>>
						<h4><?php echo $servicoFoto03Titulo; ?></h4>
						<p class="text-justify"><?php echo $servicoFoto03Descricao; ?>&nbsp;</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section background" id="sobreNos">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3><?php echo $quemsomosTitulo; ?>
							<small>&nbsp;
							<br>
							<br><?php echo $quemsomosSubtitulo; ?></small>
						</h3>
						<hr>
					</div>
				</div>
			</div>
			
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						
						<?php
						if($icVideo == "1"){?>
							<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						<?php
						} else {
						?>
							<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $quemSomos['imagem'] ) . '"';?>>
						<?php
						}
						?>
						
					</div>
					<div class="col-md-6">
						<h3><?php echo $quemsomosFoto01Titulo; ?></h3>
						<p class="text-justify"><?php echo $quemsomosFoto01Subtitulo; ?></p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section" id="atuacao">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3 class="text-center"><?php echo $areadeatuacaoTitulo;?>
							<small>&nbsp;
							<br>
							<br><?php echo $areadeatuacaoSubtitulo;?></small>
						</h3>
						<hr>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<h4 class="text-left"><?php echo $fraseMunicipio; ?></h4>
					</div>
				</div>
				<br>
				<div class="row">
					<?php $rows = array(1, 2, 3, 4); ?>
					<?php foreach($rows as $row): ?>
						<div class="col-md-3 estilo-link">
							<?php
							if(!empty($areasAtuacao[$row])):
								foreach($areasAtuacao[$row] as $areaAtuacao):
							?>
								<h5>
									<?php if($areaAtuacao['site_area_atuacao_possui_sub'] == 1) {?>
										<a target="_blank" href="subarea.php?idAreaAtuacao=<?php echo $areaAtuacao['cd_site_area_atuacao']; ?>&descricao=<?php echo $areaAtuacao['site_area_atuacao_nome'] . " " . $telefone . " " . $whats; ?>"><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $areaAtuacao['site_area_atuacao_nome']; ?></a>
									<?php }else{ ?>
										<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $areaAtuacao['site_area_atuacao_nome']; ?></a>
									<?php } ?>
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
					<img src="http://construindosite.com.br/_images/cartoesGeral.jpg" class="img-responsive">
				</div>
			</div>
		</div>
	
		<div class="section" id="galeria">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3 class="text-center"><?php echo $galeriaTitulo; ?>&nbsp;
							<small>
							<br>
							<br><?php echo $galeriaSubtitulo; ?></small>
						</h3>
						<hr>
					</div>


				<?php $i = 3; ?>
				<?php
					$active = 'data-target="#fotoAmpliada"';
                    foreach ($galeria as $foto):
				?>
					<?php if ($i == 3) {?>
					    <div class="row">
					<?php } ?>

						<div class="col-md-4 titulocor">
							<a href="#" data-toggle="modal" data-target="#fotoAmpliada"><img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:' . $foto['imagem_formato'] . ';base64,' . base64_encode( $foto['imagem'] ) . '"'; ?><?php echo $active; ?>></a>
							<hr>
						</div>

						<?php $active = ""; $i--; ?>

					<?php if ($i == 0) {?>
						</div>
					<?php $i=3; }  ?>

				<?php
					endforeach;
				?>
                    </div>
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
	
		<div class="modal fade" id="fotoAmpliada">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Galeria</h4>
					</div>
					
					<div class="modal-body">
						<div id="fullcarousel-exampleModal" data-interval="5000" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">

							<?php
								$active = 'active';
                                foreach ($galeria as $foto):
							?>
								<div class="item <?php echo $active; ?>">
									<img <?php echo 'src="data:' . $foto['imagem_formato'] . ';base64,' . base64_encode( $foto['imagem'] ) . '"'; ?>>
								</div>

								<?php $active = ""; ?>

							<?php
								endforeach;
							?>
						
							<a class="left carousel-control" href="#fullcarousel-exampleModal" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
							<a class="right carousel-control" href="#fullcarousel-exampleModal" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
						</div>
					</div>
					<div class="modal-footer">
						<a class="btn btn-default" data-dismiss="modal">Fechar</a>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>