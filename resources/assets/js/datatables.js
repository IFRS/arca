require( 'datatables.net' );
require( 'datatables.net-bs4' );

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

    $('.table-ofertas').DataTable({
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
            "sEmptyTable":     "Nenhuma Oferta encontrado",
            "sInfo":           "Mostrando de _START_ até _END_ de _TOTAL_ Ofertas",
            "sInfoEmpty":      "Mostrando 0 até 0 de 0 Ofertas",
            "sInfoFiltered":   "(Filtrados de _MAX_ Ofertas)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ".",
            "sLengthMenu":     "_MENU_ Ofertas por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing":     "Processando...",
            "sZeroRecords":    "Nenhum Oferta encontrada",
            "sSearch":         "Buscar Ofertas",
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

    $('.table-arquivos').DataTable({
        order:      [],
        searching:  false,
        paging:     false,
        info:       false,
        bAutoWidth: true,
        "columnDefs": [{
            "targets":   'no-sort',
            "orderable": false,
        }],
        language: {
            "sEmptyTable":     "Nenhum Arquivo encontrado",
            "sInfo":           "Mostrando de _START_ até _END_ de _TOTAL_ Arquivos",
            "sInfoEmpty":      "Mostrando 0 até 0 de 0 Arquivos",
            "sInfoFiltered":   "(Filtrados de _MAX_ Arquivos)",
            "sInfoPostFix":    "",
            "sInfoThousands":  ".",
            "sLengthMenu":     "_MENU_ Arquivos por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing":     "Processando...",
            "sZeroRecords":    "Nenhum Arquivo encontrado",
            "sSearch":         "Buscar Arquivos",
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
