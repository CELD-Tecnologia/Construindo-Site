<?php
	if(!isset($_SESSION)) { session_start(); }
	include_once("../_php/conexao.php");

    $where = '1';
    if($_SESSION['usuario_tipo'] == '1') {
        $where = "cd_usuario = {$_SESSION['cd_usuario']}";
    }

    $sites = array();
    $sql = mysqli_query($conn, "select site_data_criacao, cd_site, site_status, site_nome_exibicao, site_dominio from sites where {$where}") or die(mysqli_error());
    while ($row = mysqli_fetch_array($sql)){
        $sites[] = $row;
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
								<h2>Sr(a) <?php echo $_SESSION['usuario_nome']; ?></h2>
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

						<!-- /menu footer buttons -> menu da parte debaixo da tela, verificar o que fazer com estes itens primeiros -->
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
							<a data-toggle="tooltip" data-placement="top" title="Sair" href="logoff.php">
								<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
							</a>
						</div>
						<!-- /menu footer buttons -->
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
										<img src="images/img.jpg" alt="">Sr(a) <?php echo $_SESSION['usuario_nome']; ?>
									</a>
									<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">									  
										<a class="dropdown-item"  href="logoff.php"><i class="fa fa-sign-out pull-right"></i> Sair</a>
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
										<a href="_php/criarSite.php" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Novo Site </a>
									</div>
									
									<div class="x_content">										
										<p>Aqui você pode editar e visualizar os seus sites</p>
										<table class="table table-striped projects">
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
											<?php
                                                foreach ($sites as $site):
											?>
												<tbody>
													<tr>
														<td><?php echo $site['cd_site']; ?></td>
														<td>
															<a><?php echo $site['site_nome_exibicao']; ?></a>
															<br />
															<small>Criado <?php echo $site['site_data_criacao']; ?></small>
														</td>
														<td></td>
														<td class="project_progress"></td>
														<td></td>
														<td>
															<a target="_blank" href="http://<?php echo $site['site_dominio']; ?>.com.br" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Ver Site </a>
															<a target="_blank" href="../_preview?cd_site=<?php echo $site['cd_site']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Preview </a>
															<a target="_blank" href="../_painelAdm/_edicao/index.php?cd_site=<?php echo $site['cd_site']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                                                            <?php if($site['site_status'] == '0'): ?>
                                                                <a href="_php/excluirSite.php?cd_site=<?php echo $site['cd_site']; ?>"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Excluir </a>
                                                            <?php endif; ?>
														</td>
													</tr>
												</tbody>
											<?php endforeach; ?>
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
	</body>
</html>