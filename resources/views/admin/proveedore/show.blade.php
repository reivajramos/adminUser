<x-admin>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info text-center">
                        <div class="float-left">
                            <h3><span class="card-title">Datos del Proveedor</span></h3>
                        </div>
                        
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $proveedore->name }}
                        </div>
                        <div class="form-group">
                            <strong>descripcion:</strong>
                            {{ $proveedore->descrip }}
                        </div>

                    </div>
                    </div>   
                    <div class="float-right d-grid gap-2">
                        <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Volver</a>
                    </div>

                
            </div>
        </div>
    </section>
</x-admin>
