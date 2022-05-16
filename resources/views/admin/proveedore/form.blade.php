<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('name', $proveedore->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripcion') }}
            {{ Form::text('descrip', $proveedore->descrip, ['class' => 'form-control' . ($errors->has('descrip') ? ' is-invalid' : ''), 'placeholder' => 'Descrip']) }}
            {!! $errors->first('descrip', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20 d-grid gap-2 p-2">
        <button type="submit" class="btn btn-success">Confirmar</button>
    </div>
</div>