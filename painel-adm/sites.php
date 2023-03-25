<?php
	require("_php/validacao-geral.php");

    $sites = array();
	$where = "1";

	if($_SESSION['usuario_tipo'] == '1') { 
		$where .= " AND cd_usuario = {$_SESSION['cd_usuario']}";
	}

    $sql = mysqli_query($conn, "SELECT site_data_criacao, cd_site, site_status, site_nome_exibicao, site_dominio, cd_template FROM sites WHERE {$where}") or die(mysqli_error());
    while ($row = mysqli_fetch_array($sql)) {
        $sites[] = $row;
    }

	$primeiroNome = explode(" ", $_SESSION['usuario_nome'])[0];
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
								<h3>Sites gerenciados</h3>
							</div>					  
						</div>
            
						<div class="clearfix"></div>

						<div class="row">
							<div class="col-md-12">
								<div class="x_panel">
									<div class="col-md-12">
										<a href="#" data-toggle="modal" data-target="#novo-site" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Novo Site </a>
									</div>
									
									<div class="x_content">										
										<p>Aqui você pode editar e visualizar os seus sites</p>
										<table class="table table-striped sites">
											<thead>
												<tr>
													<th style="width: 10%">Código</th>
													<th style="width: 30%">Site</th>
													<th></th>
													<th></th>
													<th></th>
													<th style="width: 60%">Ações</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($sites as $site): ?>
													<tr>
														<td><?php echo $site['cd_site']; ?></td>
														<td>
															<a><?php echo $site['site_nome_exibicao']; ?></a>
															<br />
															<small>Criado em <?php echo date('d/m/Y', strtotime($site['site_data_criacao'])) ; ?></small>
														</td>
														<td></td>
														<td class="project_progress"></td>
														<td></td>
														<td>
															<a target="_blank" href="http://<?php echo $site['site_dominio']; ?>.com.br" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Ver Site </a>
															<a target="_blank" href="../preview/<?php echo $site['cd_template']; ?>?cd_site=<?php echo $site['cd_site']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Preview </a>
															<a target="_blank" href="../painel-adm/_edicao/index.php?cd_site=<?php echo $site['cd_site']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                                                            <?php if($site['site_status'] == '0' || $site['site_status'] == '5'): ?>
                                                                <a href="_php/excluirSite.php?cd_site=<?php echo $site['cd_site']; ?>"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Excluir </a>
                                                            <?php endif; ?>
														</td>
													</tr>
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
						"<td></td>" +
						"<td></td>" +
						"<td></td>" +
						"<td>" +
							"<a target=\"_blank\" href=\"http://" + dominio + ".com.br\" class=\"btn btn-primary btn-\"><i class=\"fa fa-external-link\"></i> Ver Site </a>" +
							"<a target=\"_blank\" href=\"../preview/" + result['template'] + "?cd_site=" + result['cd_site'] + "\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-external-link\"></i> Preview </a>" +
							"<a target=\"_blank\" href=\"../painel-adm/_edicao/index.php?cd_site=" + result['cd_site'] + "\" class=\"btn btn-info btn-xs\"><i class=\"fa fa-pencil\"></i> Editar </a>" +
							"<a href=\"_php/excluirSite.php?cd_site=" + result['cd_site'] + "\"  class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i> Excluir </a>" +
						"</td>" +
					"</tr>";

					$(".sites").append(linha);

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