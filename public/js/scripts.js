$(document).ready(function () {

    $(document).ready(function() {
        $('#table_extrato').DataTable({
            "scrollY": "470px",
            "scrollCollapse": true,
            "paging":         false,
            "bInfo" : false,
            "searching": false
        });
        let id_conta_session = $("#id_conta_session").val();
        if (id_conta_session > 0) {
            $("#menu_div_categoria").removeClass("disabled");
            $("#menu_div_extrato").removeClass("disabled");
            $("#menu_div_trasacoes").removeClass("disabled");
            $("#menu_div_cartao_credito").removeClass("disabled");
            $("#menu_div_agendamentos").removeClass("disabled");
        }
    });

    jQuery.browser = {};
    (function () {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();

    jQuery(document).ready(function ($) {
        $("#valor").maskMoney({showSymbol: true, symbol:'R$ ', thousands:'.', decimal:',', symbolStay: true});
        $("#encargos").maskMoney({showSymbol: true, symbol:'R$ ', thousands:'.', decimal:',', symbolStay: true});
        $("#iof").maskMoney({showSymbol: true, symbol:'R$ ', thousands:'.', decimal:',', symbolStay: true});
        $("#anuidade").maskMoney({showSymbol: true, symbol:'R$ ', thousands:'.', decimal:',', symbolStay: true});
        $("#juros").maskMoney({showSymbol: true, symbol:'R$ ', thousands:'.', decimal:',', symbolStay: true});
        $("#protecao_premiada").maskMoney({showSymbol: true, symbol:'R$ ', thousands:'.', decimal:',', symbolStay: true});
        $("#valor_pagamento_fatura").maskMoney({showSymbol: true, symbol:'R$ ', thousands:'.', decimal:',', symbolStay: true});
        $("#numero_cartao").mask("9999.9999.9999.9999");
        $(".numero_cartao").mask("9999.9999.9999.9999");
        $(".data_movimentacao").mask("99/99/9999");
        $("#data_validade").mask("99/9999");
    });

    switch ("{{ uri.getPath() }}") {
        case "/":
            $("#home").attr("class", "active");
            break;
        case "/livros":
            $("#livros").attr("class", "active");
            break;
    }

    $(function() {
        $('table#table_lista_itens_fatura tbody tr').hover(
            function(){
                $(this).addClass('destaque');
            },
            function(){
                $(this).removeClass('destaque');
            }
        );
    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $(function(){
        $(".remove-color-name").click(function(){
            $("#name").val("").css("background", "white");
            $("#name").css("color", "black");
        });
    });

    $(function(){
        $(".remove-color-email").click(function(){
            $("#email").val("").css("background", "white");
            $("#email").css("color", "black");
        });
    });

    $(function(){
        $(".remove-color-password").click(function(){
            $("#password").val("").css("background", "white");
            $("#password").attr("type", "password").css("color", "black");
        });
    });

    $(function(){
        $(".remove-color-re-password").click(function(){
            $("#re_password").val("").css("background", "white");
            $("#re_password").attr("type", "password").css("color", "black");
        });
    });

    $(function(){
        $(".remove-color-input-cbanco").click(function() {
            let cod_banco = $("#cod_banco").val();
            if (cod_banco != "") {
                $("#cod_banco").val("").css("background", "white");
            } else {
                $("#cod_banco").css("background", "white");
            }
            $("#cod_banco").attr("type", "text").css("color", "black");
        });
    });

    $(function(){
        $(".remove-color-input-tpconta").click(function() {
            let tipo_conta = $(this).val();
            if (tipo_conta != "") {
                $("#tipo_conta").val("").css("background", "white");
            } else {
                $("#tipo_conta").css("background", "white");
            }
            $("#tipo_conta").attr("type", "text").css("color", "black");
        });
    });

    $(function(){
        $(".remove-color-input-nbanco").click(function() {
            let nome_banco = $("#nome_banco").val();
            if (nome_banco != "") {
                $("#nome_banco").val("").css("background", "white");
            } else {
                $("#nome_banco").css("background", "white");
            }
            $("#nome_banco").attr("type", "text").css("color", "black");
        });
    });

    $(function(){
        $(".remove-color-input-money").click(function() {
            let str = $(this).val();
            if (str.indexOf("Preencha") > -1 || str.indexOf("Informe") > -1 || str.indexOf("Valor") > -1) {
                $(this).val("").css("background", "white").css("color", "black");
            }
        });
        $(".remove-color-input-money").focus(function() {
            let str = $(this).val();
            if (str.indexOf("Preencha") > -1 || str.indexOf("Informe") > -1 || str.indexOf("Valor") > -1) {
                $(this).val("").css("background", "white").css("color", "black");
            }
        });
    });

    // CADASTRO DE BANDEIRA
    $(function(){
        $(".remove-color-input-bandeira").click(function() {
            let bandeira = $("#bandeira").val();
            if (bandeira.length != 0 && bandeira == "Preencha o Nome da Bandeira!" || bandeira == "Bandeira deve conter acima de 3 dígitos!" || bandeira == "Bandeira já Cadastrada!") {
                $("#bandeira").val("");
                $("#bandeira").css("background", "white");
            } else if (bandeira.length != 0) {
                $("#bandeira").css("background", "white");
            } else {
                $("#bandeira").css("background", "white");
            }
            $("#bandeira").attr("type", "text").css("color", "black");
        });
    });

    // CADASTRO DE CATEGORIA
    $(function(){
        $(".remove-color-input-categoria").click(function() {
            let nome_categoria = $("#nome_categoria").val();
            if (nome_categoria.length != 0 && nome_categoria == "Preencha a Categoria!" || nome_categoria == "Categoria somente Texto!") {
                $("#nome_categoria").val("");
                $("#nome_categoria").css("background", "white");
            } else if (nome_categoria.length != 0) {
                $("#nome_categoria").css("background", "white");
            } else {
                $("#nome_categoria").css("background", "white");
            }
            $("#nome_categoria").attr("type", "text").css("color", "black");
        });
    });


    $(function() {
        $("#despesa_fixa").click(function () {
            //let nome_categoria = $("#despesa_fixa").val();
            //$(this).find('option[value="0"]').attr("type", "text").css("color", "white");
            //$(this).find('option[value='+nome_categoria+']').remove();
            //$(this).html("<option value=0>"+nome_categoria+"</option>");
            //$(this+" option[value='+nome_categoria+']").remove();
            //$("#despesa_fixa option[value='1']").remove();
            //$("#despesa_fixa").children('option:not(:3)').remove();
            //$(this).find("[value="+nome_categoria+"]").remove();
            //$(this).children('option:not(:first)').remove();
            //$(this).find('option').css('color', 'black');
        });

    });


    $(function() {
        $(".remove-color-input").click(function() {
            let str = $(this).val();
            if (str.indexOf("Preencha") > -1 || str.indexOf("Números") > -1 || str.indexOf("caracters") > -1) {
                $(this).val("").css("background", "white");
                $(this).attr("type", "text").css("color", "black");
            }
        });
        $(".remove-color-input").focus(function () {
            let str = $(this).val();
            if (str.indexOf("Preencha") > -1 || str.indexOf("Números") > -1 || str.indexOf("caracters") > -1) {
                $(this).val("").css("background", "white");
                $(this).attr("type", "text").css("color", "black");
            }
        });
    });

    $(function() {
        $(".remove-color-input-date").click(function() {
            let data_validade = $(this).val();
            if (data_validade.length != 0 && data_validade == "Informe a Data de Validade do Cartão") {
                $("#data_validade").val("");
                $("#data_validade").css("background", "white");
            } else if (data_validade.length != 0) {
                $("#data_validade").css("background", "white");
            } else {
                $("#data_validade").css("background", "white");
            }
            $("#data_validade").attr("type", "text").css("color", "black");
        });
        $(".remove-color-input-date").focus(function () {
            let data_validade = $(this).val();
            if (data_validade.length != 0 && data_validade == "Informe a Data de Validade do Cartão") {
                $("#data_validade").val("");
                $("#data_validade").css("background", "white");
            } else if (data_validade.length != 0) {
                $("#data_validade").css("background", "white");
            } else {
                $("#data_validade").css("background", "white");
            }
            $("#data_validade").attr("type", "text").css("color", "black");
        });
    });

    $(function() {
        $(".remove-color-input-dpf").click(function() {
            let dia_pgto_fatura = $(this).val();
            if (dia_pgto_fatura.length != 0 && dia_pgto_fatura == "Informe o dia do Pagamento do Cartão!" || dia_pgto_fatura == "Dia do Pagamento Somente Números!" || dia_pgto_fatura == "Dia do Pagamento Deve Ser Entre 1 e 31!") {
                $("#dia_pgto_fatura").val("");
                $("#dia_pgto_fatura").css("background", "white");
            } else if (dia_pgto_fatura.length != 0) {
                $("#dia_pgto_fatura").css("background", "white");
            } else {
                $("#dia_pgto_fatura").css("background", "white");
            }
            $("#dia_pgto_fatura").attr("type", "text").css("color", "black");
        });
        $(".remove-color-input-dpf").focus(function () {
            let dia_pgto_fatura = $(this).val();
            if (dia_pgto_fatura.length != 0 && dia_pgto_fatura == "Informe o dia do Pagamento do Cartão!" || dia_pgto_fatura == "Dia do Pagamento Somente Números!" || dia_pgto_fatura == "Dia do Pagamento Deve Ser Entre 1 e 31!") {
                $("#dia_pgto_fatura").val("");
                $("#dia_pgto_fatura").css("background", "white");
            } else if (dia_pgto_fatura.length != 0) {
                $("#dia_pgto_fatura").css("background", "white");
            } else {
                $("#dia_pgto_fatura").css("background", "white");
            }
            $("#dia_pgto_fatura").attr("type", "text").css("color", "black");
        });
    });

    $(function() {
        $(".remove-color-input-num-card").click(function() {
            $(this).mask("9999.9999.9999.9999");
            $(this).val("").css("background", "white");
            $(this).attr("type", "text").css("color", "black");

        });
        $(".remove-color-input-num-card").focus(function () {
            $(this).mask("9999.9999.9999.9999");
            $(this).val("").css("background", "white");
            $(this).attr("type", "text").css("color", "black");
        });
    });


    $(function(){
        $(".remove-color-option").click(function() {
            $(this).css("background", "white");
            $(this).find('option').css('color', 'black');
            $(this).css('color', 'black');
        });
        $(".remove-color-option").focus(function () {
            $(this).css("background", "white");
            $(this).find('option').css('color', 'black');
            $(this).css('color', 'black');
        });
    });


    $(function(){
        $("#tipo_conta").click(function () {
            $(this).find('option').css('color', 'black');
        });
    });

    $(function(){
        $("#banco").click(function () {
            $(this).find('option').css('color', 'black');
        });
    });

    $(function(){
        $("#categoria").click(function () {
            $(this).find('option').css('color', 'black');
        });
        $("#categoria").change(function () {
            $(this).css('color', 'black');
        });
    });

    $(function(){
        conta = $("#_has_conta").val();
        if (conta > 0) {
            $("#menu_div_banco").removeClass("disabled");
            $("#menu_div_extrato").removeClass("disabled");
            $("#menu_div_banco").removeClass("disabled");
            $("#menu_div_trasacoes").removeClass("disabled");
            $("#menu_div_cartao_credito").removeClass("disabled");
            $("#menu_div_agendamentos").removeClass("disabled");
            $("#menu_div_dashboards").removeClass("disabled");
        }
    });

    $(function(){
        $("#btn-trocar-conta").click(function () {
            let url = '/conta/clean-session-conta';
            let _csrf_token = $("#_csrf_token").val();
            axios.get(url, {
                params: {
                    _csrf_token: _csrf_token
                }
            })
                .then(function(response) {
                    if (response.status == 201) {
                        window.location.replace(response.data['base_url']);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        alert(error.response.data.error);
                    }
                })
        });
    });


    // FORMULÁRIO QUITAR FATURA DE CARTÃO DE CRÉDITO
    $('#btn_novo_pgto_fatura').click(function () {
        $("#btn_novo_pgto_fatura").attr('disabled', 'disabled');
        $("#btn_calcular_fatura").removeAttr('disabled');
        $("#btn_pagar_fatura").removeAttr('disabled');
        $("#btn_limpar_pgto_fatura").removeAttr('disabled');
        $("#encargos").removeAttr('disabled');
        $("#encargos").val('');
        $("#iof").removeAttr('disabled');
        $("#iof").val('');
        $("#anuidade").removeAttr('disabled');
        $("#anuidade").val('');
        $("#protecao_premiada").removeAttr('disabled');
        $("#protecao_premiada").val('');
        $("#juros").removeAttr('disabled');
        $("#juros").val('');
        $("#valor_pagamento_fatura").removeAttr('disabled');
        $("#valor_pagamento_fatura").val('');
        $('#span-success-quitar-fatura-cartao-credito').remove();
    });

    $('#btn_calcular_fatura').click(function () {
        let str = $('#subtotal').val();
        let subtotal = replace(str);

        let enc = $('#encargos').val();
        let encargos = replace(enc);
        if (encargos === "") {
            encargos = 0;
        }

        let i = $('#iof').val();
        let iof = replace(i);
        if (iof === "") {
            iof = 0;
        }

        let anu = $('#anuidade').val();
        let anuidade = replace(anu);
        if (anuidade === "") {
            anuidade = 0;
        }

        let prot = $('#protecao_premiada').val();
        let protecao_premiada = replace(prot);
        if (protecao_premiada === "") {
            protecao_premiada = 0;
        }

        let jur = $('#juros').val();
        let juros = replace(jur);
        if (juros === "") {
            juros = 0;
        }

        let rest = $('#restante_fatura_mes_anterior').val();
        let restante_fatura_mes_anterior = replace(rest);
        if (restante_fatura_mes_anterior === "") {
            restante_fatura_mes_anterior = 0;
        }

        let total = 0;
        if (subtotal > 0) {
            total = (parseFloat(subtotal) + parseFloat(encargos) + parseFloat(iof) + parseFloat(anuidade) + parseFloat(protecao_premiada)
                + parseFloat(juros) + parseFloat(restante_fatura_mes_anterior));
        }
       
        $('#valor_total_fatura').val(numberToReal(total));
    });

    $('#btn_pagar_fatura').click(function () {
        let vp = $("#valor_pagamento_fatura").val();
        let vpg = replace(vp);
        if (vpg != "") {
            $('#span-success-quitar-fatura-cartao-credito').remove();
        }
        if (vpg != 0) {
            $('#valor_pagamento_fatura').val(numberToReal(vpg));
        }
    });
    $(function () {
        $("#formPagarFatura").submit(function(e) {
            let url = $("#formPagarFatura").attr("action");
            
            let id = $("#id").val();
            let encargos = $("#encargos").val();
            let protecao_premiada = $("#protecao_premiada").val();
            let iof = $("#iof").val();
            let anuidade = $("#anuidade").val();
            let juros = $("#juros").val();
            let valor_total_fatura = $("#valor_total_fatura").val();
            let valor_pagamento_fatura = $("#valor_pagamento_fatura").val();
            let credit_card_id = $("#credit_card_id").val();
            let data_pagamento_fatura = $("#data_pagamento_fatura").val();
            
            let data = {id: id, encargos: encargos, protecao_premiada: protecao_premiada, iof: iof, anuidade: anuidade, juros: juros,
                valor_total_fatura: valor_total_fatura, valor_pagamento_fatura: valor_pagamento_fatura, credit_card_id: credit_card_id,
                data_pagamento_fatura: data_pagamento_fatura};

            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
            .then(function(response) {
                if (response.status == 201) {
                    $("#btn_novo_pgto_fatura").attr('disabled', 'disabled');
                    $("#btn_calcular_fatura").attr('disabled', 'disabled');
                    $("#btn_pagar_fatura").attr('disabled', 'disabled');
                    $("#btn_limpar_pgto_fatura").attr('disabled', 'disabled');
                    $("#encargos").attr('disabled', 'disabled');
                    $("#iof").attr('disabled', 'disabled');
                    $("#anuidade").attr('disabled', 'disabled');
                    $("#protecao_prem").attr('disabled', 'disabled');
                    $("#juros_fat").attr('disabled', 'disabled');
                    $("#valor_pagar").attr('disabled', 'disabled');
                    $("#div-msg-quitar-fatura-cartao-credito").html("<span class='alert alert-success msgSuccess' id='span-success-quitar-fatura-cartao-credito'>"+ response.data['success'] +"</span>").css("display", "block");
                    setInterval(function() {
                        redirectPageListarFaturas(response.data['base_url']);
                    }, 3000);
                }
            })
            .catch(function(error) {
                if (error.response.status == 500) {
                    if (!error.response.data.error['error_valor_pagar'] == "") {
                        $("#div-msg-quitar-fatura-cartao-credito").html("<span class='alert alert-danger msgError' id='span-success-quitar-fatura-cartao-credito'>"+ error.response.data.error['error_valor_pagar'] +"</span>").css("display", "block");
                    }

                    if (!error.response.data.error['error_create'] == "") {
                        alert(error.response.data.error['error_create']);
                    }
                }
            })
        });
    });
    
    $('#btn_limpar_pgto_fatura').click(function () {
        $("#encargos").val("");
        $("#iof").val("");
        $("#anuidade").val("");
        $("#protecao_premiada").val("");
        $("#juros").val("");
        $("#valor_pagamento_fatura").val("");
        $("#valor_total_fatura").val("");
        $("#valor_pagamento_fatura").val("");
        $('#span-success-quitar-fatura-cartao-credito').remove();
    });

    function replace(str) {
        let encargos = str.replace('R$', '');
        encargos = encargos.replace(',', '.');
        return encargos;
    }
    function arred(val,casas) {
        let aux = Math.pow(2,casas);
        return Math.floor(val * aux) / aux;
    }

    // FORMULÁRIO PAGAR FATURA DE CARTÃO DE CRÉDITO
    $('#btn-nov-pagar-fatura-cartao').click(function () {
        $("#btn-pagar-fatura-cartao").removeAttr('disabled');
        $("#btn-nov-pagar-fatura-cartao").attr('disabled', 'disabled');
        $("#fatura").removeAttr('disabled');
        $("#fatura").focus();
        $("#fatura").css("background", "white");
        $('#span-success-pagar-fatura-cartao-credito').remove();
        $("#fatura").val("");
    });
    $(function () {
        $("#formPagarFaturaCartaoCredito").submit(function(e) {
            let url = $("#formPagarFaturaCartaoCredito").attr("action");
            let fatura = $("#fatura").val();
            if (fatura != "") {
                $('#span-success-pagar-fatura-cartao-credito').remove();
            }


            let data = {fatura: fatura};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 202) {
                        window.location.replace(response.data['base_url']);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_fatura'] == "") {
                            $("#div-msg-pagar-fatura-cartao-credito").html("<span class='alert alert-danger msgError' id='span-success-pagar-fatura-cartao-credito'>"+ error.response.data.error['error_fatura'] +"</span>").css("display", "block");
                            $("#fatura").css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#fatura").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_token_conta'] == "") {
                            $("#div-msg-pagar-fatura-cartao-credito").html("<span class='alert alert-danger msgError' id='span-success-pagar-fatura-cartao-credito'>"+ error.response.data.error['error_token_conta'] +"</span>").css("display", "block");
                        }
                    }
                })
        });
    });


    // FORMULÁRIO GERAR FATURA DE CARTÃO DE CRÉDITO
    $('#btn-nov-fatura-cartao').click(function () {
        $("#btn-fatura-cartao").removeAttr('disabled');
        $("#btn-nov-fatura-cartao").attr('disabled', 'disabled');
        $("#credit_card_id").removeAttr('disabled');
        $("#credit_card_id").focus();
        $("#data_pagamento_fatura").removeAttr('disabled');
        $("#credit_card_id").css("background", "white");
        $("#data_pagamento_fatura").css("background", "white");
        $('#span-success-desp-fatura-cartao-credito').remove();
        $("#credit_card_id").val("");
        $("#data_pagamento_fatura").val("");
    });
    $(function () {
        $("#formFaturaCartaoCredito").submit(function(e) {
            let url = $("#formFaturaCartaoCredito").attr("action");
            let credit_card_id = $("#credit_card_id").val();
            if (credit_card_id != "") {
                $('#span-success-desp-fatura-cartao-credito').remove();
            }

            let data_pagamento_fatura = $("#data_pagamento_fatura").val();
            if (data_pagamento_fatura == 'Informe a Data do Pagamento!') {
                data_pagamento_fatura = "";
            }

            let data = {credit_card_id: credit_card_id, data_pagamento_fatura: data_pagamento_fatura};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-fatura-cartao").attr('disabled', 'disabled');
                        $("#btn-nov-fatura-cartao").removeAttr('disabled');
                        $("#credit_card_id").attr('disabled', 'disabled');
                        $("#data_pagamento_fatura").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#div-msg-gerar-fatura-cartao-credito").html("<span class='alert alert-success msgSuccess' id='span-success-desp-fatura-cartao-credito'>"+ response.data['success'] +"</span>").css("display", "block");
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_cartao'] == "") {
                            $("#credit_card_id").find('option:selected').html(error.response.data.error['error_cartao']);
                
                            $("#credit_card_id").focus().css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#credit_card_id").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_data_pagamento'] == "") {
                            $("#data_pagamento_fatura").attr("type", "text");
                            $("#data_pagamento_fatura").val(error.response.data.error['error_data_pagamento']).css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#data_pagamento_fatura").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_create'] == "") {
                            alert(error.response.data.error['error_create']);
                        }
                    }
                })
        });
    });

    // FORMULÁRIO DE DESPESA DE CARTÃO DE CRÉDITO
    $('#btn-nov-desp-cartao').click(function () {
        $("#btn-desp-cartao").removeAttr('disabled');
        $("#btn-nov-desp-cartao").attr('disabled', 'disabled');
        $("#credit_card_id").removeAttr('disabled');
        $("#credit_card_id").focus();
        $("#descricao").removeAttr('disabled');
        $("#data_compra").removeAttr('disabled');
        $("#valor").removeAttr('disabled');
        $("#numero_parcela").removeAttr('disabled');
        $("#credit_card_id").css("background", "white");
        $("#descricao").css("background", "white");
        $("#data_compra").css("background", "white");
        $("#valor").css("background", "white");
        $("#numero_parcela").css("background", "white");
        $('#span-success-desp-cartao-credito').remove();
        $("#credit_card_id").find('option:selected').html("");
        $("#credit_card_id").val("");
        $("#descricao").val("");
        $("#data_compra").val("");
        $("#valor").val("");
        $("#numero_parcela").val("");
    });
    $(function () {
        $("#formCadDespCartaoCredito").submit(function(e) {
            let url = $("#formCadDespCartaoCredito").attr("action");
            let credit_card_id = $("#credit_card_id").val();
            if (credit_card_id == 'Informe o Cartão!') {
                credit_card_id = "";
            }
            let descricao = $("#descricao").val();
            if (descricao == 'Preencha a Descrição!' || descricao == 'Descrição sem Números!' || descricao == 'Descrição acima de 3 caracters!') {
                descricao = "";
            }
            let data_compra = $("#data_compra").val();
            if (data_compra == 'Informe a Data da Compra!') {
                data_compra = "";
            }
            let valor = $("#valor").val();
            if (valor == 'Preencha o Valor!' || valor == 'Valor somente Números!') {
                valor = "";
            }
            let numero_parcela = $("#numero_parcela").val();
            if (numero_parcela == 'Informe o Número de Parcela(s)!') {
                numero_parcela = "";
            }

            let data = {credit_card_id: credit_card_id, descricao: descricao, data_compra: data_compra, valor: valor, numero_parcela: numero_parcela};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-desp-cartao").attr('disabled', 'disabled');
                        $("#btn-nov-desp-cartao").removeAttr('disabled');
                        $("#cartao").attr('disabled', 'disabled');
                        $("#descricao").attr('disabled', 'disabled');
                        $("#data_compra").attr('disabled', 'disabled');
                        $("#valor").attr('disabled', 'disabled');
                        $("#numero_parcela").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#div-msg-cadastro-desp-cartao-credito").html("<span class='alert alert-success msgSuccess' id='span-success-desp-cartao-credito'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageDespesaCartaoNovo(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_cartao'] == "") {
                            $("#credit_card_id").find('option:selected').html(error.response.data.error['error_cartao']);
             
                            $("#credit_card_id").focus().css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#credit_card_id").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_descricao'] == "") {
                            $("#descricao").val(error.response.data.error['error_descricao']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#descricao").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_data_compra'] == "") {
                            $("#data_compra").val(error.response.data.error['error_data_compra']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#data_compra").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_valor'] == "") {
                            $("#valor").val(error.response.data.error['error_valor']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#valor").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_numero_parcela'] == "") {
                            $("#numero_parcela").find('option:selected').html(error.response.data.error['error_numero_parcela']);
                            $("#numero_parcela").css("background", cor_input).css("color", "white");
                        } else {
                            $("#numero_parcela").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_token_conta'] == "") {
                            $("#div-msg-cadastro-desp-cartao-credito").html("<span class='alert alert-danger msgError' id='span-success-desp-cartao-credito'>"+ error.response.data.error['error_token_conta'] +"</span>").css("display", "block");
                        }
                    }
                })
        });
    });


    // FORMULÁRIO EXTRATO POR PERÍODO
    $('#btn-nov-extrato').click(function () {
        $("#btn-bus-extrato").removeAttr('disabled');
        $("#btn-nov-extrato").attr('disabled', 'disabled');
        $("#data_inicial").removeAttr('disabled');
        $("#data_inicial").focus();
        $("#data_final").removeAttr('disabled');
        $("#data_inicial").css("background", "white");
        $("#data_final").css("background", "white");
        $('#span-success-bus-extrac-per').remove();
        $("#data_inicial").val("");
        $("#data_final").val("");
    });
    $(function () {
        $("#formExtratoPeriodo").submit(function(e) {
            let url = $("#formExtratoPeriodo").attr("action");
            let data_inicial = $("#data_inicial").val();
            if (data_inicial == 'Preencha a Data Inicial!') {
                data_inicial = "";
            }

            let data_final = $("#data_final").val();
            if (data_final == 'Preencha a Data Final!') {
                data_final = "";
            }

            let _csrf_token = $("#_csrf_token").val();
            let data = {data_inicial: data_inicial, data_final: data_final, _csrf_token: _csrf_token};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#well_extrato").html(generateTableExtract(response.data.extrato));
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_data_inicial'] == "") {
                            $("#data_inicial").attr("type", "text");
                            $("#data_inicial").val(error.response.data.error['error_data_inicial']).css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#data_inicial").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_data_final'] == "") {
                            $("#data_final").attr("type", "text");
                            $("#data_final").val(error.response.data.error['error_data_final']).attr("type", "text").css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#data_final").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_token_conta'] == "") {
                            $("#div-msg-extrato").html("<span class='alert alert-danger msgError' id='span-success-bus-extrac-per'>"+ error.response.data.error['error_token_conta'] +"</span>").css("display", "block");
                        }

                    }
                })
        });
    });

    // AGENDAMENTO DE PAGAMENTO
    $('#btn-nov-agd-pgto').click(function () {
        $("#btn-cad-agd-pgto").removeAttr('disabled');
        $("#btn-nov-agd-pgto").attr('disabled', 'disabled');
        $("#data_pagamento").removeAttr('disabled');
        $("#data_pagamento").focus();
        $("#data_pagamento").mask("99/99/9999");
        $("#movimentacao").removeAttr('disabled');
        $("#valor").removeAttr('disabled');
        $("#category_id").removeAttr('disabled');
        $("#data_pagamento").css("background", "white");
        $("#movimentacao").css("background", "white");
        $("#valor").css("background", "white");
        $("#category_id").css("background", "white");
        $('#span-success-cadastro-agd-pgto').remove();
        $("#formCadAgendamentoPagamento input").val("");
        $("#category_id").val("");
    });
    $('#btn-edit-agd-pgto').click(function () {
        $("#btn-salv-agd-pgto").removeAttr('disabled');
        $("#btn-edit-agd-pgto").attr('disabled', 'disabled');
        $("#data_pagamento").removeAttr('disabled');
        $("#data_pagamento").focus();
        $("#data_pagamento").mask("99/99/9999");
        $("#movimentacao").removeAttr('disabled');
        $("#valor").removeAttr('disabled');
        $("#category_id").removeAttr('disabled');
        $("#data_pagamento").css("background", "white");
        $("#movimentacao").css("background", "white");
        $("#valor").css("background", "white");
        $("#category_id").css("background", "white");
    });

    $(function () {
        $("#formCadAgendamentoPagamento").submit(function(e) {
            let url = $("#formCadAgendamentoPagamento").attr("action");
            let data_pagamento = $("#data_pagamento").val();
            let movimentacao = $("#movimentacao").val();
            let valor = $("#valor").val();
            let category_id = $("#category_id").val();
            let id_pagamento = $("#id_pagamento").val();
            let data = {data_pagamento: data_pagamento, movimentacao: movimentacao, valor: valor, category_id: category_id, id_pagamento: id_pagamento};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-cad-agd-pgto").attr('disabled', 'disabled');
                        $("#btn-nov-agd-pgto").removeAttr('disabled');
                        $("#btn-salv-agd-pgto").attr('disabled', 'disabled');
                        $("#data_pagamento").attr('disabled', 'disabled');
                        $("#data_pagamento").unmask();
                        $("#movimentacao").attr('disabled', 'disabled');
                        $("#valor").attr('disabled', 'disabled');
                        $("#category_id").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#div-msg-cadastro-agd-pgto").html("<span class='alert alert-success msgSuccess' id='span-success-cadastro-agd-pgto'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageAllPayments(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_data_pgto'] == "") {
                            $("#data_pagamento").val(error.response.data.error['error_data_pgto']).css("background", cor_input).css("color", "white");
                            if (data_pagamento == 'Preencha a Data!') {
                                data_pagamento = "";
                            }
                        } else {
                            $("#data_pagamento").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_mov'] == "") {
                            $("#movimentacao").val(error.response.data.error['error_mov']).css("background", cor_input).css("color", "white");
                            if (movimentacao == 'Preencha a Movimentação!') {
                                movimentacao = "";
                            }
                        } else {
                            $("#movimentacao").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_valor'] == "") {
                            $("#valor").val(error.response.data.error['error_valor']).css("background", cor_input).css("color", "white");
                            if (valor == 'Preencha o Valor!') {
                                valor = "";
                            }
                        } else {
                            $("#valor").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_categoria'] == "") {
                            $("#category_id").find('option:selected').html(error.response.data.error['error_categoria']);
                            $("#category_id").css("background", cor_input).css("color", "white");
                            if (category_id == 'Preencha a Categoria!') {
                                category_id = "";
                            }
                        } else {
                            $("#category_id").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_agendamento'] == "") {
                            $("#div-msg-cadastro-agd-pgto").html("<span class='alert alert-danger msgError' id='span-success-cadastro-agd-pgto'>"+ error.response.data.error['error_agendamento'] +"</span>").css("display", "block");
                            $("#data_pagamento").focus();
                            $("#data_pagamento").css("background", "white").css("color", "black");
                        }
                        
                        if (!error.response.data.error['error_create'] == "") {
                            alert(error.response.data.error['error_create']);
                        }
                    }
                })
        });
    });


    // CADASTRO DE CARTÃO DE CRÉDITO
    $('#btn-nov-cartao').click(function () {
        $("#btn-cad-cartao").removeAttr('disabled');
        $("#btn-nov-cartao").attr('disabled', 'disabled');
        $("#numero_cartao").removeAttr('disabled');
        $("#numero_cartao").focus();
        $("#data_validade").removeAttr('disabled');
        $("#flag_card_id").removeAttr('disabled');
        $("#ativo").removeAttr('disabled');
        $("#bank_id").removeAttr('disabled');
        $("#dia_pgto_fatura").removeAttr('disabled');
        $("#numero_cartao").css("background", "white");
        $("#data_validade").css("background", "white");
        $("#flag_card_id").css("background", "white");
        $("#bank_id").css("background", "white");
        $("#ativo").css("background", "white");
        $("#dia_pgto_fatura").css("background", "white");
        $('#span-msg-cadastro-cartao').remove();
        $("#numero_cartao").val("");
        $("#data_validade").val("");
        $("#flag_card_id").val("");
        $("#bank_id").val("");
        $("#dia_pgto_fatura").val("");
    });

    $('#btn-edit-cartao').click(function () {
        $("#btn-salv-cartao").removeAttr('disabled');
        $("#btn-edit-cartao").attr('disabled', 'disabled');
        $("#numero_cartao").removeAttr('disabled');
        $("#numero_cartao").focus();
        $("#nome_banco").removeAttr('disabled');
        $("#data_validade").removeAttr('disabled');
        $("#flag_card_id").removeAttr('disabled');
        $("#bank_id").removeAttr('disabled');
        $("#ativo").removeAttr('disabled');
        $("#dia_pgto_fatura").removeAttr('disabled');
        $("#numero_cartao").css("background", "white");
        $("#data_validade").css("background", "white");
        $("#flag_card_id").css("background", "white");
        $("#bank_id").css("background", "white");
        $("#ativo").css("background", "white");
        $("#dia_pgto_fatura").css("background", "white");
        $('#span-msg-cadastro-cartao').remove();
    });

    $(function () {
        $("#formCadCartaoCredito").submit(function(e) {
            let url = $("#formCadCartaoCredito").attr("action");

            let numero_cartao = $("#numero_cartao").val();
            if (numero_cartao == 'Preencha o Número do Cartão!') {
                numero_cartao = "";
            }
            let id_cartao = $("#id_cartao").val();

            let data_validade = $("#data_validade").val();
            if (data_validade == 'Informe a Data de Validade do Cartão') {
                data_validade = "";
            }
            let flag_card_id = $("#flag_card_id").val();
            if (flag_card_id == 'Informe a Bandeira do Cartão!') {
                flag_card_id = "";
            }
            let bank_id = $("#bank_id").val();
            if (bank_id == 'Informe a Banco do Cartão!' || bank_id == 'Banco do Cartão Aceita Somente Números!') {
                bank_id = "";
            }

            let ativo = $("#ativo").val();
            if (ativo == 'Informe se o Cartão Vai Estar Ativo!') {
                ativo = "";
            }

            let dia_pgto_fatura = $("#dia_pgto_fatura").val();
            if (dia_pgto_fatura == 'Informe o dia do Pagamento do Cartão!' || dia_pgto_fatura == 'Dia do Pagamento Somente Números!' || dia_pgto_fatura == 'Dia do Pagamento Deve Ser Entre 1 e 31!') {
                dia_pgto_fatura = "";
            }

            let data = {numero_cartao: numero_cartao, data_validade: data_validade, flag_card_id: flag_card_id,
                bank_id: bank_id, ativo: ativo, dia_pgto_fatura: dia_pgto_fatura, id_cartao: id_cartao};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-cad-cartao").attr('disabled', 'disabled');
                        $("#btn-nov-cartao").removeAttr('disabled');
                        $("#numero_cartao").attr('disabled', 'disabled');
                        $("#data_validade").attr('disabled', 'disabled');
                        $("#flag_card_id").attr('disabled', 'disabled');
                        $("#bank_id").attr('disabled', 'disabled');
                        $("#ativo").attr('disabled', 'disabled');
                        $("#dia_pgto_fatura").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#div-msg-cadastro-cartao-credito").html("<span class='alert alert-success msgSuccess' id='span-msg-cadastro-cartao'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageAllCards(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_numero_cartao'] == "") {
                            $("#numero_cartao").val(error.response.data.error['error_numero_cartao']).css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#numero_cartao").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_data_validade'] == "") {
                            $("#data_validade").val(error.response.data.error['error_data_validade']).css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#data_validade").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_bandeira'] == "") {
                            $("#flag_card_id").find('option:selected').html(error.response.data.error['error_bandeira']);
                            $("#flag_card_id").css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#flag_card_id").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_banco'] == "") {
                            $("#bank_id").find('option:selected').html(error.response.data.error['error_banco']);
                            $("#bank_id").css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#bank_id").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_ativo'] == "") {
                            $("#ativo").find('option:selected').html(error.response.data.error['error_ativo']);
                            $("#ativo").css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#ativo").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_dia_pgto_fatura'] == "") {
                            $("#dia_pgto_fatura").val(error.response.data.error['error_dia_pgto_fatura']).css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#dia_pgto_fatura").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_cartao'] == "") {
                            $("#div-msg-cadastro-cartao-credito").val("<span class='alert alert-danger msgError' id='span-msg-cadastro-cartao'>"+ error.response.data.error['error_cartao'] +"</span>").css("display", "block");
                        }

                        if (!error.response.data.error['error_token_cartao'] == "") {
                            $("#div-msg-cadastro-cartao-credito").html("<span class='alert alert-danger msgError' id='span-msg-cadastro-cartao'>"+ error.response.data.error['error_token_cartao'] +"</span>").css("display", "block");
                        }

                    }
                })
        });
    });


    // ACESSA CONTA
    $(function () {
        $("#table_contas input:radio").click(function(e) {
            let url = $("#url").val();
            let id = $("#id").val()
            let u = "/conta/list/";
            e.preventDefault();
            axios.get(url+u+id, {
                params: { id: id }
            })
                .then(function(response) {
                    if (response.status == 201) {
                        $("#menu_div_categoria").removeClass("disabled");
                        $("#menu_div_extrato").removeClass("disabled");
                        $("#menu_div_trasacoes").removeClass("disabled");
                        $("#menu_div_cartao_credito").removeClass("disabled");
                        $("#menu_div_agendamentos").removeClass("disabled");
                        redirectPageHome(response.data['base_url']);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        alert(error.response.data.error);
                    }
                })

        });
    });

    // LOGIN USUÁRIO
    $(function () {
        $("#formLogin").submit(function(e) {
            let url = $("#formLogin").attr("action");
            let email = $("#email").val();
            let password = $("#password").val();
            let data = {email: email, password: password};
            $(".msgError").html("");
            $(".msgError").css("display", "none");

            e.preventDefault();

            axios.interceptors.response.use((response) => {
                window.localStorage.setItem('token', response.data.token);
            return response;
        });
            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 202) {
                        window.location.replace(response.data['base_url']);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 401) {
                        $("#div-error-login").html("<span class='alert alert-danger msgError' id='span-error-login'>"+ error.response.data.error +"</span>");
                        $("#div-error-login").css("display", "block");
                    }
                })

        });
    });

    // CADASTRO NOVO USUÁRIO
    //cor fundo input
    let cor_input = "#EBA8A3";
    $(function () {
        $("#formRegister").submit(function(e) {
            let url = $("#formRegister").attr("action");
            let name = $("#name").val();
            if (name == 'Preencha o seu nome Completo' || name == '') {
                name = '';
            }
            let email = $("#email").val();
            let password = $("#password").val();
            let re_password = $("#re_password").val();
            let data = {name: name, email: email, password: password, re_password: re_password};

            e.preventDefault();
            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $(".white").css("background", "#ffffb1");
                        $("#div-success-cadastro-usuario").html("<span class='alert alert-success msgSuccess' id='span-success-cadastro-user'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageLogin(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error-name'] == "") {
                            $("#name").val(error.response.data.error['error-name']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#name").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error-email'] == "") {
                            $("#email").val(error.response.data.error['error-email']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#email").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error-password'] == "") {
                            $("#password").val(error.response.data.error['error-password']).attr("type", "text").css("background", cor_input).css("color", "white");
                        } else {
                            $("#password").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error-re-password'] == "") {
                            $("#re_password").val(error.response.data.error['error-re-password']).attr("type", "text").css("background", cor_input).css("color", "white");
                        } else {
                            $("#re_password").css("background", "#ffffb1");
                        }

                    }
                })
        });
    });


    // CADASTRO TIPO DE CONTA
    $('#btn-nov-tpconta').click(function () {
        $("#btn-cad-tpconta").removeAttr('disabled');
        $("#btn-nov-ban").attr('disabled', 'disabled');
        $("#tipo_conta").removeAttr('disabled');
        $("#tipo_conta").focus();
        $("#tipo_conta").css("background", "white");
        $('#span-msg-cadastro-tipo_conta').remove();
        $("#tipo_conta").val("");
    });

    $('#btn-edit-tpconta').click(function () {
        $("#btn-salvar-tpconta").removeAttr('disabled');
        $("#btn-edit-tpconta").attr('disabled', 'disabled');
        $("#tipo_conta").removeAttr('disabled');
        $("#tipo_conta").css("background", "white");
        $('#span-success-cadastro-tipo_conta').remove();
    });

    $(function () {
        $("#formCadTipoConta").submit(function(e) {
            let url = $("#formCadTipoConta").attr("action");
            let tipo_conta = $("#tipo_conta").val();
            let id_tipo_conta = $("#id_tipo_conta").val();

            let data = {tipo_conta: tipo_conta, id_tipo_conta: id_tipo_conta};

            e.preventDefault();
            axios.post(url, simpleQueryString.stringify(data))
            .then(function(response) {
                if (response.status == 201) {
                    $("#btn-cad-tpconta").attr('disabled', 'disabled');
                    $("#btn-nov-tpconta").removeAttr('disabled');
                    $("#tipo_conta").attr('disabled', 'disabled');
                    $(".white").css("background", "#ffffb1");
                    $("#div-msg-cadastro-tpconta").html("<span class='alert alert-success msgSuccess' id='span-msg-cadastro-tipo_conta'>"+ response.data['success'] +"</span>").css("display", "block");
                    setInterval(function() {
                        redirectPageAllTpConta(response.data['base_url']);
                    }, 3000);
                }
            })
            .catch(function(error) {
                if (error.response.status == 500) {
                    if (!error.response.data.error['error_tipo_conta'] == "") {
                        $("#tipo_conta").val(error.response.data.error['error_tipo_conta']).css("background", cor_input).css("color", "white");
                    } else {
                        $("#tipo_conta").css("background", "#ffffb1");
                    }

                    if (!error.response.data.error['error_tipo_conta'] == "") {
                        if (tipo_conta == 'Tipo de Conta já Cadastrada!' || tipo_conta == 'Preencha o Tipo de Conta!' || tipo_conta == 'Tipo de Conta deve conter acima de 3 dígitos!' ||  bandeira == '') {
                            tipo_conta = '';
                        } else {
                            $("#div-msg-cadastro-tpconta").html("<span class='alert alert-danger msgError' id='span-msg-cadastro-tpconta'>"+ error.response.data.error['error_tipo_conta'] +"</span>").css("display", "block");
                        }

                    }

                    if (!error.response.data.error['error_create'] == "") {
                        //$("#div-msg-cadastro-tpconta").html("<span class='alert alert-danger msgError' id='span-msg-cadastro-tpconta'>"+ error.response.data.error['error_create'] +"</span>").css("display", "block");
                        alert(error.response.data.error['error_create']);
                    }
                }
            })
        });
    });


    // CADASTRO NOVA BANDEIRA CARTÃO
    $('#btn-nov-ban').click(function () {
        $("#btn-cad-ban").removeAttr('disabled');
        $("#btn-nov-ban").attr('disabled', 'disabled');
        $("#bandeira").removeAttr('disabled');
        $("#bandeira").focus();
        $("#bandeira").css("background", "white");
        $('#span-msg-cadastro-bandeira').remove();
        $("#bandeira").val("");
    });

	$('#btn-edit-ban').click(function () {
		$("#btn-salvar-ban").removeAttr('disabled');
		$("#btn-edit-ban").attr('disabled', 'disabled');
		$("#bandeira").removeAttr('disabled');
		$("#bandeira").css("background", "white");
		$('#span-success-cadastro-bandeira').remove();
    });

    $(function () {
        $("#formCadBandeira").submit(function(e) {
            let url = $("#formCadBandeira").attr("action");
            let bandeira = $("#bandeira").val();
            let id_bandeira = $("#id_bandeira").val();
            if (bandeira == 'Preencha o Nome da Bandeira!' || bandeira == 'Bandeira já Cadastrada!' || bandeira == 'Bandeira somente Números!' ||  bandeira == '') {
                bandeira = '';
            }
            let data = {bandeira: bandeira, id_bandeira:id_bandeira};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-cad-ban").attr('disabled', 'disabled');
                        $("#btn-nov-ban").removeAttr('disabled');
                        $("#bandeira").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#div-msg-cadastro-bandeira").html("<span class='alert alert-success msgSuccess' id='span-msg-cadastro-bandeira'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageAllFlags(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error-nome-bandeira'] == "") {
                            $("#bandeira").val(error.response.data.error['error-nome-bandeira']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#bandeira").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_bandeira'] == "") {
                            $("#div-msg-cadastro-bandeira").html("<span class='alert alert-danger msgError' id='span-msg-cadastro-bandeira'>"+ error.response.data.error['error_bandeira'] +"</span>").css("display", "block");
                        }
                    }
                })
        });
    });

    // CADASTRO NOVA CATEGORIA
    $('#btn-nov-cat').click(function () {
        $("#btn-cad-cat").removeAttr('disabled');
        $("#btn-nov-cat").attr('disabled', 'disabled');
        $("#nome_categoria").removeAttr('disabled');
        $("#nome_categoria").focus();
        $("#despesa_fixa").removeAttr('disabled');
        $("#tipo").removeAttr('disabled');
        $("#nome_categoria").css("background", "white")
        $("#despesa_fixa").css("background", "white");
        $("#tipo").css("background", "white");
        $('#span-success-cadastro-categoria').remove();
        $("#nome_categoria").val("");
        $("#despesa_fixa").val("");
        $("#tipo").val("");
    });

    $('#btn-edit-cat').click(function () {
        $("#btn-salvar-cat").removeAttr('disabled');
        $("#btn-edit-cat").attr('disabled', 'disabled');
        $("#nome_categoria").removeAttr('disabled');
        $("#despesa_fixa").removeAttr('disabled');
        $("#tipo").removeAttr('disabled');
        $("#nome_categoria").css("background", "white");
        $("#despesa_fixa").css("background", "white");
        $("#tipo").css("background", "white");
        $('#span-success-cadastro-banco').remove();
    });

    $(function () {
        $("#formCadCategoria").submit(function(e) {
            let url = $("#formCadCategoria").attr("action");
            let nome_categoria = $("#nome_categoria").val();
            if (nome_categoria == 'Preencha a Categoria!' || nome_categoria == 'Categoria já Cadastrada!' || nome_categoria == '') {
                nome_categoria = '';
            }
            let despesa_fixa = $("#despesa_fixa").val();
            if (despesa_fixa == 'Informe se é Despesa Fixa!' || despesa_fixa == '') {
                despesa_fixa = '';
            }
            let tipo = $("#tipo").val();
            if (tipo == 'Informe o Tipo!' || tipo == '') {
                tipo = '';
            }
            let id_categoria = $("#id_categoria").val();

            let data = {nome_categoria: nome_categoria, despesa_fixa: despesa_fixa, tipo:tipo, id_categoria:id_categoria};
            e.preventDefault();
            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-cad-cat").attr('disabled', 'disabled');
                        $("#btn-nov-cat").removeAttr('disabled');
                        $("#btn-salvar-cat").attr('disabled', 'disabled');
                        $("#btn-edit-cat").removeAttr('disabled');
                        $("#nome_categoria").attr('disabled', 'disabled');
                        $("#despesa_fixa").attr('disabled', 'disabled');
                        $("#tipo").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#div-msg-cadastro-categoria").html("<span class='alert alert-success msgSuccess' id='span-success-cadastro-categoria'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageAllCategories(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error-nome-categoria'] == "") {
                            $("#nome_categoria").val(error.response.data.error['error-nome-categoria']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#nome_categoria").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error-despesa-fixa'] == "") {
                            $("#despesa_fixa").find('option:selected').html(error.response.data.error['error-despesa-fixa']);
                            $("#despesa_fixa").css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#despesa_fixa").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error-tipo'] == "") {
                            $("#tipo").find('option:selected').html(error.response.data.error['error-tipo']);
                            $("#tipo").css("background", "#EBA8A3").css("color", "white");
                        } else {
                            $("#tipo").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_create'] == "") {
                            alert(error.response.data.error['error_create']);
                        }
                    }
                })
        });
    });

    // CADASTRO NOVO BANCO
    $('#btn-nov-bnc').click(function () {
        $("#btn-cad-bnc").removeAttr('disabled');
        $("#btn-nov-bnc").attr('disabled', 'disabled');
        $("#cod_banco").removeAttr('disabled');
        $("#nome_banco").removeAttr('disabled');
        $("#cod_banco").css("background", "white");
        $("#nome_banco").css("background", "white");
        $('#span-success-cadastro-banco').remove();
        $("#cod_banco").val("");
        $("#nome_banco").val("");
    });

    $('#btn-edit-bnc').click(function () {
        $("#btn-salvar-bnc").removeAttr('disabled');
        $("#btn-edit-bnc").attr('disabled', 'disabled');
        $("#cod_banco").removeAttr('disabled');
        $("#nome_banco").removeAttr('disabled');
        $("#cod_banco").css("background", "white");
        $("#nome_banco").css("background", "white");
        $('#span-success-cadastro-banco').remove();
    });

    $(function () {
        $("#formCadBanco").submit(function(e) {
            let url = $("#formCadBanco").attr("action");
            let cod_banco = $("#cod_banco").val();
            if (cod_banco == 'Preencha o Código do Banco!' || cod_banco == 'Código do Banco já Cadastrado!' || cod_banco == '') {
                cod_banco = '';
            }
            let nome_banco = $("#nome_banco").val();
            if (nome_banco == 'Preencha o nome do Banco!' || nome_banco == '') {
                nome_banco = '';
            }

            let data = {cod_banco: cod_banco, nome_banco: nome_banco };
            e.preventDefault();
            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-cad-bnc").attr('disabled', 'disabled');
                        $("#btn-nov-bnc").removeAttr('disabled');
                        $("#btn-salvar-bnc").attr('disabled', 'disabled');
                        $("#btn-edit-bnc").removeAttr('disabled');
                        $("#cod_banco").attr('disabled', 'disabled');
                        $("#nome_banco").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#div-msg-cadastro-banco").html("<span class='alert alert-success msgSuccess' id='span-success-cadastro-banco'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageAllBanks(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error-cod-banco'] == "") {
                            $("#cod_banco").val(error.response.data.error['error-cod-banco']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#cod_banco").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error-nome-banco'] == "") {
                            $("#nome_banco").val(error.response.data.error['error-nome-banco']).css("background", cor_input).css("color", "white");
                        } else {
                            $("#nome_banco").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_create'] == "") {
                            alert(error.response.data.error['error_create']);
                        }
                    }
                })
        });
    });

    // FORMULÁRIO DE CRÉDITO CONTA
    $('#btn-nov-credito').click(function () {
        $("#btn-cad-credito").removeAttr('disabled');
        $("#btn-nov-credito").attr('disabled', 'disabled');
        $("#data_movimentacao").removeAttr('disabled');
        $("#data_movimentacao").mask("99/99/9999");
        $("#data_movimentacao").focus();
        $("#movimentacao").removeAttr('disabled');
        $("#valor").removeAttr('disabled');
        $("#category_id").removeAttr('disabled');
        $("#data_movimentacao").css("background", "white");
        $("#movimentacao").css("background", "white");
        $("#valor").css("background", "white");
        $("#category_id").css("background", "white");
        $('#span-success-cadastro-credito').remove();
        $("#formCadCredito input").val("");
        $("#category_id").val("");
    });
    $(function () {
        $("#formCadCredito").submit(function(e) {
            let url = $("#formCadCredito").attr("action");
            let data_movimentacao = $("#data_movimentacao").val();
            let movimentacao = $("#movimentacao").val();
            let valor = $("#valor").val();
            let category_id = $("#category_id").val();
            let data = {data_movimentacao: data_movimentacao, movimentacao: movimentacao, valor: valor, category_id: category_id};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-cad-credito").attr('disabled', 'disabled');
                        $("#btn-nov-credito").removeAttr('disabled');
                        $("#data_movimentacao").attr('disabled', 'disabled');
                        $("#movimentacao").attr('disabled', 'disabled');
                        $("#valor").attr('disabled', 'disabled');
                        $("#category_id").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#data_movimentacao").unmask();
                        $("#div-msg-cadastro-credito").html("<span class='alert alert-success msgSuccess' id='span-success-cadastro-credito'>"+ response.data['success'] +"</span>").css("display", "block");
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_data_mov'] == "") {
                            //$('#data_movimentacao').get(0).type = 'text';
                            //$('#data_movimentacao').addClass("data_movimentacao");
                            $("#data_movimentacao").val(error.response.data.error['error_data_mov']).css("background", "#EBA8A3").css("color", "white");
                            if (data_movimentacao == 'Preencha a Data!') {
                                data_movimentacao = "";
                            }
                        } else {
                            $("#data_movimentacao").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_mov'] == "") {
                            $("#movimentacao").val(error.response.data.error['error_mov']).css("background", "#EBA8A3").css("color", "white");
                            if (movimentacao == 'Preencha a Movimentação!' || movimentacao == 'Movimentação sem Números!' || movimentacao == 'Movimentação acima de 3 caracters!') {
                                movimentacao = "";
                            }
                        } else {
                            $("#movimentacao").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_valor'] == "") {
                            $("#valor").val(error.response.data.error['error_valor']).css("background", "#EBA8A3").css("color", "white");
                            if (valor == 'Preencha o Valor!') {
                                valor = "";
                            }
                        } else {
                            $("#valor").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_categoria'] == "") {
                            $("#category_id").find('option:selected').html(error.response.data.error['error_categoria']);
                            $("#category_id").css("background", "#EBA8A3").css("color", "white");
                            if (category_id == 'Preencha a Categoria!') {
                                category_id = "";
                            }
                        } else {
                            $("#category_id").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_create'] == "") {
                            alert(error.response.data.error['error_create']);
                        }
                    }
                })
        });
    });

    // FORMULÁRIO DE DÉBITO CONTA
    $('#btn-nov-debito').click(function () {
        $("#btn-cad-debito").removeAttr('disabled');
        $("#btn-nov-debito").attr('disabled', 'disabled');
        $("#data_movimentacao").removeAttr('disabled');
        $("#data_movimentacao").mask("99/99/9999");
        $("#data_movimentacao").focus();
        $("#movimentacao").removeAttr('disabled');
        $("#valor").removeAttr('disabled');
        $("#category_id").removeAttr('disabled');
        $("#data_movimentacao").css("background", "white");
        $("#movimentacao").css("background", "white");
        $("#valor").css("background", "white");
        $("#category_id").css("background", "white");
        $('#span-success-cadastro-debito').remove();
        $("#formCadDebito input").val("");
        $("#category_id").val("");
    });
    $(function () {
        $("#formCadDebito").submit(function(e) {
            let url = $("#formCadDebito").attr("action");
            let data_movimentacao = $("#data_movimentacao").val();
            let movimentacao = $("#movimentacao").val();
            let valor = $("#valor").val();
            let category_id = $("#category_id").val();
            let data = {data_movimentacao: data_movimentacao, movimentacao: movimentacao, valor: valor, category_id: category_id};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-cad-debito").attr('disabled', 'disabled');
                        $("#btn-nov-debito").removeAttr('disabled');
                        $("#data_movimentacao").attr('disabled', 'disabled');
                        $("#movimentacao").attr('disabled', 'disabled');
                        $("#valor").attr('disabled', 'disabled');
                        $("#category_id").attr('disabled', 'disabled');
                        $(".white").css("background", "#ffffb1");
                        $("#data_movimentacao").unmask();
                        $("#div-msg-cadastro-debito").html("<span class='alert alert-success msgSuccess' id='span-success-cadastro-credito'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageAllExtract(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_data_mov'] == "") {
                            //$('#data_movimentacao').get(0).type = 'text';
                            //$('#data_movimentacao').addClass("data_movimentacao");
                            $("#data_movimentacao").val(error.response.data.error['error_data_mov']).css("background", "#EBA8A3").css("color", "white");
                            if (data_movimentacao == 'Preencha a Data!') {
                                data_movimentacao = "";
                            }
                        } else {
                            $("#data_movimentacao").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_mov'] == "") {
                            $("#movimentacao").val(error.response.data.error['error_mov']).css("background", "#EBA8A3").css("color", "white");
                            if (movimentacao == 'Preencha a Movimentação!' || movimentacao == 'Movimentação sem Números!' || movimentacao == 'Movimentação acima de 3 caracters!') {
                                movimentacao = "";
                            }
                        } else {
                            $("#movimentacao").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_valor'] == "") {
                            $("#valor").val(error.response.data.error['error_valor']).css("background", "#EBA8A3").css("color", "white");
                            if (valor == 'Preencha o Valor!') {
                                valor = "";
                            }
                        } else {
                            $("#valor").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_categoria'] == "") {
                            $("#category_id").find('option:selected').html(error.response.data.error['error_categoria']);
                            $("#category_id").css("background", "#EBA8A3").css("color", "white");
                            if (category_id == 'Preencha a Categoria!') {
                                category_id = "";
                            }
                        } else {
                            $("#category_id").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_saldo'] == "") {
                            $("#div-msg-cadastro-debito").html("<span class='alert alert-danger msgError' id='span-success-cadastro-debito'>"+ error.response.data.error['error_saldo'] +"</span>").css("display", "block");
                        }

                        if (!error.response.data.error['error_create'] == "") {
                            alert(error.response.data.error['error_create']);
                        }
                    }
                })
        });
    });

    $(function() {
        $(".remove_color_input_date").click(function() {
            let data = $(this).val();
            let id = $(this).attr("id");
            if (data.length != 0 && data == "Preencha a Data!" || data == "Informe a Data da Compra!") {
                $("#"+id+"").val("");
                $("#"+id+"").css("background", "white");
            } else if (data.length != 0) {
                $("#"+id+"").css("background", "white");
            } else {
                $("#"+id+"").css("background", "white");
            }
            $("#"+id+"").css("color", "black");
        });
        $(".remove_color_input_date").focus(function () {
            let data = $(this).val();
            let id = $(this).attr("id");
            if (data.length > 0 && data == "Preencha a Data!" || data == "Informe a Data da Compra!") {
                $("#"+id+"").val("");
                $("#"+id+"").css("background", "white");
            } else if (data_validade.length != 0) {
                $("#"+id+"").css("background", "white");
            } else {
                $("#"+id+"").css("background", "white");
            }
            $("#"+id+"").css("color", "black");
        });
    });

    // CADASTRO NOVA CONTA
    $('#btn-nov-conta').click(function () {
        $("#btn-cad-conta").removeAttr('disabled');
        $("#btn-nov-conta").attr('disabled', 'disabled');
        $("#codigo_agencia").removeAttr('disabled');
        $("#codigo_agencia").focus();
        $("#digito_verificador_agencia").removeAttr('disabled');
        $("#numero_conta").removeAttr('disabled');
        $("#digito_verificador_conta").removeAttr('disabled');
        $("#codigo_operacao").removeAttr('disabled');
        $("#tipo_conta").removeAttr('disabled');
        $("#bank_id").removeAttr('disabled');
        $("#codigo_agencia").css("background", "white");
        $("#digito_verificador_agencia").css("background", "white");
        $("#numero_conta").css("background", "white");
        $("#digito_verificador_conta").css("background", "white");
        $("#codigo_operacao").css("background", "white");
        $("#tipo_conta").css("background", "white");
        $("#bank_id").css("background", "white");
        $('#span-success-cadastro-conta').remove();
        $("#codigo_agencia").val("");
        $("#digito_verificador_agencia").val("");
        $("#numero_conta").val("");
        $("#digito_verificador_conta").val("");
        $("#codigo_operacao").val("");
        $("#tipo_conta").val("");
        $("#bank_id").val("");
    });
    $('#btn-edit-conta').click(function () {
        $("#btn-salvar-conta").removeAttr('disabled');
        $("#btn-edit-conta").attr('disabled', 'disabled');
        $("#codigo_agencia").removeAttr('disabled');
        $("#codigo_agencia").focus();
        $("#digito_verificador_agencia").removeAttr('disabled');
        $("#numero_conta").removeAttr('disabled');
        $("#digito_verificador_conta").removeAttr('disabled');
        $("#codigo_operacao").removeAttr('disabled');
        $("#tipo_conta").removeAttr('disabled');
        $("#bank_id").removeAttr('disabled');
        $("#codigo_agencia").css("background", "white");
        $("#digito_verificador_agencia").css("background", "white");
        $("#numero_conta").css("background", "white");
        $("#digito_verificador_conta").css("background", "white");
        $("#codigo_operacao").css("background", "white");
        $("#tipo_conta").css("background", "white");
        $("#bank_id").css("background", "white");
        $('#span-success-cadastro-conta').remove();
    });
    $(function () {
        $("#formCadConta").submit(function(e) {
            let url = $("#formCadConta").attr("action");
            let codigo_agencia = $("#codigo_agencia").val();
            let digito_verificador_agencia = $("#digito_verificador_agencia").val();
            let numero_conta = $("#numero_conta").val();
            let digito_verificador_conta = $("#digito_verificador_conta").val();
            let codigo_operacao = $("#codigo_operacao").val();
            let tipo_conta = $("#tipo_conta").val();
            let bank_id = $("#bank_id").val();
            let id_conta = $("#id_conta").val();

            let data = {codigo_agencia: codigo_agencia, digito_verificador_agencia: digito_verificador_agencia,
                numero_conta: numero_conta, digito_verificador_conta: digito_verificador_conta,
                codigo_operacao: codigo_operacao, account_type_id: tipo_conta, bank_id: bank_id, id_conta: id_conta};
            e.preventDefault();

            axios.post(url, simpleQueryString.stringify(data))
                .then(function(response) {
                    if (response.status == 201) {
                        $("#btn-cad-conta").attr('disabled', 'disabled');
                        $("#btn-nov-conta").removeAttr('disabled');
                        $("#codigo_agencia").attr('disabled', 'disabled');
                        $("#digito_verificador_agencia").attr('disabled', 'disabled');
                        $("#numero_conta").attr('disabled', 'disabled');
                        $("#digito_verificador_conta").attr('disabled', 'disabled');
                        $("#codigo_operacao").attr('disabled', 'disabled');
                        $("#tipo_conta").attr('disabled', 'disabled');
                        $("#bank_id").attr('disabled', 'disabled');
                        $("#tipo_conta").css("background", "white").css("color", "black");
                        $("#bank_id").css("background", "white").css("color", "black");
                        $(".white").css("background", "white");
                        $("#div-msg-cadastro-conta").html("<span class='alert alert-success msgSuccess' id='span-success-cadastro-conta'>"+ response.data['success'] +"</span>").css("display", "block");
                        setInterval(function() {
                            redirectPageAllAccounts(response.data['base_url']);
                        }, 3000);
                    }
                })
                .catch(function(error) {
                    if (error.response.status == 500) {
                        if (!error.response.data.error['error_cod_agencia'] == "") {
                            $("#codigo_agencia").val(error.response.data.error['error_cod_agencia']).css("background", cor_input).css("color", "white");
                            if (codigo_agencia == 'Preencha o Código da Agência!' || codigo_agencia == 'Cód. da Agência somente Números!' || codigo_agencia == 'Cód. da Agência deve conter até 4 dígitos!' || codigo_agencia == '') {
                                codigo_agencia = '';
                            }
                        } else {
                            $("#codigo_agencia").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_dig_ver_agencia'] == "") {
                            $("#digito_verificador_agencia").val(error.response.data.error['error_dig_ver_agencia']).css("background", cor_input).css("color", "white");
                            if (digito_verificador_agencia == 'Díg. Verificador da Agência somente Números!' || digito_verificador_agencia == 'Díg. Verificador da Ag. deve conter 1 dígito!' || digito_verificador_agencia == '') {
                                digito_verificador_agencia = '';
                            }
                        } else {
                            $("#digito_verificador_agencia").css("background", "white");
                        }

                        if (!error.response.data.error['error_num_conta'] == "") {
                            $("#numero_conta").val(error.response.data.error['error_num_conta']).css("background", cor_input).css("color", "white");
                            if (numero_conta == 'Preencha o Número da Conta!' || numero_conta == 'Número da Conta somente Números!' || numero_conta == 'Número da Conta deve conter até 9 dígitos!', numero_conta == '') {
                                numero_conta = '';
                            }
                        } else {
                            $("#numero_conta").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_dig_ver_conta'] == "") {
                            $("#digito_verificador_conta").val(error.response.data.error['error_dig_ver_conta']).css("background", cor_input).css("color", "white");
                            if (digito_verificador_conta == 'Preencha o Dígito Verificador da Conta!' || digito_verificador_conta == 'Díg. Verif. da Conta somente Números!' || digito_verificador_conta == 'Díg. Verif. da Conta deve conter 1 dígito!', digito_verificador_conta == '') {
                                digito_verificador_conta = '';
                            }
                        } else {
                            $("#digito_verificador_conta").css("background", "#ffffb1");
                        }

                        if (!error.response.data.error['error_cod_operacao'] == "") {
                            $("#codigo_operacao").val(error.response.data.error['error_cod_operacao']).css("background", cor_input).css("color", "white");
                            if (codigo_operacao == 'Cód. da Operação somente Números!' || codigo_operacao == 'Cód. da Operação deve conter até 3 dígitos!' || codigo_operacao == '') {
                                codigo_operacao = '';
                            }
                        } else {
                            $("#codigo_operacao").css("background", "white");
                        }

                        if (!error.response.data.error['error_tp_conta'] == "") {
                            $("#tipo_conta").find('option:selected').html(error.response.data.error['error_tp_conta']);
                            $("#tipo_conta").css("background", cor_input).css("color", "white");
                            if (tipo_conta == 'Preencha o Tipo da Conta!' || tipo_conta == '') {
                                tipo_conta = '';
                            }
                        } else {
                            $("#tipo_conta").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_banco'] == "") {
                            $("#bank_id").find('option:selected').html(error.response.data.error['error_banco']);
                            $("#bank_id").css("background", cor_input).css("color", "white");
                            if (bank_id == 'Selecione o Banco!' || bank_id == '') {
                                bank_id = '';
                            }
                        } else {
                            $("#bank_id").css("background", "#ffffb1").css("color", "black");
                        }

                        if (!error.response.data.error['error_create'] == "") {
                            alert(error.response.data.error['error_create']);
                        }

                    }
                })
        });
    });

    $(function(){
        $(".remove_color_input_cod_agencia").click(function() {
            let value = $(this).val();
            if (value.length != 0 && value == 'Preencha o Código da Agência!' || value == 'Cód. da Agência somente Números!' || value == 'Cód. da Agência deve conter até 4 dígitos!') {
                $("#codigo_agencia").val("").css("background", "white");
            } else {
                $("#codigo_agencia").css("background", "white");
            }
            $("#codigo_agencia").attr("type", "text").css("color", "black");
        });
        $(".remove_color_input_cod_agencia").focus(function() {
            let str = $(this).val();
            if (str.indexOf("Preencha") > -1 || str.indexOf("Cod.") > -1 || str.indexOf("Agência") > -1) {
                $(this).val("").css("background", "white").css("color", "black");
            }
        });
    });

    $(function(){
        $(".remove_color_input_dig_agencia").click(function() {
            let digito_verificador_agencia = $(this).val();
            if (digito_verificador_agencia.length != 0) {
                $("#digito_verificador_agencia").val("").css("background", "white");
            } else {
                $("#digito_verificador_agencia").css("background", "white");
            }
            $("#digito_verificador_agencia").attr("type", "text").css("color", "black");
        });
        $(".remove_color_input_dig_agencia").focus(function() {
            let str = $(this).val();
            if (str.indexOf("Dígito") > -1 || str.indexOf("Verificador") > -1 || str.indexOf("Agência") > -1) {
                $(this).val("").css("background", "white").css("color", "black");
            }
        });
    });

    $(function(){
        $(".remove_color_input").click(function() {
            let id = $(this).attr("id");
            let action = $("#"+id+"").attr("action");
            let value = $(this).val();

            if (action.match(/update/)){
                if (value.length > 0) {
                    $("#"+id+"").css("background", "white");
                } else {
                    $("#"+id+"").val("").css("background", "white");
                }
            } else {
                if (value.length > 0) {
                    $("#"+id+"").val("").css("background", "white");
                } else {
                    $("#"+id+"").css("background", "white");
                }
            }

            $("#"+id+"").attr("type", "text").css("color", "black");
        });
        $(".remove_color_input").focus(function() {
            let id = $(this).attr("id");
            let action = $("#"+id+"").attr("action");
            let value = $(this).val();

            if (action.match(/update/)){
                if (value.length > 0) {
                    $("#"+id+"").css("background", "white");
                } else {
                    $("#"+id+"").val("").css("background", "white");
                }
            } else {
                if (value.length > 0) {
                    $("#"+id+"").val("").css("background", "white");
                } else {
                    $("#"+id+"").css("background", "white");
                }
            }

            $("#"+id+"").attr("type", "text").css("color", "black");
        });
    });

});




