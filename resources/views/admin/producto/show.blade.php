<x-admin>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('productos.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigo Descripcion:</strong>
                            {{ $producto->codigo_descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $producto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Especificacion:</strong>
                            {{ $producto->especificacion }}
                        </div>
                        <div class="form-group">
                            <strong>Presentacion:</strong>
                            {{ $producto->presentacion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio 1:</strong>
                            {{ $producto->precio_1 }}
                        </div>
                        <div class="form-group">
                            <strong>Precio 2:</strong>
                            {{ $producto->precio_2 }}
                        </div>
                        <div class="form-group">
                            <strong>Precio 3:</strong>
                            {{ $producto->precio_3 }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedores Id:</strong>
                            {{ $proveedor[$producto->proveedores_id] }}
                        </div>
                        <div class="form-group">
                            <strong>Categorias Id:</strong>
                            {{ $categoria[$producto->categorias_id] }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>