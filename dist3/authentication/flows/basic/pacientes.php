<?php
header('Referrer-Policy: no-referrer');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Content-Security-Policy: self');;
header('Permissions-Policy: geolocation "none";camera "none"; speaker "none";');
header('Strict-Transport-Security max-age=31536000');
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../../">
	<meta charset="UTF-8">
	<title>SOLICITUD DE DOCUMENTOS | ASIS SALAS</title>
	<meta name="description" content="LOGIN | ASIS SALAS  " />
	<meta name="keywords" content="sicuso, unidad, salud, ocupacional, uso" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="LOGIN | ASIS SALAS" />
	<meta property="og:url" content=" " />
	<meta property="og:site_name" content="ASIS SALAS" />
	<meta property="og:image" content="https://unidadso.com.co/web/wp-content/uploads/2020/06/Logo-Unidad-de-Salud-Ocupacional.png" />
	<link rel="canonical" href=" " />
	<link rel="shortcut icon" href="assets/media/logos/LogoAsisSalas.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<style type="text/css">
		body {
			background: url(assets/media/fondos/inicio.png) no-repeat fixed center;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			height: 100%;
			width: 100%;
			text-align: center;

		}

		.cmn-divfloat {
			position: fixed !important;
			bottom: 250px;
			right: 25px;
		}

		.cmn-btncircle {
			width: 40px !important;
			height: 40px !important;
			padding: 0px 0px;
			border-radius: 45px;
			font-size: 18px;
			text-align: center;
		}
	</style>

	<link href="../../dist/src/plugins/intro.js-master/introjs.css" rel="stylesheet">


