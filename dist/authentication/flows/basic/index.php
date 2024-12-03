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
<!-- PRUEBA DD-->
<head>
	<base href="../../../">
	<meta charset="UTF-8">
	<title>LOGIN | ASIS SALAS</title>
	<meta name="description" content="LOGIN | ASIS SALAS  " />
	<meta name="keywords" content="ASIS SALAS" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8" />
	<meta property="og:locale" content="es_ES" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="LOGIN | ASIS SALAS" />
	<meta property="og:site_name" content="ASIS SALAS" />
	<link rel="shortcut icon" href="assets/media/logos/LogoAsisSalas.ico" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body {
			/* background: url(assets/media/fondos/inicio.png) no-repeat fixed center; */
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

<body id="kt_body" >
	<div class="d-flex flex-column flex-root">
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<div class="card " data-step="1" data-intro="Bienvenido! a ASIS SALAS">
						<div class="text-center m-1">
							<img alt="Logo" src="assets/media/logos/LogoAsisSalas.png" height="auto" width="200px" />
							<!-- <img alt="Logo" src="assets/media/logos/logo.png" height="auto" width="200px" /> -->
						</div>
						<div class="card-body">
							<div class="tab-content" id="myTabContent" data-step="7" data-intro="Ingrese las credenciales de Acceso">
								<div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
									<form class="form" novalidate="novalidate" name="ingreso" id="ingreso" action="seguridad/verificar.php" enctype="multipart/form-data" method="post">
										<input type="hidden" name="formulario" id="formulario" value="ingreso">
										<div class="fv-row mb-10">
											<label class="required form-label fw-bolder text-dark fs-6">Usuario</label>
											<input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" placeholder="Usuario" />
										</div>
										<div class="mb-10 fv-row" data-kt-password-meter="true">
											<div class="mb-1">
												<label class="required form-label fw-bolder text-dark fs-6">Contraseña</label>
												<div class="position-relative mb-3">
													<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
													<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
														<i class="bi bi-eye-slash fs-2"></i>
														<i class="bi bi-eye fs-2 d-none"></i>
													</span>
												</div>
												<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
												</div>
											</div>
										</div>
										<div class="text-center" data-step="9" data-intro="Para Ingresar a la Plataforma, luego de digitar las credenciales de acceso, Clic en el boton Ingresar!">
											<button type="submit" id="kt_sign_in_submit" class="btn btn-lg w-100 mb-5" style="background-color: #FFC300;color:white">
												<span class="indicator-label">Ingresar</span>
												<span class="indicator-progress">Espere por favor...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-flex flex-center flex-column-auto p-10">
				<div class="d-flex align-items-center fw-bold fs-6">
					<a href="" class="text-muted text-hover-primary px-2">ASIS SALAS</a>
					<a href="" class="text-muted text-hover-primary px-2">Contacto</a>
				</div>
			</div>
		</div>
	</div>
	<script>
		var hostUrl = "assets/";
	</script>
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script src="assets/js/custom/authentication/sign-in/general.js"></script>
</body>

</html>