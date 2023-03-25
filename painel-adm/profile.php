<?php
    echo '<meta http-equiv="refresh" content="0;url=sites.php">';
?>

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
					<div class="">
						<div class="page-title">
							<div class="title_left">
								<h3>Perfil do Usuário</h3>
							</div>              
						</div>            
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 ">
								<div class="x_panel">
									<div class="x_title">
										<h2>Perfil</h2>                    
										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<div class="col-md-3 col-sm-3  profile_left">					
											<div class="profile_img">
												<div id="crop-avatar">
													<!-- Current avatar -->
													<img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
												</div>
							
												<!-- Large modal -->
												<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">Carregar Foto Perfil</button>

												<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title" id="myModalLabel">Foto Perfil</h4>
																<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
															</div>
															<div class="modal-body">								
																<input type="file" id="myFile">

																<script>
																function myFunction() {
																  var x = document.getElementById("myFile");
																  x.disabled = true;
																}
																</script>									
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
																<button type="button" class="btn btn-primary">Salvar</button>
															</div>

														</div>
													</div>
												</div>						
											</div>
											<h3>Jennifer</h3>

											<ul class="list-unstyled user_data">    
												<li>
													<i class="fa fa-envelope user-profile-icon"></i> eduardo@celdtecnologia.com.br
												</li>
												<li class="m-top-xs">
													<i class="fa fa-external-link user-profile-icon"></i>
													<a href="http://construindosite.com.br/" target="_blank">www.construindosite.com.br</a>
												</li>
											</ul>       
										</div>
										<div class="col-md-9 col-sm-9 ">                      
											<div class="row">
												<div class="col-md-12 col-sm-12">
													<div class="x_panel">                                
														<div class="x_content">
															<form class="" action="" method="post" novalidate>                                        
																<span class="section">Editar Informações Pessoais</span>
																<div class="field item form-group">
																	<label class="col-form-label col-md-3 col-sm-3  label-align">Nome<span class="required">*</span></label>
																	<div class="col-md-6 col-sm-6">
																		<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Ex. Eduardo Ribeiro" required="required" />
																	</div>
																</div>
																<div class="field item form-group">
																	<label class="col-form-label col-md-3 col-sm-3  label-align">CPF<span class="required">*</span></label>
																	<div class="col-md-6 col-sm-6">
																		<input class="form-control" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="000.000.000-00" required="required" />
																	</div>
																</div>
																<div class="field item form-group">
																	<label class="col-form-label col-md-3 col-sm-3  label-align">E-mail<span class="required">*</span></label>
																	<div class="col-md-6 col-sm-6">
																		<input class="form-control" name="email" class='email' required="required" type="email" /></div>
																	</div>                                        
																	<div class="field item form-group">
																		<label class="col-form-label col-md-3 col-sm-3  label-align">Telefone<span class="required">*</span></label>
																		<div class="col-md-6 col-sm-6">
																			<input class="form-control" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" /></div>
																	</div>                                                                         
											
																	<div class="field item form-group">
																		<label class="col-form-label col-md-3 col-sm-3  label-align">Senha<span class="required">*</span></label>
																		<div class="col-md-6 col-sm-6">
																			<input class="form-control" type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />

																			<span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
																				<i id="slash" class="fa fa-eye-slash"></i>
																				<i id="eye" class="fa fa-eye"></i>
																			</span>
																		</div>
																	</div>                                        
																<div class="field item form-group">
																	<label class="col-form-label col-md-3 col-sm-3  label-align">Repetir senha<span class="required">*</span></label>
																	<div class="col-md-6 col-sm-6">
																	<input class="form-control" type="password" name="password2" data-validate-linked='password' required='required' /></div>
																</div> 	
											
																<div class="ln_solid">
																	<div class="form-group">
																		<div class="col-md-6 offset-md-3">
																			<button type='submit' class="btn btn-primary">Salvar</button>
																			<!--<button type='reset' class="btn btn-success">Reset</button>-->
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
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
    

		<!-- jQuery -->
		<script src="vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		 <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<!-- FastClick -->
		<script src="vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="vendors/nprogress/nprogress.js"></script>
		<!-- morris.js -->
		<script src="vendors/raphael/raphael.min.js"></script>
		<script src="vendors/morris.js/morris.min.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="vendors/moment/min/moment.min.js"></script>
		<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
			
		<!-- Custom Theme Scripts -->
		<script src="build/js/custom.min.js"></script>

	</body>
</html>