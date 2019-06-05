
<legend class="text-center">{{ $legend }}</legend>

<div class="form-group col-md-12">
    <label class="col-md-3 control-label" for="numero_cartao">Número do Cartão</label>
    <div class="col-md-8">
        <input id="numero_cartao" name="numero_cartao" type="text" placeholder="0000.0000.0000.0000" class="form-control remove-color-input-num-card white" value="{{isset($cartao->numero_cartao) ? $cartao->numero_cartao : ''}}" disabled="disabled">
    </div>
    <input type="hidden" id="id_cartao" name="id_cartao" value="{{isset($cartao->id) ? $cartao->id : ''}}">
</div>

<div class="form-group col-md-12">
    <label class="col-sm-3 control-label" for="data_validade">Data Validade:</label>
    <div class="col-sm-8">
        <input type="text" id="data_validade" name="data_validade" placeholder="00/0000" class="form-control remove-color-input-date white" value="{{isset($cartao->data_validade) ? $cartao->data_validade : ''}}" disabled="disabled">
    </div>
</div>

<div class="form-group col-md-12">
    <label class="col-sm-3 control-label" for="flag_card_id">Bandeira:</label>
    <div class="col-sm-8">
        <select class="form-control remove-color-option white" name="flag_card_id" id="flag_card_id" disabled="disabled"/>
        <option value="{{ isset($cartao->bandeira->id) ? $cartao->bandeira->id : '' }}">{{ isset($cartao->bandeira->bandeira) ? $cartao->bandeira->bandeira : "" }}</option>
        @foreach($bandeiras as $bandeira)
            <option value="{{ $bandeira->id }}">{{ $bandeira->bandeira }}</option>
        @endforeach
        </select>
    </div>  
</div>     

<div class="form-group col-md-12">
    <label class="col-sm-3 control-label" for="bank_id">Banco:</label>
    <div class="col-sm-8">
        <select class="form-control remove-color-option white" name="bank_id" id="bank_id" disabled="disabled"/>
        <option value="{{ isset($cartao->banco->cod_banco) ? $cartao->banco->cod_banco : '' }}">{{ isset($cartao->banco->nome_banco) ? $cartao->banco->nome_banco : "" }}</option>
        @foreach($bancos as $banco)
            <option value="{{ $banco->cod_banco }}">{{ $banco->nome_banco }}</option>
        @endforeach
        </select>
    </div>  
</div>  

<div class="form-group col-md-12">
    <label class="col-sm-3 control-label" for="ativo">Ativo:</label>
    <div class="col-sm-8">
        <select class="form-control remove-color-option white" name="ativo" id="ativo" disabled="disabled"/>
        <option value="{{ isset($cartao->ativo) ? $cartao->ativo : '' }}">{{ isset($cartao->ativo_formatted) ? $cartao->ativo_formatted : '' }}</option>
        <option value="S">Sim</option>    
        <option value="N">Não</option>    
        </select>
    </div>  
</div> 

<div class="form-group col-md-12">
    <label class="col-sm-3 control-label " for="dia_pgto_fatura">Dia Pagamento:</label>
    <div class="col-sm-8">
        <input type="text" id="dia_pgto_fatura" name="dia_pgto_fatura" class="form-control remove-color-input-dpf white" placeholder="Informe o Dia do Pagamento da Fatura" value="{{isset($cartao->dia_pgto_fatura_formatted) ? $cartao->dia_pgto_fatura_formatted : ''}}" disabled="disabled">
    </div>
</div>

 

