<?php
	if(!isset($_SESSION)) { session_start(); }

	echo "ID Usuario: " . $_SESSION['cd_usuario'];
	include_once("../_php/conexao.php");


    /*
//selecionar todos os sites que o cara tenha registrado com o ID que ele fez login
$sql = mysqli_query($conn, "select site_data_criacao, cd_site, site_status, site_nome_exibicao, site_dominio from sites where cd_usuario = '" . $_SESSION['cd_usuario'] . "'") or die(mysqli_error());
while ($row = mysqli_fetch_array($sql)){
$titulo = $row['site_nome_exibicao'];
$cd_site = $row['cd_site'];
$site = $row['site_dominio'];
$dtCriacao = $row['site_data_criacao'];
$idStatus = $row['site_status'];
echo 'testando id: ' . $idStatus;
*/

?>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Construindo Site | Administrativo</title>

		<!-- Bootstrap -->
		<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- iCheck -->
		<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

		<!-- Custom Theme Style -->
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

						<!-- menu profile quick info -->
						<div class="profile clearfix">
							<div class="profile_pic">
								<img src="images/img.jpg" alt="..." class="img-circle profile_img">
							</div>
							<div class="profile_info">
								<span>Bem-vindo,</span>
								<h2>Sr(a) Usuário(a)</h2> <!--inserir php com nome do usuário-->
							</div>
						</div>
						<!-- /menu profile quick info -->

						<br />

						<!-- sidebar menu -->
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
						<!-- /sidebar menu -->

						<!-- /menu footer buttons -->
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

				<!-- top navigation -->
				<div class="top_nav">
					<div class="nav_menu">
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>
						<nav class="nav navbar-nav">
							<ul class=" navbar-right">
								<li class="nav-item dropdown open" style="padding-left: 15px;">
									<a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
										<img src="images/img.jpg" alt="">Sr(a) Usuário(a)<!--inserir php chamando nome do usuário-->
									</a>
									<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">									  
										<a class="dropdown-item"  href="logoff.php"><i class="fa fa-sign-out pull-right"></i> Sair</a>
									</div>
								</li>  
							</ul>
						</nav>
					</div>
				</div>
				<!-- /top navigation -->

				<!-- page content -->
				<div class="right_col" role="main">
					<div class="">
						<div class="page-title">
							<div class="title_left">
								<h3>Veja todos os seus sites aqui</h3>
							</div>					  
						</div>
            
						<div class="clearfix"></div>

						<div class="row">
							<div class="col-md-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Meus Sites</h2> 
									</div>
									<div class="col-md-12">
										<a href="_php/criarSite.php" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Novo Site </a>
									</div>
									
									<div class="x_content">										
										<p>Aqui você pode editar e visualizar os seus sites</p>
										<!-- start project list -->
										<table class="table table-striped projects">
											<thead>
												<tr>
													<th style="width: 10%">ID</th>
													  <th style="width: 30%">Site</th>
													  <th></th>
													  <th></th>
													  <th></th>
													  <th style="width: 60%">Ações</th>
												</tr>
											</thead>
											<?php
												//selecionar todos os sites que o cara tenha registrado com o ID que ele fez login
												$sql = mysqli_query($conn, "select site_data_criacao, cd_site, site_status, site_nome_exibicao, site_dominio from sites where cd_usuario = '" . $_SESSION['cd_usuario'] . "'") or die(mysqli_error());
												while($row = mysqli_fetch_array($sql)){
													$titulo = $row['site_nome_exibicao'];
													$cd_site = $row['cd_site'];
													$site = $row['site_dominio'];
													$dtCriacao = $row['site_data_criacao'];
													$idStatus = $row['site_status'];
                                                    echo 'testando id: ' . $idStatus;
											?>
												<tbody>
													<tr>
														<td><?php echo $cd_site; ?></td>
														<td>
															<a><?php echo $titulo; ?></a>
															<br />
															<small>Criado <?php echo $dtCriacao; ?></small>
														</td>
														<td></td>
														<td class="project_progress"></td>
														<td></td>
														<td>
															<a target="_blank" href="http://<?php echo $site; ?>.com.br" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Ver Site </a>
															<a target="_blank" href="../_preview?cd_site=<?php echo $cd_site; ?>" class="btn btn-primary btn-xs"><i class="fa fa-external-link"></i> Preview </a>
															<a target="_blank" href="../_painelAdm/_edicao/index.php?cd_site=<?php echo $cd_site; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                                                            <?php if($idStatus == '0'): ?>
                                                                <a href="_php/excluirSite.php?cd_site=<?php echo $cd_site; ?>"  class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Excluir </a>
                                                            <?php endif; ?>
														</td>
													</tr>
												</tbody>
											<?php } ?>
										</table>
										<!-- end project list -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="pull-right">
						Construindo Site - Sua Presença On-line 
					</div>
						<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>

		<!-- jQuery -->
		<script src="vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
	   <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<!-- FastClick -->
		<script src="vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="vendors/nprogress/nprogress.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		
		<!-- Custom Theme Scripts -->
		<script src="build/js/custom.min.js"></script>
	</body>
</html>