$(function() {

    // Atribui evento e função para limpeza dos campos
    $('#busca').on('input', limpaCampos);

    // Dispara o Autocomplete a partir do segundo caracter
    $( "#busca" ).autocomplete({
        minLength: 2,
        source: function( request, response ) {
            $.ajax({
                url: "consulta.php",
                dataType: "json",
                data: {
                    acao: 'autocomplete',
                    parametro: $('#busca').val()
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        focus: function( event, ui ) {
            $("#busca").val( ui.item.titulo );
            carregarDados();
            return false;
        },
        select: function( event, ui ) {
            $("#busca").val( ui.item.titulo );
            return false;
        }
    })
        .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
            .append( "<a><b>Unidade: </b>" + item.unidadeInput)
            .appendTo( ul );
    };

    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados(){
        var busca = $('#busca').val();

        if(busca != "" && busca.length >= 2){
            $.ajax({
                url: "consulta.php",
                dataType: "json",
                data: {
                    acao: 'consulta',
                    parametro: $('#busca').val()
                },
                success: function( data ) {
                    $('#unidadeInput').val(data[0].codigo_barra);
                    
                }
            });
        }
    }

    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos(){
        var busca = $('#busca').val();

        if(busca == ""){
            $('#unidadeInput').val('');

        }
    }
});