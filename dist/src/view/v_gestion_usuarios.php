<div class="row g-5 g-xl-8">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                </svg>
                            </span>
                            Filtros
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                            <div class="px-7 py-5">
                                <div class="fs-4 text-dark fw-bolder">Opciones de Filtros</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <form class="form" action="?url_id=gestion_usuarios" method="POST" id="filtrar_usuario" name="filtrar_usuario" enctype="multipart/form-data">
                                <input type="hidden" name="formulario" id="formulario" value="filtrar_usuario">
                                <div class="scroll-y mh-300px mh-lg-325px">
                                    <div class="px-7 py-5">
                                        <div class="mb-10">
                                            <label class="form-label fs-5 fw-bold mb-3">Identificación:</label>
                                            <input id="numero_identificacion" name="numero_identificacion" type="text" class="form-control form-control-solid" />
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fs-5 fw-bold mb-3">Usuario:</label>
                                            <input id="usuario" name="usuario" type="text" class="form-control form-control-solid" />
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fs-5 fw-bold mb-3">Nombre:</label>
                                            <input id="nombres" name="nombres" type="text" class="form-control form-control-solid" />
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="submit" name="enviar" class="btn btn-primary" value="Filtrar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key">
                            Crear Usuarios
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="card-scroll">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-185px"></th>
                                <th class="min-w-185px">Usuario</th>
                                <th class="min-w-125px">Identificación</th>
                                <th class="min-w-185px">Nombres</th>
                                <th class="min-w-125px">Apellidos</th>
                                <th class="min-w-125px">Celular</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Rol</th>
                                <th class="min-w-50px">Estado</th>
                                <td>Opciones</td>
                            </tr>
                        </thead>
                        <tbody class="fw-bold ">
                            <?php
                            if (!empty($usuarios)) {
                                foreach ($usuarios as $fila) {
                            ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $fila['usuario'] ?></td>
                                        <td><?php echo $fila['tipo_identificacion'] . ' ' . $fila['identificacion'] ?></td>
                                        <td><?php echo $fila['nombres'] ?></td>
                                        <td><?php echo $fila['apellidos'] ?></td>
                                        <td><?php echo $fila['celular'] ?></td>
                                        <td><?php echo $fila['email'] ?></td>
                                        <td><?php echo $fila['nombre_rol'] ?></td>

                                     
                                        <td>
                                            <?php
                                            if ($fila['estado'] == 1) {
                                                echo "Activo";
                                            } else {
                                                echo "Inactivo";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key2<?php echo $fila['id'] ?>">
                                                Editar
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="kt_modal_create_api_key2<?php echo $fila['id'] ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <div class="modal-content">
                                                <div class="modal-header" id="kt_modal_create_api_key_header">
                                                    <h2>Editar Usuario</h2>
                                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <form id="actualizar_usuario" name="actualizar_usuario" class="form" action="?url_id=gestion_usuarios" method="POST">
                                                    <!-- onsubmit="return validacion_crear_usuario()" enctype="multipart/form-data"> -->
                                                    <input type="hidden" name="formulario" id="formulario" value="actualizar_usuario">
                                                    <div class="modal-body py-10 px-lg-17">
                                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">

                                                            <div class="d-flex flex-column mb-10 fv-row">
                                                                <div class="row">
                                                                    <div class="col-6 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Número Identificación:</label>
                                                                        <input required name="numero_identificacion" type="number" class="form-control form-control-solid" id="numero_identificacion" value="<?php echo $fila['identificacion'] ?>">
                                                                    </div>
                                                                    <div class="col-6 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Tipo identificación</label>
                                                                        <select required name="tipo_identificacion" id="tipo_identificacion" class="form-select form-select-lg mb-3" value="<?php echo $fila['tipo_identificacion'] ?>">
                                                                            <option value="CC" selected>CC</option>
                                                                            <option value="TI">TI</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Nombres</label>
                                                                        <input required name="nombres" type="text" class="form-control form-control-solid" id="nombres" value="<?php echo $fila['nombres'] ?>">
                                                                    </div>
                                                                    <div class="col-6 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Apellidos</label>
                                                                        <input required name="apellidos" type="text" class="form-control form-control-solid" id="apellidos" value="<?php echo $fila['apellidos'] ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-6 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Celular</label>
                                                                        <input required name="celular" type="text" class="form-control form-control-solid" id="celular" value="<?php echo $fila['celular'] ?>">
                                                                    </div>
                                                                    <div class="col-6 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Email</label>
                                                                        <input required name="email" type="email" class="form-control form-control-solid" id="email" pattern=".+@unicatolica\.edu\.co" value="<?php echo $fila['email'] ?>">
                                                                    </div>
                                                                    <div>

                                                                    </div class="row">
                                                                    <div class="col-12 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Rol</label>
                                                                        <select required name="rol" id="rol" class="form-select form-select-lg mb-3">
                                                                            <?php
                                                                            foreach ($roles_lista as $key) {
                                                                                if ($fila['id_rol'] == $key['id']) {
                                                                            ?>
                                                                                    <option selected value="<?php echo $key['id'] ?>"><?php echo $key['nombre'] ?></option>

                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <option value="<?php echo $key['id'] ?>"><?php echo $key['nombre'] ?></option>

                                                                                <?php
                                                                                }
                                                                                ?>

                                                                            <?php


                                                                            }

                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div class="row">
                                                                <label class="required fs-5 fw-bold mb-2"> Estado Usuario</label>
                                                                <select name="estado" id="estado" class="form-control">
                                                                    <?php
                                                                    if ($fila['estado'] == "1") {
                                                                    ?>
                                                                        <option value="1" selected>Activo</option>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option value="1">Activo</option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    if ($fila['estado'] == "0") {
                                                                    ?>
                                                                        <option value="0" selected>Inactivo</option>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option value="0">Inactivo</option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer flex-center">
                                                            <input type="submit" value="Actualizar Usuario" class="btn btn-primary">
                                                            <input type="hidden" id="id" name="id" value="<?php echo $fila['id'] ?>">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                </div>
            </div>
    <?php
                                }
                            }
    ?>
    </tbody>
    </table>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_create_api_key" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <h2>Crear Usuario</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <form id="crear_usuario" name="crear_usuario" class="form" action="?url_id=gestion_usuarios" method="POST" onsubmit="return validacion_crear_usuario()" enctype="multipart/form-data">
                <input type="hidden" name="formulario" id="formulario" value="crear_usuario">
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">

                        <div class="d-flex flex-column mb-10 fv-row">
                            <div class="row">
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Número Identificación:</label>
                                    <input required name="numero_identificacion" type="number" class="form-control form-control-solid" id="numero_identificacion" />
                                </div>
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Tipo identificación</label>
                                    <select required name="tipo_identificacion" id="tipo_identificacion" class="form-select form-select-lg mb-3">
                                        <option value="CC" selected>CC</option>
                                        <option value="TI">TI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Nombres</label>
                                    <input required name="nombres" type="text" class="form-control form-control-solid" id="nombres" />
                                </div>
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Apellidos</label>
                                    <input required name="apellidos" type="text" class="form-control form-control-solid" id="apellidos" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Celular</label>
                                    <input required name="celular" type="text" class="form-control form-control-solid" id="celular" />
                                </div>
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Email</label>
                                    <input required name="email" type="email" class="form-control form-control-solid" id="email" pattern=".+@unicatolica\.edu\.co" value="@unicatolica.edu.co" />
                                </div>
                                <div>

                                </div class="row">
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Rol</label>
                                    <select required name="rol" id="rol" class="form-select form-select-lg mb-3">
                                        <option value="0" selected>Seleccione ...</option>
                                        <?php
                                        foreach ($roles_lista as $key) {
                                        ?>

                                            <option value="<?php echo $key['id'] ?>"><?php echo $key['nombre'] ?></option>
                                        <?php


                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Contrasena</label>
                                    <input required name="password" type="password" class="form-control form-control-solid" id="password" />
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer flex-center">
                            <input type="submit" name="enviar" id="enviar" value="Crear Usuario" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>