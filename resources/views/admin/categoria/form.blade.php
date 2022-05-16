<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $categoria->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descrip') }}
            {{ Form::text('descrip', $categoria->descrip, ['class' => 'form-control' . ($errors->has('descrip') ? ' is-invalid' : ''), 'placeholder' => 'Descrip']) }}
            {!! $errors->first('descrip', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rubro') }}
            {{ Form::number('rubro', $categoria->rubro, ['class' => 'form-control' . ($errors->has('rubro') ? ' is-invalid' : ''), 'placeholder' => 'Rubro']) }}
            {!! $errors->first('rubro', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
</div>