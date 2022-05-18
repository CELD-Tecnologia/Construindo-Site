<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
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
											<li><a href="index.php">Principal</a></li>	
											<!--<li><a href="Profile.php">Perfil</a></li>-->
											<li><a href="pricing_tables.php">Planos e Preços</a></li> 
											<li><a href="projects.php">Meu Site</a></li>	
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
							<a data-toggle="tooltip" data-placement="top" title="Sair" href="login.html">
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
										<img src="images/img.jpg" alt="">Sr(a) Usuário(a) <!--inserir php chamando nome do usuário-->
									</a>
									<div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">							  
										<a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Sair</a>
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
								<h3>Planos e Preços</h3>
							</div>
						</div>

						<div class="clearfix"></div>

						<div class="row">
							<div class="col-md-12 col-sm-12  ">
								<div class="x_panel" style="height:600px;">
									<div class="x_title">
										<h2>Planos e Preços</h2>                    
										<div class="clearfix"></div>
									</div>

									<div class="x_content">
										<div class="row">
											<div class="col-md-12">
												<!-- price element -->
												<div class="col-md-3 col-sm-6  ">
													<div class="pricing">
														<div class="title">
															<h2>Sem Anúncios</h2>
															<h1>R$ 19,90</h1>
															<span>Mês</span>
														</div>
														<div class="x_content">
															<div class="">
																<div class="pricing_features">
																	<ul class="list-unstyled text-left">
																		<li><i class="fa fa-check text-success"></i> Retirar Anúncios<strong> do site</strong></li>                                    
																	</ul>
																</div>
															</div>
															<div class="pricing_footer">
																<a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Contratar <span> agora!</span></a>												
															</div>
														</div>
													</div>
												</div>
												<!-- price element -->
												<!-- price element -->
												<div class="col-md-3 col-sm-6  ">
													<div class="pricing">
														<div class="title">
															<h2>Ajuda Profissional</h2>
															<h1>R$150</h1>
															<span>Pagamento Único</span>
														</div>
														<div class="x_content">
															<div class="">
																<div class="pricing_features">
																	<ul class="list-unstyled text-left">
																		<li><i class="fa fa-check text-success"></i> <strong>Personalização</strong> do Site</li>
																		<li><i class="fa fa-check text-success"></i> Assessoria<strong> Profissional</strong></li>
																		<li><i class="fa fa-check text-success"></i> Criação de <strong> Banners</strong></li>                                    
																		<li><i class="fa fa-check text-success"></i> Criação de <strong> Títulos e Textos</strong></li>
																		<li><i class="fa fa-check text-success"></i> Inserção de<strong> Redes Sociais</strong></li>                                  
																	</ul>
																</div>
															</div>
															<div class="pricing_footer">
																<a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Contratar <span> agora!</span></a>													
															</div>
														</div>
													</div>
												</div>
												<!-- price element -->

												<!-- price element -->
												<div class="col-md-3 col-sm-6  ">
													<div class="pricing ui-ribbon-container">
														<div class="ui-ribbon-wrapper">
															<div class="ui-ribbon">
															+POPULAR
															</div>
														</div>
														<div class="title">
															<h2>Domínio Próprio</h2>
															<h1>R$59,90</h1>
															<span>Mês</span>
														</div>
														<div class="x_content">
															<div class="">
																<div class="pricing_features">
																	<ul class="list-unstyled text-left">
																		<li><i class="fa fa-check text-success"></i> <strong>Domínio</strong> próprio</li>															
																		<li><i class="fa fa-check text-success"></i> Sem <strong> Anúncios</strong></li>														
																	</ul>
																</div>
															</div>
															<div class="pricing_footer">
																<a href="javascript:void(0);" class="btn btn-primary btn-block" role="button">Contratar <span> agora!</span></a>
															</div>
														</div>
													</div>
												</div>
												<!-- price element -->

												<!-- price element -->
												<div class="col-md-3 col-sm-6  ">
													<div class="pricing">
														<div class="title">
															<h2>Site Completo + Google Ads</h2>
															<h1>R$219,90</h1>
															<span>Mês</span>
														</div>
														<div class="x_content">
															<div class="">
																<div class="pricing_features">
																	<ul class="list-unstyled text-left">
																		<li><i class="fa fa-check text-success"></i> <strong>Domínio</strong> próprio</li>
																		<li><i class="fa fa-check text-success"></i> <strong>Hospedagem</strong> Dedicada</li>
																		<li><i class="fa fa-check text-success"></i> Sem <strong> Anúncios</strong></li>
																		<li><i class="fa fa-check text-success"></i> Gerenciamento<strong> Google Ads</strong></li>
																		<li><i class="fa fa-check text-success"></i> Incluso <strong> 100 reais Google Ads por mês</strong></li>                                    
																	</ul>
																</div>
															</div>
															<div class="pricing_footer">
																<a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Contratar <span> agora!</span></a>                               
															</div>
														</div>
													</div>
												</div>
												<!-- price element -->                        
											</div>
										</div>
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
		
		<!-- Custom Theme Scripts -->
		<script src="build/js/custom.min.js"></script>
	</body>
</html>