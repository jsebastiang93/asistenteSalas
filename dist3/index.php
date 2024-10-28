<?php
header('Referrer-Policy: no-referrer');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
//header('Permissions-Policy: geolocation "none";camera "none"; speaker "none";');
header('Strict-Transport-Security max-age=31536000');
?>
<!DOCTYPE html>
<html lang="es">
<!--begin::Head-->


<head>
	<?php
	ini_set("session.cookie_lifetime", "10800");
	ini_set("session.gc_maxlifetime", "10800");
	session_start();
	if (!isset($_SESSION["id_usuario"]) || $_SESSION["id_usuario"] == "") {
		session_destroy();

	?>
		<script>
			alert("La sesión ha caducado, por favor ingresar nuevamente");
			setTimeout(location.href = " ", 2000);
		</script>
		<a href=" ">
			<< INGRESAR NUEVAMENTE>>
		</a>
	<?php
		exit();
	}
	include "head.php";

	include "seguridad/conexion.php";

	include "src/functions/main.php";

	$dbm = conectar_mysql();

	$url_id = variable_exterior("url_id");

	$_SESSION["url_id"] = $url_id;

	include "src/functions/email.php";

	include "float.php";

	include "src/model/m_" . $url_id . ".php";

	include "src/controller/c_" . $url_id . ".php";


	?>
	<style type="text/css">
		.cmn-divfloat {
			position: fixed !important;
			bottom: 250px;
			right: 0px;
		}

		.cmn-btncircle {
			width: 40px !important;
			height: 40px !important;
			padding: 0px 0px;
			border-radius: 45px;
			font-size: 18px;
			text-align: center;
		}

		.loader {
			position: fixed;
			left: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background: url('spinner<?php echo rand(1, 2); ?>.gif') 50% 50% no-repeat rgb(249, 249, 249);
			opacity: .8;
		}
	</style>
	<link href="src/plugins/intro.js-master/introjs.css" rel="stylesheet">
	<script type="text/javascript">
		function startTour() {
			var tour = introJs()
			tour.setOption('tooltipPosition', 'auto');
			tour.setOption('positionPrecedence', ['left', 'right', 'top', 'bottom']);
			tour.setOptions({
				nextLabel: 'Siguiente',
				prevLabel: 'Atras',
				skipLabel: 'Cerrar',
				doneLabel: 'Ok'
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
	
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.37.0/apexcharts.min.js" integrity="sha512-RLWwcf0Pb2NghIfkaQms354xRV36EYjXLWKSN8QHiHqNq3KGj0DjMc9D1zzO7UsREkGU/xCLAJi/hVcKSuZ5Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js" integrity="sha512-6UofPqm0QupIL0kzS/UIzekR73/luZdC6i/kXDbWnLOJoqwklBK6519iUnShaYceJ0y4FaiPtX/hRnV/X/xlUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
	<script type="text/javascript">
		$(document).ready(function() {

			<?php
			if ($_SESSION["ayuda"] == 0) {
			?>startTour();
		<?php
				$_SESSION["ayuda"] = 1;
			}
		?>

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
</head>
<!--end::Head-->
<!--begin::Body-->
<?

?>

<body id="kt_body" class="print-content-only header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled" style="min-height: 5000px;">
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Aside-->
			<div id="kt_aside" data-step="2" data-intro="Al lado Izquierdo de forma Vertical, encontraremos el menu a cual tienes acceso segun el perfil de tu usuario!" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
				<!--begin::Logo-->
				<div class="aside-logo flex-column-auto pt-10 pt-lg-20" id="kt_aside_logo">
					<a href="<?php echo $b_url_business ?>" target="_blank">
						<img alt="Logo" src="assets/media/logos/LogoAsisSalas.png" height="90px" />
						<!-- <img alt="Logo" src="assets/media/logos/logo.png" height="50px" /> -->
					</a>
				</div>
				<!--end::Logo-->

				<?php include "menu_left.php"; ?>

				<?php include "menu_foot.php"; ?>
			</div>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper" data-step="5" data-intro="Segun Seleccionemos la opcion, modulo o aplicativo en el menu, en esta area de trabajo se visualizara el contenido del mismo">

				<?php include "header.php";  ?>

				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
					<!--begin::Container-->
					<div class="container-xxl" id="kt_content_container" data-step="7" data-intro="En el area de contenido, interactuaremos con el aplicativo o modulo seleccionado">

						<?php include "src/view/v_" . $url_id . ".php";  ?>

					</div>
					<!--end::Container-->
				</div>
				<!--end::Content-->

				<?php include "footer.php";  ?>

			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::Root-->





	<!--begin::Modals-->
	<div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-dialog-centered mw-650px">
			<!--begin::Modal content-->
			<div class="modal-content">
				<!--begin::Modal header-->
				<div class="modal-header pb-0 border-0 justify-content-end">
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
					<!--begin::Content-->
					<div class="text-center mb-13">
						<h1 class="mb-3">MENU</h1>
						<div class="text-muted fw-bold fs-5">Acceso a Modulos y aplicativos</div>
					</div>
					<!--end::Content-->
					<!--begin::Search-->
					<div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
						<!--begin::Wrapper-->
						<div class="py-5">
							<div class="row">
								<div class="col-xl-6">

								</div>
								<div class="col-xl-6">

								</div>
							</div>
							<div class="row">
								<div class="col-xl-6">
									<!--begin::Suggestions-->
									<div data-kt-search-element="suggestions">
										<!--begin::Heading-->
										<h3 class="fw-bold mb-5">INICIO:</h3>
										<!--end::Heading-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=inicio" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Home.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">Inicio</span>
													<span class="badge badge-light">Pagina Principal</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
									</div>
									<!--end::Suggestions-->
								</div>
								<div class="col-xl-6">
									<!--begin::Suggestions-->
									<div data-kt-search-element="suggestions">
										<!--begin::Heading-->
										<h3 class="fw-bold mb-5">TABLERO DE CONTROL:</h3>
										<!--end::Heading-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=dashboard" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
																	<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
																	<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
																	<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">Tablero de Control</span>
													<span class="badge badge-light">Dashboard de atención</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
									</div>
									<!--end::Suggestions-->
								</div>
							</div>
							</br></br>
							<div class="row">
								<div class="col-xl-6">
									<!--begin::Suggestions-->
									<div data-kt-search-element="suggestions">
										<!--begin::Heading-->
										<h3 class="fw-bold mb-5">AUTOGESTION:</h3>
										<!--end::Heading-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=requerimientos" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M2.10001 10C3.00001 5.6 6.69998 2.3 11.2 2L8.79999 4.39999L11.1 7C9.60001 7.3 8.30001 8.19999 7.60001 9.59999L4.5 12.4L2.10001 10ZM19.3 11.5L16.4 14C15.7 15.5 14.4 16.6 12.7 16.9L15 19.5L12.6 21.9C17.1 21.6 20.8 18.2 21.7 13.9L19.3 11.5Z" fill="black" />
																	<path d="M13.8 2.09998C18.2 2.99998 21.5 6.69998 21.8 11.2L19.4 8.79997L16.8 11C16.5 9.39998 15.5 8.09998 14 7.39998L11.4 4.39998L13.8 2.09998ZM12.3 19.4L9.69998 16.4C8.29998 15.7 7.3 14.4 7 12.8L4.39999 15.1L2 12.7C2.3 17.2 5.7 20.9 10 21.8L12.3 19.4Z" fill="black" />
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">P.Q.R.S.F</span>
													<span class="badge badge-light">Gestion Requerimientos</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=externo_video&video=2" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M2.10001 10C3.00001 5.6 6.69998 2.3 11.2 2L8.79999 4.39999L11.1 7C9.60001 7.3 8.30001 8.19999 7.60001 9.59999L4.5 12.4L2.10001 10ZM19.3 11.5L16.4 14C15.7 15.5 14.4 16.6 12.7 16.9L15 19.5L12.6 21.9C17.1 21.6 20.8 18.2 21.7 13.9L19.3 11.5Z" fill="black" />
																	<path d="M13.8 2.09998C18.2 2.99998 21.5 6.69998 21.8 11.2L19.4 8.79997L16.8 11C16.5 9.39998 15.5 8.09998 14 7.39998L11.4 4.39998L13.8 2.09998ZM12.3 19.4L9.69998 16.4C8.29998 15.7 7.3 14.4 7 12.8L4.39999 15.1L2 12.7C2.3 17.2 5.7 20.9 10 21.8L12.3 19.4Z" fill="black" />
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">VideoTutorial</span>
													<span class="badge badge-light">Conociendo el Portal</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
									</div>
									<!--end::Suggestions-->
								</div>
								<div class="col-xl-6">
									<!--begin::Suggestions-->
									<div data-kt-search-element="suggestions">
										<!--begin::Heading-->
										<h3 class="fw-bold mb-5">AGENDAMIENTO:</h3>
										<!--end::Heading-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=externo&app=cita" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
																	<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
																	<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">Cita</span>
													<span class="badge badge-light">Creacion y Gestion</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=externo&app=orden" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="black" />
																	<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="black" />
																	<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="black" />
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">Orden de Servicio</span>
													<span class="badge badge-light">Creacion y Gestion</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
									</div>
									<!--end::Suggestions-->
								</div>
							</div>
							</br></br>
							<div class="row">
								<div class="col-xl-6">
									<!--begin::Suggestions-->
									<div data-kt-search-element="suggestions">
										<!--begin::Heading-->
										<h3 class="fw-bold mb-5">REPORTES:</h3>
										<!--end::Heading-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=estado_historia" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
																		<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
																		<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
																		<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">Atencion en Sedes</span>
													<span class="badge badge-light">Consulta Sala de Espera</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=consumo_por_sede" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
																		<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
																		<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
																		<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">Consumo Total por Sedes</span>
													<span class="badge badge-light">Consolidado de atencion</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
									</div>
									<!--end::Suggestions-->
								</div>
								<div class="col-xl-6">
									<!--begin::Suggestions-->
									<div data-kt-search-element="suggestions">
										<!--begin::Heading-->
										<h3 class="fw-bold mb-5">REPORTES:</h3>
										<!--end::Heading-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=historial_clinico" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
																		<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
																		<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
																		<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">Consulta de Resultados</span>
													<span class="badge badge-light">Historial Clinico de servicios</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
										<!--begin::Users-->
										<div class="mh-375px scroll-y me-n7 pe-7">
											<!--begin::User-->
											<a href="?url_id=facturacion" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
												<!--begin::Avatar-->
												<span class="menu-icon">
													<div class="symbol symbol-35px symbol-circle me-5">
														<span class="svg-icon svg-icon-2x">
															<span class="svg-icon svg-icon-primary svg-icon-2x">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
																		<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
																		<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
																		<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</span>
												<!--end::Avatar-->
												<!--begin::Info-->
												<div class="fw-bold">
													<span class="fs-6 text-gray-800 me-2">Ver facturas</span>
													<span class="badge badge-light">Consulta de facturacion</span>
												</div>
												<!--end::Info-->
											</a>
											<!--end::User-->
										</div>
										<!--end::Users-->
									</div>
									<!--end::Suggestions-->
								</div>
							</div>

						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Search-->
				</div>
			</div>
		</div>
	</div>

	<!--end::Modals-->

	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
		<span class="svg-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
				<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$(".loader").fadeOut("slow");
		});
	</script>
	<script type="text/javascript">
		function cargando() {
			$('#cargando').html('<div class="text-align-center" style="text-align: center;"><img src="spinner2.gif" class="h-35px"/><br/>...Cargando...</div>');
		}
	</script>
	<!--end::Scrolltop-->
	<!--end::Main-->
	<script>
		var hostUrl = "assets/";
	</script>
	
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Vendors Javascript(used by this page)-->
	<script src="assets/plugins/custom/leaflet/leaflet.bundle.js"></script>
	<!--end::Page Vendors Javascript-->
	<!--begin::Page Custom Javascript(used by this page)-->
	<script src="assets/js/custom/modals/select-location.js"></script>
	<script src="assets/js/custom/widgets.js"></script>
	<script src="assets/js/custom/apps/chat/chat.js"></script>
	<script src="assets/js/custom/modals/create-app.js"></script>
	<script src="assets/js/custom/modals/upgrade-plan.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="assets/js/custom/documentation/documentation.js"></script>
	<script src="assets/js/custom/apps/support-center/tickets/create.js"></script>

	<script src="assets/js/custom/modals/users-search.js"></script>
	<script src="assets/js/custom/widgets.js"></script>
	<script src="assets/js/custom/apps/chat/chat.js"></script>
	<script src="assets/js/custom/modals/create-app.js"></script>
	<script src="assets/js/custom/modals/upgrade-plan.js"></script>
	<!--end::Page Custom Javascript-->

	<?php include "src/js/js_" . $url_id . ".php";  ?>
	<!--end::Javascript-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>



</body>
<!--end::Body-->

</html>