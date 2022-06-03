<x-pdf>

    @php
        $total = 0;
        $totalCantidad = 0;
    @endphp
    
    <table class="table table-bordered border-5">
            <tr id="tituloTabla">
                <th>#</th>
                <th>Cantidad</th>
                <th>Costo por Producto</th>
                <th>Descripcion</th>
                <th>Total por Producto</th>
            </tr>
        <tbody>
                @foreach ($pedidos as $pedido)
            <tr> 
                <td>{{ ++$indice }}</td>                           
                <td class="text-right">{{ $pedido->cantidad }}</td>
                <td class="text-right">{{ number_format((($costo1[$pedido->productos_id] + $costo2[$pedido->productos_id] + $costo3[$pedido->productos_id])/3), 2, ',', '.')}}</td>
                <td>{{ $producto[$pedido->productos_id] }}</td>
                @php
                    $totalCantidad = $totalCantidad +  $pedido->cantidad;
                    $total = $total + ($pedido->cantidad * (($costo1[$pedido->productos_id] + $costo2[$pedido->productos_id] + $costo3[$pedido->productos_id])/3));
                @endphp
                <td class="text-right">{{ number_format($pedido->cantidad * (($costo1[$pedido->productos_id] + $costo2[$pedido->productos_id] + $costo3[$pedido->productos_id])/3), 2, ',', '.')}}</td>         
            </tr>
                @endforeach
        </tbody>
            <tr>
                <th  scope="row" class="text-right" colspan="2">{{ number_format($totalCantidad, 2, ',', '.') }}</th>
                <th scope="row" class="text-right" colspan="3">{{ number_format($total, 2, ',', '.') }}</th>
            </tr>
        
    </table>

</x-pdf>            