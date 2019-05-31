
    <legend class="text-center">{{ $legend }}</legend>

    <div class="form-group">
        <label class="col-md-3 control-label" for="cod_banco">Código do Banco</label>
        <div class="col-md-8">
            <input id="cod_banco" name="cod_banco" type="text" placeholder="Código do Banco" class="form-control white remove-color-input-cbanco" value="{{isset($banco->cod_banco_formatted) ? $banco->cod_banco_formatted : ''}}" disabled="disabled">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="nome_banco">Nome do Banco</label>
        <div class="col-md-8">
            <input id="nome_banco" name="nome_banco" type="text" placeholder="Nome do Banco" class="form-control white remove-color-input-nbanco" value="{{isset($banco->nome_banco) ? $banco->nome_banco : ''}}" disabled="disabled">
            <input type="hidden" name="_has_conta" id="_has_conta" value="" />
        </div>
    </div>    

