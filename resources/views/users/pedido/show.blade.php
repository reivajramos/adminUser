@section('linkExternos')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
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
                        <nav>
                            <div class="nav nav-tabs text-uppercase" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-codigo-tab" data-toggle="tab" href="#nav-codigo" role="tab" aria-controls="nav-codigo" aria-selected="true">Codigo</a>
                            <a class="nav-item nav-link" id="nav-descripcion-tab" data-toggle="tab" href="#nav-descripcion" role="tab" aria-controls="nav-descripcion" aria-selected="false">Descripcion</a>
                            <a class="nav-item nav-link" id="nav-especificacion-tab" data-toggle="tab" href="#nav-especificacion" role="tab" aria-controls="nav-especificacion" aria-selected="false">Especificacion</a>
                            <a class="nav-item nav-link" id="nav-presentacion-tab" data-toggle="tab" href="#nav-presentacion" role="tab" aria-controls="nav-presentacion" aria-selected="false">Presentacion</a>
                            <a class="nav-item nav-link" id="nav-preferencial-tab" data-toggle="tab" href="#nav-preferencial" role="tab" aria-controls="nav-preferencial" aria-selected="false">Costos Referenciales</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><p>{{ ($producto->codigo_descripcion) }}</p></div>
                            <div class="tab-pane fade" id="nav-descripcion" role="tabpanel" aria-labelledby="nav-descripcion-tab"><p>{{ ($producto->descripcion) }}</p></div>
                            <div class="tab-pane fade" id="nav-especificacion" role="tabpanel" aria-labelledby="nav-especificacion-tab"><p>{{ ($producto->especificacion) }}</p></div>
                            <div class="tab-pane fade" id="nav-presentacion" role="tabpanel" aria-labelledby="nav-presentacion-tab"><p>{{ ($producto->presentacion) }}</p></div>
                            <div class="tab-pane fade" id="nav-preferencial" role="tabpanel" aria-labelledby="nav-preferencial-tab">
                                <table class="table table-responsive">
                                    <tr>
                                        <th scope="col">Primer Costo Referencial</th>
                                        <th scope="col">Segundo Costo Referencial</th>
                                        <th scope="col">Tercer Costo Referencial</th>
                                        <th scope="col">Costo Promedio Referencial</th>
                                    </tr>
                                    <tr align="right">
                                        <td>{{  number_format(($producto->precio_1), 2, ',', '.') }}</td>
                                        <td>{{  number_format(($producto->precio_2), 2, ',', '.') }}</td>
                                        <td>{{  number_format(($producto->precio_3), 2, ',', '.') }}</td>
                                        <th scope="row">{{ number_format((($producto->precio_1 + $producto->precio_2 + $producto->precio_3)/3), 2, ',', '.') }}</th>
                                    </tr>
                                </table>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user>