function redirectPageLogin(base_url) {
    return window.location.replace(base_url+"/auth/login");
}

function redirectPageAllFlags(base_url) {
    return window.location.replace(base_url + "/bandeiras");
}

function redirectPageDespesaCartaoNovo(base_url) {
    return window.location.replace(base_url + "/despesa-cartao/create");
}

function redirectPageListarFaturas(base_url) {
    return window.location.replace(base_url + "/fatura/pay");
}

function redirectPageAllExtract(base_url) {
    return window.location.replace(base_url + "/extrato");
}

function redirectPageAllPayments(base_url) {
    return window.location.replace(base_url + "/pagamentos");
}

function redirectPageAllAccounts(base_url) {
    return window.location.replace(base_url + "/contas");
}

function redirectPageAllCards(base_url) {
    return window.location.replace(base_url + "/cartoes");
}

function redirectPageAllTpConta(base_url) {
    return window.location.replace(base_url + "/tipo-contas");
}

function redirectPageAllBanks(base_url) {
    return window.location.replace(base_url + "/bancos");
}
function redirectPageAllCategories(base_url) {
    return window.location.replace(base_url + "/categorias");
}
function redirectPageHome(base_url) {
    return window.location.replace(base_url + "/");
}

function formateDate(inputFormat) {
    function pad(s) { return (s < 10) ? '0' + s : s; }
    let d = new Date(inputFormat);
    return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/');
}

