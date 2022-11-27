<?php
	if(!isset($_SESSION)) { session_start(); }
	include_once("../_php/conexao.php");
	$idSite = $_SESSION['idSite'];
	$idAreaAtuacao = $_GET['idAreaAtuacao'];
	
	$sql = mysqli_query($conn, "SELECT titulo, descricao, keyword, site, whats, telefone, facebook, instagram, email, qtImagem, cdCSS FROM sites WHERE idSite = " . $idSite);
    while($row = mysqli_fetch_array($sql)){
		$titulo = $row['titulo'];
		$descricao = $row['descricao'];
		$keyword = $row['keyword'];
		$site = $row['site'];
		$whats = $row['whats'];
		$telefone = $row['telefone'];
		$facebook = $row['facebook'];
		$instagram = $row['instagram'];
		$email = $row['email'];
		$qtImagem = $row['qtImagem'];
		$cdCSS = $row['cdCSS'];
	}
	
	$sql = mysqli_query($conn, "SELECT idSite, nmAreaAtuacao, tituloAreaAtuacao, descricaoAreaAtuacao, keywordsAreaAtuacao FROM tbareaatuacao WHERE idAreaAtuacao = " . $idAreaAtuacao);
    while($row = mysqli_fetch_array($sql)){
		$idSiteVerificacao = $row['idSite'];
		$nmAreaAtuacao = $row['nmAreaAtuacao'];
		$tituloAreaAtuacao = $row['tituloAreaAtuacao'];
		$descricaoAreaAtuacao = $row['descricaoAreaAtuacao'];
		$keywordsAreaAtuacao = $row['keywordsAreaAtuacao'];
	}
	
	if($idSite != $idSiteVerificacao){
		echo "<script>alert('Sub Área Inválida!');</script>";
		echo '<meta http-equiv="refresh" content="0;url='.$dominio.'.com.br/">';
	}

?>

<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $tituloAreaAtuacao; ?></title>
		<meta name="keyword" content="<?php echo $keywordsAreaAtuacao; ?>">
		<meta name="description" content="<?php echo $descricaoAreaAtuacao; ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://construindosite.com.br/_css/<?php echo $cdCSS; ?>/estilo.css" rel="stylesheet" type="text/css">
		<link rel="icon" href="https://construindosite.com.br/<?php echo $site; ?>/imagens/<?php echo $qtImagem . "_"; ?>favicon.png" type="image/x-icon" />

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
					<a class="navbar-brand" href="<?php echo $dominio; ?>"><span><?php echo $titulo; ?></span></a>
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
				<div class="item active">
					<img src="http://construindosite.com.br/<?php echo $site; ?>/imagens/<?php echo $qtImagem . "_"; ?>banner01.jpg">
				</div>
				
				<div class="item">
					<img src="http://construindosite.com.br/<?php echo $site; ?>/imagens/<?php echo $qtImagem . "_"; ?>banner02.jpg">
				</div>
			</div>
			
			<a class="left carousel-control" href="#fullcarousel-example" data-slide="prev"><i class="icon-prev fa fa-angle-left"></i></a>
			<a class="right carousel-control" href="#fullcarousel-example" data-slide="next"><i class="icon-next fa fa-angle-right"></i></a>
		</div>
		
		<div class="carousel hidden-lg hidden-md slide" id="fullcarousel-exampleMobile" data-interval="5000" data-ride="carousel">
			<div id="homeMobile" class="carousel-inner">
				<div class="item active">
					<img src="http://construindosite.com.br/<?php echo $site; ?>/imagens/<?php echo $qtImagem . "_"; ?>banner01.jpg">
				</div>
				
				<div class="item">
					<img src="http://construindosite.com.br/<?php echo $site; ?>/imagens/<?php echo $qtImagem . "_"; ?>banner02.jpg">
				</div>
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
						<h1 class="text-center"><?php echo $tituloAreaAtuacao; ?>
							<small>
							<br>
							<br><?php echo $descricaoAreaAtuacao; ?></small>
						</h1>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 estilo-link">
						<?php
						$sql = mysqli_query($conn, "SELECT idSubAreaAtuacao, nmSubAreaAtuacao FROM tbsubareaatuacao WHERE coluna = 1 AND idAreaAtuacao = " . $idAreaAtuacao);
						while($row = mysqli_fetch_array($sql)){
							$idSubAreaAtuacao = $row['idSubAreaAtuacao'];
							$nmSubAreaAtuacao = $row['nmSubAreaAtuacao'];
						?>
							<h5>
								<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmSubAreaAtuacao; ?></a>
							</h5>
						<?php
							}
						?>
					</div>
					
					<div class="col-md-4 estilo-link">
						<?php
						$sql = mysqli_query($conn, "SELECT idSubAreaAtuacao, nmSubAreaAtuacao FROM tbsubareaatuacao WHERE coluna = 2 AND idAreaAtuacao = " . $idAreaAtuacao);
						while($row = mysqli_fetch_array($sql)){
							$idSubAreaAtuacao = $row['idSubAreaAtuacao'];
							$nmSubAreaAtuacao = $row['nmSubAreaAtuacao'];
						?>
							<h5>
								<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmSubAreaAtuacao; ?></a>
							</h5>
						<?php
							}
						?>
					</div>
					
					<div class="col-md-4 estilo-link">
						<?php
						$sql = mysqli_query($conn, "SELECT idSubAreaAtuacao, nmSubAreaAtuacao FROM tbsubareaatuacao WHERE coluna = 3 AND idAreaAtuacao = " . $idAreaAtuacao);
						while($row = mysqli_fetch_array($sql)){
							$idSubAreaAtuacao = $row['idSubAreaAtuacao'];
							$nmSubAreaAtuacao = $row['nmSubAreaAtuacao'];
						?>
							<h5>
								<a><i class="-circle fa fa-fw fa-lg fa-map-marker"></i><?php echo $nmSubAreaAtuacao; ?></a>
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
						<h4>Aceitamos Cartões Débito e Crédito</h4>
						<hr>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<img src="http://construindosite.com.br/<?php echo $site; ?>/imagens/cartoesGeral.jpg" alt="Montador de Móveis - SC | Aceitamos todos os Cartões" title="Montador de Móveis - SC" class="img-responsive">
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