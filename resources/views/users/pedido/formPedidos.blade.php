


<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $pedido->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechapedido') }}
            {{ Form::text('fechapedido', $pedido->fechapedido, ['class' => 'form-control' . ($errors->has('fechapedido') ? ' is-invalid' : ''), 'placeholder' => 'Fechapedido']) }}
            {!! $errors->first('fechapedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $pedido->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('productos_id') }}
            {{ Form::text('productos_id', $pedido->productos_id, ['class' => 'form-control' . ($errors->has('productos_id') ? ' is-invalid' : ''), 'placeholder' => 'Productos Id']) }}
            {!! $errors->first('productos_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('users_id') }}
            {{ Form::text('users_id', $pedido->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
            {!! $errors->first('users_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
</div>

