
<legend class="text-center">{{ $legend }}</legend>

<div class="form-group">
    <label class="col-md-3 control-label" for="nome_categoria">Categoria</label>
    <div class="col-md-8">
        <input id="nome_categoria" name="nome_categoria" type="text" placeholder="Nome da Categoria" class="form-control white remove-color-input-categoria" value="{{isset($categoria->nome_categoria_formatted) ? $categoria->nome_categoria_formatted : ''}}" disabled="disabled">
        <input type="hidden" id="id_conta_session" value="{{session()->get('id_conta')}}">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="despesa_fixa">Despesa Fixa</label>
    <div class="col-md-8">
        <select class="form-control remove-color-option white" name="despesa_fixa" id="despesa_fixa" disabled="disabled"/>
            <option>{{isset($categoria->despesa_fixa_formatted) ? $categoria->despesa_fixa_formatted : ''}}</option>
            <option value="S">Sim</option>
            <option value="N">Não</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="tipo">Tipo</label>
    <div class="col-md-8">
        <select class="form-control remove-color-option white" name="tipo" id="tipo" disabled="disabled"/>
            <option>{{isset($categoria->tipo_formatted) ? $categoria->tipo_formatted : ''}}</option>
            <option value="D">Débito</option>
            <option value="C">Crédito</option>
        </select>
    </div>
    <input type="hidden" id="id_categoria" name="id_categoria" value="{{isset($categoria->id) ? $categoria->id : ''}}">
</div>

 

