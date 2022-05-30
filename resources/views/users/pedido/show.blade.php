<x-user>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos del Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.create') }}"> Volver</a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                    <table class="table">
                        <thead class="table-dark">
                          <tr>
                            <td>Codigo</td>
                            <td>Descripcion</td>
                            <td>Especificacion</td>
                            <td>Presentacion</td>
                            <td>Primer precio referencial</td>
                            <td>Segundo precio referencial</td>
                            <td>Tercer precio referencial</td>
                            <td>Costo Promedio</td>
                          </tr>
                        </thead>
                        <tbody>
                            <tr align="right">
                                <td>{{ ($producto->codigo_descripcion) }}</td>
                                <td>{{ ($producto->descripcion) }}</td>
                                <td>{{ ($producto->especificacion) }}</td>
                                <td>{{ ($producto->presentacion) }}</td>
                                <td>{{ ($producto->precio_1) }}</td>
                                <td>{{ ($producto->precio_2) }}</td>
                                <td>{{ ($producto->precio_3) }}</td>
                                <td>{{ ($producto->precio_1 + $producto->precio_2 + $producto->precio_3)/3 }}</td>
                              </tr>
                     
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user>
