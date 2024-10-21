		<?php
		session_start();
		if ( !isset($_SESSION["id_usuario"]) || $_SESSION["id_usuario"]=="")
		{
			session_destroy();
			?>
			<script>
				alert("La sesión ha caducado, por favor ingresar nuevamente");
				
				setTimeout (location.href=" ", 2000);
			</script>
			<a href=" " > << INGRESAR NUEVAMENTE >> </a>
			<?php
			exit();
		}
		sleep(1);
		include "head.php";
		include "seguridad/conexion.php";
		include "src/functions/main.php";
		$url_id = variable_exterior("url_id");
		$dbm = conectar_mysql();
		?>
		<?php
		include "src/model/m_".$url_id.".php";

		include "src/controller/c_".$url_id.".php";
		?>
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" data-step="2" cass="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<!--begin::Logo-->
					<div class="aside-logo flex-column-auto pt-10 pt-lg-20" id="kt_aside_logo">
						<a href="<?php echo $b_url_business ?>" target="_blank">
							<img alt="Logo" src="assets/media/logos/LogoAsisSalas.png" height="80px" />
							<!-- <img alt="Logo" src="assets/media/logos/Logo.png" height="80px" /> -->
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

							<?php include "src/view/v_".$url_id.".php";  ?>

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

		<?php //include "modal_req.php";  ?>

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
		<!--end::Scrolltop-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
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
		<!--end::Page Custom Javascript-->

		<?php include "src/js/js_".$url_id.".php";  ?>
		<!--end::Javascript-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script type="text/javascript">
		$(window).load(function() {
		    $(".loader").fadeOut("slow");
		});
		</script>