<!DOCTYPE html>
<html lang="es">
	<!--begin::Head-->
	<head>
		<?php

		include "head.php";

		include "seguridad/conexion.php";

		include "src/functions/main.php";

		include "src/functions/email.php";

		$dbm = conectar_mysql();

		$url_id = variable_exterior("url_id");

		//include "float.php";

		include "src/model/m_".$url_id.".php";

		include "src/controller/c_".$url_id.".php";
		

		?>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="print-content-only header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled" style="min-height: 1200px;" onload="window.print()">
		<div class="loader"></div>
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container" data-step="7" data-intro="En el area de contenido, interactuaremos con el aplicativo o modulo seleccionado">

							<?php include "src/view/v_".$url_id.".php";  ?>

						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->

					<?php //include "footer.php";  ?>

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->


		


		<!--begin::Modals-->

		<?php //include "modal_req.php";  ?>

		<!--end::Modals-->


		
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
		<script src="assets/plugins/global/plugins.bundle.js"></script>
	</body>
	<!--end::Body-->
</html>