function numberToReal(valor) {
    let numero = parseFloat(valor).toFixed(2).split('.');
    numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
    return numero.join(',');
}

function titleize(text) {
    var words = text.toLowerCase().split(" ");
    for (var a = 0; a < words.length; a++) {
        var w = words[a];
        words[a] = w[0].toUpperCase() + w.slice(1);
    }
    return words.join(" ");
}

function formataData(data) {
    split = data.split('-');
    novadata = split[2] + "/" + split[1] + "/" + split[0];
    return novadata; 
}

function generateTabelaPagamentosAgendados(pagamentos, ano) {
    let total = 0;
    let table = "<table class='table table-striped table-hover table-bordered table-condensed' id='table_pgto_agendado'>";
    table += "<thead>";
        table += "<tr>";
            table += "<td colspan='4' id='cab_table'>Contas Agendadas para "+ ano +"</td>";
            table += "<input type='hidden' id='id_conta' value='{{ session()->get('id_conta') }}'>";
        table += "</tr>";
        table += "<tr>";
            table += "<th>Movimentação</th>";
            table += "<th>Valor</th>";
            table += "<th>Data Pagamento</th>";
            table += "<th>Pago</th>";
        table += "</tr>";
        table += "</thead>";
        table += "<tbody>";
            for (attr in pagamentos) {
                table += "<tr>";
                if (pagamentos[attr].pago == "Não") {
                    table += "<td class='td_color_pgto'>" + titleize(pagamentos[attr].movimentacao) + "</td>";
                    table += "<td class='td_color_pgto'>"+ numberToReal(pagamentos[attr].valor) + "</td>";
                    table += "<td class='td_color_pgto'>"+ formataData(pagamentos[attr].data_pagamento) + "</td>";
                    table += "<td class='td_color_pgto'>" + pagamentos[attr].pago + "</td>";
                } else {
                    table += "<td class='td_color_pgto_sim'>" + titleize(pagamentos[attr].movimentacao) + "</td>";
                    table += "<td class='td_color_pgto_sim'>"+ numberToReal(pagamentos[attr].valor) + "</td>";
                    table += "<td class='td_color_pgto_sim'>"+ formataData(pagamentos[attr].data_pagamento) + "</td>";
                    table += "<td class='td_color_pgto_sim'>" + pagamentos[attr].pago + "</td>";
                }
                table += "</tr>";
                total += parseFloat(pagamentos[attr].valor);
            }
            table += "<tbody>";
        table += "<tfoot>";
        table += "<tr>";
            table += "<td colspan='2' align='center' class='cor_preta'>Total de Contas a Pagar em "+ ano +"</td>";
            table += "<td colspan='2' align='center' class='cor_preta tam_fonte'>"+ numberToReal(total) + " </td>";
            table += "<tr>";
            table += "</tfoot>";
        table += "</table>";

    return table;
}
