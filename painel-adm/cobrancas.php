<?php
	require("_php/validacao-geral.php");

    $sites = array();
	$where = "cobrancas.cobranca_status = 0";

	if($_SESSION['usuario_tipo'] != '2') { 
		$where .= " AND usuarios.cd_usuario = {$_SESSION['cd_usuario']}";
	}

	$primeiroNome = explode(" ", $_SESSION['usuario_nome'])[0];

	$query = "	SELECT cobrancas.*, sites.site_nome_exibicao
				FROM cobrancas 
				INNER JOIN sites ON sites.cd_site = cobrancas.cd_site
				INNER JOIN usuarios ON usuarios.cd_usuario = sites.cd_usuario
				WHERE {$where}";

	$sql = mysqli_query($conn, $query) or die();
    while ($row = mysqli_fetch_assoc($sql)) {
        $cobrancasRows[] = $row;
    }

	$cobrancas = array();
	foreach($cobrancasRows as $cobranca) {
		$cobrancas[$cobranca['site_nome_exibicao']][] = $cobranca;
	}

?>

<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Construindo Site | Administrativo</title>

		<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
		<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		<link href="build/css/custom.min.css" rel="stylesheet">
	</head>

	<body class="nav-md">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="index.php" class="site_title"><i class="fa fa-cogs"></i> <span>Construindo Site</span></a>
						</div>

						<div class="clearfix"></div>

						<div class="profile clearfix">
							<div class="profile_pic">
								<img src="images/img.jpg" alt="..." class="img-circle profile_img">
							</div>
							<div class="profile_info">
								<span>Bem-vindo,</span>
								<h2>Sr(a) <?php echo $primeiroNome; ?></h2>
							</div>
						</div>

						<br />

						<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
							<div class="menu_section">                
								<ul class="nav side-menu">
									<li><a><i class="fa fa-home"></i> Geral <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="#">Principal</a></li>
											<li><a href="#">Perfil</a></li>
											<li><a href="#">Planos e Preços</a></li>
											<li><a href="sites.php">Meu Site</a></li>
											<li><a href="cobrancas.php">Cobranças</a></li>
										</ul>
									</li>
								</ul>
							</div>    
						</div>

						<?php //Precisa incluir os links nestes itens quando estes estiverem prontos ?>
						<div class="sidebar-footer hidden-small">
							<a data-toggle="tooltip" data-placement="top" title="Config.">
								<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Expandir">
								<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Ver">
								<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
							</a>
							<a data-toggle="tooltip" data-placement="top" title="Sair" href="_php/logoff.php">
								<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
							</a>
						</div>
					</div>
				</div>

				<div class="top_nav">
					<div class="nav_menu">
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>
						<nav class="nav navbar-nav">
							<ul class=" navbar-right">
								<li class="nav-item dropdown open" style="padding-left: 15px;">
									<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
										<img src="images/img.jpg" alt="">Sr(a) <?php echo $primeiroNome; ?>
									</a>
									<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">									  
										<a class="dropdown-item"  href="_php/logoff.php"><i class="fa fa-sign-out pull-right"></i> Sair</a>
									</div>
								</li>  
							</ul>
						</nav>
					</div>
				</div>

				<div class="right_col" role="main">
					<div class="">
						<div class="page-title">
							<div class="title_left">
								<h3>Cobranças em aberto</h3>
							</div>					  
						</div>
            
						<div class="clearfix"></div>

						<div class="row">
							<div class="col-md-12">
								<div class="x_panel">
									
									<div class="x_content">										
										<table class="table table-striped sites">
											<thead>
												<tr>
													<th style="width: 10%"></th>
													<th style="width: 10%">Referência</th>
													<th style="width: 40%">Emissao</th>
													<th style="width: 40%">Valor</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($cobrancas as $site => $siteCobranca): ?>
													<tr><td colspan="4"><?php echo $site; ?></td></tr>
													<?php foreach ($siteCobranca as $cobranca): ?>
														<tr>
															<td><input type="checkbox" id="cd_cobranca[<?php echo $cobranca['cd_cobranca']; ?>]" name="cd_cobranca[<?php echo $cobranca['cd_cobranca']; ?>]"></td>
															<td><?php echo $cobranca['cobranca_referencia_mes']; ?></td>
															<td>Emitido em <?php echo date('d/m/Y', strtotime($cobranca['cobranca_data_emissao'])) ; ?></td>
															<td><?php echo $cobranca['cobranca_valor']; ?></td>
														</tr>
													<?php endforeach; ?>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<footer>
					<div class="pull-right">
						Construindo Site - Sua Presença On-line 
					</div>
						<div class="clearfix"></div>
				</footer>
			</div>
		</div>

		<script src="vendors/jquery/dist/jquery.min.js"></script>
	    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="vendors/fastclick/lib/fastclick.js"></script>
		<script src="vendors/nprogress/nprogress.js"></script>
		<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		
		<script src="build/js/custom.min.js"></script>

		<div class="modal fade" id="novo-site">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4>Criando um novo site</h4>
						<button type="button" class="close" data-dismiss="modal">×</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label><strong>Nome para exibição:</strong></label>
							<input style="color:black;" class="form-control" id="site_nome_exibicao" name="site_nome_exibicao" placeholder="Digite um nome para exibição" type="text" >
						</div>

						<div class="form-group">
							<label><strong>Domínio:</strong><br><small>Digite sem "www" e sem ".com.br"</small></label>
							<input style="color:black;" class="form-control" id="site_dominio" name="site_dominio" placeholder="Digite o domínio do site" type="text" >
						</div>

						<div class="form-group">
							<label class="enderecoNovoSite"></label>
						</div>

						<div class="form-group">
							<strong><label style="color:black;" class="retornoCriacaoSite"></label></strong>
						</div>
					
						<button class="btn btn-primary btn-xs BtCriarSite">Criar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
	$("#site_dominio").keyup(function() {
		$(".enderecoNovoSite").html("http://www." + $(this).val() + ".com.br");
	});

	$(".BtCriarSite").on("click", function() {

		var dominio = $('#site_dominio').val();
		var nome = $('#site_nome_exibicao').val();

		if(nome == '') {
			$(".retornoCriacaoSite").html('Digite um nome para exibição do site.');
			return;
		}

		if(dominio == '') {
			$(".retornoCriacaoSite").html('Digite um domínio válido.');
			return;
		}

		$.ajax({
			url: "_php/novo-site.php",
			data: {
				nome: nome,
				dominio: dominio,
			},
			dataType: "json",
			type: "POST",
			beforeSend: function () {
				$(".retornoCriacaoSite").html('Criando...');
			},
			success: function(result) {
				if(result['resposta'] == 'sucesso') {
					$(".retornoCriacaoSite").html("Site criado com sucesso.");

					var linha = "<tr>" +
						"<td>" + result['cd_site'] + "</td>" +
						"<td>" +
							"<a>" + nome + "</a>" +
							"<br />" +
							"<small>" + "Criado em " + result['data_criacao'] + "</small>" +
						"</td>" +
						"<td>" +
							"<a target=\"_blank\" href=\"http://" + dominio + ".com.br\" class=\"btn btn-primary btn-\"><i class=\"fa fa-external-link\"></i> Ver Site </a>" +
							"<a target=\"_blank\" href=\"../preview/" + result['template'] + "?cd_site=" + result['cd_site'] + "\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-external-link\"></i> Preview </a>" +
							"<a target=\"_blank\" href=\"../painel-adm/_edicao/index.php?cd_site=" + result['cd_site'] + "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-pencil\"></i> Editar </a>" +
							"<a href=\"_php/excluirSite.php?cd_site=" + result['cd_site'] + "\"  class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i> Excluir </a>" +
						"</td>" +
					"</tr>";

					$(".sites").append(linha);
					$('#novo-site').modal('hide');

				} else {
					$(".retornoCriacaoSite").html(result['mensagem']);
				}
			},
			error: function(){
				$(".retornoCriacaoSite").html("Erro ao criar o novo site.");
			}
		});

	});
</script>