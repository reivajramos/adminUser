<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Presentacion</th>
        <th scope="col">Costo</th>
        <th scope="col">Cantidad</th>
      </tr>
    </thead>
    <tbody>
 @foreach ($producto as $product)
      <tr>
        <form method="POST" action="{{ route('pedidos.store') }}"  role="form" enctype="multipart/form-data">
            @csrf

        <th>{{ ++$i }}</th>
        {{ Form::hidden('productos_id', $product->id, $pedido->productos_id, ['class' => 'form-control' . ($errors->has('productos_id') ? ' is-invalid' : ''), 'placeholder' => 'Productos Id']) }}
        <th scope="row">{{ $product->descripcion }}</th>
        <td>{{ $product->presentacion }}</td>
        <td>{{ ($product->precio_1 + $product->precio_2 + $product->precio_3)/3 }}</td>
        <td>{{ Form::number('cantidad', $pedido->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}</td>
        <td>{{ Form::hidden('fechapedido', now(),$pedido->fechapedido, ['class' => 'form-control' . ($errors->has('fechapedido') ? ' is-invalid' : ''), 'placeholder' => 'Fechapedido']) }}</td>
        <td>{{ Form::hidden('estado','0', $pedido->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}</td>
        <td>{{ Form::hidden('users_id', Auth::user()->id ,$pedido->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}</td>
        <td>    <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div></td>
    </form>
      </tr>
      <tr>
@endforeach
    </tbody>
  </table>
