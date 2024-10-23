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
                            <form class="form" action="?url_id=gestion_inconsistencias" method="POST" id="filtrar" name="filtrar" enctype="multipart/form-data">
                                <input type="hidden" name="formulario" id="formulario" value="filtrar">
                                <div class="scroll-y mh-300px mh-lg-325px">
                                    <div class="px-7 py-5">
                                        <div class="mb-10">
                                            <label class="form-label fs-5 fw-bold mb-3"># Reserva:</label>
                                            <input id="id_reserva" name="id_reserva" type="number" class="form-control form-control-solid" />
                                        </div>
                                        <div class="mb-10">
                                            <label class="fs-6 fw-bold mb-2">Sala:</label>
                                            <!-- <input class="form-control form-control-solid" min="0" placeholder="Documento Paciente" type="text" id="kt_modal_add_event_cedula_paciente" name="calendar_event_description"> -->
                                            <select class="form-select form-select-solid fw-bolder" data-dropdown-parent="#kt_modal_create_api_key" data-placeholder="Select option" id="id_sala" name="id_sala">
                                                <option value="" selected>Seleccionar sala </option>
                                                <?php
                                                if (!(empty($salas))) {
                                                    foreach ($salas as $key) {
                                                ?>
                                                        <option value="<?= $key['id'] ?>"><?= $key['nombre'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <input type="submit" name="enviar" class="btn btn-primary" value="Filtrar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key">
                            Crear inconsistencia
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
                                <th class="min-w-185px"># Reserva</th>
                                <th class="min-w-125px">Estado</th>
                                <th class="min-w-125px">Fecha creacion</th>
                                <th class="min-w-125px">Usuario creacion </th>
                                <th class="min-w-185px">Comentarios inconsistencia</th>
                                <th class="min-w-125px">Usuario resolucion</th>
                                <th class="min-w-50px">fecha_resolucion</th>
                                <th class="min-w-125px">Comentarios resolucion</th>
                                <th class="min-w-50px">Sala</th>
                                <td>Opciones</td>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            <?php
                            if (!empty($reservas_inconsistencias)) {
                                foreach ($reservas_inconsistencias as $fila) {
                            ?>
                                    <tr>
                                        <th class="min-w-50px"></th>
                                        <th class="min-w-50px"><?php echo $fila['id_reserva'] ?></th>
                                        <th class="min-w-50px">
                                            <?php  
                                            if ($fila['estado'] == 1) {
                                                echo "Pendiente por gestionar";
                                            }else{
                                                echo "Gestionado";

                                            }
                                            
                                            ?>
                                        
                                        </th>
                                        <th class="min-w-50px"><?php echo $fila['fecha_creacion'] ?></th>
                                        <th class="min-w-50px">
                                            <?php if ($fila['id_usuario_creacion'] != 0) {
                                                echo nombre_usuarios($fila['id_usuario_creacion'], $dbm)['nombres'] . ' ' . nombre_usuarios($fila['id_usuario_creacion'], $dbm)['apellidos'];
                                            } ?>
                                        </th>
                                        <th class="min-w-50px"><?php echo $fila['comentarios_inconsistencia'] ?></th>

                                        <th class="min-w-50px">
                                            <?php if ($fila['id_usuario_resolucion'] != 0) {
                                                echo nombre_usuarios($fila['id_usuario_resolucion'], $dbm)['nombres'] . ' ' . nombre_usuarios($fila['id_usuario_resolucion'], $dbm)['apellidos'];
                                            } ?>
                                        </th>
                                        <th class="min-w-50px"><?php echo $fila['fecha_resolucion'] ?></th>
                                        <th class="min-w-50px"><?php echo $fila['comentarios_resolucion'] ?></th>
                                        <th class="min-w-50px"><?php echo nombre_sala($fila['id_sala'], $dbm)['nombre'] ?></th>

                                        <td>
                                            <?php
                                            if ($fila['estado'] == 1 && $_SESSION['id_rol'] == 1) {
                                            ?>
                                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key2<?php echo $fila['id'] ?>">
                                                    Gestionar
                                                </a>
                                            <?php
                                            }
                                            ?>

                                        </td>
                                        <div class="modal fade" id="kt_modal_create_api_key2<?php echo $fila['id'] ?>" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <div class="modal-content">
                                                    <div class="modal-header" id="kt_modal_create_api_key_header">
                                                        <h2>Gestionar Inconsistencia</h2>
                                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                            <span class="svg-icon svg-icon-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <form id="gestionar" name="gestionar" class="form" action="?url_id=gestion_inconsistencias" method="POST" onsubmit="return validacion_crear_usuario()" enctype="multipart/form-data">
                                                        <input type="hidden" name="formulario" id="formulario" value="gestionar">
                                                        <div class="modal-body py-10 px-lg-17">
                                                            <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">
                                                                <div class="d-flex flex-column mb-10 fv-row">
                                                                    <div class="row">
                                                                        <div class="col-12 mb-10">
                                                                            <label class="required fs-5 fw-bold mb-2">Solución</label>
                                                                            <textarea required name="comentarios_resolucion" id="comentarios_resolucion" class="form-control form-control-solid" rows="5" cols="5"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="id" id="id" value="<?php echo $fila['id'] ?>">
                                                                <div class="modal-footer flex-center">
                                                                    <input type="submit" name="enviar" id="enviar" value="Gestionar Inconsistencia" class="btn btn-primary">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
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
                        <h2>Crear Inconsistencia</h2>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <form id="crear_inconsistencia" name="crear_inconsistencia" class="form" action="?url_id=gestion_inconsistencias" method="POST" onsubmit="return validacion_crear_usuario()" enctype="multipart/form-data">
                        <input type="hidden" name="formulario" id="formulario" value="crear_inconsistencia">
                        <div class="modal-body py-10 px-lg-17">
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">

                                <div class="d-flex flex-column mb-10 fv-row">

                                    <div class="row">
                                        <div class="col-12 mb-10">
                                            <label class="fs-5 fw-bold mb-2">Seleccione sala</label>
                                            <select name="id_sala_c" id="id_sala_c" class="form-select form-select-lg mb-3">
                                                <option value="0" selected>Seleccione ...</option>
                                                <?php
                                                foreach ($salas as $key) {
                                                ?>
                                                    <option value="<?php echo $key['id'] ?>"><?php echo $key['nombre'] ?></option>
                                                <?php
                                                    # code...
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-10">
                                            <label class="required fs-5 fw-bold mb-2">Inconsistencia</label>
                                            <textarea required name="comentarios_inconsistencia" id="comentarios_inconsistencia" class="form-control form-control-solid" rows="5" cols="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer flex-center">
                                    <input type="submit" name="enviar" id="enviar" value="Crear Inconsistencia" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>