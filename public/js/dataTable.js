$(document).ready( function () {
    //tabla peluquerias
    $('#tabla_peluquerias').DataTable({
        "language": {
            "emptyTable":   "No hay datos disponibles.",
            "info":       "Del _START_ al _END_ de _TOTAL_ ",
            "infoEmpty":   "Mostrando 0 Peluquerias de un total de 0.",
            "infoFiltered":   "(filtrados de un total de _MAX_ Peluquerias)",
            "infoPostFix":   "(actualizados)",
            "lengthMenu":   "Mostrar _MENU_ Peluquerias",
            "loadingRecords":  "Cargando...",
            "processing":   "Procesando...",
            "search":   "Buscar:",
            "searchPlaceholder":  "Buscar",
            "zeroRecords":   "No se han encontrado coincidencias.",
            "paginate": {
                "first":   "Primera",
                "last":    "Última",
                "next":    "Siguiente",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending": "Ordenación ascendente",
                "sortDescending": "Ordenación descendente"
            },
        },
        "order": [[ 1, "asc" ]],
        "bJQueryUI":  false,
        "columns" : [
            {"data": 0, 'orderable': false, 'searchable': false},
            {"data": 1},
            {"data": 2},
            {"data": 3},
        ],
    });
    $('label').addClass('form-inline');
    $('select, input[type="search"]').addClass('form-control input-sm');

    //tabla productos
    $('#tabla_productos').DataTable({
        "language": {
            "emptyTable":   "No hay datos disponibles.",
            "info":       "Del _START_ al _END_ de _TOTAL_ ",
            "infoEmpty":   "Mostrando 0 Productos de un total de 0.",
            "infoFiltered":   "(filtrados de un total de _MAX_ Productos)",
            "infoPostFix":   "(actualizados)",
            "lengthMenu":   "Mostrar _MENU_ Productos",
            "loadingRecords":  "Cargando...",
            "processing":   "Procesando...",
            "search":   "Buscar:",
            "searchPlaceholder":  "Buscar",
            "zeroRecords":   "No se han encontrado coincidencias.",
            "paginate": {
                "first":   "Primera",
                "last":    "Última",
                "next":    "Siguiente",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending": "Ordenación ascendente",
                "sortDescending": "Ordenación descendente"
            },
        },
        "order": [[ 1, "asc" ]],
        "bJQueryUI":  false,
        "columns" : [
            {"data": 0, 'orderable': false, 'searchable': false},
            {"data": 1},
            {"data": 2},
            {"data": 3},
        ],
    });
    $('label').addClass('form-inline');
    $('select, input[type="search"]').addClass('form-control input-sm');
} );
