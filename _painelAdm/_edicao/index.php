<?php
	if(!isset($_SESSION)) { session_start(); }
	$_SESSION['idSite'] = 115;
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="Inserir fvicon" type="image/x-icon"/>
		<meta name="description" content="Sistema de edição de sites geridos pela CELD Tecnologia">
		<meta name="author" content="CELD Tecnologia">
		<title>Construindo Site | Editor</title>

		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/sb-admin.css" rel="stylesheet">

        <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

	</head>

	<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
		<a class="navbar-brand" href="principal.php">Área de Edição - Site: <?php echo $_SESSION['idSite'] ?></a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav navbar-sidenav scroll" id="exampleAccordion">

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Principal">
					<a class="principal nav-link" >
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Principal</span>
					</a>
				</li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Banner">
					<a class="banner nav-link" >
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Banner</span>
					</a>
				</li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Servicos">
					<a class="servicos nav-link" >
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Serviços</span>
					</a>
				</li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Quem Somos">
					<a class="quem-somos nav-link" >
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Quem Somos</span>
					</a>
				</li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Galeria">
					<a class="galeria nav-link" >
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Galeria</span>
					</a>
				</li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuracoes">
					<a class="configuracoes nav-link" >
						<i class="fa fa-fw fa-dashboard"></i>
						<span class="nav-link-text">Configurações</span>
					</a>
				</li>
				
							
			</ul>
			<ul class="navbar-nav sidenav-toggler">
				<li class="nav-item">
					<a class="nav-link text-center" id="sidenavToggler">
						<i class="fa fa-fw fa-angle-left"></i>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" data-toggle="modal" data-target="#modalLogoff">
						<i class="fa fa-fw fa-sign-out"></i>Sair
					</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<div class="content-wrapper">
		<div class="container-fluid">
            <div class="result">
                Código do site: <?php echo $_SESSION['idSite']; ?>
            </div>
        </div>
	
		<footer class="sticky-footer">
			<div class="container">
				<div class="text-center">
					<small>Copyright © CELD Tecnologia | Soluções em TI <a href="https://www.facebook.com/celdtecnologia/" target="_blank"><i class="fa fa-facebook-official fa-fw fa-lg"></i></a></small>
				</div>
			</div>
		</footer>

		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fa fa-angle-up"></i>
		</a>

		<div class="modal fade" id="modalLogoff" tabprincipal="-1" role="dialog" aria-labelledby="modalLogoffLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="modalLogoffLabel">Pronto para sair?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
			  </div>
			  <div class="modal-body">Clique em "Sair" se você estiver pronto para terminar sua sessão atual.</div>
			  <div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-primary" href="https://www.celdtecnologia.com.br/">Sair</a>
			  </div>
			</div>
		  </div>
		</div>

		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="js/sb-admin.min.js"></script>
	</div>

</body>

</html>

<script>
    $(function(){
        $(".principal").on("click", function() {
            $.ajax({
                url: "_conteudo/principal.php",
                beforeSend: function () {
                    $(".result").html('Carregando. Aguarde, por favor.');
                },
                success: function(result) {
                    $(".result").html(result);
                },
                error: function(){
                    $(".result").html("Error");
                }
            });
        });

        $(".banner").on("click", function() {
            $.ajax({
                url: "_conteudo/banner.php",
                beforeSend: function () {
                    $(".result").html('Carregando. Aguarde, por favor.');
                },
                success: function(result) {
                    $(".result").html(result);
                },
                error: function(){
                    $(".result").html("Error");
                }
            });
        });

        $(".servicos").on("click", function() {
            $.ajax({
                url: "_conteudo/servicos.php",
                beforeSend: function () {
                    $(".result").html('Carregando. Aguarde, por favor.');
                },
                success: function(result) {
                    $(".result").html(result);
                },
                error: function(){
                    $(".result").html("Error");
                }
            });
        });

        $(".quem-somos").on("click", function() {
            $.ajax({
                url: "_conteudo/quem-somos.php",
                beforeSend: function () {
                    $(".result").html('Carregando. Aguarde, por favor.');
                },
                success: function(result) {
                    $(".result").html(result);
                },
                error: function(){
                    $(".result").html("Error");
                }
            });
        });

        $(".galeria").on("click", function() {
            $.ajax({
                url: "_conteudo/galeria.php",
                beforeSend: function () {
                    $(".result").html('Carregando. Aguarde, por favor.');
                },
                success: function(result) {
                    $(".result").html(result);
                },
                error: function(){
                    $(".result").html("Error");
                }
            });
        });

        $(".configuracoes").on("click", function() {
            $.ajax({
                url: "_conteudo/configuracoes.php",
                beforeSend: function () {
                    $(".result").html('Carregando. Aguarde, por favor.');
                },
                success: function(result) {
                    $(".result").html(result);
                },
                error: function(){
                    $(".result").html("Error");
                }
            });
        });
    });

</script>