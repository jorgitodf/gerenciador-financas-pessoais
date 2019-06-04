
<legend class="text-center">{{ $legend }}</legend>

<div class="form-group">
    <label class="col-md-3 control-label" for="bandeira">Bandeira</label>
    <div class="col-md-8">
        <input id="bandeira" name="bandeira" type="text" placeholder="Nome da Bandeira do Cartão" class="form-control white remove-color-input-bandeira" value="{{isset($bandeira->bandeira_formatted) ? $bandeira->bandeira_formatted : ''}}" disabled="disabled">
    </div>
    <input type="hidden" id="id_bandeira" name="id_bandeira" value="{{isset($bandeira->id) ? $bandeira->id : ''}}">
</div>

 

