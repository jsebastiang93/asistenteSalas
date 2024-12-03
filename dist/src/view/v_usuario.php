<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
  <!--begin::Layout-->
  <div class="d-flex flex-column flex-xl-row">
    <!--begin::Sidebar-->
    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
      <!--begin::Card-->
      <div class="card mb-5 mb-xl-8">
        <!--begin::Card body-->
        <div class="card-body">
          <!--begin::Summary-->
          <!--begin::User Info-->
          <div id="kt_user_view_details" class="collapse show">
            <h3><?php echo $_SESSION['nombre']  ?></h3>
            <div class="pb-5 fs-6">
              <!--begin::Details item-->
              <div class="fw-bolder mt-5">Número Identificación</div>
              <div class="text-gray-600">
                <?php echo $usuarios['identificacion'] ?>
              </div>
              <!--begin::Details item-->
              <!--begin::Details item-->
              <div class="fw-bolder mt-5">Email</div>
              <div class="text-gray-600">
                <a href="#" class="text-gray-600 text-hover-primary">
                  <?php echo $usuarios['email'] ?>
                </a>
              </div>
              <div class="fw-bolder mt-5">Fecha Creación</div>
              <div class="text-gray-600">
                <?php echo $usuarios['fecha_creacion'] ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex-lg-row-fluid ms-lg-15">
          <!--begin::Card-->
          <div class="card pt-2 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
              <!--begin::Card title-->
              <div class="card-title flex-column">
                <h2>Cambio de contraseña</h2>
                <!-- <div class="fs-6 fw-bold text-muted">Choose what messages you’d like to receive for each of your accounts.</div> -->
              </div>
              <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">

              <!--begin::Col-->
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <!--begin::Card-->
                <div class="card">
                  <!--begin::Card title-->
                  <!-- <div class="col card-title">
                          <h2>Aceptacion Activo</h2>
                        </div> -->
                  <div class="card-body pt-0">
                    <!--begin::formulario-->
                    <form class="form" action="?url_id=usuario&id=<?php echo $_GET['id']; ?>" method="POST" name="editar_contraseña" id="editar_contraseña">
                      <input type="hidden" name="formulario" id="formulario" value="editar_contraseña">
                      <input type="hidden" name="id_editar_contraseña" id="id_editar_contraseña" value="<?php echo $_GET['id']; ?>">

                      <div class="py-10 px-lg-17">
                        <!--begin::Input group-->

                        <div class="row">
                          <div class="col-12">
                            <label class="required form-label">Contraseña actual</label>
                            <input required type="text" class="form-control" id="contraseña_actual" name="contraseña_actual" value="" />
                            <label class="required form-label">Nueva contraseña</label>
                            <input required type="text" class="form-control" id="contraseña_nueva" name="contraseña_nueva" value="" />
                            <label class="required form-label">Repetir contraseña</label>
                            <input required type="text" class="form-control" id="contraseña_nueva_repetir" name="contraseña_nueva_repetir" value="" />
                          </div>
                        </div>

                        <!--begin::Actions-->
                        <!--end::Actions-->
                        <div class="text-center pt-15">
                          <input type="submit" name="enviar" id="enviar" value="Editar" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
                    <!--end::formulario-->
                  </div>
                </div>
              </div>

            </div>


            <!--end::Card body-->
            <!--begin::Card footer-->
            <!--end::Card footer-->
          </div>
          <!--end::Card-->
    </div>
  </div>

 
</div>
