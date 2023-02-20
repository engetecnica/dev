"use strict";

$(document).ready(function () {

    populateAtivos(null);
    $(".requisicao_estoque:first").val('0')
    $(".requisicao_id_ativo_externo_grupo:first").append('<option value="">Aguarde, carregando lista.</option>')

    /* Adicionar Nova Linha Populada */
    $(document).on('click', '.add_line', function () {
        $(".listagem").append($("#listagem-template").html());
        $(".requisicao_estoque:last").val('0')
        $(".requisicao_id_ativo_externo_grupo:last").append('<option value="">Aguarde, carregando lista.</option>')
        populateAtivos('last');
    });

    /* Buscar Estoque */
    $(document).on('change', "select[name='id_ativo_externo_grupo[]']", function () {

        let requisicao_id_ativo_externo_grupo = $(this).val();
        let requisicao_type = $(this).attr('data-type');

        $.ajax({
            url: base_url + 'ativo_externo/get_estoque_ativo_externo/' + requisicao_id_ativo_externo_grupo,
            dataType: 'json',
            beforeSend: function () {

            }
        }).done(function (results) {

            /* Estoque Init */
            let estoque = (results[0].estoque) ?? 0;

            /* Se o tipo de selecionador for fist, apresenta estoque no primeiro campo da lista */
            $(".requisicao_estoque:" + requisicao_type).val(estoque)

            /* Se o estoque estiver zerado, desabilita quantidade e zera */
            if (estoque == 0) {
                $(".requisicao_quantidade:" + requisicao_type).val('0')
                $(".requisicao_quantidade:" + requisicao_type).prop('disabled', true)
                $(".quantidade:" + requisicao_type).attr('max', estoque);
            } else {
                $(".requisicao_quantidade:" + requisicao_type).val('1');
                $(".requisicao_quantidade:" + requisicao_type).prop('disabled', false)
                $(".quantidade:" + requisicao_type).attr('max', estoque);
            }

        });
    })


    /* Carregando Ativos */
    function populateAtivos(type) {
        $.ajax({
            url: base_url + 'ativo_externo/get_grupos_requisicao',
            dataType: 'json',
            beforeSend: function () { }
        }).done(function (results) {

            $(".requisicao_id_ativo_externo_grupo:last").append('<option value="">Selecione um Item</option>')
            $.each(results, function (k, v) {
                if (v.estoque > 0) {
                    if (type == 'last') {
                        $(".requisicao_id_ativo_externo_grupo:last").append('<option value="' + v.id_ativo_externo_grupo + '">' + v.nome + '</option>')
                    } else {
                        $(".requisicao_id_ativo_externo_grupo").append('<option value="' + v.id_ativo_externo_grupo + '">' + v.nome + '</option>')
                    }
                }
            });

            if (type == 'last') {
                $('#requisicao .requisicao_id_ativo_externo_grupo:last').select2();
            } else {
                $('#requisicao .requisicao_id_ativo_externo_grupo').select2();
            }

        });
    }

    /* Remover Linha */
    $(document).on('click', '.remove_line', function () {
        $(this).closest('.item-lista').remove();
    });



    // var selecionados = 1;   
    // var ativos = [];
    // $(document).on('change', '.ativo-lista', function () {

    //     let quantidade_solicitada               = $(this).attr('data-quantidade_solicitada');
    //     let id_ativo_externo_grupo              = $('.item-lista').attr('data-id_ativo_externo_grupo');
    //     let id_ativo_externo_grupo_linha        = $(this).attr('data-id_ativo_externo_grupo_linha');
    //     let id_ativo_externo                    = $(this).val();

    //     if($(this).is(":checked")) console.log("Esta checkado"); else console.log("Descheckado");

    //     if(!ativos[id_ativo_externo_grupo]) 
    //         ativos[id_ativo_externo_grupo]= 0;

    //     console.log(ativos[id_ativo_externo_grupo]);

    //     if(ativos[id_ativo_externo_grupo] >= quantidade_solicitada ){
    //         if ($(this).is(":checked")) {
    //             this.checked = false;
    //             console.log('limite de escolha atingido')            
    //             return false;
    //         }           
    //     }

    //     console.log(ativos[id_ativo_externo_grupo]);

    //     if($(this).is(":checked")){
    //         ativos[id_ativo_externo_grupo]++
    //         selecionados++;
    //     }else{
    //         ativos[id_ativo_externo_grupo]--
    //         selecionados--;
    //     } 

    //     console.log('ativo grupo', id_ativo_externo_grupo)
    //     console.log('ativo grupo linha', id_ativo_externo_grupo_linha)
    //     // console.log( "Quant:", quantidade_solicitada )        
    //     // console.log('gsel', ativos[id_ativo_externo_grupo])
    //     // console.log('\n\n')    

       
    // })


});

