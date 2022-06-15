@section('linkExternos')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <style type="text/css">
 
      </style>
  
    <script type="text/javascript" class="init">
        $(document).ready(function () {
            $('#productosTable').DataTable({
                "language": {
                     "search": "Buscar Productos:",
                     "paginate": {
                                "first":      "Primero",
                                "last":       "Ultimo",
                                "next":       "Siguiente",
                                "previous":   "Anterior"
                                },
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "lengthMenu":     "Mostrando _MENU_ entradas",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros"
                             }
                                        });
        });
    </script>

@endsection

<x-admin>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Productos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='productosTable'  class="table table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th scope="col" width="100px">No</th>
										<th>Codigo Descripcion</th>
										<th>Descripcion</th>
										<th>Especificacion</th>
										<th>Presentacion</th>
										<th>Precio</th>
										<th>Proveedores Id</th>
										<th>Categorias Id</th>
                                        <th>Eventos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $producto->codigo_descripcion }}</td>
											<td>{{ substr($producto->descripcion, 0, 30) }}</td>
											<td>{{ substr($producto->especificacion, 0, 30) }}</td>
											<td>{{ $producto->presentacion }}</td>
											<td align="right">{{ number_format(($producto->precio_1 + $producto->precio_2 + $producto->precio_3)/3, 0, ",", ".") }}</td>
											<td>{{ $proveedor[$producto->proveedores_id] }}</td>
											<td>{{ $categoria[$producto->categorias_id] }}</td>

                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-xs" href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-success btn-xs" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
 
            </div>
        </div>
    </div>
</x-admin>
