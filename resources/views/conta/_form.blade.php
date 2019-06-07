
<legend class="text-center">{{ $legend }}</legend>

<div class="form-group">
    <label class="col-md-3 col-sm-3 control-label tam-fonte" for="codigo_agencia">Código da Agência:</label>
    <div class="col-md-8 col-md-9">
        <input type="text" id="codigo_agencia" name="codigo_agencia" placeholder="Informe o Código da Agência" class="form-control remove_color_input_cod_agencia white" autofocus="autofocus" value="{{isset($conta->codigo_agencia_formatted) ? $conta->codigo_agencia_formatted : ''}}" disabled="disabled">
    </div>
    <input type="hidden" id="id_conta" name="id_conta" value="{{isset($conta->id) ? $conta->id : ''}}">
</div>

<div class="form-group">
    <label class="col-md-3 col-sm-3 control-label tam-fonte" for="digito_verificador_agencia">Dígito Agência:</label>
    <div class="col-md-8 col-md-9">
        <input type="text" id="digito_verificador_agencia" name="digito_verificador_agencia" placeholder="Informe o Dígito verificador da Agência" class="form-control remove_color_input_dig_agencia white"  value="{{isset($conta->digito_verificador_agencia) ? $conta->digito_verificador_agencia : ''}}" disabled="disabled">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-sm-3 control-label tam-fonte" for="numero_conta">Número da Conta:</label>
    <div class="col-md-8 col-md-9">
        <input type="text" id="numero_conta" name="numero_conta" placeholder="Informe o Número da Conta" class="form-control remove_color_input white"  value="{{isset($conta->numero_conta) ? $conta->numero_conta : ''}}" disabled="disabled">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-sm-3 control-label tam-fonte" for="digito_verificador_conta">Dígito da Conta:</label>
    <div class="col-md-8 col-md-9">
        <input type="text" id="digito_verificador_conta" name="digito_verificador_conta" placeholder="Informe o Dígito verificador da Conta" class="form-control remove_color_input white"  value="{{isset($conta->digito_verificador_conta) ? $conta->digito_verificador_conta : ''}}" disabled="disabled">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-sm-3 control-label tam-fonte" for="codigo_operacao">Código da Operação:</label>
    <div class="col-md-8 col-md-9">
        <input type="text" id="codigo_operacao" name="codigo_operacao" placeholder="Informe o Código da Operação" class="form-control remove_color_input white"  value="{{isset($conta->codigo_operacao_formatted) ? $conta->codigo_operacao_formatted : ''}}" disabled="disabled">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-sm-3 control-label tam-fonte" for="tipo_conta">Tipo de Conta:</label>
    <div class="col-md-8 col-md-9">
        <select class="form-control remove-color-option white" name="tipo_conta" id="tipo_conta" disabled="disabled"/>
        <option value="{{ isset($conta->tipo_conta->id) ? $conta->tipo_conta->id : '' }}">{{ isset($conta->tipo_conta->tipo_conta) ? $conta->tipo_conta->tipo_conta : "" }}</option>
        @foreach($tipos_contas as $tpconta)
            <option value="{{ $tpconta->id }}">{{ $tpconta->tipo_conta }}</option>
        @endforeach
        </select>
    </div>  
</div> 

<div class="form-group">
    <label class="col-md-3 col-sm-3 control-label tam-fonte" for="bank_id">Banco:</label>
    <div class="col-md-8 col-md-9">
        <select class="form-control remove-color-option white" name="bank_id" id="bank_id" disabled="disabled"/>
        <option value="{{ isset($conta->banco->cod_banco) ? $conta->banco->cod_banco: '' }}">{{ isset($conta->banco->nome_banco) ? $conta->banco->nome_banco : "" }}</option>
        @foreach($bancos as $banco)
            <option value="{{ $banco->cod_banco }}">{{ $banco->nome_banco }}</option>
        @endforeach
        </select>
    </div>  
</div> 



