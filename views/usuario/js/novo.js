
$(document).ready(function () {
    pessoas();

    var oTable = $('#tabela').dataTable();
    remover();
    validar();

    jQuery.validator.addMethod("string", function (valor, elemento) {
        var str = jQuery.trim(valor);// retira espaços em branco
        var exp = new RegExp(/^[a-záàâãéèêíïóôõöúçñ ]+$/i);

        if (!str.match(exp)) {
            return false;
        }

        return true;

    }, "Somente Letras"); // Mensagem padrão 


    $.validator.addMethod("loginVerifica", function (valor, elemento) {
        console.log(valor);
        var sms = false;
        $.ajax({
            type: 'POST', url: 'https://localhost/uan/usuario/verificarUsuario',
            data: 'login=' + valor,
            cache: false,
            dataType: "json",
            async: false,
            success: function (response) {

                sms = response === 1 ? false : true
            }
        });

        return sms;

    }, "Este usuario já existe"); // Mensagem padrão

});




function pessoas() {

    $.getJSON('https://localhost/uan/usuario/pesquisaPor/', {
    }).done(function (data) {
        $.each(data, function (id, valor) {

            $("#pessoa").append('<option value="' + valor.id + '">' + valor.nome + '</option>');

        });
    });


}


function tabela() {


    $('#tabela').dataTable({
        "pagingType": "full_numbers",
        "sDom": '<"H"Tlfr>t<"F"ip>',
        "oTableTools": {
            "sRowSelect": "multi",
            "aButtons": ["copy", "csv", "xls", "pdf", "print"]
        },
        "bDestroy": true,
        "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0, 1]
            }],
        "aLengthMenu": [[5, 10, 25, 50, 75, -1], [5, 10, 25, 50, 75, "All"]],
        "iDisplayLength": 5,
        "bJQueryUI": true,
        "oLanguage": {"sLengthMenu":
                    "Mostrar _MENU_ registros por página",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
            "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar: ",
            "oPaginate": {"sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"},
            "oFilterSelectedOptions": {
                AllText: "All Widgets",
                SelectedText: "Selected Widgets"
            }

        },
        "aaSorting": [[0, 'desc']],
        "aoColumnDefs": [{"sType": "num-html", "aTargets": [0]},
        ]

    });
}


function remover() {
    var url = "https://localhost/uan/usuario/index";
    $(document).on('click', '#remover', function () {
        if (confirm('Pretendes Apagar este Item?')) {
            var id = $(this).attr('rel');
            console.log(id);
            $.post(id)
                    .done(function (data) {
                        alert("Dados apagado com sucesso");

                        $(location).attr('href', url);
                    });
        }
        else {
            return false;
        }
    });
}


function validar() {
    $("#adicionar").validate({
        rules: {
            nome: {
                required: true,
                minlength: 4,
                string: true
            },
            login: {
                required: true,
                minlength: 4,
                loginVerifica: true
            },
            senha: {
                required: true,
                minlength: 6
            },
            nivel: {
                required: true,
            }

        }
    });

}
