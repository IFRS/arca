require( 'datatables.net' );
require( 'datatables.net-bs' );
$(document).ready(function() {
    $('.table-cursos').DataTable({
        order:      [],
        searching:  true,
        paging:     false,
        info:       false,
        bAutoWidth: true,
        "columnDefs": [{
            "targets":   'no-sort',
            "orderable": false,
        }],
        language: {
            "sEmptyTable":     "Nenhum Curso encontrado",
            "sInfo":           "Mostrando de _START_ até _END_ de _TOTAL_ Cursos",
            "sInfoEmpty":      "Mostrando 0 até 0 de 0 Cursos",
            "sInfoFiltered":   "(Filtrados de _MAX_ Cursos)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ".",
            "sLengthMenu":     "_MENU_ Cursos por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing":     "Processando...",
            "sZeroRecords":    "Nenhum Curso encontrado",
            "sSearch":         "Buscar Cursos",
            "oPaginate": {
                "sNext":     "Próximo",
                "sPrevious": "Anterior",
                "sFirst":    "Primeiro",
                "sLast":     "Último"
            },
            "oAria": {
                "sSortAscending":  ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});
