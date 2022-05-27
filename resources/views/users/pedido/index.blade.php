<x-user>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pedido') }}
                            </span>
                            <button type="submit" class="btn btn-info">{{ $costoTotal }}</button>
                            <form method="POST" action="{{ route('pedidos.update', [Auth::id()]) }}"  role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-success">Procesar Pedido</button>
                                </div>
    
                            </form>
                     
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Cantidad</th>
										<th>Fechapedido</th>
										<th>Estado</th>
										<th>Descripcion</th>
										<th>Costo por item</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pedido->cantidad }}</td>
											<td>{{ $pedido->fechapedido }}</td>
											<td>{{ $pedido->estado }}</td>
											<td>{{ $producto[$pedido->productos_id] }}</td>
											<td>{{ number_format($pedido->cantidad * (($costo1[$pedido->productos_id] + $costo2[$pedido->productos_id] + $costo3[$pedido->productos_id])/3), 2, ',', '.')}}</td>

                                            <td>
                                                <form action="{{ route('pedidos.destroy',$pedido->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('pedidos.show',$pedido->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pedidos->links() !!}
            </div>
        </div>
    </div>
</x-user>
