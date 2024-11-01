<div class="row g-5 g-xl-8">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                    </div>
                </div>
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filtros
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-4 text-dark fw-bolder">Opciones de Filtros</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->


                            <form class="form" action="?url_id=gestion_salas" method="POST" id="consultar_personal" name="consultar_personal" enctype="multipart/form-data">
                                <input type="hidden" name="formulario" id="formulario" value="consultar_personal">
                                <div class="scroll-y mh-300px mh-lg-325px">
                                    <div class="px-7 py-5">
                                        <div class="mb-10">
                                            <label class="form-label fs-5 fw-bold mb-3">Nombre:</label>
                                            <input id="nombre" name="nombre" type="text" class="form-control form-control-solid" />
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <input type="submit" name="enviar" class="btn btn-primary" value="Filtrar">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--begin::Action-->
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_api_key">
                            Crear sala
                        </a>
                        <!--end::Action-->
                        <!--end::Crear-->
                    </div>

                    <!--begin::Group actions-->
                    <!--end::Group actions-->
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="card-scroll">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-185px"></th>
                                <th class="min-w-185px">Nombre Sede</th>
                                <th class="min-w-185px">Nombre Sala</th>
                                <th class="min-w-125px">Bloque</th>
                                <th class="min-w-185px">Capacidad Estudiantes</th>
                                <th class="min-w-125px">Aire Acondicionado</th>
                                <th class="min-w-125px">Video Beam</th>
                                <th class="min-w-125px">Observaciones</th>
                                <th class="min-w-125px">Estado</th>
                                <th class="min-w-125px">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            <?php
                            if (!empty($salas2)) {
                                foreach ($salas2 as $fila) {
                            ?>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <td class="min-w-185px"></td>
                                        <td class="min-w-185px"><?php echo $fila['nombre_sede']  ?></td>
                                        <td class="min-w-185px"><?php echo $fila['nombre']  ?></td>
                                        <td class="min-w-125px"><?php echo $fila['bloque']  ?></td>
                                        <td class="min-w-185px"><?php echo $fila['capacidad_estudiantes']  ?></td>
                                        <td class="min-w-125px"><?php echo $fila['aire_acondicionado']  ?></td>
                                        <td class="min-w-125px"><?php echo $fila['video_beam']  ?></td>
                                        <td class="min-w-125px"><?php echo $fila['observacion']  ?></td>
                                        <td class="min-w-125px">
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
                                                    <h2>Editar Sala</h2>
                                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                <form action="?url_id=gestion_salas" id="actualizar_sala" name="actualizar_sala" class="form" method="post">
                                                    <input type="hidden" name="formulario" id="formulario" value="actualizar_sala">
                                                    <div class="modal-body py-10 px-lg-17">
                                                        <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">
                                                            <div class="d-flex flex-column mb-10 fv-row">
                                                                <div class="row">
                                                                    <div class="col-12 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Sede: </label>
                                                                        <select required class="form-select form-select-solid fw-bolder" data-placeholder="Select option" id="id_sede" name="id_sede">
                                                                            <option value="" selected>Seleccionar Sede </option>
                                                                            <?php
                                                                            foreach ($sedes as $key) {
                                                                            ?>
                                                                                <option value="<?php echo $key['id'] ?>"><?php echo $key['nombre'] ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Nombre de Sala:</label>
                                                                        <input required name="sala" type="text" class="form-control form-control-solid" id="sala" value="<?php echo $fila['nombre'] ?>" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mb-10">
                                                                    <label class="required fs-5 fw-bold mb-2">Observaciones:</label>
                                                                    <input required name="observacion" type="text" class="form-control form-control-solid" id="observacion" value="<?php echo $fila['observacion'] ?>" />
                                                                </div>
                                                                <div class="col-12 mb-10">
                                                                    <label class="required fs-5 fw-bold mb-2"> Estado Sala</label>
                                                                    <select name="estado" id="estado" class="form-control form-control-solid">
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
                                                                <div class="row text-center">
                                                                    <div class="col-3 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Bloque:</label>
                                                                        <input required name="bloque" type="text" class="form-control form-control-solid" id="bloque" value="<?php echo $fila['bloque'] ?>" />
                                                                    </div>
                                                                    <div class="col-3 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2"># Est.:</label>
                                                                        <input required name="num_estudiantes" type="number" class="form-control form-control-solid" id="num_estudiantes" value="<?php echo $fila['capacidad_estudiantes'] ?>" />
                                                                    </div>
                                                                    <div class="col-3 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">Aire:</label> <br>
                                                                        <input class="form-check-input" type="checkbox" name="aire" id="aire" checked>
                                                                    </div>
                                                                    <div class="col-2 mb-10">
                                                                        <label class="required fs-5 fw-bold mb-2">VideoBeam:</label>
                                                                        <input class="form-check-input" type="checkbox" name="video" id="video" checked>
                                                                    </div>

                                                                </div>

                                                                <div class="m-2 p-2">
                                                                    <input type="submit" value="Actualizar sala" class="btn btn-primary">
                                                                    <input type="hidden" id="id" name="id" value="<?php echo $fila['id'] ?>">
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
    </div>
</div>

<div class="modal fade" id="kt_modal_create_api_key" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <h2>Crear sala</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <form id="crear_sala" name="crear_sala" class="form" action="?url_id=gestion_salas" method="post">
                <input type="hidden" name="formulario" id="formulario" value="crear_sala">
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">
                        <div class="d-flex flex-column mb-10 fv-row">
                            <div class="row">
                                <div class="col-12 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Nombre Sede:</label>
                                    <select required class="form-select form-select-solid fw-bolder" data-placeholder="Select option" id="id_sede" name="id_sede">
                                        <option value="" selected>Seleccionar Sede </option>
                                        <?php
                                        foreach ($sedes as $key) {
                                        ?>
                                            <option value="<?php echo $key['id'] ?>"><?php echo $key['nombre'] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Nombre Sala:</label>
                                    <input required name="sala" type="text" class="form-control form-control-solid" id="sala" />
                                </div>
                            </div>
                            <div class="col-12 mb-10">
                                <label class="required fs-5 fw-bold mb-2">Observaciones:</label>
                                <input required name="observacion" type="text" class="form-control form-control-solid" id="observacion" />
                            </div>
                            <div class="row text-center">
                                <div class="col-3 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Bloque:</label>
                                    <input required name="bloque" type="text" class="form-control form-control-solid" id="bloque" />
                                </div>
                                <div class="col-3 mb-10">
                                    <label class="required fs-5 fw-bold mb-2"># Est.:</label>
                                    <input required name="num_estudiantes" type="number" class="form-control form-control-solid" id="num_estudiantes" />
                                </div>
                                <div class="col-3 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">Aire:</label> <br>
                                    <input class="form-check-input" type="checkbox" name="aire" id="aire" checked>
                                </div>
                                <div class="col-2 mb-10">
                                    <label class="required fs-5 fw-bold mb-2">VideoBeam:</label>
                                    <input class="form-check-input" type="checkbox" name="video" id="video" checked>
                                </div>

                            </div>

                            <div class="modal-footer flex-center">
                                <input type="submit" value="Crear Sala" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>