<table id='pedidosTable' class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col" width="10">#</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Presentacion</th>
        <th scope="col">Costo</th>
        <th scope="col" width="10">Cantidad</th>
        <th scope="col">Evento</th>
      </tr>
    </thead>
    <tbody>
 @foreach ($producto as $product)
      <tr><form method="POST" action="{{ route('pedidos.store') }}"  role="form" enctype="multipart/form-data">
            @csrf

        <td>{{ ++$i}}</td>{{ Form::hidden('productos_id', $product->id, $pedido->productos_id, ['class' => 'form-control' . ($errors->has('productos_id') ? ' is-invalid' : ''), 'placeholder' => 'Productos Id']) }}
        <td>{{ substr($product->descripcion, 0, 30) }}</td>
        <td>{{ $product->presentacion }}</td>
        <td align="right">{{ ($product->precio_1 + $product->precio_2 + $product->precio_3)/3 }}</td>
        <td>{{ Form::number('cantidad', $pedido->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => '0']) }}</td>
        {{ Form::hidden('fechapedido', now(),$pedido->fechapedido, ['class' => 'form-control' . ($errors->has('fechapedido') ? ' is-invalid' : ''), 'placeholder' => 'Fechapedido']) }}
        {{ Form::hidden('estado','0', $pedido->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
        {{ Form::hidden('users_id', Auth::user()->id ,$pedido->users_id, ['class' => 'form-control' . ($errors->has('users_id') ? ' is-invalid' : ''), 'placeholder' => 'Users Id']) }}
        <td><div class="box-footer mt20">
              <a class="btn btn-sm btn-primary" href="{{ route('pedidos.show',$product->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
              <button type="submit" class="btn btn-sm btn-success">Agregar</button>
            </div></td></form>
      </tr>
@endforeach
    </tbody>
  </table>
