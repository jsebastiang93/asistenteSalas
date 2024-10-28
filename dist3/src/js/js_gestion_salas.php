<link href="src/plugins/DataTables/datatables.css" rel="stylesheet" type="text/css" />
<script src="src/plugins/DataTables/datatables.js"></script>
<link rel="stylesheet" href="src/plugins/DataTables/Buttons-2.0.1/css/buttons.bootstrap5.css">
<script src="src/plugins/DataTables/Buttons-2.0.1/js/dataTables.buttons.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script>

    var documentTitle_servicios_sala = 'Salas *';
    var dt_servicios_sala = $('#kt_customers_table').DataTable({
        "info": false,
        'order': [],
        'pageLength': 10,
        'dom': '<"row"<"col-sm-6 col-md-4"B><"col-sm-6 col-md-4"<" btn-group">><"col-sm-6 col-md-4"f>>t<"row"<"col-sm-6 col-md-6"l><"col-sm-6 col-md-6"p>>',
        'responsive': true,
        'buttons': [{
            extend: 'excelHtml5',
            text: '	<span class="svg-icon svg-icon-2">' +
                '		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-excel" viewBox="0 0 16 16">' +
                '			<path d="M5.18 4.616a.5.5 0 0 1 .704.064L8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 0 1 .064-.704z"/>' +
                '			<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>' +
                '		</svg>' +
                '	</span>',
            className: 'btn btn-light-success',
            title: documentTitle_servicios_sala,
        }, ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json",
        },
    });
</script>