</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">

	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<img src="logos/icono/sicusoblanco.png" style="max-height: 30px;"></span>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-5 p-lg-15 mx-auto">
					<div class="card " data-step="1" data-intro="Bienvenido! a ASIS SALAS">
						<a href="https://unidadso.com.co" class="mb-12">
							<img alt="Logo" src="assets/media/logos/LogoAsisSalas.png" height="60" />
							<!-- <img alt="Logo" src="assets/media/logos/logo.png" height="60" /> -->
						</a>
						<!--begin::Heading-->
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3">Solicitud de Documentos</h1>
							<!--end::Title-->
							<!--begin::Link-->
							<div class="text-gray-400 fw-bold fs-4" data-step="2" data-intro="Para Empezar, ingresemos nuestros datos de Identificación en la plataforma!">
								<a href="#" class="link-primary fw-bolder">ANDRES BANGUERA RODRIGUEZ</a>
							</div>
							<div class="text-gray-400 fw-bold fs-4" data-step="2" data-intro="Para Empezar, ingresemos nuestros datos de Identificación en la plataforma!">
								<a href="#" class="link-primary fw-bolder">c.c. 1130587936</a>
							</div>
							<!--end::Link-->
						</div>
						<div class="text-center mb-10">
							<!--begin::Title-->
							<h1 class="text-dark mb-3"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="button1">firma</button></h1>
							<!--end::Title-->
							<div class="modal fade modal-fullscreen show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog modal-fullscreen">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLabel">Firma de Solicitad</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        
							      		<div class="row">
                                            <!--begin::Label-->
                                            <div class="col-12 mb-5">
                                                <style type="text/css">
                                                  #div{ width:50%; height:100%; margin:0 auto; z-index: 999;}
                                                  #canvas{border:1px solid #d9d9d9; width: 100%; height: 200px;z-index: 999;}
                                                </style>

                                                <script src="../../../src/js/signature_pad.js"></script>

                                                <div id="signature-pad" class="signature-pad" >
                                                    <div class="description">Dibujar aqui</div>
                                                    <div id="div" class="signature-pad--body">
                                                      <canvas  id="canvas" ></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							      </div>
							    </div>
							  </div>
							</div>

							
							<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
							<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
							<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
							<script>
							$(document).ready(function(){
							  $("#button1").click(function(){
							    //$("#exampleModal").modal("show");
							  });
							  $("#exampleModal").on('show.bs.modal', function () {
							    alert('The modal will be displayed now!');
							  });
							});
							</script>
						</div>
						<!--begin::Heading-->
						<div class="card-header card-header-stretch" data-step="3" data-intro="Seleccione el tipo de Ingreso que desea realizar">
							



							<h3 class="card-title">Ingreso:</h3>
							<div class="card-toolbar">
								<ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
									<li class="nav-item" data-step="4" data-intro="Portal Empresarial para Clientes">
										<a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">Clientes</a>
									</li>
									<li class="nav-item" data-step="5" data-intro="Portal Intranet para Empleados de la ASISTENTE SALAS">
										<a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_8">Intranet</a>
									</li>
									<li class="nav-item" data-step="6" data-intro="Portal de Autogestion para Particulares y Pacientes!">
										<a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_9">Particular</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content" id="myTabContent" data-step="7" data-intro="Ingrese las credenciales de Acceso">
								<div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
									<!--begin::Form-->
									<form class="form" novalidate="novalidate" name="ingreso_clientes" id="ingreso_clientes" action="seguridad/verificar.php" enctype="multipart/form-data" method="post">
										<input type="hidden" name="formulario" id="formulario" value="ingreso_clientes">

										<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
										<script language="javascript">
											$(document).ready(function() {
												$(".tercero").click(function(evento) {
													var valor = $(this).val();
													if (valor == 'empresa') {
														$("#form_empresa").css("display", "block");
														$("#form_mision").css("display", "none");
														$("#form_pnatural").css("display", "none");
													} else if (valor == 'p_natural') {
														$("#form_empresa").css("display", "none");
														$("#form_mision").css("display", "none");
														$("#form_pnatural").css("display", "block");
													} else {
														$("#form_empresa").css("display", "none");
														$("#form_mision").css("display", "block");
														$("#form_pnatural").css("display", "none");

													}
												});
											});
										</script>

										<div class="row mb-10">
											<div class="col col-sm-4">
												<p class=""><input name="tercero1" class="form-check-input tercero" type="radio" value="empresa" checked />&nbsp;<span class="auto-style4 fw-bold text-gray-700 fs-8"> Empresa</span></p>
											</div>
											<div class="col col-sm-4">
												<p class="auto-style3"><input class="form-check-input tercero" name="tercero1" type="radio" value="mision" /><span class="auto-style4 fw-bold text-gray-700 fs-8"> En Mision</span></p>
											</div>
											<div class="col col-sm-4">
												<p class="auto-style3"><input class="form-check-input tercero" name="tercero1" type="radio" value="p_natural" /><span class="auto-style4 fw-bold text-gray-700 fs-8"> Persona Natural</span></p>
											</div>
										</div>

										<div id="form_empresa" style="display:block;">
											<!--begin::Input group-->
											<div class="fv-row mb-10">

												<script type="text/javascript">
													function validar(texto) {

														if (texto.length < 2) { //si el texo es menor a 2
															alert('Identificacion muy corta!');
														} else if (texto.length > 9) { //si el texo es mayor a 8
															alert('Identificacion muy larga, maximo 9 digitos');
															document.getElementById("nit").value = "";
														}

													}
												</script>
												<!--begin::Label-->
												<label class="required form-label">NIT sin dígito de verificación!</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input class="form-control form-control-lg form-control-solid" type="number" name="nit" id="nit_empresa" autocomplete="on" placeholder="NIT ó Identificación" onchange="validar(nit_empresa.value);" />
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="fv-row mb-10">
												<!--begin::Label-->
												<label class="required form-label">Usuario</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" placeholder="Usuario" />
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<!--begin::Input group-->
											<div class="mb-10 fv-row" data-kt-password-meter="true">
												<!--begin::Wrapper-->
												<div class="mb-1">
													<!--begin::Label-->
													<label class="required form-label fw-bolder text-dark fs-6">Contraseña</label>
													<!--end::Label-->
													<!--begin::Input wrapper-->
													<div class="position-relative mb-3">
														<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
														<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
															<i class="bi bi-eye-slash fs-2"></i>
															<i class="bi bi-eye fs-2 d-none"></i>
														</span>
													</div>
													<!--end::Input wrapper-->
													<!--begin::Meter-->
													<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
													</div>
													<!--end::Meter-->
												</div>
												<!--end::Wrapper-->
												<!--begin::Hint-->

												<!--end::Hint-->
											</div>

										</div>

										<div id="form_mision" style="display:none">
											<div class="fv-row mb-10">
												<!--begin::Label-->
												<label class="required form-label">Usuario</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input class="form-control form-control-lg form-control-solid" type="text" name="username_mision" autocomplete="off" placeholder="Usuario" />
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<!--begin::Input group-->
											<div class="mb-10 fv-row" data-kt-password-meter="true">
												<!--begin::Wrapper-->
												<div class="mb-1">
													<!--begin::Label-->
													<label class="required form-label fw-bolder text-dark fs-6">Contraseña</label>
													<!--end::Label-->
													<!--begin::Input wrapper-->
													<div class="position-relative mb-3">
														<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_mision" autocomplete="off" />
														<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
															<i class="bi bi-eye-slash fs-2"></i>
															<i class="bi bi-eye fs-2 d-none"></i>
														</span>
													</div>
													<!--end::Input wrapper-->
													<!--begin::Meter-->
													<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
													</div>
													<!--end::Meter-->
												</div>
												<!--end::Wrapper-->
												<!--begin::Hint-->

												<!--end::Hint-->
											</div>

										</div>
										<!--end::Input group-->
										<div id="form_pnatural" style="display:none;">
											<!--begin::Input group-->
											<div class="fv-row mb-10">

												<script type="text/javascript">
													function validar_persona_natural(texto) {
														// console.log(texto);
														if (texto.length < 2) { //si el texo es menor a 2
															alert('Identificacion muy corta!');
														} else if (texto.length > 10) { //si el texo es mayor a 8
															alert('Identificacion muy larga, maximo 10 digitos');
															document.getElementById("nit").value = "";
														}

													}
												</script>
												<!--begin::Label-->
												<label class="required form-label">NIT sin dígito de verificación!</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input class="form-control form-control-lg form-control-solid" type="number" name="nit_pnatural" id="nit_pnatural" autocomplete="on" placeholder="NIT ó Identificación" onchange="validar_persona_natural(nit_pnatural.value);" />
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="fv-row mb-10">
												<!--begin::Label-->
												<label class="required form-label">Usuario</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input class="form-control form-control-lg form-control-solid" type="text" name="username_pnatural" autocomplete="off" placeholder="Usuario" />
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<!--begin::Input group-->
											<div class="mb-10 fv-row" data-kt-password-meter="true">
												<!--begin::Wrapper-->
												<div class="mb-1">
													<!--begin::Label-->
													<label class="required form-label fw-bolder text-dark fs-6">Contraseña</label>
													<!--end::Label-->
													<!--begin::Input wrapper-->
													<div class="position-relative mb-3">
														<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_pnatural" autocomplete="off" />
														<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
															<i class="bi bi-eye-slash fs-2"></i>
															<i class="bi bi-eye fs-2 d-none"></i>
														</span>
													</div>
													<!--end::Input wrapper-->
													<!--begin::Meter-->
													<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
														<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
													</div>
													<!--end::Meter-->
												</div>
												<!--end::Wrapper-->
												<!--begin::Hint-->

												<!--end::Hint-->
											</div>

										</div>

										<!--begin::Actions-->
										<div class="text-center" data-step="9" data-intro="Para Ingresar a la Plataforma, luego de digitar las credenciales de acceso, Clic en el boton Ingresar!">
											<!--begin::Submit button-->
											<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
												<span class="indicator-label">Ingresar</span>
												<span class="indicator-progress">Espere por favor...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
											<!--end::Submit button-->
										</div>
										<!--end::Actions-->
									</form>
									<!--end::Form-->
								</div>

								<div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
									<!--begin::Form-->
									<form class="form" novalidate="novalidate" name="ingreso_intranet" id="ingreso_intranet" action="seguridad/verificar.php" enctype="multipart/form-data" method="post">
										<input type="hidden" name="formulario" id="formulario" value="ingreso_intranet">
										<input type="hidden" name="nit" id="nit" value="805002036">
										<!--begin::Input group-->
										<div class="fv-row mb-10">
											<!--begin::Label-->
											<!--end::Label-->
											<!--begin::Input-->
											<input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" placeholder="Usuario" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-2">
											<!--begin::Label-->
											<!--end::Label-->
											<!--begin::Input-->
											<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" placeholder="Contraseña" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->

										<!--begin::Input group-->
										<div class="fv-row mb-10">
											<!--begin::Wrapper-->
											<div class="d-flex flex-stack mb-2">
												<!--begin::Label-->
												<label class="form-label fw-bolder text-dark fs-6 mb-0"></label>
												<!--end::Label-->
												<!--begin::Link-->
												<small><a href="../../demo9/dist/authentication/flows/basic/password-reset.html" class="link-primary fs-6 fw-bolder">Recordar Contraseña ?</a></small>
												<!--end::Link-->
											</div>
											<!--end::Wrapper-->
										</div>
										<!--end::Input group-->


										<!--begin::Actions-->
										<div class="text-center">
											<!--begin::Submit button-->
											<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
												<span class="indicator-label">Ingresar</span>
												<span class="indicator-progress">Espere por favor...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
											<!--end::Submit button-->
										</div>
										<!--end::Actions-->
									</form>
									<!--end::Form-->
								</div>
								<div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
									<!--begin::Form-->
									<form class="form" novalidate="novalidate" name="ingreso_particular" id="ingreso_particular" action="seguridad/verificar.php" enctype="multipart/form-data" method="post">
										<input type="hidden" name="formulario" id="formulario" value="ingreso_particular">
										<!--begin::Input group-->
										<div class="fv-row mb-10">
											<!--begin::Label-->
											<!--end::Label-->
											<!--begin::Input-->
											<input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="on" placeholder="Numero Identificación" />
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->



										<!--begin::Actions-->
										<div class="text-center">
											<!--begin::Submit button-->
											<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
												<span class="indicator-label">Ingresar</span>
												<span class="indicator-progress">Espere por favor...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
											<!--end::Submit button-->
										</div>
										<!--end::Actions-->
									</form>
									<!--end::Form-->
								</div>
								<div class="tab-pane fade" id="kt_ingreso" role="tabpanel">

									<!--begin::Actions-->
									<div class="text-center" align="center">
										<iframe width="350" height="315" src="https://www.youtube.com/embed/DTK85rgKOn8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
									<!--end::Actions-->
								</div>

								<div class="tab-pane fade" id="kt_navegacion" role="tabpanel">

									<!--begin::Actions-->
									<div class="text-center" align="center">
										<iframe width="350" height="315" src="https://www.youtube.com/embed/B4pz05tUL4s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
									<!--end::Actions-->
								</div>

								<div class="tab-pane fade" id="kt_resultado" role="tabpanel">

									<!--begin::Actions-->
									<div class="text-center" align="center">
										<iframe width="350" height="315" src="https://www.youtube.com/embed/4zZlWPmmlk8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
									<!--end::Actions-->
								</div>

								<div class="tab-pane fade" id="kt_cita" role="tabpanel">

									<!--begin::Actions-->
									<div class="text-center" align="center">
										<iframe width="350" height="315" src="https://www.youtube.com/embed/WNym9bHiycE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
									<!--end::Actions-->
								</div>



							</div>
						</div>
						<div class="card-footer card-footer-stretch">
							<h3 class="card-title">VideoTutoriales</h3>
							<div class="card-toolbar" align="center">
								<ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#kt_ingreso">Ingreso</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#kt_navegacion">Navegación</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#kt_resultado">Resultados</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#kt_cita">Citas</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
			<!--begin::Footer-->
			<div class="d-flex flex-center flex-column-auto p-10">
				<!--begin::Links-->
				<div class="d-flex align-items-center fw-bold fs-6">
					<a href="https://unidadso.com.co" class="text-muted text-hover-primary px-2">ASISTENTE SALAS</a>
					<a href="mailto:info@unidadso.com.co" class="text-muted text-hover-primary px-2">Contacto</a>
				</div>
				<!--end::Links-->
			</div>
			<!--end::Footer-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Main-->
	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="assets/js/custom/authentication/sign-in/general.js"></script>
	<!--end::Page Custom Javascript-->
	<!--end::Javascript-->

	<script>
		function startTour() {
			var tour = introJs()
			tour.setOption('tooltipPosition', 'auto');
			tour.setOption('positionPrecedence', ['left', 'right', 'top', 'bottom']);
			tour.setOptions({
				nextLabel: 'Siguiente',
				prevLabel: 'Atras',
				skipLabel: 'Cerrar',
				doneLabel: 'Hecho'
			});
			tour.start();
		}

		(function() {
			//a partir de que punto del scroll vertical de la ventana mostrará el botón
			const ishow = 0
			const $divtop = document.getElementById("div-totop")
			window.addEventListener("scroll", function() {
				if (document.documentElement.scrollTop > ishow) {
					$divtop.style.display = "inherit"
				} else {
					$divtop.style.display = "none"
				}
			})
		})()
	</script>
	<script type="text/javascript" src="../../dist/src/plugins/intro.js-master/intro.js"></script>
	<div id="div-totop" class="cmn-divfloat div-totop">
		<a href="javascript:void(0);" onclick="javascript:startTour();" class="cmn-btncircle warning">
			<i class="far fa-question-circle fa-3x"></i>
		</a>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			for (let step = 0; step < 100; step++) {
				temp = step * 1000;
				temp2 = (step + 2) * 1000;
				setTimeout(function() {
					$(".div-totop").fadeOut(1000);
				}, temp);

				setTimeout(function() {
					$(".div-totop").fadeIn(1000);
				}, temp2);
			}


		});
	</script>

	<script type="text/javascript">

                                                var wrapper = document.getElementById("signature-pad");

                                                var canvas = wrapper.querySelector("canvas");
                                                var signaturePad = new SignaturePad(canvas, {
                                                  backgroundColor: 'rgb(255, 255, 255)'
                                                });

                                                function resizeCanvas() {

                                                  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

                                                  canvas.width = canvas.offsetWidth * ratio;
                                                  canvas.height = canvas.offsetHeight * ratio;
                                                  canvas.getContext("2d").scale(ratio, ratio);

                                                  signaturePad.clear();
                                                }

                                                window.onresize = resizeCanvas;
                                                resizeCanvas();

                                                </script>
                                                <script>

                                                   document.getElementById('form').addEventListener("submit",function(e){

                                                    var ctx = document.getElementById("canvas");
                                                      var image = ctx.toDataURL(); // data:image/png....
                                                      document.getElementById('base64').value = image;
                                                   },false);

                                                </script>


                                                <script type="text/javascript">

                                                  var canvas = document.querySelector("#canvas");
                                                  var X,Y,W,H,r;              
                                                  canvas.height = 250; 
                                                  function inicializarCanvas(){ 
                                                    if (canvas && canvas.getContext) {
                                                      var ctx = canvas.getContext("2d");
                                                          if (ctx) {
                                                         var s = getComputedStyle(canvas);
                                                         var w = s.width;
                                                         var h = s.height;
                                                            
                                                         W = canvas.width = w.split("px")[0];
                                                         H = canvas.height = h.split("px")[0];
                                                         
                                                         X = Math.floor(W/2);
                                                         Y = Math.floor(H/2);
                                                         r = Math.floor(W/3);
                                                           
                                                         //dibujarEnElCanvas(ctx);
                                                         }
                                                      }
                                                    }
                                                           
                                                  function dibujarEnElCanvas(ctx){
                                                    ctx.strokeStyle = "#006400";
                                                    ctx.fillStyle = "#6ab155";
                                                    ctx.lineWidth = 5;
                                                    ctx.arc(X,Y,r,0,2*Math.PI);
                                                    ctx.fill();
                                                    ctx.stroke();
                                                  }
                                                          

                                                  setTimeout(function() {
                                                    inicializarCanvas();
                                                    addEventListener("resize", inicializarCanvas);
                                                    }, 15);





                                                </script>


</body>
<!--end::Body-->

</html>