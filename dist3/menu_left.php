<!--begin::Nav-->

<div class="aside-menu flex-column-fluid pt-0 pb-5 py-lg-5" id="kt_aside_menu">
	<!--begin::Aside menu-->
	<div id="kt_aside_menu_wrapper" class="w-100 hover-scroll-overlay-y scroll-ps d-flex" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="0" style="padding-top: 350px;">
		<div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-500 menu-arrow-gray-500 fw-bold fs-6" data-kt-menu="true">
			<div class="menu-item py-3" data-step="3" data-intro="Clic en el modulo deseado para ingresar o desplegar las opciones complementarias">
				<a class="menu-link active" href="?url_id=agenda_reservas" title="Inicio" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right" onclick=cargando()>
					<span class="menu-icon" style="background-color: #FFC300">
						<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
						<span class="svg-icon svg-icon-2x">
							<span class="svg-icon svg-icon svg-icon-2x" style="background-color: #FFC300">
								<!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Home.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</span>
						<!--end::Svg Icon-->
					</span>
				</a>
				<div class="text-align-center" style="text-align: center;">
					<p style="color:#FFC300" ;><small><small>Inicio</small></small></p>
				</div>
			</div>
			<?php
			if ($_SESSION["id_rol"] == "1") {
			?>


				<div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-3">
					<span class="menu-link" title="Usuarios" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs037.svg-->
							<i class="bi bi-people-fill"></i>
						</span>
						<!--end::Svg Icon-->
					</span>
					</span>
					<div class="text-align-center" style="text-align: center;">
						<p style="color:#182A45" ;><small><small>Usuarios</small></small></p>
					</div>
					<div class="menu-sub menu-sub-dropdown w-225px px-1 py-4 scroll-y mh-325px">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Usuarios</span>
							</div>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="?url_id=gestion_usuarios">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Gestión de usuarios</span>
							</a>
						</div>
					</div>

				</div>
				<div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-3">
					<span class="menu-link" title="Sedes" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs037.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/General/Star.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" fill="#000000" />
									</g>
								</svg><!--end::Svg Icon--></span>
							<!--end::Svg Icon-->
						</span>
					</span>
					<div class="text-align-center" style="text-align: center;">
						<p style="color:#182A45" ;><small><small>Sedes</small></small></p>
					</div>
					<div class="menu-sub menu-sub-dropdown w-225px px-1 py-4 scroll-y mh-325px">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Sedes</span>
							</div>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="?url_id=gestion_sedes">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Gestión de sedes</span>
							</a>
						</div>
					</div>


				</div>
				<div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-3">
					<span class="menu-link" title="Salas" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs037.svg-->
							<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Laptop.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M6,8 L6,16 L18,16 L18,8 L6,8 Z M20,16 L21.381966,16 C21.7607381,16 22.1070012,16.2140024 22.2763932,16.5527864 L22.5,17 C22.6706654,17.3413307 22.5323138,17.7563856 22.190983,17.927051 C22.0950363,17.9750244 21.9892377,18 21.881966,18 L2.11803399,18 C1.73641461,18 1.42705098,17.6906364 1.42705098,17.309017 C1.42705098,17.2017453 1.45202663,17.0959467 1.5,17 L1.7236068,16.5527864 C1.89299881,16.2140024 2.23926193,16 2.61803399,16 L4,16 L4,8 C4,6.8954305 4.8954305,6 6,6 L18,6 C19.1045695,6 20,6.8954305 20,8 L20,16 Z" fill="#000000" fill-rule="nonzero" />
										<polygon fill="#000000" opacity="0.3" points="6 8 6 16 18 16 18 8" />
									</g>
								</svg><!--end::Svg Icon--></span>
							<!--end::Svg Icon-->
						</span>
					</span>
					<div class="text-align-center" style="text-align: center;">
						<p style="color:#182A45" ;><small><small>Salas</small></small></p>
					</div>
					<div class="menu-sub menu-sub-dropdown w-225px px-1 py-4 scroll-y mh-325px">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Salas</span>
							</div>
						</div>
						<div class="menu-item">
							<a class="menu-link" href="?url_id=gestion_salas">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Gestión de Salas</span>
							</a>
						</div>
					</div>


				</div>

			<?php
			}
			?>
		</div>
	</div>
	<!--end::Aside menu-->
</div>
<!--end::Nav-->