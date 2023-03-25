<?php

    echo '<meta http-equiv="refresh" content="0;url=sites.php">';

if(!isset($_SESSION)) { session_start(); }

	 if($_SESSION['cd_usuario'] == 0) { 
		 echo '<meta http-equiv="refresh" content="0;url=http://construindosite.com.br">';
	 }
?>

<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="images/favicon.ico" type="image/ico" />

		<title>Construindo Site | Administrativo</title>

		<!-- Bootstrap -->
		<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- iCheck -->
		<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		
		<!-- bootstrap-progressbar -->
		<link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
		<!-- JQVMap -->
		<link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
		<!-- bootstrap-daterangepicker -->
		<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
							<a data-toggle="tooltip" data-placement="top" title="Sair" href="_php/logoff.php">
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
										<a class="dropdown-item"  href="_php/logoff.php"><i class="fa fa-sign-out pull-right"></i> Sair</a>
									</div>
								</li>  
							</ul>
						</nav>
					</div>
				</div>
				<!-- /top navigation -->

				<!-- page content -->
				<div class="right_col" role="main">				
					<br />
					<div class="row"></div>
						<div class="row">
							<div class="col-md-8 col-sm-8 ">
								<div class="row">
									<div class="col-md-12 col-sm-12 ">
										<!--<div class="x_panel">
											<div class="x_title">
													<h2>Localização de Visitantes</h2>
													<ul class="nav navbar-right panel_toolbox"></ul>
												<div class="clearfix"></div>
											</div>
											<div class="x_content">
												<div class="dashboard-widget-content">
													<div class="col-md-4 hidden-small">
														<h2 class="line_30">125.7k Visualizações de 60 países</h2>

														<table class="countries_list">
															<tbody>
																<tr>
																	<td>Estados Unidos</td>
																	<td class="fs15 fw700 text-right">33%</td>
																</tr>
																<tr>
																	<td>França</td>
																	<td class="fs15 fw700 text-right">27%</td>
																</tr>
																<tr>
																	<td>Alemanha</td>
																	<td class="fs15 fw700 text-right">16%</td>
																</tr>
																<tr>
																	<td>Espanha</td>
																	<td class="fs15 fw700 text-right">11%</td>
																</tr>
																<tr>
																	<td>Inglaterra</td>
																	<td class="fs15 fw700 text-right">10%</td>
																</tr>
															</tbody>
														</table>
													</div>
													<div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
												</div>
											</div>
										</div>-->
										<!-- Global site tag (gtag.js) - Google Analytics -->										
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

		<!-- jQuery -->
		<script src="vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<!-- FastClick -->
		<script src="vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="vendors/nprogress/nprogress.js"></script>
		<!-- Chart.js -->
		<script src="vendors/Chart.js/dist/Chart.min.js"></script>
		<!-- gauge.js -->
		<script src="vendors/gauge.js/dist/gauge.min.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- iCheck -->
		<script src="vendors/iCheck/icheck.min.js"></script>
		<!-- Skycons -->
		<script src="vendors/skycons/skycons.js"></script>
		<!-- Flot -->
		<script src="vendors/Flot/jquery.flot.js"></script>
		<script src="vendors/Flot/jquery.flot.pie.js"></script>
		<script src="vendors/Flot/jquery.flot.time.js"></script>
		<script src="vendors/Flot/jquery.flot.stack.js"></script>
		<script src="vendors/Flot/jquery.flot.resize.js"></script>
		<!-- Flot plugins -->
		<script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
		<script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
		<script src="vendors/flot.curvedlines/curvedLines.js"></script>
		<!-- DateJS -->
		<script src="vendors/DateJS/build/date.js"></script>
		<!-- JQVMap -->
		<script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
		<script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
		<script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="vendors/moment/min/moment.min.js"></script>
		<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- Custom Theme Scripts -->
		<script src="build/js/custom.min.js"></script>
	
	</body>
</html>
