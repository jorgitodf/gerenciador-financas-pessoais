
<legend class="text-center">{{ $legend }}</legend>

<div class="form-group">
    <label class="col-md-3 control-label" for="tipo_conta">Tipo de Conta</label>
    <div class="col-md-8">
        <input id="tipo_conta" name="tipo_conta" type="text" placeholder="Tipo de Conta" class="form-control white remove-color-input-tpconta" value="{{isset($tipo_conta->tipo_conta) ? $tipo_conta->tipo_conta : ''}}" disabled="disabled">
    </div>
    <input type="hidden" id="id_tipo_conta" name="id_tipo_conta" value="{{isset($tipo_conta->id) ? $tipo_conta->id : ''}}">
</div>



