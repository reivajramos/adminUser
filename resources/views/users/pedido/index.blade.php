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
                                    <tr  align="right">
                                        <th>No</th>
                                        
										<th>Cantidad</th>
										<th>Costo por Producto</th>
										<th>Fecha del Pedido</th>									
										<th>Descripcion</th>
										<th>Total por Producto</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $totalCantidad = 0;
                                    @endphp

                                    @foreach ($pedidos as $pedido)
                                        <tr align="right">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $pedido->cantidad }}</td>
                                            <td>{{ number_format((($costo1[$pedido->productos_id] + $costo2[$pedido->productos_id] + $costo3[$pedido->productos_id])/3), 2, ',', '.')}}</td>
											<td>{{ $pedido->fechapedido }}</td>
											<td>{{ $producto[$pedido->productos_id] }}</td>
                                            @php
                                                $totalCantidad = $totalCantidad +  $pedido->cantidad;
                                                $total = $total + ($pedido->cantidad * (($costo1[$pedido->productos_id] + $costo2[$pedido->productos_id] + $costo3[$pedido->productos_id])/3));
                                            @endphp
											<td>{{ number_format($pedido->cantidad * (($costo1[$pedido->productos_id] + $costo2[$pedido->productos_id] + $costo3[$pedido->productos_id])/3), 2, ',', '.')}}</td>
										
											

                                            <td>
                                                <form action="{{ route('pedidos.destroy',$pedido->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        

                                    @endforeach
                                   
                                </tbody>
                                <tr   align="right">
                                    <td></td>
                                    <th scope="row">{{ number_format($totalCantidad, 2, ',', '.') }}</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th scope="row">{{ number_format($total, 2, ',', '.') }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-user>
