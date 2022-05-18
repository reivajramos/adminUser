<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo_descripcion') }}
            {{ Form::text('codigo_descripcion', $producto->codigo_descripcion, ['class' => 'form-control' . ($errors->has('codigo_descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Descripcion']) }}
            {!! $errors->first('codigo_descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $producto->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('especificacion') }}
            {{ Form::text('especificacion', $producto->especificacion, ['class' => 'form-control' . ($errors->has('especificacion') ? ' is-invalid' : ''), 'placeholder' => 'Especificacion']) }}
            {!! $errors->first('especificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('presentacion') }}
            {{ Form::select('presentacion', array('UNIDAD'=>'UNIDAD','DECENA'=>'DECENA','CENTENA'=>'CENTENA'),$producto->presentacion, ['class' => 'form-control' . ($errors->has('presentacion') ? ' is-invalid' : ''), 'placeholder' => 'Presentacion']) }}
            {!! $errors->first('presentacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_1') }}
            {{ Form::number('precio_1', $producto->precio_1, ['class' => 'form-control' . ($errors->has('precio_1') ? ' is-invalid' : ''), 'placeholder' => 'Precio 1']) }}
            {!! $errors->first('precio_1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_2') }}
            {{ Form::number('precio_2', $producto->precio_2, ['class' => 'form-control' . ($errors->has('precio_2') ? ' is-invalid' : ''), 'placeholder' => 'Precio 2']) }}
            {!! $errors->first('precio_2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio_3') }}
            {{ Form::number('precio_3', $producto->precio_3, ['class' => 'form-control' . ($errors->has('precio_3') ? ' is-invalid' : ''), 'placeholder' => 'Precio 3']) }}
            {!! $errors->first('precio_3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedores') }}
            {{ Form::select('proveedores_id', $proveedor , $producto->proveedores_id, ['class' => 'form-control' . ($errors->has('proveedores_id') ? ' is-invalid' : ''), 'placeholder' => 'Proveedores']) }}
            {!! $errors->first('proveedores_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categorias') }}
            {{ Form::select('categorias_id', $categoria , $producto->categorias_id, ['class' => 'form-control' . ($errors->has('categorias_id') ? ' is-invalid' : ''), 'placeholder' => 'Categorias']) }}
            {!! $errors->first('categorias_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
</div>