	<!--begin::Action-->
	<?php

	?>
	<div class="d-flex align-items-center py-3 py-lg-0">
		
		<div class="me-3">
			<a href="#" class="btn btn-icon btn-custom btn-active-color-primary" style="width: 150px;height: 50px;" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
				<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
				<span class="svg-icon svg-icon-1 svg-icon-white">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
						<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
					</svg>
				</span>
				<!--end::Svg Icon-->
			</a>
			<!--begin::Menu-->
			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
				<!--begin::Menu item-->
				<div class="separator my-2"></div>
				<!--end::Menu separator-->
				<!--begin::Menu item-->
				<div class="menu-item px-5">
					<a href="?url_id=usuario&id=<?php echo $_SESSION['id_usuario'] ?>" class="menu-link px-5">Mi Perfil</a>
				</div>
				<!--end::Menu item-->
				<div class="separator my-2"></div>
				<!--end::Menu separator-->
				<div class="menu-item px-5">
					<a href="authentication/flows/basic/index.php" class="menu-link px-5">Salida Segura</a>
				</div>
				<!--end::Menu item-->
				<!--begin::Menu separator-->
				<div class="separator my-2"></div>
				<!--end::Menu separator-->
			</div>
			<!--end::Menu-->
		</div>
		
	</div>
	<!--end::Action-->