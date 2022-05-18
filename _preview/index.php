<?php
	session_start();
	include_once("../_php/conexao.php");
	$idSite = $_GET['idSite'];
	$_SESSION['idSite'] = $idSite;
	
	$sql = mysqli_query($conn, "SELECT titulo, descricao, keyword, site, nomeSite, principalTitulo, principalSubtitulo, principalDescricao, 
	whats, telefone, facebook, instagram, servicoTitulo, servicoSubtitulo, servicoFoto01Titulo, servicoFoto01Descricao, servicoFoto02Titulo, 
	servicoFoto02Descricao, servicoFoto03Titulo, servicoFoto03Descricao, quemsomosTitulo, quemsomosSubtitulo, quemsomosFoto01Titulo, quemsomosFoto01Subtitulo, 
	areadeatuacaoTitulo, areadeatuacaoSubtitulo, galeriaTitulo, galeriaSubtitulo, email, qtImagem, icVideo, video, fraseMunicipio, cdCSS 
	FROM tbsite WHERE idSite = " . $idSite);
    while($row = mysqli_fetch_array($sql)){
        $nomeSite = $row['nomeSite'];
		$titulo = $row['titulo'];
		$descricao = $row['descricao'];
		$keyword = $row['keyword'];
		$site = $row['site'];
		$principalTitulo = $row['principalTitulo'];
		$principalSubtitulo = $row['principalSubtitulo'];
		$principalDescricao = $row['principalDescricao'];
		$whats = $row['whats'];
		$telefone = $row['telefone'];
		$facebook = $row['facebook'];
		$instagram = $row['instagram'];
		$servicoTitulo = $row['servicoTitulo'];
		$servicoSubtitulo = $row['servicoSubtitulo'];
		$servicoFoto01Titulo = $row['servicoFoto01Titulo'];
		$servicoFoto01Descricao = $row['servicoFoto01Descricao'];
		$servicoFoto02Titulo = $row['servicoFoto02Titulo'];
		$servicoFoto02Descricao = $row['servicoFoto02Descricao'];
		$servicoFoto03Titulo = $row['servicoFoto03Titulo'];
		$servicoFoto03Descricao = $row['servicoFoto03Descricao'];
		$quemsomosTitulo = $row['quemsomosTitulo'];
		$quemsomosSubtitulo = $row['quemsomosSubtitulo'];
		$quemsomosFoto01Titulo = $row['quemsomosFoto01Titulo'];
		$quemsomosFoto01Subtitulo = $row['quemsomosFoto01Subtitulo'];
		$areadeatuacaoTitulo = $row['areadeatuacaoTitulo'];
		$areadeatuacaoSubtitulo = $row['areadeatuacaoSubtitulo'];
		$galeriaTitulo = $row['galeriaTitulo'];
		$galeriaSubtitulo = $row['galeriaSubtitulo'];
		$email = $row['email'];
		$icVideo = $row['icVideo'];
		$video = $row['video'];
		$fraseMunicipio = $row['fraseMunicipio'];
		$cdCSS = $row['cdCSS'];
	}
	
	if($icVideo == 1){
		$icVideo = "CHECKED";
	} else {
		$icVideo = "";
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
		<!-- Recuperando o FAVICON do BD -->
		<?php
			$querySelecionaPorCodigo = "SELECT imagem FROM tbgaleria WHERE idSetorImagem = 0 AND idSite = " . $_SESSION['idSite'];
			$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
			$row = mysqli_fetch_array($resultado);
		?>
		<link rel="icon" <?php echo 'href="data:image/jpeg;base64,' . base64_encode( $row['imagem'] ) . '"';?> type="image/x-icon" />
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
					$querySelecionaPorCodigo = "SELECT formatoImagem, imagem FROM tbgaleria WHERE idSite = $idSite AND idSetorImagem = 1";
					$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
					while($row = mysqli_fetch_array($resultado)){
				?>
					<div class="item <?php echo $active ?>">
						<?php echo '<img src="data:' . $row['formatoImagem'] . ';base64,' . base64_encode( $row['imagem'] ) . '" />'; ?>
					</div>
				<?php
					$active = "";
					}
				?>
				
			</div>
			
			<a class="left carousel-control" href="#fullcarousel-example" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
			<a class="right carousel-control" href="#fullcarousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
		</div>
		
		<div class="carousel hidden-lg hidden-md slide" id="fullcarousel-exampleMobile" data-interval="5000" data-ride="carousel">
			<div id="homeMobile" class="carousel-inner">
				<?php
					$active = "active";
					$querySelecionaPorCodigo = "SELECT formatoImagem, imagem FROM tbgaleria WHERE idSite = $idSite AND idSetorImagem = 1";
					$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
					while($row = mysqli_fetch_array($resultado)){
				?>
					<div class="item <?php echo $active ?>">
						<?php echo '<img src="data:' . $row['formatoImagem'] . ';base64,' . base64_encode( $row['imagem'] ) . '" />'; ?>
					</div>
				<?php
					$active = "";
					}
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
					<?php
						$querySelecionaPorCodigo = "SELECT imagem FROM tbgaleria WHERE idSetorImagem = 2 AND idSite = " . $_SESSION['idSite'];
						$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
						$row = mysqli_fetch_array($resultado);
					?>
						<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $row['imagem'] ) . '"';?>>
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
						<?php
						$querySelecionaPorCodigo = "SELECT imagem FROM tbgaleria WHERE idSetorImagem = 3 AND idSite = " . $_SESSION['idSite'];
						$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
						$row = mysqli_fetch_array($resultado);
						?>
						<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $row['imagem'] ) . '"';?>>
						<h4><?php echo $servicoFoto01Titulo; ?></h4>
						<p class="text-justify"><?php echo $servicoFoto01Descricao; ?></p>
					</div>
					
					<div class="col-md-4">
					<?php
						$querySelecionaPorCodigo = "SELECT imagem FROM tbgaleria WHERE idSetorImagem = 4 AND idSite = " . $_SESSION['idSite'];
						$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
						$row = mysqli_fetch_array($resultado);
						?>
						<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $row['imagem'] ) . '"';?>>
						<h4><?php echo $servicoFoto02Titulo; ?></h4>
						<p class="text-justify"><?php echo $servicoFoto02Descricao; ?></p>
					</div>
					
					<div class="col-md-4">
					<?php
						$querySelecionaPorCodigo = "SELECT imagem FROM tbgaleria WHERE idSetorImagem = 5 AND idSite = " . $_SESSION['idSite'];
						$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
						$row = mysqli_fetch_array($resultado);
						?>
						<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $row['imagem'] ) . '"';?>>
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
						if($icVideo == "CHECKED"){?>
							<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $video ?>" frameborder="0" allowfullscreen></iframe>
							</div>
						<?php
						}else{
						?>
							<?php
							$querySelecionaPorCodigo = "SELECT imagem FROM tbgaleria WHERE idSetorImagem = 6 AND idSite = " . $_SESSION['idSite'];
							$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
							$row = mysqli_fetch_array($resultado);
							?>
							<img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:image/jpeg;base64,' . base64_encode( $row['imagem'] ) . '"';?>>
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
					<div class="col-md-3 estilo-link">
						<?php
						$sql = mysqli_query($conn, "SELECT idAreaAtuacao, nmAreaAtuacao, comSubAreaAtuacao FROM tbareaatuacao WHERE coluna = 1 AND idSite = " . $idSite);
						while($row = mysqli_fetch_array($sql)){
							$idAreaAtuacao = $row['idAreaAtuacao'];
							$nmAreaAtuacao = $row['nmAreaAtuacao'];
							$comSubAreaAtuacao = $row['comSubAreaAtuacao'];
						?>
							<h5>
								<?php if($comSubAreaAtuacao == 1) {?>
									<a target="_blank" href="subarea.php?idAreaAtuacao=<?php echo $idAreaAtuacao; ?>&descricao=montador de moveis em <?php echo $nmAreaAtuacao . " " . $telefone . " " . $whats; ?>"><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmAreaAtuacao; ?></a>
								<?php }else{ ?>
									<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmAreaAtuacao; ?></a>
								<?php } ?>
							</h5>
						<?php
							}
						?>
					</div>
					
					<div class="col-md-3 estilo-link">
						<?php
						$sql = mysqli_query($conn, "SELECT idAreaAtuacao, nmAreaAtuacao, comSubAreaAtuacao FROM tbareaatuacao WHERE coluna = 2 AND idSite = " . $idSite);
						while($row = mysqli_fetch_array($sql)){
							$idAreaAtuacao = $row['idAreaAtuacao'];
							$nmAreaAtuacao = $row['nmAreaAtuacao'];
							$comSubAreaAtuacao = $row['comSubAreaAtuacao'];
						?>
							<h5>
								<?php if($comSubAreaAtuacao == 1) {?>
									<a target="_blank" href="subarea.php?idAreaAtuacao=<?php echo $idAreaAtuacao; ?>&descricao=montador de moveis em <?php echo $nmAreaAtuacao . " " . $telefone . " " . $whats; ?>"><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmAreaAtuacao; ?></a>
								<?php }else{ ?>
									<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmAreaAtuacao; ?></a>
								<?php } ?>
							</h5>
						<?php
							}
						?>
					</div>
					
					<div class="col-md-3 estilo-link">
						<?php
						$sql = mysqli_query($conn, "SELECT idAreaAtuacao, nmAreaAtuacao, comSubAreaAtuacao FROM tbareaatuacao WHERE coluna = 3 AND idSite = " . $idSite);
						while($row = mysqli_fetch_array($sql)){
							$idAreaAtuacao = $row['idAreaAtuacao'];
							$nmAreaAtuacao = $row['nmAreaAtuacao'];
							$comSubAreaAtuacao = $row['comSubAreaAtuacao'];
						?>
							<h5>
								<?php if($comSubAreaAtuacao == 1) {?>
									<a target="_blank" href="subarea.php?idAreaAtuacao=<?php echo $idAreaAtuacao; ?>&descricao=montador de moveis em <?php echo $nmAreaAtuacao . " " . $telefone . " " . $whats; ?>"><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmAreaAtuacao; ?></a>
								<?php }else{ ?>
									<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmAreaAtuacao; ?></a>
								<?php } ?>
							</h5>
						<?php
							}
						?>
					</div>
			
					<div class="col-md-3 estilo-link">
						<?php
						$sql = mysqli_query($conn, "SELECT idAreaAtuacao, nmAreaAtuacao, comSubAreaAtuacao FROM tbareaatuacao WHERE coluna = 4 AND idSite = " . $idSite);
						while($row = mysqli_fetch_array($sql)){
							$idAreaAtuacao = $row['idAreaAtuacao'];
							$nmAreaAtuacao = $row['nmAreaAtuacao'];
							$comSubAreaAtuacao = $row['comSubAreaAtuacao'];
						?>
							<h5>
								<?php if($comSubAreaAtuacao == 1) {?>
									<a target="_blank" href="subarea.php?idAreaAtuacao=<?php echo $idAreaAtuacao; ?>&descricao=montador de moveis em <?php echo $nmAreaAtuacao . " " . $telefone . " " . $whats; ?>"><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmAreaAtuacao; ?></a>
								<?php }else{ ?>
									<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmAreaAtuacao; ?></a>
								<?php } ?>
							</h5>
						<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h4>Aceitamos Cartões Débito e Crédito - ajustar foto</h4>
						<hr>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<img src="../../../_images/cartoesGeral.jpg" class="img-responsive">
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
				</div>
				<?php $i = 3; ?>
				<?php
					$active = 'data-target="#fotoAmpliada"';
					$querySelecionaPorCodigo = "SELECT formatoImagem, imagem FROM tbgaleria WHERE idSite = $idSite AND idSetorImagem = 7";
					$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
					while($row = mysqli_fetch_array($resultado)){
				?>
					<?php if ($i == 3) {?>
					<div class="row">
					<?php } ?>
						
						<div class="col-md-4 titulocor">
							<a href="#" data-toggle="modal" data-target="#fotoAmpliada"><img class="background-img center-block img-responsive" id="img360" <?php echo 'src="data:' . $row['formatoImagem'] . ';base64,' . base64_encode( $row['imagem'] ) . '"'; ?><?php echo $active; ?>></a>
							<hr>
						</div>

						<?php $active = ""; $i--; ?>
					
					<?php if ($i == 0) {?>
						</div>
					<?php $i=3; }  ?>

				<?php
					}
				?>
				
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
								$querySelecionaPorCodigo = "SELECT formatoImagem, imagem FROM tbgaleria WHERE idSite = $idSite AND idSetorImagem = 7";
								$resultado = mysqli_query($conn, $querySelecionaPorCodigo);
								while($row = mysqli_fetch_array($resultado)){
							?>				
								<div class="item <?php echo $active; ?>">
									<img <?php echo 'src="data:' . $row['formatoImagem'] . ';base64,' . base64_encode( $row['imagem'] ) . '"'; ?>>
								</div>

								<?php $active = ""; ?>

							<?php
								}
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