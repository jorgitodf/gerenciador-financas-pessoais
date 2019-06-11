
<legend class="text-center">{{ $legend }}</legend>

<div class="form-group col-md-12 col-sm-12">
    <label class="col-sm-2 col-md-2 control-label tam-fonte" for="credit_card_id">Cartão:</label>
    <div class="col-sm-10 col-md-10">
        <select class="form-control remove-color-option white" name="credit_card_id" id="credit_card_id" disabled="disabled"/>
        <option></option>
        @foreach($cartoes as $cartao)
            <option value="{{ $cartao->id }}">{{ $cartao->numero_cartao_formatted }} - {{ $cartao->bandeira->bandeira }} - {{ $cartao->banco->nome_banco }}</option>
        @endforeach
        </select>
    </div>
</div>

<div class="form-group col-md-12 col-sm-12">
    <label class="col-sm-2 col-md-2 control-label tam-fonte" for="descricao">Descrição:</label>
    <div class="col-sm-4 col-md-4">
        <input type="text" id="descricao" name="descricao" action="" class="form-control remove_color_input white" placeholder="Informe a Despesa" disabled="disabled">
    </div>

    <label class="col-sm-2 col-md-2 control-label tam-fonte" for="data_compra">Data Compra:</label>
    <div class="col-sm-4 col-md-4">
        <input type="text" id="data_compra" name="data_compra" action="" class="form-control remove_color_input white data_movimentacao" disabled="disabled">
    </div>
</div>

<div class="form-group col-md-12 col-sm-12">
    <label class="col-sm-2 col-md-2 control-label tam-fonte" for="valor">Valor:</label>
    <div class="col-sm-4 col-md-4">
        <input type="text" id="valor" name="valor" action="" placeholder=" R$ 0,00" class="form-control remove_color_input white" disabled="disabled"/>
    </div>

    <label class="col-sm-2 col-md-2 control-label tam-fonte" for="numero_parcela">Parcela:</label>
    <div class="col-sm-4 col-md-4">
        <select class="form-control remove-color-option white" name="numero_parcela" id="numero_parcela" disabled="disabled"/>
            <option></option>
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
        </select>
    </div>
</div>