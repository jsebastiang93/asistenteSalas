<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>


<script>
    function espacios_coma(input) {
        var x = document.getElementById(input);
        x.value = x.value.replace(' ', ';');
    }
</script>

<script>
    "use strict";
    var KTAppCalendar = function() {
        var prueba;
        var table_ordenes_paciente = '';
        var isClickEventAttached = false;
        var e, t, n, a, o, r, i, l, d, s, c, m, u, v, f, p, y, D, _, _2, b, k, g, S, Y, h, T, M, w, E, L, CO, INCO, x = {
                id: "",
                eventName: "",
                eventDescription: "",
                eventLocation: "",
                startDate: "",
                endDate: "",
                allDay: !1
            },
            B = !1;
        const q = e => {
                C();
                const n = x.allDay ? moment(x.startDate).format("Do MMM, YYYY") : moment(x.startDate).format("Do MMM, YYYY - h:mm a"),
                    a = x.allDay ? moment(x.endDate).format("Do MMM, YYYY") : moment(x.endDate).format("Do MMM, YYYY - h:mm a");
                var o = {
                    container: "body",
                    trigger: "manual",
                    boundary: "window",
                    placement: "auto",
                    dismiss: !0,
                    html: !0,
                    title: "Reserva Agendada",
                    content: '<div class="fw-bolder mb-2">' + x.eventName + '</div><div class="fs-7"><span class="fw-bold" ><b>Inicio:</b></span> ' + n + '</div><div class="fs-7 mb-4"><span class="fw-bold" style="color: #bb2d3b"><b>Fin:</b></span> ' + a + '</div><div id="kt_calendar_event_view_button" type="button" class="btn btn-sm btn-light-primary">View More</div>'
                };
                (t = KTApp.initBootstrapPopover(e, o)).show(), B = !0, F()
            },
            C = () => {
                B && (t.dispose(), B = !1)
            },
            N = () => {
                f.innerText = "Generar Reserva", v.show();
                n.value = "";
                a.value = "";
                var t = p.querySelectorAll('[data-kt-calendar="datepicker"]'),
                    r = p.querySelector("#kt_calendar_datepicker_allday");
                O(x)

            },
            A = () => {
                var e, t, n;

                w.show(),
                    x.allDay ?
                    (e = "All Day", t = moment(x.startDate).format("Do MMM, YYYY"), n = moment(x.endDate).format("Do MMM, YYYY")) : (e = "", t = moment(x.startDate).format("Do MMM, YYYY - h:mm a"), n = moment(x.endDate).format("Do MMM, YYYY - h:mm a")), g.innerText = x.eventName, S.innerText = e, Y.innerText = x.eventDescription ? x.eventDescription : "--", h.innerText = x.eventLocation ? x.eventLocation : "--", T.innerText = t, M.innerText = n
            },
            H = () => {
                E.addEventListener("click", (t => {
                    t.preventDefault(), w.hide(), (() => {
                        f.innerText = "Edit an Event", v.show();
                        const t = p.querySelectorAll('[data-kt-calendar="datepicker"]'),
                            r = p.querySelector("#kt_calendar_datepicker_allday");
                        O(x), _.addEventListener("click", (function(t) {
                            t.preventDefault(), y && y.validate().then((function(t) {
                                console.log("validated!"), "Valid" == t ? (_.setAttribute("data-kt-indicator", "on"),
                                    _.disabled = !0,
                                    setTimeout((function() {
                                        _.removeAttribute("data-kt-indicator"), Swal.fire({
                                            text: "New event added to calendar!",
                                            icon: "success",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        }).then((function(t) {
                                            if (t.isConfirmed) {
                                                v.hide(), _.disabled = !1, e.getEventById(x.id).remove();
                                                let t = !1;
                                                r.checked && (t = !0), 0 === c.selectedDates.length && (t = !0);
                                                var l = moment(i.selectedDates[0]).format(),
                                                    s = moment(d.selectedDates[d.selectedDates.length - 1]).format();
                                                if (!t) {
                                                    const e = moment(i.selectedDates[0]).format("YYYY-MM-DD"),
                                                        t = e;
                                                    l = e + "T" + moment(c.selectedDates[0]).format("HH:mm:ss"), s = t + "T" + moment(u.selectedDates[0]).format("HH:mm:ss")
                                                }
                                                e.addEvent({
                                                    id: V(),
                                                    title: n.value,
                                                    description: a.value,
                                                    location: o.value,
                                                    start: l,
                                                    end: s,
                                                    allDay: t
                                                }), e.render(), p.reset()
                                            }
                                        }))
                                    }), 2e3)) : Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                })
                            }))
                        }))
                    })()
                }))
            },
            F = () => {
                document.querySelector("#kt_calendar_event_view_button").addEventListener("click", (e => {
                    e.preventDefault(), C(), A()
                }))
            },
            O = () => {
                n.value = x.eventName ? x.eventName : "", a.value = x.eventDescription ? x.eventDescription : "", o.value = x.eventLocation ? x.eventLocation : "", i.setDate(x.startDate, !0, "Y-m-d");
                const e = x.endDate ? x.endDate : moment(x.startDate).format();
                d.setDate(e, !0, "Y-m-d");
                const t = p.querySelector("#kt_calendar_datepicker_allday"),
                    r = p.querySelectorAll('[data-kt-calendar="datepicker"]');
                x.allDay ? (t.checked = !0, r.forEach((e => {
                    e.classList.add("d-none")
                }))) : (c.setDate(x.startDate, !0, "Y-m-d H:i"), u.setDate(x.endDate, !0, "Y-m-d H:i"), d.setDate(x.startDate, !0, "Y-m-d"), t.checked = !1, r.forEach((e => {
                    e.classList.remove("d-none")
                })))
            },
            P = e => {
                x.id = e.id, x.eventName = e.title, x.eventDescription = e.description, x.eventLocation = e.location, x.startDate = e.startStr, x.endDate = e.endStr, x.allDay = e.allDay
            },
            V = () => Date.now().toString() + Math.floor(1e3 * Math.random()).toString();
        return {
            init: function() {
                // VARIABLES DEL MODAL

                const t = document.getElementById("kt_modal_add_event"); //NOMBRE DEL MODAL
                p = t.querySelector("#kt_modal_add_event_form"), //NOMBRE DEL FORMULARIO
                    n = p.querySelector('[name="calendar_event_name"]'),
                    a = p.querySelector('[name="calendar_event_description"]'),
                    o = p.querySelector('[name="calendar_event_location"]'),
                    r = p.querySelector("#kt_calendar_datepicker_start_date"),
                    l = p.querySelector("#kt_calendar_datepicker_end_date"),
                    s = p.querySelector("#kt_calendar_datepicker_start_time"),
                    m = p.querySelector("#kt_calendar_datepicker_end_time"),
                    D = document.querySelector('[data-kt-calendar="add"]'),
                    _ = p.querySelector("#kt_modal_add_event_submit_doc"),
                    _2 = p.querySelector("#kt_modal_add_event_submit"),
                    b = p.querySelector("#kt_modal_add_event_cancel"),
                    k = t.querySelector("#kt_modal_add_event_close"),
                    f = p.querySelector('[data-kt-calendar="title"]');
                v = new bootstrap.Modal(t);

                const B = document.getElementById("kt_modal_view_event");
                var F, O, I, R, G, K;
                prueba = _.addEventListener("click", (function(t) {
                    // console.log(n.value);
                    // console.log(a.value);
                    // console.log(isClickEventAttached);
                    t.preventDefault();
                    y && y.validate().then((function(t) {
                        const currentA = n.value; // Cambiar a n.value en lugar de a.value
                        if (currentA && r.value && l.value && s.value && m.value) {


                            fetch('src/ajax/a_agenda_reservas.php', {
                                    method: 'POST', // O 'GET' u otro método según tu necesidad
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        accion: 'consulta_sala',
                                        sede: currentA,
                                        fecha_inicio: r.value,
                                        fecha_fin: l.value,
                                        hora_inicio: s.value,
                                        hora_fin: m.value,
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    // mensaje = data.mensaje;
                                    // console.log();
                                    if (data.mensaje == "ok") {
                                        document.getElementById('crear_reserva').style.display = 'block';
                                        var salas = data.salas_disponibles;
                                        var select2 = document.getElementById("id_sala");
                                        select2.innerHTML = '';
                                        var defaultOption = document.createElement("option");
                                        defaultOption.value = ""; // Establece el valor de la opción "Ninguna" según tus necesidades
                                        defaultOption.text = "Ninguna"; // Texto visible de la opción "Ninguna"
                                        select2.appendChild(defaultOption);

                                        for (var i = 0; i < salas.length; i++) {
                                            var sala = salas[i];
                                            var detalle = sala.nombre + '. Bloque: ' + sala.bloque + ' . Capacidad de estudiantes: ' + sala.capacidad_estudiantes + ' . Aire: ' + sala.aire_acondicionado + ' . Video Beam: ' + sala.video_beam;
                                            var option = document.createElement("option");
                                            option.value = sala.id + '/' + detalle; // Establece el valor de la opción (puedes cambiarlo según tus necesidades)
                                            option.text = sala.nombre + '. Bloque: ' + sala.bloque + ' . Capacidad de estudiantes: ' + sala.capacidad_estudiantes + ' . Aire: ' + sala.aire_acondicionado + ' . Video Beam: ' + sala.video_beam; // Establece el texto visible de la opción (puedes cambiarlo según tus necesidades)
                                            select2.appendChild(option); // Agrega la opción al select2
                                        }
                                    } else {
                                        Swal.fire({
                                            text: "No hay disponibilidad para la hora de inicio seleccionada.",
                                            icon: "warning",
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                        } else {
                            Swal.fire({
                                text: "Debes de llenar los campos requeridos",
                                icon: "warning",
                            });
                        }
                    }));
                }));

                // Obtiene una referencia al botón
                var submitButton = document.getElementById("kt_modal_add_event_submit");

                // Escucha el evento clic del botón
                submitButton.addEventListener("click", (function(t) {
                    t.preventDefault();
                    var datos = $(p).serializeArray();

                    const origen = datos.find(item => item.name === 'origen')?.value;
                    const fecha_estimada_inicio = datos.find(item => item.name === 'fecha_estimada_inicio')?.value;
                    const hora_estimada_inicio = datos.find(item => item.name === 'hora_estimada_inicio')?.value;
                    const correo_alterno = datos.find(item => item.name === 'correo_alterno')?.value;
                    const tipodoc = datos.find(item => item.name === 'tipodoc')?.value;
                    const primernombre = datos.find(item => item.name === 'primernombre')?.value;
                    const primerapellido = datos.find(item => item.name === 'primerapellido')?.value;
                    const empresa_buscar = datos.find(item => item.name === 'empresa_buscar')?.value;
                    const enmision = datos.find(item => item.name === 'enmision')?.value;
                    const tipocargo = datos.find(item => item.name === 'tipocargo')?.value;
                    const tipo = datos.find(item => item.name === 'tipo')?.value;
                    const cargo = datos.find(item => item.name === 'cargo')?.value;
                    const servicios = datos.find(item => item.name === 'servicios')?.value;

                    if (origen == "" || fecha_estimada_inicio == "" || hora_estimada_inicio == "" || correo_alterno == "" || tipodoc == "" || primernombre == "" || primerapellido == "" || empresa_buscar == "" || enmision == "" || tipocargo == "" || tipo == "" || cargo == "" || servicios == "") {
                        // console.log('-------------- aAAQUI---------', datos);
                        Swal.fire(
                            'Faltan campos!!',
                            'Faltan campos por llenar, verifica los que tienen el * de color rojo, son obligatorios',
                            'error'
                        )
                    } else {

                        Swal.fire({
                            title: '¿Estás seguro?',
                            text: 'Esta acción no se puede deshacer.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Aceptar',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // AGREGAR TODOS LOS DATOS DEL FORMULARIO A DATOSOBJECTO
                                var datosObjeto = {};
                                $.each(datos, function(index, campo) {
                                    // Verificar si el campo es un campo Select2 múltiple
                                    if ($('[name="' + campo.name + '"]').hasClass('js-example-basic-multiple')) {
                                        var valoresSeleccionados = $('[name="' + campo.name + '"]').val();
                                        datosObjeto[campo.name] = valoresSeleccionados;
                                    } else {
                                        datosObjeto[campo.name] = campo.value;
                                    }
                                });

                                Swal.fire({
                                    title: 'Cargando...',
                                    timerProgressBar: true,
                                    onBeforeOpen: () => {
                                        Swal.showLoading();
                                    },
                                    allowOutsideClick: false,
                                    allowEscapeKey: false
                                });

                                fetch('src/ajax/a_agenda_reservas.php', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            accion: 'generar_reserva',
                                            data: datosObjeto
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        Swal.close();
                                        // console.log(data.resultado);
                                        if (data.mensaje == "ok") {
                                            // Swal.fire('¡Cita generada!!', 'La cita se ha generado exitosamente', 'success');
                                            setTimeout((function() {
                                                _.removeAttribute("data-kt-indicator"), Swal.fire({
                                                    text: "!Reserva generada!! La reserva se ha generado exitosamente. El numero de reserva es:" + data.numero_reserva,
                                                    icon: "success",
                                                    buttonsStyling: !1,
                                                    confirmButtonText: "Ok, got it!",
                                                    customClass: {
                                                        confirmButton: "btn btn-primary"
                                                    }
                                                }).then((function(t) {
                                                    if (t.isConfirmed) {
                                                        // var description = 
                                                        // v.hide(), _.disabled = !1, e.getEventById(x.id).remove();
                                                        let t = !1;
                                                        r.checked && (t = !0), 0 === c.selectedDates.length && (t = !0);
                                                        var l = moment(i.selectedDates[0]).format(),
                                                            s = moment(d.selectedDates[d.selectedDates.length - 1]).format();
                                                        if (!t) {
                                                            const e = moment(i.selectedDates[0]).format("YYYY-MM-DD"),
                                                                t = e;
                                                            l = e + "T" + moment(c.selectedDates[0]).format("HH:mm:ss"), s = t + "T" + moment(u.selectedDates[0]).format("HH:mm:ss")
                                                        }

                                                        v.hide(), e.dismiss;
                                                        document.getElementById('crear_reserva').style.display = 'none';
                                                        var salas = $('#salas');
                                                        salas.val([]).trigger('change');

                                                        e.addEvent({
                                                            id: V(),
                                                            title: data.title,
                                                            description: data.description,
                                                            location: data.location,
                                                            start: l,
                                                            end: s,
                                                            allDay: t
                                                        }), e.render(), p.reset();
                                                        document.getElementById('crear_reserva').style.display = 'none';
                                                    }
                                                }))
                                            }), 1e3);
                                        } else {
                                            Swal.fire({
                                                title: "Error!!",
                                                text: "La reserva no ha podido ser generada de manera exitosa",
                                                icon: "error"
                                            });
                                        }
                                    })
                                    .catch(error => {});

                            } else {
                                // El usuario hizo clic en el botón "Cancelar" o cerró la alerta
                                Swal.fire('Cancelado', 'La acción ha sido cancelada.', 'error');
                            }
                        });



                    }
                }));


                w = new bootstrap.Modal(B), g = B.querySelector('[data-kt-calendar="event_name"]'), S = B.querySelector('[data-kt-calendar="all_day"]'), Y = B.querySelector('[data-kt-calendar="event_description"]'), h = B.querySelector('[data-kt-calendar="event_location"]'), T = B.querySelector('[data-kt-calendar="event_start_date"]'), M = B.querySelector('[data-kt-calendar="event_end_date"]'), E = B.querySelector("#kt_modal_view_event_edit"), L = B.querySelector("#kt_modal_view_event_delete"), CO = B.querySelector("#kt_modal_view_event_confirm"), INCO = B.querySelector("#kt_modal_view_event_inconsistencia"), F = document.getElementById("kt_calendar_app"), O = moment().startOf("day"), I = O.format("YYYY-MM"), R = O.clone().subtract(1, "day").format("YYYY-MM-DD"), G = O.format("YYYY-MM-DD"), K = O.clone().add(1, "day").format("YYYY-MM-DD"), (e = new FullCalendar.Calendar(F, {
                        headerToolbar: {
                            left: "prev,next today",
                            center: "title",
                            right: "timeGridDay, timeGridWeek, dayGridMonth"
                        },
                        initialDate: G,
                        navLinks: !0,
                        selectable: !0,
                        selectMirror: !0,
                        select: function(e) {
                            C(), P(e), N()
                        },
                        eventClick: function(e) {
                            C(), P({
                                id: e.event.id,
                                title: e.event.title,
                                description: e.event.extendedProps.description,
                                location: e.event.extendedProps.location,
                                startStr: e.event.startStr,
                                endStr: e.event.endStr,
                                allDay: e.event.allDay
                            }), A()
                            // console.log("hola");

                        },
                        eventMouseEnter: function(e) {
                            P({
                                id: e.event.id,
                                title: e.event.title,
                                description: e.event.extendedProps.description,
                                location: e.event.extendedProps.location,
                                startStr: e.event.startStr,
                                endStr: e.event.endStr,
                                allDay: e.event.allDay
                            }), q(e.el)
                        },

                        editable: true,
                        dayMaxEvents: true,
                        navLinks: true,
                        events: <?php echo ($disponibilidad_profesional); ?>,
                        datesSet: function() {
                            C()
                        }
                    })).render(), y = FormValidation.formValidation(p, {
                        fields: {
                            calendar_event_name: {
                                validators: {
                                    notEmpty: {
                                        message: "La sede es requerida"
                                    }
                                }
                            },
                            calendar_event_start_date: {
                                validators: {
                                    notEmpty: {
                                        message: "La fecha es requerida"
                                    }
                                }
                            },
                            calendar_event_start_time: {
                                validators: {
                                    notEmpty: {
                                        message: "La hora de inicio es requerida"
                                    }
                                }
                            },
                            calendar_event_end_time: {
                                validators: {
                                    notEmpty: {
                                        message: "La hora de fin es requerida"
                                    }
                                }
                            },
                            calendar_event_description: {
                                validators: {
                                    notEmpty: {
                                        message: "El numero de cedula es requerido"
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger,
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: ""
                            })
                        }
                    }), i = flatpickr(r, {
                        enableTime: !1,
                        dateFormat: "Y-m-d"
                    }), d = flatpickr(l, {
                        enableTime: !1,
                        dateFormat: "Y-m-d"
                    }), c = flatpickr(s, {
                        enableTime: !0,
                        noCalendar: !0,
                        dateFormat: "H:i"
                    }), u = flatpickr(m, {
                        enableTime: !0,
                        noCalendar: !0,
                        dateFormat: "H:i"
                    }),
                    H(), D.addEventListener("click", (e => {
                        console.log("291");
                        C(), x = {
                                id: "",
                                eventName: "",
                                eventDescription: "",
                                startDate: new Date,
                                endDate: new Date,
                                allDay: !1
                            },
                            N()
                    })),

                    // ELIMINAR LA CITA
                    L.addEventListener("click", (t => {
                        t.preventDefault();
                        isClickEventAttached = true;
                        Swal.fire({
                            text: "Desea eliminar la reserva?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Si!!",
                            cancelButtonText: "No!!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then((function(t) {
                            if (t.value === true) {
                                isClickEventAttached = true;
                                Swal.fire({
                                    title: "Seleccione motivo de cancelación",
                                    html: `
                                        <div>
                                        <label for="select3">Motivo:</label>
                                        <select id="select3" class="form-select">
                                            <option value=""></option>
                                            <option value="Docente no asistió">Docente no asistió</option>
                                            <option value="Clase virtual">Clase virtual</option>
                                        </select>
                                        </div>`,
                                    showCancelButton: true,
                                    confirmButtonText: "Cancelar reserva",
                                    showLoaderOnConfirm: true,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        const select3Value = document.getElementById('select3').value;
                                        if (select3Value == "") {
                                            Swal.fire({
                                                position: "top-end",
                                                icon: "error",
                                                title: "Debe de seleccionar un motivo de cancelación",
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        } else {
                                            var datos_agenda = x.eventName;
                                            var id_reserva = datos_agenda.split('#')[1];
                                            fetch('src/ajax/a_agenda_reservas.php', {
                                                    method: 'POST', // O 'GET' u otro método según tu necesidad
                                                    headers: {
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify({
                                                        accion: 'eliminar_reserva',
                                                        id_reserva: id_reserva,
                                                        motivo: select3Value,
                                                        idusuario: '<?php echo $_SESSION['id_usuario'] ?>',
                                                    })
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    // Manejar la respuesta del servidor aquí
                                                    if (data.mensaje == "ok") {
                                                        Swal.fire({
                                                            position: "top-end",
                                                            icon: "success",
                                                            title: "Reserva cancelada correctamente",
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        });
                                                        window.location.reload()

                                                        // e.getEventById(x.id).remove();
                                                        // e.refetchEvents(); // Esto volverá a cargar los eventos en el calendario
                                                        // w.hide();
                                                        // p.reset();

                                                    }

                                                })
                                                .catch(error => {
                                                    // console.error('Error:', error);
                                                });
                                            // console.log(x.id);

                                        }
                                    }
                                });
                                // El usuario hizo clic en el botón "confirmar"

                            } else if (t.dismiss === Swal.DismissReason.cancel) {
                                // El usuario hizo clic en el botón "cancelar"
                                Swal.fire({
                                    text: "El evento no ha sido elimiado",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                            }
                        }));
                    })),
                    CO.addEventListener("click", (t => {
                        t.preventDefault();
                        isClickEventAttached = true;
                        Swal.fire({
                            text: "¿Está seguro que quiere confirmar la reserva de la sala?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Si!!",
                            cancelButtonText: "No!!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then((function(t) {
                            if (t.value === true) {
                                isClickEventAttached = true;

                                var datos_agenda = x.eventName;
                                var id_reserva = datos_agenda.split('#')[1];
                                fetch('src/ajax/a_agenda_reservas.php', {
                                        method: 'POST', // O 'GET' u otro método según tu necesidad
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({
                                            accion: 'confirmar_reserva',
                                            id_reserva: id_reserva,
                                            idusuario: '<?php echo $_SESSION['id_usuario'] ?>',
                                        })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        // Manejar la respuesta del servidor aquí
                                        if (data.mensaje == "ok") {
                                            Swal.fire({
                                                position: "top-end",
                                                icon: "success",
                                                title: "Reserva confirmada correctamente",
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                            window.location.reload()

                                            // e.getEventById(x.id).remove();
                                            // e.refetchEvents(); // Esto volverá a cargar los eventos en el calendario
                                            // w.hide();
                                            // p.reset();

                                        }

                                    })
                                    .catch(error => {
                                        // console.error('Error:', error);
                                    });
                                // console.log(x.id);

                            }
                            // El usuario hizo clic en el botón "confirmar"


                        }));
                    })),
                    INCO.addEventListener("click", (t => {
                        t.preventDefault();
                        isClickEventAttached = true;
                        Swal.fire({
                            text: "Desea generar una inconsistencia a la reserva?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Si!!",
                            cancelButtonText: "No!!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then((function(t) {
                            if (t.value === true) {
                                isClickEventAttached = true;
                                Swal.fire({
                                    title: "Seleccione la inconsistencia",
                                    html: `
                                        <div>
                                        <label for="select3">Inconsistencia:</label>
                                        <select id="inconsistencia" class="form-select">
                                            <option value=""></option>
                                            <option value="No funciona el aire">No funciona el aire</option>
                                            <option value="No funciona el video beam">No funciona el video beam</option>
                                        </select>
                                        </div>`,
                                    showCancelButton: true,
                                    confirmButtonText: "Generar inconsistencia",
                                    showLoaderOnConfirm: true,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        const inconsistencia = document.getElementById('inconsistencia').value;
                                        if (inconsistencia == "") {
                                            Swal.fire({
                                                position: "top-end",
                                                icon: "error",
                                                title: "Debe de digitar la inconsistencia",
                                                showConfirmButton: false,
                                                timer: 1500
                                            });
                                        } else {
                                            var datos_agenda = x.eventName;
                                            var id_reserva = datos_agenda.split('#')[1];
                                            fetch('src/ajax/a_agenda_reservas.php', {
                                                    method: 'POST', // O 'GET' u otro método según tu necesidad
                                                    headers: {
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify({
                                                        accion: 'generar_inconsistencia',
                                                        id_reserva: id_reserva,
                                                        inconsistencia: inconsistencia,
                                                        idusuario: '<?php echo $_SESSION['id_usuario'] ?>',
                                                    })
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    // Manejar la respuesta del servidor aquí
                                                    if (data.mensaje == "ok") {
                                                        Swal.fire({
                                                            position: "top-end",
                                                            icon: "success",
                                                            title: "Inconsistencia generada correctamente",
                                                            showConfirmButton: false,
                                                            timer: 1500
                                                        });
                                                        // window.location.reload()

                                                        // e.getEventById(x.id).remove();
                                                        // e.refetchEvents(); // Esto volverá a cargar los eventos en el calendario
                                                        // w.hide();
                                                        // p.reset();

                                                    }

                                                })
                                                .catch(error => {
                                                    // console.error('Error:', error);
                                                });
                                            // console.log(x.id);

                                        }
                                    }
                                });
                            }
                            // El usuario hizo clic en el botón "confirmar"


                        }));
                    })),

                    b.addEventListener("click", (function(e) {
                        e.preventDefault(),
                            Swal.fire({
                                text: "Deseas cancelar la reserva?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Si!!",
                                cancelButtonText: "No!!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                    cancelButton: "btn btn-active-light"
                                }
                            }).then((function(e) {
                                e.value ? (p.reset(), v.hide()) : "cancel" === e.dismiss && Swal.fire({
                                    text: "No has cancelado la reserva!!!",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                })
                                e.value ? (p.reset(), v.hide()) : "confirm" === e.dismiss,
                                    document.getElementById('crear_reserva').style.display = 'none';
                            }))
                    })),
                    k.addEventListener("click", (function(e) {
                        e.preventDefault(), Swal.fire({
                            text: "Deseas cancelar la reserva?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Si!!",
                            cancelButtonText: "No!!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then((function(e) {
                            e.value ? (p.reset(), v.hide()) : "cancel" === e.dismiss && Swal.fire({
                                text: "No has cancelado la Reserva!!!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            })
                            e.value ? (p.reset(), v.hide()) : "confirm" === e.dismiss,
                                document.getElementById('crear_reserva').style.display = 'none';

                        }))
                    })),
                    (e => {
                        e.addEventListener("hidden.bs.modal", (e => {
                            y && y.resetForm(!0)
                        }))
                    })(t)
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        // console.log("Initializing KTAppCalendar...");
        KTAppCalendar.init()
    }));
</script>


<!-- Funcionalidad de formulario de Busqueda de paciente  -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script language="javascript">
    $("#id_sala").on('focusout', function(e) {
        var id_sala = document.getElementById("id_sala").value;
        fetch('src/ajax/a_agenda_reservas.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    accion: 'consulta_inconsistencias',
                    id_sala: id_sala
                })
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data.resultado);
                if (data.mensaje == "ok") {
                    if (data.comentarios_concatenados[0].comentarios_concatenados) {
                        document.getElementById("alert_inconsis").style.display = 'block';
                        document.getElementById("text_alert_inconsis").innerHTML = data.comentarios_concatenados[0].comentarios_concatenados;
                    }else{
                        document.getElementById("alert_inconsis").style.display = 'none';

                    }
                  
                }
            });



    });

    $("#sala_masivo").on('focusout', function(e) {
        var id_sala = document.getElementById("sala_masivo").value;
        fetch('src/ajax/a_agenda_reservas.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    accion: 'consulta_inconsistencias',
                    id_sala: id_sala
                })
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data.resultado);
                if (data.mensaje == "ok") {
                    if (data.comentarios_concatenados[0].comentarios_concatenados) {
                        document.getElementById("alert_inconsis_masivo").style.display = 'block';
                        document.getElementById("text_alert_inconsis_masivo").innerHTML = data.comentarios_concatenados[0].comentarios_concatenados;
                    }else{
                        document.getElementById("alert_inconsis_masivo").style.display = 'none';

                    }
                  
                }
            });



    });

</script>

<script>
    function mostrar_loader() {
        document.getElementById('cargar_informacion_loader').style.display = 'block';
    }

    function ocultar_loader() {
        document.getElementById('cargar_informacion_loader').style.display = 'none';
    }
</script>