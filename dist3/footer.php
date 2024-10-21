<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
	<!--begin::Container-->
	<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
		<!--begin::Copyright-->
		<div class="text-dark order-2 order-md-1">
			<span class="text-gray-400 fw-bold me-1"><?php echo date("Y") ?>© Creado por</span>
			<a href="<?php echo $b_url_business ?>" target="_blank" class="text-muted text-hover-primary fw-bold me-2 fs-6">ASISTENTE SALAS</a>
			<br>
			<span class="text-gray-300 fw-bold me-1">Build by</span>
			<a href="https://unidadso.com.co" target="_blank" class="text-gray-300 fw-bold me-1">SINFOCALI</a>
		</div>
		<!--end::Copyright-->
		<!--begin::Menu-->
		<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
			<li class="menu-item">
				<a href="?url_id=<? echo $url_id ?>" class="menu-link px-2">Inicio</a>
			</li>
			<li class="menu-item">
				<a href="?url_id=requerimientos" id="kt_explore_toggle" class="menu-link px-2" class="explore-toggle btn btn-primary" title="Crear Requerimiento!" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover">Requerimientos</a>


			</li>
		</ul>
		<!--end::Menu-->
	</div>
	<!--end::Container-->
</div>
					<!--end::Footer-->